<?php $__env->startPush('body-class', 'flexbox '); ?>

<?php $__env->startSection('content'); ?>

    <div id="main-content" class="flex-fill flex height-fill">
        <form action="<?php echo e($page->getUrl()); ?>" autocomplete="off" data-page-id="<?php echo e($page->id); ?>" method="POST" class="flex flex-fill">
            <?php echo e(csrf_field()); ?>


            <?php if(!$isDraft): ?> <?php echo e(method_field('PUT')); ?> <?php endif; ?>
            <?php echo $__env->make('pages.parts.form', ['model' => $page], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </form>
    </div>
    
    <?php echo $__env->make('pages.parts.image-manager', ['uploaded_to' => $page->id], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('pages.parts.code-editor', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('entities.selector-popup', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/pages/edit.blade.php ENDPATH**/ ?>