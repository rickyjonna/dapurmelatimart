<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Small Mart Website">
    <meta name="author" content="Ricky Jonna M K">
    <title>Dapur Melati Mart</title>
    <!-- Vendors CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../vendors/fontawesome-pro-5/css/all.css">
    <link rel="stylesheet" href="../vendors/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../vendors/slick/slick.min.css">
    <link rel="stylesheet" href="../vendors/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" href="../vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../vendors/animate.css">
    <link rel="stylesheet" href="../vendors/mapbox-gl/mapbox-gl.min.css">
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="../css/themes.css">
    <!-- Favicons -->
    <link rel="icon" href="../favicon.ico">
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <header class="main-header">
        <div class="container">
            <div class="row  justify-content-center align-items-center">
                <a class="navbar-brand my-2" href="/">
                    <img src="images/logodapurmelati.png" alt="">
                </a>
            </div>
        </div>
    </header>

    @yield('main')

    <a href="https://api.whatsapp.com/send?phone={{ $wanumber->phone_number }}&text=%20&source=&data=" class="btn-hijau1" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <!-- Vendors scripts -->
    <script src="../vendors/jquery.min.js"></script>
    <script src="../vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.bundle.js"></script>
    <script src="../vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="../vendors/slick/slick.min.js"></script>
    <script src="../vendors/waypoints/jquery.waypoints.min.js"></script>
    <script src="../vendors/counter/countUp.js"></script>
    <script src="../vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="../vendors/hc-sticky/hc-sticky.min.js"></script>
    <script src="../vendors/jparallax/TweenMax.min.js"></script>
    <script src="../vendors/mapbox-gl/mapbox-gl.js"></script>
    <!-- Theme scripts -->
    <script src="../js/theme.js"></script>
</body>
</html>