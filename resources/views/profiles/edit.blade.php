@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit your profile.</div>

                <div class="panel-body">
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="avatar">Upload avatar</label>
                            <input type="file" name="avatar" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="location">location</label>
                            <input type="text" class="form-control" name="location" value="{{ $info->location }}">
                        </div>

                        <div class="form-group">
                            <label for="about">About me</label>
                            <textarea class="form-control" name="about" id="about" cols="50" rows="10">{{ $info->about }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <p class="text-center">
                                <button class="btn btn-primary btn-lg" type="submit">
                                    Save your information
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection