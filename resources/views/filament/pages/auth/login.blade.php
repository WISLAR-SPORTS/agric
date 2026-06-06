<x-filament-panels::page.simple>

    {{-- LOGIN FORM (Filament handles it) --}}
    {{ $this->form }}

    {{-- 👇 YOUR LINK BELOW THE CARD --}}
    <div class="text-center mt-4">
        <a href="{{ url('/') }}" class="text-green-600 hover:text-green-800">
            ← Back to Landing Page
        </a>
    </div>

</x-filament-panels::page.simple>