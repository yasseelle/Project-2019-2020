<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>personne!</title>
  </head>
  <body>
  
  <form action="insert.php" method="POST">

<section id="pg1" class="container mt-2 mb-4 p-2 shadow bg-white">
   
    <div  class="form-row justify-content-center">
       
    <div class="col-auto">
    <input type="text" name="username" placeholder="nom ..." required/> <br/>
    </div>
    <div class="col-auto">
        <input type="text" name="lastname" placeholder="prenome ..." required/> <br/>
    </div>
    <div class="col-auto">
     <input type="number" name="age" placeholder="age ..." required/> <br/>
    </div>
    <div class="col-auto">
           <button type="submit"  name="save" class="btn btn-info">enregistrer</button>
    </div>

        

 </div>


<table class="table">
<thead>
    <tr>
        <th>ID</th>
        <th>nom</th>
        <th>prenom</th>
        <th>age</th>
        <th>action</th>
    </tr>
</thead>
    <tbody >

    <?php 
    
    #display database data in table
$host ="Localhost";
$dbusername="root";
$dbpassword="";
$dbname="gbase";

$con = new mysqli($host,$dbusername,$dbpassword,$dbname);
session_start();
    $select = "SELECT * FROM student";

    $result= $con->query($select);

    while($row = $result->fetch_assoc()):
       
    ?>
    <tr>
        <td><?= $row['ID']; ?></td>
        <td><?= $row['Nom']; ?></td>
        <td><?= $row['Prenome']; ?></td>
        <td><?= $row['age']; ?></td>

        <td>
           
        <button type="submit" name="delete" value="<?= $row['ID']; ?>" class="btn btn-danger">supprimer</button>
        <button type="button" name="edit" value="" class="btn btn-primary">modifer</button>
    
        </td>

    </tr>


<?php  endwhile; ?>
    </tbody>

</table>


   
</section>

<footer data-role="footer">
        <h2>coppyrights</h2>
      
    </footer>


</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>





<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.mobile-1.3.2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>
<body>
    

    <form action="insert.php" method="POST">

            <section id="pg1" data-role="page">
                <header data-role="header" >
                    <a a href="page1.html" class="btn" ><i  class="fa fa-home"> </i></a>

                    <h2>Insert Personne</h2>
                  
                </header>
                <div class="content">
                   <label for=" Name">nom</label>
                   <input type="text" name="username" placeholder="ex : jhon , steave ..." required/> <br/>
                   <label for=" prenome">prenom</label>
                   <input type="text" name="lastname" placeholder="ex : jhon , steave ..." required/> <br/>
                   <label for="age">age</label>
                   <input type="number" name="age" required/> <br/>

                   <button type="submit" name="save">enregistrer</button>

                    

           
                </div>


    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>nom</th>
            <th>prenom</th>
            <th>age</th>
            <th>action</th>
        </tr>
    </thead>


    </table>


                <footer data-role="footer">
                    <h2>coppyrights</h2>
                  
                </footer>
            </section>
        
    


    </form>

</body>
</html> --> 