<div class="col-sm-3">
    <?php 	include($rep_vue.'databse_list.php');	?>
</div>
<div class=" col-sm-9">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="text-center">
                <?php echo  "<a href ='?database_name=$nom_database'>".$nom_database.'</a>.'.$nom_table; ?>
                <a class=" btn btn-xs btn-success pull-left" href="?rename_table=<?php echo $table_name; ?>" title="Rename Table" ><i class="fa fa-lg fa-pencil"></i> Rename Table</a>

            </h4>
            <h5>NB lignes : <?php echo $nb_data; ?></h5>
        </div>
        <div class="panel-body">
            <div class="col-sm-12">
                <ul class="nav nav-pills  " role="tablist">
                    <li role="presentation" class="active "><a href="#table_data" aria-controls="table_data" role="tab" data-toggle="tab">Datas</a></li>
                    <li role="presentation" > <a href="#table_structure" aria-controls="table_structure" role="tab" data-toggle="tab">Structure</a></li>
                </ul>
                <div class="tab-content" >

                    <div role="tabpanel" class="tab-pane" id="table_structure">
                        <div class="table-responsive ">
                            <table class="table table-condensed  table-hover">
                                <thead>
                                <tr>
                                    <td class="text-center"><strong>Field</strong></td>
                                    <td class="text-center"><strong>Type</strong></td>
                                    <td class="text-center"><strong>Null</strong></td>
                                    <td class="text-center"><strong>Key</strong></td>
                                    <td class="text-center"><strong>Default</strong></td>
                                    <td  class="text-center"><strong>Extra</strong></td>
                                    <td class="text-right"><em class="fa fa-cog"></em></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($table as $item) : ?>
                                    <tr>
                                        <?php foreach ($item as $item1): ?>
                                            <td class="text-center"><?php echo ($item1 == null) ? 'NULL' : $item1; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane active" id="table_data">
                        <div class="table-responsive">
                            <table class="table table-condensed  table-hover">
                                <thead>
                                <tr>
                                    <?php foreach ($table_data_columns as $elem): ?>
                                        <th class="text-center"> <?php echo $elem[0];  ?></th>
                                    <?php endforeach; ?>
                                    <th class="text-right"><em class="fa fa-cog"></em></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($table_data_array as $elem) : ?>
                                    <tr>
                                        <?php foreach ($elem as $elem1): ?>

                                            <td class="text-center"><?php echo $elem1; ?></td>
                                        <?php endforeach; ?>
                                        <?php if($key != null) :  ?>
                                            <td><a class = "btn btn-xs btn-danger" href="?delete_data_row&id=<?php echo ($key == null) ? 'null' : $elem[$key];?>&amp;table=<?php echo $table_name;?>&amp;key=<?php echo $key;?>" onclick="return confirm('You are about to delete this row. Do you confirm ?');"><i class="fa fa-lg fa-trash"></i> Delete</a></td>
                                            <td><a class = "btn btn-xs btn-success" href="?edit_data_row&id=<?php echo ($key == null) ? 'null' : $elem[$key];?>&amp;table=<?php echo $table_name;?>&amp;key=<?php echo $key;?>"><i class="fa fa-lg fa-pencil"></i> Edit</a></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
