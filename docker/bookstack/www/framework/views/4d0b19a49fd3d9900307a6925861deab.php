<div>
    <div components="popup code-editor"
         option:code-editor:favourites="<?php echo e(setting()->getForCurrentUser('code-language-favourites', '')); ?>"
         class="popup-background code-editor">
        <div refs="code-editor@container" class="popup-body" tabindex="-1">

            <div class="popup-header flex-container-row primary-background">
                <div class="popup-title"><?php echo e(trans('components.code_editor')); ?></div>
                <div component="dropdown" refs="code-editor@historyDropDown" class="flex-container-row">
                    <button refs="dropdown@toggle">
                        <span><?php echo (new \BookStack\Util\SvgIcon('history'))->toHtml(); ?></span>
                        <span><?php echo e(trans('components.code_session_history')); ?></span>
                    </button>
                    <ul refs="dropdown@menu code-editor@historyList" class="dropdown-menu"></ul>
                </div>
                <button class="popup-header-close" refs="popup@hide"><?php echo (new \BookStack\Util\SvgIcon('close'))->toHtml(); ?></button>
            </div>

            <div class="code-editor-body-wrap flex-container-row flex-fill">
                <div class="code-editor-language-list flex-container-column flex-fill">
                    <label for="code-editor-language"><?php echo e(trans('components.code_language')); ?></label>
                    <input refs="code-editor@languageInput" id="code-editor-language" type="text">
                    <div refs="code-editor@language-options-container" class="lang-options">
                        <?php
                            $languages = [
                                'Bash', 'CSS', 'C', 'C++', 'C#', 'Clojure', 'Dart', 'Diff', 'Fortran', 'F#', 'Go', 'Haskell', 'HTML', 'INI',
                                'Java', 'JavaScript', 'JSON', 'Julia', 'Kotlin', 'LaTeX', 'Lua', 'MarkDown', 'MATLAB', 'MSSQL', 'MySQL',
                                'Nginx', 'OCaml', 'Octave', 'Pascal', 'Perl', 'PHP', 'PL/SQL', 'PostgreSQL', 'Powershell', 'Python',
                                'R', 'Ruby', 'Rust', 'SAS', 'Scala', 'Scheme', 'Shell', 'Smarty', 'SQL', 'SQLite', 'Swift',
                                'Twig', 'TypeScript', 'VBScript', 'VB.NET', 'XML', 'YAML',
                            ];
                        ?>

                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="relative">
                                <button type="button" refs="code-editor@language-button" data-favourite="false" data-lang="<?php echo e(strtolower($language)); ?>"><?php echo e($language); ?></button>
                                <button class="lang-option-favorite-toggle action-favourite" data-title="<?php echo e(trans('common.favourite')); ?>"><?php echo (new \BookStack\Util\SvgIcon('star-outline'))->toHtml(); ?></button>
                                <button class="lang-option-favorite-toggle action-unfavourite" data-title="<?php echo e(trans('common.unfavourite')); ?>"><?php echo (new \BookStack\Util\SvgIcon('star'))->toHtml(); ?></button>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="code-editor-main flex-fill">
                    <textarea refs="code-editor@editor"></textarea>
                </div>

            </div>

            <div class="popup-footer">
                <button refs="code-editor@saveButton" type="button" class="button"><?php echo e(trans('components.code_save')); ?></button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /app/www/resources/views/pages/parts/code-editor.blade.php ENDPATH**/ ?>