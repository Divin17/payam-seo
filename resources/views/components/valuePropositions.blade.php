        <section class="section section-lg pt-5">
            <div class="container">

                @forelse ($valuePropositions as $valueProposition)
                    @if ($loop->odd)
                        <div class="row row-grid align-items-center mb-5 mb-md-3">
                            <div class="col-md-5 mr-auto">
                                <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                                <h2 class="font-weight-bolder mr-auto">
                                    {{ json_decode($valueProposition->title)->$locale ?? '' }}</h2>
                                <p class="lead">
                                    {{ json_decode($valueProposition->description)->$locale ?? '' }}
                                </p>

                            </div>
                            <div class="col-md-6">
                                <img class="img-fluid" src="{{ URL::asset($valueProposition->image) }}" alt="">
                            </div>
                        </div>
                    @else
                        <div class="row row-grid align-items-center mb-5 mb-md-3">

                            <div class="col-md-5 ml-auto order-2">
                                <h2 class="ml-auto font-weight-bolder mb-4">
                                    {{ json_decode($valueProposition->title)->$locale ?? '' }}</h2>
                                <p class="lead">
                                    {{ json_decode($valueProposition->description)->$locale ?? '' }}
                                </p>
                            </div>
                            <div class="col-md-6 order-1">
                                <img class="img-fluid" src="{{ URL::asset($valueProposition->image) }}" alt="">
                            </div>

                        </div>
                    @endif
                @empty
                    <h4>{{ __('no_vp_message') }}</h4>
                @endforelse
            </div>
        </section>
