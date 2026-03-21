<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Competiciones</h1>
        <a href="<?= base_url('competitions/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nueva competición
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Organización</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($competitions)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-4">
                                No hay competiciones disponibles
                            </td>
                        </tr>
                    <?php else: ?>
                    <?php foreach ($competitions as $t): ?>
                        <tr>
                            <td>
                                <strong><?= $t->name ?></strong>
                            </td>
                            <td>
                                <span class="badge bg-secondary">Organización: <?= $t->organization_id ?></span>
                            </td>
                            <td>
                                <span class="badge <?= $t->isActive() ? 'bg-success' : 'bg-danger' ?>">
                                    <?= $t->isActive() ? 'Activo' : 'Inactivo' ?>
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="<?= base_url("competitions/{$t->id}") ?>" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>



