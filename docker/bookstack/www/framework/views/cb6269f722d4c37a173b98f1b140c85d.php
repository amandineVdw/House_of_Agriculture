
<?php $__currentLoopData = array_intersect_key(request()->query(), array_flip($params)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($value): ?>
    <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>">
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /app/www/resources/views/form/request-query-inputs.blade.php ENDPATH**/ ?>