<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Message</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>*Reason Canceling Appointment</h2>
        <!-- Form to create a message -->
        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Specific Patients:</label>
                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter User ID">
            </div>
            <div class="form-group">
                <label for="content">Message Content:</label>
                <textarea class="form-control" id="content" name="content" rows="3"
                    placeholder="Enter Message Content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
        <!-- Display flash message if exists -->
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif
    </div>
</body>

</html>