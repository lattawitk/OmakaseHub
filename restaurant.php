<!DOCTYPE html>
<html>
  <head>
     <?php require 'heading/head.php'; ?>
    
    <title>Restaurant</title>
    <link href="css/restaurant.css" rel="stylesheet" type="text/css" />
    
  </head>
  <body>
    <?php require'heading/navbar.php'; ?>
    <div class="maincontainer" style="background-color: black">
       <div class="container">
        <div class="row" style="height: auto">
          <div class="col-sm-12" style="background-color: #f0f0f0">
            
            <div class="main container-fluid" style="padding: 2% 5% ">
                <div ng-app="restaurantApp" ng-controller="restaurantAppController">
		   
                <h2 style ="text-align:center; color:#D4B22C;">{{dataListRes[0].restaurantName}}</h2><br>
        
                  <!--picture-->
                  <?php
                  session_start();
                  if ($_SESSION["rest_id"] == "OMK001") {
                     echo '<img src="img/rest_img/kokores.jpg" alt="kokores" style="width:50%;">';
                     }
                  elseif ($_SESSION["rest_id"] == "OMK002") {
                     echo '<img src="img/rest_img/mizumori.jpg" alt="mizumori" style="width:50%;">';
                     } 
                  elseif ($_SESSION["rest_id"] == "OMK003") {
                    echo '<img src="img/rest_img/seiryu.jpg" alt="seiryu" style="width:50%;">';
                     } 
                  else {
                    echo '<img src="img/rest_img/omakaseten.jpg" alt="omakaseten" style="width:50%;">';
                    }
                  ?>

                  <br>
       
                  <!---restaurant detail-->
        
                  <div class="container">
      
                  <br>
                  <p>Cheft : {{dataListRes[0].chefName}}</p>
                  <p>Course : {{dataListRes[0].course}}</p>
                  <p>Menu :</p>
                  <ul>
                    <li ng-repeat="x in dataListMenu">
                      {{x.menuName}}
                    </li>
                 </ul>
                 <p>Location : {{dataListRes[0].address}}</p>
                 <p>Tel : {{dataListRes[0].tel}}</p>
                 <p>Price : {{dataListRes[0].price}} Baht</p>
                 <button class="btn btn-dark" style="color:#D4B22C;width:100%; " onclick="document.location='booking.php'">Booking</button>
                 <br><br>
                 
                 </div>

    
                <!---review--->
                  <div class="testimonial-box-container" ng-repeat="x in dataListReview" >
                    <!----box1--->
                      <div class="testimonial-box">
                        <!--top-->
                          <div class="box-top" style="margin-bottom: 20px; display: flex;">
                            <!--profile-->
                              <div class="profile">
                                <div class="name-user">
              
                                   <p><strong> {{ x.name }} </strong></p>
              
                                </div>
                                </div>
                              
                           <!--review-->
                           <div class="reviews">
               
                              <span class="fa fa-star checked" ng-repeat="x in [].constructor( x.score ) track by $index"></span>
                       
                           </div>
                           
                           <br>
                           
                           <div class="client-comment">
                              <p><br>{{ x.reviewDetail }}</p>
                           </div>
                         
                         </div> 
                       </div>
                    </div>
        
        
                </div>
              </div>
             </div>
            </div>
           </div>
          </div>
    
  </body>
</html>

<script>
var restaurantApp = angular.module('restaurantApp', []);

    restaurantApp.controller('restaurantAppController', function($scope, $http) {
		
    $http.get('/database/resTable.php').then(function(response) {
            $scope.dataListRes = response.data;
            console.log(response)
     });
     
     
     $http.get('/database/menuTable.php').then(function(response) {
            $scope.dataListMenu = response.data;
            console.log(response)
     });
    
     $http.get('/database/reviewTable.php').then(function(response) {
            $scope.dataListReview = response.data;
            console.log(response)
     });
	
	});
	
</script>