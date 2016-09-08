<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        ul li {
            display: inline-block;
        }

        ul.top {
            background: blue;
            padding: 2em;
            color: white;
            text-align: center;
        }

        ul.bottom {
            background: gray;
            /*padding: 2em;*/
            color: white;
            text-align: center;
        }

        ul.bottom li {
            border: 1px solid black;
            height: 100%;
            display: inline-block;
            padding: 2em;
        }

        ul.top li {
            margin: 0 1em;
        }

        .content-background {
            background: url("http://www.mrwallpaper.com/wallpapers/airplane-flight-sunset.jpg") center center;
            padding: 0;
            background-size: cover;
            height: 500px;
        }

    </style>

</head>
<body>
@yield('content')
</body>
</html>
