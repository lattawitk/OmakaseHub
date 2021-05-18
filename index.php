<!DOCTYPE html>
<html>
  <head>
    <?php require 'heading/head.php'; ?>
     
     <title>OmakaseHub</title>
     <link href="css/home.css" rel="stylesheet" type="text/css" />
  </head>

  

  <body ng-app="homeApp" ng-controller="homeAppController">
    <!-- 
    Navbar
     -->
      <?php require'heading/navbar.php'; ?>
    <!-- 
    Carousel
    -->
    <div id="demo" class="carousel slide bg-secondary" data-ride="carousel" >
    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="img/home_img/pro1.jpeg" class="d-block" >
      </div>

      <div class="carousel-item">
        <img src="img/home_img/pro2.png" class="d-block" >
        
      </div>
    
      <div class="carousel-item" >
        <img src="img/home_img/pro3.png" class="d-block" >
  
      </div>
  
    </div>
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
  <!-- 
      
    
    Restaurant
    
    
  -->
  <div class="main container-fluid" style="padding: 2% 5% ">
    <br><h2 style="color:#D4B22C">Our Omakase Restaurants </h2><br>
    
   
    <div class="row">
        
        <div class="col-sm-3">
          <div class="card" >
            <img class="card-img-top" src="img/home_img/koko.jpg" >
            <div class="card-body">
              <div class="card-title d-flex justify-content-between ">
                <div class="p-2 "><h5 style="color:#D4B22C" >KOKO </h5></div>
                <div class="p-2 "><span class="fas fa-star" ></span> {{restStar[0].star}}</div>
              </div>
             
              <div class="card-text d-flex justify-content-between ">
                <div class="p-2 "><span class="fas fa-map-marker-alt" ></span> Siam</div>
                <div class="p-2 "><span class="fas fa-tag" ></span> {{restInfo[0].price}} ++</div>
              </div>
              <br>
              <a  class="btn btn-dark" style="color:#D4B22C; width: 100%;" ng-click="book('OMK001')">Book</a>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card" >
            <img class="card-img-top" src="img/home_img/mizu.jpg" >
            <div class="card-body">
              <div class="card-title d-flex justify-content-between ">
                <div class="p-2 "><h5 style="color:#D4B22C" >MIZU MORI</h5></div>
                <div class="p-2 "><span class="fas fa-star" ></span> {{restStar[1].star}}</div>
              </div>
              
              <div class="card-text d-flex justify-content-between ">
                <div class="p-2 "><span class="fas fa-map-marker-alt" ></span> Silom</div>
                <div class="p-2 "><span class="fas fa-tag" ></span> {{restInfo[1].price}}</div>
              </div>
              
              <br>
              <a href="#" class="btn btn-dark" style="color:#D4B22C; width: 100%;" ng-click="book('OMK002')">Book</a>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card" >
            <img class="card-img-top" src="img/home_img/seiryu.jpg" >
            <div class="card-body">
              <div class="card-title d-flex justify-content-between ">
                <div class="p-2 "><h5 style="color:#D4B22C" >SEIRYU</h5></div>
                <div class="p-2 "><span class="fas fa-star" ></span> {{restStar[2].star}}</div>
              </div>
          
              <div class="card-text d-flex justify-content-between ">
                <div class="p-2 "><span class="fas fa-map-marker-alt"></span> Ekkamai</div>
                <div class="p-2 "><span class="fas fa-tag"></span> {{restInfo[2].price}}</div>
              </div>
              <br>
              <a href="#" class="btn btn-dark" style="color:#D4B22C; width: 100%;" ng-click="book('OMK003')">Book</a>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card" >
            
            <img class="card-img-top" src="img/home_img/ten.jpg" >
            <div class="card-body">
              <div class="card-title d-flex justify-content-between ">
                <div class="p-2 "><h5 style="color:#D4B22C" >Omakase Ten</h5></div>
                <div class="p-2 "><span class="fas fa-star" ></span> {{restStar[3].star}}</div>
              </div>
              
              <div class="card-text d-flex justify-content-between ">
                <div class="p-2 "><span class="fas fa-map-marker-alt"></span> Thonglor</div>
                <div class="p-2 "><span class="fas fa-tag"></span> {{restInfo[3].price}}</div>
              </div>
              <br>
              <a href="#" class="btn btn-dark" style="color:#D4B22C; width: 100%;" ng-click="book('OMK004')">Book</a>
            </div>
          </div>
        </div>


       
      
    </div><!--- row --->
       
       
   </div>









  </body>
</html>
<script>
var homeApp = angular.module('homeApp', []);

    homeApp.controller('homeAppController', function($scope, $http) {
		
  
    $http.get('/database/getAllrestaurant.php').then(function(response) {
            $scope.restInfo = response.data;
            console.log(response)
     });
     $http.get('/database/getRestStar.php').then(function(response) {
            $scope.restStar = response.data;
            console.log(response)
     });
     $scope.book = function(id) {
            $.post('/database/setRestSession.php', {
                restID : id
            }, function(data) {
                location.assign('restaurant.php');
              
            });
      }
      
    
	
	});
	
</script>