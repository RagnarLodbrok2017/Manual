<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CarsLook</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .content {
                text-align: center;
                margin-top: 50px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .navbar-more .navbar-nav > li > a {
                color: rgb(64, 64, 64);
            }
        </style>
    </head>
    <body>
    <div class="navbar-more-overlay"></div>
    <nav class="navbar navbar-inverse navbar-fixed-top animate">
        <div class="container navbar-more visible-xs">
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
							<button class="btn btn-default" type="submit">Submit</button>
						</span>
                    </div>
                </div>
            </form>
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-picture-o"></span>
                        Photos
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-bell-o"></span>
                        Reservations
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-picture-o"></span>
                        Photos
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-bell-o"></span>
                        Reservations
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-picture-o"></span>
                        Photos
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-bell-o"></span>
                        Reservations
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-picture-o"></span>
                        Photos
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-bell-o"></span>
                        Reservations
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-picture-o"></span>
                        Photos
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-bell-o"></span>
                        Reservations
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-picture-o"></span>
                        Photos
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-bell-o"></span>
                        Reservations
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-picture-o"></span>
                        Photos
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-bell-o"></span>
                        Reservations
                    </a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="navbar-header hidden-xs">
                <a class="navbar-brand" href="#">Brand</a>
            </div>

            <ul class="nav navbar-nav navbar-right mobile-bar">
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-home"></span>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-info"></span>
                        <span class="hidden-xs">About the Boat</span>
                        <span class="visible-xs">About</span>
                    </a>
                </li>
                <li class="hidden-xs">
                    <a href="#">
                        <span class="menu-icon fa fa-picture-o"></span>
                        Photos
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-icon fa fa-ship"></span>
                        Cruises
                    </a>
                </li>
                <li class="hidden-xs">
                    <a href="#">
                        <span class="menu-icon fa fa-bell-o"></span>
                        Reservations
                    </a>
                </li>
                <li>
                    <a href="login">
                        <span class="menu-icon fa fa-phone"></span>
                        <strong class="hidden-xs">Login</strong>
                        <span class="visible-xs">Contact</span>
                    </a>
                </li>
                <li class="visible-xs">
                    <a href="#navbar-more-show">
                        <span class="menu-icon fa fa-bars"></span>
                        More
                    </a>
                </li>
            </ul>
        </div>
    </nav>
            <div class="content">
                <div class="title m-b-md">
                    Cars Agency
                </div>
            </div>
        </div>
    </body>
</html>
