<div class="col-sm-3">
    <?php 	include($rep_vue.'databse_list.php');	?>
</div>
<div class="col-sm-9">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="text-center">
                <?php echo $database_name; ?>
                <a class=" btn btn-xs btn-success pull-left" href="?rename_database=<?php echo $database_name; ?>" title="Rename Database" ><i class="fa fa-lg fa-pencil"></i> Rename Database</a>
                <a class="btn btn-danger btn-xs pull-left" href="#" title="supprimer" onclick="  if (confirm('Voulez vous supprimer database?')) $('#del-form-<?php echo $database_name;?>').submit();return false;"><i class="fa fa-lg fa-trash"></i> Delete database</a>
                <a class=" btn btn-xs btn-info pull-right" href="?add_table=<?php echo $database_name; ?>" title="Ajouter table" ><i class="fa fa-lg fa-plus"></i> Add table</a>
            </h4>
        </div>

        <ul class="list-group  ">
            <?php
            if($tables->num_rows != 0) :
                while($row = $tables->fetch_array()) :
            ?>
                    <li class="list-group-item"><a href="?table_name=<?php echo $database_name.'.'.$row[0]; ?>"><?php echo $row[0]; ?></a> </li>
            <?php
                 endwhile;
            endif;
            ?>
        </ul>
        <div class="panel-footer">
            <h4 class="text-center">NB Tables :
                <?php echo $nb_tables; ?>
            </h4>
            <h4 class="text-center">Date creation
                <?php echo $date_create; ?>
            </h4>
            <h4 class="text-center">Taille memoire
                en Mo <?php echo ($size_Db['TailleMo'] == null)?'0':$size_Db['TailleMo']; ?>, en Ko <?php echo ($size_Db['TailleKo'] == null)?'0':$size_Db['TailleKo']; ?>
            </h4>
        </div>
    </div>

</div>


<form action="?del_data=<?php echo $database_name;?>" id="del-form-<?php echo $database_name;?>" method="post">
    <input type="hidden" name="database_delete" id="database_delete" value="<?php echo $database_name;?>"/>
</form>