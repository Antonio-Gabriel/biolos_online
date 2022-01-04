<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("shared/header/header");?>
<!--========PRODUTOS=========-->
<section id="produtos">
  <div class="container">
    <div class="row">
      <div class="img-produto col-md-8">
        <img
          class="img-fluid"
          src="/bioloOnline/src/assets/images/vestuarios/casaco-amarelo.jpg"
          alt=""
        />
      </div>
      <div class="info-produto col-md-4">
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
        <p class="descricao-produto">
          Loremm ipsum dolor, sit amet consectetur adipisicing elit. Dolorum
          recusandae ad illum impedit perspiciatis eveniet quaerat facere dolor
          possimus voluptatum, itaque distinctio saepe sunt repellendus corrupti
          fuga odit quae.
        </p>
        <div class="btn-produto row">
          <!--=======================CHAMAR MODAL COMPRAR==================================-->
          <!-- Button trigger modal -->
          <button
            type="button"
            class="btn btn-comprar col-md-4"
            data-toggle="modal"
            data-target="#exampleModal"
          >
            Comprar
          </button>
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

          <!--=======================CHAMAR MODAL CARRINHO==================================-->

          <!-- Button trigger modal -->
          <button
            type="button"
            class="btn btn-adicionar col-md-4 text-align-center"
            data-toggle="modal"
            data-target="#ModalCarrinho"
          >
            <a href="#">Mais produtos</a>
          </button>

          <!-- Modal -->
          <div
            class="modal fade"
            id="ModalCarrinho"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Carrinho</h5>
                </div>
                <div class="modal-body">
                  <div class="menu-carrinho">
                    <p class="item">item</p>
                    <p class="subtotal">Subtotal</p>
                  </div>
                  <div class="produto-img">
                    <div class="">
                      <img
                        src="/bioloOnline/src/assets/images/vestuarios/casaco-amarelo.jpg"
                        alt=""
                      />
                      <div class="produto-txt">
                        <p style="font-weight: bold">Anjelina Julie</p>
                        <p>casaco Amarelo</p>
                      </div>
                    </div>
                    <p style="color: #fff">4.5kz</p>
                  </div>
                  <div class="total-carrinho">
                    <p class="total">Total</p>
                    <p class="subtotal">4.5kz</p>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="btn-carrinho row">
                    <button class="btn btn-compra col-md-4">Comprar</button>
                    <button
                      class="btn btn-cancelar col-md-4 text-align-center"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      Cancelar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--========PRODUTOS=========-->
<?php require $this->checkTemplate("shared/footer/footer");?>
