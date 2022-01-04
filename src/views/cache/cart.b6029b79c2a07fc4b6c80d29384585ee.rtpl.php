<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("shared/Header/header");?>

<div id="carrinho" class="">
  <div class="container">
    <div class="row" style="color: aliceblue">
      <div class="col-md-8">
        <div class="d-flex justify-content-between">
          <h3>Carrinho</h3>
          <h3>3 Items</h3>
        </div>
        <hr />
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Produtos</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Preço</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">
                <div class="row">
                  <div class="col-md-4">
                    <img
                      src="src/assets/images/vestuarios/casaco-amarelo.jpg"
                      alt=""
                    />
                  </div>
                  <div class="col-md-8">
                    <h4>Casaco Amarelo</h4>
                    <a href="#">Osvaldo Cariege</a>
                  </div>
                </div>
              </th>
              <td>
                <div class="row">
                  <span class="ren">-</span>
                  <input
                    type="number"
                    name="quantity"
                    id="input"
                    value="1"
                    maxlength="2"
                  />
                  <span class="add">+</span>
                </div>
              </td>
              <td>
                <span class="price">100</span>
              </td>
              <td>
                <span class="total">10</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="b col-md-4">
        <div class="d-flex justify-content-center">
          <h3>Carrinho</h3>
        </div>
        <hr />
        <h3 class="d-flex justify-content-center my-4">Total: 378</h3>
        <div class="btn-carrinho">
          <button class="btn btn-login">Comprar</button>
          <button class="btn btn-conta">Adicionar produtos</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require $this->checkTemplate("shared/Footer/footer");?>
