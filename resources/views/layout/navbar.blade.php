<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Phone -Matjar</title>
        <link href={{ asset('asset/style.css') }} rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css"
        rel="stylesheet"
        />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" >

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('asset/vendor')}}/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('asset/vendor')}}/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('asset/vendor')}}/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('asset')}}/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('asset/vendor')}}/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('asset/vendor')}}/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="{{asset('asset/vendor')}}/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('asset/vendor')}}/config.js"></script>

    </head>
    <body>
        <div class="container-fluid">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Container wrapper -->
                <div class="container-fluid ">
                <!-- Toggle button -->
                <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse " id="navbarSupportedContent">

                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <div class="d-flex flex-row justify-content-start" >
                            <div>
                                <img
                                    src={{ asset('asset/images/logo.png') }}
                                    height="15"
                                    alt="MDB Logo"
                                    loading="lazy"
                                />
                            </div>
                            <div>
                                <a class="nav-link" href={{ route('home') }}>Phone-Matjar</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('product.index') }}>Devices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('accessories.index') }}>Accessories</a>
                    </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <a class="text-reset me-3" href={{ route('cart.index') }}>
                    <i class="fas fa-shopping-cart"></i>
                    </a>

                    <!-- Notifications
                    <div class="dropdown">
                    <a
                        class="text-reset me-3 dropdown-toggle hidden-arrow"
                        href="#"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        <li>
                        <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                        <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                    </div>
                    -->
                    @if (Auth::check())
                    <!-- Avatar -->
                    <div class="dropdown">
                        <a
                            class="dropdown-toggle d-flex align-items-center hidden-arrow"
                            href="#"
                            id="navbarDropdownMenuAvatar"
                            role="button"
                            data-mdb-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <img
                            src="{{ asset('asset/images/users')}}/{{Auth::user()->image }}"
                            class="rounded-circle"
                            height="25"
                            alt="user_image"
                            loading="lazy"
                            />
                        </a>
                        <ul
                            class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="navbarDropdownMenuAvatar"
                        >
                            <li>
                            <a class="dropdown-item" href={{ route('profile.index') }}>My profile</a>
                            </li>
                            <li>
                            <a class="dropdown-item" href={{ route('signin.logout')}}>Logout</a>
                            </li>
                        </ul>
                        </div>
                    @else
                    <div>
                        <small>
                            <a href={{route('signin.index')}}>
                                <small style="font-weight :bold;color: rgb(71, 71, 77)">
                                    signin
                                </small>
                            </a>
                        </small>
                    </div>
                    @endif



                </div>
                <!-- Right elements -->
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- end Navbar -->


            @yield('front-contain')







        <!-- Footer -->
    <footer class="text-center text-white" style="background-color: rgb(74, 76, 78)">
        <!-- Grid container -->
        <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
            ></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
            ></a>
            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
            ></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
            ></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-github"></i
            ></a>
        </section>
        <!-- Section: Social media -->

        <!-- Section: Form -->
        <section class="">
            <form action="">
            <!--Grid row-->
            <div class="row d-flex justify-content-center">
                <!--Grid column-->
                <div class="col-auto">
                <p class="pt-2">
                    <strong>for more information email us</strong>
                </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-5 col-12">
                <!-- Email input -->
                <div class="form-outline form-white mb-4">
                    <input type="email" id="form5Example21" class="form-control" />
                    <label class="form-label" for="form5Example21">Email address</label>
                </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-auto">
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-light mb-4">
                    send
                </button>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
            </form>
        </section>
        <!-- Section: Form -->

        <!-- Section: Text -->
        <section class="mb-4">
            <p>
                Welcome to our store, we provide you with everything related to the world of mobile phones and their accessories, with us enjoy the finest types and the most suitable prices
            </p>
        </section>
        <!-- Section: Text -->

        <!-- Section: Links -->

        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Eng. Abbas ©2020
        </div>
        <!-- Copyright -->
  </footer>
  <!-- Footer -->



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <!-- MDB -->
        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"
        ></script>




              <!-- Core JS -->
              <!-- build:js assets/vendor/js/core.js -->
              <script src="{{asset('asset/vendor')}}/libs/jquery/jquery.js"></script>
              <script src="{{asset('asset/vendor')}}/libs/popper/popper.js"></script>
              <script src="{{asset('asset/vendor')}}/js/bootstrap.js"></script>
              <script src="{{asset('asset/vendor')}}/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

              <script src="{{asset('asset/vendor')}}/js/menu.js"></script>
              <!-- endbuild -->

              <!-- Vendors JS -->

              <!-- Main JS -->
              <script src="{{asset('asset')}}/js/main.js"></script>

              <!-- Page JS -->

              <!-- Place this tag in your head or just before your close body tag. -->
              <script async defer src="https://buttons.github.io/buttons.js"></script>
              <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
