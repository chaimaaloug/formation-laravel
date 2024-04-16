<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuteurRequest;
use App\Models\Auteur;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuteurController extends Controller
{

    public function index(): View
    {
        return view('auteur.index', [
            'auteurs' => Auteur::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function show(Auteur $auteur): RedirectResponse | View
    {
        return view('auteur.show', [
            'auteur' => $auteur
        ]);
    }

    public function create()
    {
        $auteur = new Auteur();
        return view('auteur.create', [
            'auteur' => $auteur
        ]);
    }

    public function store(CreateAuteurRequest $request)
    {
        $auteur = Auteur::create($request->validated());

        return redirect()->route('auteur.index')->with('success', "L'auteur a bien été sauvegardé");
    }

    public function edit(Auteur $auteur)
    {
        return view('auteur.edit', [
            'auteur' => $auteur
        ]);
    }

    public function update(Auteur $auteur, CreateAuteurRequest $request)
    {
        $auteur->update($request->validated());
        return redirect()->route('auteur.index')->with('success', "L'auteur a bien été modifié");
    }

    public function destroy(Auteur $auteur): RedirectResponse
    {
        $auteur->delete();
        return redirect()->route('auteur.index')->with('success', "L'auteur a bien été supprimé");
    }

    public function delete(Auteur $auteur): RedirectResponse
    {
        $auteur->delete();
        return redirect()->route('auteur.index')->with('success', "L'auteur a bien été supprimé");
    }
}
