<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 {{-- BCS3453 [PROJECT]-SEMESTER 2324/1
 Student ID: CB21134
 Student Name: Yattish A/L Jaya Nanda Kumar --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> NothingTracker</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .min-h-screen {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .category-card {
            box-shadow: #2d2d2d 4px 3px 10px 0px;
        }

        .styled-table {
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #f67402;
        }



        .styled-table thead th {
            color: rgb(0, 0, 0);
            background-color: #f67402 !important;
        }

        .bi-trash3 {
            font-size: 25px;
            color: red
        }

        .categorysubmitbtn {
            background-color: #f67402 !important;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        footer {

            margin-top: 20px;
            bottom: 0;
            width: 100%;

        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}

        </main>
        <footer class="bg-body-tertiary text-center text-lg-start" style="background-color: #f7f7f7 !important;">
            <!-- Copyright -->
            <div class="text-center p-3 fw-bold" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2024 Nothing Tracker
            </div>
            <!-- Copyright -->
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>
