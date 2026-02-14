<!DOCTYPE html>
<html lang="en" data-lang="en" data-country="US">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=0.8" />
    <meta
        name="description"
        content="Earn up to 17% interest on your crypto, borrow against it from just 0% APR or swap instantly between 300+ market pairs. Open your account now!" />
    <meta name="keywords" content="<?php echo e($settings->site_name); ?> - Unlock the Power of Your Finance" />
    <meta
        name="description"
        content="Earn up to 17% interest on your crypto, borrow against it from just 0% APR or swap instantly between 300+ market pairs. Open your account now!" />

    <meta property="og:image" content="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>" />
    <meta property="og:url" content="<?php echo e($settings->site_address); ?>">
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('storage/app/public/' . $settings->favicon)); ?>" type="image/x-icon">
    <meta name="twitter:card" conten t="summary_large_image" />
    <meta name="twitter:title" content="<?php echo e($settings->site_name); ?> - Unlock the Power of Your Finance" />
    <meta name="theme-color" content="#1A5C96" />
    <!-- critical preload -->
    <link rel="preload" href="<?php echo e(asset('temp/frontpage/js/vendors/bootstrap.bundle.min.js')); ?>" as="script" />
    <link rel="preload" href="<?php echo e(asset('temp/frontpage/css/style.css')); ?>" as="style" />
    <!-- icon preload -->
    <link
        rel="preload"
        href="<?php echo e(asset('temp/frontpage/fonts/fa-brands-400.woff2')); ?>"
        as="font"
        type="font/woff2"
        crossorigin />
    <link
        rel="preload"
        href="<?php echo e(asset('temp/frontpage/fonts/fa-solid-900.woff2')); ?>"
        as="font"
        type="font/woff2"
        crossorigin />
    <!-- font preload -->
    <link
        rel="preload"
        href="<?php echo e(asset('temp/frontpage/fonts/merriweather-v30-latin-900.woff2')); ?>"
        as="font"
        type="font/woff2"
        crossorigin />
    <link
        rel="preload"
        href="<?php echo e(asset('temp/frontpage/fonts/poppins-v20-latin-regular.woff2')); ?>"
        as="font"
        type="font/woff2"
        crossorigin />
    <link
        rel="preload"
        href="<?php echo e(asset('temp/frontpage/fonts/poppins-v20-latin-300.woff2')); ?>"
        as="font"
        type="font/woff2"
        crossorigin />
    <link
        rel="preload"
        href="<?php echo e(asset('temp/frontpage/fonts/poppins-v20-latin-700.woff2')); ?>"
        as="font"
        type="font/woff2"
        crossorigin />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo e(asset('temp/frontpage/css/style.css')); ?>" />
    <!-- Touch icon -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('storage/app/public/' . $settings->favicon)); ?>" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- g-hide -->
    <style type="text/css">
        iframe.goog-te-banner-frame {
            display: none !important;
        }
    </style>
    <style type="text/css">
        iframe.skiptranslate {
            display: none !important;
        }
    </style>
    <style type="text/css">
        body {
            position: static !important;
            top: 0px !important;
        }
    </style>
    <!-- end-g-hide -->
    </head>

<body oncut="return false" oncopy="return false" onpaste="return false">
    <!-- page loader begin -->
    <div
        class="page-loader w-100 h-100 bg-white d-flex justify-content-center align-items-center position-fixed overflow-hidden">
        <div class="spinner-grow spinner-grow-sm text-primary"></div>
        <div class="spinner-grow spinner-grow-sm text-primary"></div>
        <div class="spinner-grow spinner-grow-sm text-primary"></div>
    </div>
    <!-- page loader end --><!-- header begin -->
<header class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img
                src="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>"
                alt="logo"
                width="200"
                height="45"
                class="d-inline-block" />
        </a>
        <div
            class="collapse navbar-collapse d-flex justify-content-between d-none d-xl-block"
            id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="/"
                        id="dropdown-home"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="markets">Markets</a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="/#"
                        id="dropdown-company"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">Company</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="about">About</a></li>
                        <li>
                            <a class="dropdown-item" href="careers">Careers</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="/#"
                        id="dropdown-resources"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">Resources</a>
                    <ul class="dropdown-menu dropdown-large-menu">
                        <li>
                            <div class="row">
                                <div class="col-6">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a class="dropdown-item" href="contact">Help Center</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="legal-docs">Legal Docs<i class="fas fa-gavel fa-sm"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6 border-start child-menu-text">
                                    <p>
                                        Spreads as low as 0.0 leverage plus fast execution. Get a
                                        competitive pricing advantage across a choice of
                                        instruments.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="optional-link d-flex align-items-center ms-4 d-none d-xl-block">
                <?php if(auth()->guard()->check()): ?>

                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-link me-3"><i class="fas fa-sign-out-alt"></i>Logout</button>
                </form>
                    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary me-3">Dashboard</a>

                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-link me-3"><i class="fas fa-circle-user"></i>Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary">Get Started</a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</header>
<!-- header end -->

<title><?php echo e($settings->site_name); ?> | Access a Wealth of Trading Opportunities</title>



<?php echo $__env->yieldContent('content'); ?>





<!-- footer begin -->
<footer class="py-5 in-cirro-footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row gx-0 mb-3">
                    <div class="col-md-12 col-lg-3 footer-logo">
                        <img
                            src="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>"
                            alt="footer-logo"
                            width="280"
                            height="70"
                            class="mb-1 d-block" />
                        <a class="lead footer-email" href="mailto:<?php echo e($settings->contact_email); ?>"><?php echo e($settings->contact_email); ?></a>
                    </div>
                    <div class="col-md-12 col-lg-9">
                        <div
                            class="d-flex flex-column flex-xl-row justify-content-xl-end">
                            <ul
                                class="list-inline in-footer-link order-last order-xl-first">
                                <li class="list-inline-item">
                                    <a href="contact">Contact</a>
                                </li>
                                <!-- <li class="list-inline-item"><a href="#">FAQ</a></li> -->
                                <li class="list-inline-item">
                                    <a href="careers">Carreers</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="webtrade">WebTrader</a>
                                </li>
                                <!-- <li class="list-inline-item"><a href="#">Integrations</a></li> -->
                                <li class="list-inline-item">
                                    <a href="security">Security</a>
                                </li>
                            </ul>
                            <!-- SEC begin -->
                            <div
                                class="social-media-list small hstack gap-3 ms-lg-5 order-first order-xl-last">
                                                                    <img
                                        src="<?php echo e(asset('temp/frontpage/img/security.png')); ?>"
                                        alt="footer-logo"
                                        class="mb-1 d-block" />
                                                            </div>
                            <!-- SEC end -->
                        </div>
                        <!-- social media begin -->
                        <div
                            class="social-media-list small hstack gap-3 ms-lg-5 order-first order-xl-last">
                            <div>
                                <a
                                    href="/#https://www.facebook.com/#"
                                    class="color-facebook text-decoration-none"><i class="fab fa-facebook-square"></i> Facebook</a>
                            </div>
                            <div>
                                <a
                                    href="/#https://twitter.com/#"
                                    class="color-twitter text-decoration-none"><i class="fab fa-twitter"></i> Twitter</a>
                            </div>
                            <div>
                                <a
                                    href="/#some-link"
                                    class="color-linkedin text-decoration-none"><i class="fab fa-linkedin"></i> Linkedin</a>
                            </div>
                        </div>
                        <!-- social media end -->
                    </div>
                    <div class="col-md-12 col-lg-3 mt-5 d-flex">
                        <div class="align-self-end">
                            <p class="mb-0 copyright-text">
                                Copyright ©  2024 <?php echo e($settings->site_name); ?>. All Rights Reserved.
                            </p>
                        </div>
                    </div>
                    <!-- <div
                        class="col-md-12 col-lg-9 d-lg-flex justify-content-lg-end d-none d-lg-block">
                        <div class="align-self-end">
                            <nav class="nav in-footer-link-2">
                                <a
                                    class="nav-link border-end-md"
                                    href="img/docs/riskdisclosure.pdf">Risk Disclosure</a>
                                <a
                                    class="nav-link border-end-md"
                                    href="<?php echo e($settings->site_address); ?>/img/docs/agreement.pdf">Customer Agreement</a>
                                <a class="nav-link pe-0" href="<?php echo e(asset('temp/frontpage/img/docs/policy.pdf')); ?>">AML policy</a>
                            </nav>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->
<!-- to top begin -->
<div class="d-none d-md-block">
    <a
        href="/#"
        class="to-top fas fa-arrow-up text-decoration-none text-white"></a>
</div>
<!-- to top end -->

<!-- <call-us-selector
      phonesystem-url="https://1873.3cx.cloud"
      party="nexgenassetmgt"
    ></call-us-selector>

    <script
      defer
      src="../downloads-global.3cx.com/downloads/livechatandtalk/v1/callus.js"
      id="tcx-callus-js"
      charset="utf-8"
    ></script> -->


<!-- javascript -->
<script src="<?php echo e(asset('temp/frontpage/js/vendors/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('temp/frontpage/js/vendors/tradingview-widget.min.js')); ?>"></script>
<script src="<?php echo e(asset('temp/frontpage/js/vendors/vanilla-marquee.min.js')); ?>"></script>
<script src="<?php echo e(asset('temp/frontpage/js/utilities.min.js')); ?>"></script>
<script src="<?php echo e(asset('temp/frontpage/js/config-theme.js')); ?>"></script>


<script>
    $(document).keydown(function(event) {
        if (event.keyCode == 123) {
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
            return false;
        }
    })
    document.addEventListener('contextmenu', event => event.preventDefault())
</script>

<?php echo $__env->make('layouts.lang', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    // Function to hide the loader
    function hideLoader() {
        const loader = document.getElementById('page-loader');
        if (loader) {
            loader.style.display = 'none';
        }
    }

    // Set a timeout to hide the loader after 3 seconds (3000 milliseconds)
    setTimeout(hideLoader, 1000);
</script>
<?php echo $__env->make('layouts.livechat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/layouts/base.blade.php ENDPATH**/ ?>