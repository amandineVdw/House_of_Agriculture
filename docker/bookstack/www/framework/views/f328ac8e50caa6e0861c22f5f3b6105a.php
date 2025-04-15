<div component="page-editor" class="page-editor page-editor-<?php echo e($editor); ?> flex-fill flex"
     option:page-editor:drafts-enabled="<?php echo e($draftsEnabled ? 'true' : 'false'); ?>"
     <?php if(config('services.drawio')): ?>
        drawio-url="<?php echo e(is_string(config('services.drawio')) ? config('services.drawio') : 'https://embed.diagrams.net/?embed=1&proto=json&spin=1&configure=1'); ?>"
     <?php endif; ?>
     <?php if($model->name === trans('entities.pages_initial_name')): ?>
        option:page-editor:has-default-title="true"
     <?php endif; ?>
     option:page-editor:editor-type="<?php echo e($editor); ?>"
     option:page-editor:page-id="<?php echo e($model->id ?? '0'); ?>"
     option:page-editor:page-new-draft="<?php echo e($isDraft ? 'true' : 'false'); ?>"
     option:page-editor:draft-text="<?php echo e(($isDraft || $isDraftRevision) ? trans('entities.pages_editing_draft') : trans('entities.pages_editing_page')); ?>"
     option:page-editor:autosave-fail-text="<?php echo e(trans('errors.page_draft_autosave_fail')); ?>"
     option:page-editor:editing-page-text="<?php echo e(trans('entities.pages_editing_page')); ?>"
     option:page-editor:draft-discarded-text="<?php echo e(trans('entities.pages_draft_discarded')); ?>"
     option:page-editor:draft-delete-text="<?php echo e(trans('entities.pages_draft_deleted')); ?>"
     option:page-editor:draft-delete-fail-text="<?php echo e(trans('errors.page_draft_delete_fail')); ?>"
     option:page-editor:set-changelog-text="<?php echo e(trans('entities.pages_edit_set_changelog')); ?>">

    
    <?php echo $__env->make('pages.parts.editor-toolbar', ['model' => $model, 'editor' => $editor, 'isDraft' => $isDraft, 'draftsEnabled' => $draftsEnabled], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="flex flex-fill mx-s mb-s justify-center page-editor-page-area-wrap">
        <div class="page-editor-page-area flex-container-column flex flex-fill">
            
            <div class="title-input page-title clearfix">
                <div refs="page-editor@titleContainer" class="input">
                    <?php echo $__env->make('form.text', ['name' => 'name', 'model' => $model, 'placeholder' => trans('entities.pages_title')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="flex-fill flex">
                
                <div class="edit-area flex-fill flex">
                    <input type="hidden" name="editor" value="<?php echo e($editor->value); ?>">

                    <?php if($editor === \BookStack\Entities\Tools\PageEditorType::WysiwygLexical): ?>
                        <?php echo $__env->make('pages.parts.wysiwyg-editor', ['model' => $model], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endif; ?>

                    
                    <?php if($editor === \BookStack\Entities\Tools\PageEditorType::WysiwygTinymce): ?>
                        <?php echo $__env->make('pages.parts.wysiwyg-editor-tinymce', ['model' => $model], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endif; ?>

                    
                    <?php if($editor === \BookStack\Entities\Tools\PageEditorType::Markdown): ?>
                        <?php echo $__env->make('pages.parts.markdown-editor', ['model' => $model], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endif; ?>

                </div>

            </div>
        </div>

        <div class="relative flex-fill">
            <?php echo $__env->make('pages.parts.editor-toolbox', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>

    
    <button type="submit"
            id="save-button-mobile"
            title="<?php echo e(trans('entities.pages_save')); ?>"
            class="text-link text-button hide-over-m page-save-mobile-button"><?php echo (new \BookStack\Util\SvgIcon('save'))->toHtml(); ?></button>

    
    <?php $__env->startComponent('common.confirm-dialog', ['title' => trans('entities.pages_editor_switch_title'), 'ref' => 'page-editor@switch-dialog']); ?>
        <p>
            <?php echo e(trans('entities.pages_editor_switch_are_you_sure')); ?>

            <br>
            <?php echo e(trans('entities.pages_editor_switch_consider_following')); ?>

        </p>

        <ul>
            <li><?php echo e(trans('entities.pages_editor_switch_consideration_a')); ?></li>
            <li><?php echo e(trans('entities.pages_editor_switch_consideration_b')); ?></li>
            <li><?php echo e(trans('entities.pages_editor_switch_consideration_c')); ?></li>
        </ul>
    <?php echo $__env->renderComponent(); ?>

    
    <?php $__env->startComponent('common.confirm-dialog', ['title' => trans('entities.pages_edit_delete_draft'), 'ref' => 'page-editor@delete-draft-dialog']); ?>
        <p>
            <?php echo e(trans('entities.pages_edit_delete_draft_confirm')); ?>

        </p>
    <?php echo $__env->renderComponent(); ?>

    
    <?php $__env->startComponent('common.confirm-dialog', ['title' => trans('entities.pages_drawing_unsaved'), 'id' => 'unsaved-drawing-dialog']); ?>
        <p>
            <?php echo e(trans('entities.pages_drawing_unsaved_confirm')); ?>

        </p>
    <?php echo $__env->renderComponent(); ?>
</div><?php /**PATH /app/www/resources/views/pages/parts/form.blade.php ENDPATH**/ ?>