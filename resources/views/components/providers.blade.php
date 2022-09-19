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
                                            <a href="{{ route('show_default_data', ['slug' => $provider->slug, 'locale' => $locale]) }}">
                                                <img src="{{ URL::asset($provider->image) }}" alt="{{ $provider->caption }}" class="grayhover img-fluid mb-3">
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
                            <h1 class="h1 font-weight-bolder mb-2"> {{ __('country_providers_title', ['country' => $countryName ?? $defaultCountry]) }}
                            </h1>

                        </div>

                    </div>
                </div>



            </div>

        </div>
    </section>