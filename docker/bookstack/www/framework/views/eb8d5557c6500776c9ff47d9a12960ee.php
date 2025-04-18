<?php $__env->startSection('container-attrs'); ?>
    component="entity-search"
    option:entity-search:entity-id="<?php echo e($book->id); ?>"
    option:entity-search:entity-type="book"
<?php $__env->stopSection(); ?>

<?php $__env->startPush('social-meta'); ?>
    <meta property="og:description" content="<?php echo e(Str::limit($book->description, 100, '...')); ?>">
    <?php if($book->cover): ?>
        <meta property="og:image" content="<?php echo e($book->getBookCover()); ?>">
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('entities.body-tag-classes', ['entity' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->startSection('body'); ?>

    <div class="mb-s print-hidden">
        <?php echo $__env->make('entities.breadcrumbs', ['crumbs' => [
            $book,
        ]], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <main class="content-wrap card">
        <h1 class="break-text"><?php echo e($book->name); ?></h1>
        <div refs="entity-search@contentView" class="book-content">
            <div class="text-muted break-text"><?php echo $book->descriptionHtml(); ?></div>
            <?php if(count($bookChildren) > 0): ?>
                <div class="entity-list book-contents">
                    <?php $__currentLoopData = $bookChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($childElement->isA('chapter')): ?>
                            <?php echo $__env->make('chapters.parts.list-item', ['chapter' => $childElement], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('pages.parts.list-item', ['page' => $childElement], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="mt-xl">
                    <hr>
                    <p class="text-muted italic mb-m mt-xl"><?php echo e(trans('entities.books_empty_contents')); ?></p>

                    <div class="icon-list block inline">
                        <?php if(userCan('page-create', $book)): ?>
                            <a href="<?php echo e($book->getUrl('/create-page')); ?>" class="icon-list-item text-page">
                                <span class="icon"><?php echo (new \BookStack\Util\SvgIcon('page'))->toHtml(); ?></span>
                                <span><?php echo e(trans('entities.books_empty_create_page')); ?></span>
                            </a>
                        <?php endif; ?>
                        <?php if(userCan('chapter-create', $book)): ?>
                            <a href="<?php echo e($book->getUrl('/create-chapter')); ?>" class="icon-list-item text-chapter">
                                <span class="icon"><?php echo (new \BookStack\Util\SvgIcon('chapter'))->toHtml(); ?></span>
                                <span><?php echo e(trans('entities.books_empty_add_chapter')); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endif; ?>
        </div>

        <?php echo $__env->make('entities.search-results', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </main>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('right'); ?>
    <div class="mb-xl">
        <h5><?php echo e(trans('common.details')); ?></h5>
        <div class="blended-links">
            <?php echo $__env->make('entities.meta', ['entity' => $book, 'watchOptions' => $watchOptions], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php if($book->hasPermissions()): ?>
                <div class="active-restriction">
                    <?php if(userCan('restrictions-manage', $book)): ?>
                        <a href="<?php echo e($book->getUrl('/permissions')); ?>" class="entity-meta-item">
                            <?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?>
                            <div><?php echo e(trans('entities.books_permissions_active')); ?></div>
                        </a>
                    <?php else: ?>
                        <div class="entity-meta-item">
                            <?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?>
                            <div><?php echo e(trans('entities.books_permissions_active')); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="actions mb-xl">
        <h5><?php echo e(trans('common.actions')); ?></h5>
        <div class="icon-list text-link">

            <?php if(userCan('page-create', $book)): ?>
                <a href="<?php echo e($book->getUrl('/create-page')); ?>" data-shortcut="new" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('add'))->toHtml(); ?></span>
                    <span><?php echo e(trans('entities.pages_new')); ?></span>
                </a>
            <?php endif; ?>
            <?php if(userCan('chapter-create', $book)): ?>
                <a href="<?php echo e($book->getUrl('/create-chapter')); ?>" data-shortcut="new" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('add'))->toHtml(); ?></span>
                    <span><?php echo e(trans('entities.chapters_new')); ?></span>
                </a>
            <?php endif; ?>

            <hr class="primary-background">

            <?php if(userCan('book-update', $book)): ?>
                <a href="<?php echo e($book->getUrl('/edit')); ?>" data-shortcut="edit" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('edit'))->toHtml(); ?></span>
                    <span><?php echo e(trans('common.edit')); ?></span>
                </a>
                <a href="<?php echo e($book->getUrl('/sort')); ?>" data-shortcut="sort" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('sort'))->toHtml(); ?></span>
                    <span><?php echo e(trans('common.sort')); ?></span>
                </a>
            <?php endif; ?>
            <?php if(userCan('book-create-all')): ?>
                <a href="<?php echo e($book->getUrl('/copy')); ?>" data-shortcut="copy" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('copy'))->toHtml(); ?></span>
                    <span><?php echo e(trans('common.copy')); ?></span>
                </a>
            <?php endif; ?>
            <?php if(userCan('restrictions-manage', $book)): ?>
                <a href="<?php echo e($book->getUrl('/permissions')); ?>" data-shortcut="permissions" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?></span>
                    <span><?php echo e(trans('entities.permissions')); ?></span>
                </a>
            <?php endif; ?>
            <?php if(userCan('book-delete', $book)): ?>
                <a href="<?php echo e($book->getUrl('/delete')); ?>" data-shortcut="delete" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('delete'))->toHtml(); ?></span>
                    <span><?php echo e(trans('common.delete')); ?></span>
                </a>
            <?php endif; ?>

            <hr class="primary-background">

            <?php if($watchOptions->canWatch() && !$watchOptions->isWatching()): ?>
                <?php echo $__env->make('entities.watch-action', ['entity' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
            <?php if(!user()->isGuest()): ?>
                <?php echo $__env->make('entities.favourite-action', ['entity' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
            <?php if(userCan('content-export')): ?>
                <?php echo $__env->make('entities.export-menu', ['entity' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('left'); ?>

    <?php echo $__env->make('entities.search-form', ['label' => trans('entities.books_search_this')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if($book->tags->count() > 0): ?>
        <div class="mb-xl">
            <?php echo $__env->make('entities.tag-list', ['entity' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    <?php endif; ?>

    <?php if(count($bookParentShelves) > 0): ?>
        <div class="actions mb-xl">
            <h5><?php echo e(trans('entities.shelves')); ?></h5>
            <?php echo $__env->make('entities.list', ['entities' => $bookParentShelves, 'style' => 'compact'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    <?php endif; ?>

    <?php if(count($activity) > 0): ?>
        <div id="recent-activity" class="mb-xl">
            <h5><?php echo e(trans('entities.recent_activity')); ?></h5>
            <?php echo $__env->make('common.activity-list', ['activity' => $activity], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.tri', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/books/show.blade.php ENDPATH**/ ?>