<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>จองหอประชุม {{ isset($title) ? '| ' . $title : '' }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Ionicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.jpg') }}">
    <!-- Tempusdominus Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- sweetalert2 -->
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        html {
            position: relative;
            min-height: 100%;
            padding-bottom: 120px;
        }

        body {
            margin-bottom: 120px;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .modal label span {
            color: red
        }

        ::-webkit-scrollbar {
            background-color: #91919150;
            width: 10px;
            cursor: auto;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #919191;
            border-radius: 8px;
        }

        .carousel ::-webkit-scrollbar {
            background-color: #91919150;
            width: 4px;
        }

        .carousel ::-webkit-scrollbar-thumb {
            background-color: #91919150;
            border-radius: 8px;
        }

        .carousel .carousel-item {
            width: 100%;
            max-height: 500px;
            border-top: 10px solid transparent;
        }

        .carousel .carousel-indicators {
            position: static !important;
            display: block !important;
            width: 100%;
            max-height: 150px;
            margin-right: 0;
            margin-bottom: 1rem;
            margin-left: 0;
            margin-top: 0px;
            z-index: 0 !important;
        }

        .carousel .carousel-indicators [data-bs-target].active {
            opacity: 1;
        }

        .carousel .carousel-indicators [data-bs-target] {
            width: 100%;
            height: 100%;
        }

        @media only screen and (max-width: 600px) {
            .fc .fc-toolbar.fc-header-toolbar {
                margin-bottom: 1.5em;
                text-align: center;
                width: 100%;
            }

            .fc .fc-toolbar-title {
                font-size: 1rem;
                margin-bottom: 10px;
                margin-top: 10px
            }

            .fc .fc-toolbar {
                display: block;
            }
        }
    </style>
</head>

<body>


    @include('navbar')
    <div class="container">
        @include('sweetalert::alert')
        @yield('content-header')
        @yield('body')
    </div>
    @include('footer')



    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>


</body>

</html>
