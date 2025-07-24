<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class TeamController extends Controller
{
    public function index()
{
    $user = auth()->user();

    $ownedTeams = $user->ownedTeams()->latest()->get(); // Sahip olduğu takımlar
    $memberTeams = $user->teams()->where('owner_id', '!=', $user->id)->latest()->get(); // Üye olduğu ama sahibi olmadığı takımlar

    $teams = $ownedTeams->merge($memberTeams); // Birleştir

    return view('teams.index', compact('teams'));
}


public function create()
    {
        return view('teams.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $team = Team::create([
            'name' => $request->name,
            'owner_id' => Auth::id(),
        ]);

        // Takım oluşturulduktan sonra, kullanıcıyı bu takıma ekleyin
        $team->users()->attach(Auth::id());

        return redirect()->route('teams.index')->with('success', 'Takım başarıyla oluşturuldu.');
    }
    public function members(Team $team)
{
    // Sadece takım sahibi erişebilsin
    abort_unless(auth()->id() === $team->owner_id, 403);

    // Belirgin hata çözümü için id alanını net seçiyoruz
    return response()->json(
        $team->members()->select('users.id as user_id', 'users.name')->get()
    );
}

public function getTeamMembers($teamId)
{
    $team = Team::with(['members' => function ($query) {
        $query->select('users.id', 'users.name', 'users.email');
    }])->findOrFail($teamId);

    // Erişim kontrolü (sadece takım sahibi erişebilsin):
    abort_unless(auth()->id() === $team->owner_id, 403);

    return response()->json($team->members);
}

    public function addMember(Request $request, Team $team)
    {
        $this->authorize('addMember', $team);
        if ($team->owner_id !== Auth::id()) {
            abort(403, 'Bu takıma üye ekleme izniniz yok.');
        }
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Kullanıcı bulunamadı.');
        }
        if ($team->users->contains($user->id)) {
            return redirect()->back()->with('error', 'Kullanıcı zaten bu takımda.');
        }
        $team->users()->attach($user->id);

        return back()->with('success', 'Kullanıcı başarıyla takıma eklendi.');
    }
    public function edit(Team $team)
{
    if ($team->owner_id !== Auth::id()) {
        abort(403, 'Bu takımı düzenleme izniniz yok.');
    }

    $team->load('owner'); // owner ilişkisini yüklüyoruz
    return view('teams.update_form', compact('team'));
}

    public function update(Request $request, Team $team)
    {
        $this->authorize('update', $team);
        if ($team->owner_id !== Auth::id()) {
            abort(403, 'Bu takımı düzenleme izniniz yok.');
        }
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $team->update(['name' => $request->name]);

        return redirect()->route('teams.index')->with('success', 'Takım başarıyla güncellendi.');
    }
    public function removeMember(Team $team, User $user)
{
    // Sadece takım sahibi silebilir
    abort_unless(auth()->id() === $team->owner_id, 403);

    // Sahibini silmeye çalışma!
    if ($user->id === $team->owner_id) {
        return back()->with('error', 'Takım sahibi silinemez.');
    }

    $team->users()->detach($user->id);

    return back()->with('success', 'Kullanıcı takımdan çıkarıldı.');
}
public function destroy(Team $team)
{
    // Sadece takım sahibi silebilir
    abort_unless(auth()->id() === $team->owner_id, 403);

    $team->delete();

    return redirect()->route('teams.index')->with('success', 'Takım başarıyla silindi.');
}
}
