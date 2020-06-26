<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>!</title>  
  </head>
  <body>
  

    <section id="pg1" class="container mt-2 mb-4 p-2 shadow bg-white">


        <table class="table">
            <thead>
                <tr>

                <th>ID</th>
                <th>nom</th>
                <th>prenom</th>
                <th>age</th>
               
                </tr>
                
            </thead>

            <tbody>

            
                <?php
                
                $host="Localhost";
                $dbusername="root";
                $dbpassword="";
                $dbname="gbase";

                $con = new mysqli($host,$dbusername,dbpassword,dbname);
                $select = "SELECT * FROM student";

                $result = $con->query($select);

                while($row = $result->fetch_assoc()):
 
                ?>
                <tr>

                    <td><? $row['ID'];?></td>
                    <td><? $row['Nom'];?></td>
                    <td><? $row['Prenome'];?></td>
                    <td><? $row['age'];?></td>

                </tr>

            </tbody>


        </table>



      </section>


  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
