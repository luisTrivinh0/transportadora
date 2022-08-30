<?php

//Controller de Clientes

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
  public function create()
  {
      //Abre o formulário de Clientes
      return view('clientes.form');
  }

  public function store(Request $request)
  {
    //Insert direto pelo banco de dados (afim de demonstar, apenas).
    DB::table('clientes')->insert([
      'nome_cliente' => $request->nome_cliente
    ]);
    $retorno = json_encode(array("mensagem" => "Cliente Cadastrado!"));
    if (isset($request->token) and $request->token == "api") return $retorno;
    $request = "";
    $pedidos = DB::table('pedidos')
    ->join('clientes', 'pedidos.id_cliente', '=', 'clientes.id_cliente')
    ->get();
    return view('pedidos.index', compact('retorno', 'pedidos'));
  }
}
