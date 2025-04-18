<div class="tag-item primary-background-light" data-name="<?php echo e($tag->name); ?>" data-value="<?php echo e($tag->value); ?>">
    <?php if($linked ?? true): ?>
        <div class="tag-name <?php echo e($tag->highlight_name ? 'highlight' : ''); ?>"><a href="<?php echo e($tag->nameUrl()); ?>"><?php echo (new \BookStack\Util\SvgIcon('tag'))->toHtml(); ?><?php echo e($tag->name); ?></a></div>
        <?php if($tag->value): ?> <div class="tag-value <?php echo e($tag->highlight_value ? 'highlight' : ''); ?>"><a href="<?php echo e($tag->valueUrl()); ?>"><?php echo e($tag->value); ?></a></div> <?php endif; ?>
    <?php else: ?>
        <div class="tag-name <?php echo e($tag->highlight_name ? 'highlight' : ''); ?>"><span><?php echo (new \BookStack\Util\SvgIcon('tag'))->toHtml(); ?><?php echo e($tag->name); ?></span></div>
        <?php if($tag->value): ?> <div class="tag-value <?php echo e($tag->highlight_value ? 'highlight' : ''); ?>"><span><?php echo e($tag->value); ?></span></div> <?php endif; ?>
    <?php endif; ?>
</div><?php /**PATH /app/www/resources/views/entities/tag.blade.php ENDPATH**/ ?>