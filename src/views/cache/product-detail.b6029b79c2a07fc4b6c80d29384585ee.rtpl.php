<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("shared/Header/header");?>

<!--========PRODUTOS=========-->
<section id="detalhe-produtos">
  <div class="container">
    <div class="product-detail row" style="margin-top: 40px;">
      <div class="img-produto col-12 col-sm-12 col-md-12 col-lg-8">
        <img
          class="img-fluid"
          src="/bioloOnline/src/assets/images/vestuarios/casaco-amarelo.jpg"
          alt=""
        />
      </div>
      <div class="info-produto d-flex flex-column col-12 col-sm-12 col-md-12 col-lg-4">
        <div class="nome-produto">
          <h2>casaco amarelo</h2>
          <a href="#" class="btn">aa</a>
        </div>
        <p class="txt-produto">Lorem, ipsum dolor - Lorem, ipsum.</p>
        <p class="txt-produto">Lorem, ipsum.</p>
        <div class="foto-vendedor">
          <img src="/bioloOnline/src/assets/images/img-scroll/1.jpg" alt="" />
          <p class="">Anjelina Julie</p>
        </div>
        <div class="descricao">
          <p>Lorem, ipsum</p>
          <p>Lorem</p>
        </div>
        <p class="descricao-detalhe-produto d-flex justify-content-center align-items-center text-center">
          Loremm ipsum dolor, sit amet consectetur adipisicing elit. Dolorum
          recusandae ad illum impedit perspiciatis eveniet quaerat facere dolor
          possimus voluptatum, itaque distinctio saepe sunt repellendus corrupti
          fuga odit quae.
        </p>
        <div class="btn-detalhe-produto d-flex justify-content-center align-items-center ">
            <!--=======================CHAMAR MODAL COMPRAR==================================-->
            <!-- Button trigger modal -->
            <a
              type="button"
              class="btn btn-login px-4"
              data-toggle="modal"
              data-target="#exampleModal"
            >
              Comprar
            </a>
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

          
              <a href="#" class="btn btn-conta px-3 text-nowrap">Mais produtos</a>


            <!-- Modal -->
          
          </div>
      </div>
    </div>
  </div>
</section>
<!--========PRODUTOS=========-->

<?php require $this->checkTemplate("shared/Footer/footer");?>
