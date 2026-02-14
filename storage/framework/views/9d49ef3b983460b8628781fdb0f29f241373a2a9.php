
<?php $__env->startComponent('mail::message'); ?>
# Hello <?php echo e($user->username); ?>,

Your trade has been successfully executed.

## Trade Details

- **Asset:** <?php echo e($trade->asset_name); ?>

- **Type:** <?php echo e(ucfirst($trade->asset_type)); ?>

- **Action:** <?php echo e(ucfirst($trade->action)); ?>

- **Leverage:** <?php echo e($trade->leverage); ?>x
- **Take Profit:** <?php echo e($settings->currency); ?><?php echo e($trade->take_profit); ?>

- **Stop Loss:** <?php echo e($settings->currency); ?><?php echo e($trade->stop_loss); ?>

- **Amount:** <?php echo e($settings->currency); ?><?php echo e(number_format($trade->amount, 2)); ?>


You can view your trade history anytime in your account.

Thanks,  
**<?php echo e(config('app.name')); ?>**
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/emails/trade_executed.blade.php ENDPATH**/ ?>