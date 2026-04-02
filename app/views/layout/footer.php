
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

        <!-- Theme Initialization Files -->
        <script src="<?=ASSETS?>js/theme.init.js"></script>

        <!-- Examples -->
        <script src="<?=ASSETS?>js/examples/examples.dashboard.js"></script>
        <script src="<?=ASSETS?>js/examples/examples.header.menu.js"></script>
        <script src="<?=ASSETS?>js/examples/examples.ecommerce.dashboard.js"></script>
        <script src="<?=ASSETS?>js/examples/examples.ecommerce.datatables.list.js"></script>
        <script src="<?=ASSETS?>js/examples/examples.datatables.default.js"></script>
        <script src="<?=ASSETS?>js/examples/examples.datatables.row.with.details.js"></script>
        <script src="<?=ASSETS?>js/examples/examples.datatables.tabletools.js"></script>


        <script src="<?=ASSETS?>js/examples/examples.modals.js"></script>

        <!-- Specific Page Vendor -->
        <?php if (!empty($data['scripts'])): ?>
            <?php foreach ($data['scripts'] as $src): ?>
                <script src="<?=ASSETS?><?= $src ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>

        <script type="text/javascript">
            const overrideCheckbox = document.getElementById('overrideDisplay');
            if (overrideCheckbox) {
                overrideCheckbox.addEventListener('change', function () {
                    displayNameInput.readOnly = !this.checked;
                    updateDisplayName(); // sync again if toggled off
                });
            }
        </script>
