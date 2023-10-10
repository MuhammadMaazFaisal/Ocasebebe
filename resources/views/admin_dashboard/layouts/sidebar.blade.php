<style>
    .fa-lg {
        width: 20px;
        height: 20px;
        font-size: 16px;
        margin-right: 6px;
    }
</style>
<div class="sidebar-wrapper noPrint">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('admin.dashboard') }}">
                <img class="img-fluid for-light" src="{{ asset('assets/images/icons/favicon.png') }}" alt=""
                    style="background: lightgray; max-width:150px; max-height:50px">
                {{-- <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt=""> --}}
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
           
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('admin.dashboard') }}"></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{ route('admin.dashboard') }}">
                            {{-- <img class="img-fluid" src="{{url('public/logos/'.$favicon->image)}}" alt=""> --}}
                        </a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">

                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == 'admin.dashboard'? 'active': '' }}
                            {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}"><span class="lan-3
                            "><i
                                    class="fa fa-home fa-lg" aria-hidden="true"></i> Dashboard</span>
                        </a>
                    </li>


                    {{-- Product Management --}}

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'product.edit' ? 'active' : '' }} {{ Route::currentRouteName() == 'product.create' ? 'active' : '' }}"
                            href="{{ route('product.index') }}"><span class="lan-3"><i class="fa fa-product-hunt fa-lg"
                                    aria-hidden="true"></i> Product Management </span>

                        </a>

                    </li>


                    {{-- order managment --}}

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title  {{ Route::currentRouteName() == 'orderManagement.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'orderManagement.show' ? 'active' : '' }} {{ Route::currentRouteName() == 'invoice.index' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'cancellation-policy.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-policy.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-policy.edit' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'cancellation-reasons.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-reasons.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'cancellation-reasons.edit' ? 'active' : '' }}"
                            href="#">
                            <span class="lan-3"><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Order
                                Management</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-{{ request()->route()->getPrefix() == 'admin/orders'? 'down': 'right' }}"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->getPrefix() == 'admin/orders'? 'block;': 'none;' }}">
                            <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'orderManagement.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'orderManagement.show' ? 'active' : '' }} {{ Route::currentRouteName() == 'invoice.index' ? 'active' : '' }}"
                                    href="{{ route('orderManagement.index') }}">All Orders</a>
                            </li>
                        </ul>
                    </li>
                    {{-- end --}}


                    {{-- User  Management --}}
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'user-index' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'user-create' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'user-edit' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'user-view' ? 'active' : '' }}
                        {{ Route::currentRouteName() == 'subscriber-view' ? 'active' : '' }}"
                            href="{{ route('user-index') }}"> <span class="lan-3"><i class="fa fa-users fa-lg"
                                    aria-hidden="false"></i> User Management </span>
                        </a>
                    </li>
                    {{-- end --}}

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
