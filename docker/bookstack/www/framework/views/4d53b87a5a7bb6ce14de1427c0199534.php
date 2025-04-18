<div dir="auto">

    <h1 class="break-text" id="bkmrk-page-title"><?php echo e($page->name); ?></h1>

    <div style="clear:left;"></div>

    <?php if(isset($diff) && $diff): ?>
        <?php echo $diff; ?>

    <?php else: ?>
        <?php echo isset($page->renderedHTML) ? $page->renderedHTML : $page->html; ?>

    <?php endif; ?>
</div><?php /**PATH /app/www/resources/views/pages/parts/page-display.blade.php ENDPATH**/ ?>