@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">
                        Edit your profile.
                    </h5>
                </div>

                <div class="card-body">
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
                            <textarea class="form-control" name="about" id="about" cols="50" rows="10">
                                {{ $info->about }}
                            </textarea>
                        </div>
                        
                        <div class="form-group row justify-content-center">
                            <button class="btn btn-outline-primary btn-lg" type="submit">
                                Save your information
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection