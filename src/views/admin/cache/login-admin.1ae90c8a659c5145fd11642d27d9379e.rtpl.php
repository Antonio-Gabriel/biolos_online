<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("../shared/doc/_documentHeadOpen");?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a href="/bioloOnline/" class="navbar-brand logo">
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
      <a href="/bioloOnline/home">Back to home</a>
    </span>
  </div>
</nav>

<section id="login">
  <div>
    <div class="container">
      <div class="login">
        <div class="form">
          <form
            action="/bioloOnline/login-admin"
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
            >
              <img
                src="/bioloOnline/src/assets/images/logo-75x75.png"
                alt=""
                style="width: 75px; height: 75px; margin-bottom: 10px"
              />
              <h4 style="color: #fff">Iniciar sessão</h4>
            </div>

            <?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 401 ){ ?>

            <p style="color: red">Acesso negado!</p>

            <?php } ?> <?php } ?>

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
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationCustom02">Palavra-passe</label>
                <input
                  type="password"
                  name="password"
                  class="form-control"
                  id="validationCustom02"
                  placeholder="Digite sua palavra-passe..."
                  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                  required
                />

                <label for="visibility" class="visibility">
                  <input type="checkbox" id="visibility" />
                  <span>Mostrar password</span>
                </label>

                <div class="invalid-feedback">
                  No mínimo oito caracteres, pelo menos uma letra maiúscula, uma
                  letra minúscula, um número e um caractere especial ex:
                  @$!%*?&.
                </div>
              </div>
            </div>
            <button
              class="btn btn-primary btn-login"
              style="margin-top: 10px"
              type="submit"
            >
              Entrar
            </button>

            <a href="/bioloOnline/create-account" style="margin-left: 8px">Criar conta</a>
            <br /><br />
            <a href="/bioloOnline/login">Entrar como comprador</a>
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
