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
              <img src="{{ URL::asset('assets/img/brand/dark-loader.svg') }}" height="60" alt="Impact logo" />
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
      @include('components.services', ['services' => $services, 'countryName' => $defaultCountry, 'providers',
      'showUserTypes' => false]);
      <!-- Services -->

      <!-- Networks -->

      @include('components.countryNetworks', ['countryNetworks' => $networks, 'countryName' => $defaultCountry])

      <!-- Networks -->

      <!-- Payment Providers -->
      @include('components.providers', ['providers' => $providers, 'countryName' => $defaultCountry])
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
                                          bringing openn
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
                                                  <img src="../assets/img/brand/dark-loader.svg" height="60"
                                                      alt="Impact logo" />
                                              </div>
                                          </div>
                                          <!-- Hero -->
                                          <section class="section-header pb-7 pb-lg-11 bg-soft">
                                              <div class="container">
                                                  <div class="row justify-content-between align-items-center">
                                                      <div class="col-md-7">
                                                          <h1 class="display-2 mb-3 font-weight-light">
                                                              Agents work 7x faster with Pay'am in Cameroon
                                                          </h1>
                                                          <!-- <p class="lead">Impact helps you learn why your competitors rank so high and what you need to do to outrank them.</p> -->
                                                          <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                                                              <img class="img"
                                                                  src="../assets/img/playstore.png" alt="" />
                                                          </a>
                                                          <a href="/" class="btn rounded-pill p-0 animate-up-2 w-40">
                                                              <img class="img"
                                                                  src="../assets/img/appstore.png" alt="" />
                                                          </a>
                                                      </div>
                                                      <div class="col-md-5">
                                                          <img class="img-fluid"
                                                              src="../assets/img/illustrations/feature-illustration.svg"
                                                              alt="" />
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- <div class="pattern bottom"></div> -->
                                          </section>

                                          <section class="section section-lg">
                                              <div class="container">
                                                  <div class="row mb-2 mb-md-3">
                                                      <div class="col-md-8 mr-auto">
                                                          <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                                                          <h1 class="display-1 font-weight-bolder mb-4">
                                                              How to use Pay'am as an Agent In {{ $defaultCountry }}
                                                          </h1>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                          <h2 class="font-weight-bolder mb-5 mt-5">01</h2>
                                                          <img src="../assets/img/illustrations/feature-illustration.svg"
                                                              alt="" />
                                                      </div>
                                                      <div class="col-md-4">
                                                          <h2 class="font-weight-bolder mb-5 mt-5">02</h2>
                                                          <img src="../assets/img/illustrations/feature-illustration.svg"
                                                              alt="" />
                                                      </div>
                                                      <div class="col-md-4">
                                                          <h2 class="font-weight-bolder mb-5 mt-5">03</h2>
                                                          <img src="../assets/img/illustrations/feature-illustration.svg"
                                                              alt="" />
                                                      </div>
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
                                                          <a href="/front/pages/win-win.html"
                                                              class="btn btn-lg rounded-pill btn-secondary animate-up-2"><span
                                                                  class="mr-2"><i
                                                                      class="fas fa-hand-pointer"></i></span>Learn
                                                              More</a>
                                                      </div>
                                                      <div
                                                          class="col-md-6 ml-auto d-flex align-items-center text-center">
                                                          <img src="../assets/img/refferal.svg"
                                                              class="card-img-top rounded-top" alt="image" />
                                                      </div>
                                                  </div>
                                              </div>
                                          </section>

                                          <section class="section section-lg pt-0">
                                              <div class="container">
                                                  <div class="row row-grid align-items-center mb-5 mb-md-3">
                                                      <div class="col-md-5 mr-auto">
                                                          <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                                                          <h1 class="display-2 font-weight-bolder mr-auto">
                                                              Make your Transactions 7x Faster
                                                          </h1>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <img class="img-fluid"
                                                              src="../assets/img/illustrations/feature-illustration.svg"
                                                              alt="" />
                                                      </div>
                                                  </div>
                                                  <div class="row row-grid align-items-center mb-5 mb-md-3">
                                                      <div class="col-md-5 ml-auto order-2">
                                                          <h1 class="display-2 ml-auto font-weight-bolder mb-4">
                                                              No Stress,<br class="d-none d-md-block" />
                                                              No USSD,<br class="d-none d-md-block" />
                                                              Code Needed
                                                          </h1>
                                                      </div>
                                                      <div class="col-md-6 order-1">
                                                          <img class="img-fluid"
                                                              src="../assets/img/No-USSD-code-needed.svg" alt="" />
                                                      </div>
                                                  </div>

                                                  <div class="row row-grid align-items-center mb-5 mb-md-3">
                                                      <div class="col-md-5 order-2 order-md-1 mr-auto">
                                                          <h1 class="display-2 font-weight-bolder mb-4">
                                                              Works Ofline<br />
                                                              No Internet Data Needed
                                                          </h1>
                                                      </div>
                                                      <div
                                                          class="col-md-6 d-flex align-items-center order-1 order-md-2">
                                                          <img class="img-fluid"
                                                              src="../assets/img/illustrations/feature-illustration.svg"
                                                              alt="" />
                                                      </div>
                                                  </div>

                                                  <div class="row row-grid align-items-center mb-5 mb-md-3">
                                                      <div class="col-md-5 ml-auto order-2">
                                                          <h1 class="display-2 font-weight-bolder mb-4">
                                                              No KYC <br />
                                                              Just install and use
                                                          </h1>
                                                      </div>
                                                      <div class="col-md-6 d-flex align-items-center order-1">
                                                          <img class="img-fluid w-100" src="../assets/img/kyc.svg"
                                                              alt="" />
                                                      </div>
                                                  </div>

                                                  <div class="row row-grid align-items-center mb-5 mb-md-3">
                                                      <div class="col-md-5 mr-auto order-2 order-md-1">
                                                          <h1 class="display-2 font-weight-bolder mb-4">
                                                              Easy Cashless <br />
                                                              and Secure Payments
                                                          </h1>
                                                      </div>

                                                      <div
                                                          class="col-md-6 d-flex align-items-center order-1 order-md-2">
                                                          <img class="img-fluid"
                                                              src="../assets/img/fast-and-secure.svg" alt="" />
                                                      </div>
                                                  </div>
                                              </div>
                                          </section>

                                          @include('components.download')

                                          <section class="section section-lg line-bottom-light">
                                              <div class="container">
                                                  <div class="row mt-6">
                                                      <div class="col-md-10 m-auto text-center mb-5">
                                                          <h1 class="display-2 mb-4">
                                                              What {{ $userType->name }} can do @@targetservice using
                                                              Pay'am in
                                                              {{ $defaultCountry }}
                                                          </h1>
                                                          <!-- <p class="lead">We add new tools and features regularly.</p> -->
                                                      </div>

                                                      <div class="col-md-12">
                                                          <div class="row">
                                                              <div class="col-12 col-md-6">
                                                                  <!-- Icon Box -->
                                                                  <div class="card shadow-soft border-light mb-4">
                                                                      <div class="card-body">
                                                                          <div
                                                                              class="d-flex flex-column flex-lg-row p-3">
                                                                              <div class="mb-3 mb-lg-0">
                                                                                  <div class="icon icon-primary">
                                                                                      <i
                                                                                          class="fas fa-hand-holding-usd"></i>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="pl-lg-4">
                                                                                  <div class="d-flex mb-1">
                                                                                      <a href="/front/pages/individual.html"
                                                                                          class="
                                badge badge-pill
                                bg-white
                                border border-primary
                                text-uppercase
                                mr-1
                              ">Individuals</a>
                                                                                      <a href="/front/pages/merchants.html"
                                                                                          class="
                                badge badge-pill
                                bg-white
                                border border-primary
                                text-uppercase
                                mr-1
                              ">Merchants</a>
                                                                                      <a href="/front/pages/agents.html"
                                                                                          class="
                                badge badge-pill
                                bg-white
                                border border-primary
                                text-uppercase
                                mr-1
                              ">Agents</a>
                                                                                  </div>
                                                                                  <h4 class="mb-3">Send and
                                                                                      Request Money</h4>
                                                                                  <p>
                                                                                      Send and Request money easily to
                                                                                      friends and loved
                                                                                      ones
                                                                                  </p>
                                                                                  <a href="/front/pages/send-money-request.html"
                                                                                      class="text-underline">
                                                                                      Learn More
                                                                                      <span class="icon icon-xs ml-2">
                                                                                          <i
                                                                                              class="fas fa-external-link-alt"></i>
                                                                                      </span>
                                                                                  </a>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <!-- End of Icon Box -->
                                                              </div>
                                                              <div class="col-12 col-md-6">
                                                                  <!-- Icon Box -->
                                                                  <div class="card shadow-soft border-light mb-4">
                                                                      <div class="card-body">
                                                                          <div
                                                                              class="d-flex flex-column flex-lg-row p-3">
                                                                              <div class="mb-3 mb-lg-0">
                                                                                  <div class="icon icon-primary">
                                                                                      <i
                                                                                          class="fas fa-comment-dollar"></i>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="pl-lg-4">
                                                                                  <h4 class="mb-3">Pay for
                                                                                      Goods and Services</h4>
                                                                                  <p>
                                                                                      Fast and easy way to pay, for
                                                                                      goods and services.
                                                                                  </p>
                                                                                  <a href="/front/pages/pay-goods-services.html"
                                                                                      class="text-underline">
                                                                                      Learn More
                                                                                      <span class="icon icon-xs ml-2">
                                                                                          <i
                                                                                              class="fas fa-external-link-alt"></i>
                                                                                      </span>
                                                                                  </a>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <!-- End of Icon Box -->
                                                              </div>
                                                              <div class="col-12 col-md-6">
                                                                  <!-- Icon Box -->
                                                                  <div class="card shadow-soft border-light mb-4">
                                                                      <div class="card-body">
                                                                          <div
                                                                              class="d-flex flex-column flex-lg-row p-3">
                                                                              <div class="mb-3 mb-lg-0">
                                                                                  <div class="icon icon-primary">
                                                                                      <i class="fas fa-qrcode"></i>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="pl-lg-4">
                                                                                  <h4 class="mb-3">Deposite
                                                                                      and Withdraw money</h4>
                                                                                  <p>
                                                                                      Easily deposite and withdraw money
                                                                                      from your
                                                                                      contacts
                                                                                  </p>
                                                                                  <a href="/front/pages/deposite-withdraw-businesses.html"
                                                                                      class="text-underline">
                                                                                      Learn More
                                                                                      <span class="icon icon-xs ml-2">
                                                                                          <i
                                                                                              class="fas fa-external-link-alt"></i>
                                                                                      </span>
                                                                                  </a>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <!-- End of Icon Box -->
                                                              </div>
                                                              <div class="col-12 col-md-6">
                                                                  <!-- Icon Box -->
                                                                  <div class="card shadow-soft border-light mb-4">
                                                                      <div class="card-body">
                                                                          <div
                                                                              class="d-flex flex-column flex-lg-row p-3">
                                                                              <div class="mb-3 mb-lg-0">
                                                                                  <div class="icon icon-primary">
                                                                                      <i class="fas fa-coins"></i>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="pl-lg-4">
                                                                                  <h4 class="mb-3">Make
                                                                                      Payments</h4>
                                                                                  <p>Use Pay'am to pay vendors</p>
                                                                                  <a href="/front/pages/make-payments.html"
                                                                                      class="text-underline">
                                                                                      Learn More
                                                                                      <span class="icon icon-xs ml-2">
                                                                                          <i
                                                                                              class="fas fa-external-link-alt"></i>
                                                                                      </span>
                                                                                  </a>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <!-- End of Icon Box -->
                                                              </div>
                                                              <div class="col-12 col-md-6">
                                                                  <!-- Icon Box -->
                                                                  <div class="card shadow-soft border-light mb-4">
                                                                      <div class="card-body">
                                                                          <div
                                                                              class="d-flex flex-column flex-lg-row p-3">
                                                                              <div class="mb-3 mb-lg-0">
                                                                                  <div class="icon icon-primary">
                                                                                      <i
                                                                                          class="fas fa-sign-in-alt"></i>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="pl-lg-4">
                                                                                  <h4 class="mb-3">Receive
                                                                                      Payments</h4>
                                                                                  <p>
                                                                                      Receive Payments for your goods
                                                                                      and services through
                                                                                      Pay'am
                                                                                  </p>
                                                                                  <a href="/front/pages/recieve-payments.html"
                                                                                      class="text-underline">
                                                                                      Learn More
                                                                                      <span class="icon icon-xs ml-2">
                                                                                          <i
                                                                                              class="fas fa-external-link-alt"></i>
                                                                                      </span>
                                                                                  </a>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <!-- End of Icon Box -->
                                                              </div>
                                                              <div class="col-12 col-md-6">
                                                                  <!-- Icon Box -->
                                                                  <div class="card shadow-soft border-light mb-4">
                                                                      <div class="card-body">
                                                                          <div
                                                                              class="d-flex flex-column flex-lg-row p-3">
                                                                              <div class="mb-3 mb-lg-0">
                                                                                  <div class="icon icon-primary">
                                                                                      <i
                                                                                          class="fas fa-sign-in-alt"></i>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="pl-lg-4">
                                                                                  <h4 class="mb-3">Buy and
                                                                                      Sell Telephone Credit</h4>
                                                                                  <p>
                                                                                      Receive Payments for your goods
                                                                                      and services through
                                                                                      Pay'am
                                                                                  </p>
                                                                                  <a href="/front/pages/telephone.html"
                                                                                      class="text-underline">
                                                                                      Learn More
                                                                                      <span class="icon icon-xs ml-2">
                                                                                          <i
                                                                                              class="fas fa-external-link-alt"></i>
                                                                                      </span>
                                                                                  </a>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <!-- End of Icon Box -->
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </section>

                                          <section class="section section-lg bg-soft">
                                              <div class="container">
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                          <div class="row align-items-center">
                                                              <div class="col-md-5 mr-auto mb-4">
                                                                  <h2 class="h1 display-2 font-weight-bolder mb-2">
                                                                      Supported Networks in {{ $defaultCountry }}
                                                                  </h2>
                                                                  <p class="lead">
                                                                      Pay'am works with the following Networks in
                                                                      {{ $defaultCountry }}.
                                                                  </p>
                                                              </div>

                                                              <div class="col-md-6 m-auto">
                                                                  <div class="row">
                                                                      <div class="col-md-4 mb-3">
                                                                          <div class="info p-0">
                                                                              <span class="infos">
                                                                                  <img src="/front/assets/img/mtn.png"
                                                                                      alt="web hosting, domain names"
                                                                                      class="grayhover img-fluid mb-3" />
                                                                              </span>
                                                                          </div>
                                                                      </div>

                                                                      <div class="col-md-4 mb-3">
                                                                          <div class="info p-0">
                                                                              <span class="infos">
                                                                                  <img src="/front/assets/img/partner-orange.png"
                                                                                      alt="web hosting, domain names"
                                                                                      class="grayhover img-fluid mb-3" />
                                                                              </span>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </section>

                                          <section class="section section-lg">
                                              <div class="container">
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                          <div class="row align-items-center">
                                                              <div class="col-md-6">
                                                                  <div class="row">
                                                                      <div class="col-md-4 mb-3">
                                                                          <div class="info p-0">
                                                                              <span class="infos">
                                                                                  <a href="/front/pages/providers.html">
                                                                                      <img src="/front/assets/img/OrangeMoney.jpg"
                                                                                          alt="web hosting, domain names"
                                                                                          class="grayhover img-fluid mb-3" />
                                                                                  </a>
                                                                              </span>
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-4 mb-3">
                                                                          <div class="info p-0">
                                                                              <span class="infos">
                                                                                  <a href="/front/pages/providers.html">
                                                                                      <img src="/front/assets/img/mobile-money.jpg"
                                                                                          alt="web hosting, domain names"
                                                                                          class="grayhover img-fluid mb-3" />
                                                                                  </a>
                                                                              </span>
                                                                          </div>
                                                                      </div>

                                                                      <div class="col-md-4 mb-3">
                                                                          <div class="info p-0">
                                                                              <span class="infos">
                                                                                  <a href="/front/pages/providers.html">
                                                                                      <img src="/front/assets/img/eu-money.png"
                                                                                          alt="web hosting, domain names"
                                                                                          class="grayhover img-fluid mb-3" />
                                                                                  </a>
                                                                              </span>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>

                                                              <div class="col-md-5 ml-auto">
                                                                  <h2 class="h1 display-2 font-weight-bolder mb-2">
                                                                      Supported Payment Providers in
                                                                      {{ $defaultCountry }}
                                                                  </h2>
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
                                                                              <img src="../assets/img/brand/dark-loader.svg"
                                                                                  height="60" alt="Impact logo" />
                                                                          </div>
                                                                      </div>
                                                                      <!-- Hero -->
                                                                      <section
                                                                          class="section-header pb-7 pb-lg-11 bg-soft">
                                                                          <div class="container">
                                                                              <div
                                                                                  class="row justify-content-between align-items-center">
                                                                                  <div class="col-md-7">
                                                                                      <h1
                                                                                          class="display-2 mb-3 font-weight-light">
                                                                                          Agents work 7x faster with
                                                                                          Pay'am in Cameroon
                                                                                      </h1>
                                                                                      <!-- <p class="lead">Impact helps you learn why your competitors rank so high and what you need to do to outrank them.</p> -->
                                                                                      <a href="/"
                                                                                          class="btn rounded-pill p-0 animate-up-2 w-40">
                                                                                          <img class="img"
                                                                                              src="../assets/img/playstore.png"
                                                                                              alt="" />
                                                                                      </a>
                                                                                      <a href="/"
                                                                                          class="btn rounded-pill p-0 animate-up-2 w-40">
                                                                                          <img class="img"
                                                                                              src="../assets/img/appstore.png"
                                                                                              alt="" />
                                                                                      </a>
                                                                                  </div>
                                                                                  <div class="col-md-5">
                                                                                      <img class="img-fluid"
                                                                                          src="../assets/img/illustrations/feature-illustration.svg"
                                                                                          alt="" />
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <!-- <div class="pattern bottom"></div> -->
                                                                      </section>

                                                                      <section class="section section-lg">
                                                                          <div class="container">
                                                                              <div class="row mb-2 mb-md-3">
                                                                                  <div class="col-md-8 mr-auto">
                                                                                      <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                                                                                      <h1
                                                                                          class="display-1 font-weight-bolder mb-4">
                                                                                          How to use Pay'am as an Agent
                                                                                          In {{ $defaultCountry }}
                                                                                      </h1>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="row">
                                                                                  <div class="col-md-4">
                                                                                      <h2
                                                                                          class="font-weight-bolder mb-5 mt-5">
                                                                                          01</h2>
                                                                                      <img src="../assets/img/illustrations/feature-illustration.svg"
                                                                                          alt="" />
                                                                                  </div>
                                                                                  <div class="col-md-4">
                                                                                      <h2
                                                                                          class="font-weight-bolder mb-5 mt-5">
                                                                                          02</h2>
                                                                                      <img src="../assets/img/illustrations/feature-illustration.svg"
                                                                                          alt="" />
                                                                                  </div>
                                                                                  <div class="col-md-4">
                                                                                      <h2
                                                                                          class="font-weight-bolder mb-5 mt-5">
                                                                                          03</h2>
                                                                                      <img src="../assets/img/illustrations/feature-illustration.svg"
                                                                                          alt="" />
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </section>

                                                                      <section
                                                                          class="section section-lg pb-7 pt-7 bg-primary text-white">
                                                                          <div class="container">
                                                                              <div class="row">
                                                                                  <div class="col-md-5 mb-5">
                                                                                      <h1 class="mb-4 display-1">Win
                                                                                          Win</h1>
                                                                                      <p
                                                                                          class="lead mb-5 display-3 font-weight-normal">
                                                                                          Invite someone, use the app
                                                                                          and you both earn.
                                                                                      </p>
                                                                                      <a href="/front/pages/win-win.html"
                                                                                          class="btn btn-lg rounded-pill btn-secondary animate-up-2"><span
                                                                                              class="mr-2"><i
                                                                                                  class="fas fa-hand-pointer"></i></span>Learn
                                                                                          More</a>
                                                                                  </div>
                                                                                  <div
                                                                                      class="col-md-6 ml-auto d-flex align-items-center text-center">
                                                                                      <img src="../assets/img/refferal.svg"
                                                                                          class="card-img-top rounded-top"
                                                                                          alt="image" />
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </section>

                                                                      <section class="section section-lg pt-0">
                                                                          <div class="container">
                                                                              <div
                                                                                  class="row row-grid align-items-center mb-5 mb-md-3">
                                                                                  <div class="col-md-5 mr-auto">
                                                                                      <!-- <h1 class="h1 font-weight-bolder mb-4">Life is easy with Pay’am</h1> -->
                                                                                      <h1
                                                                                          class="display-2 font-weight-bolder mr-auto">
                                                                                          Make your Transactions 7x
                                                                                          Faster
                                                                                      </h1>
                                                                                  </div>
                                                                                  <div class="col-md-6">
                                                                                      <img class="img-fluid"
                                                                                          src="../assets/img/illustrations/feature-illustration.svg"
                                                                                          alt="" />
                                                                                  </div>
                                                                              </div>
                                                                              <div
                                                                                  class="row row-grid align-items-center mb-5 mb-md-3">
                                                                                  <div
                                                                                      class="col-md-5 ml-auto order-2">
                                                                                      <h1
                                                                                          class="display-2 ml-auto font-weight-bolder mb-4">
                                                                                          No Stress,<br
                                                                                              class="d-none d-md-block" />
                                                                                          No USSD,<br
                                                                                              class="d-none d-md-block" />
                                                                                          Code Needed
                                                                                      </h1>
                                                                                  </div>
                                                                                  <div class="col-md-6 order-1">
                                                                                      <img class="img-fluid"
                                                                                          src="../assets/img/No-USSD-code-needed.svg"
                                                                                          alt="" />
                                                                                  </div>
                                                                              </div>

                                                                              <div
                                                                                  class="row row-grid align-items-center mb-5 mb-md-3">
                                                                                  <div
                                                                                      class="col-md-5 order-2 order-md-1 mr-auto">
                                                                                      <h1
                                                                                          class="display-2 font-weight-bolder mb-4">
                                                                                          Works Ofline<br />
                                                                                          No Internet Data Needed
                                                                                      </h1>
                                                                                  </div>
                                                                                  <div
                                                                                      class="col-md-6 d-flex align-items-center order-1 order-md-2">
                                                                                      <img class="img-fluid"
                                                                                          src="../assets/img/illustrations/feature-illustration.svg"
                                                                                          alt="" />
                                                                                  </div>
                                                                              </div>

                                                                              <div
                                                                                  class="row row-grid align-items-center mb-5 mb-md-3">
                                                                                  <div
                                                                                      class="col-md-5 ml-auto order-2">
                                                                                      <h1
                                                                                          class="display-2 font-weight-bolder mb-4">
                                                                                          No KYC <br />
                                                                                          Just install and use
                                                                                      </h1>
                                                                                  </div>
                                                                                  <div
                                                                                      class="col-md-6 d-flex align-items-center order-1">
                                                                                      <img class="img-fluid w-100"
                                                                                          src="../assets/img/kyc.svg"
                                                                                          alt="" />
                                                                                  </div>
                                                                              </div>

                                                                              <div
                                                                                  class="row row-grid align-items-center mb-5 mb-md-3">
                                                                                  <div
                                                                                      class="col-md-5 mr-auto order-2 order-md-1">
                                                                                      <h1
                                                                                          class="display-2 font-weight-bolder mb-4">
                                                                                          Easy Cashless <br />
                                                                                          and Secure Payments
                                                                                      </h1>
                                                                                  </div>

                                                                                  <div
                                                                                      class="col-md-6 d-flex align-items-center order-1 order-md-2">
                                                                                      <img class="img-fluid"
                                                                                          src="../assets/img/fast-and-secure.svg"
                                                                                          alt="" />
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </section>

                                                                      @include('components.download')

                                                                      <section
                                                                          class="section section-lg line-bottom-light">
                                                                          <div class="container">
                                                                              <div class="row mt-6">
                                                                                  <div
                                                                                      class="col-md-10 m-auto text-center mb-5">
                                                                                      <h1 class="display-2 mb-4">
                                                                                          What Agents can do
                                                                                          @@targetservice using Pay'am
                                                                                          in Cameroon
                                                                                      </h1>
                                                                                      <!-- <p class="lead">We add new tools and features regularly.</p> -->
                                                                                  </div>

                                                                                  <div class="col-md-12">
                                                                                      <div class="row">
                                                                                          <div class="col-12 col-md-6">
                                                                                              <!-- Icon Box -->
                                                                                              <div
                                                                                                  class="card shadow-soft border-light mb-4">
                                                                                                  <div
                                                                                                      class="card-body">
                                                                                                      <div
                                                                                                          class="d-flex flex-column flex-lg-row p-3">
                                                                                                          <div
                                                                                                              class="mb-3 mb-lg-0">
                                                                                                              <div
                                                                                                                  class="icon icon-primary">
                                                                                                                  <i
                                                                                                                      class="fas fa-hand-holding-usd"></i>
                                                                                                              </div>
                                                                                                          </div>
                                                                                                          <div
                                                                                                              class="pl-lg-4">
                                                                                                              <div
                                                                                                                  class="d-flex mb-1">
                                                                                                                  <a href="/front/pages/individual.html"
                                                                                                                      class="
                                badge badge-pill
                                bg-white
                                border border-primary
                                text-uppercase
                                mr-1
                              ">Individuals</a>
                                                                                                                  <a href="/front/pages/merchants.html"
                                                                                                                      class="
                                badge badge-pill
                                bg-white
                                border border-primary
                                text-uppercase
                                mr-1
                              ">Merchants</a>
                                                                                                                  <a href="/front/pages/agents.html"
                                                                                                                      class="
                                badge badge-pill
                                bg-white
                                border border-primary
                                text-uppercase
                                mr-1
                              ">Agents</a>
                                                                                                              </div>
                                                                                                              <h4
                                                                                                                  class="mb-3">
                                                                                                                  Send
                                                                                                                  and
                                                                                                                  Request
                                                                                                                  Money
                                                                                                              </h4>
                                                                                                              <p>
                                                                                                                  Send
                                                                                                                  and
                                                                                                                  Request
                                                                                                                  money
                                                                                                                  easily
                                                                                                                  to
                                                                                                                  friends
                                                                                                                  and
                                                                                                                  loved
                                                                                                                  ones
                                                                                                              </p>
                                                                                                              <a href="/front/pages/send-money-request.html"
                                                                                                                  class="text-underline">
                                                                                                                  Learn
                                                                                                                  More
                                                                                                                  <span
                                                                                                                      class="icon icon-xs ml-2">
                                                                                                                      <i
                                                                                                                          class="fas fa-external-link-alt"></i>
                                                                                                                  </span>
                                                                                                              </a>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                              <!-- End of Icon Box -->
                                                                                          </div>
                                                                                          <div class="col-12 col-md-6">
                                                                                              <!-- Icon Box -->
                                                                                              <div
                                                                                                  class="card shadow-soft border-light mb-4">
                                                                                                  <div
                                                                                                      class="card-body">
                                                                                                      <div
                                                                                                          class="d-flex flex-column flex-lg-row p-3">
                                                                                                          <div
                                                                                                              class="mb-3 mb-lg-0">
                                                                                                              <div
                                                                                                                  class="icon icon-primary">
                                                                                                                  <i
                                                                                                                      class="fas fa-comment-dollar"></i>
                                                                                                              </div>
                                                                                                          </div>
                                                                                                          <div
                                                                                                              class="pl-lg-4">
                                                                                                              <h4
                                                                                                                  class="mb-3">
                                                                                                                  Pay
                                                                                                                  for
                                                                                                                  Goods
                                                                                                                  and
                                                                                                                  Services
                                                                                                              </h4>
                                                                                                              <p>
                                                                                                                  Fast
                                                                                                                  and
                                                                                                                  easy
                                                                                                                  way to
                                                                                                                  pay,
                                                                                                                  for
                                                                                                                  goods
                                                                                                                  and
                                                                                                                  services.
                                                                                                              </p>
                                                                                                              <a href="/front/pages/pay-goods-services.html"
                                                                                                                  class="text-underline">
                                                                                                                  Learn
                                                                                                                  More
                                                                                                                  <span
                                                                                                                      class="icon icon-xs ml-2">
                                                                                                                      <i
                                                                                                                          class="fas fa-external-link-alt"></i>
                                                                                                                  </span>
                                                                                                              </a>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                              <!-- End of Icon Box -->
                                                                                          </div>
                                                                                          <div class="col-12 col-md-6">
                                                                                              <!-- Icon Box -->
                                                                                              <div
                                                                                                  class="card shadow-soft border-light mb-4">
                                                                                                  <div
                                                                                                      class="card-body">
                                                                                                      <div
                                                                                                          class="d-flex flex-column flex-lg-row p-3">
                                                                                                          <div
                                                                                                              class="mb-3 mb-lg-0">
                                                                                                              <div
                                                                                                                  class="icon icon-primary">
                                                                                                                  <i
                                                                                                                      class="fas fa-qrcode"></i>
                                                                                                              </div>
                                                                                                          </div>
                                                                                                          <div
                                                                                                              class="pl-lg-4">
                                                                                                              <h4
                                                                                                                  class="mb-3">
                                                                                                                  Deposite
                                                                                                                  and
                                                                                                                  Withdraw
                                                                                                                  money
                                                                                                              </h4>
                                                                                                              <p>
                                                                                                                  Easily
                                                                                                                  deposite
                                                                                                                  and
                                                                                                                  withdraw
                                                                                                                  money
                                                                                                                  from
                                                                                                                  your
                                                                                                                  contacts
                                                                                                              </p>
                                                                                                              <a href="/front/pages/deposite-withdraw-businesses.html"
                                                                                                                  class="text-underline">
                                                                                                                  Learn
                                                                                                                  More
                                                                                                                  <span
                                                                                                                      class="icon icon-xs ml-2">
                                                                                                                      <i
                                                                                                                          class="fas fa-external-link-alt"></i>
                                                                                                                  </span>
                                                                                                              </a>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                              <!-- End of Icon Box -->
                                                                                          </div>
                                                                                          <div class="col-12 col-md-6">
                                                                                              <!-- Icon Box -->
                                                                                              <div
                                                                                                  class="card shadow-soft border-light mb-4">
                                                                                                  <div
                                                                                                      class="card-body">
                                                                                                      <div
                                                                                                          class="d-flex flex-column flex-lg-row p-3">
                                                                                                          <div
                                                                                                              class="mb-3 mb-lg-0">
                                                                                                              <div
                                                                                                                  class="icon icon-primary">
                                                                                                                  <i
                                                                                                                      class="fas fa-coins"></i>
                                                                                                              </div>
                                                                                                          </div>
                                                                                                          <div
                                                                                                              class="pl-lg-4">
                                                                                                              <h4
                                                                                                                  class="mb-3">
                                                                                                                  Make
                                                                                                                  Payments
                                                                                                              </h4>
                                                                                                              <p>Use
                                                                                                                  Pay'am
                                                                                                                  to pay
                                                                                                                  vendors
                                                                                                              </p>
                                                                                                              <a href="/front/pages/make-payments.html"
                                                                                                                  class="text-underline">
                                                                                                                  Learn
                                                                                                                  More
                                                                                                                  <span
                                                                                                                      class="icon icon-xs ml-2">
                                                                                                                      <i
                                                                                                                          class="fas fa-external-link-alt"></i>
                                                                                                                  </span>
                                                                                                              </a>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                              <!-- End of Icon Box -->
                                                                                          </div>
                                                                                          <div class="col-12 col-md-6">
                                                                                              <!-- Icon Box -->
                                                                                              <div
                                                                                                  class="card shadow-soft border-light mb-4">
                                                                                                  <div
                                                                                                      class="card-body">
                                                                                                      <div
                                                                                                          class="d-flex flex-column flex-lg-row p-3">
                                                                                                          <div
                                                                                                              class="mb-3 mb-lg-0">
                                                                                                              <div
                                                                                                                  class="icon icon-primary">
                                                                                                                  <i
                                                                                                                      class="fas fa-sign-in-alt"></i>
                                                                                                              </div>
                                                                                                          </div>
                                                                                                          <div
                                                                                                              class="pl-lg-4">
                                                                                                              <h4
                                                                                                                  class="mb-3">
                                                                                                                  Receive
                                                                                                                  Payments
                                                                                                              </h4>
                                                                                                              <p>
                                                                                                                  Receive
                                                                                                                  Payments
                                                                                                                  for
                                                                                                                  your
                                                                                                                  goods
                                                                                                                  and
                                                                                                                  services
                                                                                                                  through
                                                                                                                  Pay'am
                                                                                                              </p>
                                                                                                              <a href="/front/pages/recieve-payments.html"
                                                                                                                  class="text-underline">
                                                                                                                  Learn
                                                                                                                  More
                                                                                                                  <span
                                                                                                                      class="icon icon-xs ml-2">
                                                                                                                      <i
                                                                                                                          class="fas fa-external-link-alt"></i>
                                                                                                                  </span>
                                                                                                              </a>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                              <!-- End of Icon Box -->
                                                                                          </div>
                                                                                          <div class="col-12 col-md-6">
                                                                                              <!-- Icon Box -->
                                                                                              <div
                                                                                                  class="card shadow-soft border-light mb-4">
                                                                                                  <div
                                                                                                      class="card-body">
                                                                                                      <div
                                                                                                          class="d-flex flex-column flex-lg-row p-3">
                                                                                                          <div
                                                                                                              class="mb-3 mb-lg-0">
                                                                                                              <div
                                                                                                                  class="icon icon-primary">
                                                                                                                  <i
                                                                                                                      class="fas fa-sign-in-alt"></i>
                                                                                                              </div>
                                                                                                          </div>
                                                                                                          <div
                                                                                                              class="pl-lg-4">
                                                                                                              <h4
                                                                                                                  class="mb-3">
                                                                                                                  Buy
                                                                                                                  and
                                                                                                                  Sell
                                                                                                                  Telephone
                                                                                                                  Credit
                                                                                                              </h4>
                                                                                                              <p>
                                                                                                                  Receive
                                                                                                                  Payments
                                                                                                                  for
                                                                                                                  your
                                                                                                                  goods
                                                                                                                  and
                                                                                                                  services
                                                                                                                  through
                                                                                                                  Pay'am
                                                                                                              </p>
                                                                                                              <a href="/front/pages/telephone.html"
                                                                                                                  class="text-underline">
                                                                                                                  Learn
                                                                                                                  More
                                                                                                                  <span
                                                                                                                      class="icon icon-xs ml-2">
                                                                                                                      <i
                                                                                                                          class="fas fa-external-link-alt"></i>
                                                                                                                  </span>
                                                                                                              </a>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                              <!-- End of Icon Box -->
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </section>

                                                                      <section class="section section-lg bg-soft">
                                                                          <div class="container">
                                                                              <div class="row">
                                                                                  <div class="col-md-12">
                                                                                      <div
                                                                                          class="row align-items-center">
                                                                                          <div
                                                                                              class="col-md-5 mr-auto mb-4">
                                                                                              <h2
                                                                                                  class="h1 display-2 font-weight-bolder mb-2">
                                                                                                  Supported Networks in
                                                                                                  {{ $defaultCountry }}
                                                                                              </h2>
                                                                                              <p
                                                                                                  class="lead">
                                                                                                  Pay'am works with the
                                                                                                  following Networks in
                                                                                                  {{ $defaultCountry }}.
                                                                                              </p>
                                                                                          </div>

                                                                                          <div class="col-md-6 m-auto">
                                                                                              <div
                                                                                                  class="row">
                                                                                                  <div
                                                                                                      class="col-md-4 mb-3">
                                                                                                      <div
                                                                                                          class="info p-0">
                                                                                                          <span
                                                                                                              class="infos">
                                                                                                              <img src="/front/assets/img/mtn.png"
                                                                                                                  alt="web hosting, domain names"
                                                                                                                  class="grayhover img-fluid mb-3" />
                                                                                                          </span>
                                                                                                      </div>
                                                                                                  </div>

                                                                                                  <div
                                                                                                      class="col-md-4 mb-3">
                                                                                                      <div
                                                                                                          class="info p-0">
                                                                                                          <span
                                                                                                              class="infos">
                                                                                                              <img src="/front/assets/img/partner-orange.png"
                                                                                                                  alt="web hosting, domain names"
                                                                                                                  class="grayhover img-fluid mb-3" />
                                                                                                          </span>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </section>

                                                                      <section class="section section-lg">
                                                                          <div class="container">
                                                                              <div class="row">
                                                                                  <div class="col-md-12">
                                                                                      <div
                                                                                          class="row align-items-center">
                                                                                          <div class="col-md-6">
                                                                                              <div
                                                                                                  class="row">
                                                                                                  <div
                                                                                                      class="col-md-4 mb-3">
                                                                                                      <div
                                                                                                          class="info p-0">
                                                                                                          <span
                                                                                                              class="infos">
                                                                                                              <a
                                                                                                                  href="/front/pages/providers.html">
                                                                                                                  <img src="/front/assets/img/OrangeMoney.jpg"
                                                                                                                      alt="web hosting, domain names"
                                                                                                                      class="grayhover img-fluid mb-3" />
                                                                                                              </a>
                                                                                                          </span>
                                                                                                      </div>
                                                                                                  </div>
                                                                                                  <div
                                                                                                      class="col-md-4 mb-3">
                                                                                                      <div
                                                                                                          class="info p-0">
                                                                                                          <span
                                                                                                              class="infos">
                                                                                                              <a
                                                                                                                  href="/front/pages/providers.html">
                                                                                                                  <img src="/front/assets/img/mobile-money.jpg"
                                                                                                                      alt="web hosting, domain names"
                                                                                                                      class="grayhover img-fluid mb-3" />
                                                                                                              </a>
                                                                                                          </span>
                                                                                                      </div>
                                                                                                  </div>

                                                                                                  <div
                                                                                                      class="col-md-4 mb-3">
                                                                                                      <div
                                                                                                          class="info p-0">
                                                                                                          <span
                                                                                                              class="infos">
                                                                                                              <a
                                                                                                                  href="/front/pages/providers.html">
                                                                                                                  <img src="/front/assets/img/eu-money.png"
                                                                                                                      alt="web hosting, domain names"
                                                                                                                      class="grayhover img-fluid mb-3" />
                                                                                                              </a>
                                                                                                          </span>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>

                                                                                          <div
                                                                                              class="col-md-5 ml-auto">
                                                                                              <h2
                                                                                                  class="h1 display-2 font-weight-bolder mb-2">
                                                                                                  Supported Payment
                                                                                                  Providers in
                                                                                                  {{ $defaultCountry }}
                                                                                              </h2>
                                                                                              <p
                                                                                                  class="lead">
                                                                                                  Pay'am works with the
                                                                                                  following Payment
                                                                                                  Providers in
                                                                                                  {{ $defaultCountry }}.
                                                                                              </p>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </section>

                                                                      @include('components.download')

                                                                      <section class="section section-lg">
                                                                          <div class="container">
                                                                              <div class="row mb-7">
                                                                                  <div class="col-lg-12 mb-5">
                                                                                      <h1
                                                                                          class="display-2 font-weight-bolder mb-4">
                                                                                          From the Pay'am Blog
                                                                                      </h1>
                                                                                  </div>
                                                                                  <div class="col-12 col-md-4 mb-4">
                                                                                      <div
                                                                                          class="card bg-white border-light shadow-soft p-4 rounded">
                                                                                          <a href="./blog-post.html"><img
                                                                                                  src="../assets/img/illustrations/feature-illustration.svg"
                                                                                                  class="card-img-top"
                                                                                                  alt="" /></a>
                                                                                          <div
                                                                                              class="card-body p-0 pt-4">
                                                                                              <a href="./blog-post.html"
                                                                                                  class="h3">Pay'am
                                                                                                  launches Cloud AI
                                                                                                  Platform
                                                                                                  Pipelines</a>

                                                                                              <p
                                                                                                  class="mb-0 mt-2">
                                                                                                  Richard Thomas was
                                                                                                  born in 1990, and at
                                                                                                  only 29 years old,
                                                                                                  his trajectory is
                                                                                                  good. When he is asked
                                                                                                  how he describes
                                                                                                  himself, he responds,
                                                                                                  "designer but in a
                                                                                                  broad sense". His
                                                                                                  projects?
                                                                                              </p>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="col-12 col-md-4 mb-4">
                                                                                      <div
                                                                                          class="card bg-white border-light shadow-soft p-4 rounded">
                                                                                          <a href="./blog-post.html"><img
                                                                                                  src="../assets/img/illustrations/feature-illustration.svg"
                                                                                                  class="card-img-top"
                                                                                                  alt="" /></a>
                                                                                          <div
                                                                                              class="card-body p-0 pt-4">
                                                                                              <a href="./blog-post.html"
                                                                                                  class="h3">Pay'am
                                                                                                  Details Reveal
                                                                                                  Remarkable
                                                                                                  Insights</a>
                                                                                              <p
                                                                                                  class="mb-0 mt-2">
                                                                                                  Richard Thomas was
                                                                                                  born in 1990, and at
                                                                                                  only 29 years old,
                                                                                                  his trajectory is
                                                                                                  good. When he is asked
                                                                                                  how he describes
                                                                                                  himself, he responds,
                                                                                                  "designer but in a
                                                                                                  broad sense". His
                                                                                                  projects?
                                                                                              </p>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="col-12 col-md-4 mb-4">
                                                                                      <div
                                                                                          class="card bg-white border-light shadow-soft p-4 rounded">
                                                                                          <a href="./blog-post.html"><img
                                                                                                  src="../assets/img/illustrations/feature-illustration.svg"
                                                                                                  class="card-img-top"
                                                                                                  alt="" /></a>
                                                                                          <div
                                                                                              class="card-body p-0 pt-4">
                                                                                              <a href="./blog-post.html"
                                                                                                  class="h3">One
                                                                                                  of Pay'am best new
                                                                                                  features</a>
                                                                                              <p
                                                                                                  class="mb-0 mt-2">
                                                                                                  Richard Thomas was
                                                                                                  born in 1990, and at
                                                                                                  only 29 years old,
                                                                                                  his trajectory is
                                                                                                  good. When he is asked
                                                                                                  how he describes
                                                                                                  himself, he responds,
                                                                                                  "designer but in a
                                                                                                  broad sense". His
                                                                                                  projects?
                                                                                              </p>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                              <div
                                                                                  class="row justify-content-center mb-4">
                                                                                  <div class="col-md-12">
                                                                                      <h1
                                                                                          class="display-2 font-weight-bolder mb-5">
                                                                                          What People are saying about
                                                                                          us
                                                                                      </h1>
                                                                                      <!-- <p class="lead">Our products are loved by users worldwide</p> -->
                                                                                  </div>
                                                                              </div>
                                                                              <div class="row mb-lg-5">
                                                                                  <div class="col-lg-6">
                                                                                      <div
                                                                                          class="customer-testimonial d-flex mb-5">
                                                                                          <img src="../assets/img/team/profile-picture-1.jpg"
                                                                                              class="image image-sm mr-3 rounded-circle shadow"
                                                                                              alt="" />
                                                                                          <div
                                                                                              class="
                    content
                    bg-soft
                    shadow-soft
                    border border-light
                    rounded
                    position-relative
                    p-4
                  ">
                                                                                              <div
                                                                                                  class="d-flex mb-4">
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                              </div>
                                                                                              <p
                                                                                                  class="mt-2">
                                                                                                  "We use Impact mainly
                                                                                                  for its site explorer,
                                                                                                  and it’s
                                                                                                  immensely improved how
                                                                                                  we find link targets.
                                                                                                  We use it both
                                                                                                  for getting quick
                                                                                                  analysis of a site, as
                                                                                                  well as utilizing
                                                                                                  its extensive index
                                                                                                  when we want to dive
                                                                                                  deep."
                                                                                              </p>
                                                                                              <span
                                                                                                  class="h6">-
                                                                                                  James Curran
                                                                                                  <small
                                                                                                      class="ml-0 ml-md-2">General
                                                                                                      Manager
                                                                                                      Spotify</small></span>
                                                                                          </div>
                                                                                      </div>
                                                                                      <div
                                                                                          class="customer-testimonial d-flex mb-5">
                                                                                          <img src="../assets/img/team/profile-picture-2.jpg"
                                                                                              class="image image-sm mr-3 rounded-circle shadow"
                                                                                              alt="" />
                                                                                          <div
                                                                                              class="
                    content
                    bg-soft
                    shadow-soft
                    border border-light
                    rounded
                    position-relative
                    p-4
                  ">
                                                                                              <div
                                                                                                  class="d-flex mb-4">
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                              </div>
                                                                                              <p
                                                                                                  class="mt-2">
                                                                                                  "We use Impact mainly
                                                                                                  for its site explorer,
                                                                                                  and it’s
                                                                                                  immensely improved how
                                                                                                  we find link targets.
                                                                                                  We use it both
                                                                                                  for getting quick
                                                                                                  analysis of a site, as
                                                                                                  well as utilizing
                                                                                                  its extensive index
                                                                                                  when we want to dive
                                                                                                  deep."
                                                                                              </p>
                                                                                              <span
                                                                                                  class="h6">-
                                                                                                  Richard Thomas
                                                                                                  <small
                                                                                                      class="ml-0 ml-md-2">Front-end
                                                                                                      developer
                                                                                                      Oracle</small></span>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="col-lg-6 pt-lg-6">
                                                                                      <div
                                                                                          class="customer-testimonial d-flex mb-5">
                                                                                          <img src="../assets/img/team/profile-picture-4.jpg"
                                                                                              class="image image-sm mr-3 rounded-circle shadow"
                                                                                              alt="" />
                                                                                          <div
                                                                                              class="
                    content
                    bg-soft
                    shadow-soft
                    border border-light
                    rounded
                    position-relative
                    p-4
                  ">
                                                                                              <div
                                                                                                  class="d-flex mb-4">
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                              </div>
                                                                                              <p
                                                                                                  class="mt-2">
                                                                                                  "We use Impact mainly
                                                                                                  for its site explorer,
                                                                                                  and it’s
                                                                                                  immensely improved how
                                                                                                  we find link targets.
                                                                                                  We use it both
                                                                                                  for getting quick
                                                                                                  analysis of a site, as
                                                                                                  well as utilizing
                                                                                                  its extensive index
                                                                                                  when we want to dive
                                                                                                  deep."
                                                                                              </p>
                                                                                              <span
                                                                                                  class="h6">-
                                                                                                  Jose Evans
                                                                                                  <small
                                                                                                      class="ml-0 ml-md-2">Chief
                                                                                                      Engineer
                                                                                                      Apple</small></span>
                                                                                          </div>
                                                                                      </div>
                                                                                      <div
                                                                                          class="customer-testimonial d-flex mb-5">
                                                                                          <img src="../assets/img/team/profile-picture-6.jpg"
                                                                                              class="image image-sm mr-3 rounded-circle shadow"
                                                                                              alt="" />
                                                                                          <div
                                                                                              class="
                    content
                    bg-soft
                    shadow-soft
                    border border-light
                    rounded
                    position-relative
                    p-4
                  ">
                                                                                              <div
                                                                                                  class="d-flex mb-4">
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                                  <span
                                                                                                      class="text-warning mr-2"><i
                                                                                                          class="star fas fa-star"></i></span>
                                                                                              </div>
                                                                                              <p
                                                                                                  class="mt-2">
                                                                                                  "We use Impact mainly
                                                                                                  for its site explorer,
                                                                                                  and it’s
                                                                                                  immensely improved how
                                                                                                  we find link targets.
                                                                                                  We use it both
                                                                                                  for getting quick
                                                                                                  analysis of a site, as
                                                                                                  well as utilizing
                                                                                                  its extensive index
                                                                                                  when we want to dive
                                                                                                  deep."
                                                                                              </p>
                                                                                              <span
                                                                                                  class="h6">-
                                                                                                  Richard Thomas
                                                                                                  <small
                                                                                                      class="ml-0 ml-md-2">Manager
                                                                                                      IBM</small></span>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="row">
                                                                                  <div class="col text-center">
                                                                                      <a href="#"
                                                                                          class="btn btn-primary animate-up-2"><span
                                                                                              class="mr-2"><i
                                                                                                  class="fas fa-book-open"></i></span>
                                                                                          See
                                                                                          all stories</a>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </section>

                                                                      @include('components.download')

                                                                  </div>

                                                                  <p class="lead">
                                                                      Pay'am works with the following Payment Providers
                                                                      in {{ $defaultCountry }}.
                                                                  </p>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </section>

                                          @include('components.download')

                                          <section class="section section-lg">
                                              <div class="container">
                                                  <div class="row mb-7">
                                                      <div class="col-lg-12 mb-5">
                                                          <h1 class="display-2 font-weight-bolder mb-4">
                                                              From the Pay'am Blog
                                                          </h1>
                                                      </div>
                                                      <div class="col-12 col-md-4 mb-4">
                                                          <div
                                                              class="card bg-white border-light shadow-soft p-4 rounded">
                                                              <a href="./blog-post.html"><img
                                                                      src="../assets/img/illustrations/feature-illustration.svg"
                                                                      class="card-img-top" alt="" /></a>
                                                              <div class="card-body p-0 pt-4">
                                                                  <a href="./blog-post.html"
                                                                      class="h3">Pay'am launches Cloud AI
                                                                      Platform
                                                                      Pipelines</a>

                                                                  <p class="mb-0 mt-2">
                                                                      Richard Thomas was born in 1990, and at only 29
                                                                      years old,
                                                                      his trajectory is good. When he is asked how he
                                                                      describes
                                                                      himself, he responds, "designer but in a broad
                                                                      sense". His
                                                                      projects?
                                                                  </p>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-12 col-md-4 mb-4">
                                                          <div
                                                              class="card bg-white border-light shadow-soft p-4 rounded">
                                                              <a href="./blog-post.html"><img
                                                                      src="../assets/img/illustrations/feature-illustration.svg"
                                                                      class="card-img-top" alt="" /></a>
                                                              <div class="card-body p-0 pt-4">
                                                                  <a href="./blog-post.html"
                                                                      class="h3">Pay'am Details Reveal
                                                                      Remarkable
                                                                      Insights</a>
                                                                  <p class="mb-0 mt-2">
                                                                      Richard Thomas was born in 1990, and at only 29
                                                                      years old,
                                                                      his trajectory is good. When he is asked how he
                                                                      describes
                                                                      himself, he responds, "designer but in a broad
                                                                      sense". His
                                                                      projects?
                                                                  </p>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-12 col-md-4 mb-4">
                                                          <div
                                                              class="card bg-white border-light shadow-soft p-4 rounded">
                                                              <a href="./blog-post.html"><img
                                                                      src="../assets/img/illustrations/feature-illustration.svg"
                                                                      class="card-img-top" alt="" /></a>
                                                              <div class="card-body p-0 pt-4">
                                                                  <a href="./blog-post.html" class="h3">One
                                                                      of Pay'am best new features</a>
                                                                  <p class="mb-0 mt-2">
                                                                      Richard Thomas was born in 1990, and at only 29
                                                                      years old,
                                                                      his trajectory is good. When he is asked how he
                                                                      describes
                                                                      himself, he responds, "designer but in a broad
                                                                      sense". His
                                                                      projects?
                                                                  </p>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="row justify-content-center mb-4">
                                                      <div class="col-md-12">
                                                          <h1 class="display-2 font-weight-bolder mb-5">
                                                              What People are saying about us
                                                          </h1>
                                                          <!-- <p class="lead">Our products are loved by users worldwide</p> -->
                                                      </div>
                                                  </div>
                                                  <div class="row mb-lg-5">
                                                      <div class="col-lg-6">
                                                          <div class="customer-testimonial d-flex mb-5">
                                                              <img src="../assets/img/team/profile-picture-1.jpg"
                                                                  class="image image-sm mr-3 rounded-circle shadow"
                                                                  alt="" />
                                                              <div
                                                                  class="
                    content
                    bg-soft
                    shadow-soft
                    border border-light
                    rounded
                    position-relative
                    p-4
                  ">
                                                                  <div class="d-flex mb-4">
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                  </div>
                                                                  <p class="mt-2">
                                                                      "We use Impact mainly for its site explorer, and
                                                                      it’s
                                                                      immensely improved how we find link targets. We
                                                                      use it both
                                                                      for getting quick analysis of a site, as well as
                                                                      utilizing
                                                                      its extensive index when we want to dive deep."
                                                                  </p>
                                                                  <span class="h6">- James Curran
                                                                      <small class="ml-0 ml-md-2">General Manager
                                                                          Spotify</small></span>
                                                              </div>
                                                          </div>
                                                          <div class="customer-testimonial d-flex mb-5">
                                                              <img src="../assets/img/team/profile-picture-2.jpg"
                                                                  class="image image-sm mr-3 rounded-circle shadow"
                                                                  alt="" />
                                                              <div
                                                                  class="
                    content
                    bg-soft
                    shadow-soft
                    border border-light
                    rounded
                    position-relative
                    p-4
                  ">
                                                                  <div class="d-flex mb-4">
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                  </div>
                                                                  <p class="mt-2">
                                                                      "We use Impact mainly for its site explorer, and
                                                                      it’s
                                                                      immensely improved how we find link targets. We
                                                                      use it both
                                                                      for getting quick analysis of a site, as well as
                                                                      utilizing
                                                                      its extensive index when we want to dive deep."
                                                                  </p>
                                                                  <span class="h6">- Richard Thomas
                                                                      <small class="ml-0 ml-md-2">Front-end developer
                                                                          Oracle</small></span>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-lg-6 pt-lg-6">
                                                          <div class="customer-testimonial d-flex mb-5">
                                                              <img src="../assets/img/team/profile-picture-4.jpg"
                                                                  class="image image-sm mr-3 rounded-circle shadow"
                                                                  alt="" />
                                                              <div
                                                                  class="
                    content
                    bg-soft
                    shadow-soft
                    border border-light
                    rounded
                    position-relative
                    p-4
                  ">
                                                                  <div class="d-flex mb-4">
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                  </div>
                                                                  <p class="mt-2">
                                                                      "We use Impact mainly for its site explorer, and
                                                                      it’s
                                                                      immensely improved how we find link targets. We
                                                                      use it both
                                                                      for getting quick analysis of a site, as well as
                                                                      utilizing
                                                                      its extensive index when we want to dive deep."
                                                                  </p>
                                                                  <span class="h6">- Jose Evans
                                                                      <small class="ml-0 ml-md-2">Chief Engineer
                                                                          Apple</small></span>
                                                              </div>
                                                          </div>
                                                          <div class="customer-testimonial d-flex mb-5">
                                                              <img src="../assets/img/team/profile-picture-6.jpg"
                                                                  class="image image-sm mr-3 rounded-circle shadow"
                                                                  alt="" />
                                                              <div
                                                                  class="
                    content
                    bg-soft
                    shadow-soft
                    border border-light
                    rounded
                    position-relative
                    p-4
                  ">
                                                                  <div class="d-flex mb-4">
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                      <span class="text-warning mr-2"><i
                                                                              class="star fas fa-star"></i></span>
                                                                  </div>
                                                                  <p class="mt-2">
                                                                      "We use Impact mainly for its site explorer, and
                                                                      it’s
                                                                      immensely improved how we find link targets. We
                                                                      use it both
                                                                      for getting quick analysis of a site, as well as
                                                                      utilizing
                                                                      its extensive index when we want to dive deep."
                                                                  </p>
                                                                  <span class="h6">- Richard Thomas
                                                                      <small class="ml-0 ml-md-2">Manager
                                                                          IBM</small></span>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col text-center">
                                                          <a href="#" class="btn btn-primary animate-up-2"><span
                                                                  class="mr-2"><i
                                                                      class="fas fa-book-open"></i></span> See
                                                              all stories</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </section>

                                          @include('components.download')

                                      </div>
                                      ess and transparency to the design
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
