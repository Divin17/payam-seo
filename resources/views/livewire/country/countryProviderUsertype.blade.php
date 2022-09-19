<div>
    <div class="
          preloader bg-soft flex-column justify-content-center align-items-center">
        <div class="loader-element">
            <!-- <span class="loader-animated-dot"></span> -->
            <img src="{{ URL::asset('assets/img/brand/dark-loader.svg') }}" height="60" alt="Impact logo" />
        </div>
    </div>

    <!-- Hero -->
    <section class="section-header pb-7 pb-lg-11 bg-primary">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-7">
                    <!-- <h1 class="display-2 mb-3 font-weight-light text-white">Agents transac 7 times faster with MTN Mobile Money in Cameroon</h1> -->
                    <h1 class="display-2 mb-3 font-weight-light text-white">
                        {{ json_decode($utype->caption)->$locale ?? $defaultCountryHeader }}
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
                    <img class="img-fluid" src="{{ URL::asset($provider->caption_image) }}" alt="" />
                </div>
            </div>
        </div>
        <!-- <div class="pattern bottom"></div> -->
    </section>

    <!-- Services -->
    <section class="section section-lg line-bottom-light">
        <div class="container">
            <div class="row mt-6">
                <div class="col-md-10 m-auto text-center mb-5">
                    <h1 class="display-2 mb-5">
                        {{ __('services_page_title', [
                            'usertype' => json_decode($usertype->name)->$locale,
                            'provider' => json_decode($provider->name)->$locale,
                            'country' => $country->name
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
                                                <a
                                                    href="{{ route('show_service', ['country' => $country->slug, 'slug1' => $provider->slug, 'slug2' => $usertype->slug, 'service' => $service->slug, 'locale' => $locale]) }}">
                                                    <h4 class="mb-3">
                                                        {{ json_decode($service->name)->$locale }}
                                                    </h4>
                                                </a>
                                                <p>{{ json_decode($service->description)->$locale }}</p>

                                                <a href="{{ route('show_service', ['country' => $country->slug, 'slug1' => $provider->slug, 'slug2' => $usertype->slug, 'service' => $service->slug, 'locale' => $locale]) }}"
                                                    class="text-underline">{{ __('learn_more') }}</a>
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

    @include('components.win-win')

    <!-- How Tos -->
    @include('components.setup_steps')
    <!-- How Tos -->

    @include('components.download')

    @include('components.valuePropositions')

    @include('components.countries')

    @include('components.win-win')

    @include('components.download')

    @include('components.payam_free')

    @include('components.faq')

    @section('meta')
        <meta name="title" content="{{ json_decode($utype->metatags)->title->$locale ?? $metaTitle }}">
        <meta name="description" content="{{ json_decode($utype->metatags)->description->$locale ?? $metaDescription }}">
        <meta name="keywords"
            content="{{ implode(',', json_decode($utype->metatags)->keywords->$locale ?? $metaKeywords) }}">
    @endsection
</div>
