                    <header class="page-header">
                        <h2>Dashboard</h2>

                        <div class="right-wrapper text-end">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?=ROOT?>">
                                        <i class="bx bx-home-alt"></i>
                                    </a>
                                </li>

                                <li><span>Dashboard</span></li>

                            </ol>

                            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="row">
                        <div class="col-md-12">
                            <section class="card mb-4">
                                <header class="card-header">
                                    <div class="card-actions">
                                        <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                                    </div>

                                    <h2 class="card-title">AD Panel: Active Directory Dashboard</h2>
                                </header>
                                <div class="card-body">
                                    <strong>Bind Status:</strong> <?= $data['bind_status'] ?>
                                <br />
                                    <?php
                                        $host = LDAP_CONFIG['hosts'][0];
                                        $port = 636;

                                        $ldapsCheck = @fsockopen($host, $port, $errno, $errstr, 3);

                                        if (!$ldapsCheck) {
                                            $ldapsMessage = "❌ LDAPS not available ($errstr)";
                                        } else {
                                            $ldapsMessage = "✅ LDAPS is available!";
                                            fclose($ldapsCheck);
                                        }
                                    ?>
                                    <strong>LDAPS Status:</strong> <?= $ldapsMessage ?>
                                    <br />
                                    <?php
                                        $port = 389;
                                        $socket = @fsockopen($host, $port, $errno, $errstr, 3);

                                        if ($socket && function_exists('ldap_start_tls')) {
                                            $conn = ldap_connect($host, $port);
                                            ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
                                            $bind = @ldap_bind($conn, LDAP_CONFIG['username'], LDAP_CONFIG['password']);

                                            if ($bind && @ldap_start_tls($conn)) {
                                                $tlsMessage = "✅ StartTLS is supported!";
                                            } else {
                                                $tlsMessage = "❌ StartTLS not supported.";
                                            }

                                            ldap_unbind($conn);
                                        }
                                    ?>
                                    <strong>TLS Status:</strong> <?= $tlsMessage ?>
                                    <br />
                                    <?php
                                    $conn = ldap_connect($host, 636);
                                    ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
                                    ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);

                                    if (@ldap_bind($conn, $bindUser, $bindPass)) {
                                        $ldapsBindMessage = "✅ LDAPS bind succeeded!";
                                    } else {
                                        $ldapsBindMessage = "❌ LDAPS bind failed: " . ldap_error($conn);
                                    }
                                    ?>
                                    <strong>LDAPS Bind Status:</strong> <?= $ldapsBindMessage ?>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row mb-3">
                            <?php
                            $cards1 = [
                                ['Users', $data['users'], 'primary', 'fa-user', ROOT .'users'],
                                ['Computers', $data['computers'], 'success', 'fa-computer', '#'],
                                ['Groups', $data['groups'], 'quaternary', 'fa-users-rectangle', '#'],
                                ['Organizational Units', $data['ous'], 'info', 'fa-puzzle-piece', '#']
                            ];

                            foreach ($cards1 as [$label1, $count1, $color1, $icon1, $link1]) {
                                echo <<<HTML
                                    <div class="col-xl-6">
                                        <section class="card card-featured-left card-featured-$color1 mb-3">
                                            <div class="card-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-$color1">
                                                            <i class="fas $icon1"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">$label1</h4>
                                                            <div class="info">
                                                                <strong class="amount">$count1</strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a class="text-muted text-uppercase" href="$link1">(view)</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                HTML;
                            }
                            ?>
                        </div>
                    </div>
                    
                        <div class="col-lg-6">
                            <div class="row mb-3">

                            <?php
                            $cards2 = [
                                ['Password Never Expires', $data['never_expires'], 'dark', 'fa-award', '#'],
                                ['Disabled Accounts', $data['disabled'], 'danger', 'fa-user-slash', '#'],
                                ['Locked Out Users', $data['locked_out'], 'secondary', 'fa-user-lock', '#'],
                                ['Recent Searches', $data['recent_searches'], 'tertiary', 'fa-magnifying-glass', '#']
                            ];

                            foreach ($cards2 as [$label2, $count2, $color2, $icon2, $link2]) {
                                echo <<<HTML
                                    <div class="col-xl-6">
                                        <section class="card card-featured-left card-featured-$color2 mb-3">
                                            <div class="card-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-$color2">
                                                            <i class="fas $icon2"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">$label2</h4>
                                                            <div class="info">
                                                                <strong class="amount">$count2</strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a class="text-muted text-uppercase" href="$link2">(statement)</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                HTML;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <section class="card card-featured-left card-featured-secondary mb-3">
                            <div class="card-body">
                                <h4 class="card-title">Accounts Enabled vs Disabled</h4>
                                <p><strong>Enabled:</strong> <?= $data['enabled_accounts'] ?></p>
                                <p><strong>Disabled:</strong> <?= $data['disabled'] ?></p>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-6">
                        <section class="card card-featured-left card-featured-tertiary mb-3">
                            <div class="card-body">
                                <h4 class="card-title">New Users This Week</h4>
                                <p><strong><?= $data['created_this_week'] ?></strong> accounts created</p>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <section class="card">
                            <header class="card-header">
                                <h2 class="card-title">Last Sync</h2>
                            </header>
                            <div class="card-body">
                                <?= $data['sync_time'] ?>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-6">
                        <section class="card">
                            <header class="card-header">
                                <h2 class="card-title">Admin Notes</h2>
                            </header>
                            <div class="card-body">
                                <p><?= nl2br(htmlspecialchars($data['admin_notes'])) ?></p>
                            </div>
                        </section>
                    </div>
                </div>


                    <!-- end: page -->
                </section>
            </div>
