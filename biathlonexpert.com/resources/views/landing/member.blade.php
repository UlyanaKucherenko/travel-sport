@extends('layouts.member')

@section('content')

    <section id="select-plan">
        <h3 class="select-plan-title">My profile</h3>
        <div class="wrappers">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <div class="plan">
                            <div class="item">
                                <select name="planTitle" class="select-plan">
                                    <option value="25">BEGINNER</option>
                                    <option value="50">BASIC</option>
                                    <option value="75">PRO</option>
                                </select>
                            </div>
                            <div class="item">
                                <div class="plan__price"><span
                                            class="js-price-num"><?php echo !empty($_GET['price']) ? $_GET['price'] : '25';?></span>&euro;
                                </div>
                            </div>
                            <div class="item">
                                <div class="plan__period js-period-books"><?php echo !empty($_GET['text']) ? $_GET['text'] : '2 ebooks per week ';?></div>
                            </div>
                            <div class="item">
                                <div class="plan__workout js-period-plan"><?php echo !empty($_GET['text2']) ? $_GET['text2'] : 'Workouts plan for a day';?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-7">
                        <form id="form-select-plan">
                            <div class="wrapInput">
                                <div class="itemInput">
                                    <label for="firstName" class="formLabel">First Name</label>
                                    <input type="text" name="firstName" class="formInput" id="firstName" placeholder="">
                                </div>
                                <div class="itemInput">
                                    <label for="lastName" class="formLabel">Last Name</label>
                                    <input type="text" name="lastName" class="formInput" id="lastName" placeholder="">
                                </div>
                                <div class="itemInput">
                                    <label for="address" class="formLabel">Address</label>
                                    <input type="text" name="address" class="formInput" id="address" placeholder="">
                                </div>
                                <div class="itemInput">
                                    <label for="postalCode" class="formLabel">Postal code</label>
                                    <input type="text" name="postalCode" class="formInput" id="postalCode"
                                           placeholder="">
                                </div>
                                <div class="itemInput">
                                    <label for="city" class="formLabel">City</label>
                                    <input type="text" name="city" class="formInput" id="city" placeholder="">
                                </div>
                                <div class="itemInput">
                                    <label for="country" class="formLabel">Country</label>
                                    <input type="text" name="country" class="formInput" id="country" placeholder="">
                                </div>
                                <div class="itemInput">
                                    <label for="phone" class="formLabel">Phone</label>
                                    <input type="text" name="phone" class="formInput only-number" id="phone"
                                           placeholder="">
                                </div>
                                <div class="itemInput">
                                    <label for="email" class="formLabel">E-mail</label>
                                    <input type="text" name="email" class="formInput" id="email" placeholder="">
                                </div>
                                <div class="radio-box">
                                    <label>
                                        <input id="privacy" type="checkbox"/>
                                        <span class="fa fa-check"></span>
                                        I certify that I am 18 years old or older and I accept your conditions. I also
                                        accept
                                        the
                                        use of cookies on this site.
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btnSubmit" disabled>SEND</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--<select_plan-page
            props_plans="{{ $plans }}"
            props_routes="{{ $routes }}"
            api_url="{{ $api_url }}"
    ></select_plan-page>--}}

@endsection

