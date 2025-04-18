<div component="template-manager">
    <?php if(userCan('templates-manage')): ?>
        <p class="text-muted small mb-none">
            <?php echo e(trans('entities.templates_explain_set_as_template')); ?>

        </p>
        <?php echo $__env->make('form.toggle-switch', [
               'name' => 'template',
               'value' => old('template', $page->template ? 'true' : 'false') === 'true',
               'label' => trans('entities.templates_set_as_template')
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <hr>
    <?php endif; ?>

    <div class="search-box flexible mb-m" style="display: <?php echo e(count($templates) > 0 ? 'block' : 'none'); ?>">
        <input refs="template-manager@searchInput" type="text" name="template-search" placeholder="<?php echo e(trans('common.search')); ?>">
        <button refs="template-manager@searchButton" tabindex="-1" type="button"><?php echo (new \BookStack\Util\SvgIcon('search'))->toHtml(); ?></button>
        <button refs="template-manager@searchCancel" class="search-box-cancel text-neg" tabindex="-1" type="button" style="display: none"><?php echo (new \BookStack\Util\SvgIcon('close'))->toHtml(); ?></button>
    </div>

    <div refs="template-manager@list">
        <?php echo $__env->make('pages.parts.template-manager-list', ['templates' => $templates], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div><?php /**PATH /app/www/resources/views/pages/parts/template-manager.blade.php ENDPATH**/ ?>