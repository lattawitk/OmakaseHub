<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require 'heading/head.php'; ?>
    <title>Booking</title>
    <link href="css/booking.css" rel="stylesheet" type="text/css" />
  </head>

  <body ng-app="bookingApp" ng-controller="bookingControl">
    <!-- Angular Part -->
    <?php
        session_start();
        if(isset($_SESSION["cus_id"]) == False )
         {
             echo "<script type='text/javascript'>alert('Please sign in!!');
            window.location='signin.php';
            </script>";
         }
     ?>
    <?php require'heading/navbar.php'; ?>
    <div class="main">
      <div class="container">
        <div class="row" style="height: auto">
          <div class="col-sm-12" style="background-color: #f0f0f0">
            <p class="h1 p-5" style ="text-align :center; color:#D4B22C;">{{restable[0].restaurantName}}</p>
            <div class="container">
              <h4><span style =" color:#D4B22C;" >Round Details</span> (You can select round by clicking row in the table)</h4>
              <table class="table table-hover" style ="text-align :center;">
                <thead class="thead-dark" >
                  <tr> 
                    <th style ="color:#D4B22C;">Day</th>
                    <th style ="color:#D4B22C;">Round</th>
                    <th style ="color:#D4B22C;">Remaining Seats</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="white" ng-repeat="x in routable" ng-click="addRound(x)">
                    <td>{{ x.date }}</td>
                    <td>{{ x.time }}</td>
                    <td>{{ x.remainSeat }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <br />
            <div class="container" ng-init="show-detail = 'false'">
              <h3 style="color:#D4B22C;" >Select Detail</h3>
                <p class="text-danger" ng-hide="showdetail">Please select round by clicking row in the table<p>
                <div ng-show="showdetail">
                  <p> Select Day : {{roundSelected.date}} </p>
                  <p> Select Round : {{roundSelected.time}}</p>
                
                  <p>Reservation :
                  <select ng-model="seatnum" ng-change="calculatePrice()" ng-init="seatnum=1">
                      <option ng-repeat="x in [].constructor(number) track by $index">{{ $index+1 }}</option>
                  </select>
                  </p>
                  <p> Price per seat : {{restable[0].price}}</p>
                  <p> Total Price : {{totalprice}}</p>
                  <button  class="btn btn-dark " style="color:#D4B22C; width: 100%;" ng-click="bookConfirm()">
                    Confirm booking
                  </button>
                 </div>
                <br />
                <br />
                <br />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script>
      var bookingApp = angular.module("bookingApp", []);
      bookingApp.controller("bookingControl", function ($scope, $http) {
        $http.get("/database/roundTable.php").then(function (response) {
          $scope.routable = response.data;
          console.log(response);  
        });
        $http.get('/database/resTable.php').then(function(response) {
          $scope.restable = response.data;
          console.log(response)
        });
        
        $scope.addRound = function(round) {
             
             $scope.roundSelected = round;
             //alert("Already selected round, now you can fill number of seat before submit!");      
             $scope.number = parseInt(round.remainSeat); 
             $scope.showdetail = true;
             $scope.calculatePrice();
       }   
       $scope.calculatePrice = function() {
             $scope.totalprice = $scope.restable[0].price * $scope.seatnum;
             
       } 
         $scope.bookConfirm = function() {
              $.post('/database/createBooking.php', {
                  roundID : $scope.roundSelected.roundID,
                  seat : $scope.seatnum
              }, function(data) {
                  alert("Already booked!");
                  location.assign('history.php');
                  
              });
        }   
            
      });
       
    </script>
  </body>
</html>
