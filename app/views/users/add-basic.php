<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>Advanced Forms Template</title>

        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="e">
        <meta name="author" content="Joshua Jones">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?=ASSETS?>vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/animate/animate.compat.css">
        <link rel="stylesheet" href="<?=ASSETS?>vendor/font-awesome/css/all.min.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/boxicons/css/boxicons.min.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/jquery-ui/jquery-ui.theme.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/select2/css/select2.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/dropzone/basic.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/dropzone/dropzone.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
        <link rel="stylesheet" href="<?=ASSETS?>vendor/summernote/summernote-bs4.css" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?=ASSETS?>css/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?=ASSETS?>css/skins/default.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?=ASSETS?>css/custom.css">

        <!-- Head Libs -->
        <script src="<?=ASSETS?>vendor/modernizr/modernizr.js"></script>

    </head>
    <body>
        <section class="body">

            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="<?=ROOT?>" class="logo">
                        <img src="img/logo.png" width="75" height="35" alt="Porto Admin" />
                    </a>

                    <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                    </div>

                </div>

                <!-- start: search & user box -->
                <div class="header-right">

                    <form action="pages-search-results.html" class="search nav-form">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                            <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
                        </div>
                    </form>

                    <span class="separator"></span>

                    <ul class="notifications">
                        <li>
                            <a href="#" class="dropdown-toggle notification-icon" data-bs-toggle="dropdown">
                                <i class="bx bx-list-ol"></i>
                                <span class="badge">3</span>
                            </a>

                            <div class="dropdown-menu notification-menu large">
                                <div class="notification-title">
                                    <span class="float-end badge badge-default">3</span>
                                    Tasks
                                </div>

                                <div class="content">
                                    <ul>
                                        <li>
                                            <p class="clearfix mb-1">
                                                <span class="message float-start">Generating Sales Report</span>
                                                <span class="message float-end text-dark">60%</span>
                                            </p>
                                            <div class="progress progress-xs light">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <p class="clearfix mb-1">
                                                <span class="message float-start">Importing Contacts</span>
                                                <span class="message float-end text-dark">98%</span>
                                            </p>
                                            <div class="progress progress-xs light">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <p class="clearfix mb-1">
                                                <span class="message float-start">Uploading something big</span>
                                                <span class="message float-end text-dark">33%</span>
                                            </p>
                                            <div class="progress progress-xs light mb-1">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle notification-icon" data-bs-toggle="dropdown">
                                <i class="bx bx-envelope"></i>
                                <span class="badge">4</span>
                            </a>

                            <div class="dropdown-menu notification-menu">
                                <div class="notification-title">
                                    <span class="float-end badge badge-default">230</span>
                                    Messages
                                </div>

                                <div class="content">
                                    <ul>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="img/!sample-user.jpg" alt="Joseph Doe Junior" class="rounded-circle" />
                                                </figure>
                                                <span class="title">Joseph Doe</span>
                                                <span class="message">Lorem ipsum dolor sit.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="img/!sample-user.jpg" alt="Joseph Junior" class="rounded-circle" />
                                                </figure>
                                                <span class="title">Joseph Junior</span>
                                                <span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="img/!sample-user.jpg" alt="Joe Junior" class="rounded-circle" />
                                                </figure>
                                                <span class="title">Joe Junior</span>
                                                <span class="message">Lorem ipsum dolor sit.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="img/!sample-user.jpg" alt="Joseph Junior" class="rounded-circle" />
                                                </figure>
                                                <span class="title">Joseph Junior</span>
                                                <span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <hr />

                                    <div class="text-end">
                                        <a href="#" class="view-more">View All</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle notification-icon" data-bs-toggle="dropdown">
                                <i class="bx bx-bell"></i>
                                <span class="badge">3</span>
                            </a>

                            <div class="dropdown-menu notification-menu">
                                <div class="notification-title">
                                    <span class="float-end badge badge-default">3</span>
                                    Alerts
                                </div>

                                <div class="content">
                                    <ul>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="fas fa-thumbs-down bg-danger text-light"></i>
                                                </div>
                                                <span class="title">Server is Down!</span>
                                                <span class="message">Just now</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="bx bx-lock bg-warning text-light"></i>
                                                </div>
                                                <span class="title">User Locked</span>
                                                <span class="message">15 minutes ago</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="fas fa-signal bg-success text-light"></i>
                                                </div>
                                                <span class="title">Connection Restaured</span>
                                                <span class="message">10/10/2023</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <hr />

                                    <div class="text-end">
                                        <a href="#" class="view-more">View All</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <span class="separator"></span>

                    <div id="userbox" class="userbox">
                        <a href="#" data-bs-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="img/!logged-user.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
                            </figure>
                            <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@comnpany.com">
                                <span class="name">John Doe Junior</span>
                                <span class="role">Administrator</span>
                            </div>

                            <i class="fa custom-caret"></i>
                        </a>

                        <div class="dropdown-menu">
                            <ul class="list-unstyled mb-2">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="bx bx-user-circle"></i> My Profile</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="bx bx-lock"></i> Lock Screen</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="bx bx-power-off"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Navigation
                        </div>
                        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>

                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">

                                <ul class="nav nav-main">
                                    <li>
                                        <a class="nav-link" href="layouts-default.html">
                                            <i class="bx bx-home-alt" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>                        
                                    </li>
                            </div>
                        </div>

                        <script>
                            // Maintain Scroll Position
                            if (typeof localStorage !== 'undefined') {
                                if (localStorage.getItem('sidebar-left-position') !== null) {
                                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                                    sidebarLeft.scrollTop = initialPosition;
                                }
                            }
                        </script>

                    </div>

                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body card-margin">
                    <header class="page-header">
                        <h2>Advanced Forms</h2>

                        <div class="right-wrapper text-end">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">
                                        <i class="bx bx-home-alt"></i>
                                    </a>
                                </li>

                                <li><span>Forms</span></li>

                                <li><span>Advanced</span></li>

                            </ol>

                            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </header>

                    <!-- start: page -->
                        <form action="<?= ROOT ?>users/add" method="post">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Create New User</h2>
        </header>
        <div class="card-body">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-bs-toggle="tab">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#account" data-bs-toggle="tab">Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="#organization" data-bs-toggle="tab">Organization</a></li>
                    <li class="nav-item"><a class="nav-link" href="#memberof" data-bs-toggle="tab">Member Of</a></li>
                </ul>
                <div class="tab-content pt-3">

                    <!-- General -->
                    <div id="general" class="tab-pane active">
                        <div class="form-group mb-3">
                            <label>First Name</label>
                            <input type="text" name="givenName" class="form-control" required />
                        </div>
                        <div class="form-group mb-3">
                            <label>Last Name</label>
                            <input type="text" name="sn" class="form-control" required />
                        </div>
                        <div class="form-group mb-2">
                            <label>Display Name</label>
                            <input type="text" name="displayName" class="form-control" readonly />
                        </div>
                        <?php if (ADMIN_CAN_OVERRIDE_DISPLAY_NAME): ?>
                        <div class="form-check mb-3">
                            <input type="checkbox" id="overrideDisplay" class="form-check-input">
                            <label for="overrideDisplay" class="form-check-label">Edit display name manually</label>
                        </div>
                        <?php endif; ?>
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" />
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="mail" class="form-control" />
                        </div>
                    </div>

                    <!-- Account -->
                    <div id="account" class="tab-pane">
                        <div class="form-group mb-3">
                            <label>Username (sAMAccountName)</label>
                            <input type="text" name="username" class="form-control" required />
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required />
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" name="must_change_pw" class="form-check-input" id="mustChange">
                            <label class="form-check-label" for="mustChange">User must change password at next login</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" name="pw_never_expires" class="form-check-input" id="neverExpires">
                            <label class="form-check-label" for="neverExpires">Password never expires</label>
                        </div>
                    </div>

                    <!-- Organization -->
                    <div id="organization" class="tab-pane">
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" />
                        </div>
                        <div class="form-group mb-3">
                            <label>Department</label>
                            <input type="text" name="department" class="form-control" />
                        </div>
                        <div class="form-group mb-3">
                            <label>Company</label>
                            <input type="text" name="company" class="form-control" />
                        </div>
                        <div class="form-group row mb-3">
                            <label>Manager</label>
                            <select name="manager" class="form-control select2">
                                <option value="">-- None --</option>
                                <?php foreach ($data['all_users'] as $user): ?>
                                    <option value="<?= $user->getDn() ?>">
                                        <?= $user->getFirstAttribute('cn') ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                            <small id="manager-preview" class="text-muted"></small>
                    </div>

                    <!-- Member Of -->
                    <div id="memberof" class="tab-pane">
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Group Memberships</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="groups[]" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200, "enableCaseInsensitiveFiltering": true }' id="ms_example6">
                                    <?php foreach ($data['all_groups'] as $group): ?>
                                    <option value="<?= $group->getDn() ?>">
                                        <?= $group->getFirstAttribute('cn') ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div> <!-- .tab-content -->
            </div>
        </div>

        <footer class="card-footer text-end">
            <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Create User</button>
        </footer>
    <?php if (!empty($data['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($data['error']) ?></div>
<?php endif; ?>

<?php if (!empty($data['success'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($data['success']) ?></div>
<?php endif; ?>
</form>
                    <!-- end: page -->
                </section>
            </div>

            <aside id="sidebar-right" class="sidebar-right">
                <div class="nano">
                    <div class="nano-content">
                        <a href="#" class="mobile-close d-md-none">
                            Collapse <i class="fas fa-chevron-right"></i>
                        </a>

                        <div class="sidebar-right-wrapper">

                            <div class="sidebar-widget widget-calendar">
                                <h6>Upcoming Tasks</h6>
                                <div data-plugin-datepicker data-plugin-skin="dark"></div>

                                <ul>
                                    <li>
                                        <time datetime="2023-04-19T00:00+00:00">04/19/2023</time>
                                        <span>Company Meeting</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="sidebar-widget widget-friends">
                                <h6>Friends</h6>
                                <ul>
                                    <li class="status-online">
                                        <figure class="profile-picture">
                                            <img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                        </figure>
                                        <div class="profile-info">
                                            <span class="name">Joseph Doe Junior</span>
                                            <span class="title">Hey, how are you?</span>
                                        </div>
                                    </li>
                                    <li class="status-online">
                                        <figure class="profile-picture">
                                            <img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                        </figure>
                                        <div class="profile-info">
                                            <span class="name">Joseph Doe Junior</span>
                                            <span class="title">Hey, how are you?</span>
                                        </div>
                                    </li>
                                    <li class="status-offline">
                                        <figure class="profile-picture">
                                            <img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                        </figure>
                                        <div class="profile-info">
                                            <span class="name">Joseph Doe Junior</span>
                                            <span class="title">Hey, how are you?</span>
                                        </div>
                                    </li>
                                    <li class="status-offline">
                                        <figure class="profile-picture">
                                            <img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                        </figure>
                                        <div class="profile-info">
                                            <span class="name">Joseph Doe Junior</span>
                                            <span class="title">Hey, how are you?</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </aside>
        </section>

        <!-- Vendor -->
        <script src="<?=ASSETS?>vendor/jquery/jquery.js"></script>
        <script src="<?=ASSETS?>vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="<?=ASSETS?>vendor/popper/umd/popper.min.js"></script>
        <script src="<?=ASSETS?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?=ASSETS?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?=ASSETS?>vendor/common/common.js"></script>
        <script src="<?=ASSETS?>vendor/nanoscroller/nanoscroller.js"></script>
        <script src="<?=ASSETS?>vendor/magnific-popup/jquery.magnific-popup.js"></script>
        <script src="<?=ASSETS?>vendor/jquery-placeholder/jquery.placeholder.js"></script>

        <!-- Specific Page Vendor -->
        <script src="<?=ASSETS?>vendor/jquery-ui/jquery-ui.js"></script>
        <script src="<?=ASSETS?>vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
        <script src="<?=ASSETS?>vendor/select2/js/select2.js"></script>
        <script src="<?=ASSETS?>vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
        <script src="<?=ASSETS?>vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
        <script src="<?=ASSETS?>vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
        <script src="<?=ASSETS?>vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
        <script src="<?=ASSETS?>vendor/fuelux/js/spinner.js"></script>
        <script src="<?=ASSETS?>vendor/dropzone/dropzone.js"></script>
        <script src="<?=ASSETS?>vendor/bootstrap-markdown/js/markdown.js"></script>
        <script src="<?=ASSETS?>vendor/bootstrap-markdown/js/to-markdown.js"></script>
        <script src="<?=ASSETS?>vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
        <script src="<?=ASSETS?>vendor/summernote/summernote-bs4.js"></script>
        <script src="<?=ASSETS?>vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
        <script src="<?=ASSETS?>vendor/ios7-switch/ios7-switch.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="<?=ASSETS?>js/theme.js"></script>

        <!-- Theme Custom -->
        <script src="<?=ASSETS?>js/custom.js"></script>
        <script src="<?=ASSETS?>js/pages/users-add-enhanced.js"></script>

        <!-- Theme Initialization Files -->
        <script src="<?=ASSETS?>js/theme.init.js"></script>

        <!-- Examples -->
        <script src="<?=ASSETS?>js/examples/examples.advanced.form.js"></script>

    </body>
</html>