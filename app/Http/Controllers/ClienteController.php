<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    protected $model;
    public function __construct(Cliente $cliente)
    {
        $this->model = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        return response($this->model->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->model->create($request->all());
            return response('Criado com sucesso');
        }
        catch(\Throwable $th){
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getById($id)
    {
        $cliente = $this->model->find($id);
        if (!$cliente){
            return response('Cliente não encontrado!');
        }
        return response($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getByPlaca($placa)
    {
        $cliente = $this
                    ->model
                    ->where('placa_carro', 'like', '%'.$placa)
                    ->get();
        if (!$cliente){
            return response('Cliente não encontrado!');
        }
        return response($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = $this->model->find($id);
        if(!$cliente){
            return response('Cliente não encontrado!');
        }
        return response($cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = $this->model->find($id);
        if(!$cliente){
            return response('Cliente não encontrado!');
        }
        try {
            $dados = $request->all();
            $cliente->fill($dados)->save();
            return response('Cliente atualizado!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = $this->model->find($id);
        if(!$cliente){
            return response('Cliente não encontrado!');
        }

        try {
            $cliente->delete();
            return response('Cliente excluído!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
