<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between space-x-2 p-1">
            <span>
                @unless ($paginator->onFirstPage())
                    <x-jet-button wire:click="previousPage" wire:loading.attr="disabled" rel="prev">
                        Nowsze
                    </x-jet-button>
                @endif
            </span>

            <span>
                @if ($paginator->hasMorePages())
                    <x-jet-button wire:click="nextPage" wire:loading.attr="disabled" rel="next">
                        Starsze
                    </x-jet-button>
                @endif
            </span>
        </nav>
    @endif
</div>
