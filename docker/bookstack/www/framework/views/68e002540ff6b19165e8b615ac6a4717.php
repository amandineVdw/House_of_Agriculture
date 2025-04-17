<div components="image-manager dropzone"
     option:dropzone:url="<?php echo e(url('/images/gallery?' . http_build_query(['uploaded_to' => $uploaded_to ?? 0]))); ?>"
     option:dropzone:success-message="<?php echo e(trans('components.image_upload_success')); ?>"
     option:dropzone:error-message="<?php echo e(trans('errors.image_upload_error')); ?>"
     option:dropzone:upload-limit="<?php echo e(config('app.upload_limit')); ?>"
     option:dropzone:upload-limit-message="<?php echo e(trans('errors.server_upload_limit')); ?>"
     option:dropzone:zone-text="<?php echo e(trans('components.image_dropzone_drop')); ?>"
     option:dropzone:file-accept="image/*"
     option:dropzone:allow-multiple="true"
     option:image-manager:uploaded-to="<?php echo e($uploaded_to ?? 0); ?>"
     class="image-manager">

    <div component="popup"
         refs="image-manager@popup"
         class="popup-background">
        <div class="popup-body" tabindex="-1">

            <div class="popup-header primary-background">
                <div class="popup-title"><?php echo e(trans('components.image_select')); ?></div>
                <button refs="dropzone@selectButton image-manager@uploadButton" type="button">
                    <span><?php echo (new \BookStack\Util\SvgIcon('upload'))->toHtml(); ?></span>
                    <span><?php echo e(trans('components.image_upload')); ?></span>
                </button>
                <button refs="popup@hide"
                        type="button"
                        title="<?php echo e(trans('common.close')); ?>"
                        class="popup-header-close"><?php echo (new \BookStack\Util\SvgIcon('close'))->toHtml(); ?></button>
            </div>

            <div component="tabs"
                 option:tabs:active-under="880"
                 refs="dropzone@drop-target"
                 class="flex-container-column image-manager-body">
                <div class="tab-container">
                    <div role="tablist" class="hide-over-m mb-none">
                        <button id="image-manager-list-tab"
                                aria-selected="true"
                                aria-controls="image-manager-list"
                                role="tab"><?php echo e(trans('components.image_list')); ?></button>
                        <button id="image-manager-info-tab"
                                aria-selected="true"
                                aria-controls="image-manager-info"
                                role="tab"><?php echo e(trans('components.image_details')); ?></button>
                    </div>
                </div>
                <div class="flex-container-row flex-fill flex">
                    <div id="image-manager-list"
                         tabindex="0"
                         role="tabpanel"
                         aria-labelledby="image-manager-list-tab"
                         class="image-manager-content">
                        <div class="image-manager-filter-bar flex-container-row wrap justify-space-between">
                            <div class="primary-background image-manager-filter-bar-bg"></div>
                            <div>
                                <form refs="image-manager@searchForm" role="search" class="contained-search-box floating mx-m my-s">
                                    <input refs="image-manager@searchInput"
                                           placeholder="<?php echo e(trans('components.image_search_hint')); ?>"
                                           type="search">
                                    <button refs="image-manager@cancelSearch"
                                            title="<?php echo e(trans('common.search_clear')); ?>"
                                            type="button"
                                            hidden="hidden"
                                            class="cancel"><?php echo (new \BookStack\Util\SvgIcon('close'))->toHtml(); ?></button>
                                    <button type="submit"
                                            title="<?php echo e(trans('common.search')); ?>"><?php echo (new \BookStack\Util\SvgIcon('search'))->toHtml(); ?></button>
                                </form>
                            </div>
                            <div class="tab-container bordered mx-m my-s">
                                <div role="tablist" class="image-manager-filters flex-container-row mb-none">
                                    <button refs="image-manager@filterTabs"
                                            data-filter="all"
                                            role="tab"
                                            aria-selected="true"
                                            type="button"
                                            title="<?php echo e(trans('components.image_all_title')); ?>"><?php echo (new \BookStack\Util\SvgIcon('images'))->toHtml(); ?></button>
                                    <button refs="image-manager@filterTabs"
                                            data-filter="book"
                                            role="tab"
                                            aria-selected="false"
                                            type="button"
                                            title="<?php echo e(trans('components.image_book_title')); ?>"><?php echo (new \BookStack\Util\SvgIcon('book', ['class' => 'svg-icon']))->toHtml(); ?></button>
                                    <button refs="image-manager@filterTabs"
                                            data-filter="page"
                                            role="tab"
                                            aria-selected="false"
                                            type="button"
                                            title="<?php echo e(trans('components.image_page_title')); ?>"><?php echo (new \BookStack\Util\SvgIcon('page', ['class' => 'svg-icon']))->toHtml(); ?></button>
                                </div>
                            </div>
                        </div>
                        <div refs="image-manager@listContainer" class="image-manager-list"></div>
                        <div refs="image-manager@loadMore" class="load-more" hidden>
                            <button type="button" class="button small outline">Load More</button>
                        </div>
                    </div>

                    <div id="image-manager-info"
                         tabindex="0"
                         role="tabpanel"
                         aria-labelledby="image-manager-info-tab"
                         class="image-manager-sidebar flex-container-column">

                        <div refs="image-manager@dropzoneContainer">
                            <div refs="dropzone@status-area"></div>
                        </div>

                        <div refs="image-manager@form-container-placeholder" class="p-m text-small text-muted">
                            <p><?php echo e(trans('components.image_intro')); ?></p>
                            <p refs="image-manager@upload-hint"><?php echo e(trans('components.image_intro_upload')); ?></p>
                        </div>

                        <div refs="image-manager@formContainer" class="inner flex">
                        </div>
                    </div>
                </div>
            </div>

            <div class="popup-footer">
                <button refs="image-manager@selectButton" type="button" class="hidden button">
                    <?php echo e(trans('components.image_select_image')); ?>

                </button>
            </div>

        </div>
    </div>
</div><?php /**PATH /app/www/resources/views/pages/parts/image-manager.blade.php ENDPATH**/ ?>