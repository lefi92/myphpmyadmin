
<table>
    <tr>
        <?php foreach ($table_data_columns as $elem)
        { ?>
        <th> <?php echo $elem[0]; } ?></th>
    </tr>
    <?php
    $i=1;
    foreach ($table_data_array as $elem)
    { ?>
        <tr>
            <?php
            foreach ($elem as $elem1)
            { ?>
                <td><?php echo $elem1; ?></td>
                <?php	$i++;
            } ?>
            <td><button type="button" class="btn">Delete</button></td>
            <td><button type="button" class="btn">Edit</button></td>
        </tr>
        <?php
    }?>
</table>
