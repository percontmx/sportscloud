<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<?php if (isset($editions)) : ?>
    <h1>Editions for tournament: <?= $tournament->name ?></h1>
    <?php if (empty($editions)) : ?>
        <p>No editions found for this tournament.</p>
    <?php else : ?>
        <ul>
            <?php foreach ($editions as $pepe) : ?>
                <li><?= $pepe->name ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endif; ?>
<?= $this->endSection() ?>
