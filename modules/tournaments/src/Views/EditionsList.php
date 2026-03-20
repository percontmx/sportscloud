<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newEditionModal">
  Nuovo
</button>
<div class="modal" id="newEditionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <?= view_cell('Percontmx\SportsVibe\Tournaments\Cells\CompetitionEditionViewerCell', ['tournamentId' => $tournament->id]) ?>
        </div>
    </div>
</div>

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

