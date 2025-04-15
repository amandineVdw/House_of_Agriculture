<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📚 Pages BookStack
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <a href="{{ route('bookstack.pages.create') }}" class="btn btn-primary mb-3">
                    Ajouter une page BookStack
                </a>

                <ul class="list-group">
                    @foreach ($pages['data'] as $page)
                        <li class="list-group-item">
                            <strong>{{ $page['name'] }}</strong>
                            <br>
                            <small>Créée le : {{ \Carbon\Carbon::parse($page['created_at'])->format('d/m/Y') }}</small>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</x-app-layout>
