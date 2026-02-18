<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ImageController extends Controller
{

    public function checkPassword(Request $request)
    {
        $input = $request->password;

        // 🔐 Verifica senha primária (.env)
        if (Hash::check($input, env('PRIMARY_PASSWORD_HASH'))) {
            session([
                'authorized' => true,
                'role' => 'primary'
            ]);

            return response()->json([
                'role' => session('role')
            ]);
        }
        // 🔐 Verifica senha secundária (arquivo)
        $secondaryPath = storage_path('app/private/secondary_password.txt');

        if (file_exists($secondaryPath)) {

            $storedSecondary = file_get_contents($secondaryPath);

            if (Hash::check($input, $storedSecondary)) {
                session([
                    'authorized' => true,
                    'role' => 'secondary'
                ]);

                return response()->json([
                    'role' => session('role')
                ]);
            }
        }
        return back()->withErrors(['Senha incorreta']);
    }

    public function updateSecondary(Request $request)
    {
        if (session('role') !== 'primary') {
            abort(403);
        }

        $request->validate([
            'new_secondary_password' => 'required|min:4'
        ]);

        file_put_contents(
            storage_path('app/private/secondary_password.txt'),
            Hash::make($request->new_secondary_password)
        );

        return back()->with('success', 'Senha secundária alterada com sucesso!');
    }

    // 🔐 Logout
    public function logout()
    {
        session()->forget('authorized');
        return back();
    }




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