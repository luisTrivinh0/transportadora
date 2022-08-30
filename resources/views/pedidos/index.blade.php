<?php
  if (!isset($retorno)){
    $msg = "";
  }else{
    $retorno = json_decode($retorno);
    $msg = $retorno->mensagem;
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Pedidos da Transportadora</title>
  </head>
  <body>
    <div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center card-title text-info">Pedidos da Transportadora</h4>
            <br>
            <div class="text-center">
              <a href="{{ route('pedidos_form') }}">
                <button type="button" class="btn btn-info mb-5">
                  Cadastrar Novo Pedido
                </button>
              </a>
              <a href="{{ route('clientes_form') }}">
                <button type="button" class="btn btn-info mb-5">
                  Cadastrar Novo Cliente
                </button>
              </a>
            </div>
            <table class="table table-striped table-bordered" id="datatable">
                <thead>
                    <th class="text-center">Envio</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Entrega</th>
                    <th class="text-center">Valor do Frete (R$)</th>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                          <td class="text-center">{{($pedido->data_envio == "") ? 'Sem data informada' : date('d/m/Y', strtotime($pedido->data_envio))}}</small></td>
                          <td class="text-center">{{ $pedido->id_pedido }}</td>
                          <td class="text-center">{{ $pedido->nome_cliente }}</td>
                          <td class="text-center">{{($pedido->data_entrega == "") ? 'Sem data informada' : date('d/m/Y', strtotime($pedido->data_entrega))}}</small></td>
                          <td class="text-center">{{ number_format($pedido->valor_frete,2,",",".") }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </body>
  <script>
    var msg = '{{ $msg }}';
    if (msg != ""){
      Swal.fire(
              'Sucesso!',
              msg,
              'success'
            )
    }
  </script>
</html>
