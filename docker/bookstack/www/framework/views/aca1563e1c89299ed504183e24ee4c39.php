
<div component="ajax-form"
     option:ajax-form:url="/attachments/link"
     option:ajax-form:method="post"
     option:ajax-form:response-container="#link-form-container"
     option:ajax-form:success-message="<?php echo e(trans('entities.attachments_link_attached')); ?>">
    <input type="hidden" name="attachment_link_uploaded_to" value="<?php echo e($pageId); ?>">
    <p class="text-muted small"><?php echo e(trans('entities.attachments_explain_link')); ?></p>
    <div class="form-group">
        <label for="attachment_link_name"><?php echo e(trans('entities.attachments_link_name')); ?></label>
        <input name="attachment_link_name" id="attachment_link_name" type="text" placeholder="<?php echo e(trans('entities.attachments_link_name')); ?>" value="<?php echo e($attachment_link_name ?? ''); ?>">
        <?php if($errors->has('attachment_link_name')): ?>
            <div class="text-neg text-small"><?php echo e($errors->first('attachment_link_name')); ?></div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="attachment_link_url"><?php echo e(trans('entities.attachments_link_url')); ?></label>
        <input name="attachment_link_url" id="attachment_link_url" type="text" placeholder="<?php echo e(trans('entities.attachments_link_url_hint')); ?>" value="<?php echo e($attachment_link_url ?? ''); ?>">
        <?php if($errors->has('attachment_link_url')): ?>
            <div class="text-neg text-small"><?php echo e($errors->first('attachment_link_url')); ?></div>
        <?php endif; ?>
    </div>
    <button component="event-emit-select"
            option:event-emit-select:name="edit-back"
            type="button" class="button outline"><?php echo e(trans('common.cancel')); ?></button>
    <button refs="ajax-form@submit"
            type="button"
            class="button"><?php echo e(trans('entities.attach')); ?></button>
</div><?php /**PATH /app/www/resources/views/attachments/manager-link-form.blade.php ENDPATH**/ ?>