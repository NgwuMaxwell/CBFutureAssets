
@extends('layouts.base')

@section('title', 'Home')

@inject('content', 'App\Http\Controllers\FrontController')
@section('content')

<main>
    <!-- section content begin -->
    <section class="py-5 in-cirro-7">
      <div class="container my-2">
        <div class="row mt-5">
          <div class="col-md-12 col-lg-5">
            <h1 class="mb-3">
              Disrupting the Financial System, One Bit at a Time.
            </h1>
            <p>
              {{$settings->site_name}} Management, a trusted leader in digital asset
              Management. If you're seeking reliable and profitable
              investments, you're in the right place. We specialize in
              high-quality asset management based on forex and lucrative
              Bitcoin trading.
            </p>
            <div
              class="row row-cols-1 row-cols-md-3 gy-2 g-md-2 gx-lg-2 mt-1"
            >
              <div class="col">
                <div class="card">
                  <div class="card-body text-center">
                    <p class="fs-4 text-primary mb-0">1700+</p>
                    <p class="text-muted">Markets</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body text-center">
                    <p class="fs-4 text-primary mb-0">90</p>
                    <p class="text-muted">Countries</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body text-center">
                    <p class="fs-4 text-primary mb-0">1M+</p>
                    <p class="text-muted">Users</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-7 position-relative">
            <img
              class="w-100 mt-3 mt-lg-0"
              src="temp/frontpage/img/in-cirro-7-map.svg"
              alt="map"
            />
            <span
              class="position-absolute dot-pulse one"
              style="left: 20%; top: 42%"
            ></span>
            <span
              class="position-absolute dot-pulse two"
              style="left: 22%; top: 32%"
            ></span>
            <span
              class="position-absolute dot-pulse one"
              style="left: 30%; top: 30%"
            ></span>
            <span
              class="position-absolute dot-pulse one"
              style="left: 44%; top: 27%"
            ></span>
            <span
              class="position-absolute dot-pulse one"
              style="left: 50%; top: 30%"
            ></span>
            <span
              class="position-absolute dot-pulse two"
              style="left: 66%; top: 47%"
            ></span>
            <span
              class="position-absolute dot-pulse two"
              style="left: 55%; top: 38%"
            ></span>
            <span
              class="position-absolute dot-pulse two"
              style="left: 72%; top: 53%"
            ></span>
            <span
              class="position-absolute dot-pulse one"
              style="left: 82%; top: 35%"
            ></span>
            <span
              class="position-absolute dot-pulse two"
              style="left: 76%; top: 43%"
            ></span>
            <span
              class="position-absolute dot-pulse one"
              style="left: 85%; top: 72%"
            ></span>
            <p class="small text-muted text-center mt-2">
              We currently manages assets for 1М+ users across 200
              jurisdictions.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-9 text-center">
            <h1 class="fw-bold">
              Putting our clients first
              <span class="text-highlight">since 2015</span>
            </h1>
            <p class="lead text-muted">
              For more than 9 years, we’ve been empowering clients by helping
              them take control of their financial lives.
            </p>
          </div>
          <div class="col-12 mt-3">
            <div
              class="row row-cols-1 row-cols-md-1 row-cols-lg-3 gy-2 gy-md-2 gx-0 gx-md-2 gx-lg-4"
            >
              <div class="col d-flex align-items-start">
                <div class="icon-wrap bg-primary flex-shrink-0 me-2">
                  <i class="fas fa-leaf fa-lg text-white"></i>
                </div>
                <div>
                  <h3 class="h4 fw-bold">Our Mission</h3>
                  <p>
                    is committed to successfully solving inefficiencies in the
                    lending markets by creating innovative, convenient and
                    sustainable solutions. By harnessing the potential behind
                    blockchain technology, is pioneering a new digital
                    financial system.
                  </p>
                </div>
              </div>
              <div class="col d-flex align-items-start">
                <div class="icon-wrap bg-primary flex-shrink-0 me-2">
                  <i class="fas fa-hourglass-end fa-lg text-white"></i>
                </div>
                <div>
                  <h3 class="h4 fw-bold">Vision</h3>
                  <p>
                    We see a future for the financial world where all assets
                    are tokenized on-chain and people have efficient ways to
                    transfer or manage their funds. At , we always look ahead
                    which is why we’ve designed our products to be seamless,
                    secure and instant -- the financial services of tomorrow.
                  </p>
                </div>
              </div>
              <div class="col d-flex align-items-start">
                <div class="icon-wrap bg-primary flex-shrink-0 me-2">
                  <i class="fas fa-flag fa-lg text-white"></i>
                </div>
                <div>
                  <h3 class="h4 fw-bold">Values</h3>
                  <p>
                    Values are rooted in efficiency, transparency and
                    inclusivity. This is reflected in our fully-automated
                    products, transparent processes and our extensive efforts
                    to develop a truly global service that makes wealth
                    creation opportunities available to everyone.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="pt-2 pb-4">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div
              class="card bg-white"
              style="
                background-image: url(temp/frontpage/img/blockit/in-team-background-1.png);
                background-repeat: no-repeat;
              "
            >
              <div class="card-body py-4">
                <div class="row justify-content-center text-center mb-1">
                  <div class="col-md-10 col-lg-8">
                    <h2 class="fw-bold">Our Leaders</h2>
                    <p>
                      We are a group of passionate, independent thinkers who
                      never stop exploring new ways to improve trading for the
                      self-directed investor.
                    </p>
                  </div>
                </div>
                <div
                  class="row row-cols-md-1 row-cols-lg-3 text-center gy-2 gy-md-3 gx-0 gx-md-3 gx-lg-5 mb-3"
                >
                  <div class="col">
                    <img
                      class="mb-2"
                      src="temp/frontpage/img/blockit/in-team-1.png"
                      alt="image-team"
                      width="200"
                      height="200"
                    />
                    <h5 class="fw-bold mb-1">ALINE GRACE BOWEN</h5>
                    <span class="badge bg-secondary mb-2">CRD#: 1778175</span>
                                        </div>
                  <div class="col">
                    <img
                      class="mb-2"
                      src="temp/frontpage/img/blockit/in-team-4.png"
                      alt="image-team"
                      width="200"
                      height="200"
                    />
                    <h5 class="fw-bold mb-1">DARREN N BUI</h5>
                    <span class="badge bg-secondary mb-2">CRD#: 6309285</span>
                                        </div>
                  <div class="col">
                    <img
                      class="mb-2"
                      src="temp/frontpage/img/blockit/in-team-2.png"
                      alt="image-team"
                      width="200"
                      height="200"
                    />
                    <h5 class="fw-bold mb-1">LONY FLOYD PARKER</h5>
                    <span class="badge bg-secondary mb-2">CRD#: 5094723</span>
                                        </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- section content end -->
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 mt-1">
        <div
          class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gy-2 g-md-2 gx-lg-2 text-center"
        >
          <div class="col">
            <img
              src="temp/frontpage/img/in-cirro-2-icon-1.svg"
              alt="icon"
              width="64"
              height="64"
            />
            <h6 class="fw-bold mt-2">Wide Range of Trading Instruments</h6>
          </div>
          <div class="col">
            <img
              src="temp/frontpage/img/in-cirro-2-icon-2.svg"
              alt="icon"
              width="64"
              height="64"
            />
            <h6 class="fw-bold mt-2">Unparalleled Trading Conditions</h6>
          </div>
          <div class="col">
            <img
              src="temp/frontpage/img/in-cirro-2-icon-3.svg"
              alt="icon"
              width="64"
              height="64"
            />
            <h6 class="fw-bold mt-2">Globally Licensed & Regulated</h6>
          </div>
          <div class="col">
            <img
              src="temp/frontpage/img/in-cirro-2-icon-4.svg"
              alt="icon"
              width="64"
              height="64"
            />
            <h6 class="fw-bold mt-2">Committed to Forex Education</h6>
          </div>
        </div>
      </div>
    </div>
    <!-- section content begin -->
    <section class="py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-9">
            <div class="row row-cols-1 row-cols-lg-2 align-items-center gy-3">
              <div class="col text-md-center text-lg-start">
                <h4 class="fw-bold text-muted mb-1">Number speaks</h4>
                <h1 class="fw-bold">We always ready<br />for a challenge.</h1>
                <a href="markets" class="btn btn-primary mt-2"
                  >Learn more<i class="fas fa-angle-right fa-xs ms-1"></i
                ></a>
              </div>
              <div class="col">
                <div class="row align-items-start gx-0 mb-2 mb-md-4">
                  <div
                    class="col-12 col-md-3 text-md-end border-bottom border-primary"
                  >
                    <h1 class="fw-bold text-primary">
                      <span class="count" data-counter-end="410">0</span>
                    </h1>
                  </div>
                  <div class="col-12 col-md-9 mt-2 mt-md-0 ps-md-4">
                    <h5 class="fw-bold">Trading instruments</h5>
                    <p>
                      {{$settings->site_name}} provides a wide range of trading
                      instruments to cater to diverse investment strategies
                      and preferences.
                    </p>
                  </div>
                </div>
                <div class="row align-items-start gx-0">
                  <div
                    class="col-12 col-md-3 text-md-end border-bottom border-primary"
                  >
                    <h1 class="fw-bold text-primary">
                      <span class="count" data-counter-end="27">0</span>
                    </h1>
                  </div>
                  <div class="col-12 col-md-9 mt-2 mt-md-0 ps-md-4">
                    <h5 class="fw-bold">Jurisdictions Covered</h5>
                    <p>
                      A regulated and licensed {{$settings->site_name}} is a brand name of
                      different entities authorized and registered in various
                      jurisdictions.
                    </p>
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
