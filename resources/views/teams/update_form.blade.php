<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tikle</title>
    {{-- This link is still good for base styles, but specific overrides are in <style> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1a1a; /* Dark background */
            margin: 0;
            padding: 20px;
            color: #f0f0f0; /* Light text for dark background */
        }

        .container {
            max-width: 700px; /* Slightly narrower for forms to look more focused */
            margin: 30px auto;
            padding: 30px;
            background-color: #2c2c2c; /* Slightly lighter dark for container */
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3); /* More pronounced shadow */
        }

        h1 {
            text-align: center;
            color: #ffd700; /* Gold/Yellow for headings */
            margin-bottom: 40px;
            font-size: 2.5em;
            position: relative;
            padding-bottom: 10px;
        }

        h1::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            height: 4px;
            width: 60px;
            background-color: #ffd700; /* Yellow underline */
            border-radius: 2px;
        }

        /* Error Messages (Laravel's default 'alert' classes) */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .alert-danger {
            background-color: #dc3545; /* Standard red for errors */
            color: #fff;
            border: 1px solid #c82333;
        }

        .alert-danger ul {
            list-style-type: none; /* Remove bullet points */
            padding: 0;
            margin: 0;
        }

        /* Form Group Spacing (Laravel's default 'mb-3' for margin-bottom) */
        .mb-3 {
            margin-bottom: 1.5rem; /* Increased spacing for better readability */
        }

        /* Form Labels */
        .form-label {
            display: block; /* Ensures label takes its own line */
            margin-bottom: 8px;
            color: #ffd700; /* Yellow for labels */
            font-weight: 600;
            font-size: 1.1em;
        }

        /* --- FORM CONTROL STYLES --- */
        .form-control, .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #555; /* Subtle dark border */
            border-radius: 8px;
            color: #f0f0f0; /* Light text color for all */
            font-size: 1em;
            transition: border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        input.form-control {
            background-color: #3a3a3a; /* Explicitly set dark background for inputs */
            line-height: normal;
        }

        textarea.form-control {
            background-color: #3a3a3a;
            min-height: 120px;
            resize: vertical;
        }

        .form-control:focus, .form-select:focus {
            border-color: #ffd700; /* Yellow border on focus */
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.3); /* Yellow focus ring */
            background-color: #4a4a4a; /* Slightly lighter on focus for feedback */
        }

        .form-select {
            background-color: #3a3a3a;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%23ffd700'%3E%3Cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 1.2em;
        }

        .form-select option {
            background-color: #3a3a3a;
            color: #f0f0f0;
        }

        /* --- BUTTON STYLES --- */
        .btn {
            display: inline-block;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease, color 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            text-align: center;
        }

        /* MODIFIED: Kaydet / Add User Button (primary action) - smaller size */
        .btn-success {
            background-color: #ffd700; /* Yellow button */
            color: #1a1a1a; /* Dark text */
            box-shadow: 0 4px 10px rgba(255, 215, 0, 0.4);
            padding: 8px 18px; /* Smaller padding */
            font-size: 1em;  /* Smaller font size */
        }

        .btn-success:hover {
            background-color: #e0b800; /* Darker yellow on hover */
            transform: translateY(-2px);
            color: #000;
        }

        /* MODIFIED: Vazgeç / Update Name Button (secondary action, or distinct from primary) - smaller size */
        .btn-primary { /* Using this for "Adı Güncelle" */
            background-color: #3a3a3a; /* Dark background */
            color: #ffd700; /* Yellow text */
            border: 1px solid #ffd700; /* Yellow border */
            box-shadow: 0 4px 10px rgba(255, 215, 0, 0.1); /* Subtle yellow shadow */
            padding: 8px 18px; /* Smaller padding */
            font-size: 1em;  /* Smaller font size */
        }

        .btn-primary:hover {
            background-color: #4a4a4a; /* Lighter dark on hover */
            border-color: #e0b800; /* Darker yellow border on hover */
            transform: translateY(-2px);
            color: #e0b800; /* Darker yellow text on hover */
        }

        .btn-secondary { /* For "Vazgeç" or other secondary actions */
            background-color: #555;
            color: #f0f0f0;
            margin-left: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 12px 25px; /* Standard size */
            font-size: 1.1em;
        }

        .btn-secondary:hover {
            background-color: #666;
            transform: translateY(-2px);
            color: #fff;
        }

        /* MODIFIED: Sil (Delete) Button - Back to red, but with "Sahip" button's size */
        .btn-danger {
            background-color: #dc3545; /* RED color (reverted) */
            color: #fff; /* White text (reverted) */
            border: 1px solid #dc3545; /* Red border (reverted) */
            padding: 0.4em 0.8em; /* Matching Sahip badge padding */
            font-size: 0.85em; /* Matching Sahip badge font size */
            border-radius: 0.375rem; /* Matching Sahip badge border-radius */
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease; /* Ensure transitions are active */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Subtle shadow for buttons */
        }
        .btn-danger:hover {
            background-color: #c82333; /* Darker red on hover */
            border-color: #c82333; /* Darker red border on hover */
            transform: translateY(-1px); /* Subtle lift on hover */
        }

        /* --- Add Member Section Styles --- */
        .add-member-section {
            background-color: #3a3a3a;
            border: 1px solid #555;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
            margin-bottom: 30px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .add-member-section h5 {
            color: #ffd700;
            font-size: 1.3em;
            margin-bottom: 20px;
            border-bottom: 1px solid #555;
            padding-bottom: 10px;
        }

        /* --- Team Members List Styles --- */
        h5.team-members-heading {
            color: #ffd700;
            font-size: 1.5em;
            margin-top: 30px;
            margin-bottom: 15px;
            border-bottom: 2px solid #555;
            padding-bottom: 10px;
        }

        .list-group {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .list-group-item {
            background-color: #3a3a3a;
            border: 1px solid #555;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #f0f0f0;
            transition: background-color 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .list-group-item:hover {
            background-color: #4a4a4a;
            border-color: #ffd700;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .list-group-item > div:first-child {
            flex-grow: 1;
        }

        /* Styles for the "Sahip" (Owner) badge */
        .badge {
            display: inline-block;
            padding: 0.4em 0.8em;
            font-size: 0.85em;
            font-weight: bold;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .badge.bg-primary {
            background-color: #ffd700 !important;
            color: #1a1a1a !important;
        }

        /* CSS for aligning input and button on the same line */
        .form-row-flex-container {
            margin-bottom: 1.5rem; /* Reapply mb-3 spacing to the container of the label and flex row */
        }
        .form-row-flex {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 10px;
        }
        .form-row-flex .form-control {
            flex-grow: 1;
            width: auto;
        }
        .form-row-flex-container .form-label {
            margin-bottom: 8px;
        }
        .arrow {
            border: solid #ffd700; /* Arrow color to match theme */
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 3px;
            vertical-align: middle; /* Align with text */
        }
        .left {
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
        }

        /* New/Modified Styles for Button Placement and Design */
        .add-task-button-container {
            display: flex;
            justify-content: space-between; /* Pushes items to ends */
            align-items: center; /* Vertically centers them */
            margin-bottom: 30px; /* Space below the buttons and heading */
            flex-wrap: wrap; /* Allow wrapping on smaller screens */
            gap: 15px; /* Space between buttons if they wrap */
        }

        .add-task-btn { /* Styling the "Geri Dön" button (now an <a> tag) */
            background-color: #3a3a3a; /* Dark background */
            color: #f0f0f0; /* Light text */
            border: 1px solid #555; /* Subtle border */
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none; /* Remove underline from link */
            display: inline-flex; /* Use flex to align icon and text */
            align-items: center;
            gap: 8px; /* Space between arrow and text */
            font-weight: 600;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        .add-task-btn:hover {
            background-color: #4a4a4a;
            border-color: #ffd700; /* Yellow border on hover */
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .add-task-btn .arrow {
            /* Adjust arrow color for this specific button if needed,
               otherwise it inherits from the general .arrow style */
            border-color: #f0f0f0; /* Light arrow on dark button */
        }

        .add-task-btn:hover .arrow {
            border-color: #ffd700; /* Yellow arrow on hover */
        }

        /* Ensure delete button (form) also aligns correctly */
        .add-task-button-container form {
            margin: 0; /* Remove default form margins that might affect alignment */
        }
    </style>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Takımı Düzenle: {{ $team->name }}</h1>

    {{-- Container for "Geri Dön" and "Takımı Sil" buttons --}}
    <div class="add-task-button-container">
        {{-- "Geri Dön" button --}}
        <a href="{{ route('teams.index') }}" class="add-task-btn">
            <i class="arrow left"></i>
            Geri Dön
        </a>

        {{-- "Takımı Sil" button (form remains as it is for submission) --}}
        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" onsubmit="return confirm('Bu takımı silmek istediğine emin misin?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Takımı Sil</button>
        </form>
    </div>

    {{-- Takım adını güncelle --}}
    <form action="{{ route('teams.update', $team->id) }}" method="POST" class="mb-4">
        @csrf
        @method('PUT')
        {{-- WRAPPER FOR LABEL AND FLEX ROW --}}
        <div class="form-row-flex-container mb-3">
            <label for="team_name" class="form-label">Takım Adı</label>
            <div class="form-row-flex"> {{-- New flex container for input and button --}}
                <input type="text" id="team_name" name="name" class="form-control" value="{{ $team->name }}" required>
                <button type="submit" class="btn btn-primary">Adı Güncelle</button>
            </div>
        </div>
    </form>

    {{-- Kullanıcı ekleme --}}
    <div class="add-member-section">
        <h5>Yeni Üye Ekle</h5>
        <form action="{{ route('teams.addMember', $team->id) }}" method="POST">
            @csrf
            {{-- WRAPPER FOR LABEL AND FLEX ROW --}}
            <div class="form-row-flex-container mb-3">
                <label for="member_email" class="form-label">E-posta</label>
                <div class="form-row-flex"> {{-- New flex container for input and button --}}
                    <input type="email" id="member_email" name="email" class="form-control" placeholder="E-posta ile kullanıcı ekle" required>
                    <button type="submit" class="btn btn-success">Kullanıcı Ekle</button>
                </div>
            </div>
        </form>
    </div>

    {{-- Üye listesi --}}
    <h5 class="team-members-heading">Takım Üyeleri</h5>
    <ul class="list-group">
        @foreach($team->users as $member)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{-- Left side: User Name and Email --}}
                <div>
                    {{ $member->name }} ({{ $member->email }})
                </div>

                {{-- Right side: Sahip badge and Delete button --}}
                <div class="d-flex align-items-center">
                    @if($member->id === $team->owner_id)
                        <span class="badge bg-primary me-2">Sahip</span> {{-- Margin-right (me-2) for spacing before button --}}
                    @endif

                    {{-- Sadece sahibi değilse sil butonu göster --}}
                    @if($member->id !== $team->owner_id)
                        <form action="{{ route('teams.removeMember', [$team->id, $member->id]) }}" method="POST" onsubmit="return confirm('Bu kullanıcıyı takımdan silmek istediğine emin misin?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                        </form>
                    @endif
                </div>
            </li>
        @endforeach
        @if($team->users->isEmpty())
            <li class="list-group-item" style="justify-content: center; color: #ccc;">Bu takımda henüz üye yok.</li>
        @endif
    </ul>
</div>
@endsection

</body>
</html>
