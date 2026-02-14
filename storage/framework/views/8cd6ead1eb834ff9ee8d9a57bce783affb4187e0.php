<!-- Stored in resources/views/child.blade.php -->

<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?php echo e(Auth('admin')->User()->firstName); ?> <?php echo e(Auth('admin')->User()->lastName); ?>

                            <span class="user-level"> Admin</span>
                            
                        </span>
                    </a>
                </div>
            </div>

            <ul class="nav nav-primary">
                <li class="nav-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('/admin/dashboard')); ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li
                        class="nav-item <?php echo e(request()->routeIs('manageusers') ? 'active' : ''); ?> <?php echo e(request()->routeIs('loginactivity') ? 'active' : ''); ?> <?php echo e(request()->routeIs('user.plans') ? 'active' : ''); ?> <?php echo e(request()->routeIs('viewuser') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('manageusers')); ?>">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <p>Manage Users</p>
                        </a>
                    </li>
                <?php if(Auth('admin')->User()->type == 'Super Admin' || Auth('admin')->User()->type == 'Admin'): ?>
                    <li
                        class="nav-item <?php echo e(request()->routeIs('plans') ? 'active' : ''); ?> <?php echo e(request()->routeIs('newplan') ? 'active' : ''); ?> <?php echo e(request()->routeIs('editplan') ? 'active' : ''); ?> <?php echo e(request()->routeIs('activeinvestments') ? 'active' : ''); ?>">
                        <a data-toggle="collapse" href="#pln">
                            <i class="fas fa-cubes "></i>
                            <p>Investment</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="pln">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?php echo e(url('/admin/dashboard/plans')); ?>">
                                        <span class="sub-item">Investment Plans</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/admin/dashboard/active-investments')); ?>">
                                        <span class="sub-item">Active Investments</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li
                        class="nav-item <?php echo e(request()->routeIs('mdeposits') ? 'active' : ''); ?> <?php echo e(request()->routeIs('viewdepositimage') ? 'active' : ''); ?> <?php echo e(request()->routeIs('mdeposits') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/admin/dashboard/mdeposits')); ?>">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <p>Manage Deposits</p>
                        </a>
                    </li>

                    <li
                        class="nav-item <?php echo e(request()->routeIs('mwithdrawals') ? 'active' : ''); ?>   <?php echo e(request()->routeIs('processwithdraw') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/admin/dashboard/mwithdrawals')); ?>">
                            <i class="fa fa-arrow-alt-circle-up" aria-hidden="true"></i>
                            <p>Manage Withdrawal</p>
                        </a>
                    </li>
                    <li
                    class="nav-item <?php echo e(request()->routeIs('admin.trades.index') ? 'active' : ''); ?> <?php echo e(request()->routeIs('admin.trades.create') ? 'active' : ''); ?> <?php echo e(request()->routeIs('admin.trades.show') ? 'active' : ''); ?>">
                    <a data-toggle="collapse" href="#trds">
                        <i class="fas fa-chevron-right "></i>
                        <p>Trades</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="trds">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(route('admin.trades.create')); ?>">
                                    <span class="sub-item">Create Trade for Clients</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('admin.trades.index')); ?>">
                                    <span class="sub-item">Clients Trades</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li
                class="nav-item <?php echo e(request()->routeIs('signal.index') ? 'active' : ''); ?> ">
                <a data-toggle="collapse" href="#sign">
                    <i class="fas fa-bell"></i>
                    <p>Signals</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="sign">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="<?php echo e(route('signal-plans.index')); ?>">
                                <span class="sub-item">Signal Plans</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('signal.index')); ?>">
                                <span class="sub-item">Signals</span>
                            </a>
                        </li>

                    </ul>
                </div>
                </li>


                <li
                class="nav-item <?php echo e(request()->routeIs('admin.experts.index') ? 'active' : ''); ?> <?php echo e(request()->routeIs('admin.experts.create') ? 'active' : ''); ?> <?php echo e(request()->routeIs('admin.experts.edit') ? 'active' : ''); ?> ">
                <a href="<?php echo e(route('admin.experts.index')); ?>">
                    <i class="fa fa-copy" aria-hidden="true"></i>
                    <p>Manage Expert Copy</p>
                </a>
            </li>

            <li
                class="nav-item <?php echo e(request()->routeIs('admin.nfts.index') ? 'active' : ''); ?> <?php echo e(request()->routeIs('admin.nfts.create') ? 'active' : ''); ?> <?php echo e(request()->routeIs('admin.nfts.edit') ? 'active' : ''); ?> ">
                <a href="<?php echo e(route('admin.nfts.index')); ?>">
                    <i class="fas fa-gem" aria-hidden="true"></i>
                    <p>Manage NFTS</p>
                </a>
            </li>


            <li
            class="nav-item <?php echo e(request()->routeIs('admin.loans') ? 'active' : ''); ?> ">
            <a href="<?php echo e(route('admin.loans')); ?>">
                <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                <p>Manage Loans</p>
            </a>
        </li>

                    <li class="nav-item <?php echo e(request()->routeIs('emailservices') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('emailservices')); ?>">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <p>Email Services</p>
                        </a>
                    </li>

                    <li
                        class="nav-item <?php echo e(request()->routeIs('kyc') ? 'active' : ''); ?> <?php echo e(request()->routeIs('viewkyc') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('kyc')); ?>">
                            <i class="fa fa-user-check" aria-hidden="true"></i>
                            <p>KYC Application(s)</p>
                        </a>
                    </li>

                    <li
                        class="nav-item <?php echo e(request()->routeIs('msubtrade') ? 'active' : ''); ?> <?php echo e(request()->routeIs('tsettings') ? 'active' : ''); ?> <?php echo e(request()->routeIs('tacnts') ? 'active' : ''); ?> <?php echo e(request()->routeIs('subview') ? 'active' : ''); ?>">
                        <a data-toggle="collapse" href="#mgacnt">
                            <i class="fa fa-sync-alt"></i>
                            <p>Manage Accounts</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="mgacnt">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?php echo e(route('msubtrade')); ?>">
                                        <span class="sub-item">Trading-Accounts</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo e(route('subview')); ?>">
                                        <span class="sub-item">Fee Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                <?php endif; ?>
                <li
                    class="nav-item <?php echo e(request()->routeIs('task') ? 'active' : ''); ?> <?php echo e(request()->routeIs('mtask') ? 'active' : ''); ?> <?php echo e(request()->routeIs('viewtask') ? 'active' : ''); ?>">
                    <a data-toggle="collapse" href="#task">
                        <i class="fas fa-align-center"></i>
                        <p>Task</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="task">
                        <ul class="nav nav-collapse">
                            <?php if(Auth('admin')->User()->type == 'Super Admin'): ?>
                                <li>
                                    <a href="<?php echo e(url('/admin/dashboard/task')); ?>">
                                        <span class="sub-item">Create Task</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/admin/dashboard/mtask')); ?>">
                                        <span class="sub-item">Manage Task</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(Auth('admin')->User()->type != 'Super Admin'): ?>
                                <li>
                                    <a href="<?php echo e(url('/admin/dashboard/viewtask')); ?>">
                                        <span class="sub-item">View my Task</span>
                                    </a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </li>
                <?php if(Auth('admin')->User()->type == 'Super Admin' || Auth('admin')->User()->type == 'Admin'): ?>
                    <li class="nav-item <?php echo e(request()->routeIs('leads') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/admin/dashboard/leads')); ?>">
                            <i class="fas fa-user-slash " aria-hidden="true"></i>
                            <p>Leads</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(Auth('admin')->User()->type == 'Rentention Agent' || Auth('admin')->User()->type == 'Conversion Agent'): ?>
                    <li class="nav-item <?php echo e(request()->routeIs('leadsassign') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/admin/dashboard/leadsassign')); ?>">
                            <i class="fas fa-user-slash " aria-hidden="true"></i>
                            <p>My Leads</p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth('admin')->User()->type == 'Super Admin'): ?>
                    <li
                        class="nav-item <?php echo e(request()->routeIs('addmanager') ? 'active' : ''); ?> <?php echo e(request()->routeIs('madmin') ? 'active' : ''); ?>">
                        <a data-toggle="collapse" href="#adm">
                            <i class="fa fa-user"></i>
                            <p>Administrator(s)</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="adm">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?php echo e(url('/admin/dashboard/addmanager')); ?>">
                                        <span class="sub-item">Add Manager</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/admin/dashboard/madmin')); ?>">
                                        <span class="sub-item">Manage Admin(s)</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li
                        class="nav-item <?php echo e(request()->routeIs('appsettingshow') ? 'active' : ''); ?> <?php echo e(request()->routeIs('termspolicy') ? 'active' : ''); ?> <?php echo e(request()->routeIs('refsetshow') ? 'active' : ''); ?> <?php echo e(request()->routeIs('paymentview') ? 'active' : ''); ?> <?php echo e(request()->routeIs('frontpage') ? 'active' : ''); ?> <?php echo e(request()->routeIs('allipaddress') ? 'active' : ''); ?> <?php echo e(request()->routeIs('ipaddress') ? 'active' : ''); ?> <?php echo e(request()->routeIs('editpaymethod') ? 'active' : ''); ?> <?php echo e(request()->routeIs('managecryptoasset') ? 'active' : ''); ?>">
                        <a data-toggle="collapse" href="#settings">
                            <i class="fa fa-cog"></i>
                            <p>Settings</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="settings">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?php echo e(route('appsettingshow')); ?>">
                                        <span class="sub-item">App Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('refsetshow')); ?>">
                                        <span class="sub-item">Referral/Bonus Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('paymentview')); ?>">
                                        <span class="sub-item">Payment Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('managecryptoasset')); ?>">
                                        <span class="sub-item">Swap Settings</span>
                                    </a>
                                </li>


                                <!--<li>-->
                                <!--    <a href="<?php echo e(route('termspolicy')); ?>">-->
                                <!--        <span class="sub-item">Terms and Privacy</span>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <li>
                                    <a href="<?php echo e(url('/admin/dashboard/ipaddress')); ?>">
                                        <span class="sub-item">IP Address</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>


                    <li class="nav-item <?php echo e(request()->routeIs('aboutonlinetrade') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/admin/dashboard/about')); ?>">
                            <i class=" fa fa-info-circle" aria-hidden="true"></i>
                            <p>For More script</p>
                        </a>
                    </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
<?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>