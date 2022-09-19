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
                                                <h4 class="mb-3">{{ json_decode($service->name)->$locale }}
                                                </h4>
                                                <p>{{ json_decode($service->description)->$locale }}</p>
                                                @if ($showUserTypes)

                                                    <div class="d-flex">
                                                        @forelse ($userTypes as $userType)
                                                            <a href="{{ route('show_country_data', ['locale' => $locale, 'country' => $country->slug ?? $defaultCountry, 'slug' => $userType->slug]) }}"
                                                                class="badge badge-pill bg-white border border-primary text-uppercase mr-1">
                                                                {{ json_decode($userType->name)->$locale }}
                                                            </a>

                                                        @empty
                                                            <h4>{{ __('no_usertypes_message') }}</h4>
                                                        @endforelse
                                                    </div>

                                                @endif
                                                @if ($showProviders && $providers)
                                                    <hr />
                                                    <div class="row mb-1">
                                                        @forelse ($providers as $provider)
                                                            <div class="col">
                                                                <a
                                                                    href="{{ route('show_country_data', ['country' => $country->slug ?? $defaultCountry, 'slug' => $provider]) }}">
                                                                    <img src="{{ URL::asset($provider->image) }}"
                                                                        class="grayhover img-fluid mb-3" />
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
