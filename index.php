<?php session_start();?>
<!DOCTYPE HTML>
<html>
<head> 
<style type="text/css">
    /* 
        Use :not with impossible condition so inputs are only hidden 
        if pseudo selectors are supported. Otherwise the user would see
        no inputs and no highlighted stars.
    */
    .rating input[type="radio"]:not(:nth-of-type(0)) {
        /* hide visually */    
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }
    .rating [type="radio"]:not(:nth-of-type(0)) + label {
        display: none;
    }
    
    label[for]:hover {
        cursor: pointer;
    }
    
    .rating .stars label:before {
        content: "★";
    }
    
    .stars label {
        color: lightgray;
    }
    
    .stars label:hover {
        text-shadow: 0 0 1px #000;
    }
    
    .rating [type="radio"]:nth-of-type(1):checked ~ .stars label:nth-of-type(-n+1),
    .rating [type="radio"]:nth-of-type(2):checked ~ .stars label:nth-of-type(-n+2),
    .rating [type="radio"]:nth-of-type(3):checked ~ .stars label:nth-of-type(-n+3),
    .rating [type="radio"]:nth-of-type(4):checked ~ .stars label:nth-of-type(-n+4),
    .rating [type="radio"]:nth-of-type(5):checked ~ .stars label:nth-of-type(-n+5) {
        color: orange;
    }
    
    .rating [type="radio"]:nth-of-type(1):focus ~ .stars label:nth-of-type(1),
    .rating [type="radio"]:nth-of-type(2):focus ~ .stars label:nth-of-type(2),
    .rating [type="radio"]:nth-of-type(3):focus ~ .stars label:nth-of-type(3),
    .rating [type="radio"]:nth-of-type(4):focus ~ .stars label:nth-of-type(4),
    .rating [type="radio"]:nth-of-type(5):focus ~ .stars label:nth-of-type(5) {
        color: darkorange;
    }
</style>


</head>
<style>
    *{
        font-family: Roboto, sans serif    
    
    }
    .container{
        margin: 1rem;


    }


</style>



<body style="background-color: #f5f5f5">
    <div class="container">
        <?php
            foreach ($_SESSION['reviews'] as $name => $review){
                echo $name.$review;
            }


        ?>


        <form method="POST" action="sendreview.php">
            <input type="text" name="name" placeholder="nome" required/>
            <div class="rating" >
                <input id="rating-1" type="radio" name="rating" value="1"> 
                <label for="rating-1">1 star</label>
                <input id="rating-2" type="radio" name="rating" value="2">
                <label for="rating-2">2 stars</label>
                <input id="rating-3" type="radio" name="rating" value="3">
                <label for="rating-3">3 stars</label>
                <input id="rating-4" type="radio" name="rating" value="4">
                <label for="rating-4">4 stars</label>
                <input id="rating-5" type="radio" name="rating" value="5">
                <label for="rating-5">5 stars</label>
                
                <div class="stars">
                <label for="rating-1" aria-label="1 star" title="1 star"></label>
                <label for="rating-2" aria-label="2 stars" title="2 stars"></label>
                <label for="rating-3" aria-label="3 stars" title="3 stars"></label>
                <label for="rating-4" aria-label="4 stars" title="4 stars"></label>
                <label for="rating-5" aria-label="5 stars" title="5 stars"></label>   
                </div>

                <button type="submit">invia</button>
            </div>
        </form>
        <a href="./deleteall.php"><button>Elimina tutto</button></a>
    </div>
</body>
</html>
