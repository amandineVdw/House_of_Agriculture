<main class="content-wrap mt-m card">

    <div class="grid half v-center">
        <h1 class="list-heading"><?php echo e(trans('entities.shelves')); ?></h1>
        <div class="text-right">
            <?php echo $__env->make('common.sort', $listOptions->getSortControlData(), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>

    <?php if(count($shelves) > 0): ?>
        <?php if($view === 'list'): ?>
            <div class="entity-list">
                <?php $__currentLoopData = $shelves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $shelf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($index !== 0): ?>
                        <hr class="my-m">
                    <?php endif; ?>
                    <?php echo $__env->make('shelves.parts.list-item', ['shelf' => $shelf], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="grid third">
                <?php $__currentLoopData = $shelves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shelf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('entities.grid-item', ['entity' => $shelf], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <div>
            <?php echo $shelves->render(); ?>

        </div>
    <?php else: ?>
        <p class="text-muted"><?php echo e(trans('entities.shelves_empty')); ?></p>
        <?php if(userCan('bookshelf-create-all')): ?>
            <div class="icon-list block inline">
                <a href="<?php echo e(url("/create-shelf")); ?>"
                   class="icon-list-item text-bookshelf">
                    <span><?php echo (new \BookStack\Util\SvgIcon('add'))->toHtml(); ?></span>
                    <span><?php echo e(trans('entities.create_now')); ?></span>
                </a>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</main>
<?php /**PATH /app/www/resources/views/shelves/parts/list.blade.php ENDPATH**/ ?>