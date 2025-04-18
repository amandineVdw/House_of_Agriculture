<?php echo e($templates->links()); ?>


<?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card template-item border-card p-m mb-m" tabindex="0"
         aria-label="<?php echo e(trans('entities.templates_replace_content')); ?> - <?php echo e($template->name); ?>"
         draggable="true" template-id="<?php echo e($template->id); ?>">
        <div class="template-item-content" title="<?php echo e(trans('entities.templates_replace_content')); ?>">
            <div><?php echo e($template->name); ?></div>
            <div class="text-muted"><?php echo e(trans('entities.meta_updated', ['timeLength' => $template->updated_at->diffForHumans()])); ?></div>
        </div>
        <div class="template-item-actions">
            <button type="button"
                    title="<?php echo e(trans('entities.templates_prepend_content')); ?>"
                    aria-label="<?php echo e(trans('entities.templates_prepend_content')); ?> - <?php echo e($template->name); ?>"
                    template-action="prepend"><?php echo (new \BookStack\Util\SvgIcon('chevron-up'))->toHtml(); ?></button>
            <button type="button"
                    title="<?php echo e(trans('entities.templates_append_content')); ?>"
                    aria-label="<?php echo e(trans('entities.templates_append_content')); ?> -- <?php echo e($template->name); ?>"
                    template-action="append"><?php echo (new \BookStack\Util\SvgIcon('chevron-down'))->toHtml(); ?></button>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo e($templates->links()); ?><?php /**PATH /app/www/resources/views/pages/parts/template-manager-list.blade.php ENDPATH**/ ?>