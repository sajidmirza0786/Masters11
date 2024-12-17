<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\example;
use App\Models\User;
use App\Facades\{
    SupportClass,
    DefaultFacade
};
use DB;

use App\Services\DirectObject;

class TestControllers extends Controller
{
    use example;
    public function index(){
        $user = User::first();
        return $this->date_format($user->created_at);
    }

    public function callStaticFacades(){
        dd(DefaultFacade::AddValueFacade(4,3), SupportClass::getDate());
    }

    //dependency injection (services)
    public function servicesExample(DirectObject $obj){
        dd($obj->sumToN(3,6));
    }

    public function secondHighestRecored(){
        dd(User::orderByDesc('id')->limit(1)->offset(1)->first());
    }

    public function userPostDelete(){
        // $a1 = [1, 4, 5, 7];
        // $a2 = [2, 3, 6, 8];

        // // Merge the arrays
        // $mergedArray = array_merge($a1, $a2);

        // // Sort the merged array
        // sort($mergedArray);

        // // Output the sorted array
        // return print_r($mergedArray);


        $query = DB::select("
            select users.id, users.name, count('posts.id') as post_count
            from users
            join posts on users.id = posts.user_id
            group by user_id
            order by post_count desc
            limit 5
        ");
        dd($query);
        return User::whereId(2)->delete();
    }

    public function corePhp()
    {
        // $x = true and false;
        // var_dump($x);      //output is bool(true)
        



        // $a = '1';
        // $b = &$a;
        // $b = "2$b";
        // echo $a;    //output 21
        // echo "<br>";
        // echo $b;    //output 21



        // var_dump(0123 == 123);    //bool(false)
        // var_dump('0123' == 123);  // bool(true)
        // var_dump('0123' === 123); //bool(false)



        // $text[10] = 'Doe';
        // $text = 'John';
        // echo $text, strlen($text); //output is John4 



        // $ar = array(
        //     '0' => 'z1',
        //     '3' => 'Z2',
        //     '4' => 'z3',
        //     '1' => 'Z10',
        //     '2' => 'z12',
        // );
        // $ar = asort($ar);
        // print_r($ar);       //output is 1



        // $x = NULL;
        // if ('0xFF' == 255) {
        //     $x = (int)'0xFF';
        // }
        // echo $x; //output is 0/Null


        //How can you tell if a number is even or odd without using any condition or loop?
        // $arr=array("0"=>"Even","1"=>"Odd");
        // $check=14;
        // echo "Your number is: ".$arr[$check&1];



        $a = 1;
        $$a = 4;
        echo $$a;

        //this file is not generated
    }
}
