<h1>Editar Usuario</h1>
<?php

include('C:\xampp\htdocs\projeto\conexao.php');

   $sql= "SELECT * FROM usuarios WHERE id=".$_REQUEST["id"];
   $res = $conn->query($sql);
   $row = $res->fetch_object();

?>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">

    <div class="md-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php print $row->nome; ?>" class="form-control">
    </div>  

    <div class="md-3">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php print $row->email; ?>"class="form-control">
    </div>

    <div class="md-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>

    <div class="md-3">
        <label>Data de Nascimento</label>
        <input type="date" name="data_nasc"value="<?php print $row->data_nascimento; ?>" class="form-control">
    </div>

    <div class="md-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>


