
<div component="pointer"
      option:pointer:page-id="<?php echo e($page->id); ?>">
    <div id="pointer"
         refs="pointer@pointer"
         tabindex="-1"
         aria-label="<?php echo e(trans('entities.pages_pointer_label')); ?>"
         class="pointer-container">
        <div class="pointer flex-container-row items-center justify-space-between p-s anim <?php echo e(userCan('page-update', $page) ? 'is-page-editable' : ''); ?>" >
            <div refs="pointer@mode-section" class="flex-container-row items-center gap-s">
                <button refs="pointer@mode-toggle"
                        title="<?php echo e(trans('entities.pages_pointer_toggle_link')); ?>"
                        class="text-button icon px-xs"><?php echo (new \BookStack\Util\SvgIcon('link'))->toHtml(); ?></button>
                <div class="input-group">
                    <input refs="pointer@link-input" aria-label="<?php echo e(trans('entities.pages_pointer_permalink')); ?>" readonly="readonly" type="text" id="pointer-url" placeholder="url">
                    <button refs="pointer@link-button" class="button outline icon" type="button" title="<?php echo e(trans('entities.pages_copy_link')); ?>"><?php echo (new \BookStack\Util\SvgIcon('copy'))->toHtml(); ?></button>
                </div>
            </div>
            <div refs="pointer@mode-section" hidden class="flex-container-row items-center gap-s">
                <button refs="pointer@mode-toggle"
                        title="<?php echo e(trans('entities.pages_pointer_toggle_include')); ?>"
                        class="text-button icon px-xs"><?php echo (new \BookStack\Util\SvgIcon('include'))->toHtml(); ?></button>
                <div class="input-group">
                    <input refs="pointer@include-input" aria-label="<?php echo e(trans('entities.pages_pointer_include_tag')); ?>" readonly="readonly" type="text" id="pointer-include" placeholder="include">
                    <button refs="pointer@include-button" class="button outline icon" type="button" title="<?php echo e(trans('entities.pages_copy_link')); ?>"><?php echo (new \BookStack\Util\SvgIcon('copy'))->toHtml(); ?></button>
                </div>
            </div>
            <?php if(userCan('page-update', $page)): ?>
                <a href="<?php echo e($page->getUrl('/edit')); ?>" id="pointer-edit" data-edit-href="<?php echo e($page->getUrl('/edit')); ?>"
                   class="button primary outline icon heading-edit-icon ml-s px-s" title="<?php echo e(trans('entities.pages_edit_content_link')); ?>"><?php echo (new \BookStack\Util\SvgIcon('edit'))->toHtml(); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <button refs="pointer@section-mode-button" class="screen-reader-only"><?php echo e(trans('entities.pages_pointer_enter_mode')); ?></button>
</div>
<?php /**PATH /app/www/resources/views/pages/parts/pointer.blade.php ENDPATH**/ ?>