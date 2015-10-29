<?php $this->set( 'title_for_layout', "Cake Rollbar configuration" ); ?>
<div class="row-fluid">
    <div class="span12">
        <h2><?php echo __("Cake Rollbar configuration"); ?></h2>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
         <?php echo $this->BootstrapForm->create(false, array(
                'url' => array_merge(array('action' => 'index'), $this->params['pass']),
                'class' => 'form-inline',
            )); ?>
            <legend><?php echo __("Rollbar configuration"); ?></legend>
            <fieldset>
            <?php
                foreach ($config as $key => $value)  {
                    echo $this->BootstrapForm->input($key, array(
                        'placeholder' => $key,
                        'label' => Inflector::variable($key).':&nbsp;', 
                        'required' => false,
                        'value' => $value,
                        'style' => 'margin-bottom: 1%; margin-right:1%',
                        'class' => 'input',
                        'after' => '<br />'                           
                    ));
                }
            ?>
            </fieldset>
            <div class="form-actions">
                <?php echo $this->Html->link(
                        $this->Html->tag('i', ' ', array('class' => 'icon-floppy')) . '&nbsp Guardar', 
                        array('action' => 'save'), 
                        array('class' => 'boton-nuevo btn', 'escape' => false)
                ); ?>
            </div>
            <?= $this->BootstrapForm->end(); ?>
    </div>
</div>