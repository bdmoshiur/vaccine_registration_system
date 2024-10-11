<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Scheduled</title>
</head>
<body>
    <p>Dear {{ $registration->name }},</p>
    <p>Your COVID-19 vaccine has been scheduled on <strong>{{ $registration->scheduled_date }}</strong> at <strong>{{ $registration->vaccineCenter->name }}</strong>.</p>
    <p>Thank you for registering, and we look forward to helping you stay safe during these challenging times.</p>
</body>
</html>
