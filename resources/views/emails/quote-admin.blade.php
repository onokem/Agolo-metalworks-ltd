<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Quote Request - Admin Notification</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #2563eb; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; }
        .footer { text-align: center; padding: 20px; color: #666; }
        .detail { margin: 10px 0; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Quote Request</h1>
        </div>
        <div class="content">
            <p>A new quote request has been submitted:</p>
            
            <div class="detail">
                <span class="label">Name:</span> {{ $data['name'] }}
            </div>
            <div class="detail">
                <span class="label">Email:</span> {{ $data['email'] }}
            </div>
            <div class="detail">
                <span class="label">Phone:</span> {{ $data['phone'] }}
            </div>
            @if(isset($data['company']))
            <div class="detail">
                <span class="label">Company:</span> {{ $data['company'] }}
            </div>
            @endif
            <div class="detail">
                <span class="label">Project Type:</span> {{ $data['project_type'] }}
            </div>
            <div class="detail">
                <span class="label">Project Description:</span><br>
                {{ $data['project_description'] }}
            </div>
            <div class="detail">
                <span class="label">Timeline:</span> {{ $data['timeline'] }}
            </div>
            <div class="detail">
                <span class="label">Budget Range:</span> {{ $data['budget'] }}
            </div>
        </div>
        <div class="footer">
            <p>This is an automated message from Agolo Steelworks Quote System</p>
        </div>
    </div>
</body>
</html>
