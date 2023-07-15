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

<ul class="navbar-nav bg-orange sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="overview">
        <div class="sidebar-brand-text mx-3" id="sidebar-title">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-building"></i>
            <span>Agency Names</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                foreach ($agencies as $key => $agency) {
                    if ($key != count($agencies) - 1)
                        echo "<button class='collapse-item d-inline-block' onClick='changeAgencyData(" . $agencies_id[$key] . ")'>" . $agency . "</button>";
                }
                ?>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Charts -->
    <li id="overview_item" class="nav-item">
        <a class="nav-link" href="overview">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Overview</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li id="setting_item" class="nav-item">
        <a class="nav-link" href="agency-setting">
            <i class="fas fa-fw fa-toolbox"></i>
            <span>Agency Settings</span>
        </a>
    </li>
    <li id="user_item" class="nav-item">
        <a class="nav-link" href="user-setting">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>User Settings</span>
        </a>
    </li>

    <li id="module_item" class="nav-item">
        <a class="nav-link" href="module-setting">
            <i class="fas fa-fw fa-tools"></i>
            <span>Module Settings</span>
        </a>
    </li>
<li id="module_format_item" class="nav-item">
        <a class="nav-link" href="module-format">
            <i class="fas fa-fw fa-fan"></i>
            <span>Module Builder</span>
        </a>
    </li>
    <li id="integration_item" class="nav-item">
        <a class="nav-link" href="integration">
            <i class="fas fa-fw fa-tools"></i>
            <span>Integrations</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    
    
    <li id="users_item" class="nav-item">
        <a class="nav-link" href="users">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Users</span>
        </a>
    </li>
    <li id="devices_item" class="nav-item">
        <a class="nav-link" href="devices">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Devices</span>
        </a>
    </li>
<li id="call_item" class="nav-item">
        <a class="nav-link" href="call-type">
            <i class="fas fa-fw fa-phone-alt"></i>
            <span>Call Types</span>
        </a>
    </li>
    <li id="page_item" class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-network-wired"></i>
            <span>Page Groups</span>
        </a>
    </li>
    <li id="billing_item" class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Billing</span>
        </a>
    </li>
    <?php
    if ($sysAdmin == 'active') {
    ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <li id="config_item" class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-tools"></i>
                <span>System Config</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
    <?php
    }
    ?>
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
    if (currentUrl.includes('overview')) {
        document.getElementById('overview_item').classList.add('active');
    } else if (currentUrl.includes('agency-setting')) {
        document.getElementById('setting_item').classList.add('active');
    } else if (currentUrl.includes('module-setting')) {
        document.getElementById('module_item').classList.add('active');
    } else if (currentUrl.includes('user-setting')) {
        document.getElementById('user_item').classList.add('active');
    } else if (currentUrl.includes('call-type')) {
        document.getElementById('call_item').classList.add('active');
    } else if (currentUrl.includes('module-format')) {
        document.getElementById('module_format_item').classList.add('active');
    } else if (currentUrl.includes('users')) {
        document.getElementById('users_item').classList.add('active');
    } else if (currentUrl.includes('devices')) {
        document.getElementById('devices_item').classList.add('active');
    } else if (currentUrl.includes('integration')) {
        document.getElementById('integration_item').classList.add('active');
    } else if (currentUrl.includes('system-config')) {
        document.getElementById('config_item').classList.add('active');
        document.getElementById('sidebar-title').innerHTML = 'System Config';
        document.getElementById('accordionSidebar').classList.remove('bg-orange');
        document.getElementById('accordionSidebar').classList.add('bg-danger');
    }

    function changeAgencyData(agency_id) {
        document.cookie = "agency_id = " + agency_id;
        window.location.replace("overview");
    }
</script>
