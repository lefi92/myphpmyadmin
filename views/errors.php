<?php
if(isset($form_err)&&count($form_err)!=0):

    ?>
    <div class="alert alert-danger" role="alert">
        <strong><p>Il y a des erreurs :</p></strong>
        <ul>
            <?php foreach($form_err as $err) : ?>
                <ul><?php echo $err;?></ul>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif;?>

