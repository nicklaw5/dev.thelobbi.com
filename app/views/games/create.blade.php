@extends('admin.layouts.admin-default')
	
@section('content')

<div style="clear:both">
	<h2><b>New Game</b></h2>
</div>

<div class="panel panel-primary">
	
	<div class="panel-body">
		{{ Form::open(['action' => 'GamesController@store']) }}
			
			@foreach ($errors->all('<p style="color:#cc0000">:message</p>') as $error)
				{{ $error }}
			@endforeach

			<!-- TITLE -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="title" class="control-label">Game Title (required)</label>
					{{ Form::text('title', '', ['class' => 'form-control', 'required', 'placeholder' => 'eg. Assassin\'s Creed: Unity']) }}
				</div>
			</div>

			<!-- DESCRIPTION -->
			<div class="form-group row">
				<div class="col-lg-6">
					
					<label for="description" class="control-label">Game Description (optional)</label>	
					
					{{ Form::textarea('description', '', ['rows' => '4', 'class' => 'form-control autogrow', 'placeholder' => 'eg. Assassin’s Creed Unity is the next-gen evolution of the blockbuster franchise powered by an all-new game engine. From the storming of the Bastille to the execution of King Louis XVI, experience the French Revolution as never before, and help the people of France carve an entirely new destiny.']) }}
				</div>
			</div>

			<!-- Social Links -->
			<div class="form-group row">
				<div class="col-lg-3">
					<label for="website" class="control-label">Webiste (optional)</label>
					{{ Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'eg. http://assassinscreed.ubi.com/']) }}
				</div>
				<div class="col-lg-3">
					<label for="facebook" class="control-label">Facebook (optional)</label>
					{{ Form::text('facebook', '', ['class' => 'form-control', 'placeholder' => 'eg. https://www.facebook.com/assassinscreed']) }}
				</div>
			</div>

			<div class="form-group row">

				<div class="col-lg-3">
					<label for="twitter" class="control-label">Twitter (optional)</label>
					{{ Form::text('twitter', '', ['class' => 'form-control', 'placeholder' => 'eg. https://twitter.com/assassinscreed']) }}
				</div>
				<div class="col-lg-3">
					<label for="twitch" class="control-label">Twitch (optional)</label>
					{{ Form::text('twitch', '', ['class' => 'form-control', 'placeholder' => "eg. http://www.twitch.tv/directory/game/Assassin's%20Creed%3A%20Unity"]) }}
				</div>
			</div>

			<div class="form-group row">
				<div class="col-lg-3">
					<label for="google_plus" class="control-label">Google Plus (optional)</label>
					{{ Form::text('google_plus', '', ['class' => 'form-control', 'placeholder' => 'eg. https://plus.google.com/u/0/+AssassinsCreed/posts']) }}
				</div>
				<div class="col-lg-3">
					<label for="youtube" class="control-label">Youtube (optional)</label>
					{{ Form::text('youtube', '', ['class' => 'form-control', 'placeholder' => 'eg. https://www.youtube.com/user/AssassinsCreed']) }}
				</div>
			</div>


			<!-- DEVELOPER(S) -->
			<div class="form-group row">
				<div class="col-lg-5">
					<label for="developer" class="control-label">Developer(s) (required)</label>
					{{ Form::select('developers[]', $companies, null, ['class' => 'select2', 'multiple', 'required']); }}
				</div>
				<div class="col-lg-1">
					<a style="margin-top:22px;" href="javascript:;" onclick="jQuery('#newCompanyModal').appendTo(body).modal('show', {backdrop: 'static'});" class="btn btn-blue">+ New Developer</a>
				</div>
			</div>

			<!-- PUBLISHER(S) -->
			<div class="form-group row">
				<div class="col-lg-5">
					<label for="publisher" class="control-label">Publisher(s) (optional)</label>							
					{{ Form::select('publishers[]', $companies, null, ['class' => 'select2', 'multiple']); }}
				</div>
				<div class="col-lg-2">
					<a style="margin-top:22px;" href="javascript:;" onclick="jQuery('#newCompanyModal').appendTo(body).modal('show', {backdrop: 'static'});" class="btn btn-blue">+ New Publisher</a>
				</div>
			</div>

			<!-- GENRE(S) -->
			<div class="form-group row">
				<div class="col-lg-5">
					<label for="genres" class="control-label">Genre(s) (optional)</label>							
					{{ Form::select('genres[]', $genres, null, ['class' => 'select2', 'multiple']); }}
				</div>
				<div class="col-lg-1">
					<a style="margin-top:22px;" href="javascript:;" onclick="jQuery('#newGenreModal').appendTo(body).modal('show', {backdrop: 'static'});" class="btn btn-blue">+ New Genre</a>
				</div>
			</div>

			<!-- PLATFORM(S) -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="platforms" class="control-label">Platform(s) (optional)</label>	
					{{ Form::select('platforms[]', $platforms, null, ['class' => 'select2', 'multiple']); }}
				</div>
			</div>

			<!-- RELEASE DATE(S) -->
			<div class="form-group row">	
				<div class="form-group col-lg-3">
					<label class="control-label">Release Date (optional)</label>					
					<div class="input-group">
						{{ Form::text('release_date', '', ['class' => 'form-control datepicker', 'data-format' => 'D, dd MM yyyy']) }}
						<div class="input-group-addon">
							<a href="#"><i class="entypo-calendar"></i></a>
						</div>
					</div>
				</div>

				<!-- PRICE -->
				<div class="form-group col-lg-3">
					<label for="price_at_launch" class="control-label">Price At Launch (optional)</label>
					{{ Form::text('price_at_launch', '', ['class' => 'form-control', 'data-mask' => 'currency', 'data-sign' => '$']) }}
				</div>

			</div>

			<!-- BOX ART -->
			<div class="form-group row">
				<div class="col-lg-5">
					<label for="box_art" class="control-label">Box Art (optional)</label>
					{{ Form::text('box_art', '', ['id' => 'box_art', 'class' => 'form-control', 'placeholder' => 'Click the button to add some box art.']) }}
				</div>
				<div class="col-lg-1">
					<a style="margin-top:22px;" href="javascript:;" onclick="jQuery('#filemanagerModal').appendTo(body).modal('show');jQuery('#filemanager').attr('src', '/assets/filemanager/dialog.blade.php?type=0&field_id=box_art');" class="btn btn-blue">Add Box Art</a>
				</div>
			</div>

			<!-- Title Image -->
			<div class="form-group row">
				<div class="col-lg-5">
					<label for="title_image" class="control-label">Title Image (optional)</label>
					{{ Form::text('title_image', '', ['id' => 'title_image', 'class' => 'form-control', 'placeholder' => 'Click the button to add some box art.']) }}
				</div>
				<div class="col-lg-1">
					<a style="margin-top:22px;" href="javascript:;" onclick="jQuery('#filemanagerModal').appendTo(body).modal('show');jQuery('#filemanager').attr('src', '/assets/filemanager/dialog.blade.php?type=0&field_id=title_image');" class="btn btn-blue">Add Title Image</a>
				</div>
			</div>
						
			<!-- SUBMIT -->
			<div style="margin-top:50px;" class="form-group row col-lg-3">
				<button type="submit" class="btn btn-green">Save New Game</button>
			</div>
		
		{{ Form::close() }}
	
	</div>

</div>


<!-- Modals -->
@include('modals.new-company-modal')
@include('modals.new-genre-modal')
@include('modals.filemanager-modal')
@include('admin.alerts.on-back-alert')

@stop