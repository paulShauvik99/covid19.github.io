<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State Data</title>
    <?php include 'links/links.php' ?>
    <?php include 'css/style.php'   ?>
</head>
<body onload="getdata()">

    <nav class="p-4 navbar nav_style navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand pl-5" href="#">Covid-19</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto pr-5 text-capitalize text-center">
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="<?php header("Location: index.php") ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php/#about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#symp">Symptoms</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#prevent">prevention</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="state.php">india state updates</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cont">Contact</a>
        </li>
        </ul>
    </div>
    </nav>


<!-- statewise corona data -->

    <section class="covstate container-fluid">

        <div class="my-5">
            <h1 class="text-center text-uppercase">Covid-19 India States Live Update</h1>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center table-hover ">

                <tr>
                    <th> Last Updated Time </th>
                    <th> State </th>
                    <th> Confirmed Cases </th>
                    <th> Active Cases </th>
                    <th> Recovered </th>
                    <th> Total Deaths </th>

                </tr>
            <?php 
                $data = file_get_contents('https://api.covid19india.org/data.json');

                $actualdata = json_decode($data,true);

                echo $actualdata['statewise'][1]['state'];

                $count = count($actualdata['statewise']);

                $i = 1;

                while($i<$count){
                    ?>
                        <tr>
                            <td><?php echo  $actualdata['statewise'][$i]['lastupdatedtime']; ?></td>
                            <td><?php echo  $actualdata['statewise'][$i]['state']; ?></td>
                            <td><?php echo  $actualdata['statewise'][$i]['confirmed']; ?></td>
                            <td><?php echo  $actualdata['statewise'][$i]['active']; ?></td>
                            <td><?php echo  $actualdata['statewise'][$i]['recovered']; ?></td>
                            <td><?php echo  $actualdata['statewise'][$i]['deaths']; ?></td>
                        </tr>


                    <?php
                        $i++;

                }
            ?>


            </table>



        </div>




    </section>








<!-- toparrow -->
    <div class="scrollTop float-right mb-5 pr-5">
        <i class="fas fa-chevron-up" onclick="scrlTop()" id="topArrow"></i>
    </div>


<!-- Footer -->

    <footer class="mt-5 pt-2 pb-3 bg-dark text-white">
        <div class="text-center justify-content-arouund foot_sty d-flex">
             <p class="ml-5">Important Links:<span class="pl-2"> <a class="btn btn-outline-light p-2" href="https://www.mygov.in/aarogya-Setu-app/">Aarogya Setu</a></span>
                                             <span class="pl-2"> <a class="btn btn-outline-light p-2" href="https://www.mygov.in/cowin.gov.in/">CoWin</a></span>
             </p>
             <div class="ml-auto mr-5">Copyright &copy;SP </div> 
        </div>
    </footer>

<!-- <script type="text/javascript" src="script.js">    </script> -->


       
<script>
 
    
var Arrow = document.getElementById('topArrow');

window.onscroll = function(){
    if(document.body.scrollTop>150 || document.documentElement.scrollTop>150){
        Arrow.style.display="block";
    }else{
        Arrow.style.display="none";
    }
}

function scrlTop(){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>


