<a href="<?php echo e($entity->getUrl()); ?>" class="flex-container-row items-center">
    <span role="presentation"
          class="icon flex-none text-<?php echo e($entity->getType()); ?>"><?php echo (new \BookStack\Util\SvgIcon($entity->getType()))->toHtml(); ?></span>
    <div class="flex text-<?php echo e($entity->getType()); ?>">
        <?php echo e($entity->name); ?>

    </div>
</a><?php /**PATH /app/www/resources/views/entities/icon-link.blade.php ENDPATH**/ ?>