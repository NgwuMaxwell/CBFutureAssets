<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
} else {
    $text = 'light';
}
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Create New NFTS</h1>
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
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-alert','data' => []]); ?>
<?php $component->withName('error-alert'); ?>
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
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">




                                <div class="container">
                                    <h2>Edit Signal</h2>
                                    <!-- edit.blade.php -->

<form action="<?php echo e(route('signal.update', $signal->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="form-group">
        <label for="name">Signal Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo e($signal->name); ?>" required>
    </div>

    <div class="form-group">
        <label for="entry_price">Entry Price</label>
        <input type="number" class="form-control" name="entry_price" value="<?php echo e($signal->entry_price); ?>" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="take_profit">Take Profit</label>
        <input type="number" class="form-control" name="take_profit" value="<?php echo e($signal->take_profit); ?>" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="stop_loss">Stop Loss</label>
        <input type="number" class="form-control" name="stop_loss" value="<?php echo e($signal->stop_loss); ?>" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="leverage">Leverage</label>
        <input type="number" class="form-control" name="leverage" value="<?php echo e($signal->leverage); ?>" required>
    </div>
    <div class="form-group mb-3">
    <label for="status">Status</label>
    <select class="form-control" name="status" required>
        <option value="active" <?php echo e($signal->status == 'active' ? 'selected' : ''); ?>>Active</option>
        <option value="closed" <?php echo e($signal->status == 'closed' ? 'selected' : ''); ?>>Expired</option>
    </select>
</div>

    <input type="hidden" class="form-control" name="id" value="<?php echo e($signal->id); ?>" required>
    <button type="submit" class="btn btn-success">Update Signal</button>
</form>

                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/admin/signals/edit.blade.php ENDPATH**/ ?>