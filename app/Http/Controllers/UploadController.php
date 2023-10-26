<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Upload;


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
        // Crie um novo registro na tabela uploads.
        $upload = new Upload();
        $upload->user_id = auth()->id(); // Obtém o ID do usuário autenticado.
        $upload->file_name = $fileName;
        $upload->approved = false; // Você pode definir o valor padrão conforme necessário.
        $upload->save();
        

        // Ou, se você quiser salvar em um storage externo (ex: AWS S3):
        // Storage::disk('s3')->put('uploads/' . $fileName, file_get_contents($file));

        // Salve as informações do arquivo no banco de dados.
        // Você deve criar uma tabela "uploads" no banco de dados para armazenar as informações dos arquivos.

        return redirect()->back()->with('success', 'Arquivo enviado com sucesso.');
    }
}
