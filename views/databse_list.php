<div class="panel panel-info">
    <div class="panel-heading">
        <h4 class="text-center">Database<a class=" btn btn-xs btn-info pull-left" href="?create_database" title="create Database" ><i class="fa fa-lg fa-plus"></i> create Database</a>
        </h4>
    </div>
    <ul class="list-group  ">
        <?php
        if($database->num_rows!=0) :
            while($row = $database->fetch_array()) :
                echo " <li class=\"list-group-item\"><a href='?database_name=".$row[0]."'>".$row[0]."</a></li>";
            endwhile;
        endif;
        ?>
    </ul>
</div>