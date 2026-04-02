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
				                    <li<?php echo (isset($data['page']) && $data['page'] == "dash") ? ' class="nav-active"' : ''; ?>>
				                        <a class="nav-link" href="<?=ROOT?>dashboard">
				                            <i class="bx bx-home-alt" aria-hidden="true"></i>
				                            <span>Dashboard</span>
				                        </a>                        
				                    </li>
				                    <li class="nav-parent <?= (isset($data['page']) && $data['page'] === 'users') ? 'nav-expanded nav-active' : '' ?>">
									    <a class="nav-link" href="#">
									        <i class="bx bx-user" aria-hidden="true"></i>
									        <span>Users</span>
									    </a>
									    <ul class="nav nav-children">
									        <li class="<?= (isset($data['subpage']) && $data['subpage'] === 'list') ? 'nav-active' : '' ?>">
									            <a class="nav-link" href="<?= ROOT ?>users">User List</a>
									        </li>
									        <li class="<?= (isset($data['subpage']) && $data['subpage'] === 'add') ? 'nav-active' : '' ?>">
									            <a class="nav-link" href="<?= ROOT ?>users/add">Add User</a>
									        </li>
									        <li class="<?= (isset($data['subpage']) && $data['subpage'] === 'edit') ? 'nav-active' : '' ?>">
									            <a class="nav-link" href="<?= ROOT ?>users/edit">Edit User</a>
									        </li>
									    </ul>
									</li>

				                </ul>
				            </nav>

				            <hr class="separator" />

				            <div class="sidebar-widget widget-tasks">
				                <div class="widget-header">
				                    <h6>Projects</h6>
				                    <div class="widget-toggle">+</div>
				                </div>
				                <div class="widget-content">
				                    <ul class="list-unstyled m-0">
				                        <li><a href="#">Porto HTML5 Template</a></li>
				                        <li><a href="#">Tucson Template</a></li>
				                        <li><a href="#">Porto Admin</a></li>
				                    </ul>
				                </div>
				            </div>

				            <hr class="separator" />
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