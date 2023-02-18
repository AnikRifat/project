<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>iofrm</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/auth') }}/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/auth') }}/css/fontawesome-all.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/auth') }}/css/iofrm-style.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/auth') }}/css/iofrm-theme27.css">
    </head>

    <body>
        @yield('content')
        <script src="{{ asset('/assets/auth') }}/js/jquery.min.js"></script>
        <script src="{{ asset('/assets/auth') }}/js/popper.min.js"></script>
        <script src="{{ asset('/assets/auth') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('/assets/auth') }}/js/main.js"></script>
    </body>

</html>
