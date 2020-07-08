    @php
    $route = Route::current()->getName();
    @endphp
 

    <!-- Sidebar Menu -->

    <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
                <a href="{{ route('customers.view') }}" class="nav-link text-white">
                    <i class="fa fa-address-book ml-2" aria-hidden="true"></i>
                    <p class="ml-2">
                        Agenda
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview mt-4">
                <a href="#" class="nav-link text-white">
                    <i class="fa fa-shopping-basket ml-1" aria-hidden="true"></i>
                    <p class="ml-2">
                        Productos
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('categories.view') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Categorias</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ptype.view') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tipo de Producto</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.view') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Productos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('stock.report') }}" class="nav-link
               text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Stock</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview mt-3">
                <a href="{{ route('purchase.view') }}" class="nav-link text-white">
                    <i class="fas fa-file-contract ml-2" aria-hidden="true"></i>
                    <p class="ml-2">
                        Compras
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview mt-3">
                <a href="#" class="nav-link text-white">
                    <i class="fa fa-database ml-2" aria-hidden="true"></i>
                    <p class="ml-2">
                        Ventas
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('invoice.view') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ventas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('invoice.pending.list') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Presupuestos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customers.paid') }}" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Resumen Pagos</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item mt-3">
                <a href="{{ route('repair.index') }}" class="nav-link text-white">
                    <i class="fa fa-wrench ml-2" aria-hidden="true"></i>
                    <p class="ml-2">
                        Reparaciones
                    </p>
                </a>
            </li>

            <li class="nav-item mt-3">
                <a href="{{ route('duty.index') }}" class="nav-link text-white">
                    <i class="fa fa-list-ul ml-2" aria-hidden="true"></i>
                    <p class="ml-2">
                        Tareas
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
