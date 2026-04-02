<header class="page-header">
    <h2><?= $data['page_title'] ?></h2>

    <div class="right-wrapper text-end">
        <ol class="breadcrumbs">
            <li><a href="<?= ROOT ?>"><i class="bx bx-home-alt"></i></a></li>
            <li><span>Users</span></li>
            <li><span>List</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
    </div>
</header>

<section class="card">
    <header class="card-header">
        <h2 class="card-title">Active Directory Users</h2>
    </header>
    <div class="card-body">
        <form method="get" class="mb-3">
            <div class="row align-items-end">
                <div class="col-md-4">
                    <label for="ouSelect">Select Organizational Unit:</label>
                    <select name="ou" id="ouSelect" class="form-control" onchange="this.form.submit()">
                        <option value="">All OUs</option>
                        <?php foreach ($data['ous'] as $ou): ?>
                            <?php $dn = $ou->getDn(); ?>
                            <option value="<?= htmlspecialchars($dn) ?>" <?= ($data['selected_ou'] == $dn) ? 'selected' : '' ?>>
                                <?= $ou->getFirstAttribute('name') ?: $dn ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </form>
        <table class="table table-bordered table-striped mb-0" id="datatable-users">
            <thead>
                <tr>
                    <th>Display Name</th>
                    <th>Logon Name</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Manager</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data['users']) && !isset($data['users']['error'])): ?>
                    <?php foreach ($data['users'] as $user): ?>
                    <tr class="<?= ($data['created_user_dn'] === urlencode($user->getDn())) ? 'table-success' : '' ?>">
                        <td><?= $user->getFirstAttribute('displayName') ?: $user->getFirstAttribute('cn') ?: 'Unknown' ?></td>
                        <td><?= $user->getFirstAttribute('userPrincipalName') ?></td>
                        <td><?= $user->getFirstAttribute('title') ?></td>
                        <td><?= $user->getFirstAttribute('department') ?></td>
                        <td>
                            <?php
                                $managerDn = $user->getFirstAttribute('manager');
                                if ($managerDn) {
                                    try {
                                        $manager = \LdapRecord\Models\ActiveDirectory\User::find($managerDn);
                                        echo $manager->getFirstAttribute('displayName') ?? 'Unknown';
                                    } catch (Exception $e) {
                                        echo 'Error';
                                    }
                                } else {
                                    echo '-';
                                }
                            ?>
                        </td>
                        <td>
                            <a href="<?= ROOT ?>users/edit?dn=<?= urlencode($user->getDn()) ?>" class="btn btn-sm btn-primary">Edit</a>

                            <?php if (!in_array($user->getFirstAttribute('cn'), PROTECTED_AD_ACCOUNTS)): ?>
                                <a href="<?= ROOT ?>users/delete?dn=<?= urlencode($user->getDn()) ?>" class="btn btn-sm btn-danger">Delete</a>
                            <?php else: ?>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" title="System Protection Service" data-bs-content="To protect the system against failure, this account cannot be deleted. You can click the button again to close this message.">Delete</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6">No users found or error retrieving users.</td></tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</section>
