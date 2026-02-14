<?php $__env->startComponent('mail::message'); ?>
# Hello <?php echo e($user->name); ?>


Your loan request has been received and is currently under review.

### Loan Details:
- **Amount:** <?php echo e($settings->currency.number_format($loan->amount, 2)); ?>

- **Credit Facility:** <?php echo e($loan->credit_facility); ?>

- **Duration:** <?php echo e($loan->duration); ?> months
- **Purpose:** <?php echo e($loan->purpose); ?>


We will notify you once a decision has been made.

Thank you for choosing us!

<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/emails/loan_request.blade.php ENDPATH**/ ?>