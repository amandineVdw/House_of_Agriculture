<?php
    $en = trans('editor', [], 'en');
    $lang = trans('editor');
    $mergedText = [];
    foreach ($en as $key => $value) {
      $mergedText[$value] = $lang[$key] ?? $value;
    }
?>
<script nonce="<?php echo e($cspNonce); ?>">
    window.editor_translations = <?php echo json_encode($mergedText, 15, 512) ?>;
</script><?php /**PATH /app/www/resources/views/form/editor-translations.blade.php ENDPATH**/ ?>