<?php
include '../header.php';
?>

<div class="container white-text">
    <div class="row">
        <div class="col-sm-12">
            <form action="#" method="GET" class="form">

                <div class="row valign-wrapper center-align" id="app">
                    <div class="input-field col s4">
                        <input id="firstNumber" type="text" class="validate" name="firstNumber" v-model="firstNumber" @keyup="addition">
                        <label for="firstNumber">Nombre 1</label>
                    </div>
                    <div class="col s1">
                        <p>+</p>
                    </div>
                    <div class="input-field col s4">
                        <input id="secondNumber" type="text" class="validate" name="secondNumber" v-model="secondNumber" @keyup="addition">
                        <label for="secondNumber">Nombre 2</label>
                    </div>
                    <div class="col s1">
                        =
                    </div>
                    <div class="col s2">
                        <p class="label">{{ result }}</p>
                    </div>
                </div> 

                <div class="form-group col-sm-2 result">

                </div>
        </div>
        </form>
    </div>
</div>
</div>


<script src="assets/js/jquery-3.3.1.js"></script>
<script src="../../assets/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="assets/js/script.js"></script>
<script src="../../assets/js/script.js"></script>
</body>

</html>