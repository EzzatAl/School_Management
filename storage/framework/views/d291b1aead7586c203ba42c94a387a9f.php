<input
    id="<?php echo e($getId()); ?>"
    <?php echo $isRequired() ? 'required' : null; ?>

    type="hidden"
    <?php echo e($applyStateBindingModifiers('wire:model')); ?>="<?php echo e($getStatePath()); ?>"
    <?php echo e($attributes->merge($getExtraAttributes())->class(['filament-forms-hidden-component'])); ?>

    dusk="filament.forms.<?php echo e($getStatePath()); ?>"
/>
<?php /**PATH C:\Users\hp\Desktop\Junior_project3\Junior_project\vendor\filament\forms\src\/../resources/views/components/hidden.blade.php ENDPATH**/ ?>