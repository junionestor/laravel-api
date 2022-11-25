<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ClienteService;

class ClienteController extends Controller
{
    protected $clienteService;
    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        return response($this->clienteService->getAll(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response($this->clienteService->storeCliente($request), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getById($id)
    {
        $cliente = $this->clienteService->getById($id);
        if (!$cliente)
        {
            return response()
                    ->json('Cliente não encontrado!', 
                            Response::HTTP_NOT_FOUND);
        }
        return response($cliente, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getByPlaca($placa)
    {
        $cliente = $this->clienteService->getByPlaca($placa);
        if (!$cliente){
            return response()
                    ->json('Não há cliente para o final da placa informado!', 
                            Response::HTTP_NOT_FOUND);
        }
        
        return response()->json($cliente, Response::HTTP_OK);
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
        return response($this->clienteService->update($request, $id), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response($this->clienteService->destroy($id), Response::HTTP_NO_CONTENT);
    }
}
