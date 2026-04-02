<header class="page-header">
    <h2><?= $data['page_title'] ?></h2>

    <div class="right-wrapper text-end">
        <ol class="breadcrumbs">
            <li><a href="<?= ROOT ?>"><i class="bx bx-home-alt"></i></a></li>
            <li><span>Users</span></li>
            <li><span>Test Add</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
						<form class="ecommerce-form action-buttons-fixed" action="<?= ROOT ?>users/add" method="post">

						<div class="row">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bx-user-plus"></i>
												<h2 class="card-big-info-title">Add User</h2>
												<p class="card-big-info-desc">This form is to create a user with basic information. Once this process has completed, you will be redirected to another form to enter more essential information.</p>
												<p class="card-big-info-desc">You can find a link in the menu for more advanced attribute editing after this user is created.</p>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<?php if (!empty($data['error'])): ?>
											    	<div class="alert alert-danger fade show" role="alert"><?= htmlspecialchars($data['error']) ?></div>
												<?php endif; ?>

												<?php if (!empty($data['success'])): ?>
												    <div class="alert alert-success fade show" role="alert"><?= htmlspecialchars($data['success']) ?></div>
												<?php endif; ?>
														
													<div class="form-group row align-items-center pb-3">
														<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">First Name</label>
														<div class="col-lg-7 col-xl-6">
															<input type="text" name="givenName" class="form-control <?= fieldClass('givenName', $data) ?>" value="<?= fieldValue('givenName', $data) ?>" required />
	                               							 <?= fieldError('givenName', $data) ?>
																<label for="First Name" class="text-muted">Enter the new user's <strong>first</strong> name.</label>
														</div>
													</div>
														
													<div class="form-group row align-items-center pb-3">
														<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Last Name</label>
														<div class="col-lg-7 col-xl-6">
															<input type="text" name="sn" class="form-control <?= fieldClass('sn', $data) ?>" value="<?= fieldValue('sn', $data) ?>" required />
	                                						<?= fieldError('sn', $data) ?>
																<label for="Last Name" class="text-muted">Enter the new user's <strong>last</strong> name.</label>
														</div>
													</div>
														
													<div class="form-group row align-items-center pb-3">
														<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Display Name</label>
														<div class="col-lg-7 col-xl-6">
															<input type="text" name="displayName" class="form-control" readonly value="<?= fieldValue('displayName', $data) ?>" />
	                                						<?= fieldError('sn', $data) ?>
																<label for="Display Name" class="text-muted">This will be the new user's display name.</label>
														</div>
													</div>

													<div class="form-group row pb-3">
														<label class="col-sm-3 control-label text-sm-end pt-2">Edit Display Name Manually</label>
														<div class="col-sm-9">
															<div class="switch switch-sm switch-primary disabled">
																<input type="checkbox" id="overrideDisplay" class="form-check-input" data-plugin-ios-switch />
																<label class="form-check-label text-muted" for="overrideDisplay">Edit display name manually</label>
															</div>
														</div>
													</div>

													<div class="form-group row pb-3">
													<label class="col-lg-3 control-label text-lg-end pt-2">Username</label>
													<div class="col-lg-6">
														<div class="input-daterange input-group">
															<span class="input-group-text">
																<i class="fas fa-signature"></i>
															</span>
															<input type="text" name="username" class="form-control <?= fieldClass('username', $data) ?>" value="<?= fieldValue('username', $data) ?>" required />
	                        						        <?= fieldError('username', $data) ?>
															<span class="input-group-text border-start-0 border-end-0 rounded-0">
																&#64;
															</span>
															<select name="user_domain" class="form-control">
															    <option value="adtest.local" selected>adtest.local</option>
															    <option value="company.com">company.com</option>
															    <!-- Add more domains here manually for now -->
															</select>
														</div>
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
						                                <div class="form-check switch switch-sm switch-primary disabled">
						                                    <input type="checkbox" name="must_change_pw" class="form-check-input" id="mustChange" data-plugin-ios-switch
						                                        <?= isset($data['form']['must_change_pw']) ? 'checked' : '' ?>>
						                                    <label class="form-check-label" for="mustChange">User must change password at next login</label>
						                                </div><br />
						                                <div class="form-check mt-2 switch switch-sm switch-primary disabled">
						                                    <input type="checkbox" name="pw_never_expires" class="form-check-input" id="neverExpires" data-plugin-ios-switch
						                                        <?= isset($data['form']['pw_never_expires']) ? 'checked' : '' ?>>
						                                    <label class="form-check-label" for="neverExpires">Password never expires</label>
						                                </div>
						                            </div>
						                        </div>

												<div class="form-group row pb-3">
													<label class="col-lg-3 control-label text-lg-end pt-2">Organizational Unit </label>
													<div class="col-lg-6">
														<?php /*<select data-plugin-selectTwo class="form-control populate placeholder" name="blog_layout" data-plugin-options='{ "placeholder": "Select a Front Page Layout", "allowClear": false }'>*/ ?>
														<select name="user_ou" class="form-control" <?= LOCK_USER_OU ? 'disabled' : '' ?>>
						                                    <?php
						                                    $selectedOu = $data['form']['user_ou'] ?? DEFAULT_USER_OU;
						                                    foreach ($data['all_ous'] as $ou):
						                                        $dn = $ou->getDn();
						                                        $label = $ou->getFirstAttribute('ou') ?? $ou->getFirstAttribute('name') ?? $dn;
						                                        $isSelected = ($dn === $selectedOu) ? 'selected' : '';
						                                    ?>
						                                        <option value="<?= $dn ?>" <?= $isSelected ?>><?= htmlspecialchars($label) ?></option>
						                                    <?php endforeach; ?>
						                                </select>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>

						<div class="row mt-4">
							<div class="col-md-6">
								<section class="card mb-4">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>

										<h2 class="card-title">Title</h2>
										<p class="card-subtitle">Subtitle</p>
									</header>
									<div class="card-body">
										Content.
						                <?php
						                	echo "<h4>Form Output When Submitted:<br />(isset(\$_POST))</h4>";
						                    
						                    if(!isset($_POST['data']))
						                    {
						                        echo "<p>Not posted yet.</p>";
						                    }
						                    else
						                    {
						                        echo "<code>";
						                        show($_POST);
						                        echo "</code><br />";
						                        //show($data);
						                    }
						                ?>
					                </div>
								</section>
							</div>
						</div>
							<div class="row action-buttons">
								<div class="col-12 col-md-auto">
									<button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
										<i class="bx bx-save text-4 me-2"></i> Create User
									</button>
								</div>
								<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
									<a href="<?=ROOT?>dashboard" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
								</div>
															</div>
						</form>
					<!-- end: page -->