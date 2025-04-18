<div component="editor-toolbox" class="floating-toolbox">

    <div class="tabs flex-container-column justify-flex-start">
        <div class="tabs-inner flex-container-column justify-center">
            <button type="button" refs="editor-toolbox@toggle" title="<?php echo e(trans('entities.toggle_sidebar')); ?>" aria-expanded="false" class="toolbox-toggle"><?php echo (new \BookStack\Util\SvgIcon('caret-left-circle'))->toHtml(); ?></button>
            <button type="button" refs="editor-toolbox@tab-button" data-tab="tags" title="<?php echo e(trans('entities.page_tags')); ?>" class="active"><?php echo (new \BookStack\Util\SvgIcon('tag'))->toHtml(); ?></button>
            <?php if(userCan('attachment-create-all')): ?>
                <button type="button" refs="editor-toolbox@tab-button" data-tab="files" title="<?php echo e(trans('entities.attachments')); ?>"><?php echo (new \BookStack\Util\SvgIcon('attach'))->toHtml(); ?></button>
            <?php endif; ?>
            <button type="button" refs="editor-toolbox@tab-button" data-tab="templates" title="<?php echo e(trans('entities.templates')); ?>"><?php echo (new \BookStack\Util\SvgIcon('template'))->toHtml(); ?></button>
            <?php if($comments->enabled()): ?>
                <button type="button" refs="editor-toolbox@tab-button" data-tab="comments" title="<?php echo e(trans('entities.comments')); ?>"><?php echo (new \BookStack\Util\SvgIcon('comment'))->toHtml(); ?></button>
            <?php endif; ?>
        </div>
    </div>

    <div refs="editor-toolbox@tab-content" data-tab-content="tags" class="toolbox-tab-content">
        <h4><?php echo e(trans('entities.page_tags')); ?></h4>
        <div class="px-l">
            <?php echo $__env->make('entities.tag-manager', ['entity' => $page], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>

    <?php if(userCan('attachment-create-all')): ?>
        <?php echo $__env->make('attachments.manager', ['page' => $page], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>

    <div refs="editor-toolbox@tab-content" data-tab-content="templates" class="toolbox-tab-content">
        <h4><?php echo e(trans('entities.templates')); ?></h4>

        <div class="px-l">
            <?php echo $__env->make('pages.parts.template-manager', ['page' => $page, 'templates' => $templates], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>

    <?php if($comments->enabled()): ?>
        <?php echo $__env->make('pages.parts.toolbox-comments', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>

</div>
<?php /**PATH /app/www/resources/views/pages/parts/editor-toolbox.blade.php ENDPATH**/ ?>