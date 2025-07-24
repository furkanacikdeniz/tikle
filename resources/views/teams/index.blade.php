<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Takımlarım</title>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Takımlarım</h1>

    <div class="add-task-button-container">
            <button class="add-task-btn">
                <a href="{{ route('teams.create') }}">
                Yeni Takım Oluştur
                </a>
            </button>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($teams->isEmpty())
        <p>Henüz bir takım oluşturmadınız.</p>
    @else
        <ul class="list-group">
            @foreach($teams as $team)
                <div class="card mb-2">
                    <div class="card-body">
                        <h5>{{ $team->name }}</h5>
                        <p><strong>Takım Sahibi:</strong> {{ $team->owner->name }}</p>
                            <p><strong>Üyeler:</strong> @while ($team->users->count() > 0)
                                @php
                                    $user = $team->users->shift();
                                @endphp
                                {{ $user->name }}{{ !$team->users->isEmpty() ? ', ' : '' }}

                            @endwhile
                        <p><strong>Oluşturulma Tarihi:</strong> {{ $team->created_at->format('d-m-Y H:i') }}</p>
                        <a href="{{ route('teams.edit',$team->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                    </div>
                </div>
            @endforeach
        </ul>
    @endif
</div>

@endsection

</body>
</html>
