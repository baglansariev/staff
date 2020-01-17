<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? '' }}</title>
        <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-grid.css') }}">
        <link  rel="stylesheet" href="{{ asset('font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('font-awesome/js/all.min.js') }}"></script>
        <script src="{{ asset('js/form.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </head>
    <body>
        <main class="d-flex">
            <div class="column-left">
                {!! $column_left ?? '' !!}
            </div>
            <div class="panel">
                {!! $header ?? '' !!}

                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

        <!--  Shows alert messages  -->
        <section class="layout-alert">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert-status d-flex flex-column justify-content-center align-items-center">
                            <div class="alert-icon">
                                <i class="fas"></i>
                            </div>
                            <div class="alert-message">
                                <p class="message"></p>
                            </div>
                            <div class="alert-buttons d-flex justify-content-between flex-wrap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{ asset('bootstrap/bootstrap.js') }}"></script>
        <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>