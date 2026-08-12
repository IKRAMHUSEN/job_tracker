@if (session('success'))
    <div
        class="mb-4 flex items-center gap-2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        <x-heroicon-o-check-circle class="h-5 w-5" />
        {{ session('success') }}
    </div>
@elseif (session('error'))
    <div class="mb-4 flex items-center gap-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        <x-heroicon-o-x-circle class="h-5 w-5" />
        {{ session('error') }}
    </div>
@endif
