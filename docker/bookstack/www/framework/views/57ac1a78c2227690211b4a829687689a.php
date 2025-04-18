<div component="dropzone"
     option:dropzone:url="<?php echo e(url("/images/{$image->id}/file")); ?>"
     option:dropzone:method="PUT"
     option:dropzone:success-message="<?php echo e(trans('components.image_update_success')); ?>"
     option:dropzone:upload-limit="<?php echo e(config('app.upload_limit')); ?>"
     option:dropzone:upload-limit-message="<?php echo e(trans('errors.server_upload_limit')); ?>"
     option:dropzone:zone-text="<?php echo e(trans('entities.attachments_dropzone')); ?>"
     option:dropzone:file-accept="image/*"
     class="image-manager-details">

    <?php if($warning ?? ''): ?>
        <div class="image-manager-warning px-m py-xs flex-container-row gap-xs items-center mb-l">
            <div><?php echo (new \BookStack\Util\SvgIcon('warning'))->toHtml(); ?></div>
            <div class="flex"><?php echo e($warning); ?></div>
        </div>
    <?php endif; ?>

    <div refs="dropzone@status-area dropzone@drop-target"></div>

    <script id="image-manager-form-image-data" type="application/json"><?php echo json_encode($image, 15, 512) ?></script>

    <form component="ajax-form"
          option:ajax-form:success-message="<?php echo e(trans('components.image_update_success')); ?>"
          option:ajax-form:method="put"
          option:ajax-form:response-container=".image-manager-details"
          option:ajax-form:url="<?php echo e(url('images/' . $image->id)); ?>">

        <div class="image-manager-viewer">
            <a href="<?php echo e($image->url); ?>" target="_blank" rel="noopener" class="block">
                <img src="<?php echo e($image->thumbs['display'] ?? $image->url); ?>"
                     alt="<?php echo e($image->name); ?>"
                     class="anim fadeIn"
                     title="<?php echo e($image->name); ?>">
            </a>
        </div>
        <div class="form-group stretch-inputs">
            <label for="name"><?php echo e(trans('components.image_image_name')); ?></label>
            <input id="name" class="input-base" type="text" name="name" value="<?php echo e($image->name); ?>">
        </div>
        <div class="flex-container-row justify-space-between gap-m">
            <?php if(userCan('image-delete', $image) || userCan('image-update', $image)): ?>
                <div component="dropdown"
                     class="dropdown-container">
                    <button refs="dropdown@toggle" type="button" class="button icon outline"><?php echo (new \BookStack\Util\SvgIcon('more'))->toHtml(); ?></button>
                    <div refs="dropdown@menu" class="dropdown-menu anchor-left">
                        <?php if(userCan('image-delete', $image)): ?>
                            <button type="button"
                                    id="image-manager-delete"
                                    class="text-item"><?php echo e(trans('common.delete')); ?></button>
                        <?php endif; ?>
                        <?php if(userCan('image-update', $image)): ?>
                            <button type="button"
                                    id="image-manager-replace"
                                    refs="dropzone@select-button"
                                    class="text-item"><?php echo e(trans('components.image_replace')); ?></button>
                            <button type="button"
                                    id="image-manager-rebuild-thumbs"
                                    class="text-item"><?php echo e(trans('components.image_rebuild_thumbs')); ?></button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
                <button type="submit"
                        class="button icon outline"><?php echo e(trans('common.save')); ?></button>
        </div>
    </form>

    <?php if(!is_null($dependantPages)): ?>
        <hr>
        <?php if(count($dependantPages) > 0): ?>
            <p class="text-neg mb-xs mt-m"><?php echo e(trans('components.image_delete_used')); ?></p>
            <ul class="text-neg">
                <?php $__currentLoopData = $dependantPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e($page->url); ?>"
                           target="_blank"
                           rel="noopener"
                           class="text-neg"><?php echo e($page->name); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
        <p class="text-neg mb-xs"><?php echo e(trans('components.image_delete_confirm_text')); ?></p>
        <form component="ajax-form"
              option:ajax-form:success-message="<?php echo e(trans('components.image_delete_success')); ?>"
              option:ajax-form:method="delete"
              option:ajax-form:response-container=".image-manager-details"
              option:ajax-form:url="<?php echo e(url('images/' . $image->id)); ?>">
            <button type="submit" class="button neg">
                <?php echo e(trans('common.delete_confirm')); ?>

            </button>
        </form>
    <?php endif; ?>

    <div class="text-muted text-small">
        <hr class="my-m">
        <div title="<?php echo e($image->created_at->format('Y-m-d H:i:s')); ?>">
            <?php echo (new \BookStack\Util\SvgIcon('star'))->toHtml(); ?> <?php echo e(trans('components.image_uploaded', ['uploadedDate' => $image->created_at->diffForHumans()])); ?>

        </div>
        <?php if($image->created_at->valueOf() !== $image->updated_at->valueOf()): ?>
            <div title="<?php echo e($image->updated_at->format('Y-m-d H:i:s')); ?>">
                <?php echo (new \BookStack\Util\SvgIcon('edit'))->toHtml(); ?> <?php echo e(trans('components.image_updated', ['updateDate' => $image->updated_at->diffForHumans()])); ?>

            </div>
        <?php endif; ?>
        <?php if($image->createdBy): ?>
            <div><?php echo (new \BookStack\Util\SvgIcon('user'))->toHtml(); ?> <?php echo e(trans('components.image_uploaded_by', ['userName' => $image->createdBy->name])); ?></div>
        <?php endif; ?>
        <?php if(($page = $image->getPage()) && userCan('view', $page)): ?>
            <div>
                <?php echo (new \BookStack\Util\SvgIcon('page'))->toHtml(); ?>
                <?php echo trans('components.image_uploaded_to', [
                    'pageLink' => '<a class="text-page" href="' . e($page->getUrl()) . '" target="_blank">' . e($page->name) . '</a>'
                ]); ?>

            </div>
        <?php endif; ?>
    </div>

</div><?php /**PATH /app/www/resources/views/pages/parts/image-manager-form.blade.php ENDPATH**/ ?>