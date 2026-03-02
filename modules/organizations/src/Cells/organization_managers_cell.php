<h3><?= lang('OrganizationManagers.Messages.OrganizationManagers') ?></h3>
<div>
    <?php if (isset($organizationManagers)) : ?>
        <table>
            <thead>
                <tr>
                    <th><?= lang('OrganizationManagers.Fields.User') ?></th>
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
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
