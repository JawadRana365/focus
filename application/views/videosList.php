<?php 
require_once(APPPATH.'../public/admin/Header.php');?>
<!-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Video
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Video</a></li>
        <li class="active">List</li>
      </ol>
    </section>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" >
  	<h2> Vidoe List</h2><br><br>
    <form action="<?php echo base_url('Statistics');?>" method="post" class="form-inline">
	</form>
</div>
<div class="container"> 
  <div class="row">
    <div class="receipt-main col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-app="videoList" ng-controller="videoListCtrl">
      <div class="row p-5">
        <!-- <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="{{ src }}" allowfullscreen></iframe>
        </div> -->
        <video id="video_1" class="video-js vjs-default-skin" controls data-setup='{}' width="1024" >
          <source src="{{ src }}?sd" type='video/mp4' label='SD' res='480' />
          <source src="{{ src }}?hd" type='video/mp4' label='HD' res='1080'/>
          <source src="{{ src }}?phone" type='video/mp4' label='phone' res='144'/>
          <source src="{{ src }}?4k" type='video/mp4' label='4k' res='2160'/>
        </video>

      </div>
      <div class="mt-5 table-responsive table-bordered">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Url</th>
              <th>Status</th>
              <th>Play</th>
            </tr>
          </thead>
          <tbody id="tablebody">
            <tr ng-repeat="(k,x) in videos">
              <td>{{ x.title }}</td>
              <td>{{ x.description }}</td>
              <td>{{ x.url }}</td>
              <td>{{ x.status }}</td>
              <td><input type="button" id="{{ k }}" name="play" value="Play" class="form-control" ng-click="selectRecord(k)"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require_once(APPPATH.'../public/admin/Footer.php'); ?>
<script type="text/javascript">
var app = angular.module('videoList', []);
app.controller('videoListCtrl', function($scope, $http) {
  $scope.src = "<?=base_url()?>uploads/videos/Recording4.mp4";
  $scope.videos = [];
  $http.get("<?=base_url('Api/getVideo')?>").then(function mySuccess(response) {
      $scope.videos = response.data.videos; 
    }, function myError(response) {
      console.log(response.data);
  });

  $scope.selectRecord = function(index){
    $scope.src = "<?=base_url()?>"+$scope.videos[index].url;  
    document.querySelector("#video_1 > source").src =  "<?=base_url()?>"+$scope.videos[index].url;
    document.getElementById('video_1').load();
  }
});
</script>
