<?php
include '../model/configRegion.php';
include '../controller/option2Controller.php';
foreach ($getRedionByIdRresult as $row) {
    ?>
<option value="<?= $row->dep_id ?>"><?= $row->dep_nom ?></option>
<?php
}
?>