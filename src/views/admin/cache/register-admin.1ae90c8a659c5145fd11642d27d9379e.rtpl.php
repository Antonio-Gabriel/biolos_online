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
        <div class="form">
          <form
            action="/bioloOnline/admin-create"
            method="post"
            class="needs-validation"
            enctype="multipart/form-data"
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
              <img src="" id="image" />
              <input
                type="file"
                name="photo"
                id="foto"
                accept=".jpg, .png, .jpeg"
              />
              <label class="file" for="foto">Adicione uma foto de perfil</label>
            </div>

            <?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 200 ){ ?>

            <p style="color: green">Cadastrado com sucesso!</p>

            <?php }elseif( $status_code === 23000 ){ ?>

            <p style="color: red">Fornecedor j?? existe!</p>

            <?php }else{ ?>

            <p style="color: red">Ocorreu um erro, tente novamente!</p>

            <?php } ?> <?php } ?>

            <div class="form-row">
              <div class="col-md-7 mb-3">
                <label for="validationCustom01">Nome</label>
                <input
                  type="text"
                  name="name"
                  class="form-control"
                  id="validationCustom01"
                  placeholder="Digite seu nome de vendedor..."
                  maxlength="80"
                  required
                />
                <div class="invalid-feedback">Digite seu nome.</div>
              </div>
              <div class="col-md-5 mb-3">
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
                  Digite um n??mero de Angola v??lido
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-5 mb-3">
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
                  No m??nimo oito caracteres, pelo menos uma letra mai??scula, uma
                  letra min??scula, um n??mero e um caractere especial ex:
                  @$!%*?&.
                </div>
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
                    name="email"
                    class="form-control"
                    id="validationCustom02"
                    placeholder="Digite seu email.."
                    pattern="^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$"
                    required
                  />
                  <div class="invalid-feedback">Digite um email v??lido.</div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="validationCustom03">Cidade</label>
                <input
                  type="text"
                  name="city"
                  class="form-control"
                  id="validationCustom03"
                  placeholder="City"
                  maxlength="45"
                  required
                />
                <div class="invalid-feedback">
                  Preencha devidamente o campo.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationCustom04">Estado</label>
                <input
                  type="text"
                  name="state"
                  class="form-control"
                  id="validationCustom04"
                  placeholder="State"
                  maxlength="45"
                  required
                />
                <div class="invalid-feedback">
                  Preencha devidamente o campo.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationCustom05">Bairro</label>
                <input
                  type="text"
                  name="district"
                  class="form-control"
                  id="validationCustom05"
                  placeholder="Digite seu bairro.."
                  maxlength="45"
                  required
                />
                <div class="invalid-feedback">
                  Preencha devidamente o campo.
                </div>
              </div>
            </div>

            <button class="btn btn-primary btn-login" type="submit">
              Cadastrar
            </button>

            <a href="/bioloOnline/create-client" style="margin-left: 8px"
              >Criar conta cliente</a
            >

            <a href="/bioloOnline/login-admin" style="margin-left: 8px">Login</a>
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
