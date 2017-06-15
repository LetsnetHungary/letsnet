<?php $userData = $this->userData; ?>
<div id="page-header">
    <div id="header-nav-left">
      <a class="header-btn" id="logout-btn" href="lockscreen-3.html" title="Lockscreen page example"><i class="glyph-icon icon-linecons-lock"></i></a>
      <div class="user-account-btn dropdown">
        <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
          <span><?php echo $userData["lastname"] . " " . $userData["firstname"];?></span>
          <i class="glyph-icon icon-angle-down"></i>
        </a>
        <div class="dropdown-menu float-right">
          <div class="box-sm">
            <div class="login-box clearfix">
              <div class="user-info">
                <span>
                  <?php echo $userData["lastname"] . " " . $userData["firstname"];?>
                  <i><?php echo $userData["status"];?></i>
                </span>
              </div>
            </div>
            <div class="divider"></div>
            <div class="button-pane button-pane-alt pad5L pad5R text-center">
              <a href="../../API/logout" class="btn btn-flat display-block font-normal btn-danger">
                <i class="glyph-icon icon-power-off"></i>
                <span>Logout</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>