<div class="sidebar" data-background-color="white" data-active-color="danger">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href={!! url('/admin') !!} class="simple-text">
                JavaShop Admin
            </a>
        </div>

        <ul class="nav">
            <li>
                <a href="{!! url('/admin') !!}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{!! url('/admin/product/create') !!}">
                    <i class="ti-archive"></i>
                    <p>Add Product</p>
                </a>
            </li>
            <li>
                <a href="{!! url('/admin/product') !!}">
                    <i class="ti-view-list-alt"></i>
                    <p>View Products</p>
                </a>
            </li>
            <li>
                <a href="{!! url('/admin/orders') !!}">
                    <i class="ti-calendar"></i>
                    <p>Orders</p>
                </a>
            </li>
            <li>
                <a href="{!! url('/admin/users') !!}">
                    <i class="fa fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
        </ul>
    </div>
</div>