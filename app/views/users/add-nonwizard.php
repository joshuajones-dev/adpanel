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
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">First Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="givenName" class="form-control <?= fieldClass('givenName', $data) ?>" value="<?= fieldValue('givenName', $data) ?>" required />
                                <?= fieldError('givenName', $data) ?>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Last Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="sn" class="form-control <?= fieldClass('sn', $data) ?>" value="<?= fieldValue('sn', $data) ?>" required />
                                <?= fieldError('sn', $data) ?>
                            </div>
                        </div>
                        <div class="form-group row pb-2">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Display Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="displayName" class="form-control" readonly value="<?= fieldValue('displayName', $data) ?>" />
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="form-check">
                                    <input type="checkbox" id="overrideDisplay" class="form-check-input">
                                    <label class="form-check-label" for="overrideDisplay">Edit display name manually</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Description</label>
                            <div class="col-lg-6">
                                <input type="text" name="description" class="form-control <?= fieldClass('description', $data) ?>" value="<?= fieldValue('description', $data) ?>" />
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Email</label>
                            <div class="col-lg-6">
                                <input type="email" name="mail" class="form-control <?= fieldClass('mail', $data) ?>" value="<?= fieldValue('mail', $data) ?>" />
                                <?= fieldError('mail', $data) ?>
                            </div>
                        </div>
                    </div>


                    <!-- ACCOUNT TAB -->
                    <div id="account" class="tab-pane">
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Username (sAMAccountName)</label>
                            <div class="col-lg-6">
                                <input type="text" name="username" class="form-control <?= fieldClass('username', $data) ?>" value="<?= fieldValue('username', $data) ?>" required />
                                <?= fieldError('username', $data) ?>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Password</label>
                            <div class="col-lg-6">
                                <input type="password" name="password" class="form-control <?= fieldClass('password', $data) ?>" required />
                                <?= fieldError('password', $data) ?>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Confirm Password</label>
                            <div class="col-lg-6">
                                <input type="password" name="confirm_password" class="form-control <?= fieldClass('confirm_password', $data) ?>" required />
                                <?= fieldError('confirm_password', $data) ?>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="form-check">
                                    <input type="checkbox" name="must_change_pw" class="form-check-input" id="mustChange"
                                        <?= isset($data['form']['must_change_pw']) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="mustChange">User must change password at next login</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="pw_never_expires" class="form-check-input" id="neverExpires"
                                        <?= isset($data['form']['pw_never_expires']) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="neverExpires">Password never expires</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ORGANIZATION TAB -->
                    <div id="organization" class="tab-pane">
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Title</label>
                            <div class="col-lg-6">
                                <input type="text" name="title" class="form-control" value="<?= fieldValue('title', $data) ?>" />
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Department</label>
                            <div class="col-lg-6">
                                <input type="text" name="department" class="form-control" value="<?= fieldValue('department', $data) ?>" />
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Company</label>
                            <div class="col-lg-6">
                                <input type="text" name="company" class="form-control" value="<?= fieldValue('company', $data) ?>" />
                            </div>
                        </div>
                        <div class="form-group row pb-2">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Manager</label>
                            <div class="col-lg-6">
                                <select name="manager" class="form-control select2">
                                    <option value="">-- None --</option>
                                    <?php foreach ($data['all_users'] as $user): ?>
                                        <option value="<?= $user->getDn() ?>" <?= (isset($data['form']['manager']) && $data['form']['manager'] === $user->getDn()) ? 'selected' : '' ?>>
                                            <?= $user->getFirstAttribute('cn') ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <small id="manager-preview" class="text-muted mt-1 d-block"></small>
                            </div>
                        </div>
                    </div>

                    <!-- Member Of -->
                    <div id="memberof" class="tab-pane">
						<div class="form-group row pb-3">
							<label class="col-lg-3 control-label text-lg-end pt-2">Group Memberships</label>
							<div class="col-lg-6">
								<select class="form-control" name="groups[]" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200, "enableCaseInsensitiveFiltering": true }' id="ms_example6">
								<?php /*<select name="groups[]" class="form-control" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200, "buttonClass": "btn btn-link ps-0 pe-0" }' id="ms_example3">*/?>
                                <?php $preselectedGroups = $data['form']['groups'] ?? DEFAULT_AD_GROUPS; ?>
									<?php foreach ($data['all_groups'] as $group): ?>
						            <option value="<?= $group->getDn() ?>"<?= in_array($group->getDn(), $preselectedGroups) ? ' selected' : '' ?>>
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
    <button type="submit" class="btn btn-primary" id="submit-btn" disabled>
        <i class="fas fa-user-plus"></i> Create User
    </button>
</footer>

	<?php if (!empty($data['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($data['error']) ?></div>
<?php endif; ?>

<?php if (!empty($data['success'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($data['success']) ?></div>
<?php endif; ?>
</form>
