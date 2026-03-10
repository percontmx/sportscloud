<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addManagerModal">
  <?= lang('OrganizationManagers.Actions.AddManager') ?>
</button>
<div class="modal" id="addManagerModal">
    <div class="modal-dialog">
        <div class="modal-content">
<form action="<?= base_url("organizations/{$organizationId}/managers") ?>" method="POST">
    <label for="user" class="form-label"><?= lang('OrganizationManagers.Fields.User') ?></label>

    <input type="text" class="form-control" id="user" name="user" required />
    <button type="submit" class="btn btn-primary"><?= lang('OrganizationManagers.Actions.AddManager') ?></button>
</form>
</div>
</div>
</div>