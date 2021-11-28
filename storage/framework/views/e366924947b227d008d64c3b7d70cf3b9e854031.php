

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title"><?php echo e(trans('inventory.product')); ?></h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('products.create')); ?>"
                                class="btn btn-sm btn-primary"><?php echo e(trans('inventory.new_product')); ?></a>
                            <a href="<?php echo e(route('products.create_shopee')); ?>"
                                class="btn btn-sm btn-primary"><?php echo e(trans('inventory.new_shopee_product')); ?></a>
                        </div>
                    </div>

                    <form method="get" action="<?php echo e(route('products.store')); ?>" class="form-inline row" autocomplete="off">
                        <select class="custom-select text-dark m-2" name="category">
                            <option selected value="null" class="d-none">
                                <?php echo e(trans('button.choese') . trans('inventory.product') . trans('inventory.category')); ?>

                            </option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($request->get('category')  == $category->id): ?>
                                    <option selected value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <input class="form-control m-2" name="name" type="text"
                            placeholder="<?php echo e(trans('button.type') . trans('inventory.product')); ?>"
                            value="<?php echo e($request->get('name')); ?>">
                        <button type="submit" class="btn btn-primary mb-2"><?php echo e(trans('button.search')); ?></button>
                    </form>

                </div>
                <div class="card-body">
                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col"><?php echo e(trans('inventory.category')); ?></th>
                                <th scope="col"><?php echo e(trans('inventory.product')); ?></th>
                                <th scope="col"><?php echo e(trans('inventory.price')); ?></th>
                                <th scope="col"><?php echo e(trans('inventory.cost')); ?></th>
                                <th scope="col"><?php echo e(trans('inventory.stock')); ?></th>
                                <th scope="col"><?php echo e(trans('inventory.faulty')); ?></th>
                                <th scope="col"><?php echo e(trans('inventory.total_sold')); ?></th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><a
                                                href="<?php echo e(route('categories.show', $product->category)); ?>"><?php echo e($product->category->name); ?></a>
                                        </td>
                                        <td><?php echo e($product->name); ?></td>
                                        <td><?php echo e(format_money($product->price)); ?></td>
                                        <td><?php echo e(format_money($product->cost)); ?></td>
                                        <td><?php echo e($product->stock); ?></td>
                                        <td><?php echo e($product->stock_defective); ?></td>
                                        <td><?php echo e($product->solds->sum('qty')); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(route('products.show', $product)); ?>" class="btn btn-link"
                                                data-toggle="tooltip" data-placement="bottom"
                                                title="<?php echo e(trans('inventory.more')); ?>">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-link"
                                                data-toggle="tooltip" data-placement="bottom"
                                                title="<?php echo e(trans('inventory.edit')); ?>">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('products.destroy', $product)); ?>" method="post"
                                                class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip"
                                                    data-placement="bottom" title="<?php echo e(trans('inventory.delete')); ?>"
                                                    onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
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
                    <nav class="d-flex justify-content-end">
                        <?php echo e($products->appends(request()->input())->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => trans('sidebar.header.list_of_products'), 'pageSlug' => 'products', 'section' =>
'inventory'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/inventory/products/index.blade.php ENDPATH**/ ?>