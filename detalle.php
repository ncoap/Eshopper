<?php
$title = "PRODUCTO";
include 'controller/Controller.php';
$controller = new Controller();
@$producto = call_user_func(array($controller, 'sp_get_producto'),$_GET['id']);
?>

<?php include "template/header.php"?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <?php include 'template/categoria.php'?>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="product-information">
                    <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                    <h2><?=$producto->nombre ?></h2>
                    <img src="images/producto/<?=$producto->id ?>.jpg" alt="" style="width: 250px;height: 250px"/>
                <span>
                    <span>S/.<?=$producto->precio ?></span>
                    <label>Cantidad:</label>
                    <label><?=$producto->cantidad ?></label>
                    <button type="button" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Agregar
                    </button>
                </span>
                    <div style="padding-top: 1em">
                        <p><b>Descripción:</b> <?=$producto->descripcion ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php /*include "template/footer.php"*/?>