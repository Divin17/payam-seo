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
    <section class="section-header bg-gradient-primary pb-7 pb-lg-11 bg-soft">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-7">
                    <h1 class="display-1 mb-3 text-white font-weight-light">
                        {{ __('how_it_works_title') }}
                    </h1>
                    <!-- <p class="lead text-white">Impact helps you learn why your competitors rank so high and what you need to do to outrank them.</p> -->
                    <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                        <img class="img" src="../assets/img/playstore.png" alt="" />
                    </a>
                    <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                        <img class="img" src="../assets/img/appstore.png" alt="" />
                    </a>
                </div>
                <div class="col-md-5">
                    <img src="../assets/img/illustrations/hero-illustration.svg" alt="" />
                </div>
            </div>
        </div>
        <!-- <div class="pattern bottom"></div> -->
    </section>

    <section class="section section-lg">
        <div class="container">
            <!-- <div class="row mb-5 mb-md-7 mt-md-6">
                    <div class="col-md-6 m-auto">
                        <h2 class="h1 font-weight-bolder mb-4">For Businesses</h2>
                        <p class="lead">Pay’am is a stress-free way for everyone to Send money to friends, loved ones and pay for goods and services.</p>
                        <a href="./about.html" class="mt-5 btn-link mt-3 animate-up-2">
                            Learn More
                            <span class="icon icon-xs ml-2">
                                <i class="fas fa-external-link-alt"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-md-6 m-auto">
                        <h2 class="h1 font-weight-bolder mb-4">For Individuals</h2>
                        <p class="lead">Businesses can Receive payment for their goods and services and also Send money to other vendors, friends and loved ones.</p>
                        <a href="./about.html" class="mt-5 btn-link mt-3 animate-up-2">
                            Learn More
                            <span class="icon icon-xs ml-2">
                                <i class="fas fa-external-link-alt"></i>
                            </span>
                        </a>
                    </div>
                </div> -->

            <div class="row mb-2 mb-md-3">
                <div class="col-md-8 mr-auto">
                    <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                    <h1 class="display-1 font-weight-bolder mb-4">
                        {{ __('how_it_works_send_receive_title') }}
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h2 class="font-weight-bolder mb-5 mt-5">01</h2>
                    <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                </div>
                <div class="col-md-4">
                    <h2 class="font-weight-bolder mb-5 mt-5">02</h2>
                    <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                </div>
                <div class="col-md-4">
                    <h2 class="font-weight-bolder mb-5 mt-5">03</h2>
                    <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                </div>
            </div>

            <div class="row mb-2 mb-md-3 mt-6">
                <div class="col-md-8 mr-auto">
                    <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                    <h1 class="display-1 font-weight-bolder mb-4">
                        {{ __('how_it_works_pay_title') }}
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h2 class="font-weight-bolder mb-5 mt-5">01</h2>
                    <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                </div>
                <div class="col-md-4">
                    <h2 class="font-weight-bolder mb-5 mt-5">02</h2>
                    <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                </div>
                <div class="col-md-4">
                    <h2 class="font-weight-bolder mb-5 mt-5">03</h2>
                    <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                </div>
            </div>
        </div>
    </section>

    @include('components.win-win')


    @include('components.valuePropositions')


    @include('components.download')

    @include('components.countries')

    @include('components.download')

</div>
