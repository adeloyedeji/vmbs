<div class="site-menubar" style=" background-image: url('{{asset('assets/images/bg-color.jpg')}}')">
    <div class="site-menubar-body scrollable scrollable-inverse scrollable-vertical hoverscorll-disabled is-enabled" style="position: relative;">
      <div class="scrollable-container" style="height: 496px; width: 277px;">
        <div class="scrollable-content" style="width: 260px;">
          <ul class="site-menu" data-plugin="menu" style="transform: translate3d(0px, 0px, 0px);">
            <li class="site-menu-category">Welcome Admin</li>
            <!-- SINGLE NAVBAR -->
            <li class="site-menu-item">
              <a class="animsition-link waves-effect waves-classic" href="{{url('home')}}">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Asset</span>
              </a>
            </li>

               <li class="site-menu-item">
              <a class="animsition-link waves-effect waves-classic" href="{{url('companies')}}">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Company</span>
              </a>
            </li>
               <li class="site-menu-item">
              <a class="animsition-link waves-effect waves-classic" href="{{url('fdp/review')}}">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Review FDP</span>
              </a>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" class=" waves-effect waves-classic">
                <i class="site-menu-icon md-google-pages" aria-hidden="true"></i>
                <span class="site-menu-title">Cost</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item has-sub">
                          <a href="javascript:void(0)" class=" waves-effect waves-classic">
                            <span class="site-menu-title">Cost Monitoring</span>
                            <span class="site-menu-arrow"></span>
                          </a>
                          <ul class="site-menu-sub">
                            <li class="site-menu-item">
                              <a class="animsition-link waves-effect waves-classic" href="#">
                                <span class="site-menu-title">Cost Analysis</span>
                              </a>
                            </li>
                            <li class="site-menu-item">
                              <a class="animsition-link waves-effect waves-classic" href="#">
                                <span class="site-menu-title">Trend Analysis</span>
                              </a>
                            </li>
                            <li class="site-menu-item">
                              <a class="animsition-link waves-effect waves-classic" href="#">
                                <span class="site-menu-title">Deviation Analysis</span>
                              </a>
                            </li>
                            <li class="site-menu-item">
                              <a class="animsition-link waves-effect waves-classic" href="#">
                                <span class="site-menu-title">Incremantal Analysis</span>
                              </a>
                            </li>
                            <li class="site-menu-item">
                              <a class="animsition-link waves-effect waves-classic" href="#">
                                <span class="site-menu-title">Forecasting</span>
                              </a>
                            </li>     
                     </ul>
                      <li class="site-menu-item has-sub">
                          <a href="javascript:void(0)" class=" waves-effect waves-classic">
                            <span class="site-menu-title">Cost Benchmarking</span>
                            <span class="site-menu-arrow"></span>
                          </a>
                          <ul class="site-menu-sub">
                            <li class="site-menu-item">
                              <a class="animsition-link waves-effect waves-classic" href="#">
                                <span class="site-menu-title">Vertical</span>
                              </a>
                            </li>
                            <li class="site-menu-item">
                              <a class="animsition-link waves-effect waves-classic" href="#">
                                <span class="site-menu-title">Horizontal</span>
                              </a>
                            </li>
                            <li class="site-menu-item">
                              <a class="animsition-link waves-effect waves-classic" href="#">
                                <span class="site-menu-title">Global</span>
                              </a>
                            </li>
                            <li class="site-menu-item">
                              <a class="animsition-link waves-effect waves-classic" href="#">
                                <span class="site-menu-title">Forecasting</span>
                              </a>
                            </li>
                            </ul>
            </li>
          
          </ul>
          </li>

            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" class=" waves-effect waves-classic">
                <i class="site-menu-icon md-google-pages" aria-hidden="true"></i>
                <span class="site-menu-title">Economics</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
               <li class="site-menu-item {{active('project')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">Well Life</span>
                            </a>
                          </li> 
                          <li class="site-menu-item {{active('fdp')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">Economic Limit</span>
                            </a>
                          </li> 
                          <li class="site-menu-item {{active('costreport')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">Present Worth Porfile</span>
                            </a>
                          </li>

                          <li class="site-menu-item {{active('costreport')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">RoR(s)</span>
                            </a>
                          </li> 

                          <li class="site-menu-item {{active('costreport')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">Payouts</span>
                            </a>
                          </li>

                          <li class="site-menu-item {{active('costreport')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">Amortization</span>
                            </a>
                          </li>
                          <li class="site-menu-item {{active('costreport')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">Decline Rate</span>
                            </a>
                          </li>
                          <li class="site-menu-item {{active('costreport')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">Hyperbolic </span>
                            </a>
                          </li>

                     </ul>
                     </li>

           <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" class=" waves-effect waves-classic">
                <i class="site-menu-icon md-google-pages" aria-hidden="true"></i>
                <span class="site-menu-title">Kpi's</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
               <li class="site-menu-item {{active('costreport')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">Global Perspective </span>
                            </a>
                          </li>
                            <li class="site-menu-item {{active('costreport')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">Local Standpoint </span>
                            </a>
                          </li>
                            <li class="site-menu-item {{active('costreport')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">Industry Performance Metrics </span>
                            </a>
                          </li>

                     </ul>
              </li>
                    
           <li class="site-menu-item">
              <a class="animsition-link waves-effect waves-classic" href="#">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Reporting</span>
              </a>
            </li>

          <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" class=" waves-effect waves-classic">
                <i class="site-menu-icon md-google-pages" aria-hidden="true"></i>
                <span class="site-menu-title">Settings</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
               <li class="site-menu-item {{active('costreport')}}">
                            <a class="animsition-link waves-effect waves-classic" href="">
                              <span class="site-menu-title">Settings </span>
                            </a>
                          </li>
                     </ul>
              </li> 

            </ul>

          
        </div>
      </div>
    <div class="scrollable-bar scrollable-bar-vertical is-disabled scrollable-bar-hide" draggable="false"><div class="scrollable-bar-handle" style="height: 311.516px; transform: translate3d(0px, 0px, 0px);"></div></div></div>
    
  </div>