<?php
//Controller de Pedidos
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
  public function index()
  {
    //Tabela de Pedidos.
    $pedidos = DB::table('pedidos')
    ->join('clientes', 'pedidos.id_cliente', '=', 'clientes.id_cliente')
    ->get();
    return view('pedidos.index', compact('pedidos'));
  }
  public function create()
  {
    //Formulário de Pedidos, junto com os clientes (Para montar o select apenas com clientes cadastrados anteriormente).
    $clientes = DB::table('clientes')->get();
    return view('pedidos.form', compact('clientes'));
  }
  public function store(Request $request)
  {
    //Insert direto pelo banco de dados (afim de demonstar, apenas).
    DB::table('pedidos')->insert([
      "data_envio" =>   "$request->data_envio",
      "descricao" =>    "$request->Teste",
      "id_cliente" =>   "$request->id_cliente",
      "data_entrega" => "$request->data_entrega",
      "valor_frete" =>  "$request->valor_frete"
    ]);

    $retorno = json_encode(array("mensagem" => "Pedido Cadastrado"));
    if(isset($request->token) and $request->token == "api") return $retorno;
    $request = "";
    $pedidos = DB::table('pedidos')
    ->join('clientes', 'pedidos.id_cliente', '=', 'clientes.id_cliente')
    ->get();
    return view('pedidos.index', compact('retorno', 'pedidos'));
  }
}
