<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
<form action="/organizations" method="post">
    <div>
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>
    </div>
    <div>
        <label for="short_name">Short Name:</label>
        <input type="text" id="short_name" name="short_name" required>
    </div>
    <div>
        <button type="submit">Create Organization</button>
    </div>
</form>
<?= $this->endSection() ?>
