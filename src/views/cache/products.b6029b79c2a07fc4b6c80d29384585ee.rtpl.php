<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("shared/Header/header");?>
<!------------PRODUTOS------------------->
<?php if( $products ){ ?>
<section id="" class="" style="margin-top: 20px !important; margin-bottom: 0px">
  <div class="container">
    <div class="lista-produtos">
      <div class="row">
        <form
          action="/bioloOnline/products"
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
          <?php $globalProviderId = $provider["0"]["id"] ?? 0; ?> 
          <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
          <div style="height: 400px;"
            class="card-container col-12 col-sm-6 col-md-4 col-lg-3 d-flex flex-column justify-content-center align-items-center"
          >
            <div style="height: 100%;"
             class="pro d-flex flex-column justify-content-center">
              <a
                href="/bioloOnline/product/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/details/<?php echo htmlspecialchars( $value1["fornecedor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
              >
                <img style=" height: 260px;"
                  class="img-fluid"
                  src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                />
              </a>
              <span class="nome-produto"><?php echo htmlspecialchars( $value1["product_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
              <div class="info-produto my-2 align-items-end">
                <p><span class="preco"><?php echo htmlspecialchars( $value1["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>kz</span></p>                
                <?php if( $globalProviderId !== $value1["fornecedor_id"] ){ ?>
                <a
                  href="/bioloOnline/purchase/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/"
                  class="btn btn-login"
                >
                  Comprar
                </a>
                <?php } ?>
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
<?php } ?> <?php require $this->checkTemplate("shared/Footer/footer");?>
