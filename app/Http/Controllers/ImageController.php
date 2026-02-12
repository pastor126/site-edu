<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // Exibe o formulário de upload
    public function upload()
    {
        return view('image.upload');
    }

    // Processa o upload da imagem
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Remove a imagem antiga se existir
            if (Storage::exists('public/current-image.jpg')) {
                Storage::delete('public/current-image.jpg');
            }

            // Salva a nova imagem sempre com o mesmo nome
            $request->file('image')->storeAs('public', 'current-image.jpg');

            return redirect()->route('images.upload')
                ->with('success', 'Imagem enviada com sucesso!');
        }

        return back()->with('error', 'Erro ao enviar a imagem.');
    }

    // Exibe a imagem atual
    public function show()
    {
        $imageExists = Storage::exists('public/current-image.jpg');
        return view('image.show', compact('imageExists'));
    }
}