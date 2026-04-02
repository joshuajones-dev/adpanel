<div class="form-group row pb-3">
    <label class="col-lg-3 control-label text-lg-end pt-2">Title</label>
    <div class="col-lg-6">
        <input type="text" name="title" class="form-control <?= fieldClass('title', $data) ?>" value="<?= fieldValue('title', $data) ?>" />
    </div>
</div>

<div class="form-group row pb-3">
    <label class="col-lg-3 control-label text-lg-end pt-2">Department</label>
    <div class="col-lg-6">
        <input type="text" name="department" class="form-control <?= fieldClass('department', $data) ?>" value="<?= fieldValue('department', $data) ?>" />
    </div>
</div>

<div class="form-group row pb-3">
    <label class="col-lg-3 control-label text-lg-end pt-2">Company</label>
    <div class="col-lg-6">
        <input type="text" name="company" class="form-control <?= fieldClass('company', $data) ?>" value="<?= fieldValue('company', $data) ?>" />
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
