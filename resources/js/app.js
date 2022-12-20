import './bootstrap';

import Alpine from 'alpinejs'

window.Alpine = Alpine
import './../../vendor/power-components/livewire-powergrid/dist/powergrid';

// Color available on color picker
document.addEventListener('alpine:init', () => {
    Alpine.store('wireui:color-picker').setColors([
        {name: 'Slate', value: '#64748b'},
        {name: 'Gray', value: '#6b7280'},
        {name: 'Zinc', value: '#71717a'},
        {name: 'Neutral', value: '#737373'},
        {name: 'Stone', value: '#78716c'},
        {name: 'Red', value: '#ef4444'},
        {name: 'Orange', value: '#f97316'},
        {name: 'Yellow', value: '#eab308'},
        {name: 'Lime', value: '#84cc16'},
        {name: 'Green', value: '#22c55e'},
        {name: 'Emerald', value: '#10b981'},
        {name: 'Teal', value: '#14b8a6'},
        {name: 'Cyan', value: '#06b6d4'},
        {name: 'Sky', value: '#0ea5e9'},
        {name: 'Blue', value: '#3b82f6'},
        {name: 'Indigo', value: '#6366f1'},
        {name: 'Violet', value: '#8b5cf6'},
        {name: 'Purple', value: '#a855f7'},
        {name: 'Fuchsia', value: '#d946ef'},
        {name: 'Pink', value: '#ec4899'},
        {name: 'Rose', value: '#f43f5e'},
    ])
})
Alpine.start()
