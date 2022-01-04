<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("../shared/doc/_documentHeadOpen");?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a href="home" class="navbar-brand logo">
    <img
      src="/bioloOnline/src/assets/images/logo-44x44.png"
      class="img-responsive"
      alt=""
      style="width: 40px; height: 40px"
    />
    <span class="text-logo">BIOLOS ONLINE</span>
  </a>
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarText"
    aria-controls="navbarText"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto"></ul>
    <span class="navbar-text">
      <a href="home">Back to home</a>
    </span>
  </div>
</nav>

<!--Cadastrar vendedor-->
<section id="cadastrar">
  <div>
    <div class="container">
      <div class="cadastrar">
        <div class="form" action="" method="get">
          <form class="needs-validation" novalidate>
            <div
              class="form-group"
              style="
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
              "
            >
              <input type="file" name="" id="foto" />
              <label class="file" for="foto">Adicione uma foto de perfil</label>
            </div>
            <div class="form-row">
              <div class="col-md-7 mb-3">
                <label for="validationCustom01">Nome</label>
                <input
                  type="text"
                  class="form-control"
                  id="validationCustom01"
                  placeholder="Digite seu nome de vendedor..."
                  required
                />
                <div class="invalid-feedback">Digite seu nome.</div>
              </div>
              <div class="col-md-5 mb-3">
                <label for="validationCustom02">Contacto</label>
                <input
                  type="text"
                  class="form-control"
                  id="validationCustom02"
                  placeholder="Ex: (+244) 935 160 487"
                  required
                />
                <div class="invalid-feedback">
                  Digite seu número de telemovel.
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-5 mb-3">
                <label for="validationCustom01">Palavra-passe</label>
                <input
                  type="text"
                  class="form-control"
                  id="validationCustom01"
                  placeholder="Digite sua palavra-passe..."
                  required
                />
                <div class="invalid-feedback">Digite sua palavra-passe.</div>
              </div>
              <div class="col-md-7 mb-3">
                <label for="validationCustomUsername">Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"
                      >@</span
                    >
                  </div>
                  <input
                    type="text"
                    class="form-control"
                    id="validationCustomUsername"
                    placeholder="Digite seu email..."
                    aria-describedby="inputGroupPrepend"
                    required
                  />
                  <div class="invalid-feedback">Digite seu email.</div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="validationCustom03">Cidade</label>
                <input
                  type="text"
                  class="form-control"
                  id="validationCustom03"
                  placeholder="City"
                  required
                />
                <div class="invalid-feedback">Please provide a valid city.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationCustom04">Estado</label>
                <input
                  type="text"
                  class="form-control"
                  id="validationCustom04"
                  placeholder="State"
                  required
                />
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationCustom05">Bairro</label>
                <input
                  type="text"
                  class="form-control"
                  id="validationCustom05"
                  placeholder="Digite seu bairro.."
                  required
                />
                <div class="invalid-feedback">Digite o nome do seu bairro.</div>
              </div>
            </div>

            <button class="btn btn-primary btn-login" type="submit">
              Cadastrar
            </button>

            <a href="create-client" style="margin-left: 8px;">Criar conta cliente</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    "use strict";
    window.addEventListener(
      "load",
      function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName("needs-validation");
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener(
            "submit",
            function (event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add("was-validated");
            },
            false
          );
        });
      },
      false
    );
  })();
</script>

<?php require $this->checkTemplate("../shared/Footer/footer");?>
