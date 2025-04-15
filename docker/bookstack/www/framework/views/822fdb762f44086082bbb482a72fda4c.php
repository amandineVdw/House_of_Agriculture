<textarea component="wysiwyg-input"
          option:wysiwyg-input:language="<?php echo e($locale->htmlLang()); ?>"
          option:wysiwyg-input:text-direction="<?php echo e($locale->htmlDirection()); ?>"
          id="description_html" name="description_html" rows="5"
          <?php if($errors->has('description_html')): ?> class="text-neg" <?php endif; ?>><?php if(isset($model) || old('description_html')): ?><?php echo e(old('description_html') ?? $model->descriptionHtml()); ?><?php endif; ?></textarea>
<?php if($errors->has('description_html')): ?>
    <div class="text-neg text-small"><?php echo e($errors->first('description_html')); ?></div>
<?php endif; ?><?php /**PATH /app/www/resources/views/form/description-html-input.blade.php ENDPATH**/ ?>