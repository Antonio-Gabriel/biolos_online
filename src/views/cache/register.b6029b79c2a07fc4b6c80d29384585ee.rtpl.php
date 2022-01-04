<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("shared/doc/_documentHeadOpen");?>


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

<!--Cadastrar cliente-->
<section id="login">
  <div>
    <div class="container">
      <div class="login">
        <div class="form">
          <form
            action="create"
            method="post"
            class="needs-validation"
            novalidate
          >
            <div
              class="form-group"
              style="
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
              "
            ></div>

            <h3 style="color: white; margin-bottom: 20px">
              Criar conta cliente
            </h3>

            <?php if( $status_code !== 0 ){ ?>

              <?php if( $status_code === 200 ){ ?>

              <p style="color: green">Cadastrado com sucesso!</p>
              <?php }elseif( $status_code === 23000 ){ ?>

              <p style="color: red">Usuário já existe!</p>
              <?php }else{ ?>

              <p style="color: red">Ocorreu um erro, tente novamente!</p>
              <?php } ?>

            <?php } ?>


            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationCustom01">Nome</label>
                <input
                  type="text"
                  name="name"
                  class="form-control"
                  id="validationCustom01"
                  placeholder="Digite seu nome"
                  maxlength="80"
                  required
                />
                <div class="invalid-feedback">Digite um nome válido</div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationCustom02">Contacto</label>
                <input
                  type="text"
                  name="contact"
                  class="form-control"
                  id="validationCustom02"
                  placeholder="Ex: (+244) 935 160 487"
                  pattern="^(?:(\+244|00244))?(9)(1|2|3|4|9)([\d]{7,7})$"
                  required
                />
                <div class="invalid-feedback">
                  Digite um número de Angola válido
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationCustom02">Email</label>
                <input
                  type="text"
                  name="email"
                  class="form-control"
                  id="validationCustom02"
                  placeholder="Digite seu email.."
                  pattern="^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$"
                  required
                />
                <div class="invalid-feedback">Digite um email válido.</div>
              </div>
            </div>
            <button
              class="btn btn-primary btn-login"
              style="margin-top: 10px"
              type="submit"
            >
              Cadastrar
            </button>

            <a href="create-account" style="margin-left: 8px"
              >Criar conta fornecedor</a
            >

            <br /><br />
            <a href="login-admin" style="margin-left: 8px">Login</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <script>
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
</script> -->

<?php require $this->checkTemplate("shared/Footer/footer");?>

