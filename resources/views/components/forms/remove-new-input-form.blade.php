<button type="button" {{ $attributes }} class="text-fg-disabled bg-disabled box-border border border-default-medium shadow-xs cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 me-2 text-center mt-3 inline-flex items-center gap-2 focus:outline-none" disabled style="display:none;">
    <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
    </svg>
{{ $slot }}
</button>