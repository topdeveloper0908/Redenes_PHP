<?php
$authorization = $_COOKIE['authorization'];
$agencies = explode("$$", $_COOKIE['agency']);
$agencies_id = explode("$$", $_COOKIE['agency_id']);
$user = $_COOKIE['name'];
if (strlen($user) == 0) {
    header('location:logout');
}
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion p-relative" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">Dashboard</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-building"></i>
            <span>Agency Names</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-house-user"></i>
            <span>Home</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded" id="sidebar-home-wrapper">
                <button class="collapse-item d-inline-block">Directory</button>
                <button class="collapse-item d-inline-block">Calendar</button>
                <button class="collapse-item d-inline-block">Status</button>
                <button class="collapse-item d-inline-block">Schedual</button>
                <button class="collapse-item d-inline-block">Weather</button>
                <button class="collapse-item d-inline-block">GPS</button>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-list"></i>
            <span>Logs</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded" id="sidebar-logs-wrapper">
                <button class="collapse-item d-inline-block">Supplies</button>
                <button class="collapse-item d-inline-block">Training</button>
                <button class="collapse-item d-inline-block">Daily</button>
                <button class="collapse-item d-inline-block">Vehicles</button>
                <button class="collapse-item d-inline-block">Equipment</button>
                <button class="collapse-item d-inline-block">Resources</button>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" id="alert-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Alerts</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded" id="sidebar-alerts-wrapper">
                <button class="collapse-item d-inline-block">Emergency</button>
                <a href="new-incident" class="collapse-item d-inline-block">New Incident</a>
                <a href="closed-incident" class="collapse-item d-inline-block">Closed Incident</a>
                <a href="active-incident" class="collapse-item d-inline-block">Active Incident</a>
                <button class="collapse-item d-inline-block">Phone</button>
                <a href="online-form" class="collapse-item d-inline-block">Messages</a>
                <button class="collapse-item d-inline-block">Audio</button>
                <button class="collapse-item d-inline-block">Mutual Aid</button>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-compass"></i>
            <span>References</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded" id="sidebar-references-wrapper">
                <button class="collapse-item d-inline-block">Locations</button>
                <button class="collapse-item d-inline-block">Maps</button>
                <button class="collapse-item d-inline-block">Communications</button>
                <button class="collapse-item d-inline-block">Internal</button>
                <button class="collapse-item d-inline-block">Incident Types</button>
                <button class="collapse-item d-inline-block">ICS</button>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Account</span>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded" id="sidebar-account-wrapper">
                <button class="collapse-item d-inline-block">Personal Profile</button>
                <button class="collapse-item d-inline-block">Agency Profile</button>
                <button class="collapse-item d-inline-block">App Settings</button>
                <button class="collapse-item d-inline-block">Notifications</button>
                <button class="collapse-item d-inline-block">Certificaions</button>
                <button class="collapse-item d-inline-block">Connect Settings</button>
                <button class="collapse-item d-inline-block">Payments</button>
                <button class="collapse-item d-inline-block">New Agency</button>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="logout">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Log Out</span>
        </a>
        <!-- Nav Item - Pages Collapse Menu -->
    </li>
</ul>
<script>
    // To show the loader
    var currentUrl = window.location.href;
    if (localStorage.getItem('dashsidebar-data')) {
        data = JSON.parse(localStorage.getItem('dashsidebar-data'));
        console.log(data);
        if (data.home) {
            tmp = '';
            for (let index = 0; index < data.home.length; index++) {
                const element = data.home[index];
                if (element.state == 'false') {
                    tmp += "<button class = 'collapse-item d-inline-block";
                    tmp += " disabled";
                    tmp += "'>" + element.name + "</button>";
                } else {
                    if (element.server_ui == "true") {
                        tmp += "<a href = '" + element.module.replace('_', '-') + "' class = 'collapse-item d-inline-block'>" + element.name + "</a>";
                    } else {
                        if (element.server_ui == "true") {
                            tmp += "<a href = '" + element.module.replace('_', '-') + "' class = 'collapse-item d-inline-block";
                            if (currentUrl.indexOf(element.module.replace('_', '-')) > 0) {
                                tmp += " active";
                            }
                            tmp += "'>" + element.name + "</a>";
                        } else {
                            tmp += "<a href = 'online-form?form_id=" + element.default_form + "' class = 'collapse-item d-inline-block";
                            if (currentUrl.indexOf(element.module.replace('_', '-')) > 0) {
                                tmp += " active";
                            }
                            tmp += "'>" + element.name + "</a>";
                        }
                    }
                }
            }
            document.getElementById('sidebar-home-wrapper').innerHTML = tmp;
        }
        if (data.logs) {
            tmp = '';
            for (let index = 0; index < data.logs.length; index++) {
                const element = data.logs[index];
                if (element.state == 'false') {
                    tmp += "<button class = 'collapse-item d-inline-block";
                    tmp += " disabled";
                    tmp += "'>" + element.name + "</button>";
                } else {
                    if (element.server_ui == "true") {
                        tmp += "<a href = '" + element.module.replace('_', '-') + "' class = 'collapse-item d-inline-block'>" + element.name + "</a>";
                    } else {
                        if (element.server_ui == "true") {
                            tmp += "<a href = '" + element.module.replace('_', '-') + "' class = 'collapse-item d-inline-block";
                            if (currentUrl.indexOf(element.module.replace('_', '-')) > 0) {
                                tmp += " active";
                            }
                            tmp += "'>" + element.name + "</a>";
                        } else {
                            tmp += "<a href = 'online-form?form_id=" + element.default_form + "' class = 'collapse-item d-inline-block";
                            if (currentUrl.indexOf(element.module.replace('_', '-')) > 0) {
                                tmp += " active";
                            }
                            tmp += "'>" + element.name + "</a>";
                        }
                    }
                }
            }
            document.getElementById('sidebar-logs-wrapper').innerHTML = tmp;
        }
        if (data.alerts) {
            tmp = '';
            for (let index = 0; index < data.alerts.length; index++) {
                const element = data.alerts[index];
                if (element.state == 'false') {
                    tmp += "<button class = 'collapse-item d-inline-block";
                    tmp += " disabled";
                    tmp += "'>" + element.name + "</button>";
                } else {
                    if (element.server_ui == "true") {
                        tmp += "<a href = '" + element.module.replace('_', '-') + "' class = 'collapse-item d-inline-block";
                        if (currentUrl.indexOf(element.module.replace('_', '-')) > 0) {
                            tmp += " active";
                        }
                        tmp += "'>" + element.name + "</a>";
                    } else {
                        tmp += "<a href = 'online-form?form_id=" + element.default_form + "' class = 'collapse-item d-inline-block";
                        if (currentUrl.indexOf(element.module.replace('_', '-')) > 0) {
                            tmp += " active";
                        }
                        tmp += "'>" + element.name + "</a>";
                    }
                }
            }
            document.getElementById('sidebar-alerts-wrapper').innerHTML = tmp;
        }
        if (data.references) {
            tmp = '';
            for (let index = 0; index < data.references.length; index++) {
                const element = data.references[index];
                if (element.state == 'false') {
                    tmp += "<button class = 'collapse-item d-inline-block";
                    tmp += " disabled";
                    tmp += "'>" + element.name + "</button>";
                } else {
                    if (element.server_ui == "true") {
                        tmp += "<a href = '" + element.module.replace('_', '-') + "' class = 'collapse-item d-inline-block'>" + element.name + "</a>";
                    } else {
                        if (element.server_ui == "true") {
                            tmp += "<a href = '" + element.module.replace('_', '-') + "' class = 'collapse-item d-inline-block";
                            if (currentUrl.indexOf(element.module.replace('_', '-')) > 0) {
                                tmp += " active";
                            }
                            tmp += "'>" + element.name + "</a>";
                        } else {
                            tmp += "<a href = 'online-form?form_id=" + element.default_form + "' class = 'collapse-item d-inline-block";
                            if (currentUrl.indexOf(element.module.replace('_', '-')) > 0) {
                                tmp += " active";
                            }
                            tmp += "'>" + element.name + "</a>";
                        }
                    }
                }
            }
            document.getElementById('sidebar-references-wrapper').innerHTML = tmp;
        }
        if (data.account) {
            tmp = '';
            for (let index = 0; index < data.account.length; index++) {
                const element = data.account[index];
                if (element.state == 'false') {
                    tmp += "<button class = 'collapse-item d-inline-block";
                    tmp += " disabled";
                    tmp += "'>" + element.name + "</button>";
                } else {
                    if (element.server_ui == "true") {
                        tmp += "<a href = '" + element.module.replace('_', '-') + "' class = 'collapse-item d-inline-block'>" + element.name + "</a>";
                    } else {
                        if (element.server_ui == "true") {
                            tmp += "<a href = '" + element.module.replace('_', '-') + "' class = 'collapse-item d-inline-block";
                            if (currentUrl.indexOf(element.module.replace('_', '-')) > 0) {
                                tmp += " active";
                            }
                            tmp += "'>" + element.name + "</a>";
                        } else {
                            tmp += "<a href = 'online-form?form_id=" + element.default_form + "' class = 'collapse-item d-inline-block";
                            if (currentUrl.indexOf(element.module.replace('_', '-')) > 0) {
                                tmp += " active";
                            }
                            tmp += "'>" + element.name + "</a>";
                        }
                    }
                }
            }
            document.getElementById('sidebar-account-wrapper').innerHTML = tmp;
        }
    }
    if (
        currentUrl.includes('/active-incident') ||
        currentUrl.includes('/closed-incident') ||
        currentUrl.includes('/select-incident') ||
        currentUrl.includes('/new-incident') ||
        currentUrl.includes('/online-form')
    ) {
        document.getElementById('alert-item').classList.add('active');
        document.getElementById('alert-item').firstElementChild.classList.remove('collapsed');
        document.getElementById('alert-item').lastElementChild.classList.add('show');
    }

    function changeAgencyData(agency_id) {
        document.cookie = "agency_id = " + agency_id;
        window.location.replace("overview");
    }
</script>