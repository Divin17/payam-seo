<div>
    <div class="
          preloader
          bg-soft
          flex-column
          justify-content-center
          align-items-center
        ">
        <div class="loader-element">
            <!-- <span class="loader-animated-dot"></span> -->
            <img src="{{ URL::asset('assets/img/brand/dark-loader.svg') }}" height="60" alt="Payam Is Free" />
        </div>
    </div>
    <!-- Hero -->
    <section class="section-header pb-7 pb-lg-11 bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-7">
                    <h1 class="display-2 mb-3 font-weight-light text-white">
                        {{ json_decode($utype->description)->$locale ?? '' }}
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
                    <img class="img-fluid" src="{{ URL::asset($utype->caption_image) }}" alt="" />
                </div>
            </div>
        </div>
        <!-- <div class="pattern bottom"></div> -->
    </section>

    <!-- How Tos -->
    @include('components.setup_steps')
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
                    <h1 class="display-2 mb-4">
                        {{ __('country_services_title', ['country' => $countryName ?? $defaultCountry]) }}
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
                                            <h4 class="mb-3">
                                                {{ json_decode($service->name)->$locale }}
                                            </h4>
                                            <p>{{ json_decode($service->description)->$locale }}</p>
                                            @if ($providers)
                                            <hr />
                                            <div class="row mb-1">
                                                @forelse ($providers as $provider)
                                                <div class="col">
                                                    <a href="{{ route('show_default_data', ['slug' => $provider, 'locale' => $locale]) }}">
                                                        <img src="{{ URL::asset($provider->image) }}" class="grayhover img-fluid mb-3" width="80px" />
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
        </div>
    </section>

    <!-- Services -->

    <!-- Networks -->

    @include('components.countryNetworks', ['countryNetworks' => $networks, 'countryName' => $defaultCountry])

    <!-- Networks -->

    <!-- Payment Providers -->
    @include('components.providers', ['providers' => $providers, 'countryName' => $defaultCountry, 'locale' => $locale])
    <!-- Payment Providers -->

    @include('components.download')

    @include('components.win-win')

    @include('components.payam_free')


    @include('components.download')
</div>