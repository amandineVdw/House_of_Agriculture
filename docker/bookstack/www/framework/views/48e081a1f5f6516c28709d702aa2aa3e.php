
<div class="form-group entity-selector-container">
    <div component="entity-selector"
         refs="entity-selector-popup@selector"
         class="entity-selector <?php echo e($selectorSize ?? ''); ?>"
         option:entity-selector:entity-types="<?php echo e($entityTypes ?? 'book,chapter,page'); ?>"
         option:entity-selector:entity-permission="<?php echo e($entityPermission ?? 'view'); ?>"
         option:entity-selector:search-endpoint="<?php echo e($selectorEndpoint ?? '/search/entity-selector'); ?>">
        <input refs="entity-selector@input" type="hidden" name="<?php echo e($name); ?>" value="">
        <input refs="entity-selector@search" type="text" placeholder="<?php echo e(trans('common.search')); ?>" <?php if($autofocus ?? false): ?> autofocus <?php endif; ?>>
        <div class="text-center loading" refs="entity-selector@loading"><?php echo $__env->make('common.loading-icon', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></div>
        <div refs="entity-selector@results"></div>
    </div>
</div><?php /**PATH /app/www/resources/views/entities/selector.blade.php ENDPATH**/ ?>