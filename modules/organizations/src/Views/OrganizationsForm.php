<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
<form action="/organizations" method="post">
    <div>
        <label for="full_name"><?= lang('Organizations.Fields.FullName') ?>: </label>
        <input type="text" id="full_name" name="full_name" required>
    </div>
    <div>
        <label for="short_name"><?= lang('Organizations.Fields.ShortName') ?>: </label>
        <input type="text" id="short_name" name="short_name" required>
    </div>
    <div>
        <button type="submit"><?= lang('Organizations.Actions.Create') ?></button>
    </div>
</form>
<?= $this->endSection() ?>
