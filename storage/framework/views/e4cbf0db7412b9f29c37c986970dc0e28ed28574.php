
<?php $__env->startComponent('mail::message'); ?>
# Hello <?php echo e($foramin  ? 'Admin' : $user->username); ?>

<?php if($foramin): ?>
 This is to inform you of a successfull Deposit of <?php echo e($settings->currency.$deposit->amount); ?> from <?php echo e($user->name); ?>. <?php echo e($deposit->status == "Processed" ? '' : ' Please login to process it.'); ?>

<?php else: ?>
<?php if($deposit->status == 'Processed'): ?>
Your deposit of **<?php echo e($settings->currency.$deposit->amount); ?>** has been successfully **processed and confirmed**.

## **Deposit Details**
- **Amount:** <?php echo e($settings->currency.$deposit->amount); ?>

- **Payment Method:** <?php echo e($deposit->payment_mode); ?>

- **Status:** ✅ Confirmed
- **Account Balance:** <?php echo e($settings->currency.$user->account_bal); ?>


You can now use these funds for transactions.


<?php else: ?>
Your deposit request has been received successfully. We will process it shortly.

## Deposit Details:
- **Amount:** <?php echo e($settings->currency.$deposit->amount); ?>

- **Payment Method:** <?php echo e($deposit->payment_mode); ?>

- **Status:** Pending

You will receive a confirmation once it's approved.
<?php endif; ?>
<?php endif; ?>
Thank you for using **<?php echo e(config('app.name')); ?>**.
<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>

<?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/emails/success-deposit.blade.php ENDPATH**/ ?>