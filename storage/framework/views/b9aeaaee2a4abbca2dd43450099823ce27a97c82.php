
                    <div class="table-responsive">
<table class="table table-light table-hover text-dark">
    <thead class="thead-light text-dark">
        <tr>
            <th>#</th>
                                <th><b>Asset</b></th>
                                <th><b>Action</b></th>
                                <th><b>Amount</b></th>
                                <th><b>Leverage</b></th>
                                <th><b>Status</b></th>
                                <th><b>Result</b></th>
                                <th><b>Profit/Loss</b></th>
                                <th><b>Opened At</b></th>
                                <th><b>Expires At</b></th>
                                <th><b>Time Left</b></th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr data-trade-id="<?php echo e($trade->id); ?>">
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($trade->asset_name); ?></td>
                <td class="text-uppercase"><?php echo e(ucfirst($trade->action)); ?></td>
                <td>$<?php echo e(number_format($trade->amount, 2)); ?></td>
                <td><?php echo e($trade->leverage); ?>x</td>
                <td class="trade-status">
                    <span class="badge <?php echo e($trade->status == 'open' ? 'badge-primary' : 'badge-secondary'); ?>">
                        <?php echo e(ucfirst($trade->status)); ?>

                    </span>
                </td>
                <td class="trade-result">
                    <?php if($trade->result == 'PENDING'): ?>
                        <span class="badge bg-warning text-dark">PENDING</span>
                    <?php else: ?>
                        <span class="badge <?php echo e($trade->result == 'WIN' ? 'bg-success' : 'bg-danger'); ?>">
                            <?php echo e($trade->result); ?>

                        </span>
                    <?php endif; ?>
                </td>
                <td class="trade-profit">
                    <?php if($trade->profit_loss !== null): ?>
                        <span class="<?php echo e($trade->profit_loss >= 0 ? 'text-success' : 'text-danger'); ?>">
                            <?php echo e($trade->profit_loss >= 0 ? '+' : '-'); ?>$<?php echo e(number_format(abs($trade->profit_loss), 2)); ?>

                        </span>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td><?php echo e(\Carbon\Carbon::parse($trade->created_at)->format('Y-m-d H:i')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($trade->expires_at)->format('Y-m-d H:i')); ?></td>
                <td class="countdown-timer font-weight-bold text-danger" data-expiry="<?php echo e(\Carbon\Carbon::parse($trade->expires_at)->timestamp); ?>"></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="11" class="text-center text-muted">No trades found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</div>


<?php $__env->stopSection(); ?>
<?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/user/trades/partials/history_table.blade.php ENDPATH**/ ?>