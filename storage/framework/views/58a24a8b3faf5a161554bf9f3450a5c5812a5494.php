<?php if($errors->has($field)): ?>
    <span class="invalid-feedback" role="alert"><?php echo e($errors->first($field)); ?></span>
<?php endif; ?>
<?php /**PATH /home/vagrant/code/laravel-inventory/resources/views/alerts/feedback.blade.php ENDPATH**/ ?>