<!DOCTYPE HTML>
<html>
<?php include("../corpo/head.php") ?>

<body>
    <?php include("../corpo/menu.php") ?>
    <?php require_once("../../controller/cliente/ControllerEditarCliente.php"); ?>
    <div class="row">
        <form method="post" action="../../controller/cliente/ControllerEditarCliente.php" id="form" name="form" onsubmit="validar(document.form); return false;" class="col-10">
            <div class="form-group">
                <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $obj->getNome(); ?>" required autofocus>
                <input class="form-control" type="text" id="cpf" name="cpf" value="<?php echo $obj->getCpf(); ?>" required>
                <input class="form-control" type="date" id="dataNasc" name="dataNasc" value="<?php echo $obj->getDataNasc(); ?>" required>
                <input class="form-control" type="text" id="logradouro" name="logradouro" value="<?php echo $obj->getLogradouro(); ?>" required>
                <input class="form-control" type="text" id="bairro" name="bairro" value="<?php echo $obj->getBairro(); ?>" required>
                <input class="form-control" type="number" id="cep" name="cep" value="<?php echo $obj->getCep(); ?>" required>
                <input class="form-control" type="number" id="numero" name="numero" value="<?php echo $obj->getNumero(); ?>" required>
                <input class="form-control" type="text" id="cidade" name="cidade" value="<?php echo $obj->getCidade(); ?>" required>

                <select name="ativo">
                    <?php $c = $obj->getAtivo(); ?>
                    <option value="<?php echo $obj->getAtivo(); ?>"><?php echo ($obj->getAtivo() == 0) ? "Desativado" : "Ativado" ?></option>
                    <option value="<?php echo ($c == 0) ? "1" : "0" ?>"><?php echo ($obj->getAtivo() != 0) ? "Desativado" : "Ativado" ?></option>
                </select>

            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $obj->getId(); ?>">
                <button type="submit" class="btn btn-success" id="editar" name="submit" value="editar">Editar</button>
            </div>
        </form>
    </div>
    <?php include("../corpo/rodape.php"); ?>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</html>