<!-- Stored in resources/views/child.blade.php -->

<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="{{ Auth('admin')->User()->dashboard_style }}">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth('admin')->User()->firstName }} {{ Auth('admin')->User()->lastName }}
                            <span class="user-level"> Admin</span>
                            {{-- <span class="caret"></span> --}}
                        </span>
                    </a>
                </div>
            </div>

            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ url('/admin/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li
                        class="nav-item {{ request()->routeIs('manageusers') ? 'active' : '' }} {{ request()->routeIs('loginactivity') ? 'active' : '' }} {{ request()->routeIs('user.plans') ? 'active' : '' }} {{ request()->routeIs('viewuser') ? 'active' : '' }}">
                        <a href="{{ route('manageusers') }}">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <p>Manage Users</p>
                        </a>
                    </li>
                @if (Auth('admin')->User()->type == 'Super Admin' || Auth('admin')->User()->type == 'Admin')
                    <li
                        class="nav-item {{ request()->routeIs('plans') ? 'active' : '' }} {{ request()->routeIs('newplan') ? 'active' : '' }} {{ request()->routeIs('editplan') ? 'active' : '' }} {{ request()->routeIs('activeinvestments') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#pln">
                            <i class="fas fa-cubes "></i>
                            <p>Investment</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="pln">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ url('/admin/dashboard/plans') }}">
                                        <span class="sub-item">Investment Plans</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/dashboard/active-investments') }}">
                                        <span class="sub-item">Active Investments</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li
                        class="nav-item {{ request()->routeIs('mdeposits') ? 'active' : '' }} {{ request()->routeIs('viewdepositimage') ? 'active' : '' }} {{ request()->routeIs('mdeposits') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard/mdeposits') }}">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <p>Manage Deposits</p>
                        </a>
                    </li>

                    <li
                        class="nav-item {{ request()->routeIs('mwithdrawals') ? 'active' : '' }}   {{ request()->routeIs('processwithdraw') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard/mwithdrawals') }}">
                            <i class="fa fa-arrow-alt-circle-up" aria-hidden="true"></i>
                            <p>Manage Withdrawal</p>
                        </a>
                    </li>
                    <li
                    class="nav-item {{ request()->routeIs('admin.trades.index') ? 'active' : '' }} {{ request()->routeIs('admin.trades.create') ? 'active' : '' }} {{ request()->routeIs('admin.trades.show') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#trds">
                        <i class="fas fa-chevron-right "></i>
                        <p>Trades</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="trds">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.trades.create') }}">
                                    <span class="sub-item">Create Trade for Clients</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.trades.index') }}">
                                    <span class="sub-item">Clients Trades</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li
                class="nav-item {{ request()->routeIs('signal.index') ? 'active' : '' }} ">
                <a data-toggle="collapse" href="#sign">
                    <i class="fas fa-bell"></i>
                    <p>Signals</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="sign">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('signal-plans.index') }}">
                                <span class="sub-item">Signal Plans</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('signal.index') }}">
                                <span class="sub-item">Signals</span>
                            </a>
                        </li>

                    </ul>
                </div>
                </li>


                <li
                class="nav-item {{ request()->routeIs('admin.experts.index') ? 'active' : '' }} {{ request()->routeIs('admin.experts.create') ? 'active' : '' }} {{ request()->routeIs('admin.experts.edit') ? 'active' : '' }} ">
                <a href="{{ route('admin.experts.index') }}">
                    <i class="fa fa-copy" aria-hidden="true"></i>
                    <p>Manage Expert Copy</p>
                </a>
            </li>

            <li
                class="nav-item {{ request()->routeIs('admin.nfts.index') ? 'active' : '' }} {{request()->routeIs('admin.nfts.create') ? 'active' : '' }} {{request()->routeIs('admin.nfts.edit') ? 'active' : '' }} ">
                <a href="{{ route('admin.nfts.index') }}">
                    <i class="fas fa-gem" aria-hidden="true"></i>
                    <p>Manage NFTS</p>
                </a>
            </li>


            <li
            class="nav-item {{ request()->routeIs('admin.loans') ? 'active' : '' }} ">
            <a href="{{ route('admin.loans') }}">
                <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                <p>Manage Loans</p>
            </a>
        </li>

                    <li class="nav-item {{ request()->routeIs('emailservices') ? 'active' : '' }}">
                        <a href="{{ route('emailservices') }}">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <p>Email Services</p>
                        </a>
                    </li>

                    <li
                        class="nav-item {{ request()->routeIs('kyc') ? 'active' : '' }} {{ request()->routeIs('viewkyc') ? 'active' : '' }}">
                        <a href="{{ route('kyc') }}">
                            <i class="fa fa-user-check" aria-hidden="true"></i>
                            <p>KYC Application(s)</p>
                        </a>
                    </li>

                    <li
                        class="nav-item {{ request()->routeIs('msubtrade') ? 'active' : '' }} {{ request()->routeIs('tsettings') ? 'active' : '' }} {{ request()->routeIs('tacnts') ? 'active' : '' }} {{ request()->routeIs('subview') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#mgacnt">
                            <i class="fa fa-sync-alt"></i>
                            <p>Manage Accounts</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="mgacnt">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('msubtrade') }}">
                                        <span class="sub-item">Trading-Accounts</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('subview') }}">
                                        <span class="sub-item">Fee Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                @endif
                <li
                    class="nav-item {{ request()->routeIs('task') ? 'active' : '' }} {{ request()->routeIs('mtask') ? 'active' : '' }} {{ request()->routeIs('viewtask') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#task">
                        <i class="fas fa-align-center"></i>
                        <p>Task</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="task">
                        <ul class="nav nav-collapse">
                            @if (Auth('admin')->User()->type == 'Super Admin')
                                <li>
                                    <a href="{{ url('/admin/dashboard/task') }}">
                                        <span class="sub-item">Create Task</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/dashboard/mtask') }}">
                                        <span class="sub-item">Manage Task</span>
                                    </a>
                                </li>
                            @endif
                            @if (Auth('admin')->User()->type != 'Super Admin')
                                <li>
                                    <a href="{{ url('/admin/dashboard/viewtask') }}">
                                        <span class="sub-item">View my Task</span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
                @if (Auth('admin')->User()->type == 'Super Admin' || Auth('admin')->User()->type == 'Admin')
                    <li class="nav-item {{ request()->routeIs('leads') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard/leads') }}">
                            <i class="fas fa-user-slash " aria-hidden="true"></i>
                            <p>Leads</p>
                        </a>
                    </li>
                @endif

                @if (Auth('admin')->User()->type == 'Rentention Agent' || Auth('admin')->User()->type == 'Conversion Agent')
                    <li class="nav-item {{ request()->routeIs('leadsassign') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard/leadsassign') }}">
                            <i class="fas fa-user-slash " aria-hidden="true"></i>
                            <p>My Leads</p>
                        </a>
                    </li>
                @endif
                @if (Auth('admin')->User()->type == 'Super Admin')
                    <li
                        class="nav-item {{ request()->routeIs('addmanager') ? 'active' : '' }} {{ request()->routeIs('madmin') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#adm">
                            <i class="fa fa-user"></i>
                            <p>Administrator(s)</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="adm">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ url('/admin/dashboard/addmanager') }}">
                                        <span class="sub-item">Add Manager</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/dashboard/madmin') }}">
                                        <span class="sub-item">Manage Admin(s)</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li
                        class="nav-item {{ request()->routeIs('appsettingshow') ? 'active' : '' }} {{ request()->routeIs('termspolicy') ? 'active' : '' }} {{ request()->routeIs('refsetshow') ? 'active' : '' }} {{ request()->routeIs('paymentview') ? 'active' : '' }} {{ request()->routeIs('frontpage') ? 'active' : '' }} {{ request()->routeIs('allipaddress') ? 'active' : '' }} {{ request()->routeIs('ipaddress') ? 'active' : '' }} {{ request()->routeIs('editpaymethod') ? 'active' : '' }} {{ request()->routeIs('managecryptoasset') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#settings">
                            <i class="fa fa-cog"></i>
                            <p>Settings</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="settings">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('appsettingshow') }}">
                                        <span class="sub-item">App Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('refsetshow') }}">
                                        <span class="sub-item">Referral/Bonus Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('paymentview') }}">
                                        <span class="sub-item">Payment Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('managecryptoasset') }}">
                                        <span class="sub-item">Swap Settings</span>
                                    </a>
                                </li>


                                <!--<li>-->
                                <!--    <a href="{{ route('termspolicy') }}">-->
                                <!--        <span class="sub-item">Terms and Privacy</span>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <li>
                                    <a href="{{ url('/admin/dashboard/ipaddress') }}">
                                        <span class="sub-item">IP Address</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                    <li class="nav-item {{ request()->routeIs('aboutonlinetrade') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard/about') }}">
                            <i class=" fa fa-info-circle" aria-hidden="true"></i>
                            <p>For More script</p>
                        </a>
                    </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
