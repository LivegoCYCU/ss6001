

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title"><?php echo e(trans('category.categories')); ?></h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(trans('category.new')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col"><?php echo e(trans('category.name')); ?></th>
                                <th scope="col"><?php echo e(trans('category.products')); ?></th>
                                <th scope="col"><?php echo e(trans('category.total_stock')); ?></th>
                                <th scope="col"><?php echo e(trans('category.defective_stock')); ?></th>
                                <th scope="col"><?php echo e(trans('category.average_price')); ?></th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($category->name); ?></td>
                                        <td><?php echo e(count($category->products)); ?></td>
                                        <td><?php echo e($category->products->sum('stock')); ?></td>
                                        <td><?php echo e($category->products->sum('stock_defective')); ?></td>
                                        <td><?php echo e(format_money($category->products->avg('price'))); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(route('categories.show', $category)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('button.detail')); ?>">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="<?php echo e(route('categories.edit', $category)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('button.edit')); ?>">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('categories.destroy', $category)); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('button.delete')); ?>" onclick="confirm('<?php echo e(trans('category.delete_msg')); ?>') ? this.parentElement.submit() : ''">
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
                    <nav class="d-flex justify-content-end" aria-label="...">
                        <?php echo e($categories->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => trans('category.title'), 'pageSlug' => 'categories', 'section' => 'inventory'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/inventory/resources/views/inventory/categories/index.blade.php ENDPATH**/ ?>