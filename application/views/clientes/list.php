<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <title>Cadastro de Clientes</title>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">BluePex</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('clientes');?>">Clientes</a>
            </li>
        </div>
      </nav>
    </header>

    <div class="container-fluid">      

      <h1 class="my-5">Listagem de Clientes</h1>

      <?php if (isset($msg)) { ?>
      <div class="alert alert-success text-center" role="alert"><b><?=$msg;?></b></div>
      <?php } ?>

      <a class="btn btn-primary mb-4" href="<?= base_url('clientes/cadastrar');?>">Cadastrar Cliente</a>

      <?php if (count($clientes) > 0) : ?>

      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th class="d-none d-md-table-cell" scope="col">Endereço</th>
            <th class="d-none d-md-table-cell" scope="col">Telefone</th>
            <th class="d-none d-md-table-cell" scope="col">E-mail</th>
            <th class="text-center" scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($clientes as $cliente) { ?>
          <tr>            
            <td><?=$cliente->id;?></td>
            <td><?=$cliente->nome;?></td>
            <td class="d-none d-md-table-cell"><?=$cliente->endereco;?></td>
            <td class="d-none d-md-table-cell"><?=$cliente->telefone;?></td>
            <td class="d-none d-md-table-cell"><?=$cliente->email;?></td>
            <td class="text-center">
              <a href="<?= base_url("clientes/visualizar/$cliente->id");?>" data-toggle="tooltip" data-placement="top" title="Visualizar"><i class="fas fa-eye"></i></a>
              <a class="ml-2" href="<?= base_url("clientes/alterar/$cliente->id");?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a> 
              <a class="ml-2" href="<?=base_url("clientes/excluir/$cliente->id");?>" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
          <?php } ?>                 
        </tbody>
      </table>

      <?php echo $pagination; ?>

      <?php else : ?>
      
      <div class="col-md-12 mt-5 text-center alert alert-secondary" role="alert">
        <b>Nenhum cliente cadastrado!</b>
      </div>

      <?php endif; ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
  </body>
</html>