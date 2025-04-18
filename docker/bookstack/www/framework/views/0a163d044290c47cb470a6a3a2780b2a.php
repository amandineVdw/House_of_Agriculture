<div class="flex-container-row gap-l justify-space-between pb-xs wrap">
    <p class="text-muted small my-none min-width-xs flex">
        <?php echo e(trans('entities.default_template_explain')); ?>

    </p>

    <div class="min-width-m">
        <?php echo $__env->make('form.page-picker', [
            'name' => 'default_template_id',
            'placeholder' => trans('entities.default_template_select'),
            'value' => $entity->default_template_id ?? null,
            'selectorEndpoint' => '/search/entity-selector-templates',
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div><?php /**PATH /app/www/resources/views/entities/template-selector.blade.php ENDPATH**/ ?>