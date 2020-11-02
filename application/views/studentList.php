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
        <li class="active">List</li>
      </ol>
    </section>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" >
  	<h2> Student List</h2><br><br>
    <form action="<?php echo base_url('Statistics');?>" method="post" class="form-inline">
	</form>
</div>
<div class="container"> 
  <div class="row">
    <div class="receipt-main col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-app="updateStudent" ng-controller="updateStudentCtrl">
      <form id="classform">
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>{{result}}</label>
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>ID:</label>
          <input type="text" id="record_id" name="record_id" ng-model="record_id" class="form-control" readonly="true">
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>First name:</label>
          <input type="text" id="first_name" name="first_name" ng-model="first_name" class="form-control" required="true">
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Last Name:</label>
          <input type="text" id="last_name" name="last_name" ng-model="last_name" class="form-control" required="true">
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Class:</label>
          <select id="class" ng-model="class" name="class" class="form-control" required="true">
            <option ng-repeat="item in classes" value="{{ item.id }}">
              {{ item.name }}
            </option>
          </select>
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Date Of Birth:</label>
          <input type="date" id="date_of_birth" name="date_of_birth" ng-model="date_of_birth" class="form-control">
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
              <th>First Name</th>
              <th>Last name</th>
              <th>Class Name</th>
              <th>Date Of Birth</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody id="tablebody">
            <tr ng-repeat="(k,x) in students">
              <td>{{ x.first_name }}</td>
              <td>{{ x.last_name }}</td>
              <td>{{ x.name }}</td>
              <td>{{ x.date_of_birth }}</td>
              <td><input type="button" id="{{ k }}" name="edit" value="edit" class="form-control" ng-click="selectRecord(k)"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require_once(APPPATH.'../public/admin/Footer.php'); ?>
<script type="text/javascript">
var app = angular.module('updateStudent', []);
app.controller('updateStudentCtrl', function($scope, $http) {
  $scope.classes = [];
  $scope.students = [];
  $http.get("<?=base_url('Api/getStudent')?>").then(function mySuccess(response) {
      $scope.students = response.data.students; 
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
      data : {'record_id' : $scope.record_id,'first_name' : $scope.first_name, 'last_name': $scope.last_name, 'class': $scope.class, 'date_of_birth': $scope.date_of_birth},
      url : "<?=base_url('Api/updateStudent')?>"
    }).then(function mySuccess(response) {
        $scope.result = response.message;
        alert("Class Updated Successfully");
        //window.location.reload();
      }, function myError(response) {
        $scope.result = response.message;
        alert("Sorry Try Again");
        window.location.reload();
    });
  }

  $scope.selectRecord = function(index){
    $scope.record_id = $scope.students[index].id;
    $scope.first_name = $scope.students[index].first_name;
    $scope.last_name = $scope.students[index].last_name;
    $scope.class = $scope.classes[parseInt($scope.students[index].class)];
    $scope.date_of_birth = new Date($scope.students[index].date_of_birth);
  }
});
</script>
