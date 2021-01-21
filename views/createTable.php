<?php if(!isset($form_err)) $form_err = array(); ?>
<?php $i = 0; ?>
<div class="col-sm-3">
    <?php 	include($rep_vue.'databse_list.php');	?>
</div>
<div class=" col-sm-9">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="text-center">
                Create New table in database
                <?php echo  "<a href ='?database_name=$database_name'>".$database_name.'</a>'; ?>

            </h4>
        </div>
        <div class="panel-body">
            <?php 	include($rep_vue.'errors.php');	?>
            <form  method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group <?php echo isset($form_err['']) ? 'has-error' : '';?>">
                            <label  class="control-label" for="table_name"> Table Name</label>
                            <input id="table_name" name="table_name" placeholder="Table Name" class="form-control input-md " type="text" autocomplete="off" value="<?php echo '';?>"/>
                        </div>
                    </div>
                </div>
                <?php while($i < 5): ?>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group <?php echo isset($form_err['']) ? 'has-error' : '';?>">
                            <label  class="control-label" for="name_line<?php echo $i; ?>">NOM</label>
                            <input id="name_line<?php echo $i; ?>" name="name_line<?php echo $i; ?>" placeholder="Name" class="form-control input-md " type="text" autocomplete="off" value="<?php echo '';?>"/>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group ">
                            <label class=" control-label pull-center" for="Type<?php echo $i; ?>">TYPE</label><br/>
                            <select class="btn-select btn-select-light"  id="Type<?php echo $i; ?>" style="   width: 100%;height: 34px;  border-radius: 4px;">
                                <option value="int">int</option>
                                <option value="varchar">varchar</option>
                                <option value="date">date</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group <?php echo isset($form_err['']) ? 'has-error' : '';?>">
                            <label class=" control-label pull-center" for="taille<?php echo $i; ?>">TAILLE</label><br/>
                            <input id="titre$i" name="taille<?php echo $i; ?>" placeholder="TAILLE" class="form-control input-md " type="text" autocomplete="off" value="<?php echo '';?>"/>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group <?php echo isset($form_err['']) ? 'has-error' : '';?>">
                            <label class=" control-label pull-center" for="key<?php echo $i; ?>">PRIMARY KEY</label><br/>
                            <input type="radio" name="key" value="<?php echo $i; ?>" checked>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group <?php echo isset($form_err['']) ? 'has-error' : '';?>">
                            <label class=" control-label pull-center" for="Null<?php echo $i; ?>">NULL</label><br/>
                            <input id="titre" name="Null<?php echo $i; ?>" placeholder="Titre" class="form-control input-md " type="text" autocomplete="off" value="<?php echo '';?>"/>
                        </div>
                    </div>
                </div>
                <?php $i++;
                endwhile; ?>
                <div class="form-group  pull-right">
                    <input type="submit" name="envoyer" value="creer" class="btn btn-success"/>
                </div>
            </form>
        </div>
    </div>
</div>