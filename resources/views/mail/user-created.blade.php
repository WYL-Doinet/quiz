<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Account Has Been Created - [Your Company Name]</title>
    <style type="text/css">
        /* Basic reset for email clients */
        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            font-family: Arial, Helvetica, sans-serif;
            /* Fallback fonts for email */
            background-color: #f4f7f6;
            /* Light gray background */
        }

        table {
            border-spacing: 0;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        table td {
            border-collapse: collapse;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        a {
            text-decoration: none;
            color: #1e88e5;
            /* Link color */
        }

        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            .full-width-table {
                width: 100% !important;
            }

            .content-padding {
                padding: 20px !important;
            }

            .header-text {
                font-size: 24px !important;
            }

            .body-text {
                font-size: 15px !important;
            }

            .button {
                padding: 10px 18px !important;
                font-size: 14px !important;
            }

            .mobile-hide {
                display: none !important;
            }

            .mobile-show {
                display: block !important;
            }
        }
    </style>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f7f6; font-family: Arial, Helvetica, sans-serif;">
    <center>
        <table border="0" cellpadding="0" cellspacing="0" width="100%"
            style="table-layout: fixed; background-color: #f4f7f6;">
            <tr>
                <td align="center" style="padding: 20px 0;">
                    <table border="0" cellpadding="0" cellspacing="0" class="full-width-table" width="600"
                        style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                        <tr>
                            <td align="center"
                                style="background-color: #312c85; padding: 30px 20px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                                <h1 class="header-text"
                                    style="font-size: 28px; color: #ffffff; margin: 0; padding: 0; line-height: 1.2;">
                                    Welcome to Lara Quiz!</h1>
                            </td>
                        </tr>

                        <tr>
                            <td class="content-padding"
                                style="padding: 40px 30px; color: #333333; font-size: 16px; line-height: 1.6;">
                                <p style="margin-top: 0; margin-bottom: 20px;">Hello {{ $user->name }},</p>

                                <p style="margin-bottom: 20px;">
                                    Your account on <strong>{{ $user->name }}</strong> has been successfully created
                                    by our administrator, Lara Quiz Admin.
                                </p>

                                <p style="margin-bottom: 20px;">
                                    You can now log in using the following credentials:
                                </p>

                                <p style="margin-bottom: 5px; font-weight: bold;">Username: {{ $user->email }}</p>
                                <p style="margin-bottom: 20px; font-weight: bold;">Temporary Password:
                                    {{ $password }}</p>

                                <p style="margin-bottom: 20px; color: #cc0000; font-weight: bold;">
                                    For your security, we strongly recommend that you change your password immediately
                                    after your first login.
                                </p>

                                <table border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 20px;">
                                    <tr>
                                        <td align="center" style="background-color: #312c85; border-radius: 5px;">
                                            <a :href="{{ route('app.download') }}" target="_blank"
                                                style="font-size: 16px; font-weight: bold; color: #ffffff; text-decoration: none; padding: 12px 25px; border-radius: 5px; display: inline-block;"
                                                class="button">
                                                Log In Now
                                            </a>
                                        </td>
                                    </tr>
                                </table>

                                <p style="margin-bottom: 0;">If you have any questions, please don't hesitate to contact
                                    us.</p>
                                <p style="margin-top: 20px; font-weight: bold;">The Lara Quiz Team</p>
                            </td>
                        </tr>

                        <tr>
                            <td align="center" class="content-padding"
                                style="background-color: #eeeeee; padding: 25px 30px; color: #777777; font-size: 12px; line-height: 1.5; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                                <p style="margin-top: 0; margin-bottom: 5px;">&copy; 2025 The Lara Quiz Team. All
                                    rights reserved.</p>
                                <p style="margin-top: 5px; margin-bottom: 0;">
                                    <a href="[Link to Privacy Policy]" target="_blank"
                                        style="color: #777777; text-decoration: underline;">Privacy Policy</a> |
                                    <a href="[Link to Terms of Service]" target="_blank"
                                        style="color: #777777; text-decoration: underline;">Terms of Service</a>
                                </p>
                                <p style="margin-top: 5px; margin-bottom: 0;">[Your Company Address, if applicable]</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
