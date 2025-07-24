<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Görev Ekle</title>
    <style>
        /* --- Reused from previous CSS for consistency --- */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #1a1a1a; /* Dark background */
    margin: 0;
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

/* Form Controls (Input, Textarea) */
.form-control {
    width: 100%;
    padding: 12px 15px;
    background-color: #3a3a3a; /* Darker input background */
    border: 1px solid #555; /* Subtle dark border */
    border-radius: 8px;
    color: #f0f0f0; /* Light text color */
    font-size: 1em;
    transition: border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
    border: 1px solid #555; /* Subtle dark border */
}

.form-control:focus {
    border-color: #ffd700; /* Yellow border on focus */
    outline: none; /* Remove default outline */
    box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.3); /* Yellow focus ring */
    background-color: #4a4a4a; /* Slightly lighter on focus for feedback */
}
input.form-control {
    background-color: #3a3a3a; /* Explicitly set dark background for inputs */
    line-height: normal; /* Ensures consistent line height for text inputs */
}

/* Submit Button */
.btn-primary {
    background-color: #ffd700; /* Yellow button */
    color: #1a1a1a; /* Dark text on button */
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1.1em;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease, color 0.3s ease;
    box-shadow: 0 4px 10px rgba(255, 215, 0, 0.4);

    /* --- NEW/UPDATED PROPERTIES FOR CENTERING --- */
    display: block; /* Make it a block element to occupy its own line */
    margin: 30px auto 0; /* Center horizontally with auto margins, add space above */
    max-width: 250px; /* Limit button width for better appearance */
    /* --- END NEW/UPDATED PROPERTIES --- */
}

.btn-primary:hover {
    background-color: #e0b800; /* Slightly darker yellow on hover */
    transform: translateY(-2px);
    color: #000;
}

/* --- New CSS for Radio Buttons and Dropdown --- */
/* Radio Button Container */
.radio-group {
    display: flex; /* Use flexbox to align items horizontally */
    gap: 25px; /* Spacing between radio options */
}

/* Individual Radio Button div for correct alignment */
.radio-group > div {
    display: flex; /* Flex for inner alignment of input and label */
    align-items: center; /* Vertically center input and label */
}

/* Custom Radio Button Styling */
.radio-group input[type="radio"] {
    /* Hide the default radio button */
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    border: 2px solid #ffd700; /* Yellow border */
    border-radius: 50%; /* Make it round */
    margin-right: 8px; /* Space between radio button and its label */
    position: relative;
    cursor: pointer;
    outline: none;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

.radio-group input[type="radio"]:checked {
    background-color: #ffd700; /* Yellow fill when checked */
    border-color: #ffd700; /* Yellow border when checked */
}

.radio-group input[type="radio"]:checked::before {
    content: '';
    display: block;
    width: 10px;
    height: 10px;
    background-color: #1a1a1a; /* Dark dot in the center */
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.radio-group input[type="radio"]:focus {
    box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.3); /* Yellow focus ring */
}

/* Label for Radio Buttons */
.radio-group label {
    color: #f0f0f0; /* Light text for radio labels */
    font-weight: normal; /* Override default label bold */
    font-size: 1em; /* Adjust font size */
    cursor: pointer;
}

/* Dropdown (Select) Styling */
.form-select {
    width: 100%;
    padding: 12px 15px;
    background-color: #3a3a3a; /* Darker background */
    border: 1px solid #555; /* Subtle dark border */
    border-radius: 8px;
    color: #f0f0f0; /* Light text color */
    font-size: 1em;
    appearance: none; /* Remove default browser styling for select */
    -webkit-appearance: none;
    -moz-appearance: none;
    /* Custom dropdown arrow - ensure this path is correct if it's an actual SVG file,
       otherwise, use a data URI as shown for embedding */
    background-image: url('data:image/svg+xml;utf8,<svg fill="%23ffd700" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 20px;
    cursor: pointer;
    transition: border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
}

.form-select:focus {
    border-color: #ffd700; /* Yellow border on focus */
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.3); /* Yellow focus ring */
    background-color: #4a4a4a; /* Slightly lighter on focus */
}

.form-select option {
    background-color: #3a3a3a; /* Dark background for options */
    color: #f0f0f0; /* Light text for options */
}
    </style>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Yeni Görev Oluştur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
    <label class="form-label">Görev Türü</label><br>

    <div class="radio-group">
        <div>
            <input type="radio" id="personal" name="type" value="personal" {{ old('type', 'personal') === 'personal' ? 'checked' : '' }}>
            <label for="personal">Bireysel</label>
        </div>

        <div>
            <input type="radio" id="team" name="type" value="team" {{ old('type', $task->type ?? '') === 'team' ? 'checked' : '' }}>
            <label for="team">Takım</label>
        </div>
    </div>
</div>
<div class="mb-3" id="team-select-wrapper" style="display: none;">
    <label for="team_id" class="form-label">Takım Seç</label>
    <select name="team_id" id="team_id" class="form-select">
        <option value="">-- Takım Seçiniz --</option>
        @if($teams && count($teams) > 0)
    @foreach($teams as $team)
        <option value="{{ $team->id }}" {{ old('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
    @endforeach
@else
    <option value="">Takım bulunamadı</option>
@endif

    </select>
</div>
<div class="mb-3" id="assigned-users-wrapper" style="display: none;">
    <label class="form-label">Görevi Atayacağınız Üyeler</label>
    <ul class="list-group" id="members-list">
        <li class="list-group-item text-center text-muted">Takım seçilmedi</li>
    </ul>
</div>

</div>
        <div class="mb-3">
            <label for="title" class="form-label">Başlık</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Açıklama</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Son Teslim Tarihi</label>
            <input type="date" name="due_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Görevi Kaydet</button>
    </form>
</div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    const personalRadio = document.getElementById('personal');
    const teamRadio = document.getElementById('team');
    const teamSelectWrapper = document.getElementById('team-select-wrapper');
    const assignedUsersWrapper = document.getElementById('assigned-users-wrapper');
    const teamSelect = document.getElementById('team_id');
    const membersList = document.getElementById('members-list');

    // Görev türüne göre alanları göster/gizle
    function toggleTeamDropdown() {
        const isTeam = teamRadio.checked;
        teamSelectWrapper.style.display = isTeam ? 'block' : 'none';
        assignedUsersWrapper.style.display = isTeam ? 'block' : 'none';

        // Takım tipi seçilip bir takım seçiliyse üyeleri getir
        if (isTeam && teamSelect.value) {
            loadTeamMembers(teamSelect.value);
        } else {
            membersList.innerHTML = '<li class="list-group-item text-center text-muted">Takım seçilmedi</li>';
        }
    }

    // Takım üyelerini AJAX ile getir
    function loadTeamMembers(teamId) {
        fetch(`/teams/${teamId}/members`)
            .then(response => {
                if (!response.ok) throw new Error("Üyeler getirilemedi.");
                return response.json();
            })
            .then(users => {
                membersList.innerHTML = '';

                if (users.length > 0) {
                    users.forEach(user => {
                        const li = document.createElement('li');
                        li.className = 'list-group-item d-flex justify-content-between align-items-center';
                        li.innerHTML = `
                            <div>${user.name} (${user.email})</div>
                            <div><input type="checkbox" name="assigned_users[]" value="${user.id}"></div>
                        `;
                        membersList.appendChild(li);
                    });
                } else {
                    membersList.innerHTML = '<li class="list-group-item text-center text-muted">Üye bulunamadı</li>';
                }
            })
            .catch(error => {
                membersList.innerHTML = '<li class="list-group-item text-center text-danger">Üyeler getirilemedi</li>';
                console.error(error);
            });
    }

    // İlk açılışta tür kontrolü
    toggleTeamDropdown();

    // Tür değişince alanları güncelle
    personalRadio.addEventListener('change', toggleTeamDropdown);
    teamRadio.addEventListener('change', toggleTeamDropdown);

    // Takım değişince üyeleri yükle
    teamSelect.addEventListener('change', function () {
        const selectedTeamId = this.value;

        if (selectedTeamId) {
            loadTeamMembers(selectedTeamId);
        } else {
            membersList.innerHTML = '<li class="list-group-item text-center text-muted">Takım seçilmedi</li>';
        }
    });
});
</script>



</body>
</html>
