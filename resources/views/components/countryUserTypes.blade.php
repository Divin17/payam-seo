    <section class="section section-lg pb-0">
        <div class="container">

            <div class="row mb-5 mb-md-7 mt-md-4">
                <div class="col-md-12 mb-5 text-center">
                    <h1 class="display-2">{{ __('user_types_title') }}</h1>
                </div>
                @forelse($userTypes as $userType)
                    <div class="col-md-4 m-auto">
                        <div class="card shadow">
                            <div class="card-body ">
                                <img src="{{ URL::asset($userType->icon) }}" alt="{{ $userType->name }}"
                                    width="40px">
                                <h2 class="h2 font-weight-bolder mb-4">{{ json_decode($userType->name)->$locale }}</h2>
                                <p class="lead"> {{ json_decode($userType->description)->$locale ?? '' }}</p>
                                <p>
                                    @if ($countryName)
                                        <a href="{{ route('show_default_data', ['slug' => $userType->slug, 'locale' => $locale]) }}"
                                            class="text-underline">
                                            {{ __('learn_more') }}
                                            <span class="icon icon-xs ml-2">
                                                <i class="fas fa-external-link-alt"></i>
                                            </span>
                                        </a>
                                    @else
                                        <a href="{{ route('show_country_data', ['country' => $country->slug, 'slug' => $userType->slug, 'locale' => $locale]) }}"
                                            class="text-underline">
                                            {{ __('learn_more') }}
                                            <span class="icon icon-xs ml-2">
                                                <i class="fas fa-external-link-alt"></i>
                                            </span>
                                        </a>
                                    @endif
                                </p>
                            </div>

                        </div>

                    </div>
                @empty
                    <h4>{{ __('no_usertypes_message') }}</h4>
                @endforelse


            </div>
        </div>
    </section>
