<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            $categories = Category::all();
            return view('categories.index', ['categories' => $categories]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        //Ccria a categoria
        Category::create($request->only('name', 'description'));

        // redireciona com mensagem de sucesso
        return redirect()->route('categories.index')->with('success', 'Category has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // retonar o forms com os campos preenchidos
        return view('categories.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // verifica os campos da categoria escolhida antes de atualizar
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // redireciona para a lista de categorias
        $category->update($request->only('name','description'));
        return redirect()->route('categories.index')->with('success', 'Category has been updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category has been deleted!');
    }
}
