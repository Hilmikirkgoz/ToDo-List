<?php
require_once('db.php');

$SORGU = $DB->prepare("SELECT id, todo FROM todo");
$SORGU->execute();
$todos = $SORGU->fetchAll(PDO::FETCH_ASSOC);

?>
<table class="table table-borderless border-bottom border-top">
<tbody>
    <?php
    foreach($todos as $todo){
        echo "
        <tr>
        <td>{$todo['todo']}</td>
        <td><a href='update.php?id={$todo['id']}'class='btn btn-primary text-center btn-sm'>Update</a></td>
        <td><a href='delete.php?id={$todo['id']}' class='btn btn-danger text-center btn-sm'>Delete</a></td>
         </tr>
        ";
    }
    ?>
       
</tbody>
</table>
<div class="d-flex justify-content-end">
    <a href="insert.php"><img src="add.png" alt="Add ToDo" class="btn btn-sm float-right" style="height: 50px; width: 60px;"></a> 
</div>
