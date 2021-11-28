

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title"><?php echo e(trans('user.edit_title')); ?></h5>
                </div>
                <form method="post" action="<?php echo e(route('profile.update')); ?>" autocomplete="off">
                    <div class="card-body">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>

                            <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                <label><?php echo e(trans('user.name')); ?></label>
                                <input type="text" name="name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="Name" value="<?php echo e(old('name', auth()->user()->name)); ?>">
                                <?php echo $__env->make('alerts.feedback', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                                <label><?php echo e(trans('user.email')); ?></label>
                                <input type="email" name="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Email" value="<?php echo e(old('email', auth()->user()->email)); ?>">
                                <?php echo $__env->make('alerts.feedback', ['field' => 'email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary"><?php echo e(trans('button.save')); ?></button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="title"><?php echo e(trans('user.password')); ?></h5>
                </div>
                <form method="post" action="<?php echo e(route('profile.password')); ?>" autocomplete="off">
                    <div class="card-body">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>

                        <?php echo $__env->make('alerts.success', ['key' => 'password_status'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="form-group<?php echo e($errors->has('old_password') ? ' has-danger' : ''); ?>">
                            <label><?php echo e(trans('user.current_password')); ?></label>
                            <input type="password" name="old_password" class="form-control<?php echo e($errors->has('old_password') ? ' is-invalid' : ''); ?>" placeholder="Current password" value="" required>
                            <?php echo $__env->make('alerts.feedback', ['field' => 'old_password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                            <label><?php echo e(trans('user.new_password')); ?></label>
                            <input type="password" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="New password" value="" required>
                            <?php echo $__env->make('alerts.feedback', ['field' => 'password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('user.confirm_password')); ?></label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password" value="" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary"><?php echo e(trans('user.change_password')); ?></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <img class="avatar" src="<?php echo e(asset('assets/img/emilyz.jpg')); ?>" alt="">
                                <h5 class="title"><?php echo e(auth()->user()->name); ?></h5>
                            </a>
                            <p class="description"></p>
                        </div>
                    </p>
                    <div class="card-description"></div>
                </div>
                
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => trans('sidebar.header.user_profile'), 'pageSlug' => 'profile', 'section' => 'users'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/profile/edit.blade.php ENDPATH**/ ?>