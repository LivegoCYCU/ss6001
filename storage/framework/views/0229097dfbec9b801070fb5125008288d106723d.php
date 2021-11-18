

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title"><?php echo e(trans('sidebar.providers')); ?></h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('providers.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(trans("providers.create")); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col"><?php echo e(trans('providers.name')); ?></th>
                                <th scope="col"><?php echo e(trans('providers.company')); ?></th>
                                <th scope="col"><?php echo e(trans('providers.LINE')); ?></th>
                                <th scope="col"><?php echo e(trans('providers.email')); ?></th>
                                <th scope="col"><?php echo e(trans('providers.telephone')); ?></th>
                                <th scope="col"><?php echo e(trans('providers.order_amount')); ?></th>
                                <th scope="col"><?php echo e(trans('providers.receipt_amount')); ?></th>
                                <th scope="col"><?php echo e(trans('providers.description')); ?></th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($provider->name); ?></td>
                                        <td><?php echo e($provider->company); ?></td>
                                        <td><?php echo e($provider->LINE); ?></td>
                                        <td>
                                            <a href="mailto:<?php echo e($provider->email); ?>"><?php echo e($provider->email); ?></a>
                                        </td>
                                        <td><?php echo e($provider->phone); ?></td>
                                        <td><?php echo e(format_money(abs($provider->transactions->sum('amount')))); ?></td>
                                        <td><?php echo e(format_money(abs($provider->transactions->sum('amount')))); ?></td>
                                        <td><?php echo e($provider->description); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(route('providers.show', $provider)); ?>" class="btn btn-link"
                                                data-toggle="tooltip" data-placement="bottom"
                                                title="<?php echo e(trans('providers.more_details')); ?>">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="<?php echo e(route('providers.edit', $provider)); ?>" class="btn btn-link"
                                                data-toggle="tooltip" data-placement="bottom"
                                                title="<?php echo e(trans('providers.edit')); ?>">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('providers.destroy', $provider)); ?>" method="post"
                                                class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip"
                                                    data-placement="bottom" title="<?php echo e(trans('providers.delete')); ?>"
                                                    onclick="confirm('<?php echo e(trans('providers.delete_message')); ?>') ? this.parentElement.submit() : ''">
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
                        <?php echo e($providers->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => trans("sidebar.header.providers"), 'pageSlug' => 'providers', 'section' =>
'providers'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/providers/index.blade.php ENDPATH**/ ?>