<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Primary Meta Tags -->
    <title>Payam app | pay 7 times faster</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Canonical SEO -->
    <link rel="canonical" href="https://payam.co" />


    <!-- Twitter Card data -->
    {{-- <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@payamapp">
    <meta name="twitter:title" content="Payam app | pay 7 times faster">

    <meta name="twitter:description" content="Payam app | pay 7 times faster">
    <meta name="twitter:creator" content="@payamapp">
    <meta name="twitter:image" content=""> --}}


    <!-- Open Graph data -->
    @yield('meta')
    {{-- <meta property="fb:app_id" content="">
    <meta property="og:title" content="Payam app | pay 7 times faster" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://payamapp.com" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="Payam app | pay 7 times faster" />
    <meta property="og:site_name" content="Payam App" /> --}}

    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset('assets/img/favicon/favicon.svg') }}" type="image/svg">

    <!-- Fontawesome -->
    <link type="text/css" href="{{ URL::asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet">

    <!-- Nucleo icons -->
    <link rel="stylesheet" href="{{ URL::asset('dashboard/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">

    <!-- Prism -->
    <link type="text/css" href="{{ URL::asset('vendor/prismjs/themes/prism.css" rel="stylesheet') }}">

    <!-- Front CSS -->
    <link type="text/css" href="{{ URL::asset('css/front.css') }}" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">


    <style>
        .w-40 {
            width: 40% !important;
        }

        span img.grayhover {
            -webkit-filter: grayscale(0);
            filter: grayscale(0);
            transition: 0.5s;
            cursor: pointer;
        }

        span:hover img.grayhover {
            -webkit-filter: grayscale(1);
            filter: grayscale(1);
            transition: 0.5s;
            cursor: pointer;
        }


        span img.upcoming {
            -webkit-filter: grayscale(1);
            filter: grayscale(1);
            transition: 0.5s;
            cursor: pointer;
        }

        span:hover img.upcoming {
            -webkit-filter: grayscale(0);
            filter: grayscale(0);
            transition: 0.5s;
            cursor: pointer;
        }

    </style>
    @livewireStyles
</head>

<body>
    <?php
    $c_languages = \App\Models\Language::where('status', '1')->get();
    $languages = \Illuminate\Support\Facades\DB::table('languages')
        ->where('status', '1')
        ->pluck('code');
    ?>
    <header class="header-global">
        <nav id="navbar-main"
            class="navbar navbar-main navbar-expand-lg headroom py-lg-3 px-lg-6 navbar-dark navbar-theme-primary">
            <div class="container">
                <a class="navbar-brand @@logo_classes" href="/">
                    <img class="navbar-brand-dark common" src="{{ URL::asset('assets/img/brand/light.svg') }}"
                        height="35" alt="Logo light">
                    <img class="navbar-brand-light common" src="{{ URL::asset('assets/img/brand/dark.svg') }}"
                        height="35" alt="Logo dark">
                </a>
                <div class="navbar-collapse collapse justify-content-around" id="navbar_global">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="/">
                                    <img src="{{ URL::asset('assets/img/brand/dark.svg') }}" height="35" alt="Pay'am">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <a href="#navbar_global" role="button" class="fas fa-times" data-toggle="collapse"
                                    data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                    aria-label="Toggle navigation"></a>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav navbar-nav-hover justify-content-center">
                        @isset($has_usertypes)

                            @forelse($userTypes as $usertype)
                                @if (strtolower(json_decode($usertype->name)->en) == 'individuals')
                                    <li class="nav-item">
                                        @if (!$is_country_route)
                                            <a href="{{ route($route_name, ['locale' => $locale, 'slug' => $usertype->slug]) }}"
                                                class="nav-link text-uppercase font-weight-bolder">
                                                <span class="nav-link-inner-text">For Individuals</span>
                                            </a>

                                        @else
                                            <a href="{{ route($route_name, ['locale' => $locale, 'slug' => $usertype->slug, 'country' => $country]) }}"
                                                class="nav-link text-uppercase font-weight-bolder">
                                                <span class="nav-link-inner-text">For Individuals</span>
                                            </a>
                                        @endif
                                    </li>
                                @endif
                            @empty
                            @endforelse
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link text-uppercase font-weight-bolder" data-toggle="dropdown"
                                    aria-controls="pages_submenu" aria-expanded="false" aria-label="Toggle pages menu item">
                                    <span class="nav-link-inner-text">For Business</span>
                                    <span class="fas fa-angle-down nav-link-arrow ml-2"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg">
                                    <div class="col-auto px-0">
                                        <div class="list-group list-group-flush">
                                            @forelse ($userTypes as $usertype)
                                                @if (strtolower(json_decode($usertype->name)->en) != 'individuals')
                                                    @if (!$is_country_route)
                                                        <a href="{{ route($route_name, ['locale' => $locale, 'slug' => $usertype->slug]) }}"
                                                            class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                                                            <span class="icon icon-sm icon-primary"><i
                                                                    class="fas fa-store"></i></span>
                                                            <div class="ml-4">
                                                                <span
                                                                    class="text-dark d-block font-weight-bolder">{{ json_decode($usertype->name)->$locale }}</span>
                                                                <span class="">
                                                                    {{ json_decode($usertype->description)->$locale }}
                                                                </span>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <a href="{{ route($route_name, ['locale' => $locale, 'slug' => $usertype->slug, 'country' => $country]) }}"
                                                            class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                                                            <span class="icon icon-sm icon-primary"><i
                                                                    class="fas fa-store"></i></span>
                                                            <div class="ml-4">
                                                                <span
                                                                    class="text-dark d-block font-weight-bolder">{{ json_decode($usertype->name)->$locale }}</span>
                                                                <span class="">
                                                                    {{ json_decode($usertype->description)->$locale }}
                                                                </span>
                                                            </div>
                                                        </a>
                                                    @endif
                                                @endif
                                            @empty

                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endisset
                        <li class="nav-item">
                            <a href="{{ route('pricing', ['locale' => $locale]) }}"
                                class="nav-link text-uppercase font-weight-bolder">
                                <span class="nav-link-inner-text mr-1">Pricing</span>
                            </a>
                        </li>

                    </ul>
                    <ul class="navbar-nav navbar-nav-hover justify-content-end align-items-center">
                        <li class="nav-item mr-4">
                            <div class="@@cta_button_classes">
                                <a href="https://www.facebook.com/PayamApp" target="_blank"
                                    class="icon icon-shape shadow border-light rounded-circle icon-primary h-auto w-auto"><i
                                        class="text-white fab fa-facebook"></i></a>
                            </div>
                        </li>

                        <li class="nav-item mr-4">
                            <div class="@@cta_button_classes">
                                <a href="https://www.linkedin.com/company/payamapp" target="_blank"
                                    class=" icon icon-shape shadow border-light rounded-circle icon-primary h-auto w-auto"><i
                                        class="text-white fab fa-linkedin"></i></a>
                            </div>
                        </li>

                        <li class="nav-item mr-4">
                            <div class="@@cta_button_classes">
                                <a href="https://www.youtube.com/channel/UC4ZUSZDKNB5zDyfETT57hTQ/" target="_blank"
                                    class="icon icon-shape shadow border-light rounded-circle icon-primary h-auto w-auto"><i
                                        class="text-white fab fa-youtube"></i></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="javascript:void(0);" class="nav-link text-uppercase font-weight-bolder"
                                data-toggle="dropdown" aria-controls="pages_submenu" aria-expanded="false"
                                aria-label="Toggle pages menu item">
                                <span class="nav-link-inner-text"> {{ app()->currentLocale() }}</span>
                                <span class="fas fa-angle-down nav-link-arrow ml-2"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm">
                                <div class="col-auto px-0">
                                    <div class="list-group list-group-flush">
                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            {{-- {{ $localeCode }} --}}
                                            @if (in_array($localeCode, $languages->toArray()))
                                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                                    hreflang="{{ $localeCode }}"
                                                    class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                                                    <span
                                                        class="text-dark d-block font-weight-bolder">{{ $properties['native'] }}</span>

                                                </a>
                                            @endif
                                        @endforeach
                                        {{-- @foreach ($languages as $language)
                                            <a href="{{ url('/') }}/{{ $language->code }}/Africa"
                                                class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                                                <span
                                                    class="text-dark d-block font-weight-bolder">{{ $language->name }}</span>
                                            </a>
                                        @endforeach --}}
                                    </div>
                                </div>


                            </div>
                        </li>
                    </ul>
                </div>


                <div class="d-flex d-lg-none align-items-center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                        aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                </div>
            </div>
        </nav>
    </header>

    <main>

        {{ $slot }}

        <footer class="footer section pt-6 pt-md-8 pt-lg-6 pb-3 bg-primary text-white overflow-hidden">
            <!-- <div class="pattern pattern-soft top"></div> -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <a class="footer-brand mr-lg-5 d-flex" href="/">
                            <img src="{{ URL::asset('assets/img/brand/light.svg') }}" height="50%"
                                class="mr-3" alt="Pay'am">
                        </a>
                        <p class="my-4">
                            {{ __('footer_main_title') }}
                        </p>
                        <div class="dropdown mb-4 mb-lg-0">
                            <a id="langsDropdown" href="{{ url('/') }}/en/Africa" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" class="dropdown-toggle footer-language-link">
                                <img src="{{ URL::asset('assets/img/flags/united-states-of-america.svg') }}"
                                    alt="USA Flag" class="language-flag"> English
                                <i class="fas fa-chevron-down ml-1"></i>
                            </a>
                            <div aria-labelledby="langsDropdown" class="dropdown-menu dropdown-menu-center">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    {{-- {{ $localeCode }} --}}
                                    @if (in_array($localeCode, $languages->toArray()))
                                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                            hreflang="{{ $localeCode }}" class="dropdown-item text-gray text-sm"><img
                                                src="{{ URL::asset($c_languages->where('code', $localeCode)->first()->image) }}"
                                                alt="{{ $properties['native'] }}" class="language-flag">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endif
                                @endforeach


                                <!-- <a href="#" class="dropdown-item text-gray text-sm"><img src="../assets/img/flags/germany.svg" alt="Germany Flag" class="language-flag"> German</a>
                        <a href="#" class="dropdown-item text-gray text-sm"><img src="../assets/img/flags/spain.svg" alt="Spain Flag" class="language-flag"> Spanish</a> -->
                                {{-- <a href="{{ url('/') }}/fr/Africa" class="dropdown-item text-gray text-sm"><img
                                        src="{{ URL::asset('assets/img/flags/france.svg') }}" alt="France Flag"
                                        class="language-flag">
                                    French</a>
                                <a href="{{ url('/') }}/en/Africa" class="dropdown-item text-gray text-sm"><img
                                        src="{{ URL::asset('assets/img/flags/united-states-of-america.svg') }}"
                                        alt="USA Flag" class="language-flag">
                                    English</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-lg-0">
                        <?php
                        $locale = \Illuminate\Support\Facades\Session::get('current_locale');
                        ?>
                        <h4>For Individuals</h4>
                        <ul class="links-vertical">
                            <li><a
                                    href="{{ route('how_it_works', ['locale' => $locale]) }}">{{ __('how_it_works') }}</a>
                            </li>
                            <li><a href="{{ route('send_money_request', ['locale' => $locale]) }}">{{ __('send_request_money') }}
                                    Money</a></li>
                            <li><a
                                    href="{{ route('pay_goods_services', ['locale' => $locale]) }}">{{ __('pay_goods_service') }}</a>
                            </li>
                            <li><a href="{{ route('pricing', ['locale' => $locale]) }}">{{ __('pricing') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-lg-0">
                        <h4>For Businesses</h4>
                        <ul class="links-vertical">
                            <li><a
                                    href="{{ route('how_it_works', ['locale' => $locale]) }}">{{ __('how_it_works') }}</a>
                            </li>
                            <li><a
                                    href="{{ route('receive_payments', ['locale' => $locale]) }}">{{ __('receive_payments') }}</a>
                            </li>
                            <li><a
                                    href="{{ route('make_payments', ['locale' => $locale]) }}">{{ __('pay_vendors') }}</a>
                            </li>
                            <li><a href="{{ route('pricing', ['locale' => $locale]) }}">{{ __('pricing') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-2 mb-4 mb-lg-0">
                        <h4>Company</h4>
                        <ul class="links-vertical">
                            <li><a href="{{ route('about', ['locale' => $locale]) }}">{{ __('about') }}</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="{{ route('contact', ['locale' => $locale]) }}">{{ __('contact') }}</a>
                            </li>
                            <li><a href="{{ route('cookies', ['locale' => $locale]) }}">{{ __('cookies') }}</a>
                            </li>
                            <li><a href="{{ route('privacy', ['locale' => $locale]) }}">{{ __('privacy') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="my-4 my-lg-5">
                <div class="row">
                    <div class="col pb-4 mb-md-0">
                        <div class="d-flex text-center justify-content-center align-items-center">
                            <p class="font-weight-normal mb-0">© <a href="#">Pay'am</a> <span
                                    class="current-year"></span>. {{ __('copyright') }}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </main>
    @livewireScripts
    <!-- Core -->
    <script src="{{ URL::asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/headroom.js/dist/headroom.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="{{ URL::asset('vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/jarallax/dist/jarallax.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Impact JS -->
    <script src="{{ URL::asset('assets/js/front.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(".feature-slides").owlCarousel({
                loop: true,
                nav: false,

            })
        });
    </script>

    <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
    <script defer src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script>
        // var swiper = new Swiper(".mySwiper", {
        //   navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        //   },
        // });

        // var swiper = new Swiper(".mySwiper2", {
        //   navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        //   },
        // });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elms = document.getElementsByClassName('splide');
            for (var i = 0, len = elms.length; i < len; i++) {

                new Splide(elms[i], {
                    type: 'slide',
                    perPage: 1,
                }).mount();

                console.log(elms[i]);

            }
        });
    </script>

</body>

</html>
