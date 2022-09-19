<div>
    <section class="section-header pb-7 pb-lg-11 bg-soft bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-7">
                    <!-- <h1 class="display-2 mb-3 font-weight-light">Send Money 7 times faster using MTN Mobile Money with Pay'am in Rwanda</h1> -->
                    <h1 class="display-2 mb-3 font-weight-light text-white">
                        {{ json_decode($service_data->caption)->$locale ?? $defaultCountryHeader }}
                    </h1>
                    <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                        <img class="img" src="../assets/img/playstore.png" alt="" />
                    </a>
                    <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                        <img class="img" src="../assets/img/appstore.png" alt="" />
                    </a>
                </div>
                <div class="col-md-5">
                    <img class="img-fluid" src="{{ URL::asset($service_data->caption_image) }}" alt="" />
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
                        {{ json_decode($service_data->setup_caption)->$locale ?? 'How to get started' }}
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

    <!-- Services -->
    <section class="section section-lg line-bottom-light">
        <div class="container">
            <div class="row mt-6">
                <div class="col-md-10 m-auto text-center mb-5">
                    <h1 class="display-2 mb-5">
                        {{ __('other_services_title', [
                            'provider' => json_decode($pr->name)->$locale,
                            'country' => $country->name,
                        ]) }}
                    </h1>
                    <!-- <p class="lead">We add new tools and features regularly.</p> -->
                </div>

                <div class="col-md-12">
                    <div class="row">
                        @forelse ($other_services as $single)
                            <div class="col-12 col-md-6">
                                <!-- Icon Box -->
                                <div class="card shadow-soft border-light mb-4">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-lg-row p-3">
                                            <div class="mb-3 mb-lg-0">
                                                <div class="icon icon-primary">
                                                    <img src="{{ URL::asset($single->icon) }}" width="40px" />
                                                </div>
                                            </div>
                                            <div class="pl-lg-4">
                                                <a
                                                    href="{{ route('show_service', ['country' => $country->slug, 'slug1' => $pr->slug, 'slug2' => $utype->slug, 'service' => $single->slug, 'locale' => $locale]) }}">
                                                    <h4 class="mb-3">
                                                        {{ json_decode($single->name)->$locale }}
                                                    </h4>
                                                </a>
                                                <p>{{ json_decode($single->description)->$locale }}</p>

                                                <a href="{{ route('show_service', ['country' => $country->slug, 'slug1' => $pr->slug, 'slug2' => $utype->slug, 'service' => $single->slug, 'locale' => $locale]) }}"
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
    <!-- Services -->

    @include('components.get_started')

    @include('components.valuePropositions')

    @include('components.get_started')

    @include('components.download')

    @include('components.countryNetworks', ['countryNetworks' => $networks, 'countryName' => $country->name])

    @include('components.win-win')

    @include('components.payam_free')

    @include('components.faq')

    @section('meta')
        <meta name="title" content="{{ json_decode($utype->metatags)->title->$locale ?? $metaTitle }}">
        <meta name="description" content="{{ json_decode($utype->metatags)->description->$locale ?? $metaDescription }}">
        <meta name="keywords"
            content="{{ implode(',', json_decode($utype->metatags)->keywords->$locale ?? $metaKeywords) }}">
    @endsection
</div>
