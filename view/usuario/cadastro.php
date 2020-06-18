<!DOCTYPE html>
<html lang="pt-br">

<?php 

    $DIR = $_SERVER['DOCUMENT_ROOT'];
    require_once( $DIR .'/controller/usuario/ControllerUsuario.php');
    
    new ControllerUsuario();

    include("../corpo/head.php");

?>

<body>
    <?php include("../corpo/menu.php"); ?>
    <div class="row">
        <form method="post" action="../../controller/usuario/ControllerCadastroUsuario.php" id="form" name="form" onsubmit="validar(document.form); return false;" class="col-10">
            <div class="form-group">
                <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" required autofocus>
                <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF" required>
                <input class="form-control" type="text" id="senha" name="senha" placeholder="Senha" required>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                <input class="form-control" type="text" id="admin" name="admin" placeholder="Permissao Admin" required>
                <input class="form-control" type="date" id="dataNasc" name="dataNasc" placeholder="Data de Nascimento" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="cadastrar">Cadastrar Cliente</button>
            </div>
        </form>
        <?php include("../corpo/rodape.php"); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>