<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <div style="height: max-content;" class="sidebar">
            <h4>Derniers Articles Ajoutés</h4>

        <?php

            $select = $database->prepare("SELECT * FROM products WHERE stock>0 ORDER BY id DESC LIMIT 0,3");
            $select->execute();

            while($s=$select->fetch(PDO::FETCH_OBJ))
            {
                $length=35;
                $description = $s->description;
                $new_description=substr($description,0,$length)."...";
                $description_finale=wordwrap($new_description,50,'<br/>',false);
                ?>

                <div style="text-align:center;">
                    <img height="100" width="100" src="admin/imgs/<?php echo $s->title.'.jpg';?>"/>
                    <h2 style="color:white;"><?php echo $s->title;?></h2>
                    <h5 style="color:white;"><?php echo $description_finale;?></h5>
                    <h4 style="color:white;"><?php echo $s->price;?> €</h4>
                </div>
                <br/><br/>

                <?php
            }

        ?>
    </div>
</html>