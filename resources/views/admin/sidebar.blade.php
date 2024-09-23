<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{url('home')}}">
            <!-- <img src="admin/assets/images/logo.svg" alt="logo" /> -->
            Hospital
        </a>
        <a class="sidebar-brand brand-logo-mini" href="index.html">HMS</a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="admin/assets/images/faces/face15.jpg" alt="" />
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">
                            {{Auth()->user()->name}}
                        </h5>
                        <span>{{Auth()->user()->name}}</span>
                    </div>
                </div>
                <?php
                if (Auth()->user()->user_type == '1') {
                ?>
                    <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                        <a href="/edit_user_data/{{Auth()->user()->id}}" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-primary"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="/change_user_password/{{Auth()->user()->id}}" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-onepassword  text-info"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-calendar-today text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>

        <?php if (Auth()->user()->user_type == '1') {
        ?>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('view_user_data')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-plus"></i>
                    </span>
                    <span class="menu-title">User Update</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('add_doctor_view')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-multiple-plus"></i>
                    </span>
                    <span class="menu-title">Add Doctor</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('show_all_doctor')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-edit"></i>
                    </span>
                    <span class="menu-title">All doctor</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('check_appoitment')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-wechat"></i>
                    </span>
                    <span class="menu-title">Appoitment</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('view_all_in_touch_msg')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-message-alert"></i>
                    </span>
                    <span class="menu-title">Messages</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('view_medicine_to_add')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-medical-bag"></i>
                    </span>
                    <span class="menu-title">Add Medicine</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('view_all_medicine')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-medical-bag"></i>
                    </span>
                    <span class="menu-title">View All Medicine</span>
                </a>
            </li>
    <!-- patient module setting -->
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('add_patient_route')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-plus"></i>
                    </span>
                    <span class="menu-title">Add Patient</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('all_patient_data')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-edit"></i>
                    </span>
                    <span class="menu-title">All Patient Data</span>
                </a>
            </li>
        <?php
        }
        if (Auth()->user()->user_type == '5') {
        ?>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('view_all_order')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-cash"></i>
                    </span>
                    <span class="menu-title">Paid Payments</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('ship_order')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-truck"></i>
                    </span>
                    <span class="menu-title">COD Order</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('view_shipped_order')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-truck"></i>
                    </span>
                    <span class="menu-title">Shipped Order</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('cancel_order')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-cart-off"></i>
                    </span>
                    <span class="menu-title">Cancel Order</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('delivered_order')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-truck-check"></i>
                    </span>
                    <span class="menu-title">Delivered Order</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('view_all_msg_about_medicine')}}">
                    <span class="menu-icon">
                        <i class="mdi mdi-message-alert"></i>
                    </span>
                    <span class="menu-title">View Messages</span>
                </a>
            </li>
        <?php
        }
        ?>



    </ul>
</nav>
