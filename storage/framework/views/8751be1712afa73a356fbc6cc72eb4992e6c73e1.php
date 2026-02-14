<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="title1 ">Update Plan</h1>
                    </div>
                    <div>
                        <a href="<?php echo e(route('plans')); ?>" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i>
                            Back</a>
                    </div>
                </div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <div class="mb-5 row">
                    <div class="col-lg-12 ">
                        <div class="p-3 card ">
                            <form role="form" method="post" action="<?php echo e(route('updateplan')); ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <h5 class="">Plan Name</h5>
                                        <input class="form-control  " value="<?php echo e($plan->name); ?>"
                                            placeholder="Enter Plan name" type="text" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="">Plan price(<?php echo e($settings->currency); ?>)</h5>
                                        <input class="form-control  " value="<?php echo e($plan->price); ?>"
                                            placeholder="Enter Plan price" type="number" name="price" required>
                                        <small class="">This is the maximum amount a user can pay
                                            to invest in this plan</small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="">Plan Minimum Price
                                            (<?php echo e($settings->currency); ?>)</h5>
                                        <input placeholder="Enter Plan minimum price" value="<?php echo e($plan->min_price); ?>"
                                            class="form-control  " type="number" step="any" name="min_price" required>
                                        <small class="">This is the minimum amount a user can pay
                                            to invest in this plan</small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="">Plan Maximum Price
                                            (<?php echo e($settings->currency); ?>)</h5>
                                        <input class="form-control  " value="<?php echo e($plan->max_price); ?>"
                                            placeholder="Enter Plan maximum price" type="number" step="any"
                                            name="max_price" required>
                                        <small class="">Same as plan price</small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="">Minimum return (%)</h5>
                                        <input class="form-control  " value="<?php echo e($plan->minr); ?>"
                                            placeholder="Enter minimum return" type="number" step="any" name="minr"
                                            required>
                                        <small class="">This is the minimum return (ROI) for this
                                            plan</small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="">Maximum return (%)</h5>
                                        <input class="form-control  " value="<?php echo e($plan->maxr); ?>"
                                            placeholder="Enter maximum return" type="number" step="any" name="maxr"
                                            required>
                                        <small class="">This is the Maximum return (ROI) for this
                                            plan</small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="">Gift Bonus (<?php echo e($settings->currency); ?>)</h5>
                                        <input class="form-control  " value="<?php echo e($plan->gift); ?>"
                                            placeholder="Enter Additional Gift Bonus" type="number" step="any"
                                            name="gift" value="0" required>
                                        <small class="">Optional Bonus if a user buys this plan.
                                        </small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="">Plan Tag</h5>
                                        <input class="form-control" placeholder="Enter Plan Tag" type="text"
                                            step="any" name="tag"  value='<?php echo e($plan->tag ?? ''); ?>' >
                                        <small class="">Optional Plan tag. This is  tags for each plan eg 'Popular' , 'VIP' etc
                                          </small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="">Top up Interval</h5>
                                        <select class="form-control  " name="t_interval">
                                            <option><?php echo e($plan->increment_interval); ?></option>
                                            <option>Monthly</option>
                                            <option>Weekly</option>
                                            <option>Daily</option>
                                            <option>Hourly</option>
                                            <option>Every 30 Minutes</option>
                                            <option>Every 10 Minutes</option>
                                        </select>
                                        <small class="">This specifies how often the system should
                                            add profit(ROI) to user account.</small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="">Top up Type</h5>
                                        <select class="form-control  " name="t_type">
                                            <option><?php echo e($plan->increment_type); ?></option>
                                            <option>Percentage</option>
                                            <option>Fixed</option>
                                        </select>
                                        <small class="">This specifies if the system should add
                                            profit in percentage(%) or a fixed amount.</small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="">Top up Amount (in % or
                                            <?php echo e($settings->currency); ?> as specified above)</h5>
                                        <input class="form-control  " value="<?php echo e($plan->increment_amount); ?>"
                                            placeholder="top up amount" type="number" step="any" name="t_amount"
                                            required>
                                        <small class="">This is the amount the system will add to
                                            users account as profit, based on what you selected in topup type and topup
                                            interval above. </small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="">Investment Duration</h5>
                                        <input class="form-control  "value="<?php echo e($plan->expiration); ?>"
                                            placeholder="eg 1 Days, 2 Weeks, 1 Months" type="text" name="expiration"
                                            required>
                                        <small class="">This specifies how long the investment plan
                                            will run. Please strictly follow the guide on <a href=""
                                                data-toggle="modal" data-target="#durationModal">how to setup investment
                                                duration</a> else it may not work. </small>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="id" value="<?php echo e($plan->id); ?>">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="submit" class="btn btn-primary" value="Update Plan">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="durationModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body ">
                        <h5 class="">FIRSTLY, Always preceed the time frame with a digit, that is
                            do not write the number in letters, <br> <br> SECONDLY, always add space after the number, <br>
                            <br> LASTLY, the first letter of the timeframe should be in CAPS and always add 's' to the
                            timeframe even if your duration is just a day, month or year.
                        </h5>
                        <h2 class="">Eg, 1 Days, 3 Weeks, 1 Hours, 48 Hours, 4 Months, 1 Years, 9
                            Months</h2>

                    </div>
                </div>
            </div>
        </div>
        <div id="topupModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body ">

                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/admin/Plans/editplan.blade.php ENDPATH**/ ?>