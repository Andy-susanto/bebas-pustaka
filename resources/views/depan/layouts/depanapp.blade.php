<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ \Info::nama() }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('depan/css/styles.css') }}" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
    .navcustom {
        background: #020024;
        background: radial-gradient(circle, rgba(2, 0, 36, 1) 0%, rgba(70, 70, 158, 1) 35%, rgba(2, 0, 36, 1) 100%);
    }
</style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        @include('depan.layouts.menu')

        @yield('content')

    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto navcustom">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">

                <div class="col text-center">

                    <div class="small m-0 text-white ">
                        <a href="{{ route('adm.form.login') }}" target="_blank" style="text-decoration: none;color:white">Copyright &copy; {{ \Info::nama() }}
                            {{ date('Y') }} </a>
                    </div>

                </div>

            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->

    <!-- Core theme JS-->
    <script src="{{ url('depan/js/scripts.js') }}"></script>
</body>

</html>
