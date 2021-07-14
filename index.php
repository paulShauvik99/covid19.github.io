<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Covid-19</title>
    <?php include 'links/links.php' ?>
    <?php include 'css/style.php'   ?>
</head>
<body>

    <nav class="p-4 navbar nav_style navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand pl-5" href="#">Covid-19</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto pr-5 text-capitalize text-center">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#symp">Symptoms</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#prevent">prevention</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#statesUpd">india state updates</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cont">Contact</a>
        </li>
        </ul>
    </div>
    </nav>
<!-- //Intro -->
    <div class="headerMain">
        <div class="row w-100 h-100">
            <div class="col-lg-6 col-md-6 col-12 order-lg-1 order-2">                
                <div class="left w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="images/cartoon-character-with-doctors-nurses-medical-staff-holding-poster-requesting-people-avoid-corona-virus-covid-19-spreading-by-staying-home-corona-virus-disease-awareness_3559-1555.jpg" class="limg" alt="corona" height="150px" width="300px">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 order-lg-2 order-1 ">
                <div class="right w-100 h-100 d-flex justify-content-center align-items-center">
                    <h1  class="text-center rtxt">Let's Stay Safe and Fight Against The Cor<span class="rot align-items-center"><img src="images/coronavirus-cartoon-qvG66r8-600.jpg" alt="?" height="88px" width="88px"></span>na Virus</h1>
                </div>                
            </div>
        </div>

    </div>

<!-- Updates -->

    <section class="updates">
        <div class="container mb-5">
            <h2 class="text-center text-uppercase">Covid-19 <span class="text-primary"> India </span> Updates</h2>
        </div>
    <?php 
        $data = file_get_contents('https://api.covid19india.org/data.json');

        $actualdata = json_decode($data,true);

        // echo $actualdata['statewise'][1]['state'];

        $count = count($actualdata['statewise']);
    
        $dailyUpdates = $actualdata['cases_time_series'];
        $lastUpd = end($dailyUpdates);    
    ?>
        <div class="d-flex justify-content-around pb-5 align-items-center">
            <div class="text-warning"> 
                <h1 class="counts" id="tc"> <?php echo number_format($lastUpd['totalconfirmed']); ?> </h1>
                <p>Total Cases</p>            
            </div>
            <div class="text-primary"> 
                <h1 class="counts" id="ac"> <?php echo number_format($lastUpd['totalconfirmed']-$lastUpd['totalrecovered']-$lastUpd['totaldeceased']); ?> </h1>
                <p>Active Cases</p>            
            </div>
            <div class="text-success"> 
                <h1 class="counts" id="tr"> <?php echo number_format($lastUpd['totalrecovered']); ?> </h1>
                <p>Total Recovered</p>            
            </div>
            <div class="text-danger"> 
                <h1 class="counts" id="td"> <?php echo number_format($lastUpd['totaldeceased']); ?> </h1>
                <p>Total Deaths</p>            
            </div>
        </div>
        <div class="d-flex justify-content-around pt-5 align-items-center">
            <div class="text-warning"> 
                <h1 class="counts" id="nc"> <?php echo number_format($lastUpd['dailyconfirmed']); ?> </h1>
                <p>New Cases</p>            
            </div>
            
            <div class="text-success"> 
                <h1 class="counts" id="nr"> <?php echo number_format($lastUpd['dailyrecovered']); ?> </h1>
                <p>New Recovered</p>            
            </div>
            <div class="text-danger"> 
                <h1 class="counts" id="nd"> <?php echo number_format($lastUpd['dailydeceased']); ?> </h1>
                <p>New Deaths</p>            
            </div>
        
        </div>
    </section>
            <br><br>

    <div class="container justify-content-center d-flex" id="statesUpd">
        <button class="btn btn-info btnshow p-3 dropdown-toggle" > Tap to See State Wise report </button>
    </div>


<!-- statewise corona data -->

<section class="covstate container-fluid">

<div class="my-5">
    <h1 class="text-center text-uppercase stateHead">Covid-19 <span class="stateInd"> India States</span> Live Update</h1>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped text-center table-hover ">

        <tr>
            <th class="lastUpdCell"> Last Updated Time </th>
            <th class="staCell"> State </th>
            <th class="bg-warning"> Confirmed Cases </th>
            <th class="bg-primary"> Active Cases </th>
            <th class="bg-success"> Recovered </th>
            <th class="bg-danger"> Total Deaths </th>

        </tr>
    <?php
        $i = 1;

        while($i<$count){
            
            if($i!=31){
                ?>    
                
                <tr>
                    <td class="lastUpdCell "><?php echo  $actualdata['statewise'][$i]['lastupdatedtime']; ?></td>
                    <td class="staCell "><?php echo  $actualdata['statewise'][$i]['state']; ?></td>
                    <td class="bg-warning "><?php echo  number_format($actualdata['statewise'][$i]['confirmed']); ?></td>
                    <td class="bg-primary "><?php echo  number_format($actualdata['statewise'][$i]['active']); ?></td>
                    <td class="bg-success "><?php echo  number_format($actualdata['statewise'][$i]['recovered']); ?></td>
                    <td class="bg-danger "><?php echo  number_format($actualdata['statewise'][$i]['deaths']); ?></td>
                </tr>


            <?php
            
            }
            $i++;

        }
    ?>


    </table>



</div>




</section>







<!-- About  -->

    <div class="container-fluid about pt-2 mt-5 pb-5 bg-light" id="about">
        <div class="aboutHead text-center mt-3 mb-5 ">
            <h1 class="text-info">About COVID-19</h1>
        </div>

        <div class="row">
            <div class="col-lg-5 abtimg col-md-6 col-12 ml-5 h-100">
                <img src="images/COVID-19-Virus-Structure-Diagram.jpg" alt="?" class="img-fluid pt-5">
            </div>
            <div class="col-lg-6 col-md-6 col-12 pt-1 cvd">
                <h2>What is Corona Virus?</h2>
                <p>A coronavirus is a kind of common virus that causes an infection in your nose, sinuses, or upper throat. Most coronaviruses aren't dangerous.</p>
                <p>In early 2020, after a December 2019 outbreak in China, the World Health Organization identified SARS-CoV-2 as a new type of coronavirus. The outbreak quickly spread around the world.</p>
                <p>COVID-19 is a disease caused by SARS-CoV-2 that can trigger what doctors call a respiratory tract infection. It can affect your upper respiratory tract (sinuses, nose, and throat) or lower respiratory tract (windpipe and lungs).</p>
                <p>It spreads the same way other coronaviruses do, mainly through person-to-person contact. Infections range from mild to deadly.</p>
                <p>SARS-CoV-2 is one of seven types of coronavirus, including the ones that cause severe diseases like Middle East respiratory syndrome (MERS) and sudden acute respiratory syndrome (SARS). The other coronaviruses cause most of the colds that affect us during the year but aren’t a serious threat for otherwise healthy people.</p>
            </div>
        </div>

    </div>


<!-- Symptoms -->

    <div class="container-fluid mb-5 mt-5" id="symp">
        <div class="symp text-center pt-3 pb-5 text-warning">
            <h1>Covid-19 Symptoms</h1>
        </div>

        <div class="row pt-4">
            <div class="col-lg-4 col-md-4 col-12">
                <figure class="text-center">
                    <img src="images/fever.jpg" class="img-fluid" alt="fever" height="130" width="130">
                    <figcaption class="mt-3">Fever</figcaption >
                </figure>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <figure class="text-center">
                    <img src="images/cough.jpg" class="img-fluid" alt="fever" height="130" width="130">
                    <figcaption class="mt-3">Cough</figcaption >
                </figure>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <figure class="text-center">
                    <img src="images/Congestion-runny nose.jpg" class="img-fluid" alt="fever" height="130" width="130">
                    <figcaption class="mt-3">Congestion/Runny Nose</figcaption >
                </figure>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <figure class="text-center">
                    <img src="images/headache.jpg" class="img-fluid" alt="fever" height="130" width="130">
                    <figcaption class="mt-3">Headache</figcaption >
                </figure>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <figure class="text-center">
                    <img src="images/trouble breathing.jpg" class="img-fluid" alt="fever" height="130" width="130">
                    <figcaption class="mt-3">Difficulty in Breathing</figcaption >
                </figure>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <figure class="text-center">
                    <img src="images/Nausea.jpg" class="img-fluid" alt="fever" height="130" width="130">
                    <figcaption class="mt-3">Nausea</figcaption >
                </figure>
            </div>  
        </div>

    </div>


<!-- //Prevention -->

    <div class="container-fluid pb-5 pt-3 bg-light" id="prevent">
        <div class="symp text-center mt-5 mb-5 text-info">
            <h1>6 Steps to Prevent Yourself From COVID-19 </h1>
        </div>
        
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 pb-3">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <figure>    
                                <img src="images/mask.jpg" alt="?" height="90" width="90">
                            </figure>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="text-success">Wear a mask</h5>
                            <p>If you are aged 2 or older, you should wear a mask in indoor and public places.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12 pb-5">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <figure>
                                <img src="images/distance.png" alt="?" height="90" width="90">
                            </figure>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 ">
                            <h4 class="text-success">Stay 6 feet away from others</h5>
                            <p>Avoid close contact with people who are sick.If possible, maintain 6 feet between the person who is sick and other household members.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <figure>
                                <img src="images/vaccinated.jpg" alt="?" height="90" width="90">
                            </figure>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="text-success">Get Vaccinated</h5>
                            <p>Authorized COVID-19 vaccines can help protect you from COVID-19.You should get a COVID-19 vaccine when it is available to you.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <figure>
                                <img src="images/crowd.jpg" alt="?" height="90" width="90">
                            </figure>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="text-success">Avoid crowds and poorly ventilated spaces</h5>
                            <p>Being in crowds like in restaurants, bars, fitness centers, or movie theaters puts you at higher risk for COVID-19.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <figure>
                                <img src="images/disinfect.gif" alt="?" height="90" width="90">
                            </figure>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="text-success">Clean and disinfect</h5>
                            <p>Clean high touch surfaces daily. This includes tables, doorknobs, light switches, countertops, handles, desks, phones, keyboards, toilets, faucets, and sinks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <figure>
                                <img src="images/wash.jpg" alt="?" height="90" width="90">
                            </figure>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="text-success">Wash your hands often</h5>
                            <p>Wash your hands often with soap and water for at least 20 seconds especially after you have been in a public place, or after blowing your nose, coughing, or sneezing. Or use a hand sanitizer that contains at least 60% alcohol. Cover all surfaces of your hands and rub them together until they feel dry.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>


<!-- Contact Form -->


    <div class="container mt-5 mb-5 col-md-5" id="cont">
        <div class="form pt-3">
            <form action="" method="POST">
                <div class="form-header text-center font-weight-bold">
                    <h1>Contact Us</h1>
                </div>
                    <br><br>

                <div class="form-group">
                    <label><i class="fas fa-user-alt pl-2"></i> Name: </label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name." required>
                
                </div>
                    <br>
                
                <div class="form-group">
                    <label><i class="fa fa-envelope pl-2" ></i> E-mail Address: </label>
                    <input name="mail" type="email" class="form-control" placeholder="E-mail Address" required>
                </div>
                    <br>
                
                <div class="form-group">
                    <label><i class="fa fa-mobile pl-2"></i> Mobile Number:</label>
                    <input name="num" type="number" class="form-control" placeholder="Enter Your Mobile Number" required>
                </div>
                    <br>

                <div class="form-group">
                    <label><i class="fas fa-diagnoses pl-1"></i> Check Symoptoms: </label><br>

                    <div class="custom-control custom-checkbox custom-control-inline text-capitalize">
                        <input type="checkbox" class="custom-control-input" id="checkbox1" name="symp[]" value="Cold">
                        <label for="checkbox1" class="custom-control-label">Cold</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline text-capitalize">
                        <input type="checkbox" class="custom-control-input" id="checkbox2" name="symp[]" value="Fever">
                        <label for="checkbox2" class="custom-control-label">Fever</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline text-capitalize">
                        <input type="checkbox" class="custom-control-input" id="checkbox3" name="symp[]" value="Feeling Weak">
                        <label for="checkbox3" class="custom-control-label">Feeling Weak</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline text-capitalize">
                        <input type="checkbox" class="custom-control-input" id="checkbox4" name="symp[]" value="Difficulty in Breatheing">
                        <label for="checkbox4" class="custom-control-label">Difficulty in Breathing</label>
                    </div>
                </div>
                    <br>
                <div class="form-group">
                    <label for="msg"><i class="fas fa-comment-alt pl-2"></i> Message</label>
                    <textarea class="form-control" name="msg" rows="3" placeholder="Write Your Message Here."></textarea>
                </div>
                    <br>
                <button type="submit" name="submit" class="btn  mb-2 form-control btn-outline-info font-weight-bold stybtn">Submit</button>


            </form>
        </div>
    </div>

<!-- toparrow -->
    <div class="scrollTop float-right mb-5 pr-5">
        <i class="fas fa-chevron-up" onclick="scrlTop()" id="topArrow"></i>
    </div>


<!-- Footer -->

    <footer class="mt-5 pt-2 pb-3 bg-dark text-white">
        <div class="text-center justify-content-arouund foot_sty d-flex">
             <p class="ml-5">Important Links:<span class="pl-2"> <a class="btn btn-outline-light p-2" href="https://www.mygov.in/aarogya-Setu-app/">Aarogya Setu</a></span>
                                             <span class="pl-2"> <a class="btn btn-outline-light p-2" href="https://www.cowin.gov.in/">CoWin</a></span>
             </p>
             <div class="ml-auto mr-5">Copyright &copy;SP </div> 
        </div>
    </footer>

<!-- <script type="text/javascript" src="script.js">    </script> -->
<script>
    $(document).ready(function(){
        $('.btnshow').click(function(){

            $('.covstate').toggle(1500);
        });
    })
    
 
    
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


<?php
    include 'dbcon.php';

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $email = $_POST['mail'];
        $number = $_POST['num'];
        $symp = $_POST['symp'];
        $msg = $_POST['msg'];

        $chk = "";
        foreach($symp as $chk1){
            $chk .=$chk1.", ";
        }

        $ins = "insert into messages(name, email, number, symp, msg) values('$name','$email','$number','$chk','$msg') ";
        $query = mysqli_query($con,$ins);


    }

?>