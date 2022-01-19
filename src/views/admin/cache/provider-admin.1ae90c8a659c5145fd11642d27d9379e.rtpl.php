<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("../shared/Header/header");?>

<section id="fornecedor">
  <div class="container">
    <?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 200 ){ ?>
    <div class="alert alert-success" role="alert">
      Perfil Actualizado com sucesso!
    </div>

    <?php } ?> <?php } ?> <?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 203 ){ ?>
    <div class="alert alert-success" role="alert">
      Estado Actualizado com sucesso!
    </div>

    <?php } ?> <?php } ?> <?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 201 ){ ?>
    <div class="alert alert-success" role="alert">
      Produto removido com sucesso!
    </div>
    <?php } ?> <?php } ?> <?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 202 ){ ?>
    <div class="alert alert-success" role="alert">
      Produto Actualizado com sucesso!
    </div>
    <?php } ?> <?php } ?>

    <div class="row">
      <div class="col-md-4 d-flex justify-content-center">
        <?php $counter1=-1;  if( isset($provider) && ( is_array($provider) || $provider instanceof Traversable ) && sizeof($provider) ) foreach( $provider as $key1 => $value1 ){ $counter1++; ?>
        <img
          id="provider-image"
          class="img-fluid rounded"
          src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
          alt="vendedor"
        />
      </div>
      <div class="col-md-8">
        <div class="col-md-12 d-flex justify-content-center"></div>
        <h2 class="text-center"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>

        <p class="text-center"><strong>Email: </strong> <?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <p class="text-center"><strong>Contacto: </strong> <?php echo htmlspecialchars( $value1["contacto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <p class="text-center"><strong>Rua: </strong> <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <p class="text-center"><strong>Bairro: </strong> <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <p class="text-center"><strong>Cidade: </strong> <?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <?php } ?>

        <div class="info row col-md-12 d-flex justify-content-center">
          <div class="row">
            <div
              class="d-flex align-items-center flex-column justify-content-center text-dark"
            >
              <p>Produtos</p>
              <h4><?php echo htmlspecialchars( $totalProduct, ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
            </div>
            <div class="">
              <div
                class="d-flex d-flex align-items-center flex-column justify-content-center text-dark"
              >
                <p>Views</p>
                <h4>395</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 d-flex justify-content-center my-4">
      <button type="button" class="btn-block btn btn-login btn-lg">
        <a href="/bioloOnline/add-product"> Add </a>
      </button>
      <button type="button" class="btn-block btn btn-light btn-lg">
        <a href="/bioloOnline/edit-profile" style="color: #010101 !important">
          Editar Perfil
        </a>
      </button>
    </div>
  </div>
</section>

<!------------PRODUTOS------------------->
<!------------PRODUTOS------------------->
<?php if( $products ){ ?>
<section id="" class="" style="margin-top: 20px !important; margin-bottom: 0px">
  <div class="container">
    <div class="lista-produtos">
      <div class="row">
        <form
          action="/bioloOnline/provider-admin"
          method="get"
          class="col-sm-12 col-md-12 my-1 mx-3 ml-3 d-inline-flex align-content-center justify-content-between"
        >
          <input
            class="form-control col-md-8"
            style="padding: 5px 10px; border-radius: 10px; color: white"
            type="text"
            name="search"
            value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>"
            placeholder="Pesquisar por produtos"
          />

          <select
            class="form-control col-sm-12 col-md-3 my-1"
            name="category"
            style="
              color: #fff;
              border: none;
              padding: 5px 10px;
              border-radius: 10px;
              background: #2a2d3a;
            "
          >
            <option value="0">All</option>
            <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>
            <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
            <?php } ?>
          </select>
        </form>
      </div>
      <!------------PRODUTOS------------------->
      <!------------PRODUTOS------------------->
      <div class="container">
        <div class="row">
          <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

          <div
            class="card-container col-12 col-sm-6 col-md-4 col-lg-3 d-flex flex-column justify-content-center align-items-center"
          >
            <div class="pro d-flex flex-column justify-content-center">
              <a
                href="/bioloOnline/product/<?php echo htmlspecialchars( $value1["produto_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/details/<?php echo htmlspecialchars( $value1["fornecedor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
              >
                <img
                  class="img-fluid"
                  style="
                    width: 280px !important;
                    height: 400px;
                    margin-top: 10px;
                  "
                  src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                />
              </a>

              <article
                style="
                  margin-top: 8px;
                  display: flex;
                  align-items: center;
                  justify-content: space-between;
                "
              >
                <span class="nome-produto"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                <span class="nome-produto"><?php echo htmlspecialchars( $value1["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Kz</span>
              </article>

              <div class="info-produto my-2">
                <?php if( $value1["estado"] === '0' ){ ?>
                <a
                  href="/bioloOnline/product/<?php echo htmlspecialchars( $value1["produto_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/state/<?php echo htmlspecialchars( $value1["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                  >Activar</a
                >
                <?php }else{ ?>
                <a
                  href="/bioloOnline/product/<?php echo htmlspecialchars( $value1["produto_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/state/<?php echo htmlspecialchars( $value1["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                  >Desactivar</a
                >
                <?php } ?>
                <a href="/bioloOnline/product/<?php echo htmlspecialchars( $value1["produto_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/edit"
                  >Editar</a
                >
                <a href="/bioloOnline/product/<?php echo htmlspecialchars( $value1["produto_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete"
                  >Eliminar</a
                >
              </div>
            </div>
          </div>

          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!------------PRODUTOS------------------->

<!------------PRODUTOS------------------->

<!--==============PAGINAÇÃO==============-->
<nav class="paginacao" aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
    <li class="page-item">
      <a class="page-link" href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
    </li>
    <?php } ?>
  </ul>
</nav>

<?php }else{ ?>

<div class="container">
  <h2 style="color: white; margin-top: 30px">Sem produtos</h2>
</div>

<?php } ?>
<script>
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
</script>
<?php require $this->checkTemplate("../shared/Footer/footer");?>
