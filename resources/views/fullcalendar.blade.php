@php
    $plugin = \Saade\FilamentFullCalendar\FilamentFullCalendarPlugin::get();
@endphp

<x-filament-widgets::widget>
    <x-filament::section>
        <button id="toggleSidebarButton">Toggle Sidebar</button>
        <div class="flex">
            <div class="collapsable-sidebar" id="sidebar">
                Sidebar
            </div>
            <div class="grow">
                <div class="flex justify-end flex-1 mb-4">
                    <x-filament-actions::actions :actions="$this->getCachedHeaderActions()" class="shrink-0" />
                </div>

                <div class="filament-fullcalendar" wire:ignore ax-load
                    ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('filament-fullcalendar-alpine', 'saade/filament-fullcalendar') }}"
                    ax-load-css="{{ \Filament\Support\Facades\FilamentAsset::getStyleHref('filament-fullcalendar-styles', 'saade/filament-fullcalendar') }}"
                    x-ignore x-data="fullcalendar({
                        locale: @js($plugin->getLocale()),
                        plugins: @js($plugin->getPlugins()),
                        schedulerLicenseKey: @js($plugin->getSchedulerLicenseKey()),
                        timeZone: @js($plugin->getTimezone()),
                        config: @js($plugin->getConfig()),
                        editable: @json($plugin->isEditable()),
                        selectable: @json($plugin->isSelectable()),
                    })">
                </div>
            </div>
        </div>

        <div id="mydraggable" data-event='{ "title": "my dragging event", "days": "10", "description": "This is my first dragging event", "start_time": "10:00", "end_time": "12:00", "user_id": "2", "color": "#FFFF00", "participants": ["1", "2", "3"], "eventable_type": "App\\Models\\Library\\Activity", "eventable_id": "10" }'>Drag me!</div>

        <style>
            .collapsable-sidebar {
                width: 250px; /* Set your desired width */
                transition: width 0.3s ease;
                overflow-x: hidden;
            }

            .collapsed-sidebar {
                width: 0;
            }
        </style>
    </x-filament::section>

    <x-filament-actions::modals />
</x-filament-widgets::widget>
