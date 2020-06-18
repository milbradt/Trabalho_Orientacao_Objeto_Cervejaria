<!DOCTYPE HTML>
<html>
<?php include("../corpo/head.php") ?>

<body>
    <?php include("../corpo/menu.php") ?>
    <?php require_once("../../controller/cerveja/ControllerEditarCerveja.php"); ?>
    <div class="row">
        <form method="post" action="../../controller/cerveja/ControllerEditarCerveja.php" id="form" name="form" onsubmit="validar(document.form); return false;" class="col-10">
            <div class="form-group">
                <input class="form-control" type="text" id="marca" name="marca" value="<?php echo $obj->getMarca(); ?>" required autofocus>
                <input class="form-control" type="text" id="tipo" name="tipo" value="<?php echo $obj->getTipo(); ?>" required>
                <input class="form-control" type="text" id="medida" name="medida" value="<?php echo $obj->getMedida(); ?>" required>
                <input class="form-control" type="number" id="quantidade" name="quantidade" value="<?php echo $obj->getQuantidade(); ?>" required>
                <input class="form-control" type="number" id="preco" name="preco" step=".01" value="<?php echo $obj->getPreco(); ?>" required>
                <select name="ativo">
                    <?php $c = $obj->getAtivo(); ?>
                    <option value="<?php echo $obj->getAtivo(); ?>"><?php echo ($obj->getAtivo() == 0) ? "Desativado" : "Ativado" ?></option>
                    <option value="<?php echo ($c == 0) ? "1" : "0" ?>"><?php echo ($obj->getAtivo() != 0) ? "Desativado" : "Ativado" ?></option>
                </select>
                <input class="form-control" type="date" id="data" name="data" value="<?php echo $obj->getData(); ?>" required>
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