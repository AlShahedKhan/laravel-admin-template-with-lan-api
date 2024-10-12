

<?php $__env->startSection('title'); ?>
    <?php echo e(@$data['title']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-content">

        
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1"><?php echo e($data['title']); ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><?php echo e($data['title']); ?></li>
                        <li class="breadcrumb-item">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
        

        <div class="card ot-card">
            
            <div class="card-body">
                <form action="<?php echo e(route('languages.update', @$data['language']->id)); ?>" enctype="multipart/form-data"
                    method="post" id="visitForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label "><?php echo e(___('common.name')); ?> <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                                        list="datalistOptions" id="exampleDataList"
                                        placeholder="<?php echo e(___('common.enter_name')); ?> "
                                        value="<?php echo e($data['language']->name); ?>">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleDataList" class="form-label "><?php echo e(___('language.code')); ?> <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code"
                                        list="datalistOptions" id="exampleDataList"
                                        placeholder="<?php echo e(___('language.enter_code')); ?>"
                                        value="<?php echo e($data['language']->code); ?>">
                                    <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="validationServer04" class="form-label"><?php echo e(___('language.flag_icon')); ?>

                                        <span class="fillable">*</span></label>
                                    <select
                                        class="form-select ot-input flag_icon_list <?php $__errorArgs = ['flagIcon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="flagIcon" id="validationServer04"
                                        aria-describedby="validationServer04Feedback">
                                        <option value=""><?php echo e(___('common.select')); ?></option>
                                        <?php $__currentLoopData = $data['flagIcons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row->icon_class); ?>" data-icon="<?php echo e($row->icon_class); ?>" <?php if($data['language']->icon_class == $row->icon_class) echo 'selected' ?>>
                                                <?php echo e($row->title); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['flagIcon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-6 direction-button">

                                    <label for="validationServer04"
                                        class="form-label"><?php echo e(___('language.direction')); ?></label>
                                    <div class="input-check-radio">
                                        <div class="form-check d-flex align-items-center">
                                            <input type="radio" class="form-check-input mt-0 mr-4 read common-key"
                                                name="direction" value="<?php echo e(App\Enums\Direction::RTL); ?>" id="rtl_direction" <?php echo e(strtoupper($data['language']->direction) == App\Enums\Direction::RTL ? 'checked' : ''); ?>>
                                            <label class="custom-control-label"
                                                for="rtl_direction"><?php echo e(___('language.rtl')); ?></label>
                                        </div>
                                    </div>

                                    <div class="input-check-radio">
                                        <div class="form-check d-flex align-items-center">

                                            <input type="radio" class="form-check-input mt-0 mr-4 read common-key"
                                                name="direction" value="<?php echo e(App\Enums\Direction::LTR); ?>" id="ltr_direction" <?php echo e(strtoupper($data['language']->direction) == App\Enums\Direction::LTR ? 'checked' : ''); ?>>
                                            <label class="custom-control-label"
                                                for="ltr_direction"><?php echo e(___('language.ltr')); ?></label>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="text-end">
                                <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                    </span><?php echo e(___('common.update')); ?></button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\khelardan\resources\views/backend/languages/edit.blade.php ENDPATH**/ ?>