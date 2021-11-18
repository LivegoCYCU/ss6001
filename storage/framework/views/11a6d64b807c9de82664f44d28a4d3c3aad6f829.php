<div class="sidebar">
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li <?php if($pageSlug == 'dashboard'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('home')); ?>">
                    <i class="tim-icons icon-chart-bar-32"></i>
                    <p><?php echo e(trans('sidebar.dashboard')); ?></p>
                </a>
            </li>
            

            <li>
                <a data-toggle="collapse" href="#inventory" <?php echo e($section == 'inventory' ? 'aria-expanded=true' : ''); ?>>
                    <i class="tim-icons icon-app"></i>
                    <span class="nav-link-text"><?php echo e(trans('sidebar.inventory.inventory')); ?></span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse <?php echo e($section == 'inventory' ? 'show' : ''); ?>" id="inventory">
                    <ul class="nav pl-4">
                        <li <?php if($pageSlug == 'istats'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('inventory.stats')); ?>">
                                <i class="tim-icons icon-chart-pie-36"></i>
                                <p><?php echo e(trans('sidebar.inventory.statistics')); ?></p>
                            </a>
                        </li>
                        <li <?php if($pageSlug == 'products'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('products.index')); ?>">
                                <i class="tim-icons icon-notes"></i>
                                <p><?php echo e(trans('sidebar.inventory.products')); ?></p>
                            </a>
                        </li>
                        <li <?php if($pageSlug == 'categories'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('categories.index')); ?>">
                                <i class="tim-icons icon-tag"></i>
                                <p><?php echo e(trans('sidebar.inventory.categories')); ?></p>
                            </a>
                        </li>
                        <li <?php if($pageSlug == 'receipts'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('receipts.index')); ?>">
                                <i class="tim-icons icon-paper"></i>
                                <p><?php echo e(trans('sidebar.inventory.receipts')); ?></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li <?php if($pageSlug == 'clients'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('clients.index')); ?>">
                    <i class="tim-icons icon-single-02"></i>
                    <p><?php echo e(trans('sidebar.clients')); ?></p>
                </a>
            </li>

            <li <?php if($pageSlug == 'providers'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('providers.index')); ?>">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p><?php echo e(trans('sidebar.providers')); ?></p>
                </a>
            </li>

            


            <!-- <li>
                <a data-toggle="collapse" href="#clients">
                    <i class="tim-icons icon-single-02" ></i>
                    <span class="nav-link-text">Clients</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="clients">
                    <ul class="nav pl-4">
                        <li <?php if($pageSlug == 'clients-list'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('clients.index')); ?>">
                                <i class="tim-icons icon-notes"></i>
                                <p>Administrar Clients</p>
                            </a>
                        </li>
                        <li <?php if($pageSlug == 'clients-create'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('clients.create')); ?>">
                                <i class="tim-icons icon-simple-add"></i>
                                <p>New Client</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> -->


            <li>
                <a data-toggle="collapse" href="#users" <?php echo e($section == 'users' ? 'aria-expanded=true' : ''); ?>>
                    <i class="tim-icons icon-badge"></i>
                    <span class="nav-link-text"><?php echo e(trans('sidebar.users.users')); ?></span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse <?php echo e($section == 'users' ? 'aria-expanded=true' : ''); ?>" id="users">
                    <ul class="nav pl-4">
                        <li <?php if($pageSlug == 'profile'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('profile.edit')); ?>">
                                <i class="tim-icons icon-badge"></i>
                                <p><?php echo e(trans('sidebar.users.profile')); ?></p>
                            </a>
                        </li>
                        <li <?php if($pageSlug == 'users-list'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('users.index')); ?>">
                                <i class="tim-icons icon-notes"></i>
                                <p><?php echo e(trans('sidebar.users.management')); ?></p>
                            </a>
                        </li>
                        <li <?php if($pageSlug == 'users-create'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('users.create')); ?>">
                                <i class="tim-icons icon-simple-add"></i>
                                <p><?php echo e(trans('sidebar.users.add')); ?></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH /home/vagrant/code/inventory/resources/views/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>