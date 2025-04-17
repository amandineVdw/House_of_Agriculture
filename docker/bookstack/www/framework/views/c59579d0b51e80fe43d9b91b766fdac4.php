<?php $__env->startSection('body'); ?>
    <div class="container small">
        <div class="my-s">
            <?php if(isset($bookshelf)): ?>
                <?php echo $__env->make('entities.breadcrumbs', ['crumbs' => [
                    $bookshelf,
                    $bookshelf->getUrl('/create-book') => [
                        'text' => trans('entities.books_create'),
                        'icon' => 'add'
                    ]
                ]], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('entities.breadcrumbs', ['crumbs' => [
                    '/books' => [
                        'text' => trans('entities.books'),
                        'icon' => 'book'
                    ],
                    '/create-book' => [
                        'text' => trans('entities.books_create'),
                        'icon' => 'add'
                    ]
                ]], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>

        <main class="content-wrap card">
            <h1 class="list-heading"><?php echo e(trans('entities.books_create')); ?></h1>
            <form action="<?php echo e($bookshelf?->getUrl('/create-book') ?? url('/books')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo $__env->make('books.parts.form', [
                    'returnLocation' => $bookshelf?->getUrl() ?? url('/books')
                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </form>
        </main>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/books/create.blade.php ENDPATH**/ ?>