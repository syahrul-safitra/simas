<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    {{-- <meta content="" name="keywords">
    <meta content="" name="description"> --}}

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }} rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        trix-toolbar [data-trix-button-group='file-tools'] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">


        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            @yield('container')
        </div>


    </div>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src={{ asset('js/main.js') }}></script>

    {{-- Sweet Alert --}}
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    {{-- My JS Script --}}
    <script src="{{ asset('js/myScript.js') }}"></script>
</body>



</html>
