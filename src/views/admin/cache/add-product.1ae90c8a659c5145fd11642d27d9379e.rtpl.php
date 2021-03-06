<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("../shared/Header/header");?>


<section id="add-produtos">
  <div class="container">
    <form
      action="/bioloOnline/add"
      method="post"
      class="needs-validation"
      enctype="multipart/form-data"
      novalidate
    >
      <div class="form-group">
        <h2>Adicionar novo produto</h2>
      </div>
      <div class="form-group">
        <img src="" id="image" style="margin-bottom: 10px" />
        <input
          type="file"
          name="photo"
          class="file form-control"
          id="foto"
          rows="3"
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

      <?php }elseif( $status_code === 403 ){ ?>


      <p style="color: red">Selecione imagem do produto!</p>

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
          ></textarea>
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
          <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>

          <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
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
            pattern="/^([1-9][0-9]{,2}(,[0-9]{3})*|[0-9]+)(\.[0-9]{1,9})?$/"
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
            <input
              type="checkbox"
              name="state"
              id="isActive"
              style="margin-right: 0.4rem"
            />

            Permitir visualização
          </label>
        </div>
      </div>

      <div class="col-lg-12 my-4">
        <button type="submit" class="btn-block btn btn-login btn-lg">
          Cadastrar
        </button>
      </div>
    </form>
  </div>
</section>

<?php require $this->checkTemplate("../shared/Footer/footer");?>

