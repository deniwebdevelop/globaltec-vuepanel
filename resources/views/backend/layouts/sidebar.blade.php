    @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    @endphp 

     <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user()->usertype=='Admin')
          <li class="nav-item has-treeview {{ ($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Administrar Usuarios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
          <a href="{{ route('users.view') }}" class="nav-link
          {{ ($route=='users.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuario</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item has-treeview {{ ($prefix=='/profiles')?'menu-open':''}}">
            <a href="{{ route('profiles.view') }}" class="nav-link
              {{ ($route=='profiles.view')?'active':'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Administrar Perfil
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profiles.view') }}" class="nav-link
                {{ ($route=='profiles.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mi Perfil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('profiles.password.view') }}" class="nav-link
                  {{ ($route=='profiles.password.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cambiar Contraseña</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->