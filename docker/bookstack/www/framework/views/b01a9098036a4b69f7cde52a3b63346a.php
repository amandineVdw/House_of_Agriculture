<div class="toolbar page-edit-toolbar py-xs">

    <div>
        <div class="inline block">
            <a href="<?php echo e($isDraft ? $page->getParent()->getUrl() : $page->getUrl()); ?>"
               class="icon-list-item text-link"><span><?php echo (new \BookStack\Util\SvgIcon('back'))->toHtml(); ?></span><span class="hide-under-l"><?php echo e(trans('common.back')); ?></span></a>
        </div>
    </div>

    <div class="text-center">
        <div component="dropdown"
             option:dropdown:move-menu="true"
             class="dropdown-container  draft-display text <?php echo e($draftsEnabled ? '' : 'hidden'); ?>">
            <div class="flex-container-row items-center justify-center">
                <button type="button"
                        refs="dropdown@toggle"
                        aria-haspopup="true"
                        aria-expanded="false"
                        title="<?php echo e(trans('entities.pages_edit_draft_options')); ?>"
                        class="text-link icon-list-item">
                    <span><?php echo (new \BookStack\Util\SvgIcon('time'))->toHtml(); ?></span>
                    <span><span refs="page-editor@draftDisplay" class="faded-text"></span>&nbsp; <?php echo (new \BookStack\Util\SvgIcon('more'))->toHtml(); ?></span>
                </button>
                <?php echo (new \BookStack\Util\SvgIcon('check-circle', ['class' => 'text-pos draft-notification svg-icon', 'refs' => 'page-editor@draftDisplayIcon']))->toHtml(); ?>
            </div>
            <ul refs="dropdown@menu" class="dropdown-menu" role="menu">
                <li>
                    <button refs="page-editor@saveDraft" type="button" class="text-pos icon-item">
                        <?php echo (new \BookStack\Util\SvgIcon('save'))->toHtml(); ?>
                        <div><?php echo e(trans('entities.pages_edit_save_draft')); ?></div>
                    </button>
                </li>
                <?php if($isDraft): ?>
                    <li>
                        <a href="<?php echo e($model->getUrl('/delete')); ?>" class="text-neg icon-item">
                            <?php echo (new \BookStack\Util\SvgIcon('delete'))->toHtml(); ?>
                            <?php echo e(trans('entities.pages_edit_delete_draft')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <li refs="page-editor@discard-draft-wrap" <?php echo e($isDraftRevision ? '' : 'hidden'); ?>>
                    <button refs="page-editor@discard-draft" type="button" class="text-warn icon-item">
                        <?php echo (new \BookStack\Util\SvgIcon('cancel'))->toHtml(); ?>
                        <div><?php echo e(trans('entities.pages_edit_discard_draft')); ?></div>
                    </button>
                </li>
                <li refs="page-editor@delete-draft-wrap" <?php echo e($isDraftRevision ? '' : 'hidden'); ?>>
                    <button refs="page-editor@delete-draft" type="button" class="text-neg icon-item">
                        <?php echo (new \BookStack\Util\SvgIcon('delete'))->toHtml(); ?>
                        <div><?php echo e(trans('entities.pages_edit_delete_draft')); ?></div>
                    </button>
                </li>
                <?php if(userCan('editor-change')): ?>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <?php if($editor !== \BookStack\Entities\Tools\PageEditorType::Markdown): ?>
                            <a href="<?php echo e($model->getUrl($isDraft ? '' : '/edit')); ?>?editor=markdown-clean" refs="page-editor@changeEditor" class="icon-item">
                                <?php echo (new \BookStack\Util\SvgIcon('swap-horizontal'))->toHtml(); ?>
                                <div>
                                    <?php echo e(trans('entities.pages_edit_switch_to_markdown')); ?>

                                    <br>
                                    <small><?php echo e(trans('entities.pages_edit_switch_to_markdown_clean')); ?></small>
                                </div>
                            </a>
                            <a href="<?php echo e($model->getUrl($isDraft ? '' : '/edit')); ?>?editor=markdown-stable" refs="page-editor@changeEditor" class="icon-item">
                                <?php echo (new \BookStack\Util\SvgIcon('swap-horizontal'))->toHtml(); ?>
                                <div>
                                    <?php echo e(trans('entities.pages_edit_switch_to_markdown')); ?>

                                    <br>
                                    <small><?php echo e(trans('entities.pages_edit_switch_to_markdown_stable')); ?></small>
                                </div>
                            </a>
                        <?php endif; ?>
                        <?php if($editor !== \BookStack\Entities\Tools\PageEditorType::WysiwygTinymce): ?>
                            <a href="<?php echo e($model->getUrl($isDraft ? '' : '/edit')); ?>?editor=wysiwyg" refs="page-editor@changeEditor" class="icon-item">
                                <?php echo (new \BookStack\Util\SvgIcon('swap-horizontal'))->toHtml(); ?>
                                <div><?php echo e(trans('entities.pages_edit_switch_to_wysiwyg')); ?></div>
                            </a>
                        <?php endif; ?>
                        <?php if($editor !== \BookStack\Entities\Tools\PageEditorType::WysiwygLexical): ?>
                            <a href="<?php echo e($model->getUrl($isDraft ? '' : '/edit')); ?>?editor=wysiwyg2024" refs="page-editor@changeEditor" class="icon-item">
                                <?php echo (new \BookStack\Util\SvgIcon('swap-horizontal'))->toHtml(); ?>
                                <div>
                                    <?php echo e(trans('entities.pages_edit_switch_to_new_wysiwyg')); ?>

                                    <br>
                                    <small><?php echo e(trans('entities.pages_edit_switch_to_new_wysiwyg_desc')); ?></small>
                                </div>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="flex-container-row justify-flex-end gap-x-m items-center">
        <div component="dropdown"
             option:dropdown:move-menu="true"
             class="dropdown-container">
            <button refs="dropdown@toggle" type="button" aria-haspopup="true" aria-expanded="false" class="icon-list-item text-link">
                <span><?php echo (new \BookStack\Util\SvgIcon('edit'))->toHtml(); ?></span>
                <span refs="page-editor@changelogDisplay"><?php echo e(trans('entities.pages_edit_set_changelog')); ?></span>
            </button>
            <ul refs="dropdown@menu" class="wide dropdown-menu">
                <li class="px-l py-m">
                    <p class="text-muted pb-s"><?php echo e(trans('entities.pages_edit_enter_changelog_desc')); ?></p>
                    <input refs="page-editor@changelogInput"
                           name="summary"
                           id="summary-input"
                           type="text"
                           placeholder="<?php echo e(trans('entities.pages_edit_enter_changelog')); ?>" />
                </li>
            </ul>
            <span></span>
        </div>

        <div class="inline block">
            <button type="submit" id="save-button"
                    class="icon-list-item hide-under-m text-pos fill-width">
                <span><?php echo (new \BookStack\Util\SvgIcon('save'))->toHtml(); ?></span>
                <span><?php echo e(trans('entities.pages_save')); ?></span>
            </button>
        </div>
    </div>
</div><?php /**PATH /app/www/resources/views/pages/parts/editor-toolbar.blade.php ENDPATH**/ ?>