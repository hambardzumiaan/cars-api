<?php

namespace App\Http\Transformers;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class AuthTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'email' => $user->email,
            'token' => $user->token,
        ];
    }
}
