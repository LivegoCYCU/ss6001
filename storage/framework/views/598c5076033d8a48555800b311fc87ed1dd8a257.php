

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Statistics by Quantity (TOP 15)</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Annual Sales</th>
                            <th>Average Price</th>
                            <th>Annual Income</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $soldproductsbystock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soldproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><a href="<?php echo e(route('products.show', $soldproduct->product)); ?>"><?php echo e($soldproduct->product_id); ?></a></td>
                                    <td><a href="<?php echo e(route('categories.show', $soldproduct->product->category)); ?>"><?php echo e($soldproduct->product->category->name); ?></a></td>
                                    <td><?php echo e($soldproduct->product->name); ?></td>
                                    <td><?php echo e($soldproduct->product->stock); ?></td>
                                    <td><?php echo e($soldproduct->total_qty); ?></td>
                                    <td><?php echo e(format_money(round($soldproduct->avg_price, 2))); ?></td>
                                    <td><?php echo e(format_money($soldproduct->incomes)); ?></td>
                                    <td class="td-actions text-right">
                                        <a href="<?php echo e(route('products.show', $soldproduct->product)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="tim-icons icon-zoom-split"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <h4 class="card-title">Statistics by Income (TOP 15)</h4>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Sold</th>
                                <th>Income</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $soldproductsbyincomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soldproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($soldproduct->product_id); ?></td>
                                        <td><a href="<?php echo e(route('categories.show', $soldproduct->product->category)); ?>"><?php echo e($soldproduct->product->category->name); ?></a></td>
                                        <td><a href="<?php echo e(route('products.show', $soldproduct->product)); ?>"><?php echo e($soldproduct->product->name); ?></a></td>
                                        <td><?php echo e($soldproduct->total_qty); ?></td>
                                        <td><?php echo e(format_money($soldproduct->incomes)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <h4 class="card-title">Statistics by Average Price (TOP 15)</h4>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Sold</th>
                                <th>Average Price</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $soldproductsbyavgprice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soldproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($soldproduct->product_id); ?></td>
                                        <td><a href="<?php echo e(route('categories.show', $soldproduct->product->category)); ?>"><?php echo e($soldproduct->product->category->name); ?></a></td>
                                        <td><a href="<?php echo e(route('products.show', $soldproduct->product)); ?>"><?php echo e($soldproduct->product->name); ?></a></td>
                                        <td><?php echo e($soldproduct->total_qty); ?></td>
                                        <td><?php echo e(format_money(round($soldproduct->avg_price, 2))); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['page' => 'Inventory Statistics', 'pageSlug' => 'istats', 'section' => 'inventory'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/inventory/stats.blade.php ENDPATH**/ ?>