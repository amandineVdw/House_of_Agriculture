<?php $__env->startSection('body'); ?>
<div class="container small">

    <?php echo $__env->make('settings.parts.navbar', ['selected' => 'maintenance'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="card content-wrap auto-height pb-xl">
        <h2 class="list-heading"><?php echo e(trans('settings.recycle_bin')); ?></h2>
        <div class="grid half gap-xl">
            <div>
                <p class="small text-muted"><?php echo e(trans('settings.maint_recycle_bin_desc')); ?></p>
            </div>
            <div>
                <div class="grid half no-gap mb-m">
                    <p class="mb-xs text-bookshelf"><?php echo (new \BookStack\Util\SvgIcon('bookshelf'))->toHtml(); ?><?php echo e(trans('entities.shelves')); ?>: <?php echo e($recycleStats['bookshelf']); ?></p>
                    <p class="mb-xs text-book"><?php echo (new \BookStack\Util\SvgIcon('book'))->toHtml(); ?><?php echo e(trans('entities.books')); ?>: <?php echo e($recycleStats['book']); ?></p>
                    <p class="mb-xs text-chapter"><?php echo (new \BookStack\Util\SvgIcon('chapter'))->toHtml(); ?><?php echo e(trans('entities.chapters')); ?>: <?php echo e($recycleStats['chapter']); ?></p>
                    <p class="mb-xs text-page"><?php echo (new \BookStack\Util\SvgIcon('page'))->toHtml(); ?><?php echo e(trans('entities.pages')); ?>: <?php echo e($recycleStats['page']); ?></p>
                </div>
                <a href="<?php echo e(url('/settings/recycle-bin')); ?>" class="button outline"><?php echo e(trans('settings.maint_recycle_bin_open')); ?></a>
            </div>
        </div>
    </div>

    <div id="image-cleanup" class="card content-wrap auto-height">
        <h2 class="list-heading"><?php echo e(trans('settings.maint_image_cleanup')); ?></h2>
        <div class="grid left-focus gap-xl">
            <div>
                <p class="small text-muted"><?php echo e(trans('settings.maint_image_cleanup_desc')); ?></p>
                <p class="small text-muted italic"><?php echo e(trans('settings.maint_timeout_command_note')); ?></p>
            </div>
            <div>
                <form method="POST" action="<?php echo e(url('/settings/maintenance/cleanup-images')); ?>">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="_method" value="DELETE">
                    <div class="mb-s">
                        <?php if(session()->has('cleanup-images-warning')): ?>
                            <p class="text-neg">
                                <?php echo e(session()->get('cleanup-images-warning')); ?>

                            </p>
                            <input type="hidden" name="ignore_revisions" value="<?php echo e(session()->getOldInput('ignore_revisions', 'false')); ?>">
                            <input type="hidden" name="confirm" value="true">
                        <?php else: ?>
                            <label class="flex-container-row">
                                <div class="mr-s"><input type="checkbox" name="ignore_revisions" value="true"></div>
                                <div><?php echo e(trans('settings.maint_delete_images_only_in_revisions')); ?></div>
                            </label>
                        <?php endif; ?>
                    </div>
                    <button class="button outline"><?php echo e(trans('settings.maint_image_cleanup_run')); ?></button>
                </form>
            </div>
        </div>
    </div>

    <div id="send-test-email" class="card content-wrap auto-height">
        <h2 class="list-heading"><?php echo e(trans('settings.maint_send_test_email')); ?></h2>
        <div class="grid left-focus gap-xl">
            <div>
                <p class="small text-muted"><?php echo e(trans('settings.maint_send_test_email_desc')); ?></p>
            </div>
            <div>
                <form method="POST" action="<?php echo e(url('/settings/maintenance/send-test-email')); ?>">
                    <?php echo csrf_field(); ?>

                    <button class="button outline"><?php echo e(trans('settings.maint_send_test_email_run')); ?></button>
                </form>
            </div>
        </div>
    </div>

    <div id="regenerate-references" class="card content-wrap auto-height">
        <h2 class="list-heading"><?php echo e(trans('settings.maint_regen_references')); ?></h2>
        <div class="grid left-focus gap-xl">
            <div>
                <p class="small text-muted"><?php echo e(trans('settings.maint_regen_references_desc')); ?></p>
                <p class="small text-muted italic"><?php echo e(trans('settings.maint_timeout_command_note')); ?></p>
            </div>
            <div>
                <form method="POST" action="<?php echo e(url('/settings/maintenance/regenerate-references')); ?>">
                    <?php echo csrf_field(); ?>

                    <button class="button outline"><?php echo e(trans('settings.maint_regen_references')); ?></button>
                </form>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/settings/maintenance.blade.php ENDPATH**/ ?>