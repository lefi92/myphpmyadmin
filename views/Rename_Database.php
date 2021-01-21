<?php if (!isset($form_err)) $form_err = array();?>
<div class="col-sm-3">
    <?php 	include($rep_vue.'databse_list.php');	?>
</div>
<div class="col-sm-9">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="text-center">
                <?php echo ($action == "rename")? "Rename $database_name":'Creer Database'; ?>
            </h4>
        </div>
        <div class="panel-body">
            <div class="col-sm-12">
                <form  method="post">
                <?php if($database != ""):  ?>
                    <input type="hidden" name="old_namedb" id="old_namedb" value="<?php echo $database_name; ?>"/>
                <?php endif; ?>
                <div class="form-group <?php echo isset($form_err['name']) ? 'has-error' : '';?>">
                    <label class="control-label" for="cp">Database Name</label>
                    <input type="text"  id="database_name" name="database_name" placeholder="database_name" value="<?php echo $database_name; ?>" class="form-control input-md " autocomplete="off"/>
                </div>
                <div class="form-group  pull-right">
                    <input type="submit" name="envoyer" value="<?php echo ($action == "rename")? 'modifier':'creer'; ?> " class="btn btn-success"/>
                </div>
            </div>
            <?php 	include($rep_vue.'errors.php');	?>
        </div>
    </div>
</div>