<h1 class="my-5"><?=$op == "view" ? "Visualizar" : ($op == "edit" ? "Editar" : "Cadastrar");?> Cliente</h1>

<form method="post" action="<?=$op == "view" ? base_url("clientes/visualizar/$cliente->id") : ($op == "edit" ? base_url("clientes/atualizar/$cliente->id") : base_url('clientes/inserir')); ?>">
  <div class="form-group">
    <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?=isset($cliente->nome) ? $cliente->nome : "";?>" required <?=$op == "view" ? "readonly" : "";?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="endereco" placeholder="Endereço" value="<?=isset($cliente->endereco) ? $cliente->endereco : "";?>" required <?=$op == "view" ? "readonly" : "";?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control telefone" name="telefone" placeholder="Telefone" value="<?=isset($cliente->telefone) ? $cliente->telefone : "";?>" required <?=$op == "view" ? "readonly" : "";?>>
  </div>
  <div class="form-group">
    <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?=isset($cliente->email) ? $cliente->email : "";?>" required <?=$op == "view" ? "readonly" : "";?>>
  </div>
  <div class="form-group">
    <?php if ($op != "view") { ?>
    <button type="submit" class="btn btn-success" name="btn-enviar">Salvar</button>
    <?php } ?>
    <a href="<?=base_url('clientes');?>" class="btn btn-secondary" name="btn-voltar" role="button">Voltar</a>
    <input type="hidden" name="id_cliente" value="<?=isset($cliente->id) ? $cliente->id : "";?>">
  </div>
</form>