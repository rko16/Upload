<p>Dear {{ $details['username'] }},</p>
<p>We are pleased to confirm that we have received your order. Below are the details of your booking:</p>
<p>Project ID: {{ $details['projectID'] }}</p>
<p>Order Date: {{ $details['date'] }}</p>
@if(isset($customeradd))
<p>Installation Address: {{ $customeradd }}</p>
@endif
<p>Order Summary:</p>
<!-- <p>Solar System Type: [Type of Installation] [Type of Rooftop]</p> -->
@if(isset($projectcap))
<p>Capacity:  {{ $projectcap }}<p>
@endif
<p>Keep checking your installation update through your Roofsol Home Login Portal.</p>
<p>If you have any questions or need further assistance, please do not hesitate to contact our team at info@roofsol.com or 7439831565</p>
<p>Thank you for choosing us to power your home with clean, sustainable energy. </p>

<p>Best regards,</p>

<p>Roofsol Home</p>
<p>www.roofsolhomes.com</p>
