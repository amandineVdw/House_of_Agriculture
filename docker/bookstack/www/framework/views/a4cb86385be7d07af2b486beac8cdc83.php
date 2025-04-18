
<div class="grid half gap-xl v-center">
    <div>
        <label for="user-language" class="setting-list-label"><?php echo e(trans('settings.users_preferred_language')); ?></label>
        <p class="small">
            <?php echo e(trans('settings.users_preferred_language_desc')); ?>

        </p>
    </div>
    <div>
        <select name="language" id="user-language">
            <?php $__currentLoopData = trans('settings.language_select'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if($value === $lang): ?> selected <?php endif; ?> value="<?php echo e($lang); ?>"><?php echo e($label); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div><?php /**PATH /app/www/resources/views/users/parts/language-option-row.blade.php ENDPATH**/ ?>