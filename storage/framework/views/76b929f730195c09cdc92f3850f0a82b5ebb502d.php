

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Transactions</h4>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#transactionModal">
                                New Transaction
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>Date</th>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Method</th>
                                <th>Amount</th>
                                <th>Reference</th>
                                <th>Client</th>
                                <th>Provider</th>
                                <th>Transfer</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(date('d-m-y', strtotime($transaction->created_at))); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('transactions.type', ['type' => $transaction->type])); ?>"><?php echo e($transactionname[$transaction->type]); ?></a>
                                        </td>
                                        <td style="max-width:150px"><?php echo e($transaction->title); ?></td>
                                        <td><a href="<?php echo e(route('methods.show', $transaction->method)); ?>"><?php echo e($transaction->method->name); ?></a></td>
                                        <td><?php echo e(format_money($transaction->amount)); ?></td>
                                        <td><?php echo e($transaction->reference); ?></td>
                                        <td>
                                            <?php if($transaction->client): ?>
                                                <a href="<?php echo e(route('clients.show', $transaction->client)); ?>"><?php echo e($transaction->client->name); ?><br><?php echo e($transaction->client->document_type); ?>-<?php echo e($transaction->client->document_id); ?></a>
                                            <?php else: ?>
                                                Does not apply
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transaction->provider): ?>
                                                <a href="<?php echo e(route('providers.show', $transaction->provider)); ?>"><?php echo e($transaction->provider->name); ?></a>
                                            <?php else: ?>
                                                Does not apply
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transaction->transfer): ?>
                                                <a href="<?php echo e(route('transfer.show', $transaction->transfer)); ?>">ID <?php echo e($transaction->transfer->id); ?></a>
                                            <?php else: ?>
                                                Does not apply
                                            <?php endif; ?>
                                        </td>
                                        <td class="td-actions text-right">
                                            <?php if($transaction->sale_id): ?>
                                                <a href="<?php echo e(route('sales.show', $transaction->sale)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More details">
                                                    <i class="tim-icons icon-zoom-split"></i>
                                                </a>
                                            <?php elseif($transaction->transfer_id): ?>
                                                <a href="<?php echo e(route('transfer.show', $transaction->transfer)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More details">
                                                    <i class="tim-icons icon-zoom-split"></i>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('transactions.edit', $transaction)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Transaction">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </a>
                                                <form action="<?php echo e(route('transactions.destroy', $transaction)); ?>" method="post" class="d-inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Transaction" onclick="confirm('Are you sure you want to delete this transaction?') ? this.parentElement.submit() : ''">
                                                        <i class="tim-icons icon-simple-remove"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        <?php echo e($transactions->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(route('transactions.create', ['type' => 'payment'])); ?>" class="btn btn-sm btn-primary">Payment</a>
                        <a href="<?php echo e(route('transactions.create', ['type' => 'income'])); ?>" class="btn btn-sm btn-primary">Income</a>
                        <a href="<?php echo e(route('transactions.create', ['type' => 'expense'])); ?>" class="btn btn-sm btn-primary">Expense</a>
                        <a href="<?php echo e(route('sales.create')); ?>" class="btn btn-sm btn-primary">Sale</a>
                        <a href="<?php echo e(route('transfer.create')); ?>" class="btn btn-sm btn-primary">Transfer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => 'Transactions', 'pageSlug' => 'transactions', 'section' => 'transactions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/transactions/index.blade.php ENDPATH**/ ?>