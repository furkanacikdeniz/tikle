<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Takım Oluştur</title>
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

/* --- New Styles for the Form Page --- */

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

/* Textarea specific adjustments */
textarea.form-control {
    min-height: 120px; /* Make textarea larger for more content */
    resize: vertical; /* Allow vertical resizing only */
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
    </style>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Yeni Takım Oluştur</h1>

    <form action="{{ route('teams.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Takım Adı</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Takımı Oluştur</button>
    </form>
</div>
@endsection

</body>
</html>
