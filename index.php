<?php
//connection
$servername = "localhost";
$username = "id14851405_root";
$password = "=7Kvo]Jr{nh_w][A";
$database = "id14851405_adhar_data";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Sorry unable to connect, We regret for inconvinenece");
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Enter Details</title>


</head>
<style>
.logo {
display: inline-block;
height: 100px;
width: 100px;
vertical-align: middle;
}

.orgName {
font-color: red;
font-weight: bold;
margin: 0px 0px 0px 20px;
font-size: 20pt;
display: inline-block;
vertical-align: middle;
}
.btn {
  background-color: #80FFFF;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  font-size: 10px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}
</style>
<body>
    
   <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit mobile number</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="insert.php" method="POST" class="needs-validation">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group col-4">
                            <label>mobile no</label>
                            <input required type="text" name="editmobile" class="form-control" id="editmobile">
                           
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Update changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">KR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href='index.php?this=true' onclick = "gotohome()">Register <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"onclick = "gotoform()">Show Details <span class="sr-only">(current)</span></a>
                </li>
                
                
                
            </ul>
        </div>
    </nav>

    <div class = "container" id = "sec2">
    
        <h2>Citizens' details</h2>
        <table class="table mt-3">

            <?php
            if (isset($_GET['this'])) {
                showfunction();
            }
            function showfunction()
            {
                global $conn;

                $sql = "SELECT * FROM `citizen`";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                echo "
                <thead class='thead-'>
                <tr>
                <th scope='col'>S.no</th>
                <th scope='col'>Name</th>
                <th scope='col'>Email</th>
                <th scope='col'>mobile</th>
                <th scope='col'>adharno</th>
                <th scope='col'>state</th>
                <th scope='col'>timestamp</th>
                <th scope='col'>Workspace</th>
                </tr>
            </thead>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "<tr>
                    <th scope=row>" . $sno . "</th>" .
                    "<td>" . $row['name'] . "</td>" .
                    "<td>" . $row['email'] . "</td>" .
                    "<td>" . $row['mobile'] . "</td>" .
                    "<td>" . $row['adharno'] . "</td>" .
                    "<td>" . $row['state'] . "</td>" .
                    "<td>" . $row['time'] . "</td>
                    <td><button class='edit btn ' id=" . $row['sno'] . ">Edit</button> 
                    <button class='delete btn ' id=d" . $row['sno'] . ">Delete</button></td>
                    </tr>";
                }
            }


            ?>
        </table>
    </div>
    <div class="container mt-5" style="background-image: url();" >
    <div class = "container" id = "sec1">
    <header>
    <div class="headerDiv">
        <div class="headerResponsive">
    <img class="logo" src="logo.png">
        <p class="orgName" id="orgName">MERA ADHAR  <br>MERI PEHCHAN</p>
    
</div>
</header>
<br>
        <h2>ENTER TOURIST INFO</h2>
        <form action="valid.php" method="POST" class="needs-validation">
            <div class="form-group col-4">
                <label for="validationCustom01">Full Name</label>
                <input required type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                <?php
                if (isset($name_error)) { ?>
                    <h6><?php echo $name_error ?></h6>
                <?php } ?>
                <label>Email address</label>
                <input required type="email" name="email" class="form-control" id="email">
                <?php
                if (isset($email_error)) { ?>
                    <h6><?php echo $email_error ?></h6>
                <?php } ?>
                <label>Mobile no.</label>
                <input required type="text" name="mobile" class="form-control" id="mobile">
                <?php
                if (isset($mobile_error)) { ?>
                    <h6> <?php echo $mobile_error ?></h6>
                <?php } ?>
                <label>Adhar No.</label>
                <input required type="text" name="adharno" class="form-control" id="adharno">
                <?php
                if (isset($adharno_error)) { ?>
                    <h6> <?php echo $adharno_error ?></h6>
                <?php } ?>
                <label>State</label>
                <input required type="text" name="state" class="form-control" id="state">
                <?php
                if (isset($state_error)) { ?>
                    <h6><?php echo $state_error ?></h6>
                <?php } ?>
                
            </div>
            <button type="submit" class="btn btn-success mb-3">Submit</button>
        </form>
</div>
        
    </div>

   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            edits = document.getElementsByClassName('edit');
            Array.from(edits).forEach((element) => {
                element.addEventListener("click", (e) => {
                    console.log("edit", );
                    tr = e.target.parentNode.parentNode;
                    mobile = tr.getElementsByTagName("td")[2].innerText;
                    console.log(mobile);
                    editmobile.value = mobile;
                    snoEdit.value = e.target.id;
                    console.log(e.target.id);
                    $('#editModal').modal('toggle');
                })

            })
            deletes = document.getElementsByClassName('delete');
            Array.from(deletes).forEach((element) => {
                element.addEventListener("click", (e) => {
                    console.log("edit", );
                    sno = e.target.id.substr(1,)

                    if (confirm("Are you sure you want to delete your details")) {
                        console.log('yes');
                        window.location = `insert.php?delete=${sno}`;
                        console.log(sno);
                    } else {
                        console.log('no');
                    }
                })

            })
        })
      
var x = document.getElementById("sec1");
var y= document.getElementById("sec2");

x.style.display="block";
y.style.display="none";


function gotohome()
{
    if(x.style.display==="none")
    {
        x.style.display="block";
        y.style.display="none";
       
    }
}

function gotoform()
{
    if(y.style.display==="none")
    {
        x.style.display="none";
        y.style.display="block";
      
    }
}


    </script>
</body>

</html>