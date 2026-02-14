@extends('layouts.base')

@section('title', 'Terms')



@section('content')








<main>
    <!-- section content begin -->
    <section class="py-5">
      <div class="container">
        <div
          class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-0 gx-md-5 gx-lg-5"
        >
          <div class="col-12 col-md-12 col-lg-12 mb-md-2 mb-lg-4">
            <h1 class="fw-bold text-center">
              Company <span class="text-highlight">Legal Docs</span>
            </h1>
          </div>
          <div class="border-end-0 border-end-md border-end-lg">
            <div class="icon-wrap bg-info flex-shrink-0 mb-2 mb-md-3 mb-lg-3">
              <i class="fas fa-file fa-lg text-white"></i>
            </div>
            <h4 class="fw-bold">Terms of Service</h4>
            <p>
              Read the Terms of Service and customer Agreement for {{$settings->contact_email}} as well as our BlockitApp & Developer Agreements.
            </p>
            <ul class="list-unstyled lh-lg mb-0">
                              <li>
                <a
                  class="btn btn-link link-primary text-decoration-none p-0"
                  href="#"
                  ><i class="fas fa-file-pdf fa-sm me-1"></i>Term of Services
                  for {{$settings->contact_email}}</a
                >
              </li>
            </ul>
            <hr class="d-md-none d-lg-none my-3 my-md-3" />
          </div>
          <div class="border-end-md-0 border-end-lg">
            <div class="icon-wrap bg-info flex-shrink-0 mb-2 mb-md-3 mb-lg-3">
              <i class="fas fa-globe fa-lg text-white"></i>
            </div>
            <h4 class="fw-bold">Policies</h4>
            <p>
              Find out more about what information we collect at {{$settings->contact_email}},
              how we use it, and what control you have over your data.
            </p>
            <ul class="list-unstyled lh-lg mb-0">
              <li>
                <a
                  class="btn btn-link link-primary text-decoration-none p-0"
                  href="#"
                  ><i class="fas fa-file-pdf fa-sm me-1"></i>AML Policy</a
                >
              </li>
            </ul>
            <hr class="d-md-none d-lg-none my-3 my-md-3" />
          </div>
          <div class="d-md-none d-lg-block">
            <div class="icon-wrap bg-info flex-shrink-0 mb-2 mb-md-3 mb-lg-3">
              <i class="fas fa-shield-alt fa-lg text-white"></i>
            </div>
            <h4 class="fw-bold">Security</h4>
            <p>
              Learn more about how we keep your work and personal data safe
              when you’re using our services.
            </p>
            <ul class="list-unstyled lh-lg mb-0">
              <li>
                <a
                  class="btn btn-link link-primary text-decoration-none p-0"
                  href="security"
                  >Security</a
                >
              </li>
              <li>
                <a
                  class="btn btn-link link-primary text-decoration-none p-0"
                  href="#"
                  ><i class="fas fa-file-pdf fa-sm me-1"></i>Risk
                  Disclosure</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-8">
            <div class="card">
              <div class="card-body p-3 p-md-5">
                <h2 class="fw-bold">Top FAQs</h2>
                <p>
                  At {{$settings->contact_email}} Management, securing your investments and
                  personal information is our top priority. Here are some
                  frequently asked questions about our security measures.
                </p>
                <div class="accordion accordion-style-5 mt-4" id="sampleFive">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#a5One"
                        aria-expanded="true"
                      >
                        How does {{$settings->contact_email}} ensure the security of my
                        investments?
                      </button>
                    </h2>
                    <div
                      id="a5One"
                      class="accordion-collapse collapse show"
                      data-bs-parent="#sampleFive"
                    >
                      <div class="accordion-body">
                        <p>
                          {{$settings->contact_email}} employs advanced security measures,
                          such as encryption, secure payment methods, and
                          segregated client accounts, to safeguard your
                          investments and personal information.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#a5Two"
                        aria-expanded="false"
                      >
                        How can I deposit and withdraw funds from my {{$settings->contact_email}} account?
                      </button>
                    </h2>
                    <div
                      id="a5Two"
                      class="accordion-collapse collapse"
                      data-bs-parent="#sampleFive"
                    >
                      <div class="accordion-body">
                        <p>
                          You can deposit and withdraw funds using various
                          secure methods, such as bank and upported E-wallets.
                          Detailed instructions are available on our website.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#a5Three"
                        aria-expanded="false"
                      >
                        How does {{$settings->contact_email}} handle data breaches?
                      </button>
                    </h2>
                    <div
                      id="a5Three"
                      class="accordion-collapse collapse"
                      data-bs-parent="#sampleFive"
                    >
                      <div class="accordion-body">
                        <p>
                          In the unlikely event of a data breach, {{$settings->contact_email}}                            has an incident response plan to quickly address the
                          breach, mitigate its effects, and notify affected
                          users as required by law.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#a5Four"
                        aria-expanded="false"
                      >
                        Is my account insured?
                      </button>
                    </h2>
                    <div
                      id="a5Four"
                      class="accordion-collapse collapse"
                      data-bs-parent="#sampleFive"
                    >
                      <div class="accordion-body">
                        <p>
                          {{$settings->contact_email}} complies with relevant regulatory
                          requirements, which may include account insurance
                          provisions depending on the jurisdiction and type of
                          account.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#a5Four"
                        aria-expanded="false"
                      >
                        What measures are in place to prevent fraud?
                      </button>
                    </h2>
                    <div
                      id="a5Four"
                      class="accordion-collapse collapse"
                      data-bs-parent="#sampleFive"
                    >
                      <div class="accordion-body">
                        <p>
                          {{$settings->contact_email}} has comprehensive fraud prevention
                          protocols, including continuous monitoring of
                          transactions and verification processes to detect
                          and prevent fraudulent activities. For any
                          security-related concerns or inquiries, please
                          contact our security team at
                          {{$settings->contact_email}}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card bg-light border-0 mt-4 mb-1">
                  <div class="card-body px-2 py-1">
                    <small
                      >For general inquiries please contact
                      <a
                        class="link-primary text-decoration-none"
                        href="mailto:{{$settings->contact_email}}"
                        >{{$settings->contact_email}}</a
                      ></small
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- section content end -->
  </main>






@endsection
