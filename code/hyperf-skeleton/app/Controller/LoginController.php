<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\UsrUser;
use App\Resource\UserResource;
use Qbhy\HyperfAuth\Authenticatable;
use Qbhy\HyperfAuth\AuthManager;

class LoginController extends AbstractController
{
    public function login(AuthManager $auth)
    {
        $user = UsrUser::where('id', 322782)->first();
        /** @var Authenticatable $user */
        return $auth->login($user);
    }

    public function currentUser(AuthManager $auth)
    {
        $user = $auth->user();
        return ['user' => UserResource::make($user)->toArray()];
    }

    public function refreshToken(AuthManager $auth)
    {
        return $auth->refresh();
    }

    public function logout(AuthManager $auth)
    {
        $auth->logout();
    }
}
