<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <!-- Meta Tags  -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Meta Tags  -->

        <!-- Css files  -->
        <link rel="stylesheet" href="{{asset("front")}}/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{{asset("front")}}/css/main.css" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
        <!-- Css files  -->

        <!-- Title Page -->
        <title>مكتبة الدلتا @yield('title')</title>
        <!-- Title Page -->

    </head>
    <body>
        <!-- Start Header -->
           @include("front.includes.header")
        <!-- end Header -->


        <!-- start content -->
          @yield('content')
        <!-- end content -->



    <!-- Start Footer  -->

    @include("front.includes.footer")

   <!-- End Footer  -->



        <!-- Script files -->
        <script src="{{asset("front")}}/js/jquery-3.4.1.min.js"></script>
        <script src="{{asset("front")}}/js/popper.min.js"></script>
        <script src="{{asset("front")}}/js/bootstrap.min.js"></script>
        <script src="{{asset("front")}}/js/vanilla-tilt.min.js"></script>
        <script src="{{asset("front")}}/js/main.js"></script>
    </body>
</html>
