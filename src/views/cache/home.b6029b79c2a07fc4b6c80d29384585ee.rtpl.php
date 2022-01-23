<?php if(!class_exists('Rain\Tpl')){exit;}?><!--banner-->
<section id="banner">
  <div class="container">
    <div class="img-banner col-md-12">
      <h1>
        Encontre as melhores marcas <br />
        que gostarias de vestir!...
      </h1>
    </div>
  </div>
</section>
<!--banner-->

<!--vendedores-->
<section id="vendedores" class="">
  <div class="container">
    <?php if( $providers ){ ?>
    <h3>Top dos vendedores</h3>
    <div class="lista-vendedogres">
      <div class="horizontal-scroll">
        <button id="btn-scroll-left" class="btn-scroll">
          <i class="fas fa-chevron-left" onclick="scrollHorizontally(1)"></i>
        </button>
        <button id="btn-scroll-right" class="btn-scroll">
          <i class="fas fa-chevron-right" onclick="scrollHorizontally(-1)"></i>
        </button>
        <div class="storys-container">
          <?php $counter1=-1;  if( isset($providers) && ( is_array($providers) || $providers instanceof Traversable ) && sizeof($providers) ) foreach( $providers as $key1 => $value1 ){ $counter1++; ?>
          <div class="storys-circle">
            <span class="activo"
              ><?php echo GetTotalProductsByProvider($value1["id"]); ?></span
            >
            <img src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
            <div class="online"></div>
            <a
              class="nome-vendedor"
              href="/bioloOnline/profile-provider/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
              ><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a
            >
            <span>Vendedor</span>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php }else{ ?>
    <div class="container">
      <h2 style="color: white; margin-top: 30px">Sem fornecedores</h2>
    </div>
    <?php } ?>
  </div>
</section>
<!--vendedores-->

<!------------PRODUTOS------------------->
<div class="container">
  <div class="row">
    <?php $globalProviderId = $provider["0"]["id"] ?? 0; ?> 
    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
    <?php if( $globalProviderId !== $value1["fornecedor_id"] ){ ?>
    <div
      class="card-container col-12 col-sm-6 col-md-4 col-lg-3 d-flex flex-column justify-content-center align-items-center"
    >
      <div class="pro d-flex flex-column justify-content-center">
        <a
          href="/bioloOnline/product/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/details/<?php echo htmlspecialchars( $value1["fornecedor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
        >
          <img style="height:260px;"
            class="img-fluid"
            src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
          />
        </a>
        <span class="nome-produto"><?php echo htmlspecialchars( $value1["product_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
        <div class="info-produto my-2">
          <p><span class="preco"><?php echo htmlspecialchars( $value1["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>kz</span></p>                    
          <a href="/bioloOnline/purchase/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="btn btn-login">
            Comprar
          </a>          
        </div>
      </div>
    </div>
    <?php } ?>
    <?php } ?>
  </div>

  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 d-flex justify-content-center mt-5">
      <a class="btn btn-compra" href="/bioloOnline/products">
        Ver mais produtos
      </a>
    </div>
  </div>
</div>
