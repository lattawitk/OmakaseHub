<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require 'heading/head.php'; ?>
    <title>History</title>
    <link href="css/hostory.css" rel="stylesheet" type="text/css" />
  </head>

  <body>
    <div ng-app="historyApp" ng-controller="historyAppController">
    <!-- Angular Part -->
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
      <div class="container">
        <div class="row" style="height: auto">
          <div class="col-sm-12" style="background-color: #f0f0f0">
            <p class="h1 p-5" style ="text-align :center; color:#D4B22C;">Booking History</p>
              <div class="container">
              <table class="table table-hove" style ="text-align :center;">
                <thead class="thead-dark">
                  <tr>
                    <th>Booking ID</th>
                    <th>Restaurant</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Seat</th>
                    <th></th>
                    <th></th>
                   
                  </tr>
                </thead>
                <tbody>
                  <tr class="white" ng-repeat="x in hisdata">
                    <td>book{{x.bookingID}}</td>
                    <td>{{x.restaurantName }}</td>
                    <td>{{x.Date }}</td>
                    <td>{{x.Time }}</td>
                    <td>{{x.bookSeat }}</td>
                    <td> 
                      <p class='text-danger' ng-show="x.status == '1'">Canceled</p>
                      <button class="btn btn-danger" ng-show="x.status == '0'" ng-click="bookCancel(x)">Cancel Booking</button>
                    </td>
                    <td>
                      <p class='text-warning' ng-show="x.reviewCheck == '1' && x.status == '0'"">Reviewed</p>
                      <button class="btn btn-warning" ng-show="x.reviewCheck == '0' && x.status == '0'" ng-click="goReview(x)">Review</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            
            

          </div>
        </div>
       </div>
     
    </div>
   </div>
    
      
  </body>
</html>

<script>
var historyApp = angular.module('historyApp', []);

    historyApp.controller('historyAppController', function($scope, $http) {
		
      $http.get('/database/bookinghisTable.php').then(function(response) {
              $scope.hisdata = response.data;
              console.log(response)
       });
       
       $scope.bookCancel = function(bookItem) {
                $.post('/database/cancelBooking.php', {
                    bookID : bookItem.bookingID   
                }, function(data) {
                    alert("Already canceled!");
                    location.assign('history.php');
                    
                });
        }  
        $scope.goReview = function(bookItem) {
                $.post('/database/setReviewSession.php', {
                    reviewID : bookItem.bookingID   
                }, function(data) {
                    location.assign('review.php');
                });
        }  
     
    
	
	});
	
</script>