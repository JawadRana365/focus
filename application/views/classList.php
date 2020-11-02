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
        <li class="active">List</li>
      </ol>
    </section>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" >
  	<h2>Class List</h2><br><br>
    <form action="<?php echo base_url('Statistics');?>" method="post" class="form-inline">
	</form>
</div>
<div class="container"> 
  <div class="row">
    <div class="receipt-main col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-app="updateClass" ng-controller="updateClassCtrl">
      <form id="classform">
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>{{result}}</label>
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>ID:</label>
          <input type="text" id="record_id" name="record_id" ng-model="record_id" class="form-control" readonly="true">
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Code:</label>
          <input type="text" id="code" name="code" ng-model="code" class="form-control" required="true">
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Name:</label>
          <input type="text" id="name" name="name" ng-model="name" class="form-control" required="true">
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Maximum Students:</label>
          <input type="number" id="maximum_students" ng-model="maximum_students" name="maximum_students" min="1" max="10" class="form-control" required="true">
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Description:</label>
          <textarea id="description" name="description" ng-model="description" class="form-control"></textarea>
        </div>
        <div class="form-inline pull-right">
          <input type="button" value="Submit" class="form-control" ng-click="callApi()">
          <input type="reset" value="Reset" class="form-control">
        </div>
      </form><br><hr>
      <div class="mt-5 table-responsive table-bordered">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Code</th>
              <th>Name</th>
              <th>Maximum Student</th>
              <th>Description</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody id="tablebody">
            <tr ng-repeat="(k,x) in classes">
              <td>{{ x.code }}</td>
              <td>{{ x.name }}</td>
              <td>{{ x.maximum_students }}</td>
              <td>{{ x.description }}</td>
              <td><input type="button" id="{{ k }}" name="" value="edit" class="form-control" ng-click="selectRecord(k)"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require_once(APPPATH.'../public/admin/Footer.php'); ?>
<script type="text/javascript">
var app = angular.module('updateClass', []);
app.controller('updateClassCtrl', function($scope, $http) {
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
      data : {'record_id' : $scope.record_id,'code' : $scope.code, 'name': $scope.name, 'maximum_students': $scope.maximum_students, 'description': $scope.description},
      url : "<?=base_url('Api/updateClass')?>"
    }).then(function mySuccess(response) {
        $scope.result = response.message;
        alert("Class Updated Successfully");
        window.location.reload();
      }, function myError(response) {
        $scope.result = response.message;
        alert("Sorry Try Again");
        window.location.reload();
    });
  }

  $scope.selectRecord = function(index){
    $scope.record_id = $scope.classes[index].id;
    $scope.code = $scope.classes[index].code;
    $scope.name = $scope.classes[index].name;
    $scope.maximum_students = parseInt($scope.classes[index].maximum_students);
    $scope.description = $scope.classes[index].description;
  }
});
</script>