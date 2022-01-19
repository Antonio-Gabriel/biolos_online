<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("shared/Header/header");?>

<!--========PRODUTOS=========-->
<section id="detalhe-produtos" class="produto-detalhe-container">
  <div class="container">
    <div class="product-detail row" style="margin-top: 40px">
      <?php $globalProviderId = $provider["0"]["id"] ?? 0; ?> 
      <?php $counter1=-1;  if( isset($product) && ( is_array($product) || $product instanceof Traversable ) && sizeof($product) ) foreach( $product as $key1 => $value1 ){ $counter1++; ?>
      <div class="img-produto col-12 col-sm-12 col-md-12 col-lg-8">
        <img
          style="width: px; height: 500px;"
          class="row"
          src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
          alt=""
        />
      </div>
      <div
        class="info-produto d-flex flex-column col-12 col-sm-12 col-md-12 col-lg-4"
      >
        <div class="nome-produto">
          <h2><?php echo htmlspecialchars( $value1["produto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
          <a href="#" class="btn"><?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
        </div>
        <p class="txt-produto"><?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.</p>
        <p class="txt-produto">Categoria - <?php echo htmlspecialchars( $value1["categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <div class="foto-produto-vendedor d-flex justify-content-center align-items-center">
          <img

            src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto_fornecedor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
            alt=""
          />
          <a href="/bioloOnline/profile-provider/<?php echo htmlspecialchars( $value1["fornecedor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["fornecedor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
        </div>
        <div
          class="descricao"
          style="margin-bottom: 8px; display: flex; flex-direction: column"
        >
          <strong style="font-size: 20px">Preço: <?php echo htmlspecialchars( $value1["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Kz</strong>          
          <p><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
          <span><?php echo htmlspecialchars( $value1["contacto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
        </div>
        <p
          class="descricao-detalhe-produto d-flex justify-content-center align-items-center text-center"
        >
          <?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
        </p>
        <div
          class="btn-detalhe-produto d-flex justify-content-center align-items-center"
        >
          <!--=======================CHAMAR MODAL COMPRAR==================================-->
          <!-- Button trigger modal -->

          <!--- 
            data-toggle="modal"
            data-target="#exampleModal"  
          -->
          <?php if( $globalProviderId !== $value1["fornecedor_id"] ){ ?>
          <a href="/bioloOnline/add-cart/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-login">
            Comprar
          </a>
          <?php } ?>

          <a href="/bioloOnline/products" class="btn btn-conta px-3 text-nowrap"
            >Mais produtos</a
          >
          <?php } ?>

          <!-- Button trigger modal -->

          <!-- Modal -->
          <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div
                  class="modal-header"
                  style="padding: -20px 0px !important; text-align: center"
                >
                  <h5 class="modal-title" id="exampleModalLabel">
                    Pagado com sucesso
                  </h5>
                </div>
                <div class="modal-body">
                  <img
                    class="img-modal"
                    src="/bioloOnline/src/assets/images/vestuarios/casaco-amarelo.jpg"
                    alt=""
                  />
                  <p style="color: #fff">
                    You successful purchased
                    <span style="font-weight: bold">casaco amarelo</span> from
                    <a style="color: #fff; font-weight: bold" href="#"
                      >Anjelina Julie</a
                    >
                  </p>
                </div>
                <div class="modal-footer">
                  <div class="share">
                    <h4>Share</h4>
                  </div>
                  <div class="modal-redes">
                    <span class=""
                      ><a href="#"><i class="fas fa-home"></i></a
                    ></span>
                    <span class=""
                      ><a href="#"><i class="fas fa-hospital"></i></a
                    ></span>
                    <span class=""
                      ><a href="#"><i class="fas fa-envelope"></i></a
                    ></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal -->
        </div>
      </div>
    </div>
  </div>
</section>
<!--========PRODUTOS=========-->

<?php require $this->checkTemplate("shared/Footer/footer");?>
