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
                        {{ json_decode($country->title)->$locale ?? $defaultCountryHeader }}
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

    @include('components.countryUserTypes', ['userTypes' => $userTypes, 'country' => $country, 'countryName' => ''])

    @include('components.valuePropositions', ['valuePropositions' => $valuePropositions])

    <section class="section section-lg bg-soft">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="row align-items-center">

                        <div class="col-md-5 mr-auto mb-4">
                            <h1 class="h1 font-weight-bolder mb-2">
                                {{ __('country_networks_title', ['country' => $country->name]) }}
                            </h1>
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
                                                    href="{{ route('show_country_data', ['locale' => $locale, 'country' => $country->slug ?? $defaultCountry, 'slug' => $provider]) }}">
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
                                {{ __('country_providers_title', ['country' => $country->name]) }}
                        </div>

                    </div>
                </div>



            </div>

        </div>
    </section>

    @include('components.get_started')

    <section class="section section-lg line-bottom-light">
        <div class="container">
            <div class="row mt-6">

                <div class="col-md-10 m-auto text-center mb-5">
                    <h1 class="display-2 mb-4">{{ __('country_services_title', ['country' => $country->name]) }}</h1>
                    <!-- <p class="lead">We add new tools and features regularly.</p> -->
                </div>

                <div class="col-md-12">
                    <div class="row">
                        @forelse ($services as $service)
                            <div class="col-12 col-md-6">
                                <!-- Icon Box -->
                                <div class="card shadow-soft border-light mb-4">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-lg-row p-3">
                                            <div class="mb-3 mb-lg-0">
                                                <div class="icon icon-primary"><img
                                                        src="{{ URL::asset($service->icon) }}" width="40px" />
                                                </div>
                                            </div>
                                            <div class="pl-lg-4">
                                                <h4 class="mb-3">{{ json_decode($service->name)->$locale }}
                                                </h4>
                                                <p>{{ json_decode($service->description)->$locale }}</p>
                                                </p>
                                                @if ($service->usertypes)
                                                    <div class="d-flex mb-1">
                                                        <div class="row">
                                                            @forelse (json_decode($service->usertypes) as $single_user)
                                                                <?php
                                                                $userType = \App\Models\CountryUserType::find($single_user);
                                                                ?>
                                                                <div class="col">

                                                                    <a href="{{ route('show_country_data', ['locale' => $locale, 'country' => $country->slug ?? $defaultCountry, 'slug' => $userType->slug]) }}"
                                                                        class="badge badge-pill bg-white border border-primary text-uppercase mr-1">
                                                                        {{ json_decode($userType->name)->$locale }}
                                                                    </a>
                                                                </div>
                                                            @empty
                                                                <h4>{{ __('no_usertype_message') }}</h4>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($service->providers)
                                                    <hr />
                                                    <div class="row mb-1">
                                                        @forelse (json_decode($service->providers) as $single)
                                                            <?php
                                                            $provider = \App\Models\CountryProvider::find($single);
                                                            ?>
                                                            <div class="col">
                                                                <a
                                                                    href="{{ route('show_country_data', ['locale' => $locale, 'country' => $country->slug ?? $defaultCountry, 'slug' => $provider]) }}">
                                                                    <img src="{{ URL::asset($provider->image) }}"
                                                                        alt="{{ json_decode($provider->name)->$locale }}"
                                                                        class="grayhover img-fluid mb-3" width="80px" />
                                                                </a>
                                                            </div>
                                                        @empty
                                                            <h4>{{ __('no_providers_message') }}</h4>
                                                        @endforelse
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Icon Box -->
                            </div>
                            @empty
                                <h4>{{ __('no_services_message') }}</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
        </section>

        @include('components.download')

        @include('components.win-win')

        @include('components.payam_free')

        @include('components.faq')
        @include('components.download')

        @section('meta')
            <meta name="title" content="{{ json_decode($country->metatags)->title->$locale ?? $metaTitle }}">
            <meta name="description"
                content="{{ json_decode($country->metatags)->description->$locale ?? $metaDescription }}">
            <meta name="keywords"
                content="{{ implode(',', json_decode($country->metatags)->keywords->$locale ?? $metaKeywords) }}">
        @endsection
    </div>
