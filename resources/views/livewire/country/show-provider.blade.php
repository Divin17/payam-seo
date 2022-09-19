<div>
    <div class="
          preloader bg-soft flex-column justify-content-center align-items-center">
        <div class="loader-element">
            <!-- <span class="loader-animated-dot"></span> -->
            <img src="{{ URL::asset('assets/img/brand/dark-loader.svg') }}" height="60" alt="Impact logo" />
        </div>
    </div>
    <!-- Hero -->
    <section class="section-header pb-7 pb-lg-11 bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-7">
                    <h1 class="display-2 mb-3 font-weight-light text-white">
                        {{ __('country_provider_header', ['provider' => json_decode($provider->name)->$locale, 'country' => $country->name ?? $defaultCountry]) }}
                    </h1>
                    <!-- <p class="lead text-white">Impact helps you learn why your competitors rank so high and what you need to do to outrank them.</p> -->
                    <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                        <img class="img" src="../assets/img/playstore.png" alt="" />
                    </a>
                    <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                        <img class="img" src="../assets/img/appstore.png" alt="" />
                    </a>
                </div>

                <div class="col-md-5 d-none d-md-block">
                    <img class="img-fluid" src="{{ URL::asset($provider->caption_image) }}" alt="" />
                </div>
            </div>
        </div>
        <!-- <div class="pattern bottom"></div> -->
    </section>

    <!-- User Types -->
    <section class="section section-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 m-auto mb-5 text-center">
                    <h1 class="display-2">
                        {{ __('country_usertypes_header', ['provider' => json_decode($provider->name)->$locale, 'country' => $country->name]) }}
                    </h1>
                </div>
            </div>
            <div class="row mb-5 mb-md-7 mt-md-6">
                @forelse ($usertypes as $usertype)
                    <div class="col-md-4 m-auto">
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="{{ URL::asset($usertype->icon) }}" width="40px" />
                                <h2 class="h2 font-weight-bolder mb-4">{{ json_decode($usertype->name)->$locale }}
                                </h2>
                                <p class="lead">
                                    {{ json_decode($usertype->description)->$locale }}
                                    <a href="{{ route('show_data_from_ut_or_pr', ['country' => $country->name, 'slug1' => $provider->slug, 'slug2' => $usertype->slug, 'locale' => $locale]) }}"
                                        class="text-underline">
                                        {{ __('learn_more') }}
                                        <span class="icon icon-xs ml-2">
                                            <i class="fas fa-external-link-alt"></i>
                                        </span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4>{{ __('no_country_usertype_message', ['provider' => json_decode($provider->name)->$locale, 'country' => $country->name]) }}
                    </h4>
                @endforelse
            </div>
        </div>
    </section>

    @include('components.valuePropositions')

    @include('components.win-win')

    <section class="section section-lg line-bottom-light">
        <div class="container">
            <div class="row mt-6">
                <div class="col-md-10 m-auto text-center mb-5">
                    <h1 class="display-2 mb-4">
                        {{ __('country_provider_services_header', ['provider' => json_decode($provider->name)->$locale, 'country' => $country->name]) }}
                    </h1>
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
                                                <div class="icon icon-primary">
                                                    <img src="{{ URL::asset($service->icon) }}" width="40px" />
                                                </div>
                                            </div>
                                            <div class="pl-lg-4">
                                                <h4 class="mb-3">{{ json_decode($service->name)->$locale }}
                                                </h4>
                                                <p>{{ json_decode($service->description)->$locale }}</p>

                                                <div class="row mb-1">
                                                    @forelse(Array($service->usertypes) as $usertype)
                                                        <?php
                                                        $u_data = \App\Models\CountryUserType::find(json_decode($usertype));
                                                        ?>
                                                        @forelse ($u_data as $single)
                                                            <div class="col">
                                                                <a
                                                                    href="{{ route('show_country_data', ['country' => $this->country->slug, 'slug' => $single->slug, 'locale' => $locale]) }}">
                                                                    <span
                                                                        class="badge badge-pill bg-white border border-primary text-uppercase mr-1">
                                                                        {{ json_decode($single->name)->$locale }}
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        @empty
                                                            <h4>{{ __('no_usertype_message') }}</h4>
                                                        @endforelse
                                                    @empty
                                                        <h4>{{ __('no_usertype_message') }}</h4>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Icon Box -->
                            </div>
                        @empty
                            <h4>
                                {{ __('no_country_provider_services_message', ['provider' => json_decode($provider->name)->$locale, 'country' => $country->name]) }}
                            </h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('meta')
        <meta name="title" content="{{ json_decode($pr->metatags)->title->$locale ?? $metaTitle }}">
        <meta name="description" content="{{ json_decode($pr->metatags)->description->$locale ?? $metaDescription }}">
        <meta name="keywords"
            content="{{ implode(',', json_decode($pr->metatags)->keywords->$locale ?? $metaKeywords) }}">
    @endsection


    @include('components.download')
</div>
