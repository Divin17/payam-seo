<section class="section" id="supported_countries">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 m-auto text-center">
                <h1 class="h1 display-2 mb-4">{{ __('supported_countries_title') }}</h1>
                <p class="lead">{{ __('supported_countries_description') }}</p>
            </div>
        </div>

        <div class="row justify-content-center mt-4 mb-5" id="show_values">
            @forelse ($supportedCountries as $supportedCountry)
                <div class="col-md-4 mb-3">
                    <div class="info p-0 text-center">

                        <span class="infos">
                            <a href="{{ route('show_country', [$supportedCountry->slug, 'locale' => $locale]) }}"
                                class="d-flex justify-content-center mb-3 mt-3">
                                <img src="{{ URL::asset($supportedCountry->flag) }}"
                                    alt="{{ $supportedCountry->name }}" width="40px" class="img-fluid mr-3">
                                <h4>{{ $supportedCountry->name }}</h4>
                            </a>
                        </span>
                    </div>
                </div>
            @empty
                <h4>{{ __('no_supported_countries_message') }}</h4>
            @endforelse
        </div>
        <div class="row justify-content-center mt-4 mb-5">
            <div class="col-md-7 m-auto text-center">
                <p class="lead">{{ __('unsupported_countries_description') }}
                </p>
            </div>

        </div>

        <div class="row justify-content-center mt-4 mb-5">

            @forelse ($upcomingCountries as $upcomingCountry)
                <div class="col-md-4 mb-3">
                    <div class="info p-0 text-center">
                        <span class="infos">
                            <a href="/" class="d-flex justify-content-center mb-3 mt-3">
                                <img src="{{ URL::asset($upcomingCountry->flag) }}"
                                    alt="{{ $upcomingCountry->name }}" width="40px" class="upcoming  img-fluid mr-3">
                                <h4>{{ $upcomingCountry->name }}</h4>
                            </a>
                        </span>
                    </div>
                </div>
            @empty
                <h4>{{ __('no_unsupported_countries_message') }}</h4>
            @endforelse
        </div>
    </div>
</section>
