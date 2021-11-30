

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title"><?php echo e(trans("method.title")); ?></h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('methods.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(trans("button.add")); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col"><?php echo e(trans("method.method")); ?></th>
                                <th scope="col"><?php echo e(trans("method.description")); ?></th>
                                <th scope="col"><?php echo e(trans("method.monthly_transactions")); ?></th>
                                <th scope="col"><?php echo e(trans("method.monthly_balance")); ?> </th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($method->name); ?></td>
                                        <td><?php echo e($method->description); ?></td>
                                        <td><?php echo e($method->transactions->count()); ?></td>
                                        <td><?php echo e(format_money($method->transactions->sum('amount'))); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(route('methods.show', $method)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans("button.detail")); ?>">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="<?php echo e(route('methods.edit', $method)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans("button.edit")); ?>">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('methods.destroy', $method)); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans("button.delete")); ?>" onclick="confirm( '<?php echo e(trans('method.delete_msg')); ?>' ) ? this.parentElement.submit() : ''">
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
                        <?php echo e($methods->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' =>  trans('sidebar.header.methods'), 'pageSlug' => 'methods', 'section' => 'methods'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/methods/index.blade.php ENDPATH**/ ?>