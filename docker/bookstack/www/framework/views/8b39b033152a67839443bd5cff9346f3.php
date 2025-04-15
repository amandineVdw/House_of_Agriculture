<div>
    <form action="<?php echo e(url("/preferences/change-view/" . $type)); ?>" method="POST" class="inline">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('patch')); ?>

        <input type="hidden" name="_return" value="<?php echo e(url()->current()); ?>">

        <?php if($view === 'list'): ?>
            <button type="submit" name="view" value="grid" class="icon-list-item text-link">
                <span class="icon"><?php echo (new \BookStack\Util\SvgIcon('grid'))->toHtml(); ?></span>
                <span><?php echo e(trans('common.grid_view')); ?></span>
            </button>
        <?php else: ?>
            <button type="submit" name="view" value="list" class="icon-list-item text-link">
                <span class="icon"><?php echo (new \BookStack\Util\SvgIcon('list'))->toHtml(); ?></span>
                <span><?php echo e(trans('common.list_view')); ?></span>
            </button>
        <?php endif; ?>
    </form>
</div><?php /**PATH /app/www/resources/views/entities/view-toggle.blade.php ENDPATH**/ ?>