<?php $__env->startSection('body'); ?>

    <div class="container px-xl py-s flex-container-row gap-l wrap justify-space-between">
        <div class="icon-list inline block">
            <?php echo $__env->make('home.parts.expand-toggle', ['classes' => 'text-muted text-link', 'target' => '.entity-list.compact .entity-item-snippet', 'key' => 'home-details'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <div>
            <div class="icon-list inline block">
                <?php echo $__env->make('common.dark-mode-toggle', ['classes' => 'text-muted icon-list-item text-link'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    </div>

    <div class="container" id="home-default">
        <div class="grid third gap-x-xxl no-row-gap">
            <div>
                <?php if(count($draftPages) > 0): ?>
                    <div id="recent-drafts" class="card mb-xl">
                        <h3 class="card-title"><?php echo e(trans('entities.my_recent_drafts')); ?></h3>
                        <div class="px-m">
                            <?php echo $__env->make('entities.list', ['entities' => $draftPages, 'style' => 'compact'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div id="<?php echo e(auth()->check() ? 'recently-viewed' : 'recent-books'); ?>" class="card mb-xl">
                    <h3 class="card-title"><?php echo e(trans('entities.' . (auth()->check() ? 'my_recently_viewed' : 'books_recent'))); ?></h3>
                    <div class="px-m">
                        <?php echo $__env->make('entities.list', [
                        'entities' => $recents,
                        'style' => 'compact',
                        'emptyText' => auth()->check() ? trans('entities.no_pages_viewed') : trans('entities.books_empty')
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>
            </div>

            <div>
                <?php if(count($favourites) > 0): ?>
                    <div id="top-favourites" class="card mb-xl">
                        <h3 class="card-title"><?php echo e(trans('entities.my_most_viewed_favourites')); ?></h3>
                        <div class="px-m">
                            <?php echo $__env->make('entities.list', [
                            'entities' => $favourites,
                            'style' => 'compact',
                            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                        <a href="<?php echo e(url('/favourites')); ?>" class="card-footer-link"><?php echo e(trans('common.view_all')); ?></a>
                    </div>
                <?php endif; ?>

                <div id="recent-pages" class="card mb-xl">
                    <h3 class="card-title"><?php echo e(trans('entities.recently_updated_pages')); ?></h3>
                    <div id="recently-updated-pages" class="px-m">
                        <?php echo $__env->make('entities.list', [
                        'entities' => $recentlyUpdatedPages,
                        'style' => 'compact',
                        'emptyText' => trans('entities.no_pages_recently_updated'),
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                    <?php if(count($recentlyUpdatedPages) > 0): ?>
                        <a href="<?php echo e(url("/pages/recently-updated")); ?>" class="card-footer-link"><?php echo e(trans('common.view_all')); ?></a>
                    <?php endif; ?>
                </div>
            </div>

            <div>
                <div id="recent-activity" class="card mb-xl">
                    <h3 class="card-title"><?php echo e(trans('entities.recent_activity')); ?></h3>
                    <div class="px-m">
                        <?php echo $__env->make('common.activity-list', ['activity' => $activity], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/home/default.blade.php ENDPATH**/ ?>