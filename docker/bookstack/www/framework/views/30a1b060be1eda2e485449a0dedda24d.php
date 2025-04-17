<section component="page-comments"
         option:page-comments:page-id="<?php echo e($page->id); ?>"
         option:page-comments:created-text="<?php echo e(trans('entities.comment_created_success')); ?>"
         option:page-comments:count-text="<?php echo e(trans('entities.comment_count')); ?>"
         option:page-comments:wysiwyg-language="<?php echo e($locale->htmlLang()); ?>"
         option:page-comments:wysiwyg-text-direction="<?php echo e($locale->htmlDirection()); ?>"
         class="comments-list"
         aria-label="<?php echo e(trans('entities.comments')); ?>">

    <div refs="page-comments@comment-count-bar" class="grid half left-focus v-center no-row-gap">
        <h5 refs="page-comments@comments-title"><?php echo e(trans_choice('entities.comment_count', $commentTree->count(), ['count' => $commentTree->count()])); ?></h5>
        <?php if($commentTree->empty() && userCan('comment-create-all')): ?>
            <div class="text-m-right" refs="page-comments@add-button-container">
                <button type="button"
                        refs="page-comments@add-comment-button"
                        class="button outline"><?php echo e(trans('entities.comment_add')); ?></button>
            </div>
        <?php endif; ?>
    </div>

    <div refs="page-comments@commentContainer" class="comment-container">
        <?php $__currentLoopData = $commentTree->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('comments.comment-branch', ['branch' => $branch, 'readOnly' => false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if(userCan('comment-create-all')): ?>
        <?php echo $__env->make('comments.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php if(!$commentTree->empty()): ?>
            <div refs="page-comments@addButtonContainer" class="text-right">
                <button type="button"
                        refs="page-comments@add-comment-button"
                        class="button outline"><?php echo e(trans('entities.comment_add')); ?></button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(userCan('comment-create-all') || $commentTree->canUpdateAny()): ?>
        <?php $__env->startPush('body-end'); ?>
            <script src="<?php echo e(versioned_asset('libs/tinymce/tinymce.min.js')); ?>" nonce="<?php echo e($cspNonce); ?>" defer></script>
            <?php echo $__env->make('form.editor-translations', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('entities.selector-popup', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php $__env->stopPush(); ?>
    <?php endif; ?>

</section><?php /**PATH /app/www/resources/views/comments/comments.blade.php ENDPATH**/ ?>