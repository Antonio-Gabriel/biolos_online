<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("shared/Header/header");?>
<!------------PRODUTOS------------------->
<section
  id=""
  class=""
  style="margin-top: 20px !important; margin-bottom: 0px"
>
  <div class="container">
    <div class="lista-produtos">
      <div class="row jj">
        <input
          class="form- col-md-8"
          style="
            margin-left: 28px;
            margin-right: 18px;
            padding: 5px 10px;
            border-radius: 10px;
          "
          type="text"
          name=""
          id=""
          placeholder="Pesquisar por produtos"
        />
        <select
          class="col-md-3"
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
<section id="vendedor"  style="margin-top: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3" >
                <span class="activo">1</span>
                <img src="src/assets/images/img-scroll/1.jpg" />
                <div class="online"></div>
                <a class="nome-vendedor" href="profile-provider">Osvaldo Cariege</a>
                <span>2.99</span> 
            </div>
            <div class="col-md-3">
                <span class="activo">1</span>
                <img src="src/assets/images/img-scroll/1.jpg" />
                <div class="online"></div>
                <a class="nome-vendedor" href="profile-provider">Osvaldo Cariege</a>
                <span>2.99</span> 
            </div>
            <div class="col-md-3">
                <span class="activo">1</span>
                <img src="src/assets/images/img-scroll/1.jpg" />
                <div class="online"></div>
                <a class="nome-vendedor" href="profile-provider">Osvaldo Cariege</a>
                <span>2.99</span> 
            </div>
            <div class="col-md-3">
                <span class="activo">1</span>
                <img src="src/assets/images/img-scroll/1.jpg" />
                <div class="online"></div>
                <a class="nome-vendedor" href="profile-provider">Osvaldo Cariege</a>
                <span>2.99</span> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" >
                <span class="activo">1</span>
                <img src="src/assets/images/img-scroll/1.jpg" />
                <div class="online"></div>
                <a class="nome-vendedor" href="profile-provider">Osvaldo Cariege</a>
                <span>2.99</span> 
            </div>
            <div class="col-md-3">
                <span class="activo">1</span>
                <img src="src/assets/images/img-scroll/1.jpg" />
                <div class="online"></div>
                <a class="nome-vendedor" href="profile-provider">Osvaldo Cariege</a>
                <span>2.99</span> 
            </div>
            <div class="col-md-3">
                <span class="activo">1</span>
                <img src="src/assets/images/img-scroll/1.jpg" />
                <div class="online"></div>
                <a class="nome-vendedor" href="profile-provider">Osvaldo Cariege</a>
                <span>2.99</span> 
            </div>
            <div class="col-md-3">
                <span class="activo">1</span>
                <img src="src/assets/images/img-scroll/1.jpg" />
                <div class="online"></div>
                <a class="nome-vendedor" href="profile-provider">Osvaldo Cariege</a>
                <span>2.99</span> 
            </div>
        </div>
    </div>
</section>
    </div>
  </div>
</section>
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
<?php require $this->checkTemplate("shared/Footer/footer");?>

