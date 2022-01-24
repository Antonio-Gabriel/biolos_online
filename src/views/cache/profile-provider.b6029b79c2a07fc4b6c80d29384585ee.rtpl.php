<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("shared/Header/header");?> <?php $counter1=-1;  if( isset($profile) && ( is_array($profile) || $profile instanceof Traversable ) && sizeof($profile) ) foreach( $profile as $key1 => $value1 ){ $counter1++; ?>
<section id="banner-vendedor">
  <div class="img-banner-vendedor"></div>
  <div class="img-vendedor">
    <img
      class="img-fluid"
      src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
      alt="vendedor"
    />
    <p><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>        
  </div>
</section>

<!------------PRODUTOS------------------->

<?php if( $productFilter !== 0 ){ ?>
<section style="margin-top: 150px !important; margin-bottom: 0px">
  <div class="container">
    <div class="lista-produtos">      
      <div class="row">  
        <form
          action="/bioloOnline/profile-provider/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
          method="get"
          class="col-md-12 d-flex"
        >
          <input
            class="form-control col-md-8"
            style="
              margin-left: 28px;
              margin-right: 18px;
              padding: 5px 10px;
              border-radius: 10px;
              color: white;
            "
            type="text"
            name="search"
            value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>"
            placeholder="Pesquisar por produtos"
          />
          <select
            class="col-md-3"
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
            <?php $counter2=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key2 => $value2 ){ $counter2++; ?>
            <option value="<?php echo htmlspecialchars( $value2["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
            <?php } ?>
          </select>
        </form>      
      </div>      

      <!------------PRODUTOS------------------->
      <section id="produtos" style="margin-top: 10px; width: 100%; ">
        <div class="container">
          <div class="row d-flex flex-wrap">
            <?php $providerId = $value1["id"]; ?>
            <?php $globalProviderId = $provider["0"]["id"] ?? 0; ?>
            <?php $counter2=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key2 => $value2 ){ $counter2++; ?> 
              <?php if( $value2["estado"] !== '0' ){ ?>            
                <div style="height: 400px;" class="card-container col-12 col-sm-6 col-md-4 col-lg-3 d-flex flex-column justify-content-center align-items-center">
                  <div style="height: 100%;"
             class="pro d-flex flex-column justify-content-center">
                  <a href="/bioloOnline/product/<?php echo htmlspecialchars( $value2["produto_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/details/<?php echo htmlspecialchars( $providerId, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <img style="height: 260px;"
                      class="pro d-flex flex-column justify-content-between"
                      src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value2["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                      alt="<?php echo htmlspecialchars( $value2["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                    />
                  </a>
                  <div
                    class="d-flex justify-content-between"
                    style="margin: 0"
                  >
                    <p class="card-text"><?php echo htmlspecialchars( $value2["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>                
                  </div>
                  <div class="card-info">
                    <p class="card-text"><?php echo htmlspecialchars( $value2["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>Kz</p>                    
                    <?php if( $globalProviderId !== $value2["fornecedor_id"] ){ ?>
                      <a
                        href="/bioloOnline/purchase/<?php echo htmlspecialchars( $value2["produto_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/"
                        class="btn btn-login"
                        style="display: block !important; margin: 10px; width:110px"
                        >
                        Comprar
                      </a>
                    <?php } ?>
                  </div>
                  </div>
                </div>            
              <?php } ?> 
            <?php } ?>
          </div>
        </div>
      </section>
      
    </div>
  </div>
</section>
<!------------PRODUTOS------------------->

<!--==============PAGINAÇÃO==============-->
<nav class="paginacao" aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php $counter2=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key2 => $value2 ){ $counter2++; ?>
    <li class="page-item">
      <a class="page-link" href="<?php echo htmlspecialchars( $value2["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
    </li>
    <?php } ?>
  </ul>
</nav>

<?php }else{ ?>

<section>
  <div class="container">
    <h1 style="color: white; font-size: 30px; margin-top: 160px">
      Sem Produtos
    </h1>
  </div>
</section>

<?php } ?> <?php } ?> <?php require $this->checkTemplate("shared/Footer/footer");?>
