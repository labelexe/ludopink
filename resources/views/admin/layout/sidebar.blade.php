<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed {{ $websettings->sideskin_mode }} menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('/') }}/admin/dashboard"><span
                        class="brand-logo">
                    </span>
                    <h2 class="brand-text">{{ $websettings->website_name }}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="las la-times-circle d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a class="d-flex align-items-center"
                    href="{{ url('/') }}/admin/dashboard"><i class="las la-tachometer-alt"></i><span
                        class="menu-title text-truncate" data-i18n="Email">Dashboard</span></a>
            </li>

            <li class="nav-item"><a class="d-flex align-items-center"
                    href="{{ url('/') }}/admin/player/all"><i class="las la-users"></i><span
                        class="menu-title text-truncate" data-i18n="Invoice">All Player</span></a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center"
                    href="{{ url('/') }}/admin/shop/coin"><i class="las la-shopping-cart"></i><span
                        class="menu-title text-truncate" data-i18n="Invoice">Shop Coin</span></a>
            </li>

            {{-- <li class="nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                class="las la-coins"></i><span class="menu-title text-truncate"
                data-i18n="Invoice">Add Coin Request</span></a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/addcoin/pending"><i
                        class="las la-star"></i><span class="menu-item" data-i18n="List">Pending Request</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/addcoin/approved"><i
                        class="las la-star"></i><span class="menu-item" data-i18n="Preview">Approved Request </span></a>
            </li>
            <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/addcoin/reject"><i
                class="las la-star"></i><span class="menu-item" data-i18n="Preview">Reject Request </span></a>
    </li>
        </ul>
    </li> --}}


            <li class="nav-item"><a class="d-flex align-items-center" href="{{ url('/') }}/admin/bid/coin"><i
                        class="las la-dice-five"></i><span class="menu-title text-truncate" data-i18n="Invoice">Bid
                        Value</span></a>
            </li>

            <li class="nav-item"><a class="d-flex align-items-center" href="{{ url('/') }}/admin/leaderboard"><i
                class="las la-trophy"></i><span class="menu-title text-truncate" data-i18n="Invoice">Leaderboard</span></a>
           </li>

            <li class="nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        class="las la-hand-holding-usd"></i><span class="menu-title text-truncate"
                        data-i18n="Email">Withdraw Request</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/new/withdraw/request"><i
                                class="las la-star"></i><span class="menu-item" data-i18n="List">New
                                Request</span></a>
                    </li>
                    <li><a class="d-flex align-items-center"
                            href="{{ url('/') }}/admin/approved/withdraw/request"><i
                                class="las la-star"></i><span class="menu-item" data-i18n="Preview">Approved
                                Withdraw</span></a>
                    </li>
                    <li><a class="d-flex align-items-center"
                            href="{{ url('/') }}/admin/rejected/withdraw/request"><i
                                class="las la-star"></i><span class="menu-item" data-i18n="Preview">Rejected
                                Withdraw</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        class="las la-exchange-alt"></i><span class="menu-title text-truncate"
                        data-i18n="Invoice">Transactions</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/transction/all"><i
                                class="las la-star"></i><span class="menu-item" data-i18n="List">All
                                Transaction</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/transction/success"><i
                                class="las la-star"></i><span class="menu-item" data-i18n="Preview">Success
                                Transaction</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/transction/fail"><i
                                class="las la-star"></i><span class="menu-item" data-i18n="Preview">Faield
                                Transaction</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                class="las la-question-circle"></i><span class="menu-title text-truncate"
                data-i18n="Invoice">FAQ</span></a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/faq/all"><i
                        class="las la-star"></i><span class="menu-item" data-i18n="List">All FAQ</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/faq/add"><i
                        class="las la-star"></i><span class="menu-item" data-i18n="Preview">Add FAQ </span></a>
            </li>
        </ul>
    </li>




            <li class="nav-item"><a class="d-flex align-items-center"
                    href="{{ url('/') }}/admin/contact/list"><i class="lab la-facebook-messenger"></i><span
                        class="menu-title text-truncate" data-i18n="Invoice">Contact Message</span></a>
            </li>

            <li class="nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                class="las la-star-half-alt"></i><span class="menu-title text-truncate"
                data-i18n="Invoice">Testimonial</span></a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/testimonial/all"><i
                        class="las la-star"></i><span class="menu-item" data-i18n="List">All Testimonial</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/testimonial/add"><i
                        class="las la-star"></i><span class="menu-item" data-i18n="Preview">Add Testimonial </span></a>
            </li>
        </ul>
    </li>

            <!-- <li class="nav-item"><a class="d-flex align-items-center" href="{{ url('/') }}/admin/notification"><i class="las la-bell"></i><span class="menu-title text-truncate" data-i18n="Invoice">Notification</span></a>
          </li>
 -->
            <li class="nav-item"><a class="d-flex align-items-center"
                    href="{{ url('/') }}/admin/notification/single/user"><i class="las la-certificate"></i><span
                        class="menu-title text-truncate" data-i18n="Invoice">Licence Status</span></a>
            </li>

            <li class="nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        class="las la-tools"></i><span class="menu-title text-truncate" data-i18n="Email">Homepage
                        Setting</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/home/image-update"><i
                                class="las la-star"></i><span class="menu-item" data-i18n="List">Update
                                Image</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/home/text-update"><i
                                class="las la-star"></i><span class="menu-item" data-i18n="Preview">Update
                                Text</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ url('/') }}/admin/home/screenshot"><i
                                class="las la-star"></i><span class="menu-item"
                                data-i18n="Preview">Screenshot</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a class="d-flex align-items-center"
                    href="{{ url('/') }}/admin/websettings"><i class="las la-gamepad"></i><span
                        class="menu-title text-truncate" data-i18n="Invoice">Game Settings</span></a></li>

            <li class="nav-item"><a class="d-flex align-items-center" href="{{ url('/') }}/admin/account"><i
                        class="las la-user-cog"></i><span class="menu-title text-truncate" data-i18n="Invoice">Account
                        Settings</span></a></li>

                        <li class="nav-item"><a class="d-flex align-items-center" href="{{ url('/') }}/admin/clear"><i
                            class="las la-broom"></i><span class="menu-title text-truncate" data-i18n="Invoice">Clear Cache
                            </span></a></li>

            <li class="nav-item"><a class="d-flex align-items-center" href="logout"><i
                        class="las la-sign-out-alt"></i><span class="menu-title text-truncate"
                        data-i18n="Calendar">Logout</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
