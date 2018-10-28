<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/todoList.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <script type="text/javascript" src="assets/js/lib/jquery-3.3.1.min.js"></script>
    <title>Todo List</title>
    <style media="screen">
      input{
        display: block;
      }
      button{
        display: none;
      }
    </style>
  </head>
  <body>
    <?php
      include 'dblogindetails.php';
      if (isset($_POST['content'])) {
        $name=$_POST['content'];
        $conn=new mysqli("localhost",$uname,$upass,$dbn);
        if ($conn->connect_error){echo("Connection Error");}
        $sql="INSERT INTO todo(content) VALUES ('$name')";
        if($conn->query($sql)===TRUE){
          echo "<script>alert('Task Submitted');</script>";
        }
        else {
          echo "<script>alert('Task Cannot Be Submitted');</script>";
        }
        $conn->close();
      }
    ?>
    <div id="container">
      <h1>To-Do List <i class="fa fa-pencil"></i>
      </h1>
      <form action="index.php" method="post">
        <input type="text" name="content" placeholder="Add New Todo">
        <button type="submit" name="submit"></button>
      </form>
      <ul>
        <?php
            $conn=new mysqli("localhost",$uname,$upass,$dbn);
            if ($conn->connect_error){
              echo("Connection Error");
            }
            $sql = "SELECT content,id FROM todo";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                $id=$row['id'];
                $content=$row['content'];
                ?>
                  <li><span><i class="fa fa-trash"></i></span> <?php echo $content;?></li>
                <?php
              }
            }
         ?>
      </ul>
    </div>
    <script type="text/javascript">
      $('li').
    </script>
    <script type="text/javascript" src="assets/js/todoList.js"></script>
  </body>
</html>
