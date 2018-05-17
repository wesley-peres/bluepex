<h1 class="my-5">Listagem de Clientes</h1>

<?php if (isset($msg)) { ?>
<div class="alert alert-success text-center" role="alert"><b><?=$msg;?></b></div>
<?php } ?>

<a class="btn btn-primary mb-4" href="<?= base_url('clientes/cadastrar');?>">Cadastrar Cliente</a>

<form class="form-inline mb-4" method="post" action="<?=base_url('clientes/search/');?>">
  <input type="text" class="form-control w-50" id="pesquisa" name="pesquisa" placeholder="Pesquisar">
  <select class="form-control w-25" id="filtro" name="filtro">
    <option value="">Filtro</option>
    <option value="id">Código</option>
    <option value="nome">Nome</option>
    <option value="endereco">Endereço</option>
    <option value="telefone">Telefone</option>
    <option value="email">E-mail</option>
  </select>
  <button type="submit" class="btn btn-primary w-25">Pesquisar</button>          
</form>      

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