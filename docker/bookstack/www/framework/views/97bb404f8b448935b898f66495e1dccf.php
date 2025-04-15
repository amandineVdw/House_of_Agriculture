<?php
    $selectedSort = (isset($sort) && array_key_exists($sort, $options)) ? $sort : array_keys($options)[0];
    $order = (isset($order) && in_array($order, ['asc', 'desc'])) ? $order : 'asc';
?>
<div component="list-sort-control" class="list-sort-container">
    <div class="list-sort-label"><?php echo e(trans('common.sort')); ?></div>
    <form refs="list-sort-control@form"
          <?php if($useQuery ?? false): ?>
              action="<?php echo e(url()->current()); ?>"
              method="get"
          <?php else: ?>
              action="<?php echo e(url("/preferences/change-sort/{$type}")); ?>"
              method="post"
          <?php endif; ?>
    >
        <input type="hidden" name="_return" value="<?php echo e(url()->current()); ?>">

        <?php if($useQuery ?? false): ?>
            <?php $__currentLoopData = array_filter(request()->except(['sort', 'order'])); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo method_field('PATCH'); ?>

            <?php echo csrf_field(); ?>

        <?php endif; ?>

        <input refs="list-sort-control@sort" type="hidden" value="<?php echo e($selectedSort); ?>" name="sort">
        <input refs="list-sort-control@order" type="hidden" value="<?php echo e($order); ?>" name="order">

        <div class="list-sort">
            <div component="dropdown" class="list-sort-type dropdown-container">
                <div refs="dropdown@toggle" aria-haspopup="true" aria-expanded="false" aria-label="<?php echo e(trans('common.sort_options')); ?>" tabindex="0"><?php echo e($options[$selectedSort]); ?></div>
                <ul refs="dropdown@menu list-sort-control@menu" class="dropdown-menu">
                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li <?php if($key === $selectedSort): ?> class="active" <?php endif; ?>><a href="#" data-sort-value="<?php echo e($key); ?>" class="text-item"><?php echo e($label); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <button class="list-sort-dir" type="button" data-sort-dir
                    aria-label="<?php echo e(trans('common.sort_direction_toggle')); ?> - <?php echo e($order === 'asc' ? trans('common.sort_ascending') : trans('common.sort_descending')); ?>" tabindex="0">
                <?php echo (new \BookStack\Util\SvgIcon($order === 'desc' ? 'sort-up' : 'sort-down'))->toHtml(); ?>
            </button>
        </div>
    </form>
</div><?php /**PATH /app/www/resources/views/common/sort.blade.php ENDPATH**/ ?>