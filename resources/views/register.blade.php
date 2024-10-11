<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID Vaccine Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4 text-primary">Register for COVID-19 Vaccine</h1>

        <!-- Success message -->
        @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif

        <!-- Error messages -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Registration Form -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form action="{{ route('register.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nid">National ID (NID):</label>
                        <input type="text" name="nid" class="form-control" value="{{ old('nid') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="vaccine_center_id">Select Vaccine Center:</label>
                        <select name="vaccine_center_id" class="form-control" required>
                            @foreach($centers as $center)
                            <option value="{{ $center->id }}">{{ $center->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>

        <!-- Display Vaccination Statuses -->
        <h2 class="text-center mb-4 text-secondary">Vaccination Statuses</h2>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>NID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Vaccine Center</th>
                    <th>Scheduled Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($registrations->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">No registrations found</td>
                </tr>
                @else
                @foreach ($registrations as $registration)
                <tr>
                    <td>{{ $registration->nid }}</td>
                    <td>{{ $registration->name }}</td>
                    <td>{{ $registration->email }}</td>
                    <td>{{ $registration->vaccineCenter->name }}</td>
                    <td>{{ $registration->scheduled_date ?? 'Not Scheduled' }}</td>
                    <td>
                        <span class="badge {{ $registration->status == 'Vaccinated' ? 'badge-success' : ($registration->status == 'Scheduled' ? 'badge-warning' : 'badge-secondary') }}">
                            {{ $registration->status }}
                        </span>
                    </td>
                    <td>
                        @if($registration->status == 'Not scheduled')
                            <a href="{{ route('schedule.vaccinations', ['id' => $registration->id]) }}" class="btn btn-warning btn-sm mx-1">Set Schedule</a>
                        @elseif($registration->status == 'Scheduled')
                            <a href="{{ route('mark.vaccinated', ['id' => $registration->id]) }}" class="btn btn-success btn-sm mx-1">Mark as Vaccinated</a>

                        @else
                            <span class="text-success">Already Vaccinated</span>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
