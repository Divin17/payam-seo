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
      <section class="section-header pb-7 pb-lg-11 bg-soft bg-gradient-primary">
          <div class="container">
              <div class="row justify-content-between align-items-center">
                  <div class="col-md-7">
                      <h1 class="display-2 mb-3 font-weight-light text-white">
                          {{ $userType->caption }}
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
                      <img class="img-fluid" src="../assets/img/illustrations/feature-illustration.svg" alt="" />
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
                          {{ $userType->setup_caption }}
                      </h1>
                  </div>
              </div>
              <div class="row mt-4">
                  <div class="col-md-4">
                      <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                      <h3 class="mb-5 mt-2 text-center">
                          Get a Simcard from a supported network.
                      </h3>
                  </div>
                  <div class="col-md-4">
                      <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                      <h3 class="mb-5 mt-2 text-center">
                          Download Payam from the Playstore
                      </h3>
                  </div>
                  <div class="col-md-4">
                      <img src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                      <h3 class="mb-5 mt-2 text-center">Sign up as an Individual</h3>
                  </div>
              </div>
          </div>
      </section>
      <!-- How Tos -->

      @include('components.win-win')

      <!-- Value Propositions -->
      <section class="section section-lg pt-5">
          <div class="container">
              <div class="row row-grid align-items-center mb-5 mb-md-3">
                  <div class="col-md-5 mr-auto">
                      <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                      <h2 class="font-weight-bolder mr-auto">
                          Make your Transactions 7x Faster
                      </h2>
                      <p class="lead">
                          Merchants receive payments for goods and services and can also
                          send money to their vendors and clients.
                      </p>
                  </div>
                  <div class="col-md-6">
                      <img class="img-fluid w-100" src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                  </div>
              </div>

              <div class="row row-grid align-items-center mb-5 mb-md-3">
                  <div class="col-md-5 ml-auto order-2">
                      <h2 class="ml-auto font-weight-bolder mb-4">
                          No Stress, No USSD, Code Needed
                      </h2>
                      <p class="lead">
                          Merchants receive payments for goods and services and can also
                          send money to their vendors and clients.
                      </p>
                  </div>
                  <div class="col-md-6 order-1">
                      <img class="img-fluid" src="../assets/img/No-USSD-code-needed.svg" alt="" />
                  </div>
              </div>

              <div class="row row-grid align-items-center mb-5 mb-md-3">
                  <div class="col-md-5 order-2 order-md-1 mr-auto">
                      <h2 class="font-weight-bolder mb-4">
                          Works Ofline No Internet Data Needed
                      </h2>
                      <p class="lead">
                          Merchants receive payments for goods and services and can also
                          send money to their vendors and clients.
                      </p>
                  </div>
                  <div class="col-md-6 d-flex align-items-center order-1 order-md-2">
                      <img class="img-fluid w-100" src="../assets/img/illustrations/feature-illustration.svg" alt="" />
                  </div>
              </div>

              <div class="row row-grid align-items-center mb-5 mb-md-3">
                  <div class="col-md-5 ml-auto order-2">
                      <h2 class="font-weight-bolder mb-4">
                          No KYC Just install and use
                      </h2>
                      <p class="lead">
                          Merchants receive payments for goods and services and can also
                          send money to their vendors and clients.
                      </p>
                  </div>
                  <div class="col-md-6 d-flex align-items-center order-1">
                      <img class="img-fluid w-100" src="../assets/img/kyc.svg" alt="" />
                  </div>
              </div>

              <div class="row row-grid align-items-center mb-5 mb-md-3">
                  <div class="col-md-5 mr-auto order-2 order-md-1">
                      <h2 class="font-weight-bolder mb-4">
                          Easy Cashless and Secure Payments
                      </h2>
                      <p class="lead">
                          Merchants receive payments for goods and services and can also
                          send money to their vendors and clients.
                      </p>
                  </div>

                  <div class="col-md-6 d-flex align-items-center order-1 order-md-2">
                      <img class="img-fluid w-100" src="../assets/img/fast-and-secure.svg" alt="" />
                  </div>
              </div>
          </div>
      </section>
      <!-- Value Propositions -->

      <section class="section section-lg pb-7 pt-7 bg-primary text-white">
          <div class="container">
              <div class="row">
                  <div class="col-md-5 mb-5">
                      <h1 class="mb-4 display-1">Get Started with Pay'am</h1>
                      <p class="lead mb-5 display-3 font-weight-normal">
                          Download the App, Invite someone, use the app and you both earn.
                      </p>
                      <a href="/" class="btn btn-lg rounded-pill animate-up-2 p-0 w-40">
                          <img class="img" src="../assets/img/playstore.png" alt="" />
                      </a>
                      <a href="/" class="btn btn-lg rounded-pill animate-up-2 p-0 w-40">
                          <img class="img" src="../assets/img/appstore.png" alt="" />
                      </a>
                  </div>
                  <div class="col-md-6 ml-auto text-center">
                      <img src="../assets/img/saas-platform-5.jpg" class="card-img-top rounded-top" alt="image" />
                  </div>
              </div>
          </div>
      </section>

      <!-- Services -->
      <section class="section section-lg line-bottom-light">
          <div class="container">
              <div class="row mt-6">
                  <div class="col-md-10 m-auto text-center mb-5">
                      <h1 class="display-2 mb-5">
                          What {{ $userType->name }} can do using Pay'am in {{ $country->name }}
                      </h1>
                      <!-- <p class="lead">We add new tools and features regularly.</p> -->
                  </div>

                  <div class="col-md-12">
                      <div class="row">
                          <div class="col-12 col-md-6">
                              @forelse ($services as $service)
                                  <!-- Icon Box -->
                                  <div class="card shadow-soft border-light mb-4">
                                      <div class="card-body">
                                          <div class="d-flex flex-column flex-lg-row p-3">
                                              <div class="mb-3 mb-lg-0">
                                                  <div class="icon icon-primary">
                                                      <i class="fas fa-hand-holding-usd"></i>
                                                  </div>
                                              </div>
                                              <div class="pl-lg-4">
                                                  <h4 class="mb-3">{{ $service->name }}</h4>
                                                  <p>
                                                      {{ $service->description }}
                                                  </p>

                                                  TODO: add service providers for this service
                                                  {{-- <div class="row mb-1">
                                                      <div class="col">
                                                          <a href="/front/pages/providers.html">
                                                              <img src="/front/assets/img/eu-money.png"
                                                                  alt="web hosting, domain names"
                                                                  class="grayhover img-fluid mb-3" />
                                                          </a>
                                                      </div>
                                                      <div class="col">
                                                          <a href="/front/pages/providers.html">
                                                              <img src="/front/assets/img/eu-money.png"
                                                                  alt="web hosting, domain names"
                                                                  class="rounded grayhover img-fluid mb-3" />
                                                          </a>
                                                      </div>
                                                      <div class="col">
                                                          <a href="/front/pages/providers.html">
                                                              <img src="/front/assets/img/eu-money.png"
                                                                  alt="web hosting, domain names"
                                                                  class="rounded grayhover img-fluid mb-3" />
                                                          </a>
                                                      </div>
                                                      <div class="col">
                                                          <a href="/front/pages/providers.html">
                                                              <img src="/front/assets/img/eu-money.png"
                                                                  alt="web hosting, domain names"
                                                                  class="rounded grayhover img-fluid mb-3" />
                                                          </a>
                                                      </div>
                                                  </div> --}}
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- End of Icon Box -->
                              @empty
                                  <h4>No Country User Type Services Available</h4>
                              @endforelse
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Services -->

      <!-- Networks -->
      @include('components.countryNetworks', ['countryNetworks' => $networks, 'countryName' => $country->name])

      <!-- Networks -->

      <!-- Payment Providers -->
      <section class="section section-lg">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="row align-items-center">
                          <div class="col-md-6">
                              <div class="row">
                                  @forelse ($providers as $provider)
                                      <div class="col-md-4 mb-3">
                                          <div class="info p-0">
                                              <span class="infos">
                                                  <a
                                                      href="{{ route('show_data_from_ut_or_pr', ['country' => $country->slug ?? $defaultCountry, 'slug1' => $userType->slug, 'slug2' => $provider->slug]) }}">
                                                      <img src="{{ URL::asset($provider->image) }}"
                                                          alt="{{ $provider->caption }}"
                                                          class="grayhover img-fluid mb-3" />
                                                  </a>
                                              </span>
                                          </div>
                                      </div>
                                  @empty
                                      <h4>No Providers information Available</h4>
                                  @endforelse
                              </div>
                          </div>

                          <div class="col-md-5 ml-auto">
                              <h1 class="font-weight-bolder mb-2">
                                  Supported Payment Providers for
                                  {{ json_decode($userType->name)->en ?? $userType->name }} in
                                  {{ $country->name }}
                              </h1>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <!-- Payment Providers -->

      <section class="section section-lg pb-7 pt-7 bg-soft">
          <div class="container">
              <div class="row">
                  <div class="col-md-10 m-auto mb-5 text-center">
                      <h1 class="mb-4 display-2">Download the App</h1>
                      <p class="lead mb-5 display-4 font-weight-normal">
                          Send Money and Pay for Goods and Services, Receive payments from
                          clients and Pay Vendors with the Pay'am App.
                      </p>
                  </div>
                  <div class="row">
                      <div class="col-md-3 ml-auto">
                          <a href="/" class="btn btn-lg rounded-pill animate-up-2">
                              <img class="img" src="../assets/img/playstore.png" alt="" />
                          </a>
                      </div>
                      <div class="col-md-3 mr-auto">
                          <a href="/" class="btn btn-lg rounded-pill animate-up-2">
                              <img class="img" src="../assets/img/appstore.png" alt="" />
                          </a>
                      </div>
                  </div>
                  <!-- <div class="col-md-6 ml-auto text-center">
                <img src="../assets/img/saas-platform-5.jpg" class="card-img-top rounded-top" alt="image">
            </div> -->
              </div>
          </div>
      </section>

      <section class="section section-lg pb-7 pt-7 bg-primary text-white">
          <div class="container">
              <div class="row">
                  <div class="col-md-5 mb-5">
                      <h1 class="mb-4 display-1">Win Win</h1>
                      <p class="lead mb-5 display-3 font-weight-normal">
                          Invite someone, use the app and you both earn.
                      </p>
                      <a href="/win-win" class="btn btn-lg rounded-pill btn-secondary animate-up-2"><span
                              class="mr-2"><i class="fas fa-hand-pointer"></i></span>Learn More</a>
                  </div>
                  <div class="col-md-6 ml-auto d-flex align-items-center text-center">
                      <img src="{{ URL::asset('assets/img/refferal.svg') }}" class="card-img-top rounded-top"
                          alt="image" />
                  </div>
              </div>
          </div>
      </section>

      <section class="section-header text-body">
          <div class="container">
              <div class="row">
                  <div
                      class="
                col-12 col-md-4
                ml-auto
                d-flex
                flex-column
                justify-content-center
              ">
                      <h1 class="display-2 mb-3">Pay'am is Free</h1>
                      <p class="lead">
                          Get access to
                          <span class="font-weight-bold">stressfree,</span> easy to use,
                          <span class="font-weight-bold">app</span> for your day to day
                          transactions completely free, no hidden cost, no trials, no
                          catches, and no limits.
                      </p>
                  </div>
                  <div class="col-12 col-md-4 mr-auto text-gray">
                      <!-- Card -->
                      <div class="card shadow px-2">
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

      <section class="section section-lg bg-white line-bottom-light">
          <div class="container">
              <div class="row justify-content-center mb-4 mb-lg-6">
                  <div class="col-12 col-lg-8 text-center">
                      <h1 class="display-3 mb-4">Frequently asked questions</h1>
                      <!-- <p class="lead text-gray">Here’s what you need to know about your Impact license, based on the questions we get asked the most.</p> -->
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="col-12 col-lg-8">
                      <!--Accordion-->
                      <div class="accordion">
                          <div
                              class="
                    card card-sm card-body
                    border border-light
                    rounded
                    mb-3
                  ">
                              <div data-target="#panel-1" class="accordion-panel-header" data-toggle="collapse"
                                  role="button" aria-expanded="false" aria-controls="panel-1">
                                  <span class="h6 mb-0">Does my subscription automatically renew?</span>
                                  <span class="icon"><i class="fas fa-angle-down"></i></span>
                              </div>
                              <div class="collapse" id="panel-1">
                                  <div class="pt-3">
                                      <p class="mb-0">
                                          At Themesberg, our mission has always been focused on
                                          bringing openness and transparency to the design
                                          process. We've always believed that by providing a space
                                          where designers can share ongoing work not only empowers
                                          them to make better products, it also helps them grow.
                                          We're proud to be a part of creating a more open culture
                                          and to continue building a product that supports this
                                          vision.
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div
                              class="
                    card card-sm card-body
                    border border-light
                    rounded
                    mb-3
                  ">
                              <div data-target="#panel-2" class="accordion-panel-header" data-toggle="collapse"
                                  role="button" aria-expanded="false" aria-controls="panel-2">
                                  <span class="h6 mb-0">What happens if I don’t renew my license?</span>
                                  <span class="icon"><i class="fas fa-angle-down"></i></span>
                              </div>
                              <div class="collapse" id="panel-2">
                                  <div class="pt-3">
                                      <p class="mb-0">
                                          At Themesberg, our mission has always been focused on
                                          bringing openness and transparency to the design
                                          process. We've always believed that by providing a space
                                          where designers can share ongoing work not only empowers
                                          them to make better products, it also helps them grow.
                                          We're proud to be a part of creating a more open culture
                                          and to continue building a product that supports this
                                          vision.
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div
                              class="
                    card card-sm card-body
                    border border-light
                    rounded
                    mb-3
                  ">
                              <div data-target="#panel-3" class="accordion-panel-header" data-toggle="collapse"
                                  role="button" aria-expanded="false" aria-controls="panel-3">
                                  <span class="h6 mb-0">Can I cancel my subscription?</span>
                                  <span class="icon"><i class="fas fa-angle-down"></i></span>
                              </div>
                              <div class="collapse" id="panel-3">
                                  <div class="pt-3">
                                      <p class="mb-0">
                                          At Themesberg, our mission has always been focused on
                                          bringing openness and transparency to the design
                                          process. We've always believed that by providing a space
                                          where designers can share ongoing work not only empowers
                                          them to make better products, it also helps them grow.
                                          We're proud to be a part of creating a more open culture
                                          and to continue building a product that supports this
                                          vision.
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div
                              class="
                    card card-sm card-body
                    border border-light
                    rounded
                    mb-3
                  ">
                              <div data-target="#panel-4" class="accordion-panel-header" data-toggle="collapse"
                                  role="button" aria-expanded="false" aria-controls="panel-4">
                                  <span class="h6 mb-0">Do I need to renew my license to receive fixes?</span>
                                  <span class="icon"><i class="fas fa-angle-down"></i></span>
                              </div>
                              <div class="collapse" id="panel-4">
                                  <div class="pt-3">
                                      <p class="mb-0">
                                          At Themesberg, our mission has always been focused on
                                          bringing openness and transparency to the design
                                          process. We've always believed that by providing a space
                                          where designers can share ongoing work not only empowers
                                          them to make better products, it also helps them grow.
                                          We're proud to be a part of creating a more open culture
                                          and to continue building a product that supports this
                                          vision.
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div
                              class="
                    card card-sm card-body
                    border border-light
                    rounded
                    mb-3
                  ">
                              <div data-target="#panel-5" class="accordion-panel-header" data-toggle="collapse"
                                  role="button" aria-expanded="false" aria-controls="panel-5">
                                  <span class="h6 mb-0">Where can I find the End User License Agreement
                                      (EULA)?</span>
                                  <span class="icon"><i class="fas fa-angle-down"></i></span>
                              </div>
                              <div class="collapse" id="panel-5">
                                  <div class="pt-3">
                                      <p class="mb-0">
                                          At Themesberg, our mission has always been focused on
                                          bringing openness and transparency to the design
                                          process. We've always believed that by providing a space
                                          where designers can share ongoing work not only empowers
                                          them to make better products, it also helps them grow.
                                          We're proud to be a part of creating a more open culture
                                          and to continue building a product that supports this
                                          vision.
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="row mt-5 mt-lg-6">
                              <div class="col text-center">
                                  <a href="#" class="btn btn-primary animate-up-2"><span class="mr-2"><i
                                              class="fas fa-question-circle"></i></span>
                                      See all FAQ</a>
                              </div>
                          </div>
                      </div>
                      <!--End of Accordion-->
                  </div>
              </div>
          </div>
      </section>

      @include('components.download')
