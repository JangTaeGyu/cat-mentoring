<?php

namespace Modules\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Modules\Api\V1\Services\GoogleAuthService;

class GoogleAuthController extends Controller
{

    public function __construct(
        private readonly GoogleAuthService $googleAuthService
    ) {
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $createdUser = $this->googleAuthService->signup($user);

            $responseData = [
                'token_type' => 'Bearer',
                'access_token' => $createdUser->createToken('auth_token')->plainTextToken
            ];

            if ($createdUser->isSignuped()) {
                return response()->json($responseData);
            }

            return response()->json(array_merge($responseData, [
                'message' => '소셜 가입은 완료가 되었으니 Cat Mentoring Application 에 회원가입을 해주세요.',
                'next' => route('signup')
            ]));
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }
}
