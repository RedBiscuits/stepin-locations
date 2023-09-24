<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="collapse navbar-collapse show" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1">         </i></a></li>
          <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
        </ul>
        <ul class="nav navbar-nav float-right">



            <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
              <div class="arrow_box">

              

            </div>
            </div>
          </li>


          
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <span class="avatar avatar-online">
            <div class="dropdown-menu dropdown-menu-right">
              <div class="arrow_box_right">
                <a class="dropdown-item" href="#">
                <span class="avatar avatar-online">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item">
                    <i class="ft-user"></i> @lang('admin.edit profile')</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="ft-power"></i> @lang('admin.logout')</a>
                <form id="logout-form" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!-- END: Header-->
