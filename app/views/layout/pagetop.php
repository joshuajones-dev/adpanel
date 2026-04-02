<!doctype html>
<html lang="en" class="fixed" oncontextmenu="return false">
    <head>
        <!-- Basic -->
        <meta charset="UTF-8">
        <title><?=$data['page_title'] . WEBSITE_TITLE?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <meta name="keywords" content="Active Directory LDAP Administration" />
        <meta name="description" content="AD Panel - A way to administer Active Directory over LDAP">
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

        <!-- Specific Page Vendor -->
        <?php if (!empty($data['css'])): ?>
            <?php foreach ($data['css'] as $css_src): ?>
                <link rel="stylesheet" href="<?=ASSETS?><?= $css_src ?>" />
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?=ASSETS?>css/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?=ASSETS?>css/skins/default.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?=ASSETS?>css/custom.css">

        <!-- Head Libs -->
        <script src="<?=ASSETS?>vendor/modernizr/modernizr.js"></script>

    </head>