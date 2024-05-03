<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Notification</title>
    {{-- <style>
        .app{
            width: 60%;margin: 20px auto;background-color: rgb(241, 240, 236);
        }
        span{color: red; font-family: Verdana, Geneva, Tahoma, sans-serif;}
        .header{
            display: flex;align-items: center;justify-content: space-between;width: 90%;margin: 0 auto;padding: 10px 0;
            .leftDiv{
                display: flex;align-items: center;gap: 10px;
                img{
                    width: 70px;height: 70px;border-radius: 100%;
                }
                h1{
                    font-size: 2.4rem;-family:cursive;
                }
            }
            .rightDiv{
                font-size: x-large;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
            }
        }
        table{
            width: 90%;margin: 0 auto;font-size: x-large;text-align: left;padding: 30px 0;
            th{
                min-width: 200px;padding: 8px 0;
            }
        }
        footer{
            text-align: center;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-size: 20px;padding: 0 0 5px 0;
        }
    </style> --}}
</head>
<body>
    <div style="width: 60%;margin: 20px auto;background-color: rgb(241, 240, 236);">
        <header style="width:90%;margin:0 auto;">
            <table style="width: 100%;">
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <img src="https://www.europarl.europa.eu/resources/library/images/20230607PHT95601/20230607PHT95601_original.jpg" alt="logo" style="width: 70px;height: 70px;border-radius: 100%;">
                                </td>
                                <td>
                                    <h1 style="font-size: 2.4rem;-family:cursive;color:black;padding-left:15px">a<span style="color: red; font-family: Verdana, Geneva, Tahoma, sans-serif;">I</span>nfluence</h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <div style="font-size: x-large;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;color:black;float:right;">Le {{ $data['date_time'] }}</div>
                    </td>
                </tr>
            </table>
        </header>
        <hr>
        <table style="width: 90%;margin: 0 auto;font-size: x-large;text-align: left;padding: 30px 0;">
            <tr>
                <th style="min-width: 200px;padding: 8px 0;color:black;">From :</th>
                <td style="color:black;">{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th style="min-width: 200px;padding: 8px 0;color:black;">To :</th>
                <td style="color:black;">{{ $data['mailTo'] }}</td>
            </tr>
            <tr>
                <th style="min-width: 200px;padding: 8px 0;color:black;">Name :</th>
                <td style="color:black;">{{ $data['nom'] }}</td>
            </tr>
            <tr>
                <th style="min-width: 200px;padding: 8px 0;color:black;">Phone :</th>
                <td style="color:black;">{{ $data['telephone'] }}</td>
            </tr>
            <tr>
                <th style="min-width: 200px;padding: 8px 0;color:black;display:flex;justify-content:flex-start;">Message :</th>
                <td style="color:black;padding: 8px 0 0 0;">{{ $data['message'] }}</td>
            </tr>
        </table>
        <hr>
        <footer style="text-align: center;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-size: 20px;padding: 0 0 5px 0;color:black;">
            <p>© 2024 | a<span style="color: red; font-family: Verdana, Geneva, Tahoma, sans-serif;">I</span>nfluence Tous droits réservés</p>
        </footer>
    </div>
</body>
</html>
