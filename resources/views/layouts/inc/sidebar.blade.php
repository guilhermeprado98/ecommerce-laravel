<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="#" class="simple-text logo-normal">
        E-commerce
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{Request::is('dashboard') ? 'active':''}} ">
          <a class="nav-link" href="./dashboard">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('categories') ? 'active':''}} ">
          <a class="nav-link" href="{{url('categories')}}">
            <i class="material-icons">content_paste</i>
            <p>Categorias</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('add-category') ? 'active':''}}">
            <a class="nav-link" href="{{url('add-category')}}">
              <i class="material-icons">content_paste</i>
              <p>Adicionar Categoria</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('products') ? 'active':''}} ">
            <a class="nav-link" href="{{url('products')}}">
              <i class="material-icons">content_paste</i>
              <p>Produtos</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('add-products') ? 'active':''}}">
              <a class="nav-link" href="{{url('add-products')}}">
                <i class="material-icons">content_paste</i>
                <p>Adicionar Produtos</p>
              </a>
            </li>

            <li class="nav-item {{Request::is('orders') ? 'active':''}}">
                <a class="nav-link" href="{{url('orders')}}">
                  <i class="material-icons">content_paste</i>
                  <p>Vendas</p>
                </a>
              </li>

              <li class="nav-item {{Request::is('afiliados') ? 'active':''}}">
                <a class="nav-link" href="{{url('afiliados')}}">
                  <i class="material-icons">person</i>
                  <p>Afiliados</p>
                </a>
              </li>

              <li class="nav-item {{Request::is('add-afiliados') ? 'active':''}}">
                <a class="nav-link" href="{{url('add-afiliados')}}">
                  <i class="material-icons">person</i>
                  <p>Adicionar Afiliado</p>
                </a>
              </li>



              <li class="nav-item {{Request::is('produtores') ? 'active':''}}">
                <a class="nav-link" href="{{url('produtores')}}">
                  <i class="material-icons">person</i>
                  <p>Produtores</p>
                </a>
              </li>

              <li class="nav-item {{Request::is('add-produtores') ? 'active':''}}">
                <a class="nav-link" href="{{url('add-produtores')}}">
                  <i class="material-icons">person</i>
                  <p>Adicionar Produtores</p>
                </a>
              </li>

      </ul>
    </div>
  </div>
