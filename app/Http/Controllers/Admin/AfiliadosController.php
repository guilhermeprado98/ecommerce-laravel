<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Afiliados;
use Illuminate\Http\Request;

class AfiliadosController extends Controller
{
    public function index()
    {
        $afiliados = Afiliados::all();
        return view('admin.afiliados.index', compact('afiliados'));
    }

    public function add()
    {
        return view('admin.afiliados.add');
    }

    public function insert_afiliado(Request $request)
    {
        $afiliados = new Afiliados();

        $afiliados->name = $request->input('name');
        $afiliados->save();

        return redirect('/afiliados')->with('status', "Afiliado adicionado com sucesso!");
    }
}
