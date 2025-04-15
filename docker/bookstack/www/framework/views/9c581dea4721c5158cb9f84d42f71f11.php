<div components="dropdown dropdown-search"
     option:dropdown-search:url="/search/entity/siblings?entity_type=<?php echo e($entity->getType()); ?>&entity_id=<?php echo e($entity->id); ?>"
     option:dropdown-search:local-search-selector=".entity-list-item"
     class="dropdown-search">
    <div class="dropdown-search-toggle-breadcrumb" refs="dropdown@toggle"
         aria-haspopup="true" aria-expanded="false" tabindex="0">
        <div class="separator"><?php echo (new \BookStack\Util\SvgIcon('chevron-right'))->toHtml(); ?></div>
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
        <div refs="dropdown-search@loading">
            <?php echo $__env->make('common.loading-icon', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <div refs="dropdown-search@listContainer" class="dropdown-search-list px-m" tabindex="-1"></div>
    </div>
</div><?php /**PATH /app/www/resources/views/entities/breadcrumb-listing.blade.php ENDPATH**/ ?>