<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("../shared/Header/header");?>

<section id="fornecedor">
  <div class="container">
    <?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 200 ){ ?>
    <div class="alert alert-primary" role="alert">
      Perfil Actualizado com sucesso!
    </div>
    <?php } ?> <?php } ?>

    <div class="row">
      <div class="col-md-4 d-flex justify-content-center">
        <?php $counter1=-1;  if( isset($provider) && ( is_array($provider) || $provider instanceof Traversable ) && sizeof($provider) ) foreach( $provider as $key1 => $value1 ){ $counter1++; ?>
        <img
          id="provider-image"
          class="img-fluid rounded"
          src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
          alt="vendedor"
        />
      </div>
      <div class="col-md-8">
        <div class="col-md-12 d-flex justify-content-center"></div>
        <h2 class="text-center"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>

        <p class="text-center"><strong>Email: </strong> <?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <p class="text-center"><strong>Contacto: </strong> <?php echo htmlspecialchars( $value1["contacto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <p class="text-center"><strong>Rua: </strong> <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <p class="text-center"><strong>Bairro: </strong> <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <p class="text-center"><strong>Cidade: </strong> <?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <?php } ?>
        <div class="info row col-md-12 d-flex justify-content-center">
          <div class="row">
            <div
              class="d-flex align-items-center flex-column justify-content-center text-dark"
            >
              <p>Produtos</p>
              <h4>395</h4>
            </div>
            <div class="">
              <div
                class="d-flex d-flex align-items-center flex-column justify-content-center text-dark"
              >
                <p>Views</p>
                <h4>395</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 d-flex justify-content-center my-4">
      <button type="button" class="btn-block btn btn-login btn-lg">
        <a href="add-product"> Add </a>
      </button>
      <button type="button" class="btn-block btn btn-light btn-lg">
        <a href="edit-profile" style="color: #010101 !important">
          Editar Perfil
        </a>
      </button>
    </div>
  </div>
</section>

<!------------PRODUTOS------------------->
<!------------PRODUTOS------------------->
<section id="" class="" style="margin-top: 20px !important; margin-bottom: 0px">
  <div class="container">
    <div class="lista-produtos">
      <div class="row">
        <input
          class="form-control col-sm-12 col-md-8 my-1 mx-3 ml-3"
          style="padding: 5px 10px; border-radius: 10px"
          type="text"
          name=""
          id=""
          placeholder="Pesquisar por produtos"
        />
        <select
          class="form-control col-sm-12 col-md-3 my-1 mr-2 ml-3"
          name=""
          id=""
          style="
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 10px;
            background: #2a2d3a;
          "
        >
          <option value="">Minhas Categorias</option>
          <option value="1">Roupas</option>
          <option value="2">Calsados</option>
        </select>
      </div>
      <!------------PRODUTOS------------------->
      <!------------PRODUTOS------------------->
      <div class="container">
        <div class="row">
          <div
            class="card-container col-12 col-sm-6 col-md-4 col-lg-3 d-flex flex-column justify-content-center align-items-center"
          >
            <div class="pro d-flex flex-column justify-content-center">
              <a href="produtos.html">
                <img
                  class="img-fluid"
                  src="src/assets/images/vestuarios/casaco-amarelo.jpg"
                />
              </a>
              <span class="nome-produto">Camisolas</span>
              <div class="info-produto my-2">
                <a href="#">Desactivar</a>
                <a href="#">Editar</a>
                <a href="#" class="">Eliminar</a>
              </div>
            </div>
          </div>
          <div
            class="col-12 col-sm-6 col-md-4 col-lg-3 card-container d-flex flex-column justify-content-center align-items-center"
          >
            <div class="pro d-flex flex-column justify-content-center">
              <a href="produtos.html">
                <img
                  class="img-fluid"
                  src="src/assets/images/vestuarios/casaco-amarelo.jpg"
                />
              </a>
              <span class="nome-produto">Camisolas</span>
              <div class="info-produto my-2">
                <a href="#">Desactivar</a>
                <a href="#">Editar</a>
                <a href="#" class="">Eliminar</a>
              </div>
            </div>
          </div>
          <div
            class="col-12 col-sm-6 col-md-4 col-lg-3 card-container d-flex flex-column justify-content-center align-items-center"
          >
            <div class="pro d-flex flex-column justify-content-center">
              <a href="produtos.html">
                <img
                  class="img-fluid"
                  src="src/assets/images/vestuarios/casaco-amarelo.jpg"
                />
              </a>
              <span class="nome-produto">Camisolas</span>
              <div class="info-produto my-2">
                <a href="#">Desactivar</a>
                <a href="#">Editar</a>
                <a href="#" class="">Eliminar</a>
              </div>
            </div>
          </div>
          <div
            class="col-12 col-sm-6 col-md-4 col-lg-3 card-container d-flex flex-column justify-content-center align-items-center"
          >
            <div class="pro d-flex flex-column justify-content-center">
              <a href="produtos.html">
                <img
                  class="img-fluid"
                  src="src/assets/images/vestuarios/casaco-amarelo.jpg"
                />
              </a>
              <span class="nome-produto">Camisolas</span>
              <div class="info-produto my-2">
                <a href="#">Desactivar</a>
                <a href="#">Editar</a>
                <a href="#" class="">Eliminar</a>
              </div>
            </div>
          </div>
          <div
            class="card-container col-12 col-sm-6 col-md-4 col-lg-3 d-flex flex-column justify-content-center align-items-center"
          >
            <div class="pro d-flex flex-column justify-content-center">
              <a href="produtos.html">
                <img
                  class="img-fluid"
                  src="src/assets/images/vestuarios/casaco-amarelo.jpg"
                />
              </a>
              <span class="nome-produto">Camisolas</span>
              <div class="info-produto my-2">
                <a href="#">Desactivar</a>
                <a href="#">Editar</a>
                <a href="#" class="">Eliminar</a>
              </div>
            </div>
          </div>
          <div
            class="col-12 col-sm-6 col-md-4 col-lg-3 card-container d-flex flex-column justify-content-center align-items-center"
          >
            <div class="pro d-flex flex-column justify-content-center">
              <a href="produtos.html">
                <img
                  class="img-fluid"
                  src="src/assets/images/vestuarios/casaco-amarelo.jpg"
                />
              </a>
              <span class="nome-produto">Camisolas</span>
              <div class="info-produto my-2">
                <a href="#">Desactivar</a>
                <a href="#">Editar</a>
                <a href="#" class="">Eliminar</a>
              </div>
            </div>
          </div>
          <div
            class="col-12 col-sm-6 col-md-4 col-lg-3 card-container d-flex flex-column justify-content-center align-items-center"
          >
            <div class="pro d-flex flex-column justify-content-center">
              <a href="produtos.html">
                <img
                  class="img-fluid"
                  src="src/assets/images/vestuarios/casaco-amarelo.jpg"
                />
              </a>
              <span class="nome-produto">Camisolas</span>
              <div class="info-produto my-2">
                <a href="#">Desactivar</a>
                <a href="#">Editar</a>
                <a href="#" class="">Eliminar</a>
              </div>
            </div>
          </div>
          <div
            class="col-12 col-sm-6 col-md-4 col-lg-3 card-container d-flex flex-column justify-content-center align-items-center"
          >
            <div class="pro d-flex flex-column justify-content-center">
              <a href="produtos.html">
                <img
                  class="img-fluid"
                  src="src/assets/images/vestuarios/casaco-amarelo.jpg"
                />
              </a>
              <span class="nome-produto">Camisolas</span>
              <div class="info-produto my-2">
                <a href="#">Desactivar</a>
                <a href="#">Editar</a>
                <a href="#" class="">Eliminar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!------------PRODUTOS------------------->

<!------------PRODUTOS------------------->

<!--==============PAGINAÇÃO==============-->
<nav class="paginacao" aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
<script>
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
</script>
<?php require $this->checkTemplate("../shared/Footer/footer");?>
