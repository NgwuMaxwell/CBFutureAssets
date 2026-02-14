<?php
      $captcha = strtoupper(substr(md5(rand()), 0, 6)); // Generate random text
?>



<?php $__env->startSection('title', 'Contact'); ?>



<?php $__env->startSection('content'); ?>




<main>
    <!-- section content begin -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26359832.84284904!2d-113.72795382611159!3d36.245492871409056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2snl!4v1639738515182!5m2!1sen!2snl" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                <div class="d-flex justify-content-center">
                    <div class="col-md-11 col-lg-8 mt-2">
                        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3">
                            <div class="col text-center">
                                <h5 class="fw-bold mb-1">Address</h5>
                                <p class="text-muted">
                                    <?php echo e($settings->office); ?>                          </p>
                            </div>
                            <div class="col text-center">
                                <h5 class="fw-bold mb-1">Email</h5>
                                <p class="text-muted">
                                    <?php echo e($settings->site_name); ?><br />for public inquiries
                                </p>
                            </div>
                            <div class="col text-center">
                                <h5 class="fw-bold mb-1">Operational Hours</h5>
                                <p class="text-muted">
                                    <br />Mon - Fri, 9am - 5pm
                                </p>
                            </div>
                        </div>
                        <hr class="my-2" />
                        <h1 class="pt-2 text-center">
                            Have a <span class="text-highlight">questions?</span>
                        </h1>
                        <p class="lead text-muted text-center">Let's get in touch</p>
                        <form method="POST" action="<?php echo e(route('enquiry')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user fa-xs text-muted"></i></span>
                                    <input
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        type="text"
                                        placeholder="Full name"
                                        aria-label="Full name"
                                        required="" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope fa-xs text-muted"></i></span>
                                    <input
                                        class="form-control"
                                        id="email"
                                        name="email"
                                        type="email"
                                        placeholder="Email address"
                                        aria-label="Email address"
                                        required="" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-pen fa-xs text-muted"></i></span>
                                    <input
                                        class="form-control"
                                        id="subject"
                                        name="subject"
                                        type="text"
                                        placeholder="Subject"
                                        aria-label="Subject"
                                        required="" />
                                </div>
                            </div>
                            <div class="col-12">
                                <textarea
                                    class="form-control"
                                    id="message"
                                    name="message"
                                    placeholder="Message"
                                    rows="6"
                                    required=""></textarea>
                            </div>

          <div class="input-group">
        <div class="input-group-prepend" style="width:50%">
          <img src="temp/frontpage/img/captcha/captcha.png" alt="" srcset="<?php echo e($captcha); ?>">
        </div>
        <input style="color:black;width:50%" type="text" value="" placeholder="Enter Captcha" name="_captcha" class="form-control font-weight-bold" id="captcha" required>
      </div>
      <span style="color:crimson"></span>
      <br>
                                <div class="d-grid">
                                <button
                                    class="btn btn-info"
                                    id="sendemail"
                                    type="submit"
                                    name="contact">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- success notification begin -->
        <div class="position-fixed bottom-0 end-0 p-4" style="z-index: 2">
            <div
                class="toast"
                role="alert"
                aria-live="assertive"
                aria-atomic="true">
                <div class="toast-body text-primary">
                    <i class="fas fa-check-circle me-1"></i>Your message has been sent
                    successfully. Thank you!
                </div>
            </div>
        </div>
        <!-- success notification end -->
    </section>
    <!-- section content end -->
</main>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/home/contact.blade.php ENDPATH**/ ?>