<?php
 $isFavourite = $entity->isFavourite();
?>
<form action="<?php echo e(url('/favourites/' . ($isFavourite ? 'remove' : 'add'))); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="type" value="<?php echo e($entity->getMorphClass()); ?>">
    <input type="hidden" name="id" value="<?php echo e($entity->id); ?>">
    <button type="submit" data-shortcut="favourite" class="icon-list-item text-link">
        <span><?php echo (new \BookStack\Util\SvgIcon($isFavourite ? 'star' : 'star-outline'))->toHtml(); ?></span>
        <span><?php echo e($isFavourite ? trans('common.unfavourite') : trans('common.favourite')); ?></span>
    </button>
</form><?php /**PATH /app/www/resources/views/entities/favourite-action.blade.php ENDPATH**/ ?>