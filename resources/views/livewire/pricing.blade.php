<div>
    <div
        class="
          preloader
          bg-soft
          flex-column
          justify-content-center
          align-items-center
        ">
        <div class="loader-element">
            <!-- <span class="loader-animated-dot"></span> -->
            <img src="../assets/img/brand/dark-loader.svg" height="60" alt="Impact logo" />
        </div>
    </div>

    <!-- Hero -->
    <section class="section-header bg-primary text-white pb-7 pb-lg-11">
        <div class="container">
            <div class="row justify-content-center mb-6">
                <div class="col-12 col-md-10 text-center">
                    <h1 class="display-2 mb-3">{{ __('payam_free_title') }}</h1>
                    <p class="lead px-5">
                        {{ __('payam_free_description') }}
                    </p>
                </div>
            </div>
            <div class="row text-gray">
                <div class="col-12 col-lg-4 m-auto">
                    <!-- Card -->
                    <div class="card shadow-soft mb-5 mb-lg-6 px-2">
                        <div class="card-header border-light py-5 px-4">
                            <!-- Price -->
                            <div class="d-flex mb-3 justify-content-center">
                                <span class="h5 mb-0">XAF</span>
                                <span class="price display-2 mb-0" data-annual="0" data-monthly="0">0</span>
                                <span class="h6 font-weight-normal align-self-end">/ month</span>
                            </div>
                            <!-- <h4 class="mb-3 text-black">Free trial</h4>
                                <p class="font-weight-normal mb-0">If you're new to SEO or just need the basics, this plan is a great way.</p> -->
                        </div>
                        <!-- <div class="card-body pt-5">
                                <ul class="list-group simple-list">
                                    <li class="list-group-item font-weight-normal"><span class="icon-gray"><i class="fas fa-check"></i></span>Users<span class="font-weight-bolder"> 1</span></li>
                                    <li class="list-group-item font-weight-normal"><span class="icon-gray"><i class="fas fa-check"></i></span>Full access to design tool</li>
                                    <li class="list-group-item font-weight-normal"><span class="icon-gray"><i class="fas fa-check"></i></span>Publish with <span class="font-weight-bolder">Impact</span> &reg; label</li>
                                    <li class="list-group-item font-weight-normal"><span class="icon-gray"><i class="fas fa-check"></i></span>Sub-domain publish</li>
                                    <li class="list-group-item font-weight-normal"><span class="icon-gray"><i class="fas fa-check"></i></span>1 User</li>
                                    <li class="list-group-item font-weight-normal"><span class="icon-gray"><i class="fas fa-check"></i></span>Public Share & Comments</li>
                                    <li class="list-group-item font-weight-normal"><span class="icon-gray"><i class="fas fa-check"></i></span>Chat Support</li>
                                </ul>
                            </div> -->
                        <div class="card-footer px-4 pb-4">
                            <!-- Button -->
                            <a href="/" class="btn btn-lg rounded-pill animate-up-2">
                                <img class="img" src="../assets/img/playstore.png" alt="" />
                            </a>
                            <a href="/" class="btn btn-lg rounded-pill animate-up-2">
                                <img class="img" src="../assets/img/appstore.png" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="pattern bottom"></div> -->
    </section>

    @include('components.download')

    @include('components.valuePropositions')

    @include('components.win-win')

    @include('components.countries')

    @include('components.download')

    @include('components.faq')

    @include('components.download')

</div>
