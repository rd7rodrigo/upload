<?php

namespace Bredi\Upload\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Response;

class DashboardController extends Controller
{

    public function renderImagem($path = null, $tamanho = 'p', $imagem = null)
    {

        $path = storage_path() . '/app/public/' . $path . '/' . $tamanho . '/' . $imagem;

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;

    }

    public function arquivoDownload($path = null, $filename = null)
    {

        $path = storage_path() . '/data/' . $path . '/' . $filename;

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;

    }

    public function ativo(Request $request)
    {
        $input = $request->except('_token');
        $obj   = '\App\Models\\' . $input['obj'];
        $obj   = new $obj;
        $obj->find($input['id'])->update($input);
        exit;
    }

    public function ordenacao(Request $request)
    {
        $input = $request->except('_token');
        $obj   = '\App\Models\\' . $input['obj'];

        $obj = new $obj;

        if (isset($input) && count($input)) {
            foreach ($input['id'] as $ordem => $id) {
                $obj->find($id)->update(['ordem' => $ordem]);
            }
        }
        exit;
    }

    public function uploadEditor(Request $request)
    {
        $destinationPath = storage_path() . '/data/uploads/p/';

        if ($request->hasFile('file') and $request->file('file')->isValid()) {
            $imagem   = $request->file('file');
            $extensao = $imagem->getClientOriginalExtension();
            $nomeSlug = str_slug($imagem->getClientOriginalName());
            $novoNome = $nomeSlug . '-' . uniqid(md5(rand())) . '.' . $extensao;

            $request->file('file')->move($destinationPath, $novoNome);

            return route('imagem.render', 'uploads/p/' . $novoNome);

        }

    }

    public function selectLoad(Request $request)
    {

        $input = $request->except('_token');

        $obj = '\App\Models\\' . $input['model'];
        $obj = new $obj;

        $obj = $obj->where($input['column'], $input['id'])->pluck('nome', 'id')->toArray();

        return json_encode($obj);

        exit;
    }

    public function autocomplete(Request $request)
    {

        $input = $request->except('_token');

        $obj = '\App\Models\\' . $input['model'];
        $obj = new $obj;

        $obj = $obj->where('nome', 'like', '%' . $input['q'] . '%')->get(); //->toArray();

        return json_encode($obj);

        exit;
    }
}
