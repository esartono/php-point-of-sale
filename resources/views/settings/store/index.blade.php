@extends('settings._layout')

@section('page-title')
    Settings\Store
@endsection

@section('settings-content')
    @extends('settings._layout')

@section('page-title')
    Settings\Users\Add
@endsection

@section('settings-content')
    <form method="POST" action="{{ route('settings.store.store') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="control-label">Store Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group{{ $errors->has('short_name') ? ' has-error' : '' }}">
            <label for="name" class="control-label">Store Short Name</label>
            <input id="short_name" type="text" class="form-control" name="short_name" value="{{ old('short_name') }}" required autofocus>
            <small id="emailHelp" class="form-text text-muted">This is a short name for the company, incase the company name is too long.</small>

            @if ($errors->has('short_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('short_name') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
            <label for="email" class="control-label">Location</label>

            <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}">
            <small class="form-text text-muted">This is the current location of the store.</small>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="email" class="control-label">Password</label>

            <input id="email" type="password" class="form-control" name="password" value="" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group">
            <label for="password-confirm" class="control-label">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Add User
            </button>

            <a href="{{ route('settings.users.index') }}" class="btn btn-default pull-right">
                Cancel
            </a>
        </div>
    </form>
@endsection
@endsection