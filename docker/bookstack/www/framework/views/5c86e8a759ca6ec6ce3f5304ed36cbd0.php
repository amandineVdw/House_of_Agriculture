<div component="image-picker"
     option:image-picker:default-image="<?php echo e($defaultImage); ?>"
     class="image-picker <?php if($errors->has($name)): ?> has-error <?php endif; ?>">

    <div class="grid half">
        <div class="text-center">
            <img refs="image-picker@image"
                <?php if($currentImage && $currentImage !== 'none'): ?> src="<?php echo e($currentImage); ?>" <?php else: ?> src="<?php echo e($defaultImage); ?>" <?php endif; ?>
                class="<?php echo e($imageClass); ?> <?php if($currentImage=== 'none'): ?> none <?php endif; ?>" alt="<?php echo e(trans('components.image_preview')); ?>">
        </div>
        <div class="text-center">
            <input refs="image-picker@image-input" type="file" class="custom-file-input" accept="image/*" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>">
            <label for="<?php echo e($name); ?>" class="button outline"><?php echo e(trans('components.image_select_image')); ?></label>
            <input refs="image-picker@reset-input" type="hidden" name="<?php echo e($name); ?>_reset" value="true" disabled="disabled">
            <?php if(isset($removeName)): ?>
                <input refs="image-picker@remove-input" type="hidden" name="<?php echo e($removeName); ?>" value="<?php echo e($removeValue); ?>" disabled="disabled">
            <?php endif; ?>

            <br>
            <button refs="image-picker@reset-button" class="text-button text-muted" type="button"><?php echo e(trans('common.reset')); ?></button>

            <?php if(isset($removeName)): ?>
                <span class="sep">|</span>
                <button refs="image-picker@remove-button" class="text-button text-muted" type="button"><?php echo e(trans('common.remove')); ?></button>
            <?php endif; ?>
        </div>
    </div>

    <?php if($errors->has($name)): ?>
        <div class="text-neg text-small"><?php echo e($errors->first($name)); ?></div>
    <?php endif; ?>

</div><?php /**PATH /app/www/resources/views/form/image-picker.blade.php ENDPATH**/ ?>