    @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    @endphp 

     <!-- Sidebar Menu -->
    
      <nav class="mt-2">
            <!-- Admin Usuario -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user()->usertype=='Admin')
          <li class="nav-item has-treeview {{ ($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Administrar Usuarios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
          <a href="{{ route('users.view') }}" class="nav-link text-white
          {{ ($route=='users.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuario</p>
                </a>
              </li>
            </ul>
          </li>
          @endif   <!-- End Usuario -->

          <!-- Profile -->
          <li class="nav-item has-treeview {{ ($prefix=='/profiles')?'menu-open':''}}">
            <a href="{{ route('profiles.view') }}" class="nav-link text-white
              {{ ($route=='profiles.view')?'active':'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Administrar Perfil
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profiles.view') }}" class="nav-link text-white
                {{ ($route=='profiles.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mi Perfil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('profiles.password.view') }}" class="nav-link text-white
                  {{ ($route=='profiles.password.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cambiar Contraseña</p>
                </a>
              </li>
            </ul>
          </li>
           <!-- End Perfil -->

          <!-- Suppliers -->
          <li class="nav-item has-treeview {{ ($prefix=='/suppliers')?'menu-open':''}}">
            <a href="{{ route('suppliers.view') }}" class="nav-link text-white
              {{ ($route=='suppliers.view')?'active':'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Proveedores 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('suppliers.view') }}" class="nav-link text-white
                {{ ($route=='suppliers.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Proveedores</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- End Suppliers -->

          <!-- Customers -->
          <li class="nav-item has-treeview {{ ($prefix=='/customers')?'menu-open':''}}">
            <a href="{{ route('customers.view') }}" class="nav-link text-white
              {{ ($route=='customers.view')?'active':'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Clientes 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('customers.view') }}" class="nav-link text-white
                {{ ($route=='customers.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Clientes</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- End Customers -->

          <!-- Units -->
          <li class="nav-item has-treeview {{ ($prefix=='/units')?'menu-open':''}}">
            <a href="{{ route('units.view') }}" class="nav-link text-white
              {{ ($route=='units.view')?'active':'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Unidades  
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('units.view') }}" class="nav-link text-white
                {{ ($route=='units.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Unidades</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- End Units -->

          <!-- Categories -->
          <li class="nav-item has-treeview {{ ($prefix=='/categories')?'menu-open':''}}">
            <a href="{{ route('categories.view') }}" class="nav-link text-white
              {{ ($route=='categories.view')?'active':'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Categorias 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('categories.view') }}" class="nav-link text-white
                {{ ($route=='categories.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Categorias</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- End Categories -->          

          <!-- Products -->
          <li class="nav-item has-treeview {{ ($prefix=='/products')?'menu-open':''}}">
            <a href="{{ route('products.view') }}" class="nav-link text-white
              {{ ($route=='products.view')?'active':'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Productos 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('products.view') }}" class="nav-link text-white
                {{ ($route=='products.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Productos</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- End Products -->

          <!-- Purchase -->
          <li class="nav-item has-treeview {{ ($prefix=='/purchase')?'menu-open':''}}">
            <a href="" class="nav-link text-white">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Compras 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('purchase.view') }}" class="nav-link text-white
                {{ ($route=='purchase.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Compras</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- End Purchase -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->