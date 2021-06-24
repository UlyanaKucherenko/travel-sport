@extends('layouts.auth')

@section('content')
    <!-- <section class="memberProfile" style="background-image:url({{ asset('/img/bgMember.png') }});">
        <div class="wrappers">

            <div class="memberContainer">
                <form class="form" id="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="inputBox">
                        <div class="wrapInput">

                            <div class="itemInput {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="formLabel">E-Mail Address</label>
                                <input type="email" name="email" class="input" id="email" value="{{ old('email') }}" placeholder="" required autofocus>

                                @if ($errors->has('email'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </p>
                                @endif
                            </div>

                            <div class="itemInput {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="formLabel">Password</label>

                                <input id="password" type="password" class="input" name="password" required>

                                @if ($errors->has('password'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </p>
                                @endif
                            </div>

                            <div class="radio-box">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="fa fa-check"></span>
                                    Remember Me
                                </label>
                            </div>

                        </div>
                    </div>

                    <input type="submit" class="btnSubmit" value="Login">

                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                        {{--Forgot Your Password?--}}
                    {{--</a>--}}
                </form>
            </div>

        </div>
    </section> -->
@endsection
