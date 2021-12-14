@if (!Auth::guest())
    <!-- sidebar nav -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav nav-pills nav-stacked">

                    <span class="label label-primary col-xs-12 col-sm-12 col-md-12" style="cursor: pointer;" data-toggle="collapse" data-target="#adminMenu">Administration</span>
                    <div id="adminMenu" class="collapse in">
                        <li><a href="{!!URL::route('users')!!}">Users</a></li>
                        <li><a href="{!! URL::route('products') !!}">Products</a> </li>
                        <li><a href="{!!URL::route('reviews')!!}">Reviews</a></li>
                    </div>
                    <span class="label label-primary col-xs-12 col-sm-12 col-md-12" style="cursor: pointer;" data-toggle="collapse" data-target="#reportMenu">Reports</span>
                    <div id="reportMenu" class="collapse in">
                        <li><a href="{!!URL::route('statsReport')!!}">Total Per Product</a></li>
                        <li><a href="{!!URL::route('averageReport')!!}">Average Per Product</a></li>
                    </div>
                    <div><li><a href="{!!URL::route('logout')!!}">Logout</a></li></div>
                </ul>
            </div>
        </div>
    </nav>
@endif
