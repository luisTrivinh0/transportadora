<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cadastro de Pedidos</title>
  </head>
  <body>
    <div class="container">
      <form action="{{ route('registrar_pedido') }}" method='POST'>
        @csrf
        <div class="form-row mt-5">
          <div class="col-md-2">
            <label class="form-label" for="data_envio">Envio</label>
            <input class="form-control" value="{{date('Y-m-d')}}" type="date" name="data_envio" id="data_envio" readonly>
          </div>
          <div class="col-md-5">
            <label class="form-label" for="descricao">Descrição</label>
            <input class="form-control" type="text" name="descricao" id="descricao" maxlength="90" required>
          </div>
          <div class="col-md-5">
            <label class="form-label" for="cliente">Cliente</label>
            <select class="form-control" type="text" name="id_cliente" id="cliente" required>
              <option value="" selected disabled>Selecione um Cliente</option>
              @foreach ($clientes as $cliente)
                <option value="{{$cliente->id_cliente}}">{{$cliente->nome_cliente}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <label class="form-label" for="data_entrega">Entrega</label>
            <input class="form-control" value="{{date('Y-m-d', strtotime('+14 days'))}}" min="{{date('Y-m-d')}}" type="date" name="data_entrega" id="data_entrega">
          </div>
          <div class="col-md-6 mb-2">
            <label class="form-label " for="valor_frete">Valor</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
              </div>
              <input type="number" class="form-control text-right dinheiro" min="0" step=".01" name="valor_frete" id="valor_frete">
            </div>
          </div>
        </div>
        <div>
          <button class="btn btn-success mt-3" type="submit">Salvar</button>
        </div>
      </form>
      <a href="{{ route('pedidos_index') }}">
        <button class="btn btn-warning mt-3">Voltar</button>
      </a>
    </div>
  </body>
</html>