<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("../shared/Header/header");?>


<!--Cadastrar vendedor-->
<section id="cadastrar">
  <div>
    <div class="container">
      <div class="cadastrar">
        <div class="form">
          <form
            action="edit"
            method="post"
            class="needs-validation"
            enctype="multipart/form-data"
            onsubmit="return validateProviderForm()"
          >
            <?php $counter1=-1;  if( isset($provider) && ( is_array($provider) || $provider instanceof Traversable ) && sizeof($provider) ) foreach( $provider as $key1 => $value1 ){ $counter1++; ?>


            <div
              class="form-group"
              style="
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
              "
            >
              <input type="hidden" name="photo" value="<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
              <input type="hidden" name="id" value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
              <img src="/bioloOnline/src/resources/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="image" />
              <input
                type="file"
                name="photo"
                id="foto"
                value="<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                accept=".jpg, .png, .jpeg"
              />
              <label class="file" for="foto">Adicione uma foto de perfil</label>
            </div>

            <?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 200 ){ ?>


            <p style="color: green">Actualizado com sucesso!</p>

            <?php }elseif( $status_code === 400 ){ ?>


            <p style="color: red">Palavra passe inválida!</p>

            <?php }elseif( $status_code === 10 ){ ?>


            <p style="color: red">Informe a nova palavra passe!</p>

            <?php }elseif( $status_code === 11 ){ ?>


            <p style="color: red">Informe a palavra passe antiga!</p>

            <?php }else{ ?>


            <p style="color: red">Ocorreu um erro, tente novamente!</p>

            <?php } ?> <?php } ?>


            <p style="color: red" id="msg"></p>

            <div class="form-row">
              <div class="col-md-7 mb-3">
                <label for="validationCustom01" id="name-validate">Nome</label>
                <input
                  type="text"
                  name="name"
                  class="form-control"
                  id="validationCustom01"
                  placeholder="Digite seu nome de vendedor..."
                  maxlength="80"
                  value="<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                />
                <div class="invalid-feedback">Digite seu nome.</div>
              </div>
              <div class="col-md-5 mb-3" id="contact-validate">
                <label for="contacto">Contacto</label>
                <input
                  type="text"
                  name="contact"
                  class="form-control"
                  id="contacto"
                  placeholder="Ex: (+244) 935 160 487"
                  value="<?php echo htmlspecialchars( $value1["contacto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                />
                <div class="invalid-feedback">
                  Digite um número de Angola válido
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-5 mb-3" id="pass-validate">
                <label for="password">Palavra-passe Actual</label>
                <input
                  type="password"
                  name="password"
                  class="form-control"
                  id="password"
                  placeholder="Digite sua palavra-passe..."
                />

                <label for="visibility" class="visibility">
                  <input type="checkbox" id="visibility" />
                  <span>Mostrar password</span>
                </label>

                <?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 403 ){ ?>


                <div class="invalid-feedback" style="display: block">
                  No mínimo oito caracteres, pelo menos uma letra maiúscula, uma
                  letra minúscula, um número e um caractere especial ex:
                  @$!%*?&.
                </div>
                <?php } ?> <?php } ?>

              </div>

              <div class="col-md-7 mb-3" id="confirm-validate">
                <label for="password">Nova Palavra-passe</label>
                <input
                  type="password"
                  name="newPassword"
                  class="form-control"
                  id="confirm-password"
                  placeholder="Digite sua palavra-passe..."
                />

                <label for="visibility1" class="visibility">
                  <input type="checkbox" id="visibility1" />
                  <span>Mostrar password</span>
                </label>

                <?php if( $status_code !== 0 ){ ?> <?php if( $status_code === 403 ){ ?>


                <div class="invalid-feedback" style="display: block">
                  No mínimo oito caracteres, pelo menos uma letra maiúscula, uma
                  letra minúscula, um número e um caractere especial ex:
                  @$!%*?&.
                </div>
                <?php } ?> <?php } ?>

              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 mb-3" id="email-validate">
                <label for="email">Email</label>
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
                    id="email"
                    value="<?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                    placeholder="Digite seu email.."
                  />
                </div>
                <div class="invalid-feedback">Digite um email válido.</div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 mb-3" id="city-validate">
                <label for="validationCustom03">Cidade</label>
                <input
                  type="text"
                  name="city"
                  class="form-control"
                  id="city-validate"
                  value="<?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                  placeholder="City"
                  maxlength="45"
                />
                <div class="invalid-feedback">
                  Preencha devidamente o campo.
                </div>
              </div>
              <div class="col-md-4 mb-3" id="district-validate">
                <label for="validationCustom04">Bairro</label>
                <input
                  type="text"
                  name="state"
                  class="form-control"
                  id="district-validate"
                  value="<?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                  placeholder="State"
                  maxlength="45"
                />
                <div class="invalid-feedback">
                  Preencha devidamente o campo.
                </div>
              </div>
              <div class="col-md-4 mb-3" id="road-validate">
                <label for="validationCustom05">Rua</label>
                <input
                  type="text"
                  name="district"
                  class="form-control"
                  id="road-validate"
                  value="<?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                  placeholder="Digite seu bairro.."
                  maxlength="45"
                />
                <div class="invalid-feedback">
                  Preencha devidamente o campo.
                </div>
              </div>
            </div>

            <?php } ?>

            <button class="btn btn-primary btn-login" type="submit">
              Editar Perfil
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  const form = document.querySelector(".needs-validation");
  const msg = document.getElementById("msg");

  // Name
  const nameValidate = document.querySelector("#name-validate input");
  const cityValidate = document.querySelector("input#city-validate");
  const roadValidate = document.querySelector("input#road-validate");
  const districtValidate = document.querySelector("input#district-validate");

  // Contact
  const contactValidate = document.querySelector("#contact-validate input");
  const contacValidateError = document.querySelector(
    "#contact-validate .invalid-feedback"
  );

  // Password
  const passwordValidate = document.querySelector("#pass-validate input");
  const conformPasswordValidate = document.querySelector(
    "#confirm-validate input"
  );

  const passValidateError = document.querySelector(
    "#pass-validate .invalid-feedback"
  );
  const confirmPassValidateError = document.querySelector(
    "#confirm-validate .invalid-feedback"
  );

  // Email
  const emailValidate = document.querySelector("#email-validate #email");
  const emailValidateError = document.querySelector(
    "#email-validate .invalid-feedback"
  );

  // Expretions
  const contactRegEx = /^(?:(\+244|00244))?(9)(1|2|3|4|9)([\d]{7,7})$/;
  const passwordRegEx =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  const emailRegEx =
    /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;

  function validateProviderForm() {
    if (!cityValidate.value || !roadValidate.value || !districtValidate.value) {
      msg.innerText = "Preencha devidamente os campos";

      return false;
    } else {
      msg.innerText = "";
    }

    if (!emailValidate.value || !contactValidate.value || !nameValidate.value) {
      msg.innerText = "Preencha devidamente os campos";

      return false;
    } else {
      msg.innerText = "";
    }

    if (!contactRegEx.exec(contactValidate.value)) {
      contacValidateError.style.display = "block";

      return false;
    } else {
      contacValidateError.style.display = "none";
    }

    // if (passwordValidate.value && !conformPasswordValidate.value) {
    //   passValidateError.style.display = "block";
    //   confirmPassValidateError.style.display = "block";
    //   passValidateError.innerHTML = "Insira a nova password";
    //   confirmPassValidateError.innerHTML = "Insira a nova password";

    //   return false;
    // } else {
    //   passValidateError.style.display = "none";
    //   confirmPassValidateError.style.display = "none";
    // }

    if (
      !passwordRegEx.exec(passwordValidate.value) ||
      !passwordRegEx.exec(conformPasswordValidate.value)
    ) {
      passValidateError.style.display = "block";
      confirmPassValidateError.style.display = "block";

      passValidateError.innerHTML = `
        No mínimo oito caracteres, pelo menos uma letra maiúscula, uma
        letra minúscula, um número e um caractere especial ex:
        @$!%*?&.
      `;
      confirmPassValidateError.innerHTML = `
        No mínimo oito caracteres, pelo menos uma letra maiúscula, uma
        letra minúscula, um número e um caractere especial ex:
        @$!%*?&.
      `;

      return false;
    } else {
      passValidateError.style.display = "none";
      confirmPassValidateError.style.display = "none";
    }

    if (!emailRegEx.exec(emailValidate.value)) {
      emailValidateError.style.display = "block";

      return false;
    } else {
      emailValidateError.style.display = "none";
    }
  }

  // alert("oi");
</script>

<?php require $this->checkTemplate("../shared/Footer/footer");?>

