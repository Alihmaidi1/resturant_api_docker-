<?php

namespace App\GraphQL\Mutations\Admin\storehouse;

use App\Models\storehouse;

final class addstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $storehouse=storehouse::create([

            "name"=>$args["name"],
            "address"=>$args["address"],
            "isFull"=>$args["isFull"],
            "resturant_id"=>$args["resturant_id"]
        ]);

        $storehouse->message=trans("admin.the storehouse was added successfully");
        return $storehouse;

    }
}
