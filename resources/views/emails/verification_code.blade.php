<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Verification Code Request</title>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1
                                            style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">
                                            Verification Code for Your Email
                                        </h1>
                                        <p style="color:#455056; font-size:15px; margin:0; padding-top: 35px;">
                                            Here is the verification code for your email account:
                                        </p>
                                        <p
                                            style="background:#14FA36;text-decoration:none !important; font-weight:500; margin-top:20px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">
                                            @if ($type === 'verification')
                                                {{ $user->email_verification_code }}
                                            @else
                                                {{ $user->reset_verification_code }}
                                            @endif
                                        </p>
                                        <p style="color:#455056; font-size:14px; line-height:12px; margin:0;">
                                           All you have to do is use this verification code to complete the verification process.
                                        </p>
                                        <br>
                                        <p style="color:#455056; font-size:12px; line-height:12px; margin:0;">
                                            If you didn't request this verification code, your can ignore this message.
                                         </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                        <tr>
                            <td style="height:80px;">&nbsp;</td>
                        </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
