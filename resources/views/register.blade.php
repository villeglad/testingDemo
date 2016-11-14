@extends('layout')

@section('body')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="pure-g">
    <div class="pure-u-1-5"></div>
    <div class="pure-u-3-5">
        <form class="pure-form pure-form-aligned" method="POST" action="{{ url('register') }}">
            {{ csrf_field() }}
            <fieldset>
                <div class="pure-control-group">
                    <label for="email">Name</label>
                    <input id="email" type="text" name="name">
                </div>
                <div class="pure-control-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email">
                </div>
                <div class="pure-control-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password">
                </div>
                <div class="pure-controls">
                    <button type="submit" name="register" class="pure-button pure-button-primary">Register</button>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="pure-u-1-5"></div>
</div>

@endsection
