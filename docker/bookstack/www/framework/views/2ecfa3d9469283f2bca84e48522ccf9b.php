<div class="flex-container-row justify-space-between items-center gap-m item-list-row">
    <label for="shortcut-<?php echo e($id); ?>" class="bold flex px-m py-xs"><?php echo e($label); ?></label>
    <div class="px-m py-xs">
        <input type="text"
               component="shortcut-input"
               class="small flex-none shortcut-input px-s py-xs"
               id="shortcut-<?php echo e($id); ?>"
               name="shortcut[<?php echo e($id); ?>]"
               readonly
               value="<?php echo e($shortcuts->getShortcut($id)); ?>">
    </div>
</div><?php /**PATH /app/www/resources/views/users/account/parts/shortcut-control.blade.php ENDPATH**/ ?>