<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("shared/Header/header");?>

<?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 400 ){ ?>
<div class="alert alert-danger" role="alert">
  Erro ao adicionar produto!
</div>
<?php } ?> <?php } ?>

<?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 200 ){ ?>
<div class="alert alert-success" role="alert">
  Produto adicionado com sucesso!.
</div>
<?php } ?> <?php } ?>

<div id="carrinho" class="">
  <div class="container">
    <div class="row" style="color: aliceblue">
      <div class="col-12 col-sm-12 col-md-12 col-lg-8">
        <div class="d-flex justify-content-between">
          <h3>Carrinho</h3>
          <h3><?php echo GetTotalProductsIntoCart($client["0"]["id"] ?? 0, $provider["0"]["id"] ?? 0); ?> Items</h3>
        </div>
        <hr />
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Produtos</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Preço</th>
              <th scope="col">Total</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">
                <div class="row">
                  <div class="col-md-4">
                    <img src="src/assets/images/vestuarios/casaco-amarelo.jpg"/>
                  </div>
                  <div class="col-md-8">
                    <h4>Casaco Amarelo</h4>
                    <a href="#">Osvaldo Cariege</a>
                  </div>
                </div>
              </th>
              <td>
                <div class="row">
                  <span class="ren-" style="padding: 4px; background: rgb(53, 50, 50);">
                    <a href="/bioloOnline/cart?ac=rem">-</a>
                  </span>
                  <input
                    type="number"
                    name="quantity"
                    id="input"
                    value="1"
                    maxlength="2"
                  />
                  <span class="add-" style="padding: 4px; background: rgb(53, 50, 50);">
                    <a href="/bioloOnline/cart?ac=add">+</a>
                  </span>
                </div>
              </td>
              <td>
                <span class="#">100</span>
              </td>
              <td>
                <span class="#">10</span>
              </td>
              <td>
                <a href="">X</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="b col-12 col-sm-12 col-md-12 col-lg-4">
        <div class="d-flex justify-content-center">
          <h3>Carrinho</h3>
        </div>
        <hr />
        <h3 class="d-flex justify-content-center my-4">Total: 378</h3>
        <div class="btn-carrinho my-4">
          <a class="btn btn-md btn-primary px-5" href="#">Comprar</a>
          <a class="btn btn-md btn-danger" href="/bioloOnline/products">Adicionar produtos</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require $this->checkTemplate("shared/Footer/footer");?>
