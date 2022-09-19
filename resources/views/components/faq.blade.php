      <section class="section section-lg bg-white line-bottom-light">
          <div class="container">
              <div class="row justify-content-center mb-4 mb-lg-6">
                  <div class="col-12 col-lg-8 text-center">
                      <h1 class="display-3 mb-4">{{ __('FAQs_title') }}</h1>
                      <!-- <p class="lead text-gray">Here’s what you need to know about your Impact license, based on the questions we get asked the most.</p> -->
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="col-12 col-lg-8">
                      <?php
                      $faqs = \App\Models\Faq::latest()->get();
                      ?>
                      <!--Accordion-->
                      <div class="accordion">
                          @forelse ($faqs as $faq)
                              <div class="card card-sm card-body border border-light rounded mb-3">
                                  <div data-target="#panel-1" class="accordion-panel-header" data-toggle="collapse"
                                      role="button" aria-expanded="false" aria-controls="panel-1">
                                      <span class="h6 mb-0">{{ json_decode($faq->question)->$locale }}</span>
                                      <span class="icon"><i class="fas fa-angle-down"></i></span>
                                  </div>
                                  <div class="collapse" id="panel-1">
                                      <div class="pt-3">
                                          <p class="mb-0">
                                              {{ json_decode($faq->answer)->$locale }}
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          @empty
                              <h4>{{ __('no_faqs_message') }}</h4>
                          @endforelse
                      </div>
                      <!--End of Accordion-->
                  </div>
              </div>
          </div>
      </section>
