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

<?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 201 ){ ?>
<div class="alert alert-success" role="alert">
  Produto removido com sucesso!.
</div>
<?php } ?> <?php } ?>

<?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 202 ){ ?>
<div class="alert alert-success" role="alert">
  Reserva efectuada sucesso, verifique a reserva no teu email!.
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
            <?php if( $products ){ ?>
            <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
            <tr>
              <th scope="row">
                <div class="row">
                  <div class="col-md-4">
                    <img src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
                  </div>
                  <div class="col-md-8">
                    <h4><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>                    
                  </div>
                </div>
              </th>
              <td>
                <div class="row">
                  <span class="ren-" style="padding: 4px; background: rgb(53, 50, 50);">
                    <a href="/bioloOnline/cart?ac=rem&qtd=<?php echo htmlspecialchars( $value1["quantidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&prd=<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">-</a>
                  </span>
                  <input
                    type="number"
                    name="quantity"
                    id="input"
                    value="<?php echo htmlspecialchars( $value1["quantidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                    maxlength="2"
                    disabled
                  />
                  <span class="add-" style="padding: 4px; background: rgb(53, 50, 50);">
                    <a href="/bioloOnline/cart?ac=add&qtd=<?php echo htmlspecialchars( $value1["quantidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&prd=<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">+</a>
                  </span>
                </div>
              </td>
              <td>
                <span class="#"><?php echo htmlspecialchars( $value1["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>kz</span>
              </td>
              <td>
                <span class="#"><?php echo htmlspecialchars( $value1["total"], ENT_COMPAT, 'UTF-8', FALSE ); ?>kz</span>
              </td>
              <td>
                <a 
                 href="/bioloOnline/purchase/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" 
                 onclick="return confirm('Are you sure you want to delete this product?')" >
                 X
                </a>
              </td>
            </tr>
            <?php } ?>
            <?php }else{ ?>
            <th scope="row">
              <div class="row">               
                <div class="col-md-8">
                  <h4>Sem produtos</h4>                 
                </div>
              </div>
            </th>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="b col-12 col-sm-12 col-md-12 col-lg-4">
        <div class="d-flex justify-content-center">
          <h3>Carrinho</h3>
        </div>
        <hr />
        <h3 class="d-flex justify-content-center my-4">Total: <?php echo formatNumber($total); ?>kz</h3>
        <div class="btn-carrinho my-4">         
          <?php if( $products ){ ?>
            <?php if( $client["0"]['id'] ?? 0 ){ ?>
              <a class="btn btn-md btn-primary px-5" href="/bioloOnline/purchase/<?php echo htmlspecialchars( $client["0"]['id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>/complete">Finalizar</a>
              <?php }else{ ?>
              <a class="btn btn-md btn-primary px-5" href="/bioloOnline/purchase/<?php echo htmlspecialchars( $provider["0"]['id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>/complete">Finalizar</a>
            <?php } ?>
          <?php } ?>
          <a class="btn btn-md btn-danger" href="/bioloOnline/products">Adicionar produtos</a>            
        </div>
      </div>
    </div>
  </div>
</div>
<?php require $this->checkTemplate("shared/Footer/footer");?>
