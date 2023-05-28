<?php
$authorization = $_COOKIE['authorization'];
$agencies = explode("$$", $_COOKIE['agency']);
$agencies_id = explode("$$", $_COOKIE['agency_id']);
$sysAdmin = $_COOKIE['systemAdmin'];
$user = $_COOKIE['name'];
if (strlen($user) == 0) {
    header('location:logout');
}
?>
<!-- Sidebar -->

<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="overview">
        <div class="sidebar-brand-text mx-3" id="sidebar-title">SYSTEM CONFIG </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Charts -->
    <li id="overview_item" class="nav-item">
        <a class="nav-link" href="overview">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>View As Agency</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li id="build_numbers_item" class="nav-item">
        <a class="nav-link" href="build-numbers">
            <i class="fas fa-fw fa-toolbox"></i>
            <span>Build Numbers</span>
        </a>
    </li>
    <li id="agency_types_item" class="nav-item">
        <a class="nav-link" href="agency-types">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Agency Types</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li id="user_setting_item" class="nav-item">
        <a class="nav-link" href="config-user-setting">
            <i class="fas fa-fw fa-tools"></i>
            <span>User Settings</span>
        </a>
    </li>

    <li id="module_setting_item" class="nav-item">
        <a class="nav-link" href="config-module-setting">
            <i class="fas fa-fw fa-tools"></i>
            <span>Module Settings</span>
        </a>
    </li>

    <li id="module_format_item" class="nav-item">
        <a class="nav-link" href="config-module-format">
            <i class="fas fa-fw fa-tools"></i>
            <span>Format Modules</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li id="agency_item" class="nav-item">
        <a class="nav-link" href="agencies">
            <i class="fas fa-fw fa-phone-alt"></i>
            <span>Agencies</span>
        </a>
    </li>
    <li id="users_item" class="nav-item">
        <a class="nav-link" href="config-users">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Users</span>
        </a>
    </li>
    <li id="devices_item" class="nav-item">
        <a class="nav-link" href="config-device">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Devices</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li id="module_format_item" class="nav-item">
        <a class="nav-link" href="module-format">
            <i class="fas fa-fw fa-fan"></i>
            <span>Alpha Pagers</span>
        </a>
    </li>
    <li id="module_format_item" class="nav-item">
        <a class="nav-link" href="module-format">
            <i class="fas fa-fw fa-fan"></i>
            <span>Twillo</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="logout">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Log Out</span>
        </a>
        <!-- Nav Item - Pages Collapse Menu -->
    </li>
</ul>
<!-- End of Sidebar -->
<script>
    // To show the loader
    var currentUrl = window.location.href;
    if (currentUrl.includes('build-numbers')) {
        document.getElementById('build_numbers_item').classList.add('active');
    } else if (currentUrl.includes('agency-types')) {
        document.getElementById('agency_types_item').classList.add('active');
    } else if (currentUrl.includes('config-user-setting')) {
        document.getElementById('user_setting_item').classList.add('active');
    } else if (currentUrl.includes('config-module-setting')) {
        document.getElementById('module_setting_item').classList.add('active');
    } else if (currentUrl.includes('agencies')) {
        document.getElementById('agency_item').classList.add('active');
    } else if (currentUrl.includes('config-users')) {
        document.getElementById('users_item').classList.add('active');
    } else if (currentUrl.includes('config-device')) {
        document.getElementById('devices_item').classList.add('active');
    } else if (currentUrl.includes('config-module-format')) {
        document.getElementById('module_format_item').classList.add('active');
    }

    function changeAgencyData(agency_id) {
        document.cookie = "agency_id = " + agency_id;
        window.location.replace("overview");
    }
</script>