<?php $__env->startPush('head'); ?>
    <script src="<?php echo e(versioned_asset('libs/tinymce/tinymce.min.js')); ?>" nonce="<?php echo e($cspNonce); ?>"></script>
<?php $__env->stopPush(); ?>

<div component="wysiwyg-editor-tinymce"
     option:wysiwyg-editor-tinymce:language="<?php echo e($locale->htmlLang()); ?>"
     option:wysiwyg-editor-tinymce:page-id="<?php echo e($model->id ?? 0); ?>"
     option:wysiwyg-editor-tinymce:text-direction="<?php echo e($locale->htmlDirection()); ?>"
     option:wysiwyg-editor-tinymce:image-upload-error-text="<?php echo e(trans('errors.image_upload_error')); ?>"
     option:wysiwyg-editor-tinymce:server-upload-limit-text="<?php echo e(trans('errors.server_upload_limit')); ?>"
     class="flex-fill flex">

    <textarea id="html-editor"  name="html" rows="5"
          <?php if($errors->has('html')): ?> class="text-neg" <?php endif; ?>><?php if(isset($model) || old('html')): ?><?php echo e(old('html') ? old('html') : $model->html); ?><?php endif; ?></textarea>
</div>

<?php if($errors->has('html')): ?>
    <div class="text-neg text-small"><?php echo e($errors->first('html')); ?></div>
<?php endif; ?>

<?php echo $__env->make('form.editor-translations', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/pages/parts/wysiwyg-editor-tinymce.blade.php ENDPATH**/ ?>