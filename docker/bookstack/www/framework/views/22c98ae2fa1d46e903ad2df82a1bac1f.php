<form component="global-search" action="<?php echo e(url('/search')); ?>" method="GET" class="search-box" role="search" tabindex="0">
    <button id="header-search-box-button"
            refs="global-search@button"
            type="submit"
            aria-label="<?php echo e(trans('common.search')); ?>"
            tabindex="-1"><?php echo (new \BookStack\Util\SvgIcon('search'))->toHtml(); ?></button>
    <input id="header-search-box-input"
           refs="global-search@input"
           type="text"
           name="term"
           data-shortcut="global_search"
           autocomplete="off"
           aria-label="<?php echo e(trans('common.search')); ?>" placeholder="<?php echo e(trans('common.search')); ?>"
           value="<?php echo e($searchTerm ?? ''); ?>">
    <div refs="global-search@suggestions" class="global-search-suggestions card">
        <div refs="global-search@loading" class="text-center px-m global-search-loading"><?php echo $__env->make('common.loading-icon', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></div>
        <div refs="global-search@suggestion-results" class="px-m"></div>
        <button class="text-button card-footer-link" type="submit"><?php echo e(trans('common.view_all')); ?></button>
    </div>
</form><?php /**PATH /app/www/resources/views/layouts/parts/header-search.blade.php ENDPATH**/ ?>