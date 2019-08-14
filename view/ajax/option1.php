<?php
include 'model/configRegion.php';
include 'controller/option1Controller.php';
foreach ($listRegionResult as $row) {
    ?>
<option value="<?= $row->reg_id ?>"><?= $row->reg_v_nom ?></option>
<?php
}
?>


