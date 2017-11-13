<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title>Flux Credit</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://use.fontawesome.com/c753f43933.js"></script>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">

        <style>
            /* Loading Spinner */
            .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
        </style>

        <link rel="stylesheet" type="text/css" href="/dash/bootstrap/css/bootstrap.css">

        <!-- HELPERS -->

        <link rel="stylesheet" type="text/css" href="/dash/helpers/animate.css">
        <link rel="stylesheet" type="text/css" href="/dash/helpers/backgrounds.css">
        <link rel="stylesheet" type="text/css" href="/dash/helpers/boilerplate.css">
        <link rel="stylesheet" type="text/css" href="/dash/helpers/border-radius.css">
        <link rel="stylesheet" type="text/css" href="/dash/helpers/grid.css">
        <link rel="stylesheet" type="text/css" href="/dash/helpers/page-transitions.css">
        <link rel="stylesheet" type="text/css" href="/dash/helpers/spacing.css">
        <link rel="stylesheet" type="text/css" href="/dash/helpers/typography.css">
        <link rel="stylesheet" type="text/css" href="/dash/helpers/utils.css">
        <link rel="stylesheet" type="text/css" href="/dash/helpers/colors.css">

        <!-- ELEMENTS -->

        <link rel="stylesheet" type="text/css" href="/dash/elements/badges.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/buttons.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/content-box.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/dashboard-box.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/forms.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/images.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/info-box.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/invoice.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/loading-indicators.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/menus.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/panel-box.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/response-messages.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/responsive-tables.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/ribbon.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/social-box.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/tables.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/tile-box.css">
        <link rel="stylesheet" type="text/css" href="/dash/elements/timeline.css">



        <!-- ICONS -->

        <link rel="stylesheet" type="text/css" href="/dash/icons/fontawesome/fontawesome.css">
        <link rel="stylesheet" type="text/css" href="/dash/icons/linecons/linecons.css">
        <link rel="stylesheet" type="text/css" href="/dash/icons/spinnericon/spinnericon.css">


        <!-- WIDGETS -->

        <link rel="stylesheet" type="text/css" href="/dash/widgets/accordion-ui/accordion.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/calendar/calendar.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/carousel/carousel.css">

        <link rel="stylesheet" type="text/css" href="/dash/widgets/charts/justgage/justgage.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/charts/morris/morris.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/charts/piegage/piegage.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/charts/xcharts/xcharts.css">

        <link rel="stylesheet" type="text/css" href="/dash/widgets/chosen/chosen.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/colorpicker/colorpicker.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/datatable/datatable.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/datepicker/datepicker.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/datepicker-ui/datepicker.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/dialog/dialog.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/dropdown/dropdown.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/dropzone/dropzone.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/file-input/fileinput.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/input-switch/inputswitch.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/input-switch/inputswitch-alt.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/ionrangeslider/ionrangeslider.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/jcrop/jcrop.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/jgrowl-notifications/jgrowl.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/loading-bar/loadingbar.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/maps/vector-maps/vectormaps.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/markdown/markdown.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/modal/modal.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/multi-select/multiselect.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/multi-upload/fileupload.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/nestable/nestable.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/noty-notifications/noty.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/popover/popover.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/pretty-photo/prettyphoto.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/progressbar/progressbar.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/range-slider/rangeslider.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/slidebars/slidebars.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/slider-ui/slider.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/summernote-wysiwyg/summernote-wysiwyg.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/tabs-ui/tabs.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/theme-switcher/themeswitcher.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/timepicker/timepicker.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/tocify/tocify.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/tooltip/tooltip.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/touchspin/touchspin.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/uniform/uniform.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/wizard/wizard.css">
        <link rel="stylesheet" type="text/css" href="/dash/widgets/xeditable/xeditable.css">

        <!-- SNIPPETS -->

        <link rel="stylesheet" type="text/css" href="/dash/snippets/chat.css">
        <link rel="stylesheet" type="text/css" href="/dash/snippets/files-box.css">
        <link rel="stylesheet" type="text/css" href="/dash/snippets/login-box.css">
        <link rel="stylesheet" type="text/css" href="/dash/snippets/notification-box.css">
        <link rel="stylesheet" type="text/css" href="/dash/snippets/progress-box.css">
        <link rel="stylesheet" type="text/css" href="/dash/snippets/todo.css">
        <link rel="stylesheet" type="text/css" href="/dash/snippets/user-profile.css">
        <link rel="stylesheet" type="text/css" href="/dash/snippets/mobile-navigation.css">

        <!-- APPLICATIONS -->

        <link rel="stylesheet" type="text/css" href="/dash/applications/mailbox.css">

        <!-- Admin theme -->

        <link rel="stylesheet" type="text/css" href="/dash/themes/admin/layout.css">
        <link rel="stylesheet" type="text/css" href="/dash/themes/admin/color-schemes/default.css">

        <!-- Components theme -->

        <link rel="stylesheet" type="text/css" href="/dash/themes/components/default.css">
        <link rel="stylesheet" type="text/css" href="/dash/themes/components/border-radius.css">

        <!-- Admin responsive -->

        <link rel="stylesheet" type="text/css" href="/dash/helpers/responsive-elements.css">
        <link rel="stylesheet" type="text/css" href="/dash/helpers/admin-responsive.css">

        <!-- JS Core -->

        <script type="text/javascript" src="/dash/js-core/jquery-core.js"></script>
        <script type="text/javascript" src="/dash/js-core/jquery-ui-core.js"></script>
        <script type="text/javascript" src="/dash/js-core/jquery-ui-widget.js"></script>
        <script type="text/javascript" src="/dash/js-core/jquery-ui-mouse.js"></script>
        <script type="text/javascript" src="/dash/js-core/jquery-ui-position.js"></script>
        <!--<script type="text/javascript" src="/dash/js-core/transition.js"></script>-->
        <script type="text/javascript" src="/dash/js-core/modernizr.js"></script>
        <script type="text/javascript" src="/dash/js-core/jquery-cookie.js"></script>

        <script type="text/javascript" src="/dash/widgets/datatable/datatable.js"></script>
        <script type="text/javascript" src="/dash/widgets/datatable/datatable-bootstrap.js"></script>
        <script type="text/javascript" src="/dash/widgets/datatable/datatable-tabletools.js"></script>
        <script type="text/javascript" src="/dash/widgets/datatable/datatable-reorder.js"></script>

        @if($user->admin == 1)

            <script type="text/javascript">

                /* Datatables export */

                $(document).ready(function() {
                    var table = $('#datatable-tabletools').DataTable();
                    var tt = new $.fn.dataTable.TableTools( table );

                    $( tt.fnContainer() ).insertBefore('#datatable-tabletools_wrapper div.dataTables_filter');

                    $('.DTTT_container').addClass('btn-group');
                    $('.DTTT_container a').addClass('btn btn-default btn-md');

                    $('.dataTables_filter input').attr("placeholder", "Search...");

                } );

                /* Datatables reorder */

                $(document).ready(function() {
                    $('#datatable-reorder').DataTable( {
                        dom: 'Rlfrtip'
                    });

                    $('#datatable-reorder_length').hide();
                    $('#datatable-reorder_filter').hide();

                });

                $(document).ready(function() {
                    $('.dataTables_filter input').attr("placeholder", "Search...");
                });

            </script>

        @endif


        <link href="{{ asset('css/dash.css') }}" rel="stylesheet">


        <script type="text/javascript">
            $(window).load(function(){
                setTimeout(function() {
                    $('#loading').fadeOut( 400, "linear" );
                }, 300);
            });
        </script>

    </head>
    <body class="@yield('body_class')">

        <div id="sb-site">
            <div id="loading">
                <div class="spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div>

            <div id="page-wrapper">
                <div id="page-header" class="bg-gradient-9">
                    <div id="mobile-navigation">
                        <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
                        <a href="index.html" class="logo-content-small" title="MonarchUI"></a>
                    </div>
                    <div id="header-logo" class="logo-bg">
                        <a href="/dashboard" class="logo-content-big" title="MonarchUI">
                            FLUX <i>CREDIT</i>
                            <span>Personalized Dashboard</span>
                        </a>
                        <a href="/dashboard" class="logo-content-small" title="MonarchUI">
                            FLUX <i>CREDIT</i>
                            <span>Personalized Dashboard</span>
                        </a>
                        <a id="close-sidebar" href="#" title="Close sidebar">
                            <i class="glyph-icon icon-angle-left"></i>
                        </a>
                    </div>
                    <div id="header-nav-left">
                        <div class="user-account-btn dropdown">
                            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
                                <img width="28" src="/dash/image-resources/gravatar.jpg" alt="Profile image">
                                <span>{{ $user->name }}</span>
                                <i class="glyph-icon icon-angle-down"></i>
                            </a>
                            <div class="dropdown-menu float-left">
                                <div class="box-sm">
                                    <div class="login-box clearfix">
                                        <div class="user-img">
                                            <!-- <a href="#" title="" class="change-img">Change photo</a> -->
                                            <img src="/dash/image-resources/gravatar.jpg" alt="">
                                        </div>
                                        <div class="user-info">
                                            <span>
                                                {{ $user->name }}
                                            </span>
                                            <a href="#" title="Edit profile">Edit profile</a>
                                            <a href="#" title="View notifications">View notifications</a>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <!-- <ul class="reset-ul mrg5B">
                                        <li>
                                            <a href="#">
                                                <i class="glyph-icon float-right icon-caret-right"></i>
                                                View login page example
                                                
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="glyph-icon float-right icon-caret-right"></i>
                                                View lockscreen example
                                                
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="glyph-icon float-right icon-caret-right"></i>
                                                View account details
                                                
                                            </a>
                                        </li>
                                    </ul> -->
                                    <div class="pad5A button-pane button-pane-alt text-center">
                                        <a ref="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" class="btn display-block font-normal btn-danger">
                                            <i class="glyph-icon icon-power-off"></i>
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- #header-nav-left -->

    <div id="header-nav-right">
        <!--

        <div class="dropdown" id="notifications-btn">
            <a data-toggle="dropdown" href="#" title="">
                <span class="small-badge bg-yellow"></span>
                <i class="glyph-icon icon-linecons-megaphone"></i>
            </a>
            <div class="dropdown-menu box-md float-right">

                <div class="popover-title display-block clearfix pad10A">
                    Notifications
                    <a class="text-transform-cap font-primary font-normal btn-link float-right" href="#" title="View more options">
                        More options...
                    </a>
                </div>
                <div class="scrollable-content scrollable-slim-box">
                    <ul class="no-border notifications-box">
                        <li>
                            <span class="bg-danger icon-notification glyph-icon icon-bullhorn"></span>
                            <span class="notification-text">This is an error notification</span>
                            <div class="notification-time">
                                a few seconds ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-users"></span>
                            <span class="notification-text font-blue">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> minutes ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-green icon-notification glyph-icon icon-sitemap"></span>
                            <span class="notification-text font-green">A success message example.</span>
                            <div class="notification-time">
                                <b>2 hours</b> ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-azure icon-notification glyph-icon icon-random"></span>
                            <span class="notification-text">This is an error notification</span>
                            <div class="notification-time">
                                a few seconds ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-ticket"></span>
                            <span class="notification-text">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> minutes ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-blue icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text font-blue">Alternate notification styling.</span>
                            <div class="notification-time">
                                <b>2 hours</b> ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-purple icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text">This is an error notification</span>
                            <div class="notification-time">
                                a few seconds ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> minutes ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-green icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text font-green">A success message example.</span>
                            <div class="notification-time">
                                <b>2 hours</b> ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-purple icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text">This is an error notification</span>
                            <div class="notification-time">
                                a few seconds ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> minutes ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="pad10A button-pane button-pane-alt text-center">
                    <a href="#" class="btn btn-primary" title="View all notifications">
                        View all notifications
                    </a>
                </div>
            </div>
        </div>
        

        <div class="dropdown" id="dashnav-btn">
            <a href="#" data-toggle="dropdown" data-placement="bottom" class="popover-button-header tooltip-button" title="Dashboard Quick Menu">
                <i class="glyph-icon icon-linecons-cog"></i>
            </a>
            <div class="dropdown-menu float-right">
                <div class="box-sm">
                    <div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix">
                        <a href="#" class="btn vertical-button hover-blue-alt" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-dashboard opacity-80 font-size-20"></i>
                            </span>
                            Dashboard
                        </a>
                        <a href="#" class="btn vertical-button hover-green" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-tags opacity-80 font-size-20"></i>
                            </span>
                            Widgets
                        </a>
                        <a href="#" class="btn vertical-button hover-orange" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-fire opacity-80 font-size-20"></i>
                            </span>
                            Tables
                        </a>
                        <a href="#" class="btn vertical-button hover-orange" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-bar-chart-o opacity-80 font-size-20"></i>
                            </span>
                            Charts
                        </a>
                        <a href="#" class="btn vertical-button hover-purple" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-laptop opacity-80 font-size-20"></i>
                            </span>
                            Buttons
                        </a>
                        <a href="#" class="btn vertical-button hover-azure" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-code opacity-80 font-size-20"></i>
                            </span>
                            Panels
                        </a>
                    </div>
                    <div class="divider"></div>
                    <div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix">
                        <a href="#" class="btn vertical-button remove-border btn-info" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-dashboard opacity-80 font-size-20"></i>
                            </span>
                            Dashboard
                        </a>
                        <a href="#" class="btn vertical-button remove-border btn-danger" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-tags opacity-80 font-size-20"></i>
                            </span>
                            Widgets
                        </a>
                        <a href="#" class="btn vertical-button remove-border btn-purple" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-fire opacity-80 font-size-20"></i>
                            </span>
                            Tables
                        </a>
                        <a href="#" class="btn vertical-button remove-border btn-azure" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-bar-chart-o opacity-80 font-size-20"></i>
                            </span>
                            Charts
                        </a>
                        <a href="#" class="btn vertical-button remove-border btn-yellow" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-laptop opacity-80 font-size-20"></i>
                            </span>
                            Buttons
                        </a>
                        <a href="#" class="btn vertical-button remove-border btn-warning" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-code opacity-80 font-size-20"></i>
                            </span>
                            Panels
                        </a>
                    </div>
                </div>
            </div>
        </div>

        -->
    </div><!-- #header-nav-right -->

</div>
        <div id="page-sidebar">
    <div class="scroll-sidebar">
        
        @if($user->admin == 0)
            <ul id="sidebar-menu">
                <li>
                    <a href="/dashboard" title="Dashboard">
                        <i class="glyph-icon icon-linecons-tv"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="/dashboard/cosigner" title="Add a Co-Signer">
                        <i class="glyph-icon icon-linecons-pencil"></i>
                        <span>Add a Co-Applicant</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/creditors" title="Manage Creditors">
                        <i class="glyph-icon icon-linecons-note"></i>
                        <span>Manage Creditors</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#" title="Flux Plus">
                        <i class="glyph-icon icon-linecons-money"></i>
                        <span>Flux Plus</span>
                        <span class="bs-label label-primary">Upgrade</span>
                    </a>
                </li>
            </ul><!-- #sidebar-menu -->
        @else
           <ul id="sidebar-menu">
                <li>
                    <a href="/dashboard/admin" title="Dashboard">
                        <i class="glyph-icon icon-linecons-tv"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="/dashboard/admin/cosigners" title="Add a Co-Signer">
                        <i class="glyph-icon icon-linecons-pencil"></i>
                        <span>Co-Signers</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/admin/creditors" title="Manage Creditors">
                        <i class="glyph-icon icon-linecons-note"></i>
                        <span>Creditors</span>
                    </a>
                </li>
            </ul><!-- #sidebar-menu --> 
        @endif


    </div>
</div>
        <div id="page-content-wrapper">
            <div id="page-content">
                
                    <div class="container">
        
                        @yield('content')

                    </div>
            </div>
        </div>
    </div>
</div>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-104515570-1', 'auto');
          ga('send', 'pageview');

        </script>

        <script src="{{ asset('js/dash.js') }}"></script>

        <script type="text/javascript" src="/dash/bootstrap/js/bootstrap.js"></script>

        <!-- Bootstrap Dropdown -->

        <!-- <script type="text/javascript" src="/dash/widgets/dropdown/dropdown.js"></script> -->

        <!-- Bootstrap Tooltip -->

        <!-- <script type="text/javascript" src="/dash/widgets/tooltip/tooltip.js"></script> -->

        <!-- Bootstrap Popover -->

        <!-- <script type="text/javascript" src="/dash/widgets/popover/popover.js"></script> -->

        <!-- Bootstrap Progress Bar -->

        <script type="text/javascript" src="/dash/widgets/progressbar/progressbar.js"></script>

        <!-- Bootstrap Buttons -->

        <!-- <script type="text/javascript" src="/dash/widgets/button/button.js"></script> -->

        <!-- Bootstrap Collapse -->

        <!-- <script type="text/javascript" src="/dash/widgets/collapse/collapse.js"></script> -->

        <!-- Superclick -->

        <script type="text/javascript" src="/dash/widgets/superclick/superclick.js"></script>

        <!-- Input switch alternate -->

        <script type="text/javascript" src="/dash/widgets/input-switch/inputswitch-alt.js"></script>

        <!-- Slim scroll -->

        <script type="text/javascript" src="/dash/widgets/slimscroll/slimscroll.js"></script>

        <!-- Slidebars -->

        <script type="text/javascript" src="/dash/widgets/slidebars/slidebars.js"></script>
        <script type="text/javascript" src="/dash/widgets/slidebars/slidebars-demo.js"></script>

        <!-- PieGage -->

        <script type="text/javascript" src="/dash/widgets/charts/piegage/piegage.js"></script>
        <script type="text/javascript" src="/dash/widgets/charts/piegage/piegage-demo.js"></script>

        <!-- Screenfull -->

        <script type="text/javascript" src="/dash/widgets/screenfull/screenfull.js"></script>

        <!-- Content box -->

        <script type="text/javascript" src="/dash/widgets/content-box/contentbox.js"></script>

        <!-- Overlay -->

        <script type="text/javascript" src="/dash/widgets/overlay/overlay.js"></script>

        <!-- Widgets init for demo -->

        <script type="text/javascript" src="/dash/js-init/widgets-init.js"></script>

        <!-- Theme layout -->

        <script type="text/javascript" src="/dash/themes/admin/layout.js"></script>

        <!-- Theme switcher -->

        <script type="text/javascript" src="/dash/widgets/theme-switcher/themeswitcher.js"></script>

        <script type="text/javascript" src="/dash/widgets/input-mask/inputmask.js"></script>

        <script type="text/javascript">
            /* Input masks */

            $(function() { "use strict";
                $(".input-mask").inputmask();
            });

        </script>

        <script type="text/javascript" src="/dash/widgets/slider-ui/slider.js"></script>
        <script type="text/javascript" src="/dash/widgets/slider-ui/slider-demo.js"></script>

        <script type="text/javascript" src="/dash/widgets/wizard/wizard.js"></script>
        <script type="text/javascript" src="/dash/widgets/wizard/wizard-demo.js"></script>

        @yield('footer')

    </body>
</html>
