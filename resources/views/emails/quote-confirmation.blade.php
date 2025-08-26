<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quote Request Confirmation - Agolo Steelworks</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #2563eb; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; }
        .footer { text-align: center; padding: 20px; color: #666; }
        .thank-you { font-size: 1.2em; color: #2563eb; margin: 20px 0; }
        .next-steps { background: #f3f4f6; padding: 15px; border-radius: 5px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Quote Request Received</h1>
        </div>
        <div class="content">
            <p class="thank-you">Thank you for your interest in Agolo Steelworks!</p>
            
            <p>We have received your quote request and our team will review it shortly. Here's a summary of the information you provided:</p>
            
            <div class="detail">
                <strong>Project Type:</strong> {{ ucfirst($data['project_type']) }}
            </div>
            <div class="detail">
                <strong>Timeline:</strong> {{ $data['timeline'] }}
            </div>
            <div class="detail">
                <strong>Budget Range:</strong> {{ $data['budget'] }}
            </div>
            
            <div class="next-steps">
                <h3>What's Next?</h3>
                <p>Our team will review your request and contact you within 1-2 business days to discuss your project in detail. If you have any immediate questions, please don't hesitate to contact us:</p>
                <ul>
                    <li>Phone: (555) 123-4567</li>
                    <li>Email: contact@agolo-steelworks.com</li>
                </ul>
            </div>
        </div>
        <div class="footer">
            <p>Thank you for choosing Agolo Steelworks</p>
            <small>This is an automated confirmation message. Please do not reply to this email.</small>
        </div>
    </div>
</body>
</html>
