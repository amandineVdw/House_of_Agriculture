<?php if($warning ?? ''): ?>
    <div class="image-manager-list-warning image-manager-warning px-m py-xs flex-container-row gap-xs items-center">
        <div><?php echo (new \BookStack\Util\SvgIcon('warning'))->toHtml(); ?></div>
        <div class="flex"><?php echo e($warning); ?></div>
    </div>
<?php endif; ?>
<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div>
    <button component="event-emit-select"
         option:event-emit-select:name="image"
         option:event-emit-select:data="<?php echo e(json_encode($image)); ?>"
         class="image anim fadeIn text-link"
         style="animation-delay: <?php echo e(min($index * 10, 260) . 'ms'); ?>;">
        <img src="<?php echo e($image->thumbs['gallery'] ?? ''); ?>"
             alt="<?php echo e($image->name); ?>"
             role="none"
             width="150"
             height="150"
             loading="lazy">
        <div class="image-meta">
            <span class="name"><?php echo e($image->name); ?></span>
            <span class="date"><?php echo e(trans('components.image_uploaded', ['uploadedDate' => $image->created_at->format('Y-m-d')])); ?></span>
        </div>
    </button>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(count($images) === 0): ?>
    <p class="m-m text-bigger italic text-muted"><?php echo e(trans('common.no_items')); ?></p>
<?php endif; ?>
<?php if($hasMore): ?>
    <div class="load-more">
        <button type="button" class="button small outline"><?php echo e(trans('components.image_load_more')); ?></button>
    </div>
<?php endif; ?><?php /**PATH /app/www/resources/views/pages/parts/image-manager-list.blade.php ENDPATH**/ ?>