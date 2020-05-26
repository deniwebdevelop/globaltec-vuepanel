    @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    @endphp

    <!-- Sidebar Menu -->

    <nav class="">
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
            @endif
            <!-- End Usuario -->



            <!-- Suppliers -->
            <li class="nav-item has-treeview {{ ($prefix=='/suppliers')?'menu-open':''}}">
                <a href="{{ route('suppliers.view') }}" class="nav-link text-white">
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
                <a href="{{ route('customers.view') }}" class="nav-link text-white">
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
                    <li class="nav-item">
                        <a href="{{ route('customers.paid') }}" class="nav-link text-white
                {{ ($route=='customers.paid')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pago Recibido</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customers.credit') }}" class="nav-link text-white
                {{ ($route=='customers.credit')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pago Pendiente</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customers.wise.report') }}" class="nav-link text-white
                {{ ($route=='customers.wise.report')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Reporte</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Customers -->

            <!-- Facturacion -->
            <li class="nav-item has-treeview {{ ($prefix=='/invoice')?'menu-open':''}}">
                <a href="#" class="nav-link text-white">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Ventas
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('invoice.view') }}" class="nav-link text-white
                  {{ ($route=='invoice.view')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Facturacion</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('invoice.pending.list') }}" class="nav-link text-white
                  {{ ($route=='invoice.pending.list')?'active':''  }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pendientes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('invoice.print.list') }}" class="nav-link text-white
                  {{ ($route=='invoice.print.list')?'active':''  }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Imprimir</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('invoice.daily.report') }}" class="nav-link text-white
                  {{ ($route=='invoice.daily.report')?'active':''  }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Resumen</p>
                        </a>
                    </li>
                </ul>

            </li>
            <!-- End Facturacion -->



            <!-- Purchase -->
            <li class="nav-item has-treeview {{ ($prefix=='/purchase')?'menu-open':''}}">
                <a href="#" class="nav-link text-white">
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
                    <li class="nav-item">
                        <a href="{{ route('purchase.pending.list') }}" class="nav-link
                        text-white {{ ($route=='purchase.pending.list')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pendientes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('purchase.report') }}" class="nav-link
                         text-white {{ ($route=='purchase.report')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Resumen</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Purchase -->

            <!-- Stock -->
            <li class="nav-item has-treeview {{ ($prefix=='/stock')?'menu-open':''}}">
                <a href="#" class="nav-link text-white">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Stock
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('stock.report') }}" class="nav-link text-white
                     {{ ($route=='stock.report')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ver Stock</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('stock.report.supplier.product.wise') }}" class="nav-link text-white
                    {{ ($route=='stock.report.supplier.product.wise')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Reporte</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Stock -->


            <!-- Products -->
            <li class="nav-item has-treeview {{ ($prefix=='/products')?'menu-open':''}}">
                <a href="{{ route('products.view') }}" class="nav-link text-white">
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

            <!-- Categories -->
            <li class="nav-item has-treeview {{ ($prefix=='/categories')?'menu-open':''}}">
                <a href="{{ route('categories.view') }}" class="nav-link text-white">
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

            <!-- Units -->
            <li class="nav-item has-treeview {{ ($prefix=='/units')?'menu-open':''}}">
                <a href="{{ route('units.view') }}" class="nav-link text-white">
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














        </ul>

    </nav>
    <!-- /.sidebar-menu -->
