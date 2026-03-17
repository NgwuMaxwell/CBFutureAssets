<div>
    <form method="post" action="javascript:void(0)" id="refform">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="mb-2 col-md-6">
                <h5 class="">Direct Referral Commission (%) </h5>
                <input type="text" class="form-control  " name="ref_commission"
                    value="<?php echo e($settings->referral_commission); ?>" required>
            </div>
            <div class="mb-2 col-md-6">
                <h5 class="">Indirect Referral Commission 1 (%) </h5>
                <input type="text" class="form-control  " name="ref_commission1"
                    value="<?php echo e($settings->referral_commission1); ?>" required>
            </div>
            <div class="mb-2 col-md-6">
                <h5 class="">Indirect Referral Commission 2 (%) </h5>
                <input type="text" class="form-control  " name="ref_commission2"
                    value="<?php echo e($settings->referral_commission2); ?>" required>
            </div>
            <div class="mb-2 col-md-6">
                <h5 class="">Indirect Referral Commission 3 (%) </h5>
                <input type="text" class="form-control  " name="ref_commission3"
                    value="<?php echo e($settings->referral_commission3); ?>" required>
            </div>
            <div class="mb-2 col-md-6">
                <h5 class="">Indirect Referral Commission 4 (%) </h5>
                <input type="text" class="form-control  " name="ref_commission4"
                    value="<?php echo e($settings->referral_commission4); ?>" required>
            </div>
            <div class="mb-2 col-md-6">
                <h5 class="">Indirect Referral Commission 5 (%) </h5>
                <input type="text" class="form-control   " name="ref_commission5"
                    value="<?php echo e($settings->referral_commission5); ?>" required>
            </div>
            <div class="mb-2 col-md-12">
                <input type="submit" class="px-5 btn btn-primary btn-lg" value="Update">
                <input type="hidden" name="id" value="1">
            </div>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/admin/Settings/ReferralSettings/referral.blade.php ENDPATH**/ ?>