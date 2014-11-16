<!-- Admin Alerts -->

<div class="row" style="padding:0 15px">
	@if(Session::has('adminSuccessAlert'))
	<div class="alert alert-success col-lg-12">
		<div class="row">			
			<div style="margin-bottom: 0">
				<div class="col-xs-11">
					<p style="margin:0; color: #fff; text-align: center;">{{ Session::pull('adminSuccessAlert') }}</p>
				</div>
				<div class="col-xs-1">	
					<h4><a href="Javascript:;" onclick="jQuery('.alert').hide();"><i style="float:right" class="entypo-cancel"></i></a></h4>
				</div>
			</div>
		</div>
	</div>
	@elseif(Session::has('adminWarningAlert'))
	<div class="alert alert-warning col-lg-12">
		<div class="row">			
			<div style="margin-bottom: 0">
				<div class="col-xs-11">
					<p style="margin:0; color: #fff; text-align: center;">{{ Session::pull('adminWarningAlert') }}</p>
				</div>
				<div class="col-xs-1">	
					<h4><a href="Javascript:;" onclick="jQuery('.alert').hide();"><i style="float:right" class="entypo-cancel"></i></a></h4>
				</div>
			</div>
		</div>
	</div>
	@elseif(Session::has('adminDangerAlert'))
	<div class="alert alert-danger col-lg-12">
		<div class="row">			
			<div style="margin-bottom: 0">
				<div class="col-xs-11">
					<p style="margin:0; color: #fff; text-align: center;">{{ Session::pull('adminDangerAlert') }}</p>
				</div>
				<div class="col-xs-1">	
					<h4><a href="Javascript:;" onclick="jQuery('.alert').hide();"><i style="float:right" class="entypo-cancel"></i></a></h4>
				</div>
			</div>
		</div>
	</div>
	@elseif(Session::has('adminInfoAlert'))
	<div class="alert alert-info col-lg-12">
		<div class="row">			
			<div style="margin-bottom: 0">
				<div class="col-xs-11">
					<p style="margin:0; color: #fff; text-align: center;">{{ Session::pull('adminInfoAlert') }}</p>
				</div>
				<div class="col-xs-1">	
					<h4><a href="Javascript:;" onclick="jQuery('.alert').hide();"><i style="float:right" class="entypo-cancel"></i></a></h4>
				</div>
			</div>
		</div>
	</div>
	@endif
</div>