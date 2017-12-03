@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-primary text-white">
						<h5 class="card-title text-center">
							{{ $user->name }}'s profile
						</h5>
					</div>
					<div class="card-body">
						<center>
							<img src="{{ $user->avatar }}" width="70px" height="70px" style="border-radius: 50%">
						</center>
						<br>
						<p class="text-center">
							{{ $user->profile->location }}
						</p>
						@if (Auth::check())
							<p class="text-center">
								@if (Auth::id() == $user->id)
									<a href="{{ route('profile.edit') }}" class="btn btn-lg btn-info">Edit your profile</a>
								@else
									<friend profile_user_slug="{{ $user->slug }}"/>
								@endif
							</p>
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-warning text-white">
						<h5 class="card-title text-center">
							About me
						</h5>
					</div>
					<div class="card-body">
						<p class="card-text text-center">
							{{ $user->profile->about }}
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-danger text-white">
						<h5 class="card-title text-center">
							Friends
						</h5>
					</div>
					<div class="card-body">
						<div class="list-group">
							@if ($friends->count())
								@foreach ($friends as $friend)
									<a class="list-group-item list-group-item-action" href="{{$friend->url}}">
										<img src="{{$friend->avatar}}" height="40px">
										<span class="pull-right">{{$friend->name}}</span>
									</a>
								@endforeach
							@else
								<p class="card-text text-center">User has no friends</p>
							@endif

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-8">
				<div class="card card-info">
					<div class="card-header text-center bg-info text-white">
						<h5 class="card-title text-center">
							Posts
						</h5>
					</div>
					<div class="card-body">
						@foreach ($user->posts as $post)

							<div class="card card-default mb-3">
								<div class="card-body">
									<p class="card-text text-center">
										{{ $post->content }}
									</p>
								</div>

								<div class="card-footer text-muted text-right">
									posted on: {{$post->created_at}}
								</div>
							</div>

						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
