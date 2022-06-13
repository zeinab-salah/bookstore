<?php
session_start();
//require 'helper.php';
if (!isset($_SESSION['email'])) {
    redirect('siginin.php');
}
require '../php/connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HOME</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--<script src="js.js"></script>-->
      
    </head>
    <body>
      <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }
        
        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }

       document.getElementById('myForm').onclick = function(){
        this.parentNode.parentNode.parentNode
        .removeChild(this.parentNode.parentNode);
        return false;
        };
        </script>

    
        <section>
          <?php
            include 'header.html';
          ?>
        </section>
 

        <main id="main-sec"> 
        <h2>Quick Review :</h2>

      <section class="container">
        
        <section class="scroll-dir">
          <img src="https://rails-assets-us.bookshop.org/assets/ic_fat_arrow_left-78d4b37e9bbb5fee5ded46062f2acb0558ea2c52e03e1d4cf00fe7c668c48dac.svg" id="slide-right" class="img-dir">
        </section>
  
        <section id="content">
        <a href="#">
          <section>
            <img src="../image/History/AncientEgypt.jpg" width="197px" height="255px">
          </section>
        </a>
        <a href="#">
          <section>
            <img src="../image/Math/EssentialCalculus.jpg" width="197px" height="255px">
          </section>
        </a>
        <a href="#">
          <section>
            <img src="../image/Novels/CallMeByYourName.jpg" width="197px" height="255px">
          </section>
        </a>
        <a href="#">
          <section>
            <img src="../image/History/HistoryOfTheBible.jpg" width="197px" height="255px">
          </section>
        </a>
        <a href="#">
          <section>
            <img src="../image//Math/Infinite.jpg" width="197px" height="255px">
          </section>
        </a>
        <a href="#">
          <section>
            <img src="../image/Novels/YouAreNotAlone.jpg" width="197px" height="255px">
          </section>
        </a>
        <a href="#">
          <section>
            <img src="../image/History/BloodLands.jpg" width="197px" height="255px">
          </section>
        </a>
        <a href="#">
          <section>
            <img src="../image/Math/LinearAlgebra.jpg" width="197px" height="255px">
          </section>
        </a>
        <a href="#">
          <section>
            <img src="../image/Novels/TheTopekaSchool.jpg" width="197px" height="255px">
          </section>
        </a>
      </section>
     
      <section class="scroll-dir">
        <img src="https://rails-assets-us.bookshop.org/assets/ic_fat_arrow_right-8cd117ef71cad1e27c159d775f4d2d0a806c8f173deb5be52b4a6dacc7fdfa0d.svg" id="slide-left" class="img-dir">
      </section>
      </section>
       
      <h2>Sugessition:</h2>
      <section class="grid-container">
        <section class="item1">
          <section >
            <img src="../image/Novels/CallMeByYourName.jpg">
          </section>
          <section class="raw">
              <i class="fa fa-2x fa-heart-o" class="raw-st"></i>
              <p class="raw-st">120$</p>
              <i class="fa fa-2x fa-shopping-cart" class="raw-st"></i>
          </section>
        </section>

        <section class="item2">
          <section>
            <img src="../image/Novels/CallMeByYourName.jpg">
          </section>
          <section>
            <i class="fa fa-2x fa-heart-o" class="raw-st"></i>
            <p class="raw-st">120$</p>
            <i class="fa fa-2x fa-shopping-cart" class="raw-st"></i>
          </section>
        </section>

        <section class="item3">
          <section>
            <img src="../image/Novels/CallMeByYourName.jpg">
          </section>
          <section>
            <i class="fa fa-2x fa-heart-o" class="raw-st"></i>
            <p class="raw-st">120$</p>
            <i class="fa fa-2x fa-shopping-cart" class="raw-st"></i>
          </section>
        </section>

        <section class="item4">
          <section>
            <img src="../image/Novels/CallMeByYourName.jpg">
          </section>
          <section>
            <i class="fa fa-2x fa-heart-o" class="raw-st"></i>
            <p class="raw-st">120$</p>
            <i class="fa fa-2x fa-shopping-cart" class="raw-st"></i>
          </section>
        </section>

        <section class="item5">
          <section>
            <img src="../image/Novels/CallMeByYourName.jpg">
          </section>
          <section>
            <i class="fa fa-2x fa-heart-o" class="raw-st"></i>
            <p class="raw-st">120$</p>
            <i class="fa fa-2x fa-shopping-cart" class="raw-st"></i>
          </section>
        </section>

      </section>
      </main>

        <section>
          <?php
            include 'footer.html';
          ?>
        </section>

        <script>
          const rightBtn = document.querySelector('#slide-right');
const leftBtn = document.querySelector('#slide-left');

rightBtn.addEventListener("click", function(event) {
  const conent = document.querySelector('#content');
  conent.scrollLeft += 300;
  event.preventDefault();
});

leftBtn.addEventListener("click", function(event) {
  const conent = document.querySelector('#content');
  conent.scrollLeft -= 300;
  event.preventDefault();
});

        </script>

    </body>
</html>
