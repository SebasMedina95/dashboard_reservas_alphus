<?php 

$usuarios = ControladorUsuarios::ctrMostrarusuarios(null,null);

function limit($iterable, $limit) {
    foreach ($iterable as $key => $value) {
        if (!$limit--) break;
        yield $key => $value;
    }
}


?>


<div class="card card-info card-outline">

  <div class="card-header">

    <h3 class="card-title"><strong>Últimos usuarios registrados</strong></h3>

  </div>
  <!-- /.card-header -->

  <div class="card-body p-0">

    <ul class="products-list product-list-in-card pl-2 pr-2">

      <?php foreach (limit($usuarios, 10) as $key => $value): ?>

        <?php if ($value["foto"] != ""){

          $foto = $value["foto"];

        }else{

          $foto = "views/img/usuarios/default/default.png";

        }
          
        ?>

        <li class="item">
          <div class="product-img">
            <img src="<?php echo $foto?>" alt="Product Image" class="img-size-50 rounded-circle">
          </div>
          <div class="product-info">
            <h6 class="product-title"><?php echo $value["nombre"] ?></h6>
              <span class="product-description">
                Ingreso <?php echo $value["email"] ?>
              </span>
            </div>
        </li>
        
      <?php endforeach ?>

      </ul>
  </div>
      <!-- /.card-body -->
  <div class="card-footer text-right">
    <a href="reservas" class="btn btn-info mt-3"><i class="fa-solid fa-eye"></i> Ver usuarios</a>
  </div>
      <!-- /.card-footer -->
</div>