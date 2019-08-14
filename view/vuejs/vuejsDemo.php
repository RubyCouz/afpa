<?php
include '../header.php';
?>
<div class="uk-container">
    <form action="#" method="GET" class="uk-grid-small" uk-grid>
        <div id="app">
            <div class="uk-width-1-5@s">
                <label for="firstNumber"></label>
                <input class="uk-input" type="text" id="firstNumber" name="firstNumber" placeholder="Entrez un nombre" />
            </div>
            <div class="uk-width-1-5@s">
                <span class="uk-align-center">+</span>
            </div>
            <div class="uk-width-1-5@s">
                <label for="secondNumber"></label>
                <input class="uk-input" type="text" id="secondNumber" name="secondNumber" placeholder="Entrez un nombre" />
            </div>
            <div class="uk-width-1-5@s">
                <span>=</span>
            </div>
            <div class="uk-width-1-5@s">
                <span class="label">{{ result }}</span>
            </div>
        </div>
    </form>
</div>
<?php
include '../footer.php';
?>