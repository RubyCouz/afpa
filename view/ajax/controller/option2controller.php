<?php
if (isset($_POST['reg_id']))
{
    include'../model/configRegion.php';

    $getRegionById = new departements();
    $getRegionById->reg_id = $_POST['reg_id'];
    $getRedionByIdRresult = $getRegionById->getRegionById();
    foreach ($getRedionByIdRresult as $row)
    {
        ?>
        <option value="<?= $row->dep_id ?>"><?= $row->dep_nom ?></option>
        <?php
    }
}
?>

