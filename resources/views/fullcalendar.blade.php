@php
    $plugin = \Saade\FilamentFullCalendar\FilamentFullCalendarPlugin::get();
@endphp

<x-filament-widgets::widget>
    <x-filament::section>
        <button id="toggleSidebarButton">Toggle Sidebar</button>

        <div class="flex justify-end flex-1 mb-4">
            <x-filament-actions::actions :actions="$this->getCachedHeaderActions()" class="shrink-0" />
        </div>
        <div class="flex gap-2">
            <div class="flex flex-col collapsable-sidebar collapsed-sidebar" id="sidebar">
                <div class="py-8"></div>
                <div class="bg-white border border-gray-400 shadow-sm grow rounded-t-xl">
                    <div id="mydraggable" data-event='{ "title": "my dragging event", "days": "10", "description": "This is my first dragging event", "start_time": "10:00", "end_time": "12:00", "user_id": "2", "color": "#FFFF00", "participants": ["1", "2", "3"], "eventable_type": "App\\Models\\Library\\Activity", "eventable_id": "10" }'>Drag me!</div>
                </div>
            </div>
            <div class="grow">
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


        <style>
            .collapsable-sidebar {
                width: 250px;
                transition: width 0.3s ease;
                overflow-x: hidden;
            }

            .collapsed-sidebar {
                width: 0;
                border: transparent !important;
            }
        </style>
    </x-filament::section>

    <x-filament-actions::modals />
</x-filament-widgets::widget>
