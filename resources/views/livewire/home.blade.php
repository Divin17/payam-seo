<div>
    <div class="preloader bg-soft flex-column justify-content-center align-items-center">
        <div class="loader-element">
            <!-- <span class="loader-animated-dot"></span> -->
            <img src="{{ URL::asset('assets/img/brand/dark-loader.svg') }}" height="60" alt="Payam">
        </div>
    </div>



    <!-- Hero -->
    <section class="section-header bg-gradient-primary text-center pb-7 pb-lg-11 pb-400 h-100vh">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-9 mx-auto">
                    <div class="row">
                        <div class="col-md-6 m-auto">
                            <img class="img" src="../assets/img/brand/light.svg" alt="">
                        </div>
                    </div>

                    <h1 class="display-3 d-none d-md-block mb-3 text-white font-weight-light">
                        {{ __('home_page_title') }}
                    </h1>

                    <h1 class="display-3 d-block d-md-none mb-3 text-white font-weight-light">
                        {{ __('home_page_title') }}
                    </h1>

                    <!-- <p class="lead text-white">Impact helps you learn why your competitors rank so high and what you need to do to outrank them.</p> -->
                    <div class="row mt-5">
                        <div class="col-6 col-md-4 ml-auto">
                            <a href="/" class="p-0 btn btn-lg rounded-pill animate-up-2">
                                <img class="img w-100" src="../assets/img/playstore.png" alt="">
                            </a>
                        </div>
                        <div class="col-6 col-md-4 mr-auto">

                            <a href="/" class="p-0 btn btn-lg rounded-pill animate-up-2">
                                <img class="img w-100" src="../assets/img/appstore.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="pattern bottom"></div>
    </section>

    @include('components.countryUserTypes', ['userTypes' => $userTypes, 'showUserTypes' => true])

    @include('components.valuePropositions', ['valuePropositions' => $valuePropositions])

    <section class="section section-lg pb-7 pt-7 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h1 class="mb-4 display-2">{{ __('country_networks_title', ['country' => $countryName]) }}</h1>
                    <!-- <p class="lead mb-5 display-3 font-weight-normal">See all Pay'am supported countries and networks.</p> -->
                    <a href="#supported_countries" class="btn btn-lg rounded-pill btn-secondary animate-up-2"><span
                            class="mr-2"><i class="fas fa-hand-pointer"></i></span>See all coutries and
                        networks </a>

                </div>
                <div class="col-md-6 ml-auto text-center">
                    <img src="../assets/img/saas-platform-5.jpg" class="card-img-top rounded-top" alt="image">
                </div>
            </div>
        </div>
    </section>

    {{-- @include('components.services', ['services' => $services, 'countryName' => $countryName, 'showUserTypes' => true,
    'userTypes' => $userTypes, 'providers' => $providers, 'showProviders' => true, 'isFromProviderPage'=>false]); --}}

    @include('components.services', ['services'=> $services, 'countryName' => $defaultCountry,
    'showUserTypes' => true,'showProviders' => false])

    <section class="section section-lg bg-soft">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="row align-items-center">

                        <div class="col-md-5 mr-auto mb-4">
                            <h1 class="h1 font-weight-bolder mb-2">
                                {{ __('country_networks_title', ['country' => $countryName]) }}</h1>
                        </div>

                        <div class="col-md-6 m-auto">
                            <div class="row">
                                @forelse ($networks as $network)
                                    <div class="col-md-4 mb-3">
                                        <div class="info p-0">
                                            <span class="infos">
                                                <img src="{{ URL::asset($network->image) }}"
                                                    alt="{{ $network->caption }}" class="grayhover img-fluid mb-3">
                                            </span>
                                        </div>
                                    </div>
                                @empty
                                    <h4>{{ __('no_networks_message') }}</h4>
                                @endforelse
                            </div>
                        </div>



                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="section section-lg">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div class="row align-items-center">

                        <div class="col-md-6">
                            <div class="row">
                                @forelse ($providers as $provider)
                                    <div class="col-md-4 mb-3">
                                        <div class="info p-0">

                                            <span class="infos">
                                                <a
                                                    href="{{ route('show_default_data', ['locale' => $locale, 'slug' => $provider->slug]) }}">
                                                    <img src="{{ URL::asset($provider->image) }}"
                                                        alt="{{ $provider->caption }}"
                                                        class="grayhover img-fluid mb-3">
                                                </a>
                                            </span>

                                        </div>
                                    </div>
                                @empty
                                    <h4>{{ __('no_providers_message') }}</h4>
                                @endforelse
                            </div>
                        </div>

                        <div class="col-md-5 ml-auto">
                            <h1 class="h1 font-weight-bolder mb-2">
                                {{ __('country_providers_title', ['country' => $countryName ?? $defaultCountry]) }}
                            </h1>

                        </div>

                    </div>
                </div>



            </div>

        </div>
    </section>

    @include('components.countries', ['supportedCountries' => $supportedCountries, 'upcomingCountries' =>
    $upcomingCountries]);

    @include('components.download')

    @include('components.win-win')

    @include('components.payam_free')

    @include('components.faq')

    @include('components.download')

</div>
