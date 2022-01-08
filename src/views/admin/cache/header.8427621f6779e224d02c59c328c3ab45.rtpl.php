<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("../shared/Header/../doc/_documentHeadOpen");?>

<!--Barra de navegação-->
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
    data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form id="barra" action="" method="get" style="box-sizing: border-box">
      <button class="btn-barra-pesquisa"><i class="fab fa-search"></i></button>
      <input
        class="input-barra-pesquisa"
        type="text"
        name=""
        id=""
        placeholder="Pesquisar por produtos..."
      />
    </form>

    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/bioloOnline/products"
          >Produtos <span class="sr-only">(current)</span></a
        >
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/bioloOnline/providers">Vendedores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/bioloOnline/cart">Carrinho</a>
      </li>

      <?php if( !$provider ){ ?>

      <li class="nav-item">
        <a
          class="nav-link btn btn-danger btn-login"
          href="/bioloOnline/login-admin"
          style="padding: 10px 30px !important"
          >Login</a
        >
      </li>
      <li class="nav-item">
        <a
          class="nav-link btn btn-warning btn-conta"
          href="/bioloOnline/create-account"
          style="padding: 10px 30px"
          >Criar conta</a
        >
      </li>

      <?php }else{ ?>

      <li class="nav-item">
        <a
          class="nav-link btn btn-danger btn-login"
          href="/bioloOnline/provider-admin"
          style="padding: 10px 30px !important"
          >Meu Pérfil</a
        >
      </li>
      <li class="nav-item">
        <a
          class="nav-link btn btn-warning btn-conta"
          href="/bioloOnline/logout-admin"
          style="
            padding: 10px 30px;
            border: none !important;
            background: red !important;
            color: white !important;
          "
          >Sair</a
        >
      </li>

      <?php } ?>
    </ul>
  </div>
</nav>
<!--Barra de navegação-->
