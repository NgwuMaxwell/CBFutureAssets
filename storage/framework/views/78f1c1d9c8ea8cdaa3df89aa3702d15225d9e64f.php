
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Referral Settings</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.referral.settings.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Level 1 Commission (%)</label>
                                        <input type="number" name="referral_commission" step="0.01" class="form-control" value="<?php echo e($settings->referral_commission); ?>" placeholder="5.00">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Level 2 Commission (%)</label>
                                        <input type="number" name="referral_commission1" step="0.01" class="form-control" value="<?php echo e($settings->referral_commission1); ?>" placeholder="2.00">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Level 3 Commission (%)</label>
                                        <input type="number" name="referral_commission2" step="0.01" class="form-control" value="<?php echo e($settings->referral_commission2); ?>" placeholder="1.00">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Level 4 Commission (%)</label>
                                        <input type="number" name="referral_commission3" step="0.01" class="form-control" value="<?php echo e($settings->referral_commission3); ?>" placeholder="0.50">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Level 5 Commission (%)</label>
                                        <input type="number" name="referral_commission4" step="0.01" class="form-control" value="<?php echo e($settings->referral_commission4); ?>" placeholder="0.25">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Level 6 Commission (%)</label>
                                        <input type="number" name="referral_commission5" step="0.01" class="form-control" value="<?php echo e($settings->referral_commission5); ?>" placeholder="0.10">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/admin/referral/settings.blade.php ENDPATH**/ ?>