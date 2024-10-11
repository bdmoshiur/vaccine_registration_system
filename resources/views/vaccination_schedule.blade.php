<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Scheduling</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Vaccination Schedule</h1>

        <!-- Display the success message -->
        @if (isset($message))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <!-- Display the scheduled date -->
        @if (isset($scheduledDate))
            <div class="mb-4">
                <strong>Scheduled Date:</strong> {{ $scheduledDate }}
            </div>
        @endif

        <!-- Button to go back -->
        <div class="text-center">
            <a href="{{ route('register.form') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
