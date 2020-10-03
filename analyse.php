<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "testing");
$query = "SELECT * FROM enfant;";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ nom:'".$row["nom"]."', Age:".$row["age"].", gender:".$row["genre"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>SMART crèche</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" /></script>
     <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <script src=http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-panels.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
      <link rel="stylesheet" href="css/skel-noscript.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/style-desktop.css" />
    </noscript>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
  <!-- Header -->
    <div id="header">
      <div class="container">
        
        <!-- Logo -->
        <div id="logo">
          <h1><a href="#">SMART crèche</a></h1>
        </div>
        
        <!-- Nav -->
        <nav id="nav">
          <ul>
            <li><a href="index.html">Accuiel</a></li>
            <li class="active"><a href="twocolumn1.html">Nos services</a></li>
            <li><a href="twocolumn2.html">Portail famille</a></li>
            <li><a href="regester.php">Mon espace</a></li>
            <li><a href="onecolumn.html">Contact</a></li>
          </ul>
        </nav>

      </div>
    </div>
    <!-- Header -->

    <!-- Banner -->
    <div id="banner">
      <div class="container">


      </div>
    </div>

  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center"></h2>
   <h3 align="center"></h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
    <div id="footer">
      <div class="container">
        <section>
          <header>
            <h2>SMART crèche  </h2>
            <span class="byline">C'est par ce que c'est le future de notre enfants qui est en jeux nous avons ameliorer leur future </span>
          </header>
          <div class="row">
            <section class="4u">
              <a href="#" class="image full"><img src="img\image14.jpg" alt=""></a>
            </section>
            <section class="4u">
              <a href="#" class="image full"><img src="img/image16.jpg" alt=""></a>
            </section>
            <section class="4u">
              <a href="analyse.php" class="image full"><img src="img/image17.jpg" alt=""></a>
            </section>
          </div>
          <a href="#" class="button">Retour e haut</a>
        </section>
      </div>
    </div>
 </body>
</html>
 
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'nom',
 ykeys:['gender', 'Age'],
 labels:['gender', 'Age'],
 hideHover:'auto',
 stacked:true
});
</script>