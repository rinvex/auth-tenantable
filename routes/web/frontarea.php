<?php

declare(strict_types=1);

use Cortex\Auth\Http\Controllers\Frontarea\RedirectionController;
use Cortex\Auth\Http\Controllers\Frontarea\AccountMediaController;
use Cortex\Auth\Http\Controllers\Frontarea\PasswordResetController;
use Cortex\Auth\Http\Controllers\Frontarea\AuthenticationController;
use Cortex\Auth\Http\Controllers\Frontarea\AccountPasswordController;
use Cortex\Auth\Http\Controllers\Frontarea\AccountSessionsController;
use Cortex\Auth\Http\Controllers\Frontarea\AccountSettingsController;
use Cortex\Auth\Http\Controllers\Frontarea\AccountTwoFactorController;
use Cortex\Auth\Http\Controllers\Frontarea\ReauthenticationController;
use Cortex\Auth\Http\Controllers\Frontarea\EmailVerificationController;
use Cortex\Auth\Http\Controllers\Frontarea\PhoneVerificationController;
use Cortex\Auth\Http\Controllers\Frontarea\MemberRegistrationController;
use Cortex\Auth\Http\Controllers\Frontarea\TenantRegistrationController;
use Cortex\Auth\Http\Controllers\Frontarea\SocialAuthenticationController;

Route::domain('{frontarea}')->group(function () {
    Route::name('frontarea.')
        ->middleware(['web', 'nohttpcache'])
        ->prefix(route_prefix('frontarea'))->group(function () {
            Route::name('cortex.auth.account.')->group(function () {
                // We can't register these two routes inside the managerarea, since the managerarea
                // is accessible only through the tenant domain/subdomain, and we did not create the tenant yet!
                Route::get('register/tenant')->name('register.tenant')->uses([TenantRegistrationController::class, 'form']);
                Route::post('register/tenant')->name('register.tenant.process')->uses([TenantRegistrationController::class, 'register']);
            });
        });
});
