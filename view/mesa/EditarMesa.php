<!DOCTYPE HTML>
<html>
<?php include("../head.php") ?>

<body>
    <?php include("../menu.php") ?>
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

</html>