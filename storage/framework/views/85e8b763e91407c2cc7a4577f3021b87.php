<form
    x-data="{ isUploadingFile: false }"
    x-on:submit="if (isUploadingFile) $event.preventDefault()"
    x-on:file-upload-started="isUploadingFile = true"
    x-on:file-upload-finished="isUploadingFile = false"
    <?php echo e($attributes->class(['filament-form space-y-6'])); ?>

>
    <?php echo e($slot); ?>

</form>
<?php /**PATH C:\Users\hp\Project\Junior_project3\Junior_project\vendor\filament\filament\src\/../resources/views/components/form/index.blade.php ENDPATH**/ ?>