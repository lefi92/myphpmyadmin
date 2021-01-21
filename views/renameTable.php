<?php if (!isset($form_err)) $form_err = array();?>
<div class="col-sm-3">
    <?php 	include($rep_vue.'databse_list.php');	?>
</div>
<div class="col-sm-9">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="text-center">
                <?php echo "Rename $table_name"; ?>
            </h4>
        </div>
        <div class="panel-body">
            <div class="col-sm-12">
                <form  method="post">
                    <input type="hidden" name="old_nametable" id="old_nametable" value="<?php echo $table_name; ?>"/>
                    <div class="col-sm-6">
                        <div class="form-group <?php echo isset($form_err['name']) ? 'has-error' : '';?>">
                            <label class="control-label" for="cp">Database Name</label>
                            <input type="text"  id="database_name" name="database_name" placeholder="database_name" value="<?php echo $nom_database; ?>" class="form-control input-md " autocomplete="off"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group <?php echo isset($form_err['name']) ? 'has-error' : '';?>">
                            <label class="control-label" for="cp">table Name</label>
                            <input type="text"  id="table_name" name="table_name" placeholder="table_name" value="<?php echo $nom_table; ?>" class="form-control input-md " autocomplete="off"/>
                        </div>
                    </div>
                    <div class="form-group  pull-right">
                        <input type="submit" name="envoyer" value="rename" class="btn btn-success"/>
                    </div>
                </form>
            </div>
            <?php 	include($rep_vue.'errors.php');	?>
        </div>
    </div>
</div>