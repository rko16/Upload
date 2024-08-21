<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;

class DynamicMailServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $user = User::where('id',1)->first();
        // if ($user) {
        //     config([
        //         'mail.mailers.smtp.username' => $user->email,
        //         'mail.mailers.smtp.password' => $user->smtp_pswd, // Ensure this is securely handled
        //         'mail.from.address' => $user->email,
        //         'mail.from.name' => $user->username,
        //         'mail.mailers.smtp.host' => $user->host,
        //         'mail.mailers.smtp.encryption' => null,
        //     ]);
        // }
    }
}
