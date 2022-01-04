<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("../shared/header/../doc/_documentHeadOpen");?>

<!--Barra de navegação-->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a href="../../" class="navbar-brand logo">
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
      <button class="btn-barra-pesquisa"><i class="fi-rr-search"></i></button>
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
        <a class="nav-link" href="products"
          >Produtos <span class="sr-only">(current)</span></a
        >
      </li>
      <li class="nav-item">
        <a class="nav-link" href="providers">Vendedores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart">Carrinho</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link btn btn-danger btn-login"
          href="#"
          style="padding: 10px 30px !important"
          >Login</a
        >
      </li>
      <li class="nav-item">
        <a
          class="nav-link btn btn-warning btn-conta"
          href="#"
          style="padding: 10px 30px"
          >Criar conta</a
        >
      </li>
    </ul>
  </div>
</nav>
<!--Barra de navegação-->
