<?php $__env->startSection('body'); ?>

    <div class="container small">

        <div class="my-s">
            <?php echo $__env->make('entities.breadcrumbs', ['crumbs' => [
                '/shelves' => [
                    'text' => trans('entities.shelves'),
                    'icon' => 'bookshelf',
                ],
                '/create-shelf' => [
                    'text' => trans('entities.shelves_create'),
                    'icon' => 'add',
                ]
            ]], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <main class="card content-wrap">
            <h1 class="list-heading"><?php echo e(trans('entities.shelves_create')); ?></h1>
            <form action="<?php echo e(url("/shelves")); ?>" method="POST" enctype="multipart/form-data">
                <?php echo $__env->make('shelves.parts.form', ['shelf' => null, 'books' => $books], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </form>
        </main>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/shelves/create.blade.php ENDPATH**/ ?>