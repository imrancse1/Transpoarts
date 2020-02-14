<header class="main-header">
    <nav class="navbar navbar-static-top" style="background-color:#2874a0">
      <div class="container">
        <div class="navbar-header">
          <a href="{{URL::to('/dashboard')}}" class="navbar-brand"><b>T</b>ransports</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="{{asset('/assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{asset('/assets/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Admin</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{asset('/assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                  <p>
                    Admin
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{route('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>

    <nav class="navbar navbar-top" style="background-color:#0a5077">
      <div class="container">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">

           <!--  <li class="active">
              <a href="{{route('data-table')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-user-md"></i>
                Admin
              </a>
            </li> -->
            <li class="active">
              <a href="{{route('/categoty')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-user"></i>
                Vehicle Catagory

              </a>
            </li>

            <li class="active">
              <a href="{{route('/inputVehicle')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-gears"></i>
                Input Vehicle
              </a>
            </li>

            <li class="active">
              <a href="{{route('/tripInfo')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-stethoscope"></i>
                Trip Info
              </a>
            </li>

            <li class="active">
              <a href="{{route('/product')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-product-hunt"></i>
                Product
              </a>
            </li>

            <li class="active">
              <a href="{{route('/selectVehicle')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-gear"></i>
                Select Vehicle
              </a>
            </li>

            <li class="active">
              <a href="{{route('/drives')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-user"></i>
                Drives
              </a>
            </li>
            <li class="active">
              <a href="{{route('/reception')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-user"></i>
                Reception
              </a>
            </li>
            <li class="active">
              <a href="{{route('/priceTrip')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-user"></i>
                Price Trip
              </a>
            </li>
            <li class="active">
              <a href="{{route('/fuelExpenses')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-user"></i>
                Fuel Expenses
              </a>
            </li>
            <li class="active">
              <a href="{{route('/tripCosting')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-user"></i>
                Trip Costing
              </a>
            </li>
            <li class="active">
              <a href="{{route('/tripCashReceive')}}" class="btn btn-app" style="margin-top:7px;">
                <i class="fa fa-user"></i>
                Trip Cash Receive
              </a>
            </li>

          </ul>
          </ul>
        </div>
      </div>
    </nav>
  </header>