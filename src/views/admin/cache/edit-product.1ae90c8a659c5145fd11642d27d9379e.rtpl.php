<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("../shared/Header/header");?>


<section id="add-produtos">
  <div class="container">
    <form
      action="/bioloOnline/product-edit"
      method="post"
      class="needs-validation"
      enctype="multipart/form-data"
      novalidate
    >
      <div class="form-group">
        <h2>Adicionar novo produto</h2>
      </div>
      <?php $counter1=-1;  if( isset($product) && ( is_array($product) || $product instanceof Traversable ) && sizeof($product) ) foreach( $product as $key1 => $value1 ){ $counter1++; ?>


      <input type="hidden" name="id" value="<?php echo htmlspecialchars( $value1["produto_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
      <input type="hidden" name="photo" value="<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
      <div class="form-group">
        <img
          src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
          id="image"
          style="margin-bottom: 10px"
        />
        <input
          type="file"
          name="photo"
          class="file form-control"
          id="foto"
          rows="3"
          value="<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
          accept=".jpg, .png, .jpeg"
        />
        <div class="invalid-feedback">Selecione uma imagem</div>
      </div>
      <?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 200 ){ ?>


      <p style="color: green">Cadastrado com sucesso!</p>

      <?php }elseif( $status_code === 23000 ){ ?>


      <p style="color: red">Produto já existe!</p>

      <?php }elseif( $status_code === 12 ){ ?>


      <p style="color: red">Coloque um preço verdadeiro</p>

      <?php }else{ ?>


      <p style="color: red">Ocorreu um erro, tente novamente!</p>

      <?php } ?> <?php } ?>

      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="validationCustom02">Nome do produto</label>
          <input
            type="text"
            name="name"
            style="color: white"
            class="form-control"
            id="validationCustom02"
            value="<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
            placeholder="Nome do produto"
            required
          />
          <div class="invalid-feedback">Digite o nome do produto</div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="validationCustom02">Descrição do produto</label>
          <textarea
            name="description"
            style="height: 110px; color: white"
            class="form-control"
            id="validationCustom02"
            placeholder="Descrição do produto"
            required
            rows="3"
          >
          <?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

        </textarea
          >
          <div class="invalid-feedback">Descreva o produto</div>
        </div>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Categoria</label>
        <select
          class="form-control"
          name="category"
          style="
            width: 100% !important;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            background: #2a2d3a;
          "
        >
          <?php $counter2=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key2 => $value2 ){ $counter2++; ?>

          <option value="<?php echo htmlspecialchars( $value2["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
          <?php } ?>

        </select>
      </div>

      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="validationCustom02">Preço do produto</label>
          <input
            type="text"
            name="price"
            style="color: white"
            class="form-control"
            id="validationCustom02"
            value="<?php echo htmlspecialchars( $value1["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
            placeholder="Preço"
            required
          />
          <div class="invalid-feedback">Digite o preço do produto</div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label
            for="isActive"
            style="cursor: pointer; display: inline-flex; align-items: center"
          >
            <input type="checkbox" name="state" id="isActive" 
            <?php if( $value1["estado"]== 1 ){ ?> checked <?php } ?> style="margin-right: 0.4rem" /> Permitir
            visualização
          </label>
        </div>
      </div>
      <?php } ?>

      <div class="col-lg-12 my-4">
        <button type="submit" class="btn-block btn btn-login btn-lg">
          Editar Produto
        </button>
      </div>
    </form>
  </div>
</section>

<?php require $this->checkTemplate("../shared/Footer/footer");?>

