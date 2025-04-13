<?php $__env->startSection('content'); ?>

    <div class="container small py-xl">

        <main class="card content-wrap auto-height">
            <div id="main-content" class="body">
                <h3><?php echo e(trans('errors.error_occurred')); ?></h3>
                <h5 class="mb-m"><?php echo e($message ?? 'An unknown error occurred'); ?></h5>
                <p><a href="<?php echo e(url('/')); ?>" class="button outline"><?php echo e(trans('errors.return_home')); ?></a></p>
            </div>
        </main>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/errors/500.blade.php ENDPATH**/ ?>