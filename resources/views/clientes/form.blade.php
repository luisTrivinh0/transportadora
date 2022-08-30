<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cadastro de Clientes</title>
  </head>
  <body>
    <div class="container mt-5">
      <form action="{{ route('registrar_cliente') }}" method='POST'>
        @csrf
        <label class="form-label" for="nome">Nome</label>
        <input class="form-control" type="text" name="nome_cliente" id="nome" maxlength="90" required>
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