<x-filament-panels::page>
    @if ($data['pages']->count())
        <div wire:ignore x-data="{}" x-sortable x-on:end="onEnd" class="flex flex-col gap-2">
            @foreach ($data['pages'] as $page)
                <div x-sortable-handle x-sortable-item="{{ $page->id }}"
                    class="py-3 bg-white px-4 border cursor-move rounded">
                    <div class="flex justify-between">
                        <span>{{ $page->title }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            <x-filament::button wire:click="saveMenu">
                <span>Save changes</span>
            </x-filament::button>
        </div>
    @else
        <p>No menu found</p>
    @endif
    @push('scripts')
        <script>
            function onEnd(e) {
                const itemId = e.item.getAttribute('x-sortable-item');
                @this.sortMenu(itemId, e.newIndex, e.oldIndex);
            }
        </script>
    @endpush
</x-filament-panels::page>
