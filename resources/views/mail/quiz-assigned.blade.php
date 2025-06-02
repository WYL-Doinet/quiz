<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Assigned</title>
    <style type="text/css">
        /* Embora o ideal seja inline, alguns resets e estilos base podem ficar aqui para referência e fallback, mas o principal será inlined. */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #f4f4f4; }

        /* Estilos responsivos (idealmente com media queries, mas para emails simples, focamos em layout fluido) */
        @media screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
                margin: auto !important;
            }
            .fluid {
                width: 100% !important;
                height: auto !important;
                max-width: 100% !important;
                line-height: inherit !important;
            }
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            .stack-column-center {
                text-align: center !important;
            }
            /* Ajustes de botão para mobile */
            .button-td,
            .button-a {
                width: 100% !important;
                text-align: center !important;
            }
            .button-a a {
                display: block !important;
                width: auto !important; /* Botão se estica, mas o texto dentro não precisa ter 100% width */
            }
        }
    </style>
</head>
<body style="margin: 0 !important; padding: 0 !important; background-color: #f4f4f4;">
    <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
        You've been assigned a new quiz: {{ $title }}!
    </div>

    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
        <tr>
            <td style="background-color: #ffffff; padding: 20px 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="font-family: Arial, sans-serif; font-size: 24px; color: #333333; font-weight: bold; padding-bottom: 15px;">
                            Hello {{ $name }},
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; font-size: 16px; color: #555555; line-height: 1.6; padding-bottom: 15px;">
                            You have been assigned a new quiz.
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 15px;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f9f9f9; border-left: 4px solid #2196F3; padding: 15px;">
                                <tr>
                                    <td style="font-family: Arial, sans-serif; font-size: 16px; color: #333333;">
                                        <strong style="color: #2196F3;">Quiz Title:</strong> {{ $title }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; font-size: 16px; color: #555555; line-height: 1.6; padding-bottom: 10px;">
                            <strong>Assigned By:</strong> Lara Quiz Admin Team
                        </td>
                    </tr>
                    {{--
                    <tr>
                        <td style="font-family: Arial, sans-serif; font-size: 16px; color: #555555; line-height: 1.6; padding-bottom: 25px;">
                            <strong>Due Date:</strong> {{ $quiz->due_date->format('F j, Y') }}
                        </td>
                    </tr>
                    --}}
                    <tr>
                        <td style="font-family: Arial, sans-serif; font-size: 16px; color: #555555; line-height: 1.6; padding-bottom: 15px;">
                            You can start the quiz using our app.
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; font-size: 16px; color: #555555; line-height: 1.6; padding-bottom: 5px;">
                            If you don't have the app, download it below:
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px 0 25px 0; text-align: center;" class="button-td">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
                                <tr>
                                    <td align="center" style="border-radius: 5px; background-color: #2196F3;" class="button-a">
                                        <a href="http://127.0.0.1:8000/app" target="_blank" style="font-family: Arial, sans-serif; font-size: 16px; font-weight: bold; color: #ffffff; text-decoration: none; padding: 12px 25px; border-radius: 5px; display: inline-block; border: 1px solid #2196F3;">
                                            Download App
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; font-size: 16px; color: #555555; line-height: 1.6; padding-bottom: 15px;">
                            Good luck!
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; font-size: 16px; color: #555555; line-height: 1.6;">
                            Regards,<br>Lara Quiz Admin Team
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 30px; text-align: center; font-family: Arial, sans-serif; font-size: 12px; color: #888888;">
                You are receiving this email because you have been assigned a quiz by the Lara Quiz Admin Team.
                <br>
                </td>
        </tr>
    </table>
</body>
</html>