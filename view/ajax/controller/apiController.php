<?php
$query = json_encode('http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=' . $_POST['query'], TRUE);
 return var_dump($query);

