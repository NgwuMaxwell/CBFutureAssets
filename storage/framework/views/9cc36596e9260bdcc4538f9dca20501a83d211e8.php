
<?php $__env->startComponent('mail::message'); ?>
# <?php echo e($salutaion ? $salutaion : "Hello"); ?> <?php echo e($recipient); ?>,

<?php if($attachment != null): ?>
    <img src="<?php echo e($message->embed(asset('storage/'. $attachment))); ?>">
<?php endif; ?>
<?php echo $body; ?>


Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>

<?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/emails/NewNotification.blade.php ENDPATH**/ ?>