<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'darkMode' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'darkMode' => false,
]); ?>
<?php foreach (array_filter(([
    'darkMode' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<h2
    <?php echo e($attributes->class(['filament-modal-heading text-xl font-bold tracking-tight'])); ?>

>
    <?php echo e($slot); ?>

</h2>
<?php /**PATH C:\Users\hp\Project\Junior_project3\Junior_project\vendor\filament\support\src\/../resources/views/components/modal/heading.blade.php ENDPATH**/ ?>