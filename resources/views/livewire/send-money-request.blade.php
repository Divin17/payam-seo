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
                        {{ __('send_money_request_title') }}
                    </h1>
                    <!-- <p class="lead text-white">Impact helps you learn why your competitors rank so high and what you need to do to outrank them.</p> -->
                    <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                        <img class="img" src="../assets/img/playstore.png" alt="" />
                    </a>
                    <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                        <img class="img" src="../assets/img/appstore.png" alt="" />
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="pattern bottom"></div> -->
    </section>

    <section class="section section-lg">
        <div class="container">
            <div class="row mb-2 mb-md-3">
                <div class="col-md-6 d-flex align-items-center">
                    <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                    <h1 class="display-1 font-weight-bolder py-auto">
                        {{ __('zero_code') }}, <br />
                        {{ __('just_payam') }}
                    </h1>
                </div>
                <div class="col-md-6">
                    <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                </div>
            </div>

            <div class="row mb-2 mb-md-3 mt-6">
                <div class="col-md-12 text-center">
                    <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                    <h1 class="display-1 font-weight-bolder mb-4">{{ __('quick_and_easy') }}</h1>
                </div>
                <div class="col-md-12">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                    href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                    aria-selected="true">
                                    <h3 class="d-none d-md-block">{{ __('send_money') }}</h3>
                                    <h3 class="d-block d-md-none">Send</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                    href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                    aria-selected="false">
                                    <h3 class="d-none d-md-block">{{ __('request_money') }}</h3>
                                    <h3 class="d-block d-md-none">Request</h3>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card shadow">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">
                                    <div class="row d-none d-md-flex">
                                        <div class="col-md-4">
                                            <h2 class="font-weight-bolder mb-5 mt-5">01</h2>
                                            <img class="img-fluid"
                                                src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="font-weight-bolder mb-5 mt-5">02</h2>
                                            <img class="img-fluid"
                                                src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="font-weight-bolder mb-5 mt-5">03</h2>
                                            <img class="img-fluid"
                                                src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                                        </div>
                                    </div>

                                    <div class="row d-flex d-md-none">
                                        <div class="col-md-12">
                                            <div id="carouselExampleIndicators" class="carousel slide pointer-event"
                                                data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                        class=""></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"
                                                        class="active"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"
                                                        class=""></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item">
                                                        <h2 class="font-weight-bolder mb-5 mt-5">01</h2>
                                                        <div class="">
                                                            <img class="img-fluid"
                                                                src="../assets/img/illustrations/feature-illustration.svg"
                                                                alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item active">
                                                        <h2 class="font-weight-bolder mb-5 mt-5">02</h2>
                                                        <div class="splide__slide__container">
                                                            <img class="img-fluid"
                                                                src="../assets/img/illustrations/feature-illustration.svg"
                                                                alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <h2 class="font-weight-bolder mb-5 mt-5">03</h2>
                                                        <div class="splide__slide__container">
                                                            <img class="img-fluid"
                                                                src="../assets/img/illustrations/feature-illustration.svg"
                                                                alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <div class="row d-none d-md-flex">
                                        <div class="col-md-4">
                                            <h2 class="font-weight-bolder mb-5 mt-5">01</h2>
                                            <img class="img-fluid"
                                                src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="font-weight-bolder mb-5 mt-5">02</h2>
                                            <img class="img-fluid"
                                                src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="font-weight-bolder mb-5 mt-5">03</h2>
                                            <img class="img-fluid"
                                                src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                                        </div>
                                    </div>

                                    <div class="row d-flex d-md-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.win-win')

    <section class="section section-lg">
        <div class="container">
            <div class="row row-grid align-items-center mb-5 mb-md-3">
                <div class="col-md-5 ml-auto order-2">
                    <h1 class="display-2 font-weight-bolder mb-4">
                        {{ __('send_money_contacts_vp') }}
                    </h1>
                </div>
                <div class="col-md-6 order-1">
                    <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                </div>
            </div>
            <div class="row row-grid align-items-center mb-5 mb-md-3">
                <div class="col-md-5 ml-auto order-2 order-md-1">
                    <h1 class="display-2 font-weight-bolder mb-4">
                        {{ __('easy_cashless_vp') }}
                    </h1>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                </div>
            </div>
        </div>
    </section>

    @include('components.download')

    @include('components.countries')

    @include('components.download')

</div>
