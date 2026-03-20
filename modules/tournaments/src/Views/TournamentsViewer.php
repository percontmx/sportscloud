<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
<p>Torneos y Ligas</p>
<p>Nombre: <?= $tournament->name ?></p>
<p>Estado: <?= $tournament->deleted_at ? 'Inactivo' : 'Activo' ?></p>
<?= $this->endSection() ?>

