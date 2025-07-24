<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tikle</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- This link tag is redundant if you're extending layouts.app --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- IMPORTANT: Add CSRF token meta for JS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
{{-- resources/views/tasks/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="content-container"> {{-- İçeriği ortalamak ve genişliğini kontrol etmek için --}}
    <h1>Görevler</h1>
    <form method="GET" action="{{ route('tasks.index') }}" class="mb-4 d-flex gap-3 flex-wrap">
    <input type="text" name="search" class="form-control" placeholder="Başlık ara..." value="{{ request('search') }}">

    <select name="status" class="form-select">
        <option value="">Durum (Hepsi)</option>
        <option value="todo" {{ request('status') == 'todo' ? 'selected' : '' }}>Yapılacak</option>
        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>Devam Ediyor</option>
        <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Tamamlandı</option>
    </select>

    <select name="type" class="form-select">
        <option value="">Tip (Hepsi)</option>
        <option value="personal" {{ request('type') == 'personal' ? 'selected' : '' }}>Bireysel</option>
        <option value="team" {{ request('type') == 'team' ? 'selected' : '' }}>Takım</option>
    </select>

    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">

    <button type="submit" class="btn btn-primary">Filtrele</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Temizle</a>
</form>

    {{-- Yeni Görev Ekle Butonu --}}
    <div class="add-task-button-container">
        <button class="add-task-btn">
            <a href="{{ route('tasks.create') }}">
                <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="currentColor"></path>
                </svg>
                Yeni Görev Ekle
            </a>
        </button>
    </div>

    {{-- Tab İçeriği --}}
    <div class="tab-content mt-3" id="taskTabsContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            @include('tasks.partials.task_list', ['tasks' => $allTasks]) {{-- allTasks olarak düzelttim --}}
        </div>
        <div class="tab-pane fade" id="created" role="tabpanel" aria-labelledby="created-tab">
            @include('tasks.partials.task_list', ['tasks' => $myTeamTasks])
        </div>
        <div class="tab-pane fade" id="assigned" role="tabpanel" aria-labelledby="assigned-tab">
            @include('tasks.partials.task_list', ['tasks' => $assignedTasks])
        </div>
        <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
            @include('tasks.partials.task_list', ['tasks' => $personalTasks])
        </div>
    </div>
</div>
@endsection

{{-- JavaScript for toggling status (bu kısım layouts/app.blade.php içinde de olabilir, burada da olabilir) --}}
<script>
    function toggleStatus(taskId, isChecked) {
        const form = document.getElementById(`form-${taskId}`);
        const input = document.getElementById(`status-input-${taskId}`);

        // Set the hidden input's value based on the checkbox state
        input.value = isChecked ? 'done' : 'todo';

        // Submit the form
        form.submit();
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>
