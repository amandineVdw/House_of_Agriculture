<?php $__currentLoopData = array_merge($tags, [null, null]); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card drag-card <?php echo e($loop->last ? 'hidden' : ''); ?>" <?php if($loop->last): ?> refs="add-remove-rows@model" <?php endif; ?>>
        <div class="handle"><?php echo (new \BookStack\Util\SvgIcon('grip'))->toHtml(); ?></div>
        <?php $__currentLoopData = ['name', 'value']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div component="auto-suggest"
                 option:auto-suggest:url="<?php echo e(url('/ajax/tags/suggest/' . $type . 's')); ?>"
                 option:auto-suggest:type="<?php echo e($type); ?>"
                 class="outline">
                <input value="<?php echo e($tag->$type ?? ''); ?>"
                       placeholder="<?php echo e(trans('entities.tag_' . $type)); ?>"
                       aria-label="<?php echo e(trans('entities.tag_' . $type)); ?>"
                       name="tags[<?php echo e($loop->parent->last ? 'randrowid' : $index); ?>][<?php echo e($type); ?>]"
                       type="text"
                       refs="auto-suggest@input"
                       autocomplete="off"/>
                <ul refs="auto-suggest@list" class="suggestion-box dropdown-menu"></ul>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button type="button"
                aria-label="<?php echo e(trans('entities.tags_remove')); ?>"
                class="text-center drag-card-action text-neg">
            <?php echo (new \BookStack\Util\SvgIcon('close'))->toHtml(); ?>
        </button>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /app/www/resources/views/entities/tag-manager-list.blade.php ENDPATH**/ ?>