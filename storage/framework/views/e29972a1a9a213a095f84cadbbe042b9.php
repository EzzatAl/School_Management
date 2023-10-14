<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'tables::components.icon-button','data' => ['icon' => 'heroicon-o-view-boards','label' => __('tables::table.buttons.toggle_columns.label'),'attributes' => $attributes->class(['filament-tables-column-toggling-trigger'])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::icon-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-o-view-boards','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('tables::table.buttons.toggle_columns.label')),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->class(['filament-tables-column-toggling-trigger']))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH D:\EZZT SVU\SVU\F22\PR1\project\Junior_project\vendor\filament\tables\src\/../resources/views/components/toggleable/trigger.blade.php ENDPATH**/ ?>