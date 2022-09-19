<div>
    <div class="
          preloader bg-soft flex-column justify-content-center align-items-center">
        <div class="loader-element">
            <!-- <span class="loader-animated-dot"></span> -->
            <img src="{{ URL::asset('assets/img/brand/dark-loader.svg') }}" height="60" alt="Impact logo" />
        </div>
    </div>
    <!-- Hero -->
    <section class="section-header pb-7 pb-lg-11 bg-soft bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-7">
                    <h1 class="display-2 mb-3 font-weight-light text-white">
                        The easiest way to use {{ $provider->name }} in {{ $country->name ?? $defaultCountry }}
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
                    <img class="img-fluid" src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                </div>
            </div>
        </div>
        <!-- <div class="pattern bottom"></div> -->
    </section>

    <section class="section section-lg bg-primary">
        <div class="row">
            <div class="col-md-12 m-auto mb-5 text-center">
                <h1 class="display-2 text-white">
                    Get started with {{ $provider->name }} using Pay'am in {{ $country->name ?? $defaultCountry }}
                    as
                </h1>
            </div>
        </div>
        <div class="container">
            <div class="row mb-5 mb-md-7 mt-md-6">
                @forelse ($usertypes as $usertype)
                    <div class="col-md-4 m-auto">
                        <div class="card shadow">
                            <div class="card-body">
                                <i class="fas fa-2x fa-user text-primary mb-3"></i>
                                <h2 class="h2 font-weight-bolder mb-4">For {{ $usertype->name }}</h2>
                                <p class="lead">
                                    {{ $usertype->description }}
                                    <a href="{{ route('show_data_from_ut_or_pr', ['slug' => $usertype->slug]) }}"
                                        class="text-underline">
                                        Learn More
                                        <span class="icon icon-xs ml-2">
                                            <i class="fas fa-external-link-alt"></i>
                                        </span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4>No Usertypes found for {{ $provider->name }} in {{ $country->name ?? $defaultCountry }}</h4>
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
                        What you can do with {{ $provider->name }} using Pay'am in
                        {{ $country->name ?? $defaultCountry }}
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
                                                <div class="icon icon-primary"><i
                                                        class="fas {{ $service->icon }}"></i>
                                                </div>
                                            </div>
                                            <div class="pl-lg-4">
                                                <h4 class="mb-3">{{ $service->title }}</h4>
                                                <p>{{ $service->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Icon Box -->
                            </div>
                        @empty
                            <h4>No services information available provided by {{ $provider->name }} in
                                {{ $country->name }}
                            </h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
</div>
</section>

@include('components.download')
</div>
