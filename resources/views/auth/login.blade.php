



<!doctype html>
<html lang="{{ str_replace( '_', '-', app()->getLocale() ) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Corona Scan the Sunset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" type="text/css" href="{{ asset('architec-ui/css/base.css')}}">

</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100">
            <div class="h-100 no-gutters row">
                <div class="col-lg-4" style="display:none">
                    <div class="slider-light" >
                        <div class="slick-slider">
                            <div>
                                <div
                                    class="position-relative h-100 d-flex justify-content-center align-items-center bg-asteroid"
                                    tabindex="-1">
                                    <div class="slide-img-bg"
                                         style="background-image: url('{{ asset('/images/buffet.jpeg') }}');"></div>
                                    <div class="slider-content"><h3>HISTORIA</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at augue justo.
                                            Cras tempor dolor in felis vestibulum gravida. Cras sed rutrum nisl, a
                                            placerat nibh. Fusce euismod lectus eget auctor commodo. Aenean blandit
                                            placerat tortor in sollicitudin. Donec at lacus congue, tincidunt ligula in,
                                            maximus nibh. Donec luctus nulla quis felis sodales faucibus. Pellentesque
                                            rutrum sapien laoreet, luctus magna id, cursus dui. Phasellus a magna vitae
                                            elit congue facilisis. Aenean feugiat ac eros sed venenatis.</p></div>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="position-relative h-100 d-flex justify-content-center align-items-center bg-dark"
                                    tabindex="-1">
                                    <div class="slide-img-bg"
                                         style="background-image: url('{{ asset('/images/pizza-s.png') }}');"></div>
                                    <div class="slider-content"><h3>ACTIVIDAD</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at augue justo.
                                            Cras tempor dolor in felis vestibulum gravida. Cras sed rutrum nisl, a
                                            placerat nibh. Fusce euismod lectus eget auctor commodo. Aenean blandit
                                            placerat tortor in sollicitudin. Donec at lacus congue, tincidunt ligula in,
                                            maximus nibh. Donec luctus nulla quis felis sodales faucibus. Pellentesque
                                            rutrum sapien laoreet, luctus magna id, cursus dui. Phasellus a magna vitae
                                            elit congue facilisis. Aenean feugiat ac eros sed venenatis.</p></div>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="position-relative h-100 d-flex justify-content-center align-items-center bg-dark"
                                    tabindex="-1">
                                    <div class="slide-img-bg"
                                         style="background-image: url('{{ asset('/images/bar.png') }}');"></div>
                                    <div class="slider-content"><h3>VISI??N</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at augue justo.
                                            Cras tempor dolor in felis vestibulum gravida. Cras sed rutrum nisl, a
                                            placerat nibh. Fusce euismod lectus eget auctor commodo. Aenean blandit
                                            placerat tortor in sollicitudin. Donec at lacus congue, tincidunt ligula in,
                                            maximus nibh. Donec luctus nulla quis felis sodales faucibus. Pellentesque
                                            rutrum sapien laoreet, luctus magna id, cursus dui. Phasellus a magna vitae
                                            elit congue facilisis. Aenean feugiat ac eros sed venenatis.

                                        </p></div>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="position-relative h-100 d-flex justify-content-center align-items-center bg-dark"
                                    tabindex="-1">
                                    <div class="slide-img-bg"
                                         style="background-image: url('{{ asset('/images/pachacamac.png') }}');"></div>
                                    <div class="slider-content"><h3>MISI??N</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at augue justo.
                                            Cras tempor dolor in felis vestibulum gravida. Cras sed rutrum nisl, a
                                            placerat nibh. Fusce euismod lectus eget auctor commodo. Aenean blandit
                                            placerat tortor in sollicitudin. Donec at lacus congue, tincidunt ligula in,
                                            maximus nibh. Donec luctus nulla quis felis sodales faucibus. Pellentesque
                                            rutrum sapien laoreet, luctus magna id, cursus dui. Phasellus a magna vitae
                                            elit congue facilisis. Aenean feugiat ac eros sed venenatis.</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-100 bg-animation d-flex justify-content-center align-items-center col-md-12 col-lg-12 ">
                    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9  ">
                        <div class="row m-2 pb-3 ">
                            <div class="col-lg-2 col-md-12">
                                <img src="/logo.png"
                                     alt="">
                            </div>
                        </div>
                        <div class="row  m-2 ">
                            <div class="col-lg-12 bg-white p-4">
                                <h4 class="mb-0">
                                    <h4>
                                        <div>Bienvenido al sistema de gesti??n</div>
                                    </h4>
                                    <span>Inicia sesi??n en tu cuenta.</span></h4>
                                {{--        <h6 class="mt-3">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6>--}}
                                <div class="divider row"></div>
                                <div class="">
                                    {{--            <div class="card-header">{{ __('Login') }}</div>--}}
                                    <form method="POST"  action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Correo Electr??nico</label>
                                                    <input name="email" id="exampleEmail" placeholder="Correo electr??nico aqu??..."
                                                           value="{{ old('email') }}"
                                                           type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           autocomplete="email"
                                                           autofocus
                                                           required>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="examplePassword" class="">Contrase??a</label>
                                                    <input name="password" id="examplePassword" placeholder="Contrase??a aqu??..."
                                                           type="password"
                                                           class="form-control  @error('password') is-invalid @enderror" required
                                                           autocomplete="current-password"></div>
                                            </div>
                                        </div>
                                        {{--<div class="position-relative form-check">
                                            <input name="remember" id="exampleCheck"
                                                   type="checkbox" {{ old('remember') ? 'checked' : '' }}
                                                   class="form-check-input"><label
                                                for="exampleCheck" class="form-check-label">Recu??rdame</label></div>--}}
                                        <div class="divider row"></div>
                                        <div class="d-flex align-items-center">

                                            <div class="ml-auto">
                                                {{--<a href="{{ route('password.request') }}" class="btn-lg btn btn-link">Recordar
                                                    contrase??a</a>--}}
                                                <button class="btn btn-primary btn-lg"><i class="fa fa-arrow-circle-right pr-1"></i>
                                                    Ingresar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--SCRIPTS INCLUDES-->

<!--CORE-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/metismenu"></script>

<script src="{{ asset('architec-ui/js/scripts-init/app.js')}}"></script>
<script src="{{ asset('architec-ui/js/scripts-init/demo.js')}}"></script>
<!--RangeSlider-->

<!--Slick Carousel -->
<script src="{{ asset('architec-ui/js/vendors/carousel-slider.js')}}"></script>
<script src="{{ asset('architec-ui/js/scripts-init/carousel-slider.js')}}"></script>
</body>
</html>




