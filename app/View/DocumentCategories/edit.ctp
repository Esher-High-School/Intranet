<?php echo $this->Form->create('DocumentCategory', array('action' => 'edit', 'class' => 'form-horizontal')); ?>
        <div class="form-group">
                <label class="col-lg-3 control-label" for="name">Name</label>
                <div class="col-lg-9">
                        <?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control', 'class' => 'form-control')); ?>
                </div>
        </div>
        <div class="form-group">
                <label class="col-lg-3 control-label" for="Description">Description</label>
                <div class="col-lg-9">
                        <?php echo $this->Form->input('description', array('label' => false, 'class' => 'form-control', 'class' => 'form-control')); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                        <?php echo $this->Form->button('Save Document Category', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
                </div>
        </div>
<?php echo $this->Form->end(); ?>

