@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">
                        Notifications
                    </h5>
                </div>

                <div class="card-body">
                    <div class="list-group">
                        @foreach ($notifications as $notification)
                                @if ($notification->type == 'App\Notifications\NewFriendRequest' || $notification->type == 'App\Notifications\FriendRequestAccepted')
                                    <a href="/profile/{{$notification->data['user']['slug']}}" class="list-group-item  list-group-item-action">
                                        <img src="{{$notification->data['user']['avatar']}}" height="40px">
                                        {{ $notification->data['message'] }}
                                        <span class="pull-right">{{ $notification->created_at->diffForHumans() }}</span>
                                    </a>
                                @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
