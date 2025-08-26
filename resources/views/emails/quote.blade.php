@php($d = $data)
<h2>New Quote Request</h2>
<ul>
    <li><strong>Service:</strong> {{ $d['service'] ?? '' }}</li>
    <li><strong>Timeline:</strong> {{ $d['timeline'] ?? '' }}</li>
    <li><strong>Budget:</strong> {{ $d['budget'] ?? '' }}</li>
    <li><strong>Location:</strong> {{ $d['location'] ?? '' }}</li>
    <li><strong>Site Access:</strong> {{ $d['access'] ?? '' }}</li>
    <li><strong>Details:</strong> {{ $d['details'] ?? '' }}</li>
    <li><strong>First Name:</strong> {{ $d['first_name'] ?? '' }}</li>
    <li><strong>Last Name:</strong> {{ $d['last_name'] ?? '' }}</li>
    <li><strong>Email:</strong> {{ $d['email'] ?? '' }}</li>
    <li><strong>Phone:</strong> {{ $d['phone'] ?? '' }}</li>
</ul>
