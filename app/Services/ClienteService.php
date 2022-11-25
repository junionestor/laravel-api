<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteService
{
    protected $model;

    public function __construct(Cliente $cliente)
    {
        $this->model = $cliente;
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function storeCliente(Request $request)
    {
        try {
            $this->model->create($request->all());
            return 'Criado com sucesso';
        }
        catch(\Throwable $th){
            throw $th;
        }
    }

    public function getById($id)
    {
        $cliente = $this->model->find($id);
        return $cliente;
    }

    public function getByPlaca($placa)
    {
        $cliente = $this
                    ->model
                    ->where('placa_carro', 'like', '%'.$placa)
                    ->get();
        
        return $cliente;
    }

    public function update(Request $request, $id)
    {
        $cliente = $this->model->find($id);
        if(!$cliente){
            return 'Cliente não encontrado!';
        }
        try {
            $dados = $request->all();
            $cliente->fill($dados)->save();
            return 'Cliente atualizado!';
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        $cliente = $this->model->find($id);
        if(!$cliente){
            return 'Cliente não encontrado!';
        }

        try {
            $cliente->delete();
            return 'Cliente excluído!';
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}