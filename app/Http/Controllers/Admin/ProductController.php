<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Afiliados;
use App\Models\Category;
use App\Models\Product;
use App\Models\Produtor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function getData()
    {
        $products = Product::with(['category', 'afiliado', 'produtor'])->select('products.*');

        return DataTables::of($products)
            ->addColumn('action', function ($product) {
                return '<a href="' . url('edit-product/' . $product->id) . '" class="btn btn-primary">Editar</a>'
                . '<a href="' . url('delete-product/' . $product->id) . '" class="btn btn-danger">Deletar</a>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function add()
    {
        $category = Category::all();
        $afiliados = Afiliados::all();
        $produtores = Produtor::all();
        return view('admin.products.add', compact('category', 'afiliados', 'produtores'));
    }

    public function insert(Request $request)
    {
        $products = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename);
            $products->image = $filename;
        }

        $products->cate_id = $request->input('cate_id');
        $products->afiliado_id = $request->input('afiliado_id');
        $products->produtor_id = $request->input('produtor_id');
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->save();
        return redirect('/products')->with('status', "Produto adicionado com sucesso!");
    }

    public function edit($id)
    {
        $products = Product::find($id);
        $category = Category::all();
        $afiliados = Afiliados::all();
        $produtores = Produtor::all();
        return view('admin.products.edit', compact('products', 'category', 'afiliados', 'produtores'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/products/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);

            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename);
            $products->image = $filename;
        }

        $products->cate_id = $request->input('cate_id');
        $products->afiliado_id = $request->input('afiliado_id');
        $products->produtor_id = $request->input('produtor_id');
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->update();
        return redirect('/products')->with('status', "Produto atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        if ($products->image) {
            $path = 'assets/uploads/products/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $products->delete();
        return redirect('/products')->with('status', "Produto deletado com sucesso!");
    }
}
