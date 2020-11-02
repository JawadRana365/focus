<?php 
require_once(APPPATH.'../public/admin/Header.php');?>
<!-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Class
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Class</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" >
  	<h2> Create Class</h2><br><br>
</div>
<div class="container"> 
  <div class="row">
    <div class="receipt-main col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-app="createClass" ng-controller="createClassCtrl">
      <form id="classform">
        <div class="form-group">
          <label>{{result}}</label>
        </div>
        <div class="form-group">
          <label>Code:</label>
          <input type="text" id="code" name="code" ng-model="code" class="form-control" required="true">
        </div>
        <div class="form-group">
          <label>Name:</label>
          <input type="text" id="name" name="name" ng-model="name" class="form-control" required="true">
        </div>
        <div class="form-group">
          <label>Maximum Students:</label>
          <input type="number" id="maximum_students" ng-model="maximum_students" name="maximum_students" min="1" max="10" class="form-control" required="true">
        </div>
        <div class="form-group">
          <label>Description:</label>
          <textarea id="description" name="description" ng-model="description" class="form-control"></textarea>
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
var app = angular.module('createClass', []);
app.controller('createClassCtrl', function($scope, $http) {
  $scope.callApi = function() {
    $http({
      method : "POST",
       headers: {
         'Content-Type': 'application/json'
       },
      data : {'code' : $scope.code, 'name': $scope.name, 'maximum_students': $scope.maximum_students, 'status': 0, 'description': $scope.description},
      url : "<?=base_url('Api/createClass')?>"
    }).then(function mySuccess(response) {
        $scope.result = response.message;
        alert("Class Created Successfully");
        window.location.reload();
      }, function myError(response) {
        $scope.result = response.message;
        alert("Sorry Try Again");
    });
  }
});
</script>