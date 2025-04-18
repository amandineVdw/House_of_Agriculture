<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('books.parts.list', ['books' => $books, 'view' => $view, 'listOptions' => $listOptions], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('left'); ?>
    <?php if($recents): ?>
        <div id="recents" class="mb-xl">
            <h5><?php echo e(trans('entities.recently_viewed')); ?></h5>
            <?php echo $__env->make('entities.list', ['entities' => $recents, 'style' => 'compact'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    <?php endif; ?>

    <div id="popular" class="mb-xl">
        <h5><?php echo e(trans('entities.books_popular')); ?></h5>
        <?php if(count($popular) > 0): ?>
            <?php echo $__env->make('entities.list', ['entities' => $popular, 'style' => 'compact'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php else: ?>
            <p class="text-muted pb-l mb-none"><?php echo e(trans('entities.books_popular_empty')); ?></p>
        <?php endif; ?>
    </div>

    <div id="new" class="mb-xl">
        <h5><?php echo e(trans('entities.books_new')); ?></h5>
        <?php if(count($new) > 0): ?>
            <?php echo $__env->make('entities.list', ['entities' => $new, 'style' => 'compact'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php else: ?>
            <p class="text-muted pb-l mb-none"><?php echo e(trans('entities.books_new_empty')); ?></p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right'); ?>

    <div class="actions mb-xl">
        <h5><?php echo e(trans('common.actions')); ?></h5>
        <div class="icon-list text-link">
            <?php if(userCan('book-create-all')): ?>
                <a href="<?php echo e(url("/create-book")); ?>" data-shortcut="new" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('add'))->toHtml(); ?></span>
                    <span><?php echo e(trans('entities.books_create')); ?></span>
                </a>
            <?php endif; ?>

            <?php echo $__env->make('entities.view-toggle', ['view' => $view, 'type' => 'books'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <a href="<?php echo e(url('/tags')); ?>" class="icon-list-item">
                <span><?php echo (new \BookStack\Util\SvgIcon('tag'))->toHtml(); ?></span>
                <span><?php echo e(trans('entities.tags_view_tags')); ?></span>
            </a>

            <?php if(userCan('content-import')): ?>
                <a href="<?php echo e(url('/import')); ?>" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('upload'))->toHtml(); ?></span>
                    <span><?php echo e(trans('entities.import')); ?></span>
                </a>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tri', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/books/index.blade.php ENDPATH**/ ?>