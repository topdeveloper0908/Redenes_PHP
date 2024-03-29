<?php
$user = $_COOKIE['name'];
$isAdmin = $_COOKIE['isAdmin'];
$sysAdmin = $_COOKIE['systemAdmin'];
$agency = $_COOKIE['agency_name'];
if (strlen($user) == 0) {
    header('location:logout');
}
?>
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar logo -->
    <img class="logo" src="img/logo.png" alt="...">

    <h3 id="agency-title" class="mx-auto mb-0"><?php echo $agency; ?></h3>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $user; ?></span>
                <img class="img-profile rounded-circle" src="img/settings.png">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="new-incident">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Dashboard
                </a>
                <?php
                if ($isAdmin == 'true') {
                ?>
                    <a class="dropdown-item" href="overview">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                <?php
                }
                ?>
                <?php
                if ($sysAdmin == 'active') {
                ?>
                    <a class="dropdown-item" href="build-numbers">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        System Config
                    </a>
                <?php
                }
                ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
<script>
    // To show the loader
    var currentUrl = window.location.href;
    if (currentUrl.includes('build-numbers') ||
        currentUrl.includes('agencies') ||
        currentUrl.includes('agency-types') ||
        currentUrl.includes('config')
    ) {
        document.getElementById('agency-title').innerHTML = "Rescue Solutions Network";
    }
</script>