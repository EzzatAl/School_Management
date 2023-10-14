<?php if(filled($brand = config('filament.brand'))): ?>
    <div
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'filament-brand text-xl font-bold leading-5 tracking-tight',
            'dark:text-white' => config('filament.dark_mode'),
        ]); ?>"
    >
        <?php echo e($brand); ?>

    </div>
<?php endif; ?>
<?php /**PATH D:\EZZT SVU\SVU\F22\PR1\project\Junior_project\vendor\filament\filament\src\/../resources/views/components/brand.blade.php ENDPATH**/ ?>