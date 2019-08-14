<?php
include '../header.php';
?>
<div class="container table">
<table class="stripped highlight centered responsive-table">
    <caption>Tableau de multiplication</caption>
    <thead>
        <tr>
        <?php
for ($firstNumber = 0; $firstNumber <= 12; $firstNumber++) {
    ?>
    <th>
        <?= $firstNumber ?>
    </th>
    <?php
}
?>
        </tr>
    </thead>
    <tbody>
        <?php
    for ($secondNumber = 0; $secondNumber <= 12; $secondNumber++) {
    ?>
        <tr>
            <td>
                <?= $secondNumber ?>
            </td>   
            <td></td>     
        </tr>
    <?php }
        ?>
    </tbody>
</table>

</div>
<?php
include '../footer.php';
?>