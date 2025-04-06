<div class="space-y-4">
    <input wire:model="name" type="text" class="border p-2 w-full" placeholder="Votre nom">
    <input wire:model="date" type="date" class="border p-2 w-full">

    <button wire:click="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        Réserver
    </button>

    @if (session()->has('success'))
        <div class="text-green-600">{{ session('success') }}</div>
    @endif
</div>


