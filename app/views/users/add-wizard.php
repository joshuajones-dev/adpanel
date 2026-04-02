<style>
.select2-container .select2-results__options {
    max-height: 200px;
    overflow-y: auto;
}
</style>

<header class="page-header">
    <h2><?= $data['page_title'] ?></h2>

    <div class="right-wrapper text-end">
        <ol class="breadcrumbs">
            <li><a href="<?= ROOT ?>"><i class="bx bx-home-alt"></i></a></li>
            <li><span>Users</span></li>
            <li><span>Add</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
    </div>
</header>

<form action="<?= ROOT ?>users/add" method="post" id="add-user-form">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Create New User</h2>
        </header>

        <div class="card-body">
            <div id="userWizard" class="smartwizard smartwizard-theme-dots">
                <ul>
                    <li><a href="#step-1">General</a></li>
                    <li><a href="#step-2">Account</a></li>
                    <li><a href="#step-3">Organization</a></li>
                    <li><a href="#step-4">Groups</a></li>
                </ul>

                <div>
                    <!-- Step 1: General -->
                    <div id="step-1">
                        <?php //include 'users/wizard/general.php'; ?>
                        <?php $this->view('users/wizard/general', $data); ?>
                    </div>

                    <!-- Step 2: Account -->
                    <div id="step-2">
                        <?php //include 'users/wizard/account.php'; ?>
                        <?php $this->view('users/wizard/account', $data); ?>
                    </div>

                    <!-- Step 3: Organization -->
                    <div id="step-3">
                        <?php //include 'users/wizard/organization.php'; ?>
                        <?php $this->view('users/wizard/organization', $data); ?>
                    </div>

                    <!-- Step 4: Groups -->
                    <div id="step-4">
                        <?php //include 'users/wizard/groups.php'; ?>
                        <?php $this->view('users/wizard/groups', $data); ?>
                    </div>
                </div>
            </div>
        </div>

        <footer class="card-footer text-end">
            <button type="submit" class="btn btn-primary d-none" id="submit-btn">
                <i class="fas fa-user-plus"></i> Create User
            </button>
        </footer>
    </section>
</form>

