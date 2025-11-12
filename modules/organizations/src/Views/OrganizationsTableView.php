<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

        <?php
            $flash = session()->getFlashdata('success');
        ?>
        <?php if ($flash): ?>
            <div class="alert alert-success" role="alert">
                <?= esc($flash) ?>
            </div>
        <?php endif; ?>
        
        <div>
          <a href="/organizations/new" class="btn btn-primary">
                <?= lang('Organizations.Actions.New') ?>
          </a>
        </div>
    
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= lang('Organizations.Fields.Id') ?></th>
                <th><?= lang('Organizations.Fields.FullName') ?></th>
                <th><?= lang('Organizations.Fields.ShortName') ?></th>
                <th><?= lang('Organizations.Fields.CreatedBy') ?></th>
                <th><?= lang('Organizations.Fields.Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if (!isset($organizations) || empty($organizations)): ?>
                <tr>
                    <td colspan="4"><?= lang('Organizations.Messages.NoOrganizations') ?></td>
                </tr>
            <?php else: ?>
            <?php foreach ($organizations as $organization): ?>
            <tr>
                <td><?= esc($organization->id) ?></td>
                <td><?= esc($organization->full_name) ?></td>
                <td><?= esc($organization->short_name) ?></td>
                <td><?= esc($organization->created_by) ?></td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="<?= base_url("/organizations/$organization->id") ?>" role="button">
                        <i class="bi bi-search"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
<?= $this->endSection() ?>
