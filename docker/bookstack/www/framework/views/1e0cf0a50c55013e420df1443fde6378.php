<?php $__env->startSection('main'); ?>
    <section class="card content-wrap auto-height">
        <form action="<?php echo e(url('/my-account/notifications')); ?>" method="post">
            <?php echo e(method_field('put')); ?>

            <?php echo e(csrf_field()); ?>


            <h1 class="list-heading"><?php echo e(trans('preferences.notifications')); ?></h1>
            <p class="text-small text-muted"><?php echo e(trans('preferences.notifications_desc')); ?></p>

            <div class="flex-container-row wrap justify-space-between pb-m">
                <div class="toggle-switch-list min-width-l">
                    <div>
                        <?php echo $__env->make('form.toggle-switch', [
                            'name' => 'preferences[own-page-changes]',
                            'value' => $preferences->notifyOnOwnPageChanges(),
                            'label' => trans('preferences.notifications_opt_own_page_changes'),
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                    <?php if(!setting('app-disable-comments')): ?>
                        <div>
                            <?php echo $__env->make('form.toggle-switch', [
                                'name' => 'preferences[own-page-comments]',
                                'value' => $preferences->notifyOnOwnPageComments(),
                                'label' => trans('preferences.notifications_opt_own_page_comments'),
                            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                        <div>
                            <?php echo $__env->make('form.toggle-switch', [
                                'name' => 'preferences[comment-replies]',
                                'value' => $preferences->notifyOnCommentReplies(),
                                'label' => trans('preferences.notifications_opt_comment_replies'),
                            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mt-auto">
                    <button class="button"><?php echo e(trans('preferences.notifications_save')); ?></button>
                </div>
            </div>

        </form>
    </section>

    <section class="card content-wrap auto-height">
        <h2 class="list-heading"><?php echo e(trans('preferences.notifications_watched')); ?></h2>
        <p class="text-small text-muted"><?php echo e(trans('preferences.notifications_watched_desc')); ?></p>

        <?php if($watches->isEmpty()): ?>
            <p class="text-muted italic"><?php echo e(trans('common.no_items')); ?></p>
        <?php else: ?>
            <div class="item-list">
                <?php $__currentLoopData = $watches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $watch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex-container-row justify-space-between item-list-row items-center wrap px-m py-s">
                        <div class="py-xs px-s min-width-m">
                            <?php echo $__env->make('entities.icon-link', ['entity' => $watch->watchable], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                        <div class="py-xs min-width-m text-m-right px-m">
                            <?php echo (new \BookStack\Util\SvgIcon('watch' . ($watch->ignoring() ? '-ignore' : '')))->toHtml(); ?>
                            <?php echo e(trans('entities.watch_title_' . $watch->getLevelName())); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="my-m"><?php echo e($watches->links()); ?></div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.account.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/account/notifications.blade.php ENDPATH**/ ?>