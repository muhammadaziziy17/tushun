<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="uz">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TUSHUN - Parolni tiklash</title>
</head>

<body style="margin: 0; padding: 0; background-color: #eef2f7; font-family: Georgia, 'Times New Roman', serif;">

    {{-- Outer wrapper --}}
    <table border="0" cellpadding="0" cellspacing="0" width="100%"
        style="background-color: #eef2f7; padding: 48px 16px;">
        <tr>
            <td align="center">

                {{-- Card --}}
                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                    style="max-width: 520px; background-color: #ffffff; border-radius: 16px; overflow: hidden; border: 1px solid #d8e3ef;">

                    {{-- TOP ACCENT BAR --}}
                    <tr>
                        <td style="height: 5px; background-color: #0b3860; font-size: 0; line-height: 0;">&nbsp;</td>
                    </tr>

                    {{-- HEADER --}}
                    <tr>
                        <td align="center" style="padding: 36px 40px 28px 40px; background-color: #ffffff;">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="vertical-align: middle; padding-right: 12px;">
                                        <img src="{{ $message->embed(public_path('images/logo_without_bg.png')) }}"
                                            alt="Tushun Logo" width="38" height="38"
                                            style="display: block; border: 0;" />
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <span
                                            style="font-family: Georgia, serif; font-size: 22px; font-weight: bold; color: #0b3860; letter-spacing: 3px; text-transform: uppercase;">TUSHUN</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- DIVIDER LINE --}}
                    <tr>
                        <td style="padding: 0 40px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="height: 1px; background-color: #e8eef5; font-size: 0; line-height: 0;">
                                        &nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- HERO SECTION --}}
                    <tr>
                        <td align="center" style="padding: 40px 40px 0 40px; background-color: #ffffff;">

                            {{-- Lock icon circle --}}
                            <table border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto 28px auto;">
                                <tr>
                                    <td align="center"
                                        style="width: 88px; height: 88px; background-color: #f0f6ff; border-radius: 50%; border: 2px solid #c8daf0; text-align: center; vertical-align: middle; padding: 0;">
                                        <span style="font-size: 36px; line-height: 88px; display: block;">🔐</span>
                                    </td>
                                </tr>
                            </table>

                            {{-- Badge label --}}
                            <table border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto 20px auto;">
                                <tr>
                                    <td align="center"
                                        style="background-color: #f0f6ff; border: 1px solid #c8daf0; border-radius: 20px; padding: 5px 16px;">
                                        <span
                                            style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold; color: #0b3860; letter-spacing: 2px; text-transform: uppercase;">PAROLNI
                                            TIKLASH</span>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- BODY CONTENT --}}
                    <tr>
                        <td style="padding: 0 48px 40px 48px; background-color: #ffffff; text-align: center;">

                            <h2
                                style="margin: 0 0 14px 0; font-family: Georgia, serif; color: #0a2d4d; font-size: 24px; font-weight: bold; line-height: 1.3;">
                                Assalomu alaykum, {{ $name }}!</h2>

                            <p
                                style="margin: 0 0 32px 0; font-family: Arial, Helvetica, sans-serif; color: #5a7a96; font-size: 15px; line-height: 1.7;">
                                TUSHUN hisobingiz uchun parolni tiklash so'rovi yuborildi.<br />
                                Parolingizni yangilash uchun quyidagi tugmani bosing.
                            </p>

                            {{-- CTA Button --}}
                            <table border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto 32px auto;">
                                <tr>
                                    <td align="center"
                                        style="background-color: #0b3860; border-radius: 10px; box-shadow: 0 4px 14px rgba(11,56,96,0.3);">
                                        <a href="{{ $url }}" target="_blank"
                                            style="display: inline-block; padding: 16px 44px; color: #ffffff; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 15px; letter-spacing: 0.5px;">
                                            Parolni yangilash &rarr;
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            {{-- URL fallback box --}}
                            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="margin-bottom: 32px;">
                                <tr>
                                    <td
                                        style="background-color: #f7fafd; border: 1px dashed #c8daf0; border-radius: 8px; padding: 14px 16px; text-align: left;">
                                        <p
                                            style="margin: 0 0 4px 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold; color: #94afc7; letter-spacing: 1px; text-transform: uppercase;">
                                            Tugma ishlamasa, ushbu havolani oching:</p>
                                        <p
                                            style="margin: 0; font-family: 'Courier New', Courier, monospace; font-size: 11px; color: #0b3860; word-break: break-all;">
                                            {{ $url }}</p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Warning notice --}}
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td
                                        style="background-color: #fffbf0; border-left: 3px solid #f59e0b; border-radius: 0 8px 8px 0; padding: 12px 16px; text-align: left;">
                                        <p
                                            style="margin: 0; font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #92700a; line-height: 1.5;">
                                            ⚠️ &nbsp;Agar siz bu so'rovni yubormagan bo'lsangiz, bu xabarni e'tiborsiz
                                            qoldiring. Parolingiz o'zgarmaydi.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- BOTTOM ACCENT BAR --}}
                    <tr>
                        <td style="height: 3px; background-color: #0b3860; font-size: 0; line-height: 0;">&nbsp;</td>
                    </tr>

                </table>
                {{-- END Card --}}

                {{-- Footer --}}
                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                    style="max-width: 520px; margin-top: 24px;">
                    <tr>
                        <td align="center" style="padding: 0 20px;">

                            {{-- Stats row --}}
                            <table border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto 16px auto;">
                                <tr>
                                    <td align="center" style="padding: 0 12px; border-right: 1px solid #c8d8e8;">
                                        <a href="https://t.me/ismlvmz"
                                            style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #0b3860; text-decoration: none;">💬
                                            Qo'llab-quvvatlash</a>
                                    </td>
                                    <td align="center" style="padding: 0 12px;">
                                        <span
                                            style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #94a3b8;">🔒
                                            Xavfsiz aloqa</span>
                                    </td>
                                </tr>
                            </table>

                            <p
                                style="margin: 0; font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #b0bec5; text-transform: uppercase; letter-spacing: 1.5px;">
                                &copy; 2026 TUSHUN &mdash; Muhammadaziz tomonidan yaratilgan
                            </p>
                        </td>
                    </tr>
                </table>
                {{-- END Footer --}}

            </td>
        </tr>
    </table>

</body>

</html>
