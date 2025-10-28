<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
        <div>
          <a href="/organizations/new" class="btn btn-primary">Nueva</a>
        </div>
    
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Nombre Corto</th>
                <th>Creado Por</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!isset($organizations) || empty($organizations)): ?>
                <tr>
                    <td colspan="4">No hay organizaciones disponibles.</td>
                </tr>
            <?php else: ?>
            <?php foreach ($organizations as $organization): ?>
            <tr>
                <td><?= esc($organization->id) ?></td>
                <td><?= esc($organization->full_name) ?></td>
                <td><?= esc($organization->short_name) ?></td>
                <td><?= esc($organization->created_by) ?></td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
<?= $this->endSection() ?>
