<?php
/**
 * Created by PhpStorm.
 * User: Neff
 * Date: 16.08.2016
 * Time: 20:56
 */
?>
<UploadTeachersID>
    <Errors>
        <?php
        foreach ($errors as $error) {
            echo '<Error id="'.$error['id'].'">',$error['message'],'</Error>';
        }
        ?>
    </Errors>
</UploadTeachersID>