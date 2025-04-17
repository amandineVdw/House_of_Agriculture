<?php $type = $entity->getType(); ?>
<a href="<?php echo e($entity->getUrl()); ?>" class="<?php echo e($type); ?> <?php echo e($type === 'page' && $entity->draft ? 'draft' : ''); ?> <?php echo e($classes ?? ''); ?> entity-list-item" data-entity-type="<?php echo e($type); ?>" data-entity-id="<?php echo e($entity->id); ?>">
    <span role="presentation" class="icon text-<?php echo e($type); ?>"><?php echo (new \BookStack\Util\SvgIcon($type))->toHtml(); ?></span>
    <div class="content">
            <h4 class="entity-list-item-name break-text"><?php echo e($entity->preview_name ?? $entity->name); ?></h4>
            <?php echo e($slot ?? ''); ?>

    </div>
</a><?php /**PATH /app/www/resources/views/entities/list-item-basic.blade.php ENDPATH**/ ?>