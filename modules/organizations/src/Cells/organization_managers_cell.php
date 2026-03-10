<h3><?= lang('OrganizationManagers.Messages.OrganizationManagers') ?></h3>
<div>
    <?php if (isset($organizationManagers)) : ?>
        <table>
            <thead>
                <tr>
                    <th><?= lang('OrganizationManagers.Fields.User') ?></th>
                    <th><?= lang('OrganizationManagers.Fields.Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($organizationManagers)) : ?>
                    <tr>
                        <td><?= lang('OrganizationManagers.Messages.NoManagersInOrganization') ?></td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($organizationManagers as $manager) : ?>
                        <tr>
                            <td><?= $manager->user ?></td>
                            <td>
                                <?= form_open("/organizations/{$manager->organization_id}/managers/{$manager->id}", ['method' => 'post']) ?>
                                    <?= form_hidden('_method', 'DELETE') ?>
                                    <?= form_submit('delete', lang('OrganizationManagers.Actions.Remove'), ['class' => 'btn btn-danger']) ?>
                                <?= form_close() ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <?= view_cell('Percontmx\SportsCloud\Organizations\Cells\AddOrganizationManagerFormCell', ['organizationId' => $organizationId]) ?>
    <?php endif; ?>
</div>
