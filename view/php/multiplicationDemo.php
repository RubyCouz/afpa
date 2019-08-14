<?php
include '../header.php';
$firstNumber = 0;
$secondNumber = 0;
?>
<div class="container table">
    <table class="stripped highlight centered responsive-table">
        <caption>Tableau de multiplication</caption>
        <thead>
            <tr>
                <th></th>
                <?php
                for ($firstNumber = 0; $firstNumber <= 12; $firstNumber++)
                {
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
            for ($secondNumber = 0; $secondNumber <= 12; $secondNumber++)
            {
                ?>
                <tr>
                    <td class="number">
                    <?= $secondNumber ?>
                    </td>
                    <?php
                    for ($firstNumber = 0; $firstNumber <= 12; $firstNumber++)
                    {
                        ?>
                        <td>
                        <?= $secondNumber * $firstNumber ?>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include '../footer.php';
?>