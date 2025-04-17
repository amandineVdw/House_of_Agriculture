<div component="sortable-list"
     option:sortable-list:handle-selector=".handle, a">
    <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div component="ajax-delete-row"
             option:ajax-delete-row:url="<?php echo e(url('/attachments/' . $attachment->id)); ?>"
             data-id="<?php echo e($attachment->id); ?>"
             data-drag-content="<?php echo e(json_encode($attachment->editorContent())); ?>"
             class="card drag-card">
            <div class="handle"><?php echo (new \BookStack\Util\SvgIcon('grip'))->toHtml(); ?></div>
            <div class="py-s">
                <a href="<?php echo e($attachment->getUrl()); ?>" target="_blank" rel="noopener"><?php echo e($attachment->name); ?></a>
            </div>
            <div class="flex-fill justify-flex-end">
                <button component="event-emit-select"
                        option:event-emit-select:name="insert"
                        type="button"
                        title="<?php echo e(trans('entities.attachments_insert_link')); ?>"
                        class="drag-card-action text-center text-link"><?php echo (new \BookStack\Util\SvgIcon('link'))->toHtml(); ?></button>
                <?php if(userCan('attachment-update', $attachment)): ?>
                    <button component="event-emit-select"
                            option:event-emit-select:name="edit"
                            option:event-emit-select:id="<?php echo e($attachment->id); ?>"
                            type="button"
                            title="<?php echo e(trans('common.edit')); ?>"
                            class="drag-card-action text-center text-link"><?php echo (new \BookStack\Util\SvgIcon('edit'))->toHtml(); ?></button>
                <?php endif; ?>
                <?php if(userCan('attachment-delete', $attachment)): ?>
                    <div component="dropdown" class="flex-fill relative">
                        <button refs="dropdown@toggle"
                                type="button"
                                title="<?php echo e(trans('common.delete')); ?>"
                                class="drag-card-action text-center text-neg"><?php echo (new \BookStack\Util\SvgIcon('close'))->toHtml(); ?></button>
                        <div refs="dropdown@menu" class="dropdown-menu">
                            <p class="text-neg small px-m mb-xs"><?php echo e(trans('entities.attachments_delete')); ?></p>
                            <button refs="ajax-delete-row@delete" type="button" class="text-link small delete text-item"><?php echo e(trans('common.confirm')); ?></button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(count($attachments) === 0): ?>
        <p class="small text-muted">
            <?php echo e(trans('entities.attachments_no_files')); ?>

        </p>
    <?php endif; ?>
</div><?php /**PATH /app/www/resources/views/attachments/manager-list.blade.php ENDPATH**/ ?>