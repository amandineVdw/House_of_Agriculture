<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Créer une page BookStack
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form method="POST" action="{{ route('bookstack.pages.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Titre de la page</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="book_id" class="form-label">ID du livre BookStack</label>
                        <input type="number" name="book_id" id="book_id" class="form-control" required>
                        <small>Trouve l'ID sur BookStack (dans l'URL du livre).</small>
                    </div>

                    <div class="mb-3">
                        <label for="html" class="form-label">Contenu (HTML/Markdown)</label>
                        <textarea name="html" id="html" rows="6" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Créer la page</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
