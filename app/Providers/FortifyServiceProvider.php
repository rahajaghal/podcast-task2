<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;
// use Laravel\Fortify\Http\Responses\LoginResponse;
// استدعاء الواجهات (Interfaces) الخاصة بالاستجابة في فورتيفاي
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $request = request();
        if($request->is("admin/*")){
            Config::set('fortify.guard','admin');
            Config::set('fortify.passwords','admins');
            Config::set('fortify.home','/admin/dashboard/index');
            Config::set('fortify.prefix','/admin');
        }else{
            Config::set('fortify.guard','web');
            Config::set('fortify.passwords','users');
            Config::set('fortify.home','/user/dashboard');
            Config::set('fortify.prefix','user');
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        RateLimiter::for('passkeys', function (Request $request) {
            $credentialId = $request->input('credential.id');

            return Limit::perMinute(10)->by(
                ($credentialId ?: $request->session()->getId()).'|'.$request->ip()
            );
        });
        if(Config::get('fortify.guard') =='admin'){
            Fortify::viewPrefix('auth.');
        }else{
            Fortify::viewPrefix('front.auth.');
        }
        ////
        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request) {
                // إذا كان الطلب قادم من مسارات الأدمن (احتياطاً) أو الحارس هو أدمن
                if (Config::get('fortify.guard') == 'admin') {
                    return redirect('/admin/dashboard/index');
                }
                // المسار المخصص للمستخدم العادي بعد تسجيل الدخول
                return redirect('/user/dashboard'); 
            }
        });

        // 2. تحديد مسار المستخدم العادي بعد إنشاء حساب جديد (Register)
        $this->app->instance(RegisterResponse::class, new class implements RegisterResponse {
            public function toResponse($request) {
                // هنا تضع المسار المختلف تماماً الذي تريده للمستخدم بعد التسجيل لأول مرة
                return redirect('/categories/index'); 
            }
        });
    }
}
