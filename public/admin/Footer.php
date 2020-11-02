</div>
<footer class="main-footer">
	<strong>Netsuite Integration.com - Admin Panel</strong>
 </footer>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
 <script src="<?php echo base_url();?>/assets/admin/js/jquery-3.3.1.min.js"></script>
 <!-- <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script> -->
<script src="<?php echo base_url();?>/assets/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/admin/dist/js/app.js"></script>
<!-- <script src="<?php echo base_url();?>/assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script> -->
<script src="<?php echo base_url();?>/assets/admin/plugins/daterangepicker/moment.js"></script>
<script src="<?php echo base_url();?>/assets/admin/plugins/daterangepicker/daterangepicker.js"></script>

</body>
</html>
<script type="text/javascript">
$(window).on("load", function() {
 $(".preload").hide();
});
$('#daterange').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'DD-MM-YYYY hh:mm A' }})
</script>