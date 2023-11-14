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

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title  {{ Route::currentRouteName() == 'logo.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'logo.edit' ? 'active' : '' }}
                           
                            {{ Route::currentRouteName() == 'banner.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'banner.edit' ? 'active' : '' }}
                            "
                            href="#">
                            <span class="lan-3 "><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Layout
                                Management</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-{{ request()->route()->getPrefix() == 'admin/cms'? 'down': 'right' }}
                                    "></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->getPrefix() == 'admin/cms'? 'block;': 'none;' }}
                            ">
                            <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'banner.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'banner.edit' ? 'active' : '' }}"
                                    href="{{ route('banner.index') }}">Page Content</a>

                            </li>


                        </ul>
                    </li>

                    {{-- Category Management --}}

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ Route::currentRouteName() == 'parent-category.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'parent-category.edit' ? 'active' : '' }}
                                {{ Route::currentRouteName() == 'main-category.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'main-category.edit' ? 'active' : '' }}
                                {{ Route::currentRouteName() == 'sub-category.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'sub-category.edit' ? 'active' : '' }}
                                {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'product.edit' ? 'active' : '' }} {{ Route::currentRouteName() == 'product.create' ? 'active' : '' }}"
                            href="#">
                            <span class="lan-3"><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Category
                                Management</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-{{ request()->route()->getPrefix() == 'admin/category' || request()->route()->getPrefix() == 'admin/product' ? 'down': 'right' }}"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->getPrefix() == 'admin/category' || request()->route()->getPrefix() == '/admin'? 'block;': 'none;' }}">
                            <li>
                                <a class="lan-4 {{ Route::currentRouteName() == 'parent-category.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'parent-category.edit' ? 'active' : '' }}"
                                    href="{{ route('parent-category.index') }}">Parent Category</a>
                            </li>
                            <li><a
                                    class="lan-4
                        {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'product.edit' ? 'active' : '' }} {{ Route::currentRouteName() == 'product.create' ? 'active' : '' }}"
                                    href="{{ route('product.index') }}"> Store Items

                                </a>
                            </li>
                        </ul>
                    </li>



                    {{-- Attribute Management update work 13 --}}

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                    {{ Route::currentRouteName() == 'variants.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'variants.edit' ? 'active' : '' }} {{ Route::currentRouteName() == 'variants.create' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'attribute-value' ? 'active' : '' }} {{ Route::currentRouteName() == 'attribute-value.edit' ? 'active' : '' }}"
                            href="{{ route('variants.index') }}"><span class="lan-3"><i class="fa fa-rss fa-lg"
                                    aria-hidden="true"></i> Attribute Management </span>

                        </a>

                    </li>

                    {{-- length management --}}

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                        {{ Route::currentRouteName() == 'admin.length' ? 'active' : '' }} {{ Route::currentRouteName() == 'edit.length' ? 'active' : '' }} {{ Route::currentRouteName() == 'create.length' ? 'active' : '' }}"
                            href="{{ route('admin.length') }}"><span class="lan-3"><i class="fa fa-list-ol fa-lg"
                                    aria-hidden="true"></i>Length Management </span>

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

                    {{-- Review Management --}}
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                    {{ Route::currentRouteName() == 'reviews' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'reviews-detail' ? 'active' : '' }}"
                            href="{{ route('reviews') }}"><span class="lan-3"><i class="fa fa-comments fa-lg"
                                    aria-hidden="true"></i>Reviews Management </span>
                        </a>
                    </li>

                    {{-- Leads Management --}}
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                    {{ Route::currentRouteName() == 'leads' ? 'active' : '' }}"
                            href="{{ route('leads') }}"><span class="lan-3"><i class="fa fa-question-circle fa-lg"
                                    aria-hidden="true"></i>Leads Management
                            </span>
                        </a>
                    </li>


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
