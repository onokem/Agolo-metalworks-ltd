<p style="font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:1.5;color:#111">
Hello {{ $data['quote']['first_name'] ?? 'Customer' }},<br><br>
You have a new update regarding your quote request:<br><br>
<blockquote style="border-left:4px solid #1d4ed8;padding:8px 12px;margin:0 0 16px;background:#f1f5f9;">
{{ $data['message'] }}
</blockquote>
Reply to this email if you have any questions.<br><br>
Regards,<br>Agolo Steelworks Team
</p>
