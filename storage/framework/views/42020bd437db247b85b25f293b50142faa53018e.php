

<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt--7">
    <?php echo $__env->make('alerts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Register Sale</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('sales.index')); ?>" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('sales.store')); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>

                            <h6 class="heading-small text-muted mb-4">Customer information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('client_id') ? ' has-danger' : ''); ?>">
                                    <input type="hidden" name="user_id" value="<?php echo e(Auth::id()); ?>">
                                    <label class="form-control-label" for="input-name">Client</label>
                                    <select name="client_id" id="input-category" class="form-select form-control-alternative<?php echo e($errors->has('client') ? ' is-invalid' : ''); ?>" required>
                                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($client['id'] == old('client')): ?>
                                                <option value="<?php echo e($client['id']); ?>" selected><?php echo e($client['name']); ?> - <?php echo e($client['document_type'].$client['document_id']); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($client['id']); ?>"><?php echo e($client['name']); ?> - <?php echo e($client['document_type'].$client['document_id']); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'client_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <button type="submit" class="btn btn-success mt-4">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', ['page' => 'Register Sale', 'pageSlug' => 'sales-create', 'section' => 'transactions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/sales/create.blade.php ENDPATH**/ ?>