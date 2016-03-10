<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"><!--<![endif]-->


<head>
    <meta charset="utf-8"/>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>University of Nebraska Omaha | Course Demand System</title>
    <meta content="" name="description"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>

    <link href="//www.unomaha.edu/_files/css/default-001-header-footer.css" rel="stylesheet"/>
    <script src="//www.unomaha.edu/_files/js/modernizr-2.5.3.min.js"></script>
    <script src="//www.unomaha.edu/_files/js/respond.min.js"></script>


    <link href="//www.unomaha.edu/_files/css/colorbox/colorbox.css" media="screen" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        /* TEMPLATE CSS FIXES */
        #hero {
            background: url("//www.unomaha.edu/_files/images/bkg-coe.gif") repeat scroll 0 0 rgba(0, 0, 0, 0);
        }
        #hero > .inner-content > h1 {
            font-size: 2em;
        }
        label {
            text-align: left !important;
        }
        html.break-mobile #content #content_main {
            background-color: #fff;
            border-bottom: 24px solid #fff;
        }
        #content > #header_mobile > .main-header > .inner-content > .subsite-logos {
            display: block;
            height: auto;
        }
        #content_main > .inner-content {
            border-top: 16px solid white;
        }
        #content_main input[type="checkbox"] {
            height: auto;
            width: auto;
            margin-bottom: 7px;
        }
        #content_main textarea {
            background-color: #eaeaea;
            border: 0 transparent;
        }
        #content_main textarea, #content_main input[type="text"], #content_main select {
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        }
        #content_main p.bg-success {
            box-sizing: border-box;
            padding: 9px 16px;
            background-color: #dff0d8;
            border-radius: 5px;
            display: inline-block;
            margin: 0 0 10px !important;
        }

        #content_main a.btn {
            color: #606060;
        }

        #content_main a.btn.btn-cta-red {
            color: white;
        }

        #content_main a.btn-cta {
            font-family: "urwgroteskmedregular";
            font-weight: 400;
            margin-bottom: 0px;
            background-position: 0% 0%;
        }
        #content_main input[type="text"], input[type="password"], input[type="email"], textarea {
            background: #eaeaea;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            border: 0 none;
            color: #000;
        }

        .span4 input[type="text"], .span4 input[type="password"], .span4 input[type="email"], .span4 textarea {
            width: 95%;
        }

        .span6 input[type="text"], .span6 input[type="password"], .span6 input[type="email"], .span6 textarea {
            width: 97%;
        }

        .span12 input[type="text"], .span12 input[type="password"], .span12 input[type="email"], .span12 textarea {
            width: 98.4%;
        }
        /* /TEMPLATE CSS FIXES */

        /* USER STYLES */

        .alert {
            padding-left:10px;
            padding-right:20px !important;
        }

        #content_main > .inner-content {
            -webkit-border-radius:10px !important;
            -moz-border-radius:10px !important;
            border-radius:10px !important;
        }

        /* /USER STYLES */

    </style>
    @yield('header')
</head>

<body>
<div class="subsite" id="content">
    <nav></nav>
    <div class="hide-mobile" id="header">
        <div class="main-header clearfix">
            <div class="inner-content">
                <div class="subsite-logos">

                    <div class="home-logo">
                        <a href="http://www.unomaha.edu/">
                            <img alt="University of Nebraska Omaha" src="https://www.unomaha.edu/_files/images/logo-subsite-o-2.png"/>
                        </a>
                    </div>
                    <div>
                        <!-- USER HEADER DESKTOP -->
                        <a class="college" href="http://unomaha.edu">University of Nebraska Omaha</a>
                        <a class="department" href="http://www.unomaha.edu/college-of-information-science-and-technology/">College of Information Science &amp; Technology</a>
                        <!-- /USER HEADER DESKTOP -->
                    </div>
                    <div id="sup-navigation">
                        <div class="search">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="nav" class="navbar">
            <div class="inner-content"><ul class="nav clearfix">
                    @if (Auth::guest())
                        <li><a href="{{ action('UserController@login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Students <b class="caret"> </b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ action('StudentController@index') }}">View Students</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Programs <b class="caret"> </b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ action('ProgramController@index') }}">View Programs</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Courses <b class="caret"> </b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ action('CourseController@index') }}">View Courses</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->first_name }} <b class="caret"> </b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ action('UserController@manageAccount', [Auth::user()->id]) }}">My Account</a></li>
                                <li><a href="{{ action('UserController@logout') }}">Log Out</a></li>
                            </ul>
                        </li>
                        @if (Auth::user()->account_type == 2)
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"> </b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ action('CourseController@index') }}">Manage Courses</a></li>
                                    <li><a href="{{ action('StudentController@index') }}">Manage Students</a></li>
                                    <li><a href="{{ action('ProgramController@index') }}">Manage Programs</a></li>
                                    <li><a href="{{ action('UserController@index') }}">Manage Users</a></li>
                                </ul>
                            </li>
                        @endif
                    @endif
                </ul></div>
        </div>
    </div>
    <div role="main">
        <div id="hero">
            <div class="inner-content">
                <h1>Course Demand System</h1>
            </div>
        </div>
        <div id="breadcrumbs">
            <div class="inner-content">
                <div class="row-fluid">
                    <div class="span12">
                        <ul class="breadcrumb">
                            <li><a href="http://www.unomaha.edu/">UNO</a></li>
                            <li><a href="http://www.unomaha.edu/college-of-information-science-and-technology/">College of Information Science &amp; Technology</a></li>
                            <li><a href="/">Course Demand System</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-r" id="content_main">
            <div class="inner-content">
                <!-- USER MAIN CONTENT -->
                @yield('content')
                        <!-- /USER MAIN CONTENT -->
            </div>
        </div>
    </div>
    <footer>
        <div class="inner-content">
            <div class="mobile-clearfix">
                <div class="span5 alpha">
                    <ul>
                        <li class="column-header">NEXT STEPS</li>
                        <li><a href="http://www.unomaha.edu/admissions/">Apply for Admission</a></li>
                        <li><a href="http://www.unomaha.edu/admissions/visit/">Visit the Campus</a></li>
                        <li><a href="http://www.unomaha.edu/tour/">Take a Virtual Tour</a></li>
                        <li><a href="https://ebruno.unomaha.edu/crm/rfi/">Request Information</a></li>
                    </ul>
                </div>
                <div class="span5">
                    <ul>
                        <li class="column-header">JUST FOR YOU</li>
                        <li><a href="http://www.unomaha.edu/admissions/">Future Students</a></li>
                        <li><a href="http://www.unomaha.edu/current.php">Current Students</a></li>
                        <li><a href="http://www.unomaha.edu/humanresources/employment.php">Work at UNO</a></li>
                        <li><a href="http://www.unomaha.edu/facstaff.php">Faculty &amp; Staff</a></li>
                    </ul>
                </div>
            </div>
            <div class="mobile-clearfix">
                <div class="span5">
                    <ul>
                        <li class="column-header">RESOURCES</li>
                        <li><a href="http://my.unomaha.edu/">my.unomaha.edu</a></li>
                        <li><a href="http://events.unomaha.edu/">Calendars</a></li>
                        <li><a href="http://www.unomaha.edu/maps/">Campus Map</a></li>
                        <li><a href="http://library.unomaha.edu/">Library</a></li>
                        <li><a href="http://registrar.unomaha.edu/catalogs.php">Course Catalog</a></li>
                        <li><a href="http://cashiering.unomaha.edu/">Pay Your Bill</a></li>
                    </ul>
                </div>
                <div class="span5">
                    <ul>
                        <li class="column-header">AFFILIATES</li>
                        <li><a href="http://www.nebraska.edu/">Nebraska System</a></li>
                        <li><a href="http://pki.nebraska.edu/">Peter Kiewit Institute</a></li>
                        <li><a href="http://nufoundation.org/Page.aspx?pid=375">Campaign for Nebraska</a></li>
                    </ul>
                </div>
            </div>
            <div class="mobile-clearfix">
                <div class="span5 omega">
                    <ul class="social">
                        <li class="column-header">CONNECT</li>
                        <li><a class="phone" href="tel:402.554.2380">&#160;402.554.2380</a></li>
                        <li><a class="facebook" href="https://www.facebook.com/unocist" target="_blank">&#160;Facebook</a></li>
                        <li><a class="twitter" href="https://twitter.com/unocist" target="_blank">&#160;Twitter</a></li>
                        <li><a class="youtube" href="https://www.youtube.com/channel/UClrgDqDeLKtshxX69HcOGlQ" target="_blank">&#160;YouTube</a></li>
                        <li><a class="instagram" href="http://instagram.com/unocist/" target="_blank">&#160;Instagram</a></li>
                        <li><a class="enotes" href="https://www.unomaha.edu/news/maverick-daily/" target="_blank">&#160;The Maverick Daily</a></li>
                    </ul>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span9"><a href="/" id="footer-logo">University of Nebraska Omaha</a>
                    <p>University of Nebraska Omaha, 6001 Dodge Street, Omaha, NE 68182</p>
                    <p>&#169; 2014 | <a href="http://emergency.unomaha.edu/">Emergency Information</a> <span class="footer-alert">Alert</span></p>
                </div>
            </div>
        </div>
    </footer>

</div>

{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>--}}
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js" type="text/javascript"></script>
<script src="//www.unomaha.edu/_files/js/respond.min.js"></script>
<script src="//www.unomaha.edu/_files/js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="//www.unomaha.edu/_files/js/bootstrap.min.js"></script>
<script src="//www.unomaha.edu/_files/js/bootstrap-hover-dropdown.min.js"></script>
<script src="//www.unomaha.edu/_files/js/jquery.foundation.navigation.js"></script>
<script src="//www.unomaha.edu/_files/js/jquery.mousewheel.min.js"></script>
<script src="//www.unomaha.edu/_files/js/jquery.mCustomScrollbar.min.js"></script>
<script src="//www.unomaha.edu/_files/js/jquery-picture-min.js"></script>
<script src="//www.unomaha.edu/_files/js/script.js"></script>

<script>
    var _gaq=[['_setAccount','UA-2777175-1'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
</script>


<!-- USER SCRIPTS -->
<script src="{{ asset('/js/angular.js') }}"></script>
<script src="{{ asset('/js/vendor.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<!-- /USER SCRIPTS -->

</body>
</html>