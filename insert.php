<?php 
require_once "sayfaust.php";
?>


<form method='POST'>
  <div class="mb-3">
    <label  class="form-label">Todo:</label>
    <input type="text" class="form-control" name='todo'>
  </div>
  <button type="submit" class="btn btn-success">Add</button>
</form>


<?php

try {
    if(isset($_POST['todo'])){

        require_once('db.php');
    
        $todo = $_POST['todo'];
    
        $sql = "INSERT INTO `todo` (`todo`) VALUES (:todo)";
        $SORGU = $DB->prepare($sql);
    
        $SORGU->bindParam(':todo', $todo,PDO::PARAM_STR);
    
        $SORGU->execute();
        usleep(250000);
        header("Location: index.php");
        die;
    }
} catch (PDOException $e) {
    echo 'Hata: ' . $e->getMessage();
}

require_once "sayfaalt.php";
