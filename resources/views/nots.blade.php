@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Notifications</div>

                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        @foreach ($nots as $not)
                            <li class="list-group-item">
                                @if ($not->type == 'App\Notifications\NewFriendRequest' || $not->type == 'App\Notifications\FriendRequestAccepted')
                                    <a href="/profile/{{$not->data['user']['slug']}}">
                                        <img src="{{$not->data['user']['avatar']}}" height="40px">
                                        {{ $not->data['message'] }}
                                        <span class="pull-right">{{ $not->created_at->diffForHumans() }}</span>
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
