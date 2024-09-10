<!DOCTYPE html>
<html lang="en" dir="ltr" data-color-theme="light">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<style>
html, body {
    margin: 0;
    height: 100%;
}

body {
    display: flex;
    flex-direction: column;
}

.flex-grow {
    flex-grow: 1;
}

.sidebar {
    /* Adjust width and any other sidebar styling here */
}

.body-content {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.header {
    /* Styling for the header */
}

.content {
    /* Styling for the main content */
}

.footer {
    /* Styling for the footer */
}


    </style>


</style>


<body class="bg-gray-100 h-screen flex flex-col">
    <div class="flex flex-grow">
        <!-- Sidebar -->
        <aside class="sidebar w-64 bg-white shadow-md">
            @include('layouts.sidebar')
        </aside>

        <!-- Main Content -->
        <section class="body-content flex-grow flex flex-col">
            <!-- Header -->
            <header class="header bg-gray-200 text-center p-4">
                @include('layouts.navigation')
            </header>

            <!-- Body -->
            <main class="content flex-grow p-4 w-full">
                @yield('body')
            </main>

            <footer class="footer w-full bg-gray-200 text-center p-2">
                @include('layouts.footer')
            </footer>
        </section>
       
    </div>

    <!-- Footer -->
    
</body>

   
</body>

</html>
