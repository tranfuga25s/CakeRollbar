<?php $this->set( 'title_for_layout', "Cake Rollbar Deploy" ); ?>
<div class="row-fluid">
    <div class="span12">
        <h2><?php echo __("Cake Rollbar Deploy"); ?></h2>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
         <?php echo $this->BootstrapForm->create(false, array(
                'class' => 'form-inline',
            )); ?>
            <legend><?php echo __("Rollbar Data"); ?></legend>
            <fieldset>
            <?php
                echo $this->BootstrapForm->input('local_username', array(
                    'label' => __('Local Username').':&nbsp;', 
                    'required' => false,
                    'style' => 'margin-bottom: 1%; margin-right:1%',
                    'class' => 'input',
                    'after' => '<br />'                           
                ));
                echo $this->BootstrapForm->input('rollbar_username', array(
                    'label' => __('Rollbar username').':&nbsp;', 
                    'required' => false,
                    'style' => 'margin-bottom: 1%; margin-right:1%',
                    'class' => 'input',
                    'after' => '<br />'                           
                ));
                echo $this->BootstrapForm->input('comment', array(
                    'placeholder' => __("Insert your deployment comments"),
                    'label' => __('Comment').':&nbsp;', 
                    'required' => false,
                    'style' => 'margin-bottom: 1%; margin-right:1%',
                    'class' => 'input',
                    'after' => '<br />',
                    'type' => 'textarea'
                ));
            ?>
            </fieldset>
            <div class="form-actions">
                <?php echo $this->Form->submit(
                        $this->Html->tag('i', ' ', array('class' => 'icon-floppy')) . '&nbsp Send Deploy Callback', 
                        array('class' => 'boton-nuevo btn', 'escape' => false)
                ); ?>
            </div>
            <?= $this->BootstrapForm->end(); ?>
    </div>
</div>