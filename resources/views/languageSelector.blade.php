<x-filament::dropdown>

    <x-slot name="trigger">
        <x-filament::button icon="heroicon-m-globe-alt">
        </x-filament::button>
    </x-slot>

    <x-filament::dropdown.list>
        <x-filament::dropdown.list.item
            href="{{ URL::current() . '?locale=en' }}"
            tag="a">
            English
        </x-filament::dropdown.list.item>

        <x-filament::dropdown.list.item
            href="{{ URL::current() . '?locale=es' }}"
            tag="a">
            Español
        </x-filament::dropdown.list.item>

        <x-filament::dropdown.list.item
            href="{{ URL::current() . '?locale=fr' }}"
            tag="a">
            Français
        </x-filament::dropdown.list.item>
    </x-filament::dropdown.list>

</x-filament::dropdown>