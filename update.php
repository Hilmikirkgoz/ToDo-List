<?php

require_once('db.php');

    if(isset($_POST['todo'])){
        
        $todo  = $_POST['todo'];
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $sql = "UPDATE todo SET todo = :todo WHERE id = :id";
        $SORGU = $DB->prepare($sql);

        
        $SORGU->bindParam(':todo',  $todo,PDO::PARAM_STR);
        $SORGU->bindParam(':id',    $id,PDO::PARAM_STR);

        // die(date("H:i:s"));
        $SORGU->execute();
        usleep(250000);
        header("Location: index.php");
        die;
    }

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $sql = "SELECT * FROM todo WHERE id = :id";
    $SORGU = $DB->prepare($sql);
    
    $SORGU->bindParam(':id', $id, PDO::PARAM_STR);
    
    $SORGU->execute();

    $todos = $SORGU->fetchAll(PDO::FETCH_ASSOC);
    $update  = $todos[0];
    require_once "sayfaust.php";
?>

<form method='POST'>
  <div class="mb-3">
    <label  class="form-label">Todo:</label>
    <input type="text" class="form-control" name='todo' placeholder='<?php echo htmlspecialchars($update['todo'], ENT_QUOTES, 'UTF-8'); ?>' value='<?php echo htmlspecialchars($update['todo'], ENT_QUOTES, 'UTF-8'); ?>'>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php require_once "sayfaalt.php";?>


