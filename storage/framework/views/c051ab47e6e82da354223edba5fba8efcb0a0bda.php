<?php
use App\Models\Plans;
$plans = Plans::where('type','Main')->get();

?>


<?php $__env->startSection('title', 'Home'); ?>

<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>






<main>
    <!-- slideshow content begin -->
    <section>
        <div id="main-slideshow" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row gx-md-5 align-items-md-center">
                                <div class="col-md-8 col-xl-6 order-first">
                                    <h1 class="fw-bold display-5">
                                        Access a wealth of trading opportunities
                                    </h1>
                                    <p class="lead mt-3 mb-4 d-none d-xl-block">
                                        Trusting in the security of the Global leader in broker,
                                        more than 3 million products are waiting for you.
                                    </p>
                                    <a
                                        href="<?php echo e(route('login')); ?>"
                                        class="btn btn-warning">Start trading<i class="fas fa-bolt ms-1"></i></a>
                                    <!-- <a href="account/login" class="btn btn-link ms-3 d-none d-xl-inline"><i class="fas fa-arrow-right"></i>Try demo account</a> -->
                                </div>
                                <div class="col-md-4 col-xl-6 order-last">
                                    <div class="in-carousel-image">
                                        <img
                                            src="<?php echo e(asset('temp/frontpage/img/in-cirro-slide-1.jpg')); ?>"
                                            alt="slide"
                                            width="856"
                                            height="570" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row gx-md-5 align-items-md-center">
                                <div class="col-md-8 col-xl-6 order-first">
                                    <h1 class="fw-bold display-5">
                                        Physical stocks with zero commission
                                    </h1>
                                    <p class="lead mt-3 mb-4 d-none d-xl-block">
                                        Trusting in the security of the Global leader in broker,
                                        more than 3 million products are waiting for you.
                                    </p>
                                    <a
                                        href="<?php echo e(route('login')); ?>"
                                        class="btn btn-warning">Start trading<i class="fas fa-bolt ms-1"></i></a>
                                    <!-- <a href="account/login" class="btn btn-link ms-3 d-none d-xl-inline"><i class="fas fa-arrow-right"></i>Try demo account</a> -->
                                </div>
                                <div class="col-md-4 col-xl-6 order-last">
                                    <div class="in-carousel-image">
                                        <img
                                            src="<?php echo e(asset('temp/frontpage/img/in-cirro-slide-2.jpg')); ?>"
                                            alt="slide"
                                            width="856"
                                            height="570" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row gx-md-5 align-items-md-center">
                                <div class="col-md-8 col-xl-6 order-first">
                                    <h1 class="fw-bold display-5">
                                        Trading environment with the best pricing
                                    </h1>
                                    <p class="lead mt-3 mb-4 d-none d-xl-block">
                                        Trusting in the security of the Global leader in broker,
                                        more than 3 million products are waiting for you.
                                    </p>
                                    <a
                                        href="<?php echo e(route('login')); ?>"
                                        class="btn btn-warning">Start trading<i class="fas fa-bolt ms-1"></i></a>
                                    <!-- <a href="account/login" class="btn btn-link ms-3 d-none d-xl-inline"><i class="fas fa-arrow-right"></i>Try demo account</a> -->
                                </div>
                                <div class="col-md-4 col-xl-6 order-last">
                                    <div class="in-carousel-image">
                                        <img
                                            src="<?php echo e(asset('temp/frontpage/img/in-cirro-slide-3.jpg')); ?>"
                                            alt="slide"
                                            width="856"
                                            height="570" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-indicators"></div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#main-slideshow"
                data-bs-slide="prev"></button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#main-slideshow"
                data-bs-slide="next"></button>
        </div>
    </section>
    <!-- slideshow content end -->
    <!-- section content begin -->
    <section class="py-5 bg-primary text-white in-cirro-1">
        <div class="container">
            <div class="row gy-2 gy-md-2 gx-lg-3">
                <div class="col-md-12 col-lg-5">
                    <h1 class="text-white">Experience superior trading conditions</h1>
                    <p>
                        1000+ opportunities to trade, tight spreads, transparent
                        pricing, powerful platforms. Backed by unmatched support.
                    </p>
                </div>
                <div class="col-md-12 col-lg-7">
                    <div class="row row-cols-1 row-cols-md-3 mt-1">
                        <div class="col">
                            <div class="border-decor pt-1 pb-3 px-3">
                                <h1 class="text-primary">
                                    <14ms </h1>
                                        <p class="text-warning mb-0">Ultra-fast Execution</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="border-decor pt-2 pt-md-1 pb-3 px-3">
                                <h1 class="text-primary">1:200</h1>
                                <p class="text-warning mb-0">Maximum Leverage</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="border-decor pt-2 pt-md-1 pb-3 px-3">
                                <h1 class="text-primary">2100+</h1>
                                <p class="text-warning mb-0">Trading Instruments</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div
                        class="row row-cols-1 row-cols-md-4 row-cols-lg-6 gx-5 gy-3 gy-lg-0">
                        <div class="col">
                            <div class="ticker-image d-flex align-items-center">
                                <img
                                    class="opacity-75"
                                    src="<?php echo e(asset('temp/frontpage/img/in-cirro-1-ticker-1.svg')); ?>"
                                    alt="ticker-logo"
                                    width="138"
                                    height="34" />
                            </div>
                            <div class="ticker-price">
                                2,120.67 (3.40%)<span class="ticker-down-arrow"><i class="fas fa-circle-down"></i></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="ticker-image d-flex align-items-center">
                                <img
                                    class="opacity-75"
                                    src="<?php echo e(asset('temp/frontpage/img/in-cirro-1-ticker-2.svg')); ?>"
                                    alt="ticker-logo"
                                    width="139"
                                    height="35" />
                            </div>
                            <div class="ticker-price">
                                244.97 (2.70%)<span class="ticker-up-arrow"><i class="fas fa-circle-up"></i></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="ticker-image d-flex align-items-center">
                                <img
                                    class="opacity-75"
                                    src="<?php echo e(asset('temp/frontpage/img/in-cirro-1-ticker-3.svg')); ?>"
                                    alt="ticker-logo"
                                    width="135"
                                    height="27" />
                            </div>
                            <div class="ticker-price">
                                160.87 (5.01%)<span class="ticker-down-arrow"><i class="fas fa-circle-down"></i></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="ticker-image d-flex align-items-center">
                                <img
                                    class="opacity-75"
                                    src="<?php echo e(asset('temp/frontpage/img/in-cirro-1-ticker-4.svg')); ?>"
                                    alt="ticker-logo"
                                    width="130"
                                    height="20" />
                            </div>
                            <div class="ticker-price">
                                639.30 (1.20%)<span class="ticker-up-arrow"><i class="fas fa-circle-up"></i></span>
                            </div>
                        </div>
                        <div class="col d-none d-lg-block">
                            <div class="ticker-image d-flex align-items-center">
                                <img
                                    class="opacity-75"
                                    src="<?php echo e(asset('temp/frontpage/img/in-cirro-1-ticker-5.svg')); ?>"
                                    alt="ticker-logo"
                                    width="137"
                                    height="32" />
                            </div>
                            <div class="ticker-price">
                                121.08 (2.30%)<span class="ticker-up-arrow"><i class="fas fa-circle-up"></i></span>
                            </div>
                        </div>
                        <div class="col d-none d-lg-block">
                            <div class="ticker-image d-flex align-items-center">
                                <img
                                    class="opacity-75"
                                    src="<?php echo e(asset('temp/frontpage/img/in-cirro-1-ticker-6.svg')); ?>"
                                    alt="ticker-logo"
                                    width="114"
                                    height="31" />
                            </div>
                            <div class="ticker-price">
                                104.78 (1.08%)<span class="ticker-up-arrow"><i class="fas fa-circle-up"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-5 in-cirro-2">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h1 class="mb-1">Best-in-class forex execution</h1>
                    <p class="lead">
                        Access Tier-1 liquidity to receive higher fill-rates and
                        significant price improvements.
                    </p>
                </div>
            </div>
            <div
                class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gy-2 g-md-2 gx-lg-2">
                <div class="col d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-body">
                            <img
                                src="<?php echo e(asset('temp/frontpage/img/in-cirro-2-icon-1.svg')); ?>"
                                alt="icon"
                                width="46"
                                height="46" />
                            <h2 class="h5 mt-4">Tier 1 liquidity</h2>
                            <p>
                                High-frequency traders require optimal conditions, while
                                brokers aggregate liquidity from multiple Tier 1 providers
                                for competitive retail trading.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-body">
                            <img
                                src="<?php echo e(asset('temp/frontpage/img/in-cirro-2-icon-2.svg')); ?>"
                                alt="icon"
                                width="46"
                                height="46" />
                            <h2 class="h5 mt-4">Safe and Secure</h2>
                            <p>
                                A Regulated brokers, secure transactions, segregated
                                accounts, and risk management tools to protect traders'
                                funds and personal information..
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-body">
                            <img
                                src="<?php echo e(asset('temp/frontpage/img/in-cirro-2-icon-3.svg')); ?>"
                                alt="icon"
                                width="46"
                                height="46" />
                            <h2 class="h5 mt-4">Innovative platform</h2>
                            <p>
                                An innovative forex platform integrates advanced tools for
                                trading, including charting, automation, fast execution,
                                risk management,market analysis, and user-friendly
                                interface.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-body">
                            <img
                                src="<?php echo e(asset('temp/frontpage/img/in-cirro-2-icon-4.svg')); ?>"
                                alt="icon"
                                width="46"
                                height="46" />
                            <h2 class="h5 mt-4">Low Commissions</h2>
                            <p>
                                <?php echo e($settings->site_name); ?> now offers $0 commission on Gold trades,
                                featuring tight spreads, zero commission, and award-winning
                                customer service.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-5 in-cirro-3">
        <div class="container">
            <div class="row d-flex align-items-center gx-5 mb-3">
                <div class="col-md-12 col-lg-5 mb-5 mb-md-3 mb-lg-0">
                    <span class="badge bg-secondary mb-3">Popular instruments</span>
                    <h1 class="mt-2 mb-1">Live prices on popular markets</h1>
                    <p class="lead mb-4">
                        Inform your decisions with timely dispatches from our team of
                        global analysts.
                    </p>
                    <a href="/#" class="btn btn-link"><i class="fas fa-arrow-right"></i>Find out more</a>
                </div>
                <div class="col-md-12 col-lg-7 mt-md-5">
                    <div class="card card-body ms-lg-5">
                        <div id="tradingview-widget"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section content end -->







    <!-- section content begin-generator -->
    

    <!--section content ends-->










    <!-- section content begin -->
    <section class="py-5 in-cirro-17">
        <div class="container position-relative">
            <img
                class="img-headquarters"
                src="<?php echo e(asset('temp/frontpage/img/WBIG-Performance-Oct-2022.png')); ?>"
                alt="headquarters"
                width="540"
                height="513" />
            <div class="row">
                <div class="col-12 mb-2">
                    <h1>
                        Join a club of more than
                        <span class="text-primary">480,000</span> traders
                    </h1>
                </div>
            </div>
            <div class="row gx-0">
                <div class="col-md-12 col-lg-8">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 gx-2 gy-2">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div
                                            class="icon-wrap icon-wrap-small flex-shrink-0 me-1">
                                            <i class="fa fa-line-chart fa-lg text-primary"></i>
                                        </div>
                                        <h5 class="mb-0">Stocks</h5>
                                    </div>
                                    <p class="mb-1">
                                        Forex brings the opportunity of the world’s largest,
                                        most liquid market. We elevate your trading with wide
                                        range of currency pairs, competitive spreads, powerful
                                        tools.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div
                                            class="icon-wrap icon-wrap-small flex-shrink-0 me-1">
                                            <i
                                                class="fa-solid fa-bitcoin-sign fa-lg text-primary"></i>
                                        </div>
                                        <h5 class="mb-0">Cryptocurrency</h5>
                                    </div>
                                    <p class="mb-1">
                                        Cryptocurrency Contract For Difference (CFDs) are a type
                                        of derivative instrument that allow traders to speculate
                                        on the price movements of cryptocurrencies.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div
                                            class="icon-wrap icon-wrap-small flex-shrink-0 me-1">
                                            <i class="fa-solid fa-gem fa-lg text-primary"></i>
                                        </div>
                                        <h5 class="mb-0">Metals</h5>
                                    </div>
                                    <p class="mb-1">
                                        Precious metals are a fast-moving global market. <?php echo e($settings->site_name); ?> lets you trade price movements on highly-traded
                                        metals like gold and silver, through CFD solutions.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div
                                            class="icon-wrap icon-wrap-small flex-shrink-0 me-1">
                                            <i class="fas fa-circle fa-lg text-primary"></i>
                                        </div>
                                        <h5 class="mb-0">Commodity CFDs</h5>
                                    </div>
                                    <p class="mb-1">
                                        Commodity CFDs are contracts for difference that allow
                                        traders to speculate on the price movements of various
                                        commodities without having to own the underlying assets.
                                        Commodities are physical goods that are typically traded
                                        on global markets, such as oil, gold, silver, natural
                                        gas .
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row mt-4">
                <div class="col-12">
                    <p class="text-muted">
                        <span class="badge bg-secondary me-1">Start trade</span> <span class="small">Trading derivatives and leveraged products carries a high level of risk; however, we assure you that our offerings are designed to maintain a low level of risk. <a class="text-decoration-none" href="#">Join now!</a></span>
                    </p>
                </div>
            </div> -->
        </div>
    </section>
    <div class="row mt-4">
        <div class="col-12">
            <p class="text-muted">
                <span class="badge bg-secondary me-1">Start trade</span>
                <span class="small">Trading derivatives and leveraged products carries a high level
                    of risk; however, we assure you that our offerings are designed to
                    maintain a low level of risk.
                    <a class="text-decoration-none" href="<?php echo e(route('register')); ?>">Join now!</a></span>
            </p>
        </div>
    </div>

    <!-- section content end -->

    <!-- section content begin -->
    <section class="py-5 in-cirro-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card card-body">
                        <div
                            class="row gx-0 d-flex align-items-center position-relative">
                            <div class="col-md-5 col-lg-6">
                                <img
                                    class="testi-image"
                                    src="<?php echo e(asset('temp/frontpage/img/in-cirro-4-people-.png')); ?>"
                                    alt="testimonial"
                                    width="418"
                                    height="441" />
                            </div>
                            <div class="col-md-7 col-lg-6">
                                <blockquote class="blockquote">
                                    <p>
                                        When something is important enough, you do it even if
                                        the odds are not in your favor.
                                    </p>
                                </blockquote>
                                <h2 class="h6 mt-3 mb-0">Elon Musk</h2>
                                                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-3 in-cirro-16">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="d-none">Stock price ticker</h1>
                    <ul class="price-ticker list-inline overflow-hidden mb-0">
                        <li class="list-inline-item">
                            XAUUSD<span class="badge bg-up ms-1">1.1159  (-0.11%)<i class="fas fa-arrow-trend-up"></i></span>
                        </li>
                        <li class="list-inline-item">
                            BTCUSDC<span class="badge bg-up ms-1">1.1159  (-0.11%)<i class="fas fa-arrow-trend-up"></i></span>
                        </li>
                        <li class="list-inline-item">
                            GBPUSD<span class="badge bg-down ms-1">1.1159  (-0.11%)<i class="fas fa-arrow-trend-down"></i></span>
                        </li>
                        <li class="list-inline-item">
                            EURUSD<span class="badge bg-down ms-1">1.1159  (-0.11%)<i class="fas fa-arrow-trend-down"></i></span>
                        </li>
                        <li class="list-inline-item">
                            USDJPY<span class="badge bg-up ms-1">1.1159  (-0.11%)<i class="fas fa-arrow-trend-up"></i></span>
                        </li>
                        <li class="list-inline-item">
                            USDCAD<span class="badge bg-up ms-1">1.1159  (-0.11%)<i class="fas fa-arrow-trend-up"></i></span>
                        </li>
                        <li class="list-inline-item">
                            USDCHF<span class="badge bg-up ms-1">1.1159  (-0.11%)<i class="fas fa-arrow-trend-up"></i></span>
                        </li>
                        <li class="list-inline-item">
                            AUDUSD<span class="badge bg-down ms-1">1.1159  (-0.11%)<i class="fas fa-arrow-trend-down"></i></span>
                        </li>
                        <li class="list-inline-item">
                            GBPJPY<span class="badge bg-up ms-1">1.1159  (-0.11%)<i class="fas fa-arrow-trend-up"></i></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 mt-lg-3">
                <div class="row gx-0">
                    <div
                        class="col-md-12 col-lg-2 border-end-lg d-flex align-items-center justify-content-center justify-content-md-center justify-content-lg-start">
                        <h6 class="fw-bold text-muted text-center mb-md-2 mb-lg-0">
                            Featured on
                        </h6>
                    </div>
                    <div class="col-md-12 col-lg-10">
                        <div class="row row-cols-1 row-cols-md-4 row-cols-lg-4 gx-0">
                            <div class="col text-center">
                                <img
                                    class="opacity-75 my-2 my-md-1 my-lg-1"
                                    src="<?php echo e(asset('temp/frontpage/img/blockit/logo-jumio - Copy.svg')); ?>"
                                    alt="press-logo"
                                    width="128"
                                    height="21" />
                            </div>
                            <div class="col text-center">
                                <img
                                    class="opacity-75 my-2 my-md-1 my-lg-1"
                                    src="<?php echo e(asset('temp/frontpage/img/blockit/logo-aws.svg')); ?>"
                                    alt="press-logo"
                                    width="128"
                                    height="23" />
                            </div>
                            <div class="col text-center">
                                <img
                                    class="opacity-75 my-2 my-md-1 my-lg-1"
                                    src="<?php echo e(asset('temp/frontpage/img/blockit/logo-cloudflare - Copy.svg')); ?>"
                                    alt="press-logo"
                                    width="127"
                                    height="24" />
                            </div>
                            <div class="col text-center">
                                <img
                                    class="opacity-75 my-2 my-md-1 my-lg-1"
                                    src="<?php echo e(asset('temp/frontpage/img/blockit/logo-ledger.svg')); ?>"
                                    alt="press-logo"
                                    width="126"
                                    height="30" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="pt-3 in-cirro-10">
        <div class="container mt-0 mt-md-2">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="row d-flex align-items-start">
                        <div class="col-md-5 col-lg-6 order-last order-md-first">
                            <img
                                class="w-100"
                                src="<?php echo e(asset('temp/frontpage/img/in-cirro-10-mockup.png')); ?>"
                                alt="mockup" />
                        </div>
                        <div class="col-md-7 col-lg-6 pb-5 order-first order-md-last">
                            <h1 class="mb-2">Platform by traders, for traders</h1>
                            <p class="text-muted mb-3 d-none d-lg-block">
                                Seize your opportunity, with technology built designed to
                                ensure that your deal goes through.
                            </p>
                            <a href="/#"><img
                                    src="<?php echo e(asset('temp/frontpage/img/in-app-button-apple.svg')); ?>"
                                    alt="apple"
                                    width="120"
                                    height="40" /></a>
                            <a href="/#" class="ms-1"><img
                                    src="<?php echo e(asset('temp/frontpage/img/in-app-button-google.svg')); ?>"
                                    alt="google"
                                    width="135"
                                    height="40" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-4 bg-primary in-cirro-11">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gy-3 gy-lg-0">
                <div class="col d-flex align-items-center">
                    <img
                        src="<?php echo e(asset('temp/frontpage/img/in-cirro-11-award.svg')); ?>"
                        alt="award"
                        width="54"
                        height="50" />
                    <div class="ms-2">
                        <h6 class="text-white mb-0">Best Forex Broker</h6>
                        <p class="text-white text-opacity-75 small mb-0">
                            TradeOn Summit 2020
                        </p>
                    </div>
                </div>
                <div class="col d-flex align-items-center">
                    <img
                        src="<?php echo e(asset('temp/frontpage/img/in-cirro-11-award.svg')); ?>"
                        alt="award"
                        width="54"
                        height="50" />
                    <div class="ms-2">
                        <h6 class="text-white mb-0">Best ECN Broker</h6>
                        <p class="text-white text-opacity-75 small mb-0">
                            Forex Expo Dubai 2016
                        </p>
                    </div>
                </div>
                <div class="col d-flex align-items-center">
                    <img
                        src="<?php echo e(asset('temp/frontpage/img/in-cirro-11-award.svg')); ?>"
                        alt="award"
                        width="54"
                        height="50" />
                    <div class="ms-2">
                        <h6 class="text-white mb-0">Best Trading App</h6>
                        <p class="text-white text-opacity-75 small mb-0">
                            London Summit 2019
                        </p>
                    </div>
                </div>
                <div class="col d-flex align-items-center">
                    <img
                        src="<?php echo e(asset('temp/frontpage/img/in-cirro-11-award.svg')); ?>"
                        alt="award"
                        width="54"
                        height="50" />
                    <div class="ms-2">
                        <h6 class="text-white mb-0">Best Crypto Broker</h6>
                        <p class="text-white text-opacity-75 small mb-0">
                            Forex Expo Taiwan 2022
                        </p>
                    </div>
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
                    <h1>
                        Our roadmap For
                        <span class="text-highlight">Profitability</span>
                    </h1>
                    <p class="lead text-muted">
                        You can increase your Loyalty tier and earn more daily interest
                        by trading more crypto assets.
                    </p>
                    <p>
                        You can follow our progress here or follow us on Twitter  
                        <a href="/#" class="link-primary text-decoration-none"><i class="fab fa-twitter"></i><small>@ <?php echo e($settings->site_name); ?></small></a>
                    </p>
                </div>
            </div>
            <hr class="mt-3 mb-2" />
            <div class="row row-cols-md-1 row-cols-lg-3 gx-lg-3">
                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col timeline-horizontal">
                    <div class="timeline-item d-flex align-items-center ms-3">
                        <div class="icon-wrap bg-primary me-1">
                            <i class="fas fa-clipboard-check fa-lg text-white"></i>
                        </div>
                        <div class="d-flex align-items-center">
                            <h5 class="fw-bold mb-0 me-1"><?php echo e($plan->name); ?></h5>
                            <span class="badge bg-secondary"><?php echo e($settings->currency); ?><?php echo e($plan->min_price); ?> - <?php echo e($settings->currency); ?><?php echo e($plan->max_price); ?></span>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body ps-2">
                            <ul class="fa-ul lh-lg mb-0">
                                <li>
                                    <span class="fa-li"><i class="fas fa-check-square text-primary"></i></span>up to <?php echo e($plan->increment_amount); ?>%
                                </li>
                                <li>
                                    <span class="fa-li"><i class="fas fa-check-square text-primary"></i></span>Trading Interest on crypto
                                </li>
                                <li>
                                    <span class="fa-li"><i class="fas fa-check-square text-primary"></i></span>Ref Commission: <?php echo e($settings->currency); ?><?php echo e($plan->gift); ?>

                                </li>
                                <li>
                                    <span class="fa-li"><i class="fas fa-check-square text-primary"></i></span>Online Support: 24/7
                                </li>
                                <li>
                                    <span class="fa-li"><i class="fas fa-check-square text-primary"></i></span>Withdrawal: 24hrs
                                </li>
                                                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-5 in-cirro-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <h1 class="mb-1">Some of the things you may want to know</h1>
                    <p class="lead mb-4">
                        We answered questions so you don’t have to ask.
                    </p>
                    <a href="/#" class="btn btn-link"><i class="fas fa-arrow-right"></i>View more questions</a>
                </div>
                <div class="col-md-12 col-lg-6 mt-5 mt-lg-0">
                    <div
                        class="accordion accordion-style-5 mt-n2 mb-3"
                        id="sampleFive">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#a5One"
                                    aria-expanded="true">
                                    Is <?php echo e($settings->site_name); ?> a licensed broker?
                                </button>
                            </h2>
                            <div
                                id="a5One"
                                class="accordion-collapse collapse show"
                                data-bs-parent="#sampleFive">
                                <div class="accordion-body">
                                    <p>
                                        Yes, <?php echo e($settings->site_name); ?> is a trust broker, adhering
                                        to regulatory standards to ensure the safety and
                                        security of clients' investments.
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
                                    aria-expanded="false">
                                    What services does <?php echo e($settings->site_name); ?> offer?
                                </button>
                            </h2>
                            <div
                                id="a5Two"
                                class="accordion-collapse collapse"
                                data-bs-parent="#sampleFive">
                                <div class="accordion-body">
                                    <p>
                                        <?php echo e($settings->site_name); ?> offers a range of services including forex
                                        trading, digital asset management, investment advisory,
                                        portfolio management, and market analysis.
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
                                    aria-expanded="false">
                                    How does <?php echo e($settings->site_name); ?> ensure the security of my
                                    investments?
                                </button>
                            </h2>
                            <div
                                id="a5Three"
                                class="accordion-collapse collapse"
                                data-bs-parent="#sampleFive">
                                <div class="accordion-body">
                                    <p>
                                        <?php echo e($settings->site_name); ?> employs advanced security measures, such as
                                        encryption, secure payment methods, and segregated
                                        client accounts, to safeguard your investments and
                                        personal information.
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
                                    aria-expanded="false">
                                    Does <?php echo e($settings->site_name); ?> provide customer support?
                                </button>
                            </h2>
                            <div
                                id="a5Four"
                                class="accordion-collapse collapse"
                                data-bs-parent="#sampleFive">
                                <div class="accordion-body">
                                    <p>
                                        Yes, <?php echo e($settings->site_name); ?> offers award-winning customer support
                                        available through multiple channels, including phone,
                                        email, and live chat, to assist with any inquiries or
                                        issues.
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
    <!-- section content begin -->
    <section class="py-4 bg-primary in-cirro-6">
        <div class="container">
            <div class="row">
                <div
                    class="col-12 d-md-flex justify-content-md-start align-items-center">
                    <div class="border-end-md pe-md-5 d-block">
                        <h2 class="text-white mb-0">Start investing today.</h2>
                    </div>
                    <div class="mt-3 mt-md-0 ps-md-5">
                        <a
                            href="<?php echo e(route('register')); ?>"
                            class="btn btn-link"><i class="fas fa-arrow-right"></i>Open account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section content end -->
</main>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/home/index.blade.php ENDPATH**/ ?>