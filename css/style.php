
<style rel="stylesheet" type="text/css">


*{
    margin: 0;
    padding: 0;
    font-family: 'Dosis', sans-serif;
    
}


html{
    scroll-behavior: smooth;
}


body{
    background: linear-gradient(to right,#FFEFBA,#FFFFFF);
}


.navbar-brand{
    font-size:28px;
    font-weight:800;
}

.nav-item{
    font-size:20px;
}
.nav_style{
    background: linear-gradient(to right,#4da0b0,#d39d38) !important;
    font-weight: bold;
}


.headerMain{
    height:500px;
    width:100%;
}

.limg{
    border-radius: 23px;
}

.rtxt{
    font-family: 'Italianno', cursive;
    font-size: 5.5rem;
}


.rot img{
    border-radius:50%;
    animation: rotater 3s linear infinite;
}

.left img{
    animation: beat 3s ease-in-out infinite;
}


@keyframes beat{
    0%{
        transform: scale(0.75);
    }
    20%{
        transform: scale(1.3);
    }
    40%{
        transform: scale(0.75);
    }
    60%{
        transform: scale(1.3);
    }
    80%{
        transform:scale(1);
    }
    100%{
        transform: scale(0.75);
    }

}

@keyframes rotater { 
    0%{
        transform: rotate(0);
    }
    100%{
        transform: rotate(360deg);
    }
}

/* //update section */


.updates{
    margin:50px 0 70px 0;
}

.updates h1{
    text-align: center;
    font-size: 3rem;
}
.updates h2{
    font-size:4rem;
    text-decoration: underline;
    color: #f03886;
    margin-bottom: 100px;
}
.updates p{
    font-size: 1.7rem;
    font-weight: 600;
    text-align: center;
}

/* about section */

.aboutHead h1{
    font-size:4rem;
    text-decoration: underline;
}




.cvd h2{
    font-size: 3rem;
}

.cvd p{
    font-size: 18px;
}


/* Symptoms */

figcaption{
    font-size:20px;
    font-weight:400;
}
.symp h1{
    text-decoration: underline;
    font-size: 4rem;
    
}


/* form */

.form h1{
    font-size:4rem;
}

.stybtn{
    font-size:20px;
}

/* scrollTop */

#topArrow{
    display:none;
    position: fixed;
    bottom: 50px;
    right: 50px;
    z-index: 99;
    border: none;
    outline: none;
    background-color:#4da0b0;
    color:#fff;
    cursor: pointer;
    padding:12px;
    border-radius:13px;
    transition: all 0.5s ease;
}

#topArrow:hover{
    background-color: #d182e3;
}




/* footer */
.foot_sty{
    max-height: 30px;
}


@media (max-width:768px){
    .abtimg{
        margin-left: 0 !important;
    }
}

/* Statewise data  */
  
    .stateHead{
        font-size:4rem;
        font-weight: 500 ;
        text-decoration: underline;
        color: #ac3b61;
    }

    .stateInd{
        color:#d6ed17ff;
    }
    .covstate{
        display: none;
    }

    .lastUpdCell{
        background: #ff2e66;
    }

    .staCell{
        background: #66fcf1;
    }

    th{
        font-size:1.5rem;
        text-decoration: underline;
    }
    td{
        font-weight: 600;
    }

</style>
