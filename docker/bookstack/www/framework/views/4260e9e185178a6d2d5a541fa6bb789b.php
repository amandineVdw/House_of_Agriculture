<div class="content-wrap card auto-height">
    <h2 class="list-heading"><?php echo e(trans('entities.convert_to_shelf')); ?></h2>
    <p>
        <?php echo e(trans('entities.convert_to_shelf_contents_desc')); ?>

        <br><br>
        <?php echo e(trans('entities.convert_to_shelf_permissions_desc')); ?>

    </p>
    <div class="text-right">
        <div component="dropdown" class="dropdown-container">
            <button refs="dropdown@toggle" class="button outline" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('entities.convert_book')); ?></button>
            <ul refs="dropdown@menu" class="dropdown-menu" role="menu">
                <li class="px-m py-s text-small text-muted">
                    <?php echo e(trans('entities.convert_book_confirm')); ?>

                    <br>
                    <?php echo e(trans('entities.convert_undo_warning')); ?>

                </li>
                <li>
                    <form action="<?php echo e($book->getUrl('/convert-to-shelf')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <button type="submit" class="text-link text-item"><?php echo e(trans('common.confirm')); ?></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div><?php /**PATH /app/www/resources/views/books/parts/convert-to-shelf.blade.php ENDPATH**/ ?>