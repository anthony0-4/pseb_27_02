<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Categoria;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Aluno::all();

        //dd($dados);

        return view("aluno.list", ["dados"=>$dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view("aluno.form",['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome'=>"required|max:100",
            'cpf'=>"required|max:16",
            'categoria_id'=>"required",
            'telefone'=>"nullable"
        ],[
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' =>"Só é permetido 100 caracteres",
            'cpf.required' => "O :attribute é obrigatório",
            'categoria_id.required'=>"O :attribute é obrigatório",
            'cpf.max' =>"Só é permetido 16 caracteres",
        ]);

        Aluno::create(
            [
                'nome'=> $request->nome,
                'telefone'=> $request->telefone,
                'cpf' => $request->cpf,
            ]
        );

        return redirect('aluno');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorias = Categorias::all();

        $dado = Aluno::findOrFail($id);

        return view("aluno.form",[
            'dado'=>$dado,
            'categorias'=>$categorias
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome'=>"required|max:100",
            'cpf'=>"required|max:16",
            'categoria_id'=>"required",
            'telefone'=>"nullable"
        ],[
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' =>"Só é permetido 100 caracteres",
            'cpf.required' => "O :attribute é obrigatório",
            'categoria_id.required'=>"O :attribute é obrigatório",
            'cpf.max' =>"Só é permetido 16 caracteres",
        ]);

        Aluno::updateOrCreate(
            ['id'=>$request->id],
            [
                'nome'=> $request->nome,
                'telefone'=> $request->telefone,
                'cpf' => $request->cpf,
            ]
        );

        return redirect('aluno');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Aluno::findOrFail($id);

        $dado->delete();

        return redirect('aluno');
    }

    public function search(Request $request)
    {
        if(!empty($request->nome)){
            $dados = Aluno::where(
                "nome",
                "like",
                "%".$request->nome."%"
            )->get();
        }else{
            $dados = Aluno::all();
        }
        $dados = Aluno::all();

        //dd($dados);

        return view("aluno.list", ["dados"=>$dados]);
    }
}
