<?php 
require_once(APPPATH.'../public/admin/Header.php');?>
<!-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Videos
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Videos</a></li>
        <li class="active">Upload</li>
      </ol>
    </section>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" >
  	<h2>Upload Videos</h2><br><br>
    <form action="<?php echo base_url('Statistics');?>" method="post" class="form-inline">
	</form>
</div>
<div class="container"> 
  <div class="row">
    <div class="receipt-main col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-app="myApp" ng-controller="myCtrl">
      <form id="classform" method="post" action="<?=base_url('Api/uploadVideo')?>" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <label>{{result}}</label>
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Title:</label>
          <input type="title" id="title" name="title" ng-model="name" class="form-control">
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Description:</label>
          <input type="description" id="description" name="description" ng-model="description" class="form-control">
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Status:</label>
          <select class="form-control" id="status" name="status" ng-model="mystatus">
            <option ng-repeat="item in status" value="{{ item.value }}">
              {{ item.value }}
            </option>
          </select>
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <label>Upload File:</label>
          <input type="file" id="uploadvideo" name="uploadvideo" file-model="myFile" class="form-control" readonly="true">
        </div>
        <div class="form-inline pull-right">
          <input type="button" value="Submit" class="form-control" ng-click="uploadFile()">
          <input type="reset" value="Reset" class="form-control">
        </div>
      </form>
    </div>
  </div>
</div>
<?php require_once(APPPATH.'../public/admin/Footer.php'); ?>
<script type="text/javascript">
  var myApp = angular.module('myApp', []);

myApp.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
    link: function(scope, element, attrs) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
            });
        });
    }
   };
}]);

// We can write our own fileUpload service to reuse it in the controller
myApp.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl, name, description, status){
         var fd = new FormData();
         fd.append('file', file);
         fd.append('name', name);
         fd.append('description',description);
         fd.append('status',status);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         }).then(function mySuccess(response) {
            if(response.data.status == 200){
              alert("Video Uploaded Successfully");
            }else{
              alert(response.data.message);
            }
          }, function myError(response) {
            alert("Sorry Try Again");
        });
     }
 }]);

 myApp.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){
    $scope.status = [{"value": "AVALIABLE"},{"value": "UNAVALIABLE"}];

   $scope.uploadFile = function(){
        var file = $scope.myFile;
        console.log('file is ' );
        console.dir(file);

        var uploadUrl = "<?=base_url('Api/uploadVideo')?>";
        fileUpload.uploadFileToUrl(file, uploadUrl, $scope.name, $scope.description, $scope.mystatus);
   };

}]);
</script>
