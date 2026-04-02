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
