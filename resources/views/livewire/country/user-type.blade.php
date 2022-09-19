<div>
    <div
        class="
          preloader
          bg-soft
          flex-column
          justify-content-center
          align-items-center
        ">
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
                        {{ json_decode($userType->caption)->$locale ?? $defaultCountryHeader }}
                    </h1>
                    <!-- <p class="lead">Impact helps you learn why your competitors rank so high and what you need to do to outrank them.</p> -->
                    <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                        <img class="img" src="../assets/img/playstore.png" alt="" />
                    </a>
                    <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                        <img class="img" src="../assets/img/appstore.png" alt="" />
                    </a>
                </div>
                <div class="col-md-5">
                    <img class="img-fluid" src="{{ URL::asset($userType->caption_image) }}" alt="" />
                </div>
            </div>
        </div>
        <!-- <div class="pattern bottom"></div> -->
    </section>

    <!-- How Tos -->
    <section class="section section-lg">
        <div class="container">
            <div class="row mb-2 mb-md-4">
                <div class="col-md-9 m-auto">
                    <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                    <h1 class="display-2 mb-4 text-center">
                        {{ json_decode($userType->setup_caption)->$locale ?? 'How to get started' }}
                    </h1>
                </div>
            </div>
            <div class="row mt-4">
                @forelse ($steps as $step)
                    <div class="col-md-4">
                        <img src="{{ URL::asset($step->image) }}" alt="{{ $step->title }}" />
                        <h3 class="mb-5 mt-2 text-center">
                            {{ json_decode($step->title)->$locale ?? '' }}
                        </h3>
                    </div>
                @empty
                    <h4>{{ __('no_steps_message') }}</h4>
                @endforelse
            </div>
        </div>
    </section>
    <!-- How Tos -->

    @include('components.win-win')

    <!-- Value Propositions -->
    @include('components.valuePropositions')
    <!-- Value Propositions -->

    @include('components.download')

    <!-- Services -->
    <section class="section section-lg line-bottom-light">
        <div class="container">
            <div class="row mt-6">
                <div class="col-md-10 m-auto text-center mb-5">
                    <h1 class="display-2 mb-5">
                        {{ __('country_usertype_service_title', [
                            'usertype' => json_decode($userType->name)->$locale,
                            'country' => $country->name,
                        ]) }}
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
                                                <p>
                                                    {{ json_decode($service->description)->$locale }}
                                                </p>

                                                <div class="row mb-1">
                                                    @forelse(Array($service->providers) as $provider)
                                                        <?php
                                                        $p_data = \App\Models\CountryProvider::find(json_decode($provider));
                                                        ?>
                                                        @forelse ($p_data as $single)

                                                            <div class="col">
                                                                <a
                                                                    href="{{ route('show_country_data', ['country' => $this->country->slug, 'slug' => $single->slug, 'locale' => $locale]) }}">
                                                                    <img src="{{ URL::asset($single->image) }}"
                                                                        alt="{{ json_decode($single->name)->$locale }}"
                                                                        class="grayhover img-fluid mb-3" width="80px" />
                                                                </a>
                                                            </div>
                                                        @empty

                                                            <h4>{{ __('no_providers_message') }}</h4>
                                                        @endforelse
                                                    @empty
                                                        <h4>{{ __('no_providers_message') }}</h4>

                                                    @endforelse
                                                </div>
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
        </div>
    </section>
    <!-- Services -->

    <!-- Networks -->
    {{-- @include('components.countryNetworks', ['countryNetworks' => $networks, 'countryName' => $country->name]) --}}

    <!-- Networks -->

    <!-- Payment Providers -->
    <section class="section section-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="row">
                                @forelse ($country_providers as $provider)
                                    <div class="col-md-4 mb-3">
                                        <div class="info p-0">
                                            <span class="infos">
                                                <a
                                                    href="{{ route('show_data_from_ut_or_pr', ['country' => $country->slug ?? $defaultCountry, 'slug1' => $userType->slug, 'slug2' => $provider->slug, 'locale' => $locale]) }}">
                                                    <img src="{{ URL::asset($provider->image) }}"
                                                        alt="{{ $provider->caption }}"
                                                        class="grayhover img-fluid mb-3" />
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
                            <h1 class="font-weight-bolder mb-2">
                                {{ __('country_supported_providers_title', [
                                    'usertype' => json_decode($userType->name)->$locale ?? $userType->name,
                                    'country' => $country->name,
                                ]) }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Providers -->

    @include('components.download')

    @include('components.win-win')

    @include('components.payam_free')

    @include('components.faq')

    @section('meta')
        <meta name="title" content="{{ json_decode($utype->metatags)->title->$locale ?? $metaTitle }}">
        <meta name="description" content="{{ json_decode($utype->metatags)->description->$locale ?? $metaDescription }}">
        <meta name="keywords"
            content="{{ implode(',', json_decode($utype->metatags)->keywords->$locale ?? $metaKeywords) }}">
    @endsection

    @include('components.download')
</div>
