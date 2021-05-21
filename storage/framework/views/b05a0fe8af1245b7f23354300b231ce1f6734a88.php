<div class="shadow bg-white dark:bg-gray-600 rounded-lg mx-3 md:m-auto">
    <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 dark:border-gray-600 rounded-lg">
        <span class="text-4xl font-black text-gray-700 dark:text-gray-200">Wyszukiwanie</span>
    </div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('search.start', [])->html();
} elseif ($_instance->childHasBeenRendered('YEX5gNh')) {
    $componentId = $_instance->getRenderedChildComponentId('YEX5gNh');
    $componentTag = $_instance->getRenderedChildComponentTagName('YEX5gNh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('YEX5gNh');
} else {
    $response = \Livewire\Livewire::mount('search.start', []);
    $html = $response->html();
    $_instance->logRenderedChild('YEX5gNh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php /**PATH /opt/lampp/htdocs/sempersum/resources/views/vendor/jetstream/components/welcome.blade.php ENDPATH**/ ?>