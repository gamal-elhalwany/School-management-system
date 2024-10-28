<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="col-md-3 left-sidebar">
            <div class="side-menu-fixed">
                <div class="scrollbar side-menu-bg">
                    <ul class="nav navbar-nav side-menu" id="sidebarnav">
                        <!-- menu item Dashboard-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{__('Dashboard')}}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('stages.index')}}">Dashboard_1</a> </li>
                            </ul>
                        </li>
                        <!-- menu title -->
                        <!-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li> -->
                        <!-- menu item Elements-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                <div class="pull-left"><i class="ti-palette"></i><span
                                        class="right-nav-text">{{__('Educational Stages')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                <li><a href="accordions.html">{{__('Primary Stage')}}</a></li>
                                <li><a href="alerts.html">Alerts</a></li>
                                <li><a href="button.html">Button</a></li>
                                <li><a href="colorpicker.html">Colorpicker</a></li>
                                <li><a href="dropdown.html">Dropdown</a></li>
                                <li><a href="lists.html">lists</a></li>
                                <li><a href="modal.html">modal</a></li>
                                <li><a href="nav.html">nav</a></li>
                                <li><a href="nicescroll.html">nicescroll</a></li>
                                <li><a href="pricing-table.html">pricing table</a></li>
                                <li><a href="ratings.html">ratings</a></li>
                                <li><a href="date-picker.html">date picker</a></li>
                                <li><a href="tabs.html">tabs</a></li>
                                <li><a href="typography.html">typography</a></li>
                                <li><a href="popover-tooltips.html">Popover tooltips</a></li>
                                <li><a href="progress.html">progress</a></li>
                                <li><a href="switch.html">switch</a></li>
                                <li><a href="sweetalert2.html">sweetalert2</a></li>
                                <li><a href="touchspin.html">touchspin</a></li>
                            </ul>
                        </li>
                        <!-- menu item calendar-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                                <div class="pull-left"><i class="ti-calendar"></i><span
                                        class="right-nav-text">{{__('Sections')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="calendar.html">Events Calendar </a> </li>
                                <li> <a href="calendar-list.html">List Calendar</a> </li>
                            </ul>
                        </li>
                        <!-- menu item todo-->
                        <li>
                            <a href="todo-list.html"><i class="ti-menu-alt"></i><span class="right-nav-text">{{__('Students')}}</span> </a>
                        </li>
                        <!-- menu item chat-->
                        <li>
                            <a href="chat-page.html"><i class="ti-comments"></i><span class="right-nav-text">{{__('Teachers')}}</span></a>
                        </li>
                        <!-- menu item mailbox-->
                        <li>
                            <a href="mail-box.html"><i class="ti-email"></i><span class="right-nav-text">{{__('Parents')}}</span> <span class="badge badge-pill badge-warning float-right mt-1">HOT</span> </a>
                        </li>
                        <!-- menu item Charts-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                                <div class="pull-left"><i class="ti-pie-chart"></i><span
                                        class="right-nav-text">{{__('Financial accounts')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="chart" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="chart-js.html">Chart.js</a> </li>
                                <li> <a href="chart-morris.html">Chart morris </a> </li>
                                <li> <a href="chart-sparkline.html">Chart Sparkline</a> </li>
                            </ul>
                        </li>

                        <!-- menu font icon-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{__('Attendance and absence')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                                <li> <a href="themify-icons.html">Themify icons</a> </li>
                                <li> <a href="weather-icon.html">Weather icons</a> </li>
                            </ul>
                        </li>
                        <!-- menu item Form-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                                <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">{{__('Exams')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Form" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="editor.html">Editor</a> </li>
                                <li> <a href="editor-markdown.html">Editor Markdown</a> </li>
                                <li> <a href="form-input.html">Form input</a> </li>
                                <li> <a href="form-validation-jquery.html">form validation jquery</a> </li>
                                <li> <a href="form-wizard.html">form wizard</a> </li>
                                <li> <a href="form-repeater.html">form repeater</a> </li>
                                <li> <a href="input-group.html">input group</a> </li>
                                <li> <a href="toastr.html">toastr</a> </li>
                            </ul>
                        </li>
                        <!-- menu item table -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                                <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">{{__('Library')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="table" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="data-html-table.html">Data html table</a> </li>
                                <li> <a href="data-local.html">Data local</a> </li>
                                <li> <a href="data-table.html">Data table</a> </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                                <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">{{__('Online classes')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="table" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="data-html-table.html">Data html table</a> </li>
                                <li> <a href="data-local.html">Data local</a> </li>
                                <li> <a href="data-table.html">Data table</a> </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                                <div class="pull-left"><i class="ti-id-badge"></i><span
                                        class="right-nav-text">{{__('Settings')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="login.html">login</a> </li>
                                <li> <a href="register.html">register</a> </li>
                                <li> <a href="lockscreen.html">Lock screen</a> </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                                <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">{{__('Users')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level
                                        item 1<div class="pull-right"><i class="ti-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="auth" class="collapse">
                                        <li>
                                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#login">Level
                                                item 1.1<div class="pull-right"><i class="ti-plus"></i></div>
                                                <div class="clearfix"></div>
                                            </a>
                                            <ul id="login" class="collapse">
                                                <li>
                                                    <a href="javascript:void(0);" data-toggle="collapse"
                                                        data-target="#invoice">level item 1.1.1<div class="pull-right"><i
                                                                class="ti-plus"></i></div>
                                                        <div class="clearfix"></div>
                                                    </a>
                                                    <ul id="invoice" class="collapse">
                                                        <li> <a href="#">level item 1.1.1.1</a> </li>
                                                        <li> <a href="#">level item 1.1.1.2</a> </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li> <a href="#">level item 1.2</a> </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level
                                        item 2<div class="pull-right"><i class="ti-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="error" class="collapse">
                                        <li> <a href="#">level item 2.1</a> </li>
                                        <li> <a href="#">level item 2.2</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================-->
    </div>
</div>