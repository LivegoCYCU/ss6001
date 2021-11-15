

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-7 ml-auto mr-auto">
            <div class="card card-register card-white">
                <div class="card-header">
                    <img class="card-img" src="<?php echo e(asset('assets')); ?>/img/card-primary.png" alt="Card image">
                    <h4 class="card-title">Register</h4>
                </div>
                <form class="form" method="post" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="card-body">
                        <div class="input-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="name" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="Name" value="<?php echo e(old('name')); ?>">
                            <?php echo $__env->make('alerts.feedback', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="input-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Email" value="<?php echo e(old('email')); ?>">
                            <?php echo $__env->make('alerts.feedback', ['field' => 'email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="input-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Password">
                            <?php echo $__env->make('alerts.feedback', ['field' => 'password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat Password">
                        </div>
                        <div class="form-check text-left <?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                            <label class="form-check-label">
                                <input class="form-check-input <?php echo e($errors->has('agree_terms_and_conditions') ? ' is-invalid' : ''); ?>" name="agree_terms_and_conditions"  type="checkbox"  <?php echo e(old('agree_terms_and_conditions') ? 'checked' : ''); ?>>
                                <span class="form-check-sign"></span>
                                I confirm that I am human.
                                <?php echo $__env->make('alerts.feedback', ['field' => 'agree_terms_and_conditions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['class' => 'register-page', 'page' => 'Laravel Inventory', 'contentClass' => 'register-page', 'section' => 'auth'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/auth/register.blade.php ENDPATH**/ ?>