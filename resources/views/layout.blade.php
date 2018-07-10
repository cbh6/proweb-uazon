<!doctype html>
<html lang="es">
<head>
    <!-- Charset -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO -->
    <title>{{ $seo_title }} | Uazon</title>
    <!-- <meta name="description" content="Lo primero que he de decir de esta novela es que se trata sin duda de la peor del autor, al menos para mi gusto."> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../assets/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="../assets/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="../assets/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="../assets/images/favicon128x128.png" sizes="128x128">
    <link rel="icon" type="image/png" href="../assets/images/favicon196x196.png" sizes="196x196">

    <link rel="apple-touch-icon" href="{{ asset('/images/favicon120x120.png') }}">
    <link rel="apple-touch-icon" href="../assets/images/favicon180x180.png" sizes="180x180">
    <link rel="apple-touch-icon" href="../assets/images/favicon152x152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="../assets/images/favicon167x167.png" sizes="167x167">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Uazon">
    <meta property="og:url" content="uazon.com">
    <meta property="og:title" content="Crítica de Origen de Dan Brown">
    <meta property="og:description" content="Lo primero que he de decir de esta novela es que se trata sin duda de la peor del autor, al menos para mi gusto.">
    <meta property="og:image" content="../uploads/reviews/origen-dan-brown-open-graph.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpg">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- <style type="text/css" rel="stylesheet">
        /* <?php echo file_get_contents('assets/styles/main.css') ?> */
    </style> -->
    <link href="{{ asset('assets/styles/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles/home.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles/libros.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles/autores.css') }}" rel="stylesheet">
</head>
<body>

<!-- Main Header -->
@include('common.header')

<!-- Main Content -->
<main>
    @yield('content')
    @stack('list')
</main>

<!-- Main Footer -->
@include('common.footer')

</body>
</html>

