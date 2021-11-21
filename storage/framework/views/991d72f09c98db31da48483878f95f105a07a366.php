

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title"><?php echo e(trans('client.client')); ?></h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('clients.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(trans('client.add')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th><?php echo e(trans('client.name')); ?></th>
                                <th><?php echo e(trans('client.email')); ?>/ <?php echo e(trans('client.telephone')); ?></th>
                                <th><?php echo e(trans('client.balance')); ?></th>
                                <th><?php echo e(trans('client.purchase')); ?></th>
                                <th><?php echo e(trans('client.total_payment')); ?></th>
                                <th><?php echo e(trans('client.last_purchase')); ?></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($client->name); ?><br><?php echo e($client->document_type); ?>-<?php echo e($client->document_id); ?></td>
                                        <td>
                                            <a href="mailto:<?php echo e($client->email); ?>"><?php echo e($client->email); ?></a>
                                            <br>
                                            <?php echo e($client->phone); ?>

                                        </td>
                                        <td>
                                            <?php if(round($client->balance) > 0): ?>
                                                <span class="text-success"><?php echo e(format_money($client->balance)); ?></span>
                                            <?php elseif(round($client->balance) < 0.00): ?>
                                                <span class="text-danger"><?php echo e(format_money($client->balance)); ?></span>
                                            <?php else: ?>
                                                <?php echo e(format_money($client->balance)); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($client->sales->count()); ?></td>
                                        <td><?php echo e(format_money($client->transactions->sum('amount'))); ?></td>
                                        <td><?php echo e(($client->sales->sortByDesc('created_at')->first()) ? date('d-m-y', strtotime($client->sales->sortByDesc('created_at')->first()->created_at)) : 'N/A'); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(route('clients.show', $client)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('button.detail')); ?>">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="<?php echo e(route('clients.edit', $client)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('button.edit')); ?>">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('clients.destroy', $client)); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('button.delete')); ?>" onclick="confirm('<?php echo e(trans("client.delete_msg")); ?>') ? this.parentElement.submit() : ''">
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
                        <?php echo e($clients->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => trans('client.client'), 'pageSlug' => 'clients', 'section' => 'clients'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/clients/index.blade.php ENDPATH**/ ?>