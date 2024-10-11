<!DOCTYPE html>
<html>
<head>
    <title>Vaccine Appointment Scheduled</title>
</head>
<body>
    <h1>Dear {{ $registration->name }},</h1>
    <p>Your vaccine appointment has been scheduled at {{ $registration->vaccineCenter->name }}.</p>
    <p>The appointment date is {{ $registration->scheduled_date }}.</p>
    <p>Thank you for registering!</p>
</body>
</html>
