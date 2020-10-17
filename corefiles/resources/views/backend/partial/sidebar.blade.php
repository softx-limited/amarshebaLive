 <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->


                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            {{-- <li class="menu-title">Navigation</li> --}}

                            <li>




                                <a href="{{route('admin.dashboard')}}">
                                    <i data-feather="airplay"></i>

                                    <span> Dashboards </span>
                                </a>

                            </li>


                        @if(\Auth::user()->role->menu->menu_hrm==1)
                            <li>
                                <a href="#sidebarCrm" data-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> HRM </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCrm">
                                    <ul class="nav-second-level">
                                        @if(\Auth::user()->role->sub_menu->nurse_list==1)
                                        <li>                                           
                                        <a href="{{route('nurse.index')}}">Nurse List</a>
                                        </li>
                                        @endif

                                        @if(\Auth::user()->role->sub_menu->working_report==1)
                                        <li>
                                            <a href="{{ route('nurse.list') }}">Working Report</a>
                                        </li> 
                                        @endif                               

                                    </ul>
                                </div>
                            </li>
                            @endif


                            @if(\Auth::user()->role->menu->menu_client==1)
                            <li>
                                <a href="#sidebarCustomer" data-toggle="collapse">
                                    <i data-feather="user"></i>
                                    <span> Client </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCustomer">
                                    <ul class="nav-second-level">
                                        @if(\Auth::user()->role->sub_menu->client_list==1)
                                        <li>
                                        <a href="{{route('customerlist')}}">Client List</a>
                                        </li>
                                        @endif



                                    </ul>
                                </div>
                            </li>
                            @endif



                            {{-- <li class="menu-title mt-2">Apps</li> --}}




                            @if(\Auth::user()->role->menu->menu_product==1)
                            <li>
                                <a href="#sidebarEcommerce" data-toggle="collapse">
                                    <i data-feather="shopping-cart"></i>
                                    <span> Product Section </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarEcommerce">
                                    <ul class="nav-second-level">
                                       
                                        @if(\Auth::user()->role->sub_menu->product_list==1)
                                        <li>
                                            <a href="{{route('product.index')}}">Products</a>
                                        </li>
                                        @endif

                                    </ul>
                                </div>
                            </li>
                            @endif

                            @if(\Auth::user()->role->menu->menu_service==1)
                            <li>
                                <a href="#product_section" data-toggle="collapse">
                                    <i data-feather="mail"></i>
                                    <span> Service </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="product_section">
                                    <ul class="nav-second-level">
                                        @if(\Auth::user()->role->sub_menu->product_rent==1)
                                        <li>
                                        <a href="{{route('sale.create')}}">Product Rent</a>
                                        </li>
                                        @endif

                                        @if(\Auth::user()->role->sub_menu->product_rent_list==1)
                                        <li>
                                            <a href="{{ route('sales.list') }}">Product Rent List</a>
                                        </li>
                                        @endif

                                        @if(\Auth::user()->role->sub_menu->call_service==1)
                                        <li>
                                            <a href="{{ route('call.service.list') }}">Call Service List</a>
                                        </li>
                                        @endif
                                        @if(\Auth::user()->role->sub_menu->request_service==1)
                                        <li>
                                            <a href="{{ route('request.service.list') }}">Request Service</a>
                                        </li>
                                        @endif

                                    </ul>
                                </div>
                            </li>
                            
                            @endif
                            
                        

                           
                            @if(\Auth::user()->role->menu->menu_expense==1)
                            <li>
                                <a href="#sidebarProjects" data-toggle="collapse">
                                    <i data-feather="briefcase"></i>
                                    <span> Expense </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarProjects">
                                    <ul class="nav-second-level">
                                        @if(\Auth::user()->role->sub_menu->expense_category==1)
                                        <li>
                                            <a href="{{ route('expense.category.list') }}">Expense Category</a>
                                        </li>
                                        @endif
                                        @if(\Auth::user()->role->sub_menu->expense_list==1)
                                        <li>
                                            <a href="{{ route('expense.list') }}">Expense List</a>
                                        </li>
                                        @endif

                                        @if(\Auth::user()->role->sub_menu->salary_payment==1)
                                        <li>
                                            <a href="{{ route('nurse.list.payment') }}">Salary Payment</a>
                                        </li>
                                        @endif
                                        @if(\Auth::user()->role->sub_menu->salary_payment_list==1)
                                        <li>
                                            <a href="{{ route('nurse.slary.payment.history') }}">Salary Payment List</a>
                                        </li>
                                        @endif
 
                                    </ul>
                                </div>
                            </li>
                            @endif

                            @if(\Auth::user()->role->menu->menu_patient==1)
                            <li>
                                <a href="#sidebarCharts" data-toggle="collapse">
                                    <i data-feather="bar-chart-2"></i>
                                    <span> Patients Section </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCharts">
                                    <ul class="nav-second-level">
                                        @if(\Auth::user()->role->sub_menu->patient_list==1)
                                        <li>
                                            <a href="{{ route('patient.list') }}">Patients List</a>
                                        </li>
                                        @endif
                                        @if(\Auth::user()->role->sub_menu->assign_nurse==1)
                                        <li>
                                            <a href="{{ route('assign.nurse') }}">Assing Nurse</a>
                                        </li>
                                        @endif
                                         
                                    </ul>
                                </div>
                            </li>
                            @endif

                            @if(\Auth::user()->role->menu->menu_report==1)
                            <li>
                                <a href="#ReportSection" data-toggle="collapse">
                                    <i data-feather="clipboard"></i>
                                    <span> Reports  </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="ReportSection">
                                    <ul class="nav-second-level">
                                        @if(\Auth::user()->role->sub_menu->total_expense==1)
                                        <li>
                                            <a href="{{ route('expense.report') }}">Total Expense</a>
                                        </li>
                                        @endif

                                        @if(\Auth::user()->role->sub_menu->total_profit==1)
                                         <li>
                                            <a href="{{ route('income.report') }}">Total Profit</a>
                                        </li>
                                        @endif

                                        @if(\Auth::user()->role->sub_menu->net_profit==1)
                                        <li>
                                            <a href="{{ route('profit.report') }}">Net Profit</a>
                                        </li>
                                        @endif
                                       

                                    </ul>
                                </div>
                            </li>
                            @endif
                          

                            @if(\Auth::user()->role->menu->menu_settings==1)
                            
                            <li>
                                <a href="#sidebarTasks" data-toggle="collapse">
                                    <i data-feather="clipboard"></i>
                                    <span> Settings </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarTasks">
                                    <ul class="nav-second-level">
                                        @if(\Auth::user()->role->sub_menu->account_settings==1)
                                        <li>
                                            <a href="{{ route('account.list') }}">Account Settings</a>
                                        </li>
                                        @endif
                                        @if(\Auth::user()->role->sub_menu->web_settings==1)
                                         <li>
                                            <a href="{{ route('website.settings') }}">Web Settings</a>
                                        </li>
                                        @endif
                                        @if(\Auth::user()->role->sub_menu->slider_settings==1)
                                        <li>
                                            <a href="{{ route('slider.list') }}">Slider Settings</a>
                                        </li>
                                        @endif
                                        @if(\Auth::user()->role->sub_menu->service_settings==1)

                                        <li>
                                            <a href="{{ route('service.list') }}">Service Settings</a>
                                        </li>
                                        @endif
                                        @if(\Auth::user()->role->sub_menu->team_settings==1)

                                        <li>
                                            <a href="{{ route('team.list') }}">Our Team</a>
                                        </li>
                                        @endif
                                        @if(\Auth::user()->role->sub_menu->man_power_settings==1)

                                        <li>
                                            <a href="{{ route('manpower.list') }}">Man Power</a>
                                        </li>
                                        @endif
                                        @if(\Auth::user()->role->sub_menu->client_settings==1)                                       

                                        <li>
                                            <a href="{{ route('client.list') }}">Happy Client Lists</a>
                                        </li>
                                        @endif

                                        @if(\Auth::user()->role->sub_menu->basic_settings==1)
                                        <li>
                                            <a href="{{ route('site.common.info') }}">Basic Settings</a>
                                        </li>
                                        @endif

                                        {{-- <li>
                                            <a href="{{ route('site.common.info') }}">Basic Settings</a>
                                        </li> --}}
                                        
                                        
                                    </ul>
                                </div>


                            </li>

                            @endif

                            @if(\Auth::user()->role->menu->menu_settings==1)
                            <li>
                                <a href="#sidebarExtendedui" data-toggle="collapse">
                                    <i data-feather="layers"></i>                                    
                                    <span> Users Section </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarExtendedui">
                                    <ul class="nav-second-level">
                                        @if(\Auth::user()->role->sub_menu->users_settings==1)
                                        <li>
                                            <a href="{{ route('user.list') }}">User List</a>
                                        </li>
                                        @endif
                                        @if(\Auth::user()->role->sub_menu->roles_settings==1)

                                        <li> <a href="{{ route('roles.list') }}">Role List</a> </li>
                                        @endif
                                        {{-- 
                                            
                                            <li>
                                            <a href="extended-range-slider.html">Range Slider</a>
                                        </li>
                                        <li>
                                            <a href="extended-dragula.html">Dragula</a>
                                        </li>
                                        <li>
                                            <a href="extended-animation.html">Animation</a>
                                        </li>
                                        <li>
                                            <a href="extended-sweet-alert.html">Sweet Alert</a>
                                        </li>
                                        <li>
                                            <a href="extended-tour.html">Tour Page</a>
                                        </li>
                                        <li>
                                            <a href="extended-scrollspy.html">Scrollspy</a>
                                        </li>
                                        <li>
                                            <a href="extended-loading-buttons.html">Loading Buttons</a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </li>
                            @endif


{{-- 
                            <li>
                                <a href="apps-file-manager.html">
                                    <i data-feather="folder-plus"></i>
                                    <span> File Manager </span>
                                </a>
                            </li>

                            <li class="menu-title mt-2">Custom</li>



                            <li>
                                <a href="#sidebarLayouts" data-toggle="collapse">
                                    <i data-feather="layout"></i>
                                    <span class="badge badge-blue float-right">New</span>
                                    <span> Layouts </span>
                                </a>
                                <div class="collapse" id="sidebarLayouts">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="layouts-horizontal.html">Horizontal</a>
                                        </li>
                                        <li>
                                            <a href="layouts-detached.html">Detached</a>
                                        </li>
                                        <li>
                                            <a href="layouts-two-column.html">Two Column Menu</a>
                                        </li>
                                        <li>
                                            <a href="layouts-two-tone-icons.html">Two Tones Icons</a>
                                        </li>
                                        <li>
                                            <a href="layouts-preloader.html">Preloader</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="menu-title mt-2">Components</li>

                            <li>
                                <a href="#sidebarBaseui" data-toggle="collapse">
                                    <i data-feather="pocket"></i>
                                    <span> Base UI </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarBaseui">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="ui-buttons.html">Buttons</a>
                                        </li>
                                        <li>
                                            <a href="ui-cards.html">Cards</a>
                                        </li>
                                        <li>
                                            <a href="ui-avatars.html">Avatars</a>
                                        </li>
                                        <li>
                                            <a href="ui-portlets.html">Portlets</a>
                                        </li>
                                        <li>
                                            <a href="ui-tabs-accordions.html">Tabs & Accordions</a>
                                        </li>
                                        <li>
                                            <a href="ui-modals.html">Modals</a>
                                        </li>
                                        <li>
                                            <a href="ui-progress.html">Progress</a>
                                        </li>
                                        <li>
                                            <a href="ui-notifications.html">Notifications</a>
                                        </li>
                                        <li>
                                            <a href="ui-spinners.html">Spinners</a>
                                        </li>
                                        <li>
                                            <a href="ui-images.html">Images</a>
                                        </li>
                                        <li>
                                            <a href="ui-carousel.html">Carousel</a>
                                        </li>
                                        <li>
                                            <a href="ui-list-group.html">List Group</a>
                                        </li>
                                        <li>
                                            <a href="ui-video.html">Embed Video</a>
                                        </li>
                                        <li>
                                            <a href="ui-dropdowns.html">Dropdowns</a>
                                        </li>
                                        <li>
                                            <a href="ui-ribbons.html">Ribbons</a>
                                        </li>
                                        <li>
                                            <a href="ui-tooltips-popovers.html">Tooltips & Popovers</a>
                                        </li>
                                        <li>
                                            <a href="ui-general.html">General UI</a>
                                        </li>
                                        <li>
                                            <a href="ui-typography.html">Typography</a>
                                        </li>
                                        <li>
                                            <a href="ui-grid.html">Grid</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarExtendedui" data-toggle="collapse">
                                    <i data-feather="layers"></i>
                                    <span class="badge badge-info float-right">Hot</span>
                                    <span> Extended UI </span>
                                </a>
                                <div class="collapse" id="sidebarExtendedui">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="extended-nestable.html">Nestable List</a>
                                        </li>
                                        <li>
                                            <a href="extended-range-slider.html">Range Slider</a>
                                        </li>
                                        <li>
                                            <a href="extended-dragula.html">Dragula</a>
                                        </li>
                                        <li>
                                            <a href="extended-animation.html">Animation</a>
                                        </li>
                                        <li>
                                            <a href="extended-sweet-alert.html">Sweet Alert</a>
                                        </li>
                                        <li>
                                            <a href="extended-tour.html">Tour Page</a>
                                        </li>
                                        <li>
                                            <a href="extended-scrollspy.html">Scrollspy</a>
                                        </li>
                                        <li>
                                            <a href="extended-loading-buttons.html">Loading Buttons</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="widgets.html">
                                    <i data-feather="gift"></i>
                                    <span> Widgets </span>
                                </a>
                            </li>

                            <li>
                                <a href="#sidebarIcons" data-toggle="collapse">
                                    <i data-feather="cpu"></i>
                                    <span> Icons </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarIcons">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="icons-two-tone.html">Two Tone Icons</a>
                                        </li>
                                        <li>
                                            <a href="icons-feather.html">Feather Icons</a>
                                        </li>
                                        <li>
                                            <a href="icons-mdi.html">Material Design Icons</a>
                                        </li>
                                        <li>
                                            <a href="icons-dripicons.html">Dripicons</a>
                                        </li>
                                        <li>
                                            <a href="icons-font-awesome.html">Font Awesome 5</a>
                                        </li>
                                        <li>
                                            <a href="icons-themify.html">Themify</a>
                                        </li>
                                        <li>
                                            <a href="icons-simple-line.html">Simple Line</a>
                                        </li>
                                        <li>
                                            <a href="icons-weather.html">Weather</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarForms" data-toggle="collapse">
                                    <i data-feather="bookmark"></i>
                                    <span> Forms </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarForms">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="forms-elements.html">General Elements</a>
                                        </li>
                                        <li>
                                            <a href="forms-advanced.html">Advanced</a>
                                        </li>
                                        <li>
                                            <a href="forms-validation.html">Validation</a>
                                        </li>
                                        <li>
                                            <a href="forms-pickers.html">Pickers</a>
                                        </li>
                                        <li>
                                            <a href="forms-wizard.html">Wizard</a>
                                        </li>
                                        <li>
                                            <a href="forms-masks.html">Masks</a>
                                        </li>
                                        <li>
                                            <a href="forms-summernote.html">Summernote</a>
                                        </li>
                                        <li>
                                            <a href="forms-quilljs.html">Quilljs Editor</a>
                                        </li>
                                        <li>
                                            <a href="forms-file-uploads.html">File Uploads</a>
                                        </li>
                                        <li>
                                            <a href="forms-x-editable.html">X Editable</a>
                                        </li>
                                        <li>
                                            <a href="forms-image-crop.html">Image Crop</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarTables" data-toggle="collapse">
                                    <i data-feather="grid"></i>
                                    <span> Tables </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarTables">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="tables-basic.html">Basic Tables</a>
                                        </li>
                                        <li>
                                            <a href="tables-datatables.html">Data Tables</a>
                                        </li>
                                        <li>
                                            <a href="tables-editable.html">Editable Tables</a>
                                        </li>
                                        <li>
                                            <a href="tables-responsive.html">Responsive Tables</a>
                                        </li>
                                        <li>
                                            <a href="tables-footables.html">FooTable</a>
                                        </li>
                                        <li>
                                            <a href="tables-bootstrap.html">Bootstrap Tables</a>
                                        </li>
                                        <li>
                                            <a href="tables-tablesaw.html">Tablesaw Tables</a>
                                        </li>
                                        <li>
                                            <a href="tables-jsgrid.html">JsGrid Tables</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarCharts" data-toggle="collapse">
                                    <i data-feather="bar-chart-2"></i>
                                    <span> Charts </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCharts">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="charts-apex.html">Apex Charts</a>
                                        </li>
                                        <li>
                                            <a href="charts-flot.html">Flot Charts</a>
                                        </li>
                                        <li>
                                            <a href="charts-morris.html">Morris Charts</a>
                                        </li>
                                        <li>
                                            <a href="charts-chartjs.html">Chartjs Charts</a>
                                        </li>
                                        <li>
                                            <a href="charts-peity.html">Peity Charts</a>
                                        </li>
                                        <li>
                                            <a href="charts-chartist.html">Chartist Charts</a>
                                        </li>
                                        <li>
                                            <a href="charts-c3.html">C3 Charts</a>
                                        </li>
                                        <li>
                                            <a href="charts-sparklines.html">Sparklines Charts</a>
                                        </li>
                                        <li>
                                            <a href="charts-knob.html">Jquery Knob Charts</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarMaps" data-toggle="collapse">
                                    <i data-feather="map"></i>
                                    <span> Maps </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMaps">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="maps-google.html">Google Maps</a>
                                        </li>
                                        <li>
                                            <a href="maps-vector.html">Vector Maps</a>
                                        </li>
                                        <li>
                                            <a href="maps-mapael.html">Mapael Maps</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarMultilevel" data-toggle="collapse">
                                    <i data-feather="share-2"></i>
                                    <span> Multi Level </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="#sidebarMultilevel2" data-toggle="collapse">
                                                Second Level <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarMultilevel2">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="javascript: void(0);">Item 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);">Item 2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <a href="#sidebarMultilevel3" data-toggle="collapse">
                                                Third Level <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarMultilevel3">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="javascript: void(0);">Item 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#sidebarMultilevel4" data-toggle="collapse">
                                                            Item 2 <span class="menu-arrow"></span>
                                                        </a>
                                                        <div class="collapse" id="sidebarMultilevel4">
                                                            <ul class="nav-second-level">
                                                                <li>
                                                                    <a href="javascript: void(0);">Item 1</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript: void(0);">Item 2</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
