

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title"><?php echo e(trans('sidebar.sales')); ?></h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('sales.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(trans('button.add')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table">
                            <thead>
                                <th><?php echo e(trans('sales.date')); ?></th>
                                <th><?php echo e(trans('sales.client')); ?></th>
                                <th><?php echo e(trans('sales.user')); ?></th>
                                <th><?php echo e(trans('sales.products')); ?></th>
                                <th><?php echo e(trans('sales.total_stock')); ?></th>
                                <th><?php echo e(trans('sales.total_amount')); ?></th>
                                <th><?php echo e(trans('sales.status')); ?></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(date('d-m-y', strtotime($sale->created_at))); ?></td>
                                        <td><a href="<?php echo e(route('clients.show', $sale->client)); ?>"><?php echo e($sale->client->name); ?><br><?php echo e($sale->client->document_type); ?>-<?php echo e($sale->client->document_id); ?></a></td>
                                        <td><?php echo e($sale->user->name); ?></td>
                                        <td><?php echo e($sale->products->count()); ?></td>
                                        <td><?php echo e($sale->products->sum('qty')); ?></td>
                                        <td><?php echo e(format_money($sale->transactions->sum('amount'))); ?></td>
                                        <td>
                                            <?php if(!$sale->finalized_at): ?>
                                                <span class="text-danger"><?php echo e(trans('auth.to_finalize')); ?></span>
                                            <?php else: ?>
                                                <span class="text-success"><?php echo e(trans('auth.finalize')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="td-actions text-right">
                                            <?php if(!$sale->finalized_at): ?>
                                                <a href="<?php echo e(route('sales.show', ['sale' => $sale])); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('button.edit')); ?>">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('sales.show', ['sale' => $sale])); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('button.show')); ?>">
                                                    <i class="tim-icons icon-zoom-split"></i>
                                                </a>
                                            <?php endif; ?>
                                            <form action="<?php echo e(route('sales.destroy', $sale)); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('button.delete')); ?>" onclick="confirm('Are you sure you want to delete this sale? All your records will be permanently deleted.') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        <?php echo e($sales->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => trans('sidebar.sales'), 'pageSlug' => 'sales', 'section' => 'transactions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/sales/index.blade.php ENDPATH**/ ?>