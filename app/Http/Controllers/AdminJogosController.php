<?php
namespace App\Http\Controllers;

use App\Models\Jogos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class adminJogosController extends Controller
{
    public function index()
    {
        $jogos = Jogos::all()->map(function ($jogo) {
            $jogo->imagem = $jogo->image_path ? Storage::disk('s3')->temporaryUrl($jogo->image_path, Carbon::now()->addMinutes(5)) : asset('assets/images/defaultGame.jpg');
            return $jogo;
        });

        return view('Admin.adminJogos', compact('jogos'));
    }

    // Form de Criação
    public function create()
    {
        return view('Admin.createJogo');
    }

    // Salvar novo jogo
    public function store(Request $request, Jogos $jogo)
    {
        $validated = $request->validate([
            'nome_jogo' => 'required|string|max:255',
            'plataforma' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload da imagem para o S3/MinIO
        if ($request->hasFile('image_path')) {
            $filename = $jogo->id_jogo . '_' . $request->file('image_path')->getClientOriginalName();
            $path = $request->file('image_path')->storeAs('/images', $filename, 's3');
            $validated['image_path'] = $path;
        }

        // Verifica se o campo estar vazio para aplicar ou não desconto automático
        if (empty($validated['discount'])) {
            if ($validated['valor'] >= 100) {
                $validated['discount'] = 20;
            } elseif ($validated['valor'] >= 50) {
                $validated['discount'] = 10;
            } else {
                $validated['discount'] = 0;
            }
        }

        Jogos::create($validated);

        return redirect()->route('admin.jogos.index')->with('success', 'Jogo adicionado com sucesso!');
    }

    // Editar as informações dos jogos
    public function edit(Jogos $jogo)
    {
        return view('Admin.editJogo', compact('jogo'));
    }

    // Atualizar informações dos jogos
    public function update(Request $request, Jogos $jogo)
    {
        $validated = $request->validate([
            'nome_jogo' => 'required|string|max:255',
            'plataforma' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload nova imagem (se enviada)
        if ($request->hasFile('image_path')) {
            // Apaga imagem antiga (se existir)
            if ($jogo->image_path) {
                Storage::disk('s3')->delete($jogo->image_path);
            }

            //Pega o nome original do arquivo
            $filename = $jogo->id_jogo . '_' . $request->file('image_path')->getClientOriginalName();

            // Faz upload usando o nome original
            $path = $request->file('image_path')->storeAs('/images', $filename, 's3');

            $validated['image_path'] = $path;
        }

        // Verifica se o campo estar vazio para aplicar ou não desconto automático
        if (empty($validated['discount'])) {
            if ($validated['valor'] >= 100) {
                $validated['discount'] = 20;
            } elseif ($validated['valor'] >= 50) {
                $validated['discount'] = 10;
            } else {
                $validated['discount'] = 0;
            }
        }

        $jogo->update($validated);

        return redirect()->route('admin.jogos.index')->with('success', 'Jogo atualizado com sucesso!');
    }

    public function destroy(Jogos $jogo)
    {
        if ($jogo->image_path && Storage::disk('s3')->exists($jogo->image_path)) {
            Storage::disk('s3')->delete($jogo->image_path);
        }

        $jogo->delete();
        return redirect()->route('admin.jogos.index')->with('success', 'Jogo excluído com sucesso!');
    }
}
