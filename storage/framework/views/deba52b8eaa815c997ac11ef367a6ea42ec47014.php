<html class="no-js js-menubar slidePanel-html" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title>VMB | Value Monitoring & Benchmarking System</title>
 <?php echo $__env->make('partials.panel.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="animsition site-menubar-fold" style="animation-duration: 800ms; opacity: 1;">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided unfolded" data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
        <i class="icon md-more" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
        <img class="navbar-brand-logo" src="../../assets/images/logo.png" title="VMB">
        <span class="navbar-brand-text hidden-xs-down"> VMB</span>
      </div>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search" data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon md-search" aria-hidden="true"></i>
      </button>
    </div>
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="nav-item hidden-float" id="toggleMenubar">
            <a class="nav-link waves-effect waves-light waves-round waves-effect waves-light waves-round" data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left hided unfolded">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
          <li class="nav-item hidden-sm-down" id="toggleFullscreen">
            <a class="nav-link icon icon-fullscreen waves-effect waves-light waves-round waves-effect waves-light waves-round" data-toggle="fullscreen" href="#" role="button">
              <span class="sr-only">Toggle fullscreen</span>
            </a>
          </li>
          <li class="nav-item hidden-float">
            <a class="nav-link icon md-search waves-effect waves-light waves-round waves-effect waves-light waves-round" data-toggle="collapse" href="#" data-target="#site-navbar-search" role="button">
              <span class="sr-only">Toggle Search</span>
            </a>
          </li>
          
        </ul>
        <!-- End Navbar Toolbar -->
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li class="nav-item dropdown">
            <a class="nav-link waves-effect waves-light waves-round waves-effect waves-light waves-round" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up" aria-expanded="false" role="button">
              <span class="flag-icon flag-icon-ng"></span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                <span class="flag-icon flag-icon-gb"></span> English</a>
              <a class="dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                <span class="flag-icon flag-icon-fr"></span> French</a>
              <a class="dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                <span class="flag-icon flag-icon-cn"></span> Chinese</a>
              <a class="dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                <span class="flag-icon flag-icon-de"></span> German</a>
              <a class="dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                <span class="flag-icon flag-icon-nl"></span> Dutch</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link navbar-avatar waves-effect waves-light waves-round waves-effect waves-light waves-round" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="../../../global/portraits/5.jpg" alt="...">
                <i></i>
              </span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Profile</a>
              
              <a class="dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="<?php echo e(url('logout')); ?>" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link waves-effect waves-light waves-round waves-effect waves-light waves-round" data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false" data-animation="scale-up" role="button">
              <i class="icon md-notifications" aria-hidden="true"></i>
              <span class="tag tag-pill tag-danger up">5</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
              <div class="dropdown-menu-header">
                <h5>NOTIFICATIONS</h5>
                <span class="tag tag-round tag-danger">New 5</span>
              </div>
              <div class="list-group scrollable is-enabled scrollable-vertical" style="position: relative;">
                <div data-role="container" class="scrollable-container" style="height: 0px; width: 17px;">
                  <div data-role="content" class="scrollable-content" style="width: 0px;">
                    
                    
                    
                    
                    <a class="list-group-item dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="media-left p-r-10">
                          <i class="icon md-comment bg-orange-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Message received</h6>
                          <time class="media-meta" datetime="2016-06-10T12:34:48+08:00">3 days ago</time>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide is-disabled" draggable="false"><div class="scrollable-bar-handle" style="height: 30px;"></div></div></div>
              <div class="dropdown-menu-footer">
                <a class="dropdown-menu-footer-btn waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="button">
                  <i class="icon md-settings" aria-hidden="true"></i>
                </a>
                <a class="dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                    All notifications
                  </a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link waves-effect waves-light waves-round waves-effect waves-light waves-round" data-toggle="dropdown" href="javascript:void(0)" title="Messages" aria-expanded="false" data-animation="scale-up" role="button">
              <i class="icon md-email" aria-hidden="true"></i>
              <span class="tag tag-pill tag-info up">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
              <div class="dropdown-menu-header" role="presentation">
                <h5>MESSAGES</h5>
                <span class="tag tag-round tag-info">New 3</span>
              </div>
              <div class="list-group scrollable is-enabled scrollable-vertical" role="presentation" style="position: relative;">
                <div data-role="container" class="scrollable-container" style="height: 0px; width: 17px;">
                  <div data-role="content" class="scrollable-content" style="width: 0px;">
                    
                    
                    
                    <a class="list-group-item dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="media-left p-r-10">
                          <span class="avatar avatar-sm avatar-away">
                            <img src="../../../global/portraits/5.jpg" alt="...">
                            <i></i>
                          </span>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Edward Fletcher</h6>
                          <div class="media-meta">
                            <time datetime="2016-06-15T20:34:48+08:00">3 days ago</time>
                          </div>
                          <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide is-disabled" draggable="false"><div class="scrollable-bar-handle" style="height: 194.876px;"></div></div></div>
              <div class="dropdown-menu-footer" role="presentation">
                <a class="dropdown-menu-footer-btn waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="button">
                  <i class="icon md-settings" aria-hidden="true"></i>
                </a>
                <a class="dropdown-item waves-effect waves-light waves-round waves-effect waves-light waves-round" href="javascript:void(0)" role="menuitem">
                    See all messages
                  </a>
              </div>
            </div>
          </li>
          
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon md-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search" data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
  <?php echo $__env->make('partials.panel.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
  <!-- Page -->
  <?php echo $__env->yieldContent('content'); ?>
 <!-- End Page -->
  <!-- Footer -->
 <?php echo $__env->make('partials.panel.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- Core  -->
  <?php echo $__env->make('partials.panel.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body></html>