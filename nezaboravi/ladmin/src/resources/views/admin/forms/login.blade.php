@extends('ladmin::admin.master')
@section('content')
<section class="hero is-fullheight is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-4 is-offset-4">
                    <h1 class="title">
                        Admin Login
                    </h1>
                    <form method="post" action="/admin/login">
                        {{ csrf_field() }}
                        <div class="box">
                            @include('ladmin::admin.partials.errors')
                            <label class="label">Email</label>
                            <p class="control">
                                <input class="input" type="text" name="email" id="email" placeholder="nezaboravi@gmail.com" value="{{ old('email') }}">
                            </p>
                            <label class="label">Password</label>
                            <p class="control">
                                <input class="input" type="password" name="password" id="email" placeholder="●●●●●●●" value="{{ old('password') }}">
                            </p>
                            <hr>
                            <p class="control">
                                <button class="button is-primary">Login</button>
                                <button class="button is-default">Cancel</button>
                            </p>
                        </div>
                        <p class="has-text-centered">
                            <a href="register.html">Register an Account</a>
                            |
                            <a href="#">Forgot password</a>
                            |
                            <a href="#">Need help?</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection