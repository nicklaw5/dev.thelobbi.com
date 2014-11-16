@extends('admin.layouts-new.admin-template')
	
@section('content')

<div class="row">
	<div class="col-sm-6">
					
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Edit Game</h6>
			</div>
			<div class="panel-body">
				{{ Form::open(['method' => 'PUT', 'action' => array('GamesController@update', $game->id)]) }}
					
					@include('admin.alerts.admin-form-errors')

					<!-- TITLE -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="title" class="control-label">Game Title (required)</label>
							{{ Form::text('title', $game->title, ['class' => 'form-control', 'required', 'placeholder' => 'eg. Assassin\'s Creed: Unity']) }}
						</div>
					</div>

					<!-- DESCRIPTION -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="description" class="control-label">Game Description (optional)</label>	
							{{ Form::textarea('description', '', ['id' => 'description', 'rows' => '4', 'class' => 'form-control autogrow']) }}
							<script type="text/javascript">
								$(document).ready(function() {
									CKEDITOR.replace( 'description', {
									        customConfig: "{{ URL::asset('assets/js/ckeditor/config-limited.js') }}",
									});
								});
							</script>
						</div>
					</div>

					<!-- Social Links -->
					<div class="form-group row">
						<div class="col-sm-6">
							<label for="website" class="control-label">Webiste (optional)</label>
							{{ Form::text('website', $game->website, ['class' => 'form-control', 'placeholder' => 'eg. http://assassinscreed.ubi.com/']) }}
						</div>
						<div class="col-sm-6">
							<label for="facebook" class="control-label">Facebook (optional)</label>
							{{ Form::text('facebook', $game->facebook, ['class' => 'form-control', 'placeholder' => 'eg. https://www.facebook.com/assassinscreed']) }}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-6">
							<label for="twitter" class="control-label">Twitter (optional)</label>
							{{ Form::text('twitter', $game->twitter, ['class' => 'form-control', 'placeholder' => 'eg. https://twitter.com/assassinscreed']) }}
						</div>
						<div class="col-sm-6">
							<label for="twitch" class="control-label">Twitch (optional)</label>
							{{ Form::text('twitch', $game->twitch, ['class' => 'form-control', 'placeholder' => "eg. http://www.twitch.tv/directory/game/Assassin's%20Creed%6A%20Unity"]) }}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-6">
							<label for="google_plus" class="control-label">Google Plus (optional)</label>
							{{ Form::text('google_plus', $game->google_plus, ['class' => 'form-control', 'placeholder' => 'eg. https://plus.google.com/u/0/+AssassinsCreed/posts']) }}
						</div>
						<div class="col-sm-6">
							<label for="youtube" class="control-label">Youtube (optional)</label>
							{{ Form::text('youtube', $game->youtube, ['class' => 'form-control', 'placeholder' => 'eg. https://www.youtube.com/user/AssassinsCreed']) }}
						</div>
					</div>


					<!-- DEVELOPER(S) -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="developer" class="control-label">Developer(s) (required)</label>
							{{ Form::select('developers[]', $companies, $game_devs, ['class' => 'select2', 'multiple', 'required']); }}
						</div>
					</div>

					<!-- PUBLISHER(S) -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="publisher" class="control-label">Publisher(s) (optional)</label>							
							{{ Form::select('publishers[]', $companies, $game_pubs, ['class' => 'select2', 'multiple']); }}
						</div>
					</div>

					<!-- GENRE(S) -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="genres" class="control-label">Genre(s) (optional)</label>							
							{{ Form::select('genres[]', $genres, $game_gens, ['class' => 'select2', 'multiple']); }}
						</div>
					</div>

					<!-- PLATFORM(S) -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="platforms" class="control-label">Platform(s) (optional)</label>
							{{ Form::select('platforms[]', $platforms, $game_plats, ['class' => 'select2', 'multiple']); }}
						</div>
					</div>

					<!-- RELEASE DATE(S) -->
					<div class="form-group row">	
						<div class="form-group col-sm-6">
							<label class="control-label">Release Date (optional)</label>					
							<div class="input-group">
								{{ Form::text('release_date', $game_rDates, ['class' => 'form-control datepicker', 'data-start-view' => '1', 'data-format' => 'dd MM yyyy']) }}
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>

						<!-- PRICE -->
						<div class="form-group col-sm-6">
							<label for="price_at_launch" class="control-label">Price At Launch (optional)</label>
							{{ Form::text('price_at_launch', $game->price_at_launch, ['class' => 'form-control', 'data-mask' => 'currency', 'data-sign' => '$']) }}
						</div>

					</div>

					<!-- BOX ART -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="box_art" class="control-label">Box Art (272 x 680) (optional)</label>
							{{ Form::text('box_art', $game->box_art, ['id' => 'box_art', 'class' => 'form-control', 'placeholder' => 'eg. http://static.thelobbi.com/uploads/images/my-image.jpg']) }}
						</div>
					</div>

					<!-- Title Image -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="title_image" class="control-label">Title Image (optional)</label>
							{{ Form::text('title_image', $game->title_image, ['id' => 'title_image', 'class' => 'form-control', 'placeholder' => 'eg. http://static.thelobbi.com/uploads/images/my-image.jpg']) }}
						</div>
					</div>
								
					<!-- SUBMIT -->
					<div class="form-group row col-sm-6">
						<button type="submit" class="btn btn-secondary">Update Game</button>
						<a href="{{ url('admin/games') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
					</div>
					
				{{ Form::close() }}
			</div>
		</div>		
	</div>
	<!-- END .col-sm-6 -->

	<!-- FILE UPLOAD -->
	<div class="col-sm-6">
		@include('admin.layouts.admin-file-upload')
	</div>
	<!-- END .col-sm-6 -->
	
</div>
<!-- END .row -->
	
<!-- Modals -->
@include('admin.alerts.on-back-alert')

<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{ URL::asset('assets/js/daterangepicker/daterangepicker-bs3.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/js/select2/select2.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/js/multiselect/css/multi-select.css') }}">

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('assets/js/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ URL::asset('assets/js/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/multiselect/js/jquery.multi-select.js') }}"></script>

@stop