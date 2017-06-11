<html lang="en" ng-app="FrontendApp">
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="/css/angular-material.min.css">

        @yield('extra_styles')

        <meta name="viewport" content="initial-scale=1" />

        <title>Laravel Test App</title>
    </head>

    <body layout="column">

        @include('Base::common.nav')

        <md-content layout="row" flex class="content-wrapper">

            <div layout="column" flex class="content-wrapper" id="primary-col">

                <md-content flex layout-padding>

                    @yield('content')

                </md-content>

            </div>
        </md-content>

        <!-- Third party libs -->
        <script src="/js/vendor.js"></script>

        <!-- Custom JS -->
        <script src="/js/main.js"></script>

        @yield('extra_scripts')

    </body>
</html>
