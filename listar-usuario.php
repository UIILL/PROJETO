<h1>Listar Usuários</h1>
<?php


define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("BASE", "cadastro");

$conn = new mysqli(HOST, USER, PASS, BASE);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";

$res = $conn->query($sql);

$qtd = $res->num_rows;
if ($qtd > 0){
    print "<table class='table table-hover table-striped table-bordered'>";
    print "<tr>";  
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>E-mail</th>";
    print "<th>Data de nascimento</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while($row = $res->fetch_object()){  
        print "<tr>";     
        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->nome . "</td>";
        print "<td>" . $row->email . "</td>";
        print "<td>" . $row->data_nasc . "</td>";
        print "<td>
                <button onclick=\"location.href='?page=editar&id=" . $row->id . "';\" class='btn-success'>Editar</button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row->id . "';}else{return false;}\" class='btn btn-danger'>Excluir</button>
              </td>";
        print "</tr>";
    }    

    print "</table>";        
} else {
    print "<p class='alert alert-danger'>Não foram encontrados resultados!</p>";
}
?>
