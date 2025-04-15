<?php $__env->startPush('social-meta'); ?>
    <meta property="og:description" content="<?php echo e(Str::limit($page->text, 100, '...')); ?>">
<?php $__env->stopPush(); ?>

<?php echo $__env->make('entities.body-tag-classes', ['entity' => $page], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->startSection('body'); ?>

    <div class="mb-m print-hidden">
        <?php echo $__env->make('entities.breadcrumbs', ['crumbs' => [
            $page->book,
            $page->hasChapter() ? $page->chapter : null,
            $page,
        ]], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <main class="content-wrap card">
        <div component="page-display"
             option:page-display:page-id="<?php echo e($page->id); ?>"
             class="page-content clearfix">
            <?php echo $__env->make('pages.parts.page-display', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <?php echo $__env->make('pages.parts.pointer', ['page' => $page], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </main>

    <?php echo $__env->make('entities.sibling-navigation', ['next' => $next, 'previous' => $previous], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if($commentTree->enabled()): ?>
        <?php if(($previous || $next)): ?>
            <div class="px-xl print-hidden">
                <hr class="darker">
            </div>
        <?php endif; ?>

        <div class="comments-container mb-l print-hidden">
            <?php echo $__env->make('comments.comments', ['commentTree' => $commentTree, 'page' => $page], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="clearfix"></div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('left'); ?>

    <?php if($page->tags->count() > 0): ?>
        <section>
            <?php echo $__env->make('entities.tag-list', ['entity' => $page], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </section>
    <?php endif; ?>

    <?php if($page->attachments->count() > 0): ?>
        <div id="page-attachments" class="mb-l">
            <h5><?php echo e(trans('entities.pages_attachments')); ?></h5>
            <div class="body">
                <?php echo $__env->make('attachments.list', ['attachments' => $page->attachments], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($pageNav) && count($pageNav)): ?>
        <nav id="page-navigation" class="mb-xl" aria-label="<?php echo e(trans('entities.pages_navigation')); ?>">
            <h5><?php echo e(trans('entities.pages_navigation')); ?></h5>
            <div class="body">
                <div class="sidebar-page-nav menu">
                    <?php $__currentLoopData = $pageNav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="page-nav-item h<?php echo e($navItem['level']); ?>">
                            <a href="<?php echo e($navItem['link']); ?>" class="text-limit-lines-1 block"><?php echo e($navItem['text']); ?></a>
                            <div class="link-background sidebar-page-nav-bullet"></div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </nav>
    <?php endif; ?>

    <?php echo $__env->make('entities.book-tree', ['book' => $book, 'sidebarTree' => $sidebarTree], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right'); ?>
    <div id="page-details" class="entity-details mb-xl">
        <h5><?php echo e(trans('common.details')); ?></h5>
        <div class="blended-links">
            <?php echo $__env->make('entities.meta', ['entity' => $page, 'watchOptions' => $watchOptions], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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

            <?php if($page->chapter && $page->chapter->hasPermissions()): ?>
                <div class="active-restriction">
                    <?php if(userCan('restrictions-manage', $page->chapter)): ?>
                        <a href="<?php echo e($page->chapter->getUrl('/permissions')); ?>" class="entity-meta-item">
                            <?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?>
                            <div><?php echo e(trans('entities.chapters_permissions_active')); ?></div>
                        </a>
                    <?php else: ?>
                        <div class="entity-meta-item">
                            <?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?>
                            <div><?php echo e(trans('entities.chapters_permissions_active')); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if($page->hasPermissions()): ?>
                <div class="active-restriction">
                    <?php if(userCan('restrictions-manage', $page)): ?>
                        <a href="<?php echo e($page->getUrl('/permissions')); ?>" class="entity-meta-item">
                            <?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?>
                            <div><?php echo e(trans('entities.pages_permissions_active')); ?></div>
                        </a>
                    <?php else: ?>
                        <div class="entity-meta-item">
                            <?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?>
                            <div><?php echo e(trans('entities.pages_permissions_active')); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if($page->template): ?>
                <div class="entity-meta-item">
                    <?php echo (new \BookStack\Util\SvgIcon('template'))->toHtml(); ?>
                    <div><?php echo e(trans('entities.pages_is_template')); ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="actions mb-xl">
        <h5><?php echo e(trans('common.actions')); ?></h5>

        <div class="icon-list text-link">

            
            <?php if(userCan('page-update', $page)): ?>
                <a href="<?php echo e($page->getUrl('/edit')); ?>" data-shortcut="edit" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('edit'))->toHtml(); ?></span>
                    <span><?php echo e(trans('common.edit')); ?></span>
                </a>
            <?php endif; ?>
            <?php if(userCanOnAny('create', \BookStack\Entities\Models\Book::class) || userCanOnAny('create', \BookStack\Entities\Models\Chapter::class) || userCan('page-create-all') || userCan('page-create-own')): ?>
                <a href="<?php echo e($page->getUrl('/copy')); ?>" data-shortcut="copy" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('copy'))->toHtml(); ?></span>
                    <span><?php echo e(trans('common.copy')); ?></span>
                </a>
            <?php endif; ?>
            <?php if(userCan('page-update', $page)): ?>
                <?php if(userCan('page-delete', $page)): ?>
	                <a href="<?php echo e($page->getUrl('/move')); ?>" data-shortcut="move" class="icon-list-item">
	                    <span><?php echo (new \BookStack\Util\SvgIcon('folder'))->toHtml(); ?></span>
	                    <span><?php echo e(trans('common.move')); ?></span>
	                </a>
                <?php endif; ?>
            <?php endif; ?>
            <a href="<?php echo e($page->getUrl('/revisions')); ?>" data-shortcut="revisions" class="icon-list-item">
                <span><?php echo (new \BookStack\Util\SvgIcon('history'))->toHtml(); ?></span>
                <span><?php echo e(trans('entities.revisions')); ?></span>
            </a>
            <?php if(userCan('restrictions-manage', $page)): ?>
                <a href="<?php echo e($page->getUrl('/permissions')); ?>" data-shortcut="permissions" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?></span>
                    <span><?php echo e(trans('entities.permissions')); ?></span>
                </a>
            <?php endif; ?>
            <?php if(userCan('page-delete', $page)): ?>
                <a href="<?php echo e($page->getUrl('/delete')); ?>" data-shortcut="delete" class="icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('delete'))->toHtml(); ?></span>
                    <span><?php echo e(trans('common.delete')); ?></span>
                </a>
            <?php endif; ?>

            <hr class="primary-background"/>

            <?php if($watchOptions->canWatch() && !$watchOptions->isWatching()): ?>
                <?php echo $__env->make('entities.watch-action', ['entity' => $page], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
            <?php if(!user()->isGuest()): ?>
                <?php echo $__env->make('entities.favourite-action', ['entity' => $page], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
            <?php if(userCan('content-export')): ?>
                <?php echo $__env->make('entities.export-menu', ['entity' => $page], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tri', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/pages/show.blade.php ENDPATH**/ ?>