<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        .header, .footer {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            border-radius: 10px 10px 0 0;
        }
        .footer {
            border-radius: 0 0 10px 10px;
        }
        .content {
            padding: 20px;
        }
        .details {
            margin: 20px 0;
        }
        .details div {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Registration Confirmation</h2>
        </div>
        <div class="content">
            <p>Welcome!</p>
            <p>Your login credentials for Qastarat & Dawali Clinics</p>
            <p>Dear {{ $name }},</p>
            <p>Here are your login details to access the portal:</p>
            <div class="details">
                <div><strong>Email:</strong> {{ $email }}</div>
                <div><strong>Password:</strong> {{ $password }}</div>
            </div>
            <p><strong>Note:</strong> You can change your password in the profile settings if needed.</p>
            <p>Best regards,</p>
            <p>Qastarat & Dawali Clinics</p>
        </div>
        <div class="footer">
            <table style="width:100%;max-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody>
                    <tr>
                        <td bgcolor="#F4F4F4" align="center">
                            <table class="row" style="width:600px;max-width:600px;" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody>
                                    <tr>
                                        <td bgcolor="#19276d" align="center">
                                            <table class="row" style="width:540px;max-width:540px;" width="540" cellspacing="0" cellpadding="0" border="0" align="center">
                                                <tbody>
                                                    <tr>
                                                        <td class="container-padding" align="center">
                                                            <table class="row" style="width:540px;max-width:540px;" width="540" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center">
                                                                            <table style="width:100%; max-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td height="40">&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="20">&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="font-family:'Roboto', Arial, Helvetica, sans-serif;font-size: 13px;color: #fff;line-height: 19px" align="center">
                                                                                            You are receiving this email because you are subscribed to our mailing list.<br>
                                                                                            For any questions please send to
                                                                                            <a href="mailto:info@qastaratclinics.it" style="color: #fff;">info@qastaratclinics.it</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>&nbsp;</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
