<?php

namespace App\Http\Controllers;

use App\Services\BookStack\PageService;
use Illuminate\Http\Request;

class BookStackController extends Controller
{
    protected PageService $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    // Affiche toutes les pages BookStack
    public function index()
    {
        $pages = $this->pageService->getAllPages();
        return view('bookstack.pages.index', compact('pages'));
    }

    // Affiche le formulaire pour créer une page BookStack
    public function create()
    {
        return view('bookstack.pages.create');
    }

    // Enregistre une nouvelle page dans BookStack
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'html' => 'required|string',  // contenu HTML ou markdown
            'book_id' => 'required|integer',
        ]);

        $this->pageService->createPage($validated);

        return redirect()->route('bookstack.pages.index')
                         ->with('success', 'Page créée dans BookStack !');
    }
}
