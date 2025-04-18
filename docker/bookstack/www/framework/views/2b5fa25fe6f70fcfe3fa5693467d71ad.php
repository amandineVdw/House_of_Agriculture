<div components="tag-manager add-remove-rows"
     option:add-remove-rows:row-selector=".card"
     option:add-remove-rows:remove-selector="button.text-neg"
     option:tag-manager:row-selector=".card:not(.hidden)"
     refs="tag-manager@add-remove"
     class="tags">

    <p class="text-muted small">
        <?php echo nl2br(e(trans('entities.tags_explain'))); ?> <br>
        <a href="<?php echo e(url('/tags')); ?>" target="_blank"><?php echo e(trans('entities.tags_view_existing_tags')); ?></a>.
    </p>

    <div component="sortable-list"
         option:sortable-list:handle-selector=".handle">
        <?php echo $__env->make('entities.tag-manager-list', ['tags' => $entity ? $entity->tags->all() : []], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <button refs="add-remove-rows@add" type="button" class="text-button"><?php echo e(trans('entities.tags_add')); ?></button>
</div><?php /**PATH /app/www/resources/views/entities/tag-manager.blade.php ENDPATH**/ ?>