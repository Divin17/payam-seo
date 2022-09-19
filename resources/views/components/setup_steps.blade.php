    <section class="section section-lg">
        <div class="container">
            <div class="row mb-2 mb-md-4">
                <div class="col-md-9 m-auto">
                    <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                    <h1 class="display-2 mb-4 text-center">
                        {{ json_decode($setup_header)->$locale ?? 'How to get started' }}
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
