<div class="sidebar" data-color="green" data-image="{{asset('public/admin_assets/img/sidebar-2.jpg')}}">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            Admin
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav navwithsidesub">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{url('/admin')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="sidesub {{ (Request::is('admin/add-category')||Request::is('admin/list-category')||Request::is('admin/edit-category/*')) ? 'active open' : '' }}">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">format_list_numbered</i>
                    <p>Categories</p>
                </a>
                <ul class="sidesub-ul dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{url('/admin/list-category')}}">List All</a></li>
                    <li><a class="dropdown-item" href="{{url('/admin/add-category')}}">Create New</a></li>
                </ul>  
            </li>
            
            <li class="sidesub {{ (Request::is('admin/new-brand')||Request::is('admin/list-brands')||Request::is('admin/edit-brand/*')) ? 'active open' : '' }}">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">format_list_numbered</i>
                    <p>Manufacturers</p>
                </a>
                <ul class="sidesub-ul dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{url('/admin/list-brands')}}">List All</a></li>
                    <li><a class="dropdown-item" href="{{url('/admin/new-brand')}}">Create New</a></li>
                </ul>  
            </li>
            
            <li class="sidesub {{ ( Request::is('admin/new-product') || Request::is('admin/edit-product/*') || Request::is('admin/list-products')) ? 'active open' : '' }}">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">label_outline</i>
                    <p>Products</p>
                </a>
                <ul class="sidesub-ul dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{url('/admin/list-products')}}">List All</a></li>
                    <li><a class="dropdown-item" href="{{url('/admin/new-product')}}">New Product</a></li>
                </ul>  
            </li>
            <li class="{{ Request::is('admin/list-users') ? 'active' : '' }}">
                <a href="{{url('/admin/list-users')}}">
                    <i class="material-icons">people</i>
                    <p>Users</p>
                </a>
            </li>
            
              <li class="sidesub {{ ( Request::is('admin/manage-slider') || Request::is('admin/manage-slider/*') ) ? 'active open' : '' }}">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">web</i>
                    <p>Site Element</p>
                </a>
                <ul class="sidesub-ul dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{url('/admin/manage-slider')}}">Sliders</a></li>
                </ul>  
            </li>
            
            
           
            
            <li>
                <a href="./icons.html">
                    <i class="material-icons">bubble_chart</i>
                    <p>Icons</p>
                </a>
            </li>
            <li>
                <a href="./maps.html">
                    <i class="material-icons">location_on</i>
                    <p>Maps</p>
                </a>
            </li>
            <li>
                <a href="./notifications.html">
                    <i class="material-icons text-gray">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="active-pro">
                <a href="upgrade.html">
                    <i class="material-icons">settings</i>
                    <p>Settings</p>
                </a>
            </li>
        </ul>
    </div>
</div>