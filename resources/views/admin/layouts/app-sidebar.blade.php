<!--APP-SIDEBAR-->

@php
$admin = Auth::guard('admin')->user();
@endphp

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="">
            <img src="{{ asset('backend/assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo"
                alt="logo">
        </a><!-- LOGO -->
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a>
        <!-- sidebar-toggle-->
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{ asset('backend/assets/images/users/10.jpg') }}" alt="user-img"
                    class="avatar-xl rounded-circle">
            </div>
            <div class="user-info">
                <h6 class=" mb-0 text-dark"></h6>
                <span class="text-muted app-sidebar__user-name text-sm">{{ $admin->name }}</span>
            </div>
        </div>
    </div>
    <div class="sidebar-navs">
        <ul class="nav  nav-pills-circle d-flex justify-content-center">

            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                data-bs-original-title="Logout"> <a href="{{ route('admin.auth.logout') }}"
                    class="nav-link text-center "> <i class="fe fe-power"></i>
                </a> </li>
        </ul>
    </div>
    <ul class="side-menu open">
        <li>
            <h3>Main</h3>
        </li>
        <li class="slide">
            <a class="side-menu__item @if ($controllerName == 'dashboard') active @endif" href="{{ route('admin.dashboard.index') }}"><i
                    class="fas fa-tachometer-alt mr-3"></i><span class="side-menu__label">Dashboard</span></a>
        </li>
        @if ($admin->can(config('permission.list.administrator.list')))
            <li class="slide">
                <a class="side-menu__item @if ($controllerName == 'administrator') active @endif" href="{{ route('admin.administrator.index') }}"><i
                        class="fas fa-user-shield mr-3"></i><span class="side-menu__label">Administrators</span></a>
            </li>
        @endif
        @if ($admin->can(config('permission.list.user.list')))
            <li class="slide">
                <a class="side-menu__item @if ($controllerName == 'user') active @endif " href="{{ route('admin.user.index') }}"><i
                        class="fas fa-users mr-3"></i><span class="side-menu__label">Users</span></a>
            </li>
        @endif
        @if ($admin->can(config('permission.list.article.list')))
            <li class="slide">
                <a class="side-menu__item " href="{{ route('admin.article.index') }}"><i
                        class="fas fa-newspaper mr-3"></i><span class="side-menu__label">Articles</span></a>
            </li>
        @endif
        @if ($admin->can(config('permission.list.category.list')))
            <li class="slide">
                <a class="side-menu__item " href="{{ route('admin.category.index') }}"><i
                        class="fas fa-users mr-3"></i><span class="side-menu__label">Categories</span></a>
            </li>
        @endif
        @if ($admin->can(config('permission.list.transaction.list')))
            <li class="slide">
                <a class="side-menu__item @if ($controllerName == 'transaction') active @endif " href="{{ route('admin.transaction.index') }}"><i
                        class="fas fa-hryvnia mr-3"></i></i><span class="side-menu__label">Transactions</span></a>
            </li>
        @endif
        @if ($admin->can(config('permission.list.order.list')))
            <li class="slide">
                <a class="side-menu__item @if ($controllerName == 'order') active @endif " href="{{ route('admin.order.index') }}"><i
                        class="fas fa-shopping-cart mr-3"></i></i><span class="side-menu__label">Orders</span></a>
            </li>
        @endif
        {{-- @if ($admin->can(config('permission.list.order.list')) || $admin->can(config('permission.list.order_item.list')))
            <li class="slide">
                <a class="side-menu__item @if ($controllerName == 'order' || $controllerName == 'order_item') active @endif" data-toggle="slide" href="#"><i
                        class="fas fa-shopping-cart mr-3"></i><span class="side-menu__label">Orders</span><i
                        class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    @if ($admin->can(config('permission.list.order.list')))
                        <li><a class="slide-item @if ($controllerName == 'order') active @endif"
                                href="{{ route('admin.order.index') }}"><span>Order</span></a>
                        </li>
                    @endif
                    @if ($admin->can(config('permission.list.order_item.list')))
                        <li><a class="slide-item @if ($controllerName == 'order_item') active @endif"
                                href="{{ route('admin.order_item.index') }}"><span>Order item</span></a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif --}}
        @if ($admin->can(config('permission.list.parent_product.list')) || $admin->can(config('permission.list.product.list')))
            <li class="slide">
                <a class="side-menu__item @if ($controllerName == 'parent_product' || $controllerName == 'product') active @endif" data-toggle="slide" href="#"><i
                        class="fab fa-product-hunt mr-3"></i><span class="side-menu__label">Products</span><i
                        class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    @if ($admin->can(config('permission.list.parent_product.list')))
                        <li><a class="slide-item @if ($controllerName == 'parent_product') active @endif"
                                href="{{ route('admin.parent_product.index') }}"><span>Parent product</span></a>
                        </li>
                    @endif
                    @if ($admin->can(config('permission.list.product.list')))
                        <li><a class="slide-item @if ($controllerName == 'product') active @endif"
                                href="{{ route('admin.product.index') }}"><span>Products</span></a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if ($admin->can(config('permission.list.setting.list')) || $admin->can(config('permission.list.role.list')))
            <li class="slide">
                <a class="side-menu__item @if ($controllerName == 'setting' || $controllerName == 'role') active @endif" data-toggle="slide" href="#"><i
                        class="fas fa-cogs mr-3"></i><span class="side-menu__label">Setting</span><i
                        class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    @if ($admin->can(config('permission.list.setting.list')))
                        <li><a class="slide-item @if ($controllerName == 'setting') active @endif"
                                href="{{ route('admin.setting.index') }}"><span>Settings</span></a>
                        </li>
                    @endif
                    @if ($admin->can(config('permission.list.role.list')))
                        <li><a class="slide-item @if ($controllerName == 'role') active @endif"
                                href="{{ route('admin.role.index') }}"><span>Roles</span></a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
    </ul>
</aside>
<!--/APP-SIDEBAR-->
