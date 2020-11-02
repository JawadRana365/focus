<?php 
require_once(APPPATH.'../public/admin/Header.php');?>
<!-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Student
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Student</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" >
  	<h2>Create Student</h2><br><br>
    <form action="<?php echo base_url('Statistics');?>" method="post" class="form-inline">
	</form>
</div>
<div class="container"> 
  <div class="row">
    <div class="receipt-main col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-app="createStudent" ng-controller="createStudentCtrl">
      <form id="classform">
        <div class="form-group">
          <label>{{result}}</label>
        </div>
        <div class="form-group">
          <label>First name:</label>
          <input type="text" id="first_name" name="first_name" ng-model="first_name" class="form-control" required="true">
        </div>
        <div class="form-group">
          <label>Last Name:</label>
          <input type="text" id="last_name" name="last_name" ng-model="last_name" class="form-control" required="true">
        </div>
        <div class="form-group">
          <select id="class" ng-model="class" name="class" class="form-control" required="true">
            <option ng-repeat="item in classes" value="{{ item.id }}">
              {{ item.name }}
            </option>
          </select>
        </div>
        <div class="form-group">
          <label>Date Of Birth:</label>
          <input type="date" id="date_of_birth" name="date_of_birth" ng-model="date_of_birth" class="form-control">
        </div>
        <div class="form-inline pull-right">
          <input type="button" value="Submit" class="form-control" ng-click="callApi()">
          <input type="reset" value="Reset" class="form-control">
        </div>
      </form>
    </div>
  </div>
</div>
<?php require_once(APPPATH.'../public/admin/Footer.php'); ?>
<script>
var app = angular.module('createStudent', []);
app.controller('createStudentCtrl', function($scope, $http) {

  $scope.classes = [];
  $http.get("<?=base_url('Api/getClass')?>").then(function mySuccess(response) {
      $scope.classes = response.data.classes; 
    }, function myError(response) {
      console.log(response.data);
  });


  $scope.callApi = function() {
    $http({
      method : "POST",
       headers: {
         'Content-Type': 'application/json'
       },
      data : {'first_name' : $scope.first_name, 'last_name': $scope.last_name, 'class': $scope.class, 'date_of_birth': $scope.date_of_birth},
      url : "<?=base_url('Api/createStudent')?>"
    }).then(function mySuccess(response) {
        $scope.result = response.message;
        alert("Student Created Successfully");
        window.location.reload();
      }, function myError(response) {
        $scope.result = response.message;
        alert("Sorry Try Again");
    });
  }
});
</script>