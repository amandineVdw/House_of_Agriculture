<div style="display: block;"
     refs="editor-toolbox@tab-content"
     data-tab-content="files"
     component="attachments"
     option:attachments:page-id="<?php echo e($page->id ?? 0); ?>"
     class="toolbox-tab-content">

    <h4><?php echo e(trans('entities.attachments')); ?></h4>
    <div component="dropzone"
         option:dropzone:url="<?php echo e(url('/attachments/upload?uploaded_to=' . $page->id)); ?>"
         option:dropzone:success-message="<?php echo e(trans('entities.attachments_file_uploaded')); ?>"
         option:dropzone:error-message="<?php echo e(trans('errors.attachment_upload_error')); ?>"
         option:dropzone:upload-limit="<?php echo e(config('app.upload_limit')); ?>"
         option:dropzone:upload-limit-message="<?php echo e(trans('errors.server_upload_limit')); ?>"
         option:dropzone:zone-text="<?php echo e(trans('entities.attachments_dropzone')); ?>"
         option:dropzone:file-accept="*"
         option:dropzone:allow-multiple="true"
         class="px-l files">

        <div refs="attachments@list-container dropzone@drop-target" class="relative">
            <p class="text-muted small"><?php echo e(trans('entities.attachments_explain')); ?> <span
                        class="text-warn"><?php echo e(trans('entities.attachments_explain_instant_save')); ?></span></p>

            <hr class="mb-s">

            <div class="flex-container-row">
                <button refs="dropzone@select-button" type="button" class="button outline small"><?php echo e(trans('entities.attachments_upload')); ?></button>
                <button refs="attachments@attach-link-button" type="button" class="button outline small"><?php echo e(trans('entities.attachments_link')); ?></button>
            </div>
            <div>
                <p class="text-muted text-small"><?php echo e(trans('entities.attachments_upload_drop')); ?></p>
            </div>
            <div refs="dropzone@status-area" class="fixed top-right px-m py-m"></div>

            <hr>

            <div refs="attachments@list-panel">
                <?php echo $__env->make('attachments.manager-list', ['attachments' => $page->attachments->all()], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>

        </div>
    </div>

    <div id="link-form-container" refs="attachments@links-container" hidden class="px-l">
        <?php echo $__env->make('attachments.manager-link-form', ['pageId' => $page->id], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <div id="edit-form-container" refs="attachments@edit-container" hidden class="px-l"></div>

</div><?php /**PATH /app/www/resources/views/attachments/manager.blade.php ENDPATH**/ ?>