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
