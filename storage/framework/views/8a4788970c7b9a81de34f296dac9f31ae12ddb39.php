<div class="p-6 bg-white w-full dark:bg-gray-600 rounded-lg">
    <div class="pt-2 relative mx-auto text-gray-600 ">
        <div class="flex mb-10 justify-center align-middle">
            <input wire:model.debounce.500ms="term"
                   wire:keydown.enter="$refresh"
                   onclick="this.select()"
                   class="select-all border-2 border-gray-300 bg-white h-12 w-5/6 px-5 pr-16 rounded-lg scale-125 focus:outline-none flex-auto"
                   type="text" name="search" placeholder="Wyszukaj..." id="search"
                   autocomplete="off"
            >
            <label for="search" class="inline-block p-3.5">
                <i class="fas fa-search dark:text-white"></i>
            </label>
        </div>
        <div wire:loading.remove wire:target="term">
            <?php if(!empty($term) || !empty($tagTerm)): ?>
                <?php $__empty_1 = true; $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('song.search', ['song' => $song])->html();
} elseif ($_instance->childHasBeenRendered($song->id)) {
    $componentId = $_instance->getRenderedChildComponentId($song->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($song->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($song->id);
} else {
    $response = \Livewire\Livewire::mount('song.search', ['song' => $song]);
    $html = $response->html();
    $_instance->logRenderedChild($song->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bootstrap.search.empty','data' => []]); ?>
<?php $component->withName('bootstrap.search.empty'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endif; ?>
                <div x-data="{observe () {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        window.livewire.find('<?php echo e($_instance->id); ?>').call('loadMore')
                    }
                })
            }, {
                root: null
            })

            observer.observe(this.$el)
        }
    }"
                     x-init="observe">
                </div>
            <?php endif; ?>
        </div>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bootstrap.search.loading1','data' => []]); ?>
<?php $component->withName('bootstrap.search.loading1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bootstrap.search.loading2','data' => []]); ?>
<?php $component->withName('bootstrap.search.loading2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bootstrap.search.loading3','data' => []]); ?>
<?php $component->withName('bootstrap.search.loading3'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/sempersum/resources/views/livewire/search/start.blade.php ENDPATH**/ ?>