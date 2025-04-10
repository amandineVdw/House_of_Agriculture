<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Bienvenue, {{ Auth::user()->name }} 👋
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-bold mb-2">Bienvenue sur la plateforme HOA</h3>
                <p class="text-gray-600">Vous pouvez maintenant explorer les <a href="{{ route('courses.index') }}" class="text-blue-500 underline">cours disponibles</a>.</p>
            </div>
        </div>
    </div>
</x-app-layout>
