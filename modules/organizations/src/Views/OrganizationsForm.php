<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
<?php
    
    $errorMessages = validation_errors();
    $fullNameInvalidClass = isset($errorMessages['full_name']) ? 'is-invalid' : '';
    $shortNameInvalidClass = isset($errorMessages['short_name']) ? 'is-invalid' : '';

?>

<?= form_open('/organizations') ?>
    <?= form_fieldset(lang('Organizations.Messages.OrganizationData')) ?>
        <div class="row">
            <?= form_label(lang('Organizations.Fields.FullName'), 'full_name', ['class' => 'form-label']) ?>
            <?= form_input('full_name', old('full_name', ''), ['id' => 'full_name',
                                                                 'class' => join(' ', array('form-control', $fullNameInvalidClass)),
                                                                 'required' => 'required']) ?>
            <?= validation_show_error('full_name', 'bootstrap_alert') ?>
        </div>

        <div class="row">
            <?= form_label(lang('Organizations.Fields.ShortName'), 'short_name', ['class' => 'form-label']) ?>
            <?= form_input('short_name', old('short_name', ''), ['id' => 'short_name',
                                                                   'class' => 'form-control ' . $shortNameInvalidClass,
                                                                    'required' => 'required'
                                                                    ]) ?>
            <?= validation_show_error('short_name', 'bootstrap_alert') ?>
        </div>
    
        <?= form_submit('create', lang('Organizations.Actions.Create'), ['class' => 'btn btn-primary']) ?>
        
    <?= form_fieldset_close() ?>
<?= form_close() ?>
<?= $this->endSection() ?>
