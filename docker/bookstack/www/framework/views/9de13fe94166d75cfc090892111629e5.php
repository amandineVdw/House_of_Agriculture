<?php $__env->startPush('social-meta'); ?>
    <meta property="og:description" content="<?php echo e(Str::limit($shelf->description, 100, '...')); ?>">
    <?php if($shelf->cover): ?>
        <meta property="og:image" content="<?php echo e($shelf->getBookCover()); ?>">
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('entities.body-tag-classes', ['entity' => $shelf], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->startSection('body'); ?>

    <div class="mb-s print-hidden">
        <?php echo $__env->make('entities.breadcrumbs', ['crumbs' => [
            $shelf,
        ]], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <main class="card content-wrap">

        <div class="flex-container-row wrap v-center">
            <h1 class="flex fit-content break-text"><?php echo e($shelf->name); ?></h1>
            <div class="flex"></div>
            <div class="flex fit-content text-m-right my-m ml-m">
                <?php echo $__env->make('common.sort', $listOptions->getSortControlData(), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>

        <div class="book-content">
            <div class="text-muted break-text"><?php echo $shelf->descriptionHtml(); ?></div>
            <?php if(count($sortedVisibleShelfBooks) > 0): ?>
                <?php if($view === 'list'): ?>
                    <div class="entity-list">
                        <?php $__currentLoopData = $sortedVisibleShelfBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('books.parts.list-item', ['book' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="grid third">
                        <?php $__currentLoopData = $sortedVisibleShelfBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('entities.grid-item', ['entity' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="mt-xl">
                    <hr>
                    <p class="text-muted italic mt-xl mb-m"><?php echo e(trans('entities.shelves_empty_contents')); ?></p>
                    <div class="icon-list inline block">
                        <?php if(userCan('book-create-all') && userCan('bookshelf-update', $shelf)): ?>
                            <a href="<?php echo e($shelf->getUrl('/create-book')); ?>" class="icon-list-item text-book">
                                <span class="icon"><?php echo (new \BookStack\Util\SvgIcon('add'))->toHtml(); ?></span>
                                <span><?php echo e(trans('entities.books_create')); ?></span>
                            </a>
                        <?php endif; ?>
                        <?php if(userCan('bookshelf-update', $shelf)): ?>
                            <a href="<?php echo e($shelf->getUrl('/edit')); ?>" class="icon-list-item text-bookshelf">
                                <span class="icon"><?php echo (new \BookStack\Util\SvgIcon('edit'))->toHtml(); ?></span>
                                <span><?php echo e(trans('entities.shelves_edit_and_assign')); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('left'); ?>

    <?php if($shelf->tags->count() > 0): ?>
        <div id="tags" class="mb-xl">
            <?php echo $__env->make('entities.tag-list', ['entity' => $shelf], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    <?php endif; ?>

    <div id="details" class="mb-xl">
        <h5><?php echo e(trans('common.details')); ?></h5>
        <div class="blended-links">
            <?php echo $__env->make('entities.meta', ['entity' => $shelf, 'watchOptions' => null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php if($shelf->hasPermissions()): ?>
                <div class="active-restriction">
                    <?php if(userCan('restrictions-manage', $shelf)): ?>
                        <a href="<?php echo e($shelf->getUrl('/permissions')); ?>" class="entity-meta-item">
                            <?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?>
                            <div><?php echo e(trans('entities.shelves_permissions_active')); ?></div>
                        </a>
                    <?php else: ?>
                        <div class="entity-meta-item">
                            <?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?>
                            <div><?php echo e(trans('entities.shelves_permissions_active')); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(count($activity) > 0): ?>
        <div id="recent-activity" class="mb-xl">
            <h5><?php echo e(trans('entities.recent_activity')); ?></h5>
            <?php echo $__env->make('common.activity-list', ['activity' => $activity], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right'); ?>
    <div class="actions mb-xl">
        <h5><?php echo e(trans('common.actions')); ?></h5>
        <div class="icon-list text-link">

            <?php if(userCan('book-create-all') && userCan('bookshelf-update', $shelf)): ?>
                <a href="<?php echo e($shelf->getUrl('/create-book')); ?>" data-shortcut="new" class="icon-list-item">
                    <span class="icon"><?php echo (new \BookStack\Util\SvgIcon('add'))->toHtml(); ?></span>
                    <span><?php echo e(trans('entities.books_new_action')); ?></span>
                </a>
            <?php endif; ?>

            <?php echo $__env->make('entities.view-toggle', ['view' => $view, 'type' => 'bookshelf'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <hr class="primary-background">

            <?php if(userCan('bookshelf-update', $shelf)): ?>
                <a href="<?php echo e($shelf->getUrl('/edit')); ?>" data-shortcut="edit" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('edit'))->toHtml(); ?></span>
                    <span><?php echo e(trans('common.edit')); ?></span>
                </a>
            <?php endif; ?>

            <?php if(userCan('restrictions-manage', $shelf)): ?>
                <a href="<?php echo e($shelf->getUrl('/permissions')); ?>" data-shortcut="permissions" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?></span>
                    <span><?php echo e(trans('entities.permissions')); ?></span>
                </a>
            <?php endif; ?>

            <?php if(userCan('bookshelf-delete', $shelf)): ?>
                <a href="<?php echo e($shelf->getUrl('/delete')); ?>" data-shortcut="delete" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('delete'))->toHtml(); ?></span>
                    <span><?php echo e(trans('common.delete')); ?></span>
                </a>
            <?php endif; ?>

            <?php if(!user()->isGuest()): ?>
                <hr class="primary-background">
                <?php echo $__env->make('entities.favourite-action', ['entity' => $shelf], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.tri', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/shelves/show.blade.php ENDPATH**/ ?>