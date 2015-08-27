<?php
include 'controller/Controller.php';
$controller = new Controller();
$title = "HOME";
@$productos = call_user_func(array($controller, 'sp_listar_productos'),$_GET['cat']);
?>

<?php include "template/header.php"?>

<?php include "template/slider.php"?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">

                    <?php include 'template/categoria.php'?>

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Nuestros Productos</h2>
                    <?php foreach ($productos as $producto) { ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img style="width: 200px;height: 200px"
                                            src="images/producto/<?=$producto->id?>.jpg" alt=""/>
                                        <h2><?=$producto->precio?></h2>
                                        <p><?=$producto->nombre?></p>
                                        <a href="detalle.php?id=<?=$producto->id?>" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>Ver
                                        </a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?= $producto->precio?></h2>
                                            <p><?= $producto->nombre?></p>
                                            <a href="detalle.php?id=<?=$producto->id?>" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Ver</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "template/footer.php"?>