<div class="dropdown-container" component="dropdown" option:dropdown:bubble-escapes="true">
    <span class="user-name py-s hide-under-l" refs="dropdown@toggle"
          aria-haspopup="true" aria-expanded="false" aria-label="<?php echo e(trans('common.profile_menu')); ?>" tabindex="0">
        <img class="avatar" src="<?php echo e($user->getAvatar(30)); ?>" alt="<?php echo e($user->name); ?>">
        <span class="name"><?php echo e($user->getShortName(9)); ?></span> <?php echo (new \BookStack\Util\SvgIcon('caret-down'))->toHtml(); ?>
    </span>
    <ul refs="dropdown@menu" class="dropdown-menu" role="menu">
        <li>
            <a href="<?php echo e(url('/favourites')); ?>" data-shortcut="favourites_view" class="icon-item">
                <?php echo (new \BookStack\Util\SvgIcon('star'))->toHtml(); ?>
                <div><?php echo e(trans('entities.my_favourites')); ?></div>
            </a>
        </li>
        <li>
            <a href="<?php echo e($user->getProfileUrl()); ?>" data-shortcut="profile_view" class="icon-item">
                <?php echo (new \BookStack\Util\SvgIcon('user'))->toHtml(); ?>
                <div><?php echo e(trans('common.view_profile')); ?></div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(url('/my-account')); ?>" class="icon-item">
                <?php echo (new \BookStack\Util\SvgIcon('user-preferences'))->toHtml(); ?>
                <div><?php echo e(trans('preferences.my_account')); ?></div>
            </a>
        </li>
        <li><hr></li>
        <li>
            <?php echo $__env->make('common.dark-mode-toggle', ['classes' => 'icon-item'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </li>
        <li><hr></li>
        <li>
            <?php
                $logoutPath = match (config('auth.method')) {
                    'saml2' => '/saml2/logout',
                    'oidc' => '/oidc/logout',
                    default => '/logout',
                }
            ?>
            <form action="<?php echo e(url($logoutPath)); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <button class="icon-item" data-shortcut="logout">
                    <?php echo (new \BookStack\Util\SvgIcon('logout'))->toHtml(); ?>
                    <div><?php echo e(trans('auth.logout')); ?></div>
                </button>
            </form>
        </li>
    </ul>
</div><?php /**PATH /app/www/resources/views/layouts/parts/header-user-menu.blade.php ENDPATH**/ ?>