<?php $__env->startSection('card'); ?>
    <h1 id="customization" class="list-heading"><?php echo e(trans('settings.app_customization')); ?></h1>
    <form action="<?php echo e(url("/settings/customization")); ?>" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="section" value="customization">

        <div class="setting-list">

            <div class="grid half gap-xl">
                <div>
                    <label for="setting-app-name" class="setting-list-label"><?php echo e(trans('settings.app_name')); ?></label>
                    <p class="small"><?php echo e(trans('settings.app_name_desc')); ?></p>
                </div>
                <div class="pt-xs">
                    <input type="text" value="<?php echo e(setting('app-name', 'BookStack')); ?>" name="setting-app-name" id="setting-app-name">
                    <?php echo $__env->make('form.toggle-switch', [
                        'name' => 'setting-app-name-header',
                        'value' => setting('app-name-header'),
                        'label' => trans('settings.app_name_header'),
                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="grid half gap-xl items-center">
                <div>
                    <label class="setting-list-label" for="setting-app-editor"><?php echo e(trans('settings.app_default_editor')); ?></label>
                    <p class="small"><?php echo e(trans('settings.app_default_editor_desc')); ?></p>
                </div>
                <div>
                    <select name="setting-app-editor" id="setting-app-editor">
                        <option <?php if(setting('app-editor') === 'wysiwyg'): ?> selected <?php endif; ?> value="wysiwyg">WYSIWYG</option>
                        <option <?php if(setting('app-editor') === 'markdown'): ?> selected <?php endif; ?> value="markdown">Markdown</option>
                        <option <?php if(setting('app-editor') === 'wysiwyg2024'): ?> selected <?php endif; ?> value="wysiwyg2024">New WYSIWYG (alpha testing)</option>
                    </select>
                </div>
            </div>

            <div class="grid half gap-xl">
                <div>
                    <label class="setting-list-label"><?php echo e(trans('settings.app_logo')); ?></label>
                    <p class="small"><?php echo trans('settings.app_logo_desc'); ?></p>
                </div>
                <div class="pt-xs">
                    <?php echo $__env->make('form.image-picker', [
                             'removeName' => 'setting-app-logo',
                             'removeValue' => 'none',
                             'defaultImage' => url('/logo.png'),
                             'currentImage' => setting('app-logo'),
                             'name' => 'app_logo',
                             'imageClass' => 'logo-image',
                         ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="grid half gap-xl">
                <div>
                    <label class="setting-list-label"><?php echo e(trans('settings.app_icon')); ?></label>
                    <p class="small"><?php echo e(trans('settings.app_icon_desc')); ?></p>
                </div>
                <div class="pt-xs">
                    <?php echo $__env->make('form.image-picker', [
                             'removeValue' => 'none',
                             'defaultImage' => url('/icon.png'),
                             'currentImage' => setting('app-icon'),
                             'name' => 'app_icon',
                             'imageClass' => 'logo-image',
                         ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <!-- App Color Scheme -->
            <?php
                $darkMode = boolval(setting()->getForCurrentUser('dark-mode-enabled'));
            ?>
            <div component="setting-app-color-scheme"
                 option:setting-app-color-scheme:mode="<?php echo e($darkMode ? 'dark' : 'light'); ?>"
                 class="pb-l">
                <div class="mb-l">
                    <label class="setting-list-label"><?php echo e(trans('settings.color_scheme')); ?></label>
                    <p class="small"><?php echo e(trans('settings.color_scheme_desc')); ?></p>
                </div>

                <div component="tabs" class="tab-container">
                    <div role="tablist" class="controls-card">
                        <button type="button"
                                role="tab"
                                id="color-scheme-tab-light"
                                aria-selected="<?php echo e($darkMode ? 'false' : 'true'); ?>"
                                aria-controls="color-scheme-panel-light"><?php echo (new \BookStack\Util\SvgIcon('light-mode'))->toHtml(); ?><?php echo e(trans('common.light_mode')); ?></button>
                        <button type="button"
                                role="tab"
                                id="color-scheme-tab-dark"
                                aria-selected="<?php echo e($darkMode ? 'true' : 'false'); ?>"
                                aria-controls="color-scheme-panel-dark"><?php echo (new \BookStack\Util\SvgIcon('dark-mode'))->toHtml(); ?><?php echo e(trans('common.dark_mode')); ?></button>
                    </div>
                    <div class="sub-card">
                        <div id="color-scheme-panel-light"
                             refs="setting-app-color-scheme@lightContainer"
                             tabindex="0"
                             role="tabpanel"
                             aria-labelledby="color-scheme-tab-light"
                             <?php if($darkMode): ?> hidden <?php endif; ?>
                             class="p-m">
                            <?php echo $__env->make('settings.parts.setting-color-scheme', ['mode' => 'light'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                        <div id="color-scheme-panel-dark"
                             refs="setting-app-color-scheme@darkContainer"
                             tabindex="0"
                             role="tabpanel"
                             aria-labelledby="color-scheme-tab-light"
                             <?php if(!$darkMode): ?> hidden <?php endif; ?>
                             class="p-m">
                            <?php echo $__env->make('settings.parts.setting-color-scheme', ['mode' => 'dark'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div component="setting-homepage-control" id="homepage-control" class="grid half gap-xl items-center">
                <div>
                    <label for="setting-app-homepage-type" class="setting-list-label"><?php echo e(trans('settings.app_homepage')); ?></label>
                    <p class="small"><?php echo e(trans('settings.app_homepage_desc')); ?></p>
                </div>
                <div>
                    <select refs="setting-homepage-control@type-control"
                            name="setting-app-homepage-type"
                            id="setting-app-homepage-type">
                        <option <?php if(setting('app-homepage-type') === 'default'): ?> selected <?php endif; ?> value="default"><?php echo e(trans('common.default')); ?></option>
                        <option <?php if(setting('app-homepage-type') === 'books'): ?> selected <?php endif; ?> value="books"><?php echo e(trans('entities.books')); ?></option>
                        <option <?php if(setting('app-homepage-type') === 'bookshelves'): ?> selected <?php endif; ?> value="bookshelves"><?php echo e(trans('entities.shelves')); ?></option>
                        <option <?php if(setting('app-homepage-type') === 'page'): ?> selected <?php endif; ?> value="page"><?php echo e(trans('entities.pages_specific')); ?></option>
                    </select>

                    <div refs="setting-homepage-control@page-picker-container" style="display: none;" class="mt-m">
                        <?php echo $__env->make('form.page-picker', [
                            'name' => 'setting-app-homepage',
                            'placeholder' => trans('settings.app_homepage_select'),
                            'value' => setting('app-homepage'),
                            'selectorEndpoint' => '/search/entity-selector',
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>
            </div>

            <div>
                <label for="setting-app-privacy-link" class="setting-list-label"><?php echo e(trans('settings.app_footer_links')); ?></label>
                <p class="small mb-m"><?php echo e(trans('settings.app_footer_links_desc')); ?></p>
                <?php echo $__env->make('settings.parts.footer-links', ['name' => 'setting-app-footer-links', 'value' => setting('app-footer-links', [])], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>


            <div>
                <label for="setting-app-custom-head" class="setting-list-label"><?php echo e(trans('settings.app_custom_html')); ?></label>
                <p class="small"><?php echo e(trans('settings.app_custom_html_desc')); ?></p>
                <div class="mt-m">
                    <textarea component="code-textarea"
                              option:code-textarea:mode="html"
                              name="setting-app-custom-head"
                              id="setting-app-custom-head"
                              class="simple-code-input"><?php echo e(setting('app-custom-head', '')); ?></textarea>
                </div>
                <p class="small text-right"><?php echo e(trans('settings.app_custom_html_disabled_notice')); ?></p>
            </div>


        </div>

        <div class="form-group text-right">
            <button type="submit" class="button"><?php echo e(trans('settings.settings_save')); ?></button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-content'); ?>
    <?php echo $__env->make('entities.selector-popup', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('settings.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/settings/categories/customization.blade.php ENDPATH**/ ?>