@extends('admin.layouts.admin-default')
	
@section('content')

<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Multi Select Box
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				
				<form role="form" class="form-horizontal form-groups-bordered">
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Multi-Select List</label>
						
						<div class="col-sm-7">
							<select multiple="multiple" name="my-select[]" class="form-control multi-select">
								<option value="elem_1">elem 1</option>
								<option value="elem_2">elem 2</option>
								<option value="elem_3">elem 3</option>
								<option value="elem_4">elem 4</option>
								<option value="elem_5">elem 5</option>
								<option value="elem_6">elem 6</option>
								<option value="elem_7">elem 7</option>
								<option value="elem_8" selected>Selected element</option>
								<option value="elem_9" selected>Selected element 2</option>
							</select>
						</div>
					</div>
					
				</form>
			
			</div>
		
		</div>
		
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Selectbox Replacement
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				
				<form role="form" class="form-horizontal form-groups-bordered">
					
					<strong>Select2 Plugin</strong>
					<br />
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Select2</label>
						
						<div class="col-sm-5">
							
							<select name="test" class="select2" data-allow-clear="true" data-placeholder="Select one city...">
								<option></option>
								<optgroup label="United States">
									<option value="1">Alabama</option>
									<option value="2">Boston</option>
									<option value="3">Ohaio</option>
									<option value="4">New York</option>
									<option value="5">Washington</option>
								</optgroup>
							</select>
							
						</div>
					</div>
				
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Select2 Multiple</label>
						
						<div class="col-sm-5">
							
							<select name="test" class="select2" multiple>
								<option value="3" >Ohaio</option>
								<option value="2" >Boston</option>
								<option value="5" >Washington</option>
								<option value="1" >Alabama</option>
								<option value="4" >New York</option>
								<option value="12" >Bostons</option>
								<option value="11" >Alabama</option>
								<option value="13" >Ohaio</option>
								<option value="14" >New York</option>
								<option value="15" >Washington II</option>
							</select>
							
						</div>
					</div>
					
				</form>
				
			</div>
			
			<div class="panel-body">	
			
				<form role="form" class="form-horizontal form-groups-bordered">	
					
					<strong>SelectBoxIt Plugin</strong>
					<br />
					
					<div class="form-group">
						<label class="col-sm-3 control-label">SelectBoxIt</label>
						
						<div class="col-sm-5">
							
							<select name="test" class="selectboxit">
								<optgroup label="United States">
									<option value="1">Alabama</option>
									<option value="2">Boston</option>
									<option value="3">Ohaio</option>
									<option value="4">New York</option>
									<option value="5">Washington</option>
								</optgroup>
							</select>
							
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">SelectBoxIt (No first-option)</label>
						
						<div class="col-sm-5">
							
							<select name="test" class="selectboxit" data-first-option="false">
								<option>Select city</option>
								<option value="1">Alabama</option>
								<option value="2">Boston</option>
								<option value="3">Ohaio</option>
								<option value="4">New York</option>
								<option value="5">Washington</option>
							</select>
							
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">SelectBoxIt (native)</label>
						
						<div class="col-sm-5">
							
							<select name="test" class="selectboxit" data-native="true" data-text="Select city (+attribute placeholder)">
								<option value="1">Alabama</option>
								<option value="2">Boston</option>
								<option value="3">Ohaio</option>
								<option value="4">New York</option>
								<option value="5">Washington</option>
							</select>
							
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">SelectBoxIt (Icons)</label>
						
						<div class="col-sm-5">
							
							<select name="test" class="selectboxit">
								<option value="SelectBoxIt themes:" data-iconurl="http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-5/256/themes-icon.png">SelectBoxIt themes:</option>
								<option value="Twitter Bootstrap" data-iconurl="http://blog.getbootstrap.com/public/ico/apple-touch-icon-144-precomposed.png">Twitter Bootstrap</option>
								<option value="jQuery UI" data-iconurl="http://c747925.r25.cf2.rackcdn.com/blog/wp-content/uploads/2010/09/jquery-ui-logo.png">jQuery UI</option>
								<option value="jQuery Mobile" data-iconurl="https://twimg0-a.akamaihd.net/profile_images/2633978789/80508321d8ce3ba8aa264380bb7eba33.png">jQuery Mobile</option>
							</select>
							
						</div>
					</div>
				
				</form>	
				
			</div>
			
		</div>
	
	</div>
</div>

@stop