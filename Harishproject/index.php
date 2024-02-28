<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <header class="d-flex justify-content-between my-4">
      <h1>All Books</h1>
      <div>
        <a href="create.php" class="btn btn-primary">Add New Book</a>
      </div>
    </header>
    <?php
    session_start();
    if(isset($_SESSION['create'])){
    ?>
    <div class="alert alert-success">
        <?php
        echo $_SESSION['create'];
        unset($_SESSION['create']);
        ?>
    </div>
    <?php
    }
    ?>

<?php
    if(isset($_SESSION['update'])){
    ?>
    <div class="alert alert-success">
        <?php
        echo $_SESSION['update'];
        unset($_SESSION['update']);
        ?>
    </div>
    <?php
    }
    ?>

<?php
    if(isset($_SESSION['edit'])){
    ?>
    <div class="alert alert-success">
        <?php
        echo $_SESSION['edit'];
        unset($_SESSION['edit']);
        ?>
    </div>
    <?php
    }
    ?>

<?php
    if(isset($_SESSION['delete'])){
    ?>
    <div class="alert alert-success">
        <?php
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
        ?>
    </div>
    <?php
    }
    ?>

    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Type</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("connect.php");
            $sql = "SELECT * FROM books";
            $result = mysqli_query($conn , $sql);
            $serial = 1; // Counter for serial number

            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $serial++ ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['author'] ?></td>
                    <td><?php echo $row['type'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Read More</a>
                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
            }
            mysqli_close($conn); // Close the database connection
            ?>          
            
        </tbody>
    </table>
</div>
</body>
</html>
