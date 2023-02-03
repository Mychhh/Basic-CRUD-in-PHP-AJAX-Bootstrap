<!-- SQL -->
<?php

include "db_conn.php";

$sql = "SELECT * FROM `books`";
$result = mysqli_query($conn, $sql);

if($result->num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
        // id, title, author, date, pub, genre
?>
<tr>
    <td><?php echo $row['title']; ?> </td>
    <td><?php echo $row['author']; ?> </td>
    <td><?php echo $row['date']; ?> </td>
    <td><?php echo $row['pub']; ?> </td>
    <td><?php echo $row['genre']; ?> </td>
    <td>
        <!-- trigger btn modal -->
        <button 
        type="button"
        class="btn btn-primary" 
        data-bs-toggle="modal"
        data-bs-target="#view_modal"
        data-id="<?=$row['id'];?>" 
        data-title="<?=$row['title']; ?>"
        data-author="<?php echo $row['author']; ?>"
        data-date="<?php echo $row['date']; ?>"
        data-pub="<?php echo $row['pub']; ?>"
        data-genre="<?php echo $row['genre']; ?>"
        >View</button>

        <button 
        type="button"
        class="btn btn-success"
        data-bs-toggle="modal"
        data-bs-target="#edit_modal"
        data-id="<?=$row['id'];?>" 
        data-title="<?=$row['title']; ?>"
        data-author="<?php echo $row['author']; ?>"
        data-date="<?php echo $row['date']; ?>"
        data-pub="<?php echo $row['pub']; ?>"
        data-genre="<?php echo $row['genre']; ?>">Edit</button>

        <button class="btn btn-danger" id="delete" data-id="<?=$row['id'];?>">Delete</button>
    </td>
</tr>

<?php
    }
}else{
    echo "<tr>
            <td> 'No result found' </td>
        </tr>";
}

mysqli_close($conn);

?>