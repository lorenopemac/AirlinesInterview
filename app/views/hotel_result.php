<!DOCTYPE html>
<html>

<head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>

<style>
body{
        margin: 0;
        padding: 0;
        font-family: 'roboto' , sans-serif;
        background-color: #F2F2F2;
    }
    h1{
        text-align: center;
        color: #333333;
    }
    .cardcontainer{
        width: 350px;
        height: 500px;
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        transition: 0.3s;
    }
    .cardcontainer:hover{
        box-shadow: 0 0 45px gray;
    }
    .photo{
        height: 300px;
        width: 100%;
    }
    .photo img{
        height: 100%;
        width: 100%;
    }
    .txt1{
        margin: auto;
        text-align: center;
        font-size: 17px;
    }
    .content{
        width: 80%;
        height: 100px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        top: -33px;
    }
    .photos{
        width: 90px;
        height: 30px;
        background-color: #E74C3C;
        color: white;
        position: relative;
        top: -30px;
        padding-left: 10px;
        font-size: 20px;
    }
    .txt4{
        font-size:27px;
        position: relative;
        top: 33px;
    }
    .txt5{
        position: relative;
        top: 18px;
        color: #E74C3C;
        font-size: 23px;
    }
    .txt2{
        position: relative;
        top: 10px;
    }
    .cardcontainer:hover > .photo{
        height: 200px;
        animation: move1 0.5s ease both;
    }
    @keyframes move1{
        0%{height: 300px}
        100%{height: 200px}
    } 
    .footer{
        width: 80%;
        height: 100px;
        margin-left: auto;
        margin-right: auto;
        background-color: white;
        position: relative;
        top: -15px;
    }
    .btn{
        position: relative;
        top: 20px;
    }
    #heart{
        cursor: pointer;
    }
    .like{
        float: right;
        font-size: 22px;
        position: relative;
        top: 20px;
        color: #333333;
    }
    .fa-gratipay{
        margin-right: 10px;
        transition: 0.5s;
    } 
    .txt3{
        color: gray;
        position: relative;
        top: 18px;
        font-size: 14px;
    }
    .comments{
        float: right;
        cursor: pointer;
    }
    .fa-clock, .fa-comments{
        margin-right: 7px;
    }

</style>
<body> 
    <?php require_once 'app/views/layout/header.php' ?>
    <p><?php echo 'Welcome '.var_dump($this->data["data"])  ?></p>
    <div class="container">
        
        <h1>News Card</h1>
        <div class="cardcontainer">
            <div class="photo">
                <img src="https://images.pexels.com/photos/2346006/pexels-photo-2346006.jpeg?auto=format%2Ccompress&cs=tinysrgb&dpr=1&w=500">
                <div class="photos">Photos</div>
            </div>
            <div class="content">
                <p class="txt4">City Lights In Newyork</p>
                <p class="txt5">A city that never sleeps</p>
                <p class="txt2">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling skyscrapers.</p>
            </div>
            <div class="footer">
                <p><a class="waves-effect waves-light btn" href="#">Read More</a><a id="heart"><span class="like"><i class="fab fa-gratipay"></i>Like</span></a></p>
                <p class="txt3"><i class="far fa-clock"></i>10 Minutes Ago <span class="comments"><i class="fas fa-comments"></i>45 Comments</span></p>
            </div>
        </div>

    </div>

</body>
</html> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


<script>

 

</script>