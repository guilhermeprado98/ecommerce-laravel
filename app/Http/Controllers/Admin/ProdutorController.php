<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produtor;
use Illuminate\Http\Request;

class ProdutorController extends Controller
{
    public function index()
    {
        $produtores = Produtor::all();
        return view('admin.produtor.index', compact('produtores'));
    }

    public function add()
    {
        return view('admin.produtor.add');
    }

    public function insert_produtores(Request $request)
    {
        $produtores = new Produtor();

        $produtores->name = $request->input('name');
        $produtores->save();

        return redirect('/produtores')->with('status', "Produtor adicionado com sucesso!");
    }
}
