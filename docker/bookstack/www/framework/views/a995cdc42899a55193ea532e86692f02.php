

<div class="grid half gap-xl v-center">
    <div>
        <label class="setting-list-label"><?php echo e(trans('settings.user_api_token_name')); ?></label>
        <p class="small"><?php echo e(trans('settings.user_api_token_name_desc')); ?></p>
    </div>
    <div>
        <?php echo $__env->make('form.text', ['name' => 'name'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div>

<div class="grid half gap-xl v-center">
    <div>
        <label class="setting-list-label"><?php echo e(trans('settings.user_api_token_expiry')); ?></label>
        <p class="small"><?php echo e(trans('settings.user_api_token_expiry_desc')); ?></p>
    </div>
    <div class="text-right">
        <?php echo $__env->make('form.date', ['name' => 'expires_at'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div><?php /**PATH /app/www/resources/views/users/api-tokens/parts/form.blade.php ENDPATH**/ ?>