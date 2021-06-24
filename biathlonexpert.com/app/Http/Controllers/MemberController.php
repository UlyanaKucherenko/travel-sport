<?php

namespace App\Http\Controllers;


use App\Facades\AdminUnsubscribe;
use App\Http\Requests\Profile\ProfileFormRequest;
use App\Http\Transformers\User\UpdateUserTransformer;
use App\Mail\SendWelcomeEmail;
use App\Models\Book;
use App\Models\Plan;
use App\Models\PlanText;
use App\Models\Training;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{
    protected $routes;

    public function __construct()
    {
        $this->middleware("auth");
        $this->routes = collect([
            "updateProfile" => route("updateProfile"),
            "dashboard" => route("dashboard"),
            "indexBook" => route("indexBook"),
            "coach" => route("coach"),
            "manage" => route("manage"),
            "profile" => route("showMember"),
            "logout" => route("logout"),
            "set_confirm" =>route("setConfirm"),
            "home" => route("home"),
            "sendWelcomeEmail" => route("sendWelcomeEmail"),
            "register" => route("register"),
            "unsubscribe" => route('unsubscribe'),
            "bookingInfo" => route("booking-info"),
            "updateBookingItem" => route("update-booking-item"),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        return view('member.profile', [
            "user" => auth()->user(),
            "data" => json_encode(auth()->user()->data??[]),
            "routes" => $this->routes,
            "locale" => App::getLocale(),
        ]);
    }

    /**
     * @param \App\Models\Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard(Book $book)
    {
        return view('member.dashboard', [
            "totalBooks" => $book->getBooksPlanCount(),//$book->all()->count(),
            "availableBooks" => auth()->user()->books->count(),//$book->getBooksPlanCount(),
            "routes" => $this->routes,
            "expiration_data" => auth()->user()->expiration_data,
            "locale" => App::getLocale(),
            "recentBooks" => json_encode($book->popularBooks()),
            "topBook" => json_encode($book->bestBook()),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manage(Book $book)
    {
        return view('member.manage', [
            "totalBooks" => $book->getBooksPlanCount(),//$book->all()->count(),
            "availableBooks" => auth()->user()->books->count(),//$book->getBooksPlanCount(),
            "routes" => $this->routes,
            "data" => auth()->user()->getManageUserData(),
            "locale" => App::getLocale(),
            "planTexts" => PlanText::whereLocale(App::getLocale())->get(),
            "plans" => Plan::all(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function coach(Training $trainings)
    {
        return view('coach', [
            "routes" => $this->routes,
            "locale" => App::getLocale(),
        ]);
    }

    /**
     * @param \App\Http\Requests\Profile\ProfileFormRequest $request
     * @param \App\Models\User $user
     * @param \App\Http\Transformers\User\UpdateUserTransformer $transformer
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(ProfileFormRequest $request, User $user, UpdateUserTransformer $transformer): JsonResponse
    {
        return response()->json([
            "status" => "ok",
            "update" => $user->updateUser($transformer->transUsersData($request->all())),
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setConfirm(Request $request): JsonResponse
    {
        $user = auth()->user();

        $user->subscribe_status = true;
        $user->subscribe_date = Carbon::now()->toDateTimeString();
        $user->orderId = $request->get('order_id');
        if($request->get('plan_id')){
            $user->plan_id = $request->get('plan_id');
        }
        $user->save();

        return response()->json([
            "status" => "updated",
            "user" => $user,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendWelcomeEmail(): JsonResponse
    {
        try {
            $user = auth()->user();
            Mail::to($user->email)->send(new SendWelcomeEmail($user->full_name, request()->getHost()));
        } catch (\Exception $exception) {

        }
        return response()->json([
            "status" => "send"
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function unsubscribe(Request $request, User $user):RedirectResponse
    {
        $user = auth()->user();
        $result = AdminUnsubscribe::sendUnsubscribeRequest($user);

        if (isset($result->status) && $result->status === 'ok') {
            Auth::logout();

            return redirect()->route("home");
        }

        return back()->with('errors', json_encode($result)->data);
    }
}