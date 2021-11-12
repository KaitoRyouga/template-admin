<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Models\Administrator;
use App\Models\tokens;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function login()
    {
        return view('admin.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        try {

            $request->validated();

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

                $user = Administrator::where('email', $request->email)->first();

                Auth::login($user);
                Session::flash('success', trans('admin.login_success'));

                return redirect()->route('admin.dashboard.index');
            } else {

                Session::flash('error', trans('admin.login_error'));
                return redirect()->route('admin.auth.login')->withInput();
            }
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.login_error') . '. Lỗi: ' . $ex->getMessage());
            return redirect()->route('admin.auth.login')->withInput();
        }
    }

    public function logout()
    {
        if (Auth::check()) {

            Auth::logout();

            Session::flash('success', trans('admin.logout_success'));
            return redirect()->route('admin.auth.login');
        }
    }

    public function sendmail()
    {
        return view('admin.forgetpassword.forgetpassword');
    }

    public function postSendmail(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $email = $request->email;
            $admin = Administrator::where("email", $email)->first();
            $title_email = "lấy lại mật khẩu";

            if ($admin) {

                $token_random = Str::random(20);
                $oldToken = tokens::where('administrator_id', $admin->id)->first();

                if ($oldToken) {

                    $oldToken->key = $token_random;
                    $oldToken->expired = Carbon::now()->addMinutes(15);

                    $oldToken->save();
                } else {

                    $token = new tokens();
                    $token->administrator_id = $admin->id;
                    $token->key = $token_random;
                    $token->expired = Carbon::now()->addMinutes(15);

                    $token->save();
                }

                $link_reset_pass = url('/ad/auth/resetpassword?email=' . $email . '&token=' . $token_random);
                $data = array("name" => $title_email, "body" => $link_reset_pass, "email" => $email);
                Mail::send('admin.forgetpassword.verify', ['data' => $data], function ($message) use ($title_email, $data) {
                    $message->to($data['email'])->subject($title_email);
                    $message->from($data['email'], $title_email);
                });

                Session::flash('success', trans('admin.sendmail_success'));
                return view('admin.forgetpassword.forgetpassword');
            } else {

                Session::flash('error', trans('admin.data_not_exists'));
                return view('admin.forgetpassword.forgetpassword');
            }
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.error') . '. Lỗi: ' . $ex->getMessage());
            return redirect('/');
        }
    }

    public function resetpassword(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'token' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $email = $request->email;
            $token = $request->token;
            $admin = Administrator::where("email", $email)->join('tokens', 'tokens.administrator_id', 'administrators.id')->where('tokens.key', $token)->first();

            if ($admin) {

                if ($admin->expired >= Carbon::now()) {

                    return view('admin.forgetpassword.change-password')->with(['token' => $token, 'email' => $email]);
                } else {

                    Session::flash('error', trans('admin.data_not_exists'));
                    return view('admin.forgetpassword.forgetpassword');
                }
            } else {

                Session::flash('error', trans('admin.data_not_exists'));
                return view('admin.forgetpassword.forgetpassword');
            }
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.error') . '. Lỗi: ' . $ex->getMessage());
            return redirect('/');
        }
    }

    public function postResetpassword(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'token' => 'required',
                'password' => 'required',
                'repassword' => 'required|same:password'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $email = $request->email;
            $password = $request->password;
            $repassword = $request->repassword;
            $token = $request->token;
            $admin = Administrator::where("email", $email)->join('tokens', 'tokens.administrator_id', 'administrators.id')->where('tokens.key', $token)->first();

            if ($admin) {

                if ($password == $repassword && $admin->expired >= Carbon::now()) {

                    $saveAdmin = Administrator::find($admin->administrator_id);
                    $saveAdmin->password = bcrypt($password);

                    $saveAdmin->save();

                    tokens::where('administrator_id', $admin->administrator_id)->delete();

                    Session::flash('success', trans('admin.update_success'));
                    return redirect('/ad/auth/login');
                } else {

                    Session::flash('error', trans('admin.data_not_exists'));
                    return view('admin.forgetpassword.forgetpassword');
                }
            } else {

                Session::flash('error', trans('admin.data_not_exists'));
                return view('admin.forgetpassword.forgetpassword');
            }
        } catch (\Exception $ex) {

            Session::flash('error', trans('admin.error') . '. Lỗi: ' . $ex->getMessage());
            return redirect('/');
        }
    }
}
