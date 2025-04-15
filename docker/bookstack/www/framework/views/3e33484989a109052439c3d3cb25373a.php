<div id="sibling-navigation" class="grid half collapse-xs items-center mb-m px-m no-row-gap fade-in-when-active print-hidden">
    <div>
        <?php if($previous): ?>
            <a href="<?php echo e($previous->getUrl()); ?>" data-shortcut="previous" class="outline-hover no-link-style block rounded">
                <div class="px-m pt-xs text-muted"><?php echo e(trans('common.previous')); ?></div>
                <div class="inline-block">
                    <div class="icon-list-item no-hover">
                        <span class="text-<?php echo e($previous->getType()); ?> "><?php echo (new \BookStack\Util\SvgIcon($previous->getType()))->toHtml(); ?></span>
                        <span><?php echo e($previous->getShortName(48)); ?></span>
                    </div>
                </div>
            </a>
        <?php endif; ?>
    </div>
    <div>
        <?php if($next): ?>
            <a href="<?php echo e($next->getUrl()); ?>" data-shortcut="next" class="outline-hover no-link-style block rounded text-xs-right">
                <div class="px-m pt-xs text-muted text-xs-right"><?php echo e(trans('common.next')); ?></div>
                <div class="inline block">
                    <div class="icon-list-item no-hover">
                        <span class="text-<?php echo e($next->getType()); ?> "><?php echo (new \BookStack\Util\SvgIcon($next->getType()))->toHtml(); ?></span>
                        <span><?php echo e($next->getShortName(48)); ?></span>
                    </div>
                </div>
            </a>
        <?php endif; ?>
    </div>
</div><?php /**PATH /app/www/resources/views/entities/sibling-navigation.blade.php ENDPATH**/ ?>