<?php $__env->startSection('main'); ?>
    <section class="card content-wrap">
        <form action="<?php echo e(url('/my-account/shortcuts')); ?>" method="post">
            <?php echo e(method_field('put')); ?>

            <?php echo e(csrf_field()); ?>


            <h1 class="list-heading"><?php echo e(trans('preferences.shortcuts_interface')); ?></h1>

            <div class="flex-container-row items-center gap-m wrap mb-m">
                <p class="flex mb-none min-width-m text-small text-muted">
                    <?php echo e(trans('preferences.shortcuts_toggle_desc')); ?>

                    <?php echo e(trans('preferences.shortcuts_customize_desc')); ?>

                </p>
                <div class="flex min-width-m text-m-center">
                    <?php echo $__env->make('form.toggle-switch', [
                        'name' => 'enabled',
                        'value' => $enabled,
                        'label' => trans('preferences.shortcuts_toggle_label'),
                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <hr>

            <h2 class="list-heading mb-m"><?php echo e(trans('preferences.shortcuts_section_navigation')); ?></h2>
            <div class="flex-container-row wrap gap-m mb-xl">
                <div class="flex min-width-l item-list">
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.homepage'), 'id' => 'home_view'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('entities.shelves'), 'id' => 'shelves_view'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('entities.books'), 'id' => 'books_view'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('settings.settings'), 'id' => 'settings_view'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('entities.my_favourites'), 'id' => 'favourites_view'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
                <div class="flex min-width-l item-list">
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.view_profile'), 'id' => 'profile_view'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('auth.logout'), 'id' => 'logout'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.global_search'), 'id' => 'global_search'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.next'), 'id' => 'next'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.previous'), 'id' => 'previous'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <h2 class="list-heading mb-m"><?php echo e(trans('preferences.shortcuts_section_actions')); ?></h2>
            <div class="flex-container-row wrap gap-m mb-xl">
                <div class="flex min-width-l item-list">
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.new'), 'id' => 'new'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.edit'), 'id' => 'edit'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.copy'), 'id' => 'copy'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.delete'), 'id' => 'delete'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.favourite'), 'id' => 'favourite'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
                <div class="flex min-width-l item-list">
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('entities.export'), 'id' => 'export'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.sort'), 'id' => 'sort'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('entities.permissions'), 'id' => 'permissions'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('common.move'), 'id' => 'move'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.account.parts.shortcut-control', ['label' => trans('entities.revisions'), 'id' => 'revisions'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <p class="text-small text-muted"><?php echo e(trans('preferences.shortcuts_overlay_desc')); ?></p>

            <div class="form-group text-right">
                <button class="button"><?php echo e(trans('preferences.shortcuts_save')); ?></button>
            </div>

        </form>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.account.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/account/shortcuts.blade.php ENDPATH**/ ?>