<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Team;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// app/Http/Controllers/TaskController.php

public function index(Request $request)
{
    $user = auth()->user();

    $query = Task::query();

    $query->where(function ($q) use ($user) {
        $q->where('user_id', $user->id)
          ->orWhereHas('assignedUsers', function ($q2) use ($user) {
              $q2->where('user_id', $user->id);
          });
    });

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    if ($request->filled('start_date')) {
        $query->whereDate('created_at', '>=', $request->start_date);
    }

    if ($request->filled('end_date')) {
        $query->whereDate('created_at', '<=', $request->end_date);
    }


    // Diğer sabit veriler
    $allTasks = $query->with(['team', 'assignedUsers'])->latest()->get();
    $myTeamTasks = Task::where('type', 'team')->where('user_id', $user->id)->with('team')->get();
    $assignedTasks = Task::whereHas('assignedUsers', fn($q) => $q->where('user_id', $user->id))->with('team')->get();
    $personalTasks = Task::where('type', 'personal')->where('user_id', $user->id)->get();

    return view('tasks.index', compact('allTasks', 'myTeamTasks', 'assignedTasks', 'personalTasks'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = auth()->user()->ownedTeams()->get();
        return view('tasks.create',['teams' => $teams,'assignedUsers' => collect()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'type' => 'required|in:personal,team',
            'team_id' => 'nullable|exists:teams,id',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'todo'; // varsayılan durum

        if($validated['type']=='team' && empty($validated['team_id'])){
            return redirect()->back()->withErrors(['team_id' => 'Takım seçilmesi zorunludur.']);
        }

        $task= Task::create($validated);
        if ($validated['type'] === 'team' && $request->has('assigned_users')) {
            $task->assignedUsers()->sync($request->input('assigned_users'));
        }

        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit(Task $task)
{
    abort_unless($task->user_id === auth()->id(), 403);

    $teams = auth()->user()->ownedTeams()->get();

    return view('tasks.update_form', compact('task', 'teams'));
}

public function update(Request $request, Task $task)
{
    // Yalnızca görevin sahibi güncelleyebilir
    abort_unless(auth()->id() === $task->user_id, 403);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'type' => 'required|in:personal,team',
        'team_id' => 'nullable|exists:teams,id',
        'status' => 'required|in:todo,in_progress,done',
    ]);
    if ($validated['type'] == 'team' && empty($validated['team_id'])) {
        return redirect()->back()->withErrors(['team_id' => 'Takım seçilmesi zorunludur.']);
    }

    $task->update($validated);

    return redirect()->route('tasks.index')->with('success', 'Görev başarıyla güncellendi.');
}


    public function updateStatus(Request $request, Task $task)
{
    $request->validate([
        'status' => 'required|in:todo,in_progress,done',
    ]);

    $task->update(['status' => $request->status]);

    return redirect()->back()->with('success', 'Görev durumu güncellendi.');
}



/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
{
    $task = Task::findOrFail($id);

    // Sadece görevi oluşturan kullanıcı silebilir
    if ($task->user_id !== auth()->id()) {
        return redirect()->back()->withErrors('error',
            'Bu görevi silme izniniz yok.'
        );
    }

    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Görev başarıyla silindi.');
}

}
