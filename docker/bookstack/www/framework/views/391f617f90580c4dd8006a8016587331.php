
<div components="add-remove-rows"
     option:add-remove-rows:row-selector=".card"
     option:add-remove-rows:remove-selector="button.text-neg">

    <div component="sortable-list"
         option:sortable-list:handle-selector=".handle">
        <?php $__currentLoopData = array_merge($value, [['label' => '', 'url' => '']]); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card drag-card <?php echo e($loop->last ? 'hidden' : ''); ?>" <?php if($loop->last): ?> refs="add-remove-rows@model" <?php endif; ?>>
                <div class="handle"><?php echo (new \BookStack\Util\SvgIcon('grip'))->toHtml(); ?></div>
                <?php $__currentLoopData = ['label', 'url']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="outline">
                        <input value="<?php echo e($link[$prop] ?? ''); ?>"
                               placeholder="<?php echo e(trans('settings.app_footer_links_' . $prop)); ?>"
                               aria-label="<?php echo e(trans('settings.app_footer_links_' . $prop)); ?>"
                               name="<?php echo e($name); ?>[<?php echo e($loop->parent->last ? 'randrowid' : $index); ?>][<?php echo e($prop); ?>]"
                               type="text"
                               autocomplete="off"/>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <button type="button"
                        aria-label="<?php echo e(trans('common.remove')); ?>"
                        class="text-center drag-card-action text-neg">
                    <?php echo (new \BookStack\Util\SvgIcon('close'))->toHtml(); ?>
                </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <button refs="add-remove-rows@add" type="button" class="text-button"><?php echo e(trans('settings.app_footer_links_add')); ?></button>
</div><?php /**PATH /app/www/resources/views/settings/parts/footer-links.blade.php ENDPATH**/ ?>