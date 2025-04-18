<?php $__env->startPush('head'); ?>
    <script src="<?php echo e(versioned_asset('libs/tinymce/tinymce.min.js')); ?>" nonce="<?php echo e($cspNonce); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo e(csrf_field()); ?>

<div class="form-group title-input">
    <label for="name"><?php echo e(trans('common.name')); ?></label>
    <?php echo $__env->make('form.text', ['name' => 'name', 'autofocus' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<div class="form-group description-input">
    <label for="description_html"><?php echo e(trans('common.description')); ?></label>
    <?php echo $__env->make('form.description-html-input', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<div component="shelf-sort" class="grid half gap-xl">
    <div class="form-group">
        <label for="books" id="shelf-sort-books-label"><?php echo e(trans('entities.shelves_books')); ?></label>
        <input refs="shelf-sort@input" type="hidden" name="books"
               value="<?php echo e(isset($shelf) ? $shelf->visibleBooks->implode('id', ',') : ''); ?>">
        <div class="scroll-box-header-item flex-container-row items-center py-xs">
            <span class="px-m py-xs"><?php echo e(trans('entities.shelves_drag_books')); ?></span>
            <div class="dropdown-container ml-auto" component="dropdown">
                <button refs="dropdown@toggle"
                        type="button"
                        title="<?php echo e(trans('common.more')); ?>"
                        class="icon-button px-xs py-xxs mx-xs text-bigger"
                        aria-haspopup="true"
                        aria-expanded="false">
                    <?php echo (new \BookStack\Util\SvgIcon('more'))->toHtml(); ?>
                </button>
                <div refs="dropdown@menu shelf-sort@sort-button-container" class="dropdown-menu" role="menu">
                    <button type="button" class="text-item" data-sort="name"><?php echo e(trans('entities.books_sort_name')); ?></button>
                    <button type="button" class="text-item" data-sort="created"><?php echo e(trans('entities.books_sort_created')); ?></button>
                    <button type="button" class="text-item" data-sort="updated"><?php echo e(trans('entities.books_sort_updated')); ?></button>
                </div>
            </div>
        </div>
        <ul refs="shelf-sort@shelf-book-list"
            aria-labelledby="shelf-sort-books-label"
            class="scroll-box configured-option-list">
            <?php $__currentLoopData = ($shelf->visibleBooks ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('shelves.parts.shelf-sort-book-item', ['book' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="form-group">
        <label for="books" id="shelf-sort-all-books-label"><?php echo e(trans('entities.shelves_add_books')); ?></label>
        <input type="text" refs="shelf-sort@book-search" class="scroll-box-search" placeholder="<?php echo e(trans('common.search')); ?>">
        <ul refs="shelf-sort@all-book-list"
            aria-labelledby="shelf-sort-all-books-label"
            class="scroll-box available-option-list">
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('shelves.parts.shelf-sort-book-item', ['book' => $book], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>



<div class="form-group collapsible" component="collapsible" id="logo-control">
    <button refs="collapsible@trigger" type="button" class="collapse-title text-link" aria-expanded="false">
        <label><?php echo e(trans('common.cover_image')); ?></label>
    </button>
    <div refs="collapsible@content" class="collapse-content">
        <p class="small"><?php echo e(trans('common.cover_image_description')); ?></p>

        <?php echo $__env->make('form.image-picker', [
            'defaultImage' => url('/book_default_cover.png'),
            'currentImage' => (isset($shelf) && $shelf->cover) ? $shelf->getBookCover() : url('/book_default_cover.png') ,
            'name' => 'image',
            'imageClass' => 'cover'
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div>

<div class="form-group collapsible" component="collapsible" id="tags-control">
    <button refs="collapsible@trigger" type="button" class="collapse-title text-link" aria-expanded="false">
        <label for="tag-manager"><?php echo e(trans('entities.shelf_tags')); ?></label>
    </button>
    <div refs="collapsible@content" class="collapse-content">
        <?php echo $__env->make('entities.tag-manager', ['entity' => $shelf ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div>

<div class="form-group text-right">
    <a href="<?php echo e(isset($shelf) ? $shelf->getUrl() : url('/shelves')); ?>" class="button outline"><?php echo e(trans('common.cancel')); ?></a>
    <button type="submit" class="button"><?php echo e(trans('entities.shelves_save')); ?></button>
</div>

<?php echo $__env->make('entities.selector-popup', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('form.editor-translations', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/shelves/parts/form.blade.php ENDPATH**/ ?>