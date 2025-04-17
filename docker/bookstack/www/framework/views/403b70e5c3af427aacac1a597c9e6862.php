<main class="content-wrap mt-m card">
    <div class="grid half v-center no-row-gap">
        <h1 class="list-heading"><?php echo e(trans('entities.books')); ?></h1>
        <div class="text-m-right my-m">
            <?php echo $__env->make('common.sort', $listOptions->getSortControlData(), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>
    <?php if(count($books) > 0): ?>
        <?php if($view === 'list'): ?>
            <div class="entity-list">
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('books.parts.list-item', ['book' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="grid third">
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('entities.grid-item', ['entity' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <div>
            <?php echo $books->render(); ?>

        </div>
    <?php else: ?>
        <p class="text-muted"><?php echo e(trans('entities.books_empty')); ?></p>
        <?php if(userCan('book-create-all')): ?>
            <div class="icon-list block inline">
                <a href="<?php echo e(url("/create-book")); ?>"
                   class="icon-list-item text-book">
                    <span><?php echo (new \BookStack\Util\SvgIcon('add'))->toHtml(); ?></span>
                    <span><?php echo e(trans('entities.create_now')); ?></span>
                </a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</main><?php /**PATH /app/www/resources/views/books/parts/list.blade.php ENDPATH**/ ?>