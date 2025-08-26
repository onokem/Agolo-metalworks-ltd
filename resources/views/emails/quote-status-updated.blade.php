<p style="font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:1.5;color:#111">
Hello {{ $data['quote']['first_name'] ?? 'Customer' }},<br><br>
The status of your quote request has been updated to: <strong>{{ ucfirst(str_replace('_',' ',$data['status'])) }}</strong>.<br><br>
We will keep you informed of further progress. If you have any questions just reply to this email.<br><br>
Regards,<br>Agolo Steelworks Team
</p>
