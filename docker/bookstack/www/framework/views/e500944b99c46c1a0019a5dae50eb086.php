<div refs="entity-search@searchView" class="search-results hidden">
    <div class="grid half v-center">
        <h3 class="text-muted px-none">
            <?php echo e(trans('entities.search_results')); ?>

        </h3>
        <div class="text-right">
            <a refs="entity-search@clearButton" class="button outline"><?php echo e(trans('entities.search_clear')); ?></a>
        </div>
    </div>

    <div refs="entity-search@loadingBlock">
        <?php echo $__env->make('common.loading-icon', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    <div class="book-contents" refs="entity-search@searchResults"></div>
</div><?php /**PATH /app/www/resources/views/entities/search-results.blade.php ENDPATH**/ ?>