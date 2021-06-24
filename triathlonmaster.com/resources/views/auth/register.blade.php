@extends('layouts.auth')

@section('content')
    <section class="memberProfile" style="background-image:url({{ asset('/img/bgMember.png') }});">
        <div class="wrappers">

            <div class="memberContainer">
                <form class="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="inputBox">

                        <div class="wrapInput">
                            <div class="itemInput">
                                <label for="first_name" class="formLabel">First Name</label>
                                <input type="text" name="first_name" class="input" id="first_name" placeholder="" required>
                                @if ($errors->has('first_name'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </p>
                                @endif
                            </div>
                            <div class="itemInput">
                                <label for="address" class="formLabel">Address</label>
                                <input type="text" name="address" class="input" id="address" placeholder="" required>
                                @if ($errors->has('address'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </p>
                                @endif
                            </div>
                            <div class="itemInput">
                                <label for="city" class="formLabel">City</label>
                                <input type="text" name="city" class="input" id="city" placeholder="" required>
                                @if ($errors->has('city'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </p>
                                @endif
                            </div>
                            <div class="itemInput">
                                <label for="phone" class="formLabel">Phone</label>
                                <input type="text" name="phone" class="input" id="phone" placeholder="" required>
                                @if ($errors->has('phone'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </p>
                                @endif
                            </div>
                            <div class="itemInput{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="formLabel">E-Mail Address</label>
                                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="wrapInput">
                            <div class="itemInput">
                                <label for="last_name" class="formLabel">Last Name</label>
                                <input type="text" name="last_name" class="input" id="last_name" placeholder="" required>
                                @if ($errors->has('last_name'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </p>
                                @endif
                            </div>
                            <div class="itemInput">
                                <label for="postal_code" class="formLabel">Postal code</label>
                                <input type="text" name="postal_code" class="input" id="postal_code" placeholder="" required>
                                @if ($errors->has('postal_code'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </p>
                                @endif
                            </div>
                            <div class="itemInput">
                                <label for="country" class="formLabel">Country</label>
                                <input type="text" name="country" class="input" id="country" placeholder="" required>
                                @if ($errors->has('country'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </p>
                                @endif
                            </div>
                            <div class="itemInput{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="formLabel">Password</label>
                                <input id="password" type="password" class="input" name="password" required>

                                @if ($errors->has('password'))
                                <p class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </p>
                                @endif
                            </div>
                            <div class="itemInput">
                                <label for="password-confirm" class="formLabel">Confirm Password</label>
                                <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                            </div>
                            <div class="radio-box">
                                <label>
                                    <input id="privacy" type="checkbox" name="privacy" required /><span class="fa fa-check"></span>I certify that I am 18 years old or older and I accept your conditions. I also accept the use of cookies on this site.
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btnSubmit" value="Register">

                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                    {{--Forgot Your Password?--}}
                    {{--</a>--}}
                </form>
            </div>

        </div>
    </section>
@endsection
