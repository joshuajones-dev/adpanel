<div class="form-group row pb-3">
    <label class="col-lg-3 control-label text-lg-end pt-2">Group Memberships</label>
    <div class="col-lg-6">
        <select name="groups[]" multiple="multiple" class="form-control" data-plugin-multiselect data-plugin-options='{ "enableCaseInsensitiveFiltering": true, "maxHeight": 200 }'>
            <?php
            $preselectedGroups = $data['form']['groups'] ?? DEFAULT_AD_GROUPS;
            foreach ($data['all_groups'] as $group):
                $groupDn = $group->getDn();
                $groupCn = $group->getFirstAttribute('cn');
                $selected = in_array($groupDn, $preselectedGroups) ? 'selected' : '';
            ?>
                <option value="<?= $groupDn ?>" <?= $selected ?>><?= $groupCn ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
