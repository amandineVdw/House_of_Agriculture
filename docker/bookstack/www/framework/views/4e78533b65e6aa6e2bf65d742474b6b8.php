<?php $__env->startSection('body'); ?>

    <div class="container small">

        <div class="my-s">
            <?php echo $__env->make('entities.breadcrumbs', ['crumbs' => [
                $book,
                $book->getUrl('/edit') => [
                    'text' => trans('entities.books_edit'),
                    'icon' => 'edit',
                ]
            ]], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <main class="content-wrap card auto-height">
            <h1 class="list-heading"><?php echo e(trans('entities.books_edit')); ?></h1>
            <form action="<?php echo e($book->getUrl()); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <?php echo $__env->make('books.parts.form', [
                    'model' => $book,
                    'returnLocation' => $book->getUrl()
                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </form>
        </main>


        <?php if(userCan('book-delete', $book) && userCan('book-create-all') && userCan('bookshelf-create-all')): ?>
            <?php echo $__env->make('books.parts.convert-to-shelf', ['book' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/books/edit.blade.php ENDPATH**/ ?>