@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<p class="text-center">
						{{ $user->name }}'s profile
					</p>
				</div>
				<div class="panel-body">
					<center>
						<img src="{{ $user->avatar }}" width="70px" height="70px" style="border-radius: 50%">
					</center>
					<br>
					<p class="text-center">
						{{ $user->profile->location }}
					</p>
					<p class="text-center">
						@if (Auth::id() == $user->id)
							<a href="{{ route('profile.edit') }}" class="btn btn-lg btn-info">Edit your profile</a>
						@endif
					</p>
				</div>
			</div>

			@if (Auth::id() != $user->id && Auth::check())

			<div class="panel panel-default">
				<div class="body">
					<friend :profile_user_id="{{ $user->id }}"/>
				</div>
			</div>

			@endif
			
			<div class="panel panel-warning">
				<div class="panel-heading">
					<p class="text-center">
						About me 
					</p>
				</div>
				<div class="panel-body">
					<p class="text-center">
						{{ $user->profile->about }}
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading text-center">
					Posts
				</div>
				<div class="panel-body">
					@foreach ($posts as $post)
						<div class="panel panel-default">

							<div class="panel-body">
								<p class="text-center">
									{{ $post->content }}
								</p>
							</div>
							<div class="panel-footer">
								<span class="text-primary">
									posted on: {{$post->created_at}}
								</span>
							</div>
						</div>

					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-danger">
				<div class="panel-heading text-center">
					Friends
				</div>
				<div class="panel-body">
					<ul class="nav nav-pills nav-stacked">
						@foreach ($friends as $friend)
							<li><a href="{{$friend->url}}">
								<img src="{{$friend->avatar}}" height="40px">
								<span class="pull-right">{{$friend->name}}</span>
							</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection