

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title"><?php echo e(trans('user.users')); ?></h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(trans('button.add')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col"><?php echo e(trans('user.name')); ?></th>
                                <th scope="col"><?php echo e(trans('user.email')); ?></th>
                                <th scope="col"><?php echo e(trans('user.creation_date')); ?></th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($user->name); ?></td>
                                        <td>
                                            <a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a>
                                        </td>
                                        <td><?php echo e($user->created_at->format('d/m/Y H:i')); ?></td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="tim-icons icon-settings-gear-63"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <?php if(auth()->user()->id != $user->id): ?>
                                                            <form action="<?php echo e(route('users.destroy', $user)); ?>" method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('delete'); ?>

                                                                <a class="dropdown-item" href="<?php echo e(route('users.edit', $user)); ?>"><?php echo e(trans('button.edit')); ?></a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('<?php echo e(__('Are you sure you want to delete this user?')); ?>') ? this.parentElement.submit() : ''">
                                                                            <?php echo e(trans('button.delete')); ?>

                                                                </button>
                                                            </form>
                                                        <?php else: ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('profile.edit', $user->id)); ?>"><?php echo e(trans('button.edit')); ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        <?php echo e($users->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => trans('sidebar.header.user_management'), 'pageSlug' => 'users', 'section' => 'users'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/users/index.blade.php ENDPATH**/ ?>