<div class="dropdown-search" components="dropdown dropdown-search user-select"
     option:dropdown-search:url="/search/users/select"
>
    <input refs="user-select@input" type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($user->id ?? ''); ?>">
    <div refs="dropdown@toggle"
         class="dropdown-search-toggle-select  input-base"
         aria-haspopup="true" aria-expanded="false" tabindex="0">
        <div refs="user-select@user-info" class="dropdown-search-toggle-select-label flex-container-row items-center">
            <?php if($user): ?>
                <img class="avatar small mr-m" src="<?php echo e($user->getAvatar(30)); ?>" width="30" height="30" alt="<?php echo e($user->name); ?>">
                <span><?php echo e($user->name); ?></span>
            <?php else: ?>
                <span><?php echo e(trans('settings.users_none_selected')); ?></span>
            <?php endif; ?>
        </div>
        <span class="dropdown-search-toggle-select-caret">
            <?php echo (new \BookStack\Util\SvgIcon('caret-down'))->toHtml(); ?>
        </span>
    </div>
    <div refs="dropdown@menu" class="dropdown-search-dropdown card" role="menu">
        <div class="dropdown-search-search">
            <?php echo (new \BookStack\Util\SvgIcon('search'))->toHtml(); ?>
            <input refs="dropdown-search@searchInput"
                   aria-label="<?php echo e(trans('common.search')); ?>"
                   autocomplete="off"
                   placeholder="<?php echo e(trans('common.search')); ?>"
                   type="text">
        </div>
        <div refs="dropdown-search@loading" class="text-center">
            <?php echo $__env->make('common.loading-icon', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <div refs="dropdown-search@listContainer" class="dropdown-search-list"></div>
    </div>
</div><?php /**PATH /app/www/resources/views/form/user-select.blade.php ENDPATH**/ ?>