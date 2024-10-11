<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Status Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Vaccination Status Update</h1>

    <!-- Flash Message -->
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Display Updated Registrations -->
    @if(isset($updatedRegistrations))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Scheduled Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $updatedRegistrations->nid }}</td>
                    <td>{{ $updatedRegistrations->name }}</td>
                    <td>{{ $updatedRegistrations->email }}</td>
                    <td>{{ $updatedRegistrations->scheduled_date }}</td>
                    <td>{{ $updatedRegistrations->status }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No registrations were updated.</p>
    @endif

    <!-- Back Button -->
    <div class="text-center mt-4">
        <a href="{{ route('register.form') }}" class="btn btn-primary">Go Back</a>
    </div>
</div>

</body>
</html>
