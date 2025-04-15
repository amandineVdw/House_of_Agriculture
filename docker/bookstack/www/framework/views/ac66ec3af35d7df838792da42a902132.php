<?php $__env->startSection('body'); ?>

    <div class="container medium pt-xl">

        <div class="grid right-focus reverse-collapse">

            <div>
                <section id="recent-user-activity" class="mb-xl">
                    <h5><?php echo e(trans('entities.recent_activity')); ?></h5>
                    <?php echo $__env->make('common.activity-list', ['activity' => $activity], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </section>
            </div>

            <div>
                <section class="card content-wrap auto-height">
                    <div class="grid half v-center">
                        <div>
                            <div class="mr-m float left">
                                <img class="avatar square huge" src="<?php echo e($user->getAvatar(120)); ?>" alt="<?php echo e($user->name); ?>">
                            </div>
                            <div>
                                <h4 class="mt-md"><?php echo e($user->name); ?></h4>
                                <p class="text-muted">
                                    <?php echo e(trans('entities.profile_user_for_x', ['time' => $user->created_at->diffForHumans(null, true)])); ?>

                                </p>
                            </div>
                        </div>
                        <div id="content-counts">
                            <div class="text-muted"><?php echo e(trans('entities.profile_created_content')); ?></div>
                            <div class="grid half v-center no-row-gap">
                                <div class="icon-list">
                                    <a href="#recent-pages" class="text-page icon-list-item">
                                        <span><?php echo (new \BookStack\Util\SvgIcon('page'))->toHtml(); ?></span>
                                        <span><?php echo e(trans_choice('entities.x_pages', $assetCounts['pages'])); ?></span>
                                    </a>
                                    <a href="#recent-chapters" class="text-chapter icon-list-item">
                                        <span><?php echo (new \BookStack\Util\SvgIcon('chapter'))->toHtml(); ?></span>
                                        <span><?php echo e(trans_choice('entities.x_chapters', $assetCounts['chapters'])); ?></span>
                                    </a>
                                </div>
                                <div class="icon-list">
                                    <a href="#recent-books" class="text-book icon-list-item">
                                        <span><?php echo (new \BookStack\Util\SvgIcon('book'))->toHtml(); ?></span>
                                        <span><?php echo e(trans_choice('entities.x_books', $assetCounts['books'])); ?></span>
                                    </a>
                                    <a href="#recent-shelves" class="text-bookshelf icon-list-item">
                                        <span><?php echo (new \BookStack\Util\SvgIcon('bookshelf'))->toHtml(); ?></span>
                                        <span><?php echo e(trans_choice('entities.x_shelves', $assetCounts['shelves'])); ?></span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <section class="card content-wrap auto-height book-contents">
                    <h2 id="recent-pages" class="list-heading">
                        <?php echo e(trans('entities.recently_created_pages')); ?>

                        <?php if(count($recentlyCreated['pages']) > 0): ?>
                            <a href="<?php echo e(url('/search?term=' . urlencode('{created_by:'.$user->slug.'} {type:page}') )); ?>" class="text-small ml-s"><?php echo e(trans('common.view_all')); ?></a>
                        <?php endif; ?>
                    </h2>
                    <?php if(count($recentlyCreated['pages']) > 0): ?>
                        <?php echo $__env->make('entities.list', ['entities' => $recentlyCreated['pages'], 'showPath' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php else: ?>
                        <p class="text-muted"><?php echo e(trans('entities.profile_not_created_pages', ['userName' => $user->name])); ?></p>
                    <?php endif; ?>
                </section>

                <section class="card content-wrap auto-height book-contents">
                    <h2 id="recent-chapters" class="list-heading">
                        <?php echo e(trans('entities.recently_created_chapters')); ?>

                        <?php if(count($recentlyCreated['chapters']) > 0): ?>
                            <a href="<?php echo e(url('/search?term=' . urlencode('{created_by:'.$user->slug.'} {type:chapter}') )); ?>" class="text-small ml-s"><?php echo e(trans('common.view_all')); ?></a>
                        <?php endif; ?>
                    </h2>
                    <?php if(count($recentlyCreated['chapters']) > 0): ?>
                        <?php echo $__env->make('entities.list', ['entities' => $recentlyCreated['chapters'], 'showPath' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php else: ?>
                        <p class="text-muted"><?php echo e(trans('entities.profile_not_created_chapters', ['userName' => $user->name])); ?></p>
                    <?php endif; ?>
                </section>

                <section class="card content-wrap auto-height book-contents">
                    <h2 id="recent-books" class="list-heading">
                        <?php echo e(trans('entities.recently_created_books')); ?>

                        <?php if(count($recentlyCreated['books']) > 0): ?>
                            <a href="<?php echo e(url('/search?term=' . urlencode('{created_by:'.$user->slug.'} {type:book}') )); ?>" class="text-small ml-s"><?php echo e(trans('common.view_all')); ?></a>
                        <?php endif; ?>
                    </h2>
                    <?php if(count($recentlyCreated['books']) > 0): ?>
                        <?php echo $__env->make('entities.list', ['entities' => $recentlyCreated['books'], 'showPath' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php else: ?>
                        <p class="text-muted"><?php echo e(trans('entities.profile_not_created_books', ['userName' => $user->name])); ?></p>
                    <?php endif; ?>
                </section>

                <section class="card content-wrap auto-height book-contents">
                    <h2 id="recent-shelves" class="list-heading">
                        <?php echo e(trans('entities.recently_created_shelves')); ?>

                        <?php if(count($recentlyCreated['shelves']) > 0): ?>
                            <a href="<?php echo e(url('/search?term=' . urlencode('{created_by:'.$user->slug.'} {type:bookshelf}') )); ?>" class="text-small ml-s"><?php echo e(trans('common.view_all')); ?></a>
                        <?php endif; ?>
                    </h2>
                    <?php if(count($recentlyCreated['shelves']) > 0): ?>
                        <?php echo $__env->make('entities.list', ['entities' => $recentlyCreated['shelves'], 'showPath' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php else: ?>
                        <p class="text-muted"><?php echo e(trans('entities.profile_not_created_shelves', ['userName' => $user->name])); ?></p>
                    <?php endif; ?>
                </section>
            </div>

        </div>


    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/profile.blade.php ENDPATH**/ ?>