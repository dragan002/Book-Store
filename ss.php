<?php 
    session_start();
    $title = "Admin Homepage";
    require_once "./database/database.php";
    $conn = db_connect();
    $result = getAll($conn);
    require_once "./Main/section.php";
?>

<div class="text-right mx-auto"><a href="admin_signout.php" class="btn btn-warning">Sign Out</a></div>
<div class="text-left mx-auto"><a href="admin_create.php" class="btn btn-success" >Add new book</a></div>
<table class="table table-striped table-hover table-bordered" style="margin-top:20px">
  <tr>
        <th>ISBN</th>
        <th>Title</th>
        <th>Price</th>
        <th>Author</th>
        <th>Image</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Is in Stock?</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
       <tr>
          <td><?php echo $row['book_isbn']; ?></td>
            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $row['book_price']; ?></td>
            <td><?php echo $row['book_author']; ?></td>
            <td><?php echo $row['book_image']; ?></td>
            <td><?php echo $row['book_descr']; ?></td>
            <td><?php echo $row['book_quantity']; ?></td>
            <td><?php echo ($row['flag'] == 0) ? 'No' : 'Yes'; ?></td>
            <td><a href="admin_update.php?book_isbn=<?php echo $row['book_isbn']; ?>"><span class="glyphicon glyphicon-pencil text-info">&nbsp;Update</span></a></td>
            <td><a href="admin_delete.php?book_isbn=<?php echo $row['book_isbn']; ?>"><span class="glyphicon glyphicon-trash text-danger">&nbsp;Delete</span></a></td>
        </tr>
    <?php } ?>
</table>
<?php 
    if(isset($conn)){ mysqli_close($conn); }
    require_once "./Main/footer.php";
?>
    
    
    
    