


<div>
    <?php if($activity->user): ?>
    <img class="avatar" src="<?php echo e($activity->user->getAvatar(30)); ?>" alt="<?php echo e($activity->user->name); ?>">
    <?php endif; ?>
</div>

<div>
    <?php if($activity->user): ?>
        <a href="<?php echo e($activity->user->getProfileUrl()); ?>"><?php echo e($activity->user->name); ?></a>
    <?php else: ?>
        <?php echo e(trans('common.deleted_user')); ?>

    <?php endif; ?>

    <?php echo e($activity->getText()); ?>


    <?php if($activity->loggable && is_null($activity->loggable->deleted_at)): ?>
        <a href="<?php echo e($activity->loggable->getUrl()); ?>"><?php echo e($activity->loggable->name); ?></a>
    <?php endif; ?>

    <?php if($activity->loggable && !is_null($activity->loggable->deleted_at)): ?>
        "<?php echo e($activity->loggable->name); ?>"
    <?php endif; ?>

    <br>

    <span class="text-muted"><small><?php echo (new \BookStack\Util\SvgIcon('time'))->toHtml(); ?><?php echo e($activity->created_at->diffForHumans()); ?></small></span>
</div>
<?php /**PATH /app/www/resources/views/common/activity-item.blade.php ENDPATH**/ ?>