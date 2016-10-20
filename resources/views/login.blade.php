@extends('layout')

@section('body')

@if (session('failedLogin'))
    <div class="error-msg">{{ session('failedLogin') }}
    </div>
@endif

<div class="pure-g">
    <div class="pure-u-1-5"></div>
    <div class="pure-u-3-5">
        <form class="pure-form pure-form-aligned" method="POST" action="{{ url('login') }}">
            {{ csrf_field() }}
            <fieldset>
                <div class="pure-control-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email">
                </div>
                <div class="pure-control-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password">
                </div>
                <div class="pure-controls">
                    <button type="submit" name="login" class="pure-button pure-button-primary">Login</button>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="pure-u-1-5"></div>
</div>

@endsection
