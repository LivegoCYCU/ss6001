<?php if(session($key ?? 'error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo session($key ?? 'error'); ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/vagrant/code/inventory/resources/views/alerts/error.blade.php ENDPATH**/ ?>