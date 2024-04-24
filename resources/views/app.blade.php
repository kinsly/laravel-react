<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charSet="utf-8"/>
        <title inertia>Fruitables - Vegetable Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="keywords"/>
        <meta content="" name="description"/>

        {{-- {/* <!-- Google Web Fonts --> */} --}}
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin=""/>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"/> 

        {{-- {/* <!-- Icon Font Stylesheet --> */} --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"/>

        {{-- {/* <!-- Libraries Stylesheet --> */} --}}
        <link href="/theme/lib/lightbox/css/lightbox.min.css" rel="stylesheet"/>
        <link href="/theme/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"/>


        {{-- {/* <!-- Customized Bootstrap Stylesheet --> */} --}}
        <link href="/theme/css/bootstrap.min.css" rel="stylesheet"/>

        {{-- {/* <!-- Template Stylesheet --> */} --}}
        <link href="/theme/css/style.css" rel="stylesheet"/>

        <!-- Scripts -->

       

        @routes
        @viteReactRefresh
        @vite(['resources/js/app.tsx', "resources/js/Pages/{$page['component']}.tsx"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        
        {{-- Spinner Start --}}
         {{-- <div
                id="spinner"
            className="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center"
        >
            <div className="spinner-grow text-primary" role="status" />
        </div> --}}
        {{-- Spinner End --}}

        @inertia

        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/theme/lib/easing/easing.min.js"></script>
        <script src="/theme/lib/waypoints/waypoints.min.js"></script>
        <script src="/theme/lib/lightbox/js/lightbox.min.js"></script>
        <script src="/theme/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="/theme/js/main.js"></script>
    </body>
    
</html>
