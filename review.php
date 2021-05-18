<!DOCTYPE html>
<html>
  <head>
     <?php require 'heading/head.php'; ?>
    
    <title>Review</title>
    <link href="css/review.css" rel="stylesheet" type="text/css" />
    
  </head>
  <body style="background-color:#f0f0f0;">
    <?php require'heading/navbar.php'; ?>
    <?php
        session_start();
        if(isset($_SESSION["cus_id"]) == False )
         {
             echo "<script type='text/javascript'>alert('Please sign in!!');
            window.location='signin.php';
            </script>";
         }
     ?>
    <div class="main">
      <div ng-app="reviewApp" ng-controller="reviewAppController">
        <div class="main container-fluid" style="padding: 2% 5% ">
               <p class="h1 p-5" style ="text-align :center; color:#D4B22C;">Review Restaurant</p>
                 <div class="container">
                    <h4 style="color:black;" >Booking Detail</h4>
                    <p>Bookind ID : {{reviewdata[0].bookingID}} </p>
                    <p>Restaurant : {{reviewdata[0].restaurantName}} </p>
                    <p>Date :  {{reviewdata[0].Date}}</p>
                    <p>Time :  {{reviewdata[0].Time}}</p>
                    <p>Rate :  
                      <select ng-model="score" ng-init="score=1">
                      <option> 5 </option>
                      <option> 4 </option>
                      <option> 3 </option>
                      <option> 2 </option>
                      <option> 1 </option>
                      </select>
                    </p>
                    <label for="review">Review : </label><br>
                    <textarea ng-model="textreview" id="review" name="review" rows="4" cols="50">
  
                    </textarea>
                     <br><br><button class="btn btn-dark" style="color:#D4B22C;" ng-click="reviewConfirm()">Review</button>
                     
                     
              
                  </div>
        
        
                </div>
            </div>
          </div>
         
    </div>
    
    
   </body>  
  </html>

<script>
var reviewApp = angular.module('reviewApp', []);

    reviewApp.controller('reviewAppController', function($scope, $http) {
		
      $http.get('/database/writeReviewtable.php').then(function(response) {
              $scope.reviewdata = response.data;
              console.log(response)
      });
      
        $scope.reviewConfirm = function() {
             $.post('/database/createReview.php', {
                score : $scope.score,
                reviewDetail : $scope.textreview,
                restaurantID : $scope.reviewdata[0].restaurantID
            }, function(data) {
                alert("Thanks for your review!");
                location.assign('history.php');
            });
        }
    
    });
          
      
    
	
</script>