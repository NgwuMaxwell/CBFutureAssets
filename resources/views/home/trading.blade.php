

@extends('layouts.base')

@section('title', 'Terms')



@section('content')

<main>
    <!-- section content begin -->
    <section class="py-5 card-style-10">
      <div class="container">
        <div class="row">
          <div class="col-12 mb-2">
            <h1 class="fw-bold mb-2">
              Unleash the <span class="text-highlight">Power</span> of Digital
              Assets.
            </h1>
            <p class="lead text-muted">
              1,000+ products. Global markets. One account.
            </p>
            <p>
              Some believe you must choose between an online broker and a
              wealth management firm. At {{$settings->site_name}}, you don’t need to
              compromise. Whether you invest on your own, with an advisor, or
              a little of both — we can support you.
            </p>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2 g-lg-3">
          <div class="col">
            <div class="card card-green">
              <div class="card-body p-3">
                <div class="icon-wrap flex-shrink-0">
                  <i class="fas fa-seedling fa-lg text-secondary"></i>
                </div>
                <h5 class="fw-bold mt-4">
                  <a
                    class="link-light text-decoration-none d-flex justify-content-between align-items-center"
                  >
                    Investing
                    <!-- <i class="fas fa-angle-right fa-xs"></i> -->
                  </a>
                </h5>
                <hr />
                <p class="small text-white text-opacity-75">
                  A wide selection of investment product to help build
                  diversified portfolio
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card card-blue">
              <div class="card-body p-3">
                <div class="icon-wrap flex-shrink-0">
                  <i class="fas fa-chart-bar fa-lg text-secondary"></i>
                </div>
                <h5 class="fw-bold mt-4">
                  <a
                    class="link-light text-decoration-none d-flex justify-content-between align-items-center"
                  >
                    Trading
                    <!-- <i class="fas fa-angle-right fa-xs"></i> -->
                  </a>
                </h5>
                <hr />
                <p class="small text-white text-opacity-75">
                  Powerful trading tools, resources, insight and support
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card card-purple">
              <div class="card-body p-3">
                <div class="icon-wrap flex-shrink-0">
                  <i class="fas fa-chart-pie fa-lg text-secondary"></i>
                </div>
                <h5 class="fw-bold mt-4">
                  <a
                    class="link-light text-decoration-none d-flex justify-content-between align-items-center"
                  >
                    Wealth management
                    <!-- <i class="fas fa-angle-right fa-xs"></i> -->
                  </a>
                </h5>
                <hr />
                <p class="small text-white text-opacity-50">
                  Dedicated financial consultant to help reach your own
                  specific goals
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card card-navy">
              <div class="card-body p-3">
                <div class="icon-wrap flex-shrink-0">
                  <i
                    class="fas fa-chalkboard-teacher fa-lg text-secondary"
                  ></i>
                </div>
                <h5 class="fw-bold mt-4">
                  <a
                    class="link-light text-decoration-none d-flex justify-content-between align-items-center"
                  >
                    Investment advisory
                    <!-- <i class="fas fa-angle-right fa-xs"></i> -->
                  </a>
                </h5>
                <hr />
                <p class="small text-white text-opacity-75">
                  A wide selection of investing strategies from seasoned
                  portfolio managers
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card card-grey">
              <div class="card-body p-3">
                <div class="icon-wrap flex-shrink-0">
                  <i class="fas fa-funnel-dollar fa-lg text-secondary"></i>
                </div>
                <h5 class="fw-bold mt-4">
                  <a
                    class="link-light text-decoration-none d-flex justify-content-between align-items-center"
                  >
                    Smart portfolio
                    <!-- <i class="fas fa-angle-right fa-xs"></i> -->
                  </a>
                </h5>
                <hr />
                <p class="small text-white text-opacity-75">
                  A revolutionary, fully-automated investmend advisory
                  services
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card card-orange">
              <div class="card-body p-3">
                <div class="icon-wrap flex-shrink-0">
                  <i class="fas fa-handshake fa-lg text-secondary"></i>
                </div>
                <h5 class="fw-bold mt-4">
                  <a
                    class="link-light text-decoration-none d-flex justify-content-between align-items-center"
                  >
                    Mutual fund advisor
                    <!-- <i class="fas fa-angle-right fa-xs"></i> -->
                  </a>
                </h5>
                <hr />
                <p class="small text-white text-opacity-75">
                  Specialized guidance from independent local advisor for
                  hight-worth investors
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-3">
      <div class="container">
        <div class="row gy-md-2 gx-0 gx-lg-4">
          <div class="col-md-12 col-lg-8">
            <div class="col d-md-flex d-lg-flex align-items-start">
              <div
                class="mb-2 mb-mb-0 mb-lg-0 me-3 icon-wrap icon-wrap-large bg-info flex-shrink-0"
              >
                <i class="fas fa-money-bill-wave fa-2x text-secondary"></i>
              </div>
              <div>
                <h3 class="fw-bold">Why trade with {{$settings->site_name}}?</h3>
                <p>
                  Choose {{$settings->site_name}} for a reliable, secure, and advanced
                  trading experience designed to meet all your trading needs.
                </p>
                <div
                  class="row row-cols-1 row-cols-md-2 row-cols-lg-2 mt-3 mb-3 mb-md-0 mb-lg-0 gx-0"
                >
                  <div class="col">
                    <ul class="fa-ul lh-lg">
                      <li>
                        <span class="fa-li"
                          ><i class="fas fa-check-square text-info"></i></span
                        >Direct Market Access (DMA)
                      </li>
                      <li>
                        <span class="fa-li"
                          ><i class="fas fa-check-square text-info"></i></span
                        >Leverage up to 1:500
                      </li>
                      <li>
                        <span class="fa-li"
                          ><i class="fas fa-check-square text-info"></i></span
                        >T+0 settlement
                      </li>
                      <li>
                        <span class="fa-li"
                          ><i class="fas fa-check-square text-info"></i></span
                        >Dividends paid in cash
                      </li>
                    </ul>
                  </div>
                  <div class="col">
                    <ul class="fa-ul lh-lg">
                      <li>
                        <span class="fa-li"
                          ><i class="fas fa-check-square text-info"></i></span
                        >Encrypted, secure, segregated accounts.
                      </li>
                      <li>
                        <span class="fa-li"
                          ><i class="fas fa-check-square text-info"></i></span
                        >Short selling available
                      </li>
                      <li>
                        <span class="fa-li"
                          ><i class="fas fa-check-square text-info"></i></span
                        >Commissions from 0.08%
                      </li>
                      <li>
                        <span class="fa-li"
                          ><i class="fas fa-check-square text-info"></i></span
                        >Access to 1500 global shares
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <h4 class="fw-bold">Our Shares offer</h4>
            <table class="table table-striped mt-n1 mb-2">
              <thead>
                <tr>
                  <th class="text-center">Name</th>
                  <th class="text-center">Initial Deposit</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">Apple Inc CFD</td>
                  <td class="text-center">10%</td>
                </tr>
                <tr>
                  <td class="text-center">Alibaba CFD</td>
                  <td class="text-center">10%</td>
                </tr>
                <tr>
                  <td class="text-center">Facebook CFD</td>
                  <td class="text-center">10%</td>
                </tr>
              </tbody>
            </table>
            <a
              href="https://www.tradingview.com/markets/"
              class="link-primary text-decoration-none"
              ><small>See Full Shares Table</small></a
            >
          </div>
        </div>
      </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card shadow-sm border-info">
              <div
                class="card-body d-lg-flex justify-content-between align-items-center p-4"
              >
                <h4 class="fw-bold mb-0">
                  Get up to $600 plus 60 days of commission-free stocks
                </h4>
                <a
                  class="btn btn-info mt-2 mt-lg-0"
                  href="{{route('register')}}"
                  >Open an Account</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- section content end -->
  </main>

    <!-- End Blog -->


  @endsection
