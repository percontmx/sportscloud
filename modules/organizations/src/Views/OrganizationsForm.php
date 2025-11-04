<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
<?= form_open('/organizations') ?>
    <?= form_fieldset(lang('Organizations.Messages.OrganizationData')) ?>
        <div class="row">
            <?= form_label(lang('Organizations.Fields.FullName'), 'full_name', ['class' => 'form-label']) ?>
            <?= form_input('full_name', set_value('full_name'), ['id' => 'full_name',
                                                                 'class' => 'form-control',
                                                                 'required' => 'required']) ?>
        </div>

        <div class="row">
            <?= form_label(lang('Organizations.Fields.ShortName'), 'short_name', ['class' => 'form-label']) ?>
            <?= form_input('short_name', set_value('short_name'), ['id' => 'short_name',
                                                                   'class' => 'form-control',
                                                                   'required' => 'required']) ?>
        </div>
    
        
        <?= form_submit('create', lang('Organizations.Actions.Create'), ['class' => 'btn btn-primary']) ?>
        
    <?= form_fieldset_close() ?>
<?= form_close() ?>
<?= $this->endSection() ?>
