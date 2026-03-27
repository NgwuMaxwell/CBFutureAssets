
<?php $__env->startComponent('mail::message'); ?>

# Hello <?php echo e($foramin  ? 'Admin' : $user->username); ?>

<?php if($foramin): ?>
This is to inform you that you <?php echo e($user->name); ?> have made a withdrawal request of <?php echo e($settings->currency.$withdrawal->amount); ?>, kindly login to your account to review and take neccesary action.
<?php else: ?>
<?php if($withdrawal->status == 'Processed'): ?>
Your withdrawal request has been **approved and processed** successfully.

## Withdrawal Details:
- **Amount:** <?php echo e($settings->currency.$withdrawal->amount); ?>

- **Payment Method:** <?php echo e($withdrawal->payment_mode); ?>

- **Status:** Processed

You should receive your funds shortly.

If you have any questions, feel free to contact our support team.

<?php else: ?>
Your withdrawal request has been submitted successfully.

## Details:
- **Amount:** <?php echo e($settings->currency.$withdrawal->amount); ?>

- **Payment Method:** <?php echo e($withdrawal->payment_mode); ?>

- **Status:** <?php echo e($withdrawal->status); ?>


We will process your request shortly.
<?php endif; ?>    
<?php endif; ?>
Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>


<?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/emails/withdrawal-status.blade.php ENDPATH**/ ?>