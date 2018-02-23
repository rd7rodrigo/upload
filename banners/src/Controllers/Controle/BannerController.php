<?php

// namespace Bredi\Banner\Controllers\Controle;
namespace App\Http\Controllers\Controle;

use App\Http\Controllers\Auth\PermissaoController;
use Bredi\Banner\Models\Banner;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\View;

class BannerController extends PermissaoController
{
    public function __construct()
    {
        #herda o _construct de PermissaoController para gerir as permissões
        parent::__construct();
    }

    public function index()
    {
        $data = ['banners'];

        $banners = Banner::get();

        // return View::make('banner::index', compact($data));
        // return view('banner::index', compact($data));
        return view('controle.banner.index', compact($data));
        /*
    $data = ['obras'];

    $obras = Obra::get();

    return view('controle.obra.index', compact($data));
     */
    }

    public function form($obra_id = null)
    {

        dd('form');
        /*
    $data = ['obra', 'categorias', 'autors', 'subcategorias', 'tecnicas'];

    $obra = Obra::find($obra_id);

    $categorias = Categoria::orderBy('nome')->pluck('nome', 'id');

    $autors        = Autor::orderBy('nome')->pluck('nome', 'id');
    $subcategorias = [];
    $tecnicas      = [];

    if ($obra) {
    // dd($obra);
    if (isset($obra->categoria_id)) {
    $subcategorias = Subcategoria::where('categoria_id', $obra->categoria_id)->pluck('nome', 'id')->toArray();
    // array_push($data, );
    }
    if (isset($obra->subcategoria_id)) {
    $tecnicas = Tecnica::where('subcategoria_id', $obra->subcategoria_id)->pluck('nome', 'id')->toArray();
    // array_push($data, );
    }
    }

    return view('controle.obra.form', compact($data));

     */
    }

    public function save(Request $request, $obra_id = null)
    {

        dd('save');

        /*

    $request->validate([
    'titulo'          => 'required|min:2',
    'registro'        => 'required',
    'autor_id'        => 'required',
    'categoria_id'    => 'required',
    'subcategoria_id' => 'required',
    'tecnica_id'      => 'required',
    'data'            => 'required',
    'tipo_aquisicao'  => 'required',
    // 'dimensao' => 'required',

    ]);

    $obra = Obra::find($obra_id);

    $input = $request->except('_token');

    if (isset($obra) and isset($obra->id)) {

    if ($obra->tipo_aquisicao == 'aquisicao') {
    $input['data_entrada'] = null;
    $input['doador_id']    = null;
    }
    if ($obra->tipo_aquisicao == 'doacao') {
    $input['data_aquisicao']  = null;
    $input['valor_aquisicao'] = null;
    }

    if ($obra->update($input)) {
    return redirect()->route('controle.obra.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
    }

    } else {
    $obra = Obra::create($input);
    }

    if (!$obra->id) {
    return redirect()->route('controle.obra.form', $id)->with('msg', 'Não foi possível efetuar a operação')->with('error', true);
    }

    return redirect()->route('controle.obra.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
     */
    }

    public function excluir($obra_id)
    {
        dd('excluir');
        // $obra = Obra::find($obra_id);

        // if ($obra and $obra->delete()) {
        //     return redirect()->route('controle.obra.index')->with('msg', 'Operação realizada com sucesso')->with('error', false);
        // }

        return redirect()->route('controle.obra.index')->with('msg', 'Não foi possível efetuar a operação')->with('error', true);
    }
}
