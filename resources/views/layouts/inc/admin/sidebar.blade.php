<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('showSite') }}">
            <i class="mdi mdi-home menu-icon"></i>
            <span class="menu-title">home</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('order.index') }}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">orders</span>
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('category.index') }}">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">ADD CATEGORY</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('Brands.index') }}">
            <i class="mdi mdi-chart-pie menu-icon"></i>
            <span class="menu-title">ADD BRANDS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('Products.index') }}">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">ADD PRODUCT</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('colors.index') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Colors</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('storage.index') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Storage</span>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('Sliders.index') }}">
            <i class="mdi mdi-emoticon menu-icon"></i>
            <span class="menu-title">HOME SLIDER</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ Route('setting.index') }}">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">Site Setting</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ Route('users.index') }}">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">users</span>
            </a>
          </li>
      </ul>
    </nav>
