@if(session('success'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition.opacity
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6"
        role="alert"
    >
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition.opacity
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6"
        role="alert"
    >
        {{ session('error') }}
    </div>
@endif
