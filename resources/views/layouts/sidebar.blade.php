<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i>
                        <span>@lang('translation.dashboards')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics" class="nav-link">@lang('translation.analytics')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm" class="nav-link">@lang('translation.crm')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index" class="nav-link">@lang('translation.ecommerce')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crypto" class="nav-link">@lang('translation.crypto')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects" class="nav-link">@lang('translation.projects')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-nft" class="nav-link"> @lang('translation.nft')</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-job" class="nav-link">@lang('translation.job')</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->

                {{-- Library start --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLibrary" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLibrary">
                        <i class="ri-settings-3-line"></i> <span>Library
                        </span>
                    </a>
                    <div class="collapse menu-dropdown @if (Route::is('grades.*') ||
                            Route::is('uom.*') ||
                            Route::is('gender.*') ||
                            Route::is('marital-status.*') ||
                            Route::is('blood-group.*') ||
                            Route::is('religion.*') ||
                            Route::is('hospital.*') ||
                            Route::is('hospital-branch.*') ||
                            Route::is('bank.*') ||
                            Route::is('bank-branch.*') ||
                            Route::is('division.*') ||
                            Route::is('district.*') ||
                            Route::is('upazila.*') ||
                            Route::is('union.*') ||
                            Route::is('occupation.*') ||
                            Route::is('symptom.*') ||
                            Route::is('specialization.*') ||
                            Route::is('hospital-building.*') ||
                            Route::is('designation.*') ||
                            Route::is('shift.*') ||
                            Route::is('room-type.*') ||
                            Route::is('hospital-room.*') ||
                            Route::is('hospital-floor.*') ||
                            Route::is('department.*') ||
                            Route::is('ticket-fee.*') ||
                            Route::is('employee-type.*') ||
                            Route::is('agent.*') ||
                            Route::is('agent-commission.*')) show @endif"
                        id="sidebarLibrary">
                        <ul class="nav nav-sm flex-column">
                            @can('Grade View')
                                <li class="nav-item">
                                    <a href="{{ route('grades.index') }}"
                                        class="nav-link @if (Route::is('grades.*')) active @endif">Grades</a>
                                </li>
                            @endcan
                            @can('Uom View')
                                <li class="nav-item">
                                    <a href="{{ route('uom.index') }}"
                                        class="nav-link @if (Route::is('uom.*')) active @endif">Uom</a>
                                </li>
                            @endcan
                            @can('Gender View')
                                <li class="nav-item">
                                    <a href="{{ route('gender.index') }}"
                                        class="nav-link @if (Route::is('gender.*')) active @endif">Gender</a>
                                </li>
                            @endcan
                            @can('Marital Status View')
                                <li class="nav-item">
                                    <a href="{{ route('marital-status.index') }}"
                                        class="nav-link @if (Route::is('marital-status.*')) active @endif">Marital Status</a>
                                </li>
                            @endcan
                            @can('Blood Group View')
                                <li class="nav-item">
                                    <a href="{{ route('blood-group.index') }}"
                                        class="nav-link @if (Route::is('blood-group.*')) active @endif">Blood Group</a>
                                </li>
                            @endcan
                            @can('Religion View')
                                <li class="nav-item">
                                    <a href="{{ route('religion.index') }}"
                                        class="nav-link @if (Route::is('religion.*')) active @endif">Religion</a>
                                </li>
                            @endcan
                            @canany([
                                'Hospital View',
                                'Hospital Branch View',
                                'Hospital Building View',
                                'Hospital Room
                                View',
                                'Hospital Floor View',
                                'Hospital Counter View',
                                ])
                                <li class="nav-item">
                                    <a href="#sidebarHospitalInfo" class="nav-link" data-bs-toggle="collapse" role="button"
                                        aria-expanded="false" aria-controls="sidebarHospitalInfo">Hospital Info

                                    </a>
                                    <div class="collapse menu-dropdown @if (Route::is('hospital.*') ||
                                            Route::is('hospital-branch.*') ||
                                            Route::is('hospital-building.*') ||
                                            Route::is('hospital-room.*') ||
                                            Route::is('hospital-counter.*') ||
                                            Route::is('hospital-floor.*')) show @endif"
                                        id="sidebarHospitalInfo">
                                        <ul class="nav nav-sm flex-column">
                                            @can('Hospital View')
                                                <li class="nav-item">
                                                    <a href="{{ route('hospital.index') }}"
                                                        class="nav-link @if (Route::is('hospital.*')) active @endif">Hospital</a>
                                                </li>
                                            @endcan
                                            @can('Hospital Branch View')
                                                <li class="nav-item">
                                                    <a href="{{ route('hospital-branch.index') }}"
                                                        class="nav-link @if (Route::is('hospital-branch.*')) active @endif">Hospital
                                                        Branch</a>
                                                </li>
                                            @endcan
                                            @can('Hospital Building View')
                                                <li class="nav-item">
                                                    <a href="{{ route('hospital-building.index') }}"
                                                        class="nav-link @if (Route::is('hospital-building.*')) active @endif">Hospital
                                                        Building</a>
                                                </li>
                                            @endcan
                                            @can('Hospital Room View')
                                                <li class="nav-item">
                                                    <a href="{{ route('hospital-room.index') }}"
                                                        class="nav-link @if (Route::is('hospital-room.*')) active @endif">Hospital
                                                        Room</a>
                                                </li>
                                            @endcan
                                            @can('Hospital Floor View')
                                                <li class="nav-item">
                                                    <a href="{{ route('hospital-floor.index') }}"
                                                        class="nav-link @if (Route::is('hospital-floor.*')) active @endif">Hospital
                                                        Floor</a>
                                                </li>
                                            @endcan
                                            @can('Hospital Counter View')
                                                <li class="nav-item">
                                                    <a href="{{ route('hospital-counter.index') }}"
                                                        class="nav-link @if (Route::is('hospital-counter.*')) active @endif">Hospital
                                                        Counter</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany
                            @canany(['Bank View', 'Bank Branch View'])
                                <li class="nav-item">
                                    <a href="#sidebarBankInfo" class="nav-link" data-bs-toggle="collapse" role="button"
                                        aria-expanded="false" aria-controls="sidebarBankInfo">Bank Info

                                    </a>
                                    <div class="collapse menu-dropdown @if (Route::is('bank.*') || Route::is('bank-branch.*')) show @endif"
                                        id="sidebarBankInfo">
                                        <ul class="nav nav-sm flex-column">
                                            @can('Bank View')
                                                <li class="nav-item">
                                                    <a href="{{ route('bank.index') }}"
                                                        class="nav-link @if (Route::is('bank.*')) active @endif">Bank
                                                        List
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('Bank Branch View')
                                                <li class="nav-item">
                                                    <a href="{{ route('bank-branch.index') }}"
                                                        class="nav-link @if (Route::is('bank-branch.*')) active @endif">Bank
                                                        Branch
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany
                            @canany(['Division View', 'District View', 'Upazila View', 'Union View'])
                                <li class="nav-item">
                                    <a href="#sidebarAddressInfo" class="nav-link" data-bs-toggle="collapse"
                                        role="button" aria-expanded="false" aria-controls="sidebarAddressInfo">Address
                                        Info

                                    </a>
                                    <div class="collapse menu-dropdown @if (Route::is('division.*') || Route::is('district.*') || Route::is('upazila.*') || Route::is('union.*')) show @endif"
                                        id="sidebarAddressInfo">
                                        <ul class="nav nav-sm flex-column">
                                            @can('Division View')
                                                <li class="nav-item">
                                                    <a href="{{ route('division.index') }}"
                                                        class="nav-link @if (Route::is('division.*')) active @endif">Division</a>
                                                </li>
                                            @endcan
                                            @can('District View')
                                                <li class="nav-item">
                                                    <a href="{{ route('district.index') }}"
                                                        class="nav-link @if (Route::is('district.*')) active @endif">District</a>
                                                </li>
                                            @endcan
                                            @can('Upazila View')
                                                <li class="nav-item">
                                                    <a href="{{ route('upazila.index') }}"
                                                        class="nav-link @if (Route::is('upazila.*')) active @endif">Upazila</a>
                                                </li>
                                            @endcan
                                            @can('Union View')
                                                <li class="nav-item">
                                                    <a href="{{ route('union.index') }}"
                                                        class="nav-link @if (Route::is('union.*')) active @endif">Union</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany
                            @can('Occupation View')
                                <li class="nav-item">
                                    <a href="{{ route('occupation.index') }}"
                                        class="nav-link @if (Route::is('occupation.*')) active @endif">Occupation</a>
                                </li>
                            @endcan
                            @can('Symptom View')
                                <li class="nav-item">
                                    <a href="{{ route('symptom.index') }}"
                                        class="nav-link @if (Route::is('symptom.*')) active @endif">Symptom</a>
                                </li>
                            @endcan
                            @can('Specialization View')
                                <li class="nav-item">
                                    <a href="{{ route('specialization.index') }}"
                                        class="nav-link @if (Route::is('specialization.*')) active @endif">Specialization</a>
                                </li>
                            @endcan
                            @can('Designation View')
                                <li class="nav-item">
                                    <a href="{{ route('designation.index') }}"
                                        class="nav-link @if (Route::is('designation.*')) active @endif">Designation</a>
                                </li>
                            @endcan
                            @can('Shift View')
                                <li class="nav-item">
                                    <a href="{{ route('shift.index') }}"
                                        class="nav-link @if (Route::is('shift.*')) active @endif">Shift</a>
                                </li>
                            @endcan
                            @can('Room Type View')
                                <li class="nav-item">
                                    <a href="{{ route('room-type.index') }}"
                                        class="nav-link @if (Route::is('room-type.*')) active @endif">Room Type</a>
                                </li>
                            @endcan
                            @can('Department View')
                                <li class="nav-item">
                                    <a href="{{ route('department.index') }}"
                                        class="nav-link @if (Route::is('department.*')) active @endif">Department</a>
                                </li>
                            @endcan
                            @canany(['Discount Service Setup View', 'Other Service View'])
                                <li class="nav-item">
                                    <a href="#sidebarServiceInfo" class="nav-link" data-bs-toggle="collapse" role="button"
                                        aria-expanded="false" aria-controls="sidebarServiceInfo">Service Info

                                    </a>
                                    <div class="collapse menu-dropdown @if (Route::is('discount-service-setup.*') || Route::is('other-service.*')) show @endif"
                                        id="sidebarServiceInfo">
                                        <ul class="nav nav-sm flex-column">
                                            @can('Discount Service Setup View')
                                                <li class="nav-item">
                                                    <a href="{{ route('discount-service-setup.index') }}"
                                                        class="nav-link @if (Route::is('discount-service-setup.*')) active @endif">Discount Service
                                                        List
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('Other Service View')
                                                <li class="nav-item">
                                                    <a href="{{ route('other-service.index') }}"
                                                        class="nav-link @if (Route::is('other-service.*')) active @endif">Other Services
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany
                            @can('Employee Type View')
                                <li class="nav-item">
                                    <a href="{{ route('employee-type.index') }}"
                                        class="nav-link @if (Route::is('employee-type.*')) active @endif">Employee
                                        Type</a>
                                </li>
                            @endcan
                            @can('Ticket Fee View')
                                <li class="nav-item">
                                    <a href="{{ route('ticket-fee.index') }}"
                                        class="nav-link @if (Route::is('ticket-fee.*')) active @endif">Ticket Fee</a>
                                </li>
                            @endcan
                            @can('Agent View')
                                <li class="nav-item">
                                    <a href="{{ route('agent.index') }}"
                                        class="nav-link @if (Route::is('agent.*')) active @endif">Agent</a>
                                </li>
                            @endcan
                            @can('Agent Commission View')
                                <li class="nav-item">
                                    <a href="{{ route('agent-commission.index') }}"
                                        class="nav-link @if (Route::is('agent-commission.*')) active @endif">Agent Commission</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                {{-- Library end --}}
                {{-- Employee start --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarEmployee" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarEmployee">
                        <i class="ri-user-add-line"></i> <span>Employee
                        </span>
                    </a>
                    <div class="collapse menu-dropdown @if (Route::is('employee.*') ||
                            Route::is('emp-exam.*') ||
                            Route::is('emp-board.*') ||
                            Route::is('resource.*') ||
                            Route::is('external-emp.*')) show @endif"
                        id="sidebarEmployee">
                        <ul class="nav nav-sm flex-column">
                            {{-- @can('Employee Exam') --}}
                            <li class="nav-item">
                                <a href="{{ route('emp-exam.index') }}"
                                    class="nav-link @if (Route::is('emp-exam.index')) active @endif">Exams</a>
                            </li>
                            {{-- @endcan --}}
                            {{-- @can('Employee Board') --}}
                            <li class="nav-item">
                                <a href="{{ route('emp-board.index') }}"
                                    class="nav-link @if (Route::is('emp-board.index')) active @endif">Boards</a>
                            </li>
                            {{-- @endcan --}}
                            <li class="nav-item">
                                <a href="{{ route('employee.basic') }}"
                                    class="nav-link @if (Route::is('employee.*')) active @endif">Employee
                                    Create</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('employee.index') }}"
                                    class="nav-link @if (Route::is('employee.index')) active @endif">Employee
                                    List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('resource.index') }}"
                                    class="nav-link @if (Route::is('resource.*')) active @endif">Resource</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('external-emp.index') }}"
                                    class="nav-link @if (Route::is('external-emp.index')) active @endif">External
                                    Employee</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Employee end --}}

                {{-- Diagnosis start --}}
                @canany([
                    'Machine View',
                    'Test Group View',
                    'Test Name View',
                    'Report Type View',
                    'Test
                    Attribute View',
                    'Test Machine View',
                    'Test Product View',
                    'Test Package View',
                    'Diag Money Receive',
                    ])
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#diagnosis" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="diagnosis">
                            <i class="ri-user-add-line"></i> <span>Diagnosis</span>
                        </a>
                        <div class="collapse menu-dropdown @if (Route::is('machine.*') ||
                                Route::is('test-group.*') ||
                                Route::is('report-type.*') ||
                                Route::is('test-attribute.*') ||
                                Route::is('test-machine.*') ||
                                Route::is('test-product.*') ||
                                Route::is('test-name.*') ||
                                Route::is('test-package.*') ||
                                Route::is('diagnosis-money-receive.*') || Route::is('diagnosis-money-receive.list') 
                                
                                ) show @endif"
                            id="diagnosis">
                            <ul class="nav nav-sm flex-column">
                                @canany([
                                    'Machine View',
                                    'Test Group View',
                                    'Test Name View',
                                    'Report Type View',
                                    'Test
                                    Attribute View',
                                    'Test Machine View',
                                    'Test Product View',
                                    'Test Package View',
                                    ])
                                    <li class="nav-item">
                                        <a href="#sidebarSetupInfo" class="nav-link" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="sidebarSetupInfo">Setup

                                        </a>
                                        <div class="collapse menu-dropdown @if (Route::is('machine.*') ||
                                                Route::is('test-group.*') ||
                                                Route::is('test-name.*') ||
                                                Route::is('report-type.*') ||
                                                Route::is('test-attribute.*') ||
                                                Route::is('test-product.*') ||
                                                Route::is('test-machine.*') ||
                                                Route::is('test-package.*')) show @endif"
                                            id="sidebarSetupInfo">
                                            <ul class="nav nav-sm flex-column">
                                                @can('Machine View')
                                                    <li class="nav-item">
                                                        <a href="{{ route('machine.index') }}"
                                                            class="nav-link @if (Route::is('machine.*')) active @endif">Machines</a>
                                                    </li>
                                                @endcan
                                                @can('Test Group View')
                                                    <li class="nav-item">
                                                        <a href="{{ route('test-group.index') }}"
                                                            class="nav-link @if (Route::is('test-group.*')) active @endif">Test
                                                            Group</a>
                                                    </li>
                                                @endcan
                                                @can('Test Name View')
                                                    <li class="nav-item">
                                                        <a href="{{ route('test-name.index') }}"
                                                            class="nav-link @if (Route::is('test-name.*')) active @endif">Test
                                                            Name</a>
                                                    </li>
                                                @endcan
                                                @can('Report Type View')
                                                    <li class="nav-item">
                                                        <a href="{{ route('report-type.index') }}"
                                                            class="nav-link @if (Route::is('report-type.*')) active @endif">Report
                                                            Type</a>
                                                    </li>
                                                @endcan
                                                @can('Test Attribute View')
                                                    <li class="nav-item">
                                                        <a href="{{ route('test-attribute.index') }}"
                                                            class="nav-link @if (Route::is('test-attribute.*')) active @endif">Test
                                                            Attribute</a>
                                                    </li>
                                                @endcan
                                                @can('Test Machine View')
                                                    <li class="nav-item">
                                                        <a href="{{ route('test-machine.index') }}"
                                                            class="nav-link @if (Route::is('test-machine.*')) active @endif">Test
                                                            Machine</a>
                                                    </li>
                                                @endcan
                                                @can('Test Product View')
                                                    <li class="nav-item">
                                                        <a href="{{ route('test-product.index') }}"
                                                            class="nav-link @if (Route::is('test-product.*')) active @endif">Test
                                                            Product</a>
                                                    </li>
                                                @endcan
                                                @can('Test Package View')
                                                    <li class="nav-item">
                                                        <a href="{{ route('test-package.index')}}"
                                                           class="nav-link @if (Route::is('test-package.*')) active @endif">Test Package</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                    @can('Diag Money Receive')
                                        <li class="nav-item">
                                            <a href="{{ route('diagnosis-money-receive.index') }}"
                                               class="nav-link @if (Route::is('diagnosis-money-receive.index')) active @endif">Diag Money Receive</a>
                                        </li>
                                    @endcan
                                    @can('Diag Money Receive View')
                                        <li class="nav-item">
                                            <a href="{{ route('diagnosis-money-receive.list') }}"
                                               class="nav-link @if (Route::is('diagnosis-money-receive.list')) active @endif">Diag Money Receive List</a>
                                        </li>
                                    @endcan
                                    @can('Diag Money Receive View')
                                        <li class="nav-item">
                                            <a href="{{ route('diagnosis-money-receive.barcode-print') }}"
                                               class="nav-link @if (Route::is('diagnosis-money-receive.barcode-print')) active @endif">Money Receive Barcode Print</a>
                                        </li>
                                    @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany
                {{-- Diagnosis end --}}
                {{-- Doctor start --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#doctorSidebar" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="doctorSidebar">
                        <i class="ri-user-add-line"></i> <span>Doctor</span>
                    </a>
                    <div class="collapse menu-dropdown @if (Route::is('reference.*') || Route::is('report-doctor-commission.*')) show @endif"
                        id="doctorSidebar">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('reference.index') }}"
                                   class="nav-link @if (Route::is('reference.*')) active @endif">References</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('report-doctor-commission.index') }}"
                                    class="nav-link @if (Route::is('report-doctor-commission.*')) active @endif">Report Doctor Commission</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Doctor end --}}
                {{-- Store start --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#storeSidebar" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="storeSidebar">
                        <i class="ri-user-add-line"></i> <span>Store</span>
                    </a>
                    <div class="collapse menu-dropdown @if (Route::is('machine.*') || Route::is('store.product.*') || Route::is('store.product-category.*')) show @endif"
                        id="storeSidebar">
                        <ul class="nav nav-sm flex-column">
                            @can('Store Product Category View')
                                <li class="nav-item">
                                    <a href="{{ route('store.product-category.index') }}"
                                        class="nav-link @if (Route::is('store.product-category.*')) active @endif">Product
                                        Category</a>
                                </li>
                            @endcan
                            @can('Store Product View')
                                <li class="nav-item">
                                    <a href="{{ route('store.product.index') }}"
                                        class="nav-link @if (Route::is('store.product.*')) active @endif">Products</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                {{-- Store end --}}
                {{-- Users start --}}
                <li class="nav-item ">
                    <a class="nav-link menu-link" href="#sidebarUser" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarUser">
                        <i class="ri-user-add-line"></i> <span>Users</span>
                    </a>
                    <div class="collapse menu-dropdown @if (Route::is('permission.*') ||
                            Route::is('roles.*') ||
                            Route::is('user.*') ||
                            Route::is('login.history.list') ||
                            Route::is('message.log.list')) show @endif"
                         id="sidebarUser">
                        <ul class="nav nav-sm flex-column">
                            @can('Permission View')
                                <li class="nav-item">
                                    <a href="{{ route('permission.index') }}"
                                       class="nav-link @if (Route::is('permission.*')) active @endif">Permissions</a>
                                </li>
                            @endcan
                            @can('Role View')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}"
                                       class="nav-link @if (Route::is('roles.*')) active @endif">Roles</a>
                                </li>
                            @endcan
                            @can('User View')
                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}"
                                       class="nav-link @if (Route::is('user.*')) active @endif">Users</a>
                                </li>
                            @endcan
                            @can('Login History')
                                <li class="nav-item">
                                    <a href="{{ route('login.history.list') }}"
                                       class="nav-link @if (Route::is('login.history.list')) active @endif">Login
                                        History</a>
                                </li>
                            @endcan
                            @can('Message Log')
                                <li class="nav-item">
                                    <a href="{{ route('message.log.list') }}"
                                       class="nav-link @if (Route::is('message.log.list')) active @endif">Message Log</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                {{-- Users end --}}
                {{-- Components start --}}

                <li class="collapse menu-dropdown nav-item">
                    <a href="dashboard" class="nav-link"><i class="mdi mdi-speedometer"></i>Dashboard</a>
                </li>
                {{-- Components end --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
