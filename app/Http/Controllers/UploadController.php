<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function ListUploadArquivos(){
        return view('index');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();

        // Salve o arquivo no storage local (pasta storage/app/public).
        $file->storeAs('public', $fileName);

        // Ou, se você quiser salvar em um storage externo (ex: AWS S3):
        // Storage::disk('s3')->put('uploads/' . $fileName, file_get_contents($file));

        // Salve as informações do arquivo no banco de dados.
        // Você deve criar uma tabela "uploads" no banco de dados para armazenar as informações dos arquivos.

        return redirect()->back()->with('success', 'Arquivo enviado com sucesso.');
    }
}
