<?php if (!isset($form_err)) $form_err = array();	?>

<div class="col-sm-3">
    <?php 	include($rep_vue.'databse_list.php');	?>
</div>
<div class="col-sm-9">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="text-center">Sql</h4>
        </div>
        <div class="panel-body">
            <form  method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Textarea-->
                        <div class="form-group <?php echo isset($form_err['sql']) ? 'has-error' : '';?>">
                            <label class="control-label" for="cp">Request</label>
                            <textarea rows="20" id="sql_request" name="sql_request"  class="form-control input-md " autocomplete="off"><?php echo $sql_request; ?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group  pull-right">
                            <input type="submit" name="execute" value=" execute " class="btn btn-success"/>
                        </div>
                    </div>
                </div>
            </form>
            <?php
//var_dump($bd->sqlRequest($sql_request));
            ?>
            <?php 	include($rep_vue.'errors.php');	?>
        </div>
    </div>
</div>


