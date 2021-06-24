<?php

namespace App\Http\Controllers;

use App\Facades\AdminUnsubscribe;
use App\Http\Requests\Mail\ContactFormRequest;
use App\Http\Requests\Mail\GetInTouchFormRequest;
use App\Http\Transformers\Plan\SelectPlanTransformer;
use App\Mail\GetIntouch;
use App\Mail\SendContactForm;
use App\Models\Page;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class HomeController extends Controller
{
    protected $routes;
    protected $locale;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routes = collect([
            "home" => route("home"),
            "dashboard" => route("dashboard"),
            "register" => route("register"),
            "login" => route("login"),
            "logout" => route("logout"),
            "contact" => route("contact"),
            "set_confirm" => route("setConfirm"),
            "locale" => route("locale"),
            "sendWelcomeEmail" => route("sendWelcomeEmail"),
        ]);

        $this->locale = [
            "en", "it", "fr"
        ];
    }

    /**
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function locale($locale = "en")
    {
        if (in_array($locale, $this->locale)) {
            App::setLocale($locale);
            session()->put('locale', $locale);
        }
        return response()->json([
            "session" => session()->get('locale'),
            "locale" => App::getLocale(),
        ]);
    }

    /**
     * @param \App\Models\Plan $plan
     * @param \App\Models\Page $page
     * @return \Illuminate\View\View
     */
    public function index(Plan $plan, Page $page): View
    {
        $sliderReviews = $page->getSliderReviews();
        $sliderBooks = $page->getSliderBooks();
        return view('landing/landing', [
            "plans" => $plan->index(),
            "sliderReviews" => collect($sliderReviews),
            "sliderBooks" => collect($sliderBooks),
            "isLogin" => Auth()->check(),
            "routes" => $this->routes,
            "locale" => App::getLocale(),
        ]);
    }

    /**
     * @param \App\Models\Plan $plan
     * @param \App\Http\Transformers\Plan\SelectPlanTransformer $planTransformer
     * @param string $plan_name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function member(Plan $plan, SelectPlanTransformer $planTransformer, string $plan_name = "beginner")
    {
        return view('landing/select_plan', [
            "plans" => $planTransformer->transformWithSetPlan($plan->index(), $plan_name),
            "isLogin" => Auth()->check(),
            "routes" => $this->routes,
            "api_url" => env("CARD_API_URL"),
            "locale" => App::getLocale(),
        ]);
    }

    /**
     * @param \App\Http\Requests\Mail\ContactFormRequest $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function contact(ContactFormRequest $request)
    {
        try {
            Mail::to(env('MAIL_TO_ADDRESS'))->send(new SendContactForm($request->all()));
        } catch (\Exception $exception) {
            return response()->status(422)->json([
                "error" => "Email wasn't send"
            ]);
        }
        return response()->json([
            "status" => "ok"
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function privacyPolicy(): View
    {
        return view('privacy_policy', [
            "locale" => App::getLocale(),
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function termsConditions(): View
    {
        return view('terms_conditions', [
            "locale" => App::getLocale(),
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function refundPolicy(): View
    {
        return view('refund_policy', [
            "locale" => App::getLocale(),
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function unsubscribe(Request $request, User $user): JsonResponse
    {
        $user->unsubscribeUserPost($request->email);

        return response()->json([
            "status" => "ok"
        ], 200, ['Access-Control-Allow-Origin' => '*']);
    }

    public function getInTouch(GetInTouchFormRequest $request)
    {

        try {
            Mail::to(env('MAIL_TO_ADDRESS'))->send(new GetIntouch($request->all()));
        } catch (\Exception $exception) {
            return response()->json([
                "error" => "Email wasn't send"
            ], 422, ['Access-Control-Allow-Origin' => '*']);
        }
        return response()->json([
            "status" => "ok"
        ], 200, ['Access-Control-Allow-Origin' => '*']);
    }
}
