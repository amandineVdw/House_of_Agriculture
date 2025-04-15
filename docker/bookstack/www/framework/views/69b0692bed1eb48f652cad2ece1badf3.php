<?php $__env->startSection('body'); ?>
    <div class="container">

        <?php echo $__env->make('settings.parts.navbar', ['selected' => 'audit'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="card content-wrap auto-height">
            <h1 class="list-heading"><?php echo e(trans('settings.audit')); ?></h1>
            <p class="text-muted"><?php echo e(trans('settings.audit_desc')); ?></p>

            <form action="<?php echo e(url('/settings/audit')); ?>" method="get"
                  class="flex-container-row wrap justify-flex-start gap-x-m gap-y-xs">

                <?php $__currentLoopData = request()->only(['order', 'sort']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($val); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div component="dropdown" class="list-sort-type dropdown-container relative">
                    <label for=""><?php echo e(trans('settings.audit_event_filter')); ?></label>
                    <button refs="dropdown@toggle"
                            type="button"
                            aria-haspopup="true"
                            aria-expanded="false"
                            aria-label="<?php echo e(trans('common.sort_options')); ?>"
                            class="input-base text-left"><?php echo e($filters['event'] ?: trans('settings.audit_event_filter_no_filter')); ?></button>
                    <ul refs="dropdown@menu" class="dropdown-menu">
                        <li <?php if($filters['event'] === ''): ?> class="active" <?php endif; ?>><a
                                    href="<?php echo e($filterSortUrl->withOverrideData(['event' => ''])->build()); ?>"
                                    class="text-item"><?php echo e(trans('settings.audit_event_filter_no_filter')); ?></a></li>
                        <?php $__currentLoopData = $activityTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li <?php if($type === $filters['event']): ?> class="active" <?php endif; ?>><a
                                        href="<?php echo e($filterSortUrl->withOverrideData(['event' => $type])->build()); ?>"
                                        class="text-item"><?php echo e($type); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <?php if(!empty($filters['event'])): ?>
                    <input type="hidden" name="event" value="<?php echo e($filters['event']); ?>">
                <?php endif; ?>

                <?php $__currentLoopData = ['date_from', 'date_to']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filterKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class=>
                        <label for="audit_filter_<?php echo e($filterKey); ?>"><?php echo e(trans('settings.audit_' . $filterKey)); ?></label>
                        <input id="audit_filter_<?php echo e($filterKey); ?>"
                               component="submit-on-change"
                               type="date"
                               name="<?php echo e($filterKey); ?>"
                               value="<?php echo e($filters[$filterKey] ?? ''); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="form-group"
                     component="submit-on-change"
                     option:submit-on-change:filter='[name="user"]'>
                    <label for="owner"><?php echo e(trans('settings.audit_table_user')); ?></label>
                    <?php echo $__env->make('form.user-select', ['user' => $filters['user'] ? \BookStack\Users\Models\User::query()->find($filters['user']) : null, 'name' => 'user'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>


                <div class="form-group">
                    <label for="ip"><?php echo e(trans('settings.audit_table_ip')); ?></label>
                    <?php echo $__env->make('form.text', ['name' => 'ip', 'model' => (object) $filters], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <input type="submit" style="display: none">
                </div>
            </form>

            <hr class="mt-m mb-s">

            <div class="flex-container-row justify-space-between items-center wrap">
                <div class="flex-2 min-width-xl"><?php echo e($activities->links()); ?></div>
                <div class="flex-none min-width-m py-m">
                    <?php echo $__env->make('common.sort', array_merge($listOptions->getSortControlData(), ['useQuery' => true]), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="item-list">
                <div class="item-list-row flex-container-row items-center bold hide-under-m">
                    <div class="flex-2 px-m py-xs flex-container-row items-center"><?php echo e(trans('settings.audit_table_user')); ?></div>
                    <div class="flex-2 px-m py-xs"><?php echo e(trans('settings.audit_table_event')); ?></div>
                    <div class="flex-3 px-m py-xs"><?php echo e(trans('settings.audit_table_related')); ?></div>
                    <div class="flex-container-row flex-3">
                        <div class="flex px-m py-xs"><?php echo e(trans('settings.audit_table_ip')); ?></div>
                        <div class="flex-2 px-m py-xs text-right"><?php echo e(trans('settings.audit_table_date')); ?></div>
                    </div>
                </div>
                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item-list-row flex-container-row items-center wrap py-xxs">
                        <div class="flex-2 px-m py-xxs flex-container-row items-center min-width-m">
                            <?php echo $__env->make('settings.parts.table-user', ['user' => $activity->user, 'user_id' => $activity->user_id], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                        <div class="flex-2 px-m py-xxs min-width-m"><strong
                                    class="mr-xs hide-over-m"><?php echo e(trans('settings.audit_table_event')); ?>

                                :</strong> <?php echo e($activity->type); ?></div>
                        <div class="flex-3 px-m py-xxs min-width-l">
                            <?php if($activity->loggable instanceof \BookStack\Entities\Models\Entity): ?>
                                <?php echo $__env->make('entities.icon-link', ['entity' => $activity->loggable], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php elseif($activity->detail && $activity->isForEntity()): ?>
                                <div>
                                    <?php echo e(trans('settings.audit_deleted_item')); ?> <br>
                                    <?php echo e(trans('settings.audit_deleted_item_name', ['name' => $activity->detail])); ?>

                                </div>
                            <?php elseif($activity->detail): ?>
                                <div><?php echo e($activity->detail); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="flex-container-row flex-3 min-width-m">
                            <div class="flex-2 px-m py-xxs min-width-xs break-text"><strong
                                        class="mr-xs hide-over-m"><?php echo e(trans('settings.audit_table_ip')); ?>

                                    :<br></strong> <?php echo e($activity->ip); ?></div>
                            <div class="flex-3 px-m py-xxs text-m-right min-width-xs"><strong
                                        class="mr-xs hide-over-m"><?php echo e(trans('settings.audit_table_date')); ?>

                                    :<br></strong> <?php echo e($activity->created_at); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="py-m">
                <?php echo e($activities->links()); ?>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/settings/audit.blade.php ENDPATH**/ ?>