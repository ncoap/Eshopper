<?php
    @$categorias = call_user_func(array($controller, 'sp_categoria'),0);
?>
<h2>Categorías</h2>
<div class="panel-group category-products">
    <?php foreach ($categorias as $categoria) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="categoria.php?id=<?=$categoria->id?>&cat=<?=$categoria->nombre?>"><?=$categoria->nombre?></a>
                </h4>
            </div>
        </div>
    <?php }?>
</div>