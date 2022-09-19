<section class="section section-lg bg-soft">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row align-items-center">
                    <div class="col-md-5 mr-auto mb-4">
                        <h1 class="h1 font-weight-bolder mb-2">
                            {{ __('country_networks_title', ['country' => $countryName]) }}
                        </h1>
                        <!-- <p class="lead">Pay'am works with the following Networks in Rwanda.</p> -->
                    </div>

                    <div class="col-md-6 m-auto">
                        <div class="row">
                            @forelse ($countryNetworks as $network)
                                <article class="col-md-4 mb-3">
                                    <div class="info p-0">
                                        <span class="infos">
                                            <img src="{{ URL::asset($network->image) }}"
                                                alt="{{ $network->caption }}" class="grayhover img-fluid mb-3" />
                                        </span>
                                    </div>
                                </article>
                            @empty
                                <h4>{{ __('no_networks_message') }}</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
