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

<section id="login">
  <div>
    <div class="container">
      <div class="login">
        <div class="form" action="" method="post">
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
              <img
                src="/bioloOnline/src/assets/images/logo-75x75.png"
                alt=""
                style="width: 75px; height: 75px; margin-bottom: 10px"
              />
              <h4 style="color: #fff">Iniciar sessão</h4>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationCustom01">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="validationCustom01"
                  placeholder="Digite seu email.."
                  required
                />
                <div class="invalid-feedback">Digite seu email.</div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationCustom02">Palavra-passe</label>
                <input
                  type="text"
                  class="form-control"
                  id="validationCustom02"
                  placeholder="Digite sua palavra-passe..."
                  required
                />
                <div class="invalid-feedback">Digite sua palavra-passe.</div>
              </div>
            </div>
            <button
              class="btn btn-primary btn-login"
              style="margin-top: 10px"
              type="submit"
            >
              Entrar
            </button>

            <a href="create-account" style="margin-left: 8px">Criar conta</a>
            <br /><br />
            <a href="login">Entrar como comprador</a>
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

<?php require $this->checkTemplate("../shared/footer/footer");?>
