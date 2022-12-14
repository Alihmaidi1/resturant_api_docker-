<?php

namespace App\GraphQL\Mutations\User\account;

use App\Exceptions\CustomException;
use App\Mail\resetemail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

final class createuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $verified_code=rand(100000,999999);
        $user=User::create([
            "name"=>$args["name"],
            "code"=>rand(100000,999999),
            "email"=>$args["email"],
            "password"=>Hash::make($args["password"]),
            "status"=>0,
            "operation_code"=>$verified_code,
            "copon_notification"=>0,
            "balance"=>0
        ]);
        Mail::to($args['email'])->send(new resetemail($verified_code));

        $user->message=trans("admin.the account was created successfully");
        $token=tokenInfo($args["email"],$args["password"],"users");
        if($token->status()==200){

            $user->token_info=$token->json();
            return $user;

        }else{

            throw new CustomException(trans("admin.we have error"));
        }


    }
}
