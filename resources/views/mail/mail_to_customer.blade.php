<!DOCTYPE html>
<html>
<head>
    <title>VOA+ | Email Verification</title>
</head>
<body>

<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
    <div style="margin:50px auto;width:70%;padding:20px 0">
        <div style="border-bottom:1px solid #eee">
            <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">SELLIT.LK</a>
        </div>
        <p style="font-size:1.1em">Hi {{$data['contact_name']}},</p>
        <p>Thank you for choosing Sellit. some customer try to contact you for discuss about you posted advertistment. </p>
        <div style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
            <h5>Name: {{$data['visitor_name']}}</h5>
            <h5>Email: {{$data['visitor_email']}}</h5>
            <h5>Mobile Number: {{$data['visitor_mobile']}}</h5>
        </div>
        <div style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
            <h5>Message</h5>
            <p> {{$data['visitor_message']}}</p>
        </div>
        <div style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
            <h5>Ad Details</h5>
            <p> Ad ID: {{$data['ad_id']}}</p>
            <p> Ad Title: {{$data['tittle']}}</p>
        </div>
        <p style="font-size:0.9em;">Regards,<br />Sellit</p>
        <hr style="border:none;border-top:1px solid #eee" />
        <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
            <p>Sellit</p>
            <p></p>
            <!--CONTACT DETAILS HERE-->
        </div>
    </div>
</div>

</body>
</html>



