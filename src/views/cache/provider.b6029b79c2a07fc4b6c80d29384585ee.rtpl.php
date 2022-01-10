<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("shared/Header/header");?>
<!------------PRODUTOS------------------->

<?php if( $providers ){ ?>

<section style="margin-top: 20px !important; margin-bottom: 0px">
  <div class="container">
    <div class="lista-produtos">
      <div class="row">
        <form
          action="/bioloOnline/providers"
          method="get"
          class="col-md-12"
          style="color: white"
        >
          <input
            class="form-control"
            style="
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
        </form>
      </div>
      <!------------PRODUTOS------------------->
      <section id="vendedor" style="margin-top: 10px">
        <div class="container">
          <div class="row">
            <?php $counter1=-1;  if( isset($providers) && ( is_array($providers) || $providers instanceof Traversable ) && sizeof($providers) ) foreach( $providers as $key1 => $value1 ){ $counter1++; ?>            
            <div class="col-md-3">             
              <span class="activo"><?php echo GetTotalProductsByProvider($value1["id"]); ?></span>
              <img src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
              <div class="online"></div>
              <a
                class="nome-vendedor"
                href="/bioloOnline/profile-provider/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                ><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a
              >
              <span>2.99</span>
            </div>
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
    <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
    <li class="page-item">
      <a class="page-link" href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
    </li>
    <?php } ?>
  </ul>
</nav>

<?php }else{ ?>

<section>
  <div class="container">
    <h1 style="color: white">Sem provedores</h1>
  </div>
</section>

<?php } ?> <?php require $this->checkTemplate("shared/Footer/footer");?>
