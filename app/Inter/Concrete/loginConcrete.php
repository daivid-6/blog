<?php
namespace App\Inter\Concrete;
use App\Inter\loginInterface;
use Illuminate\Support\Facades\DB;
class loginConcrete implements loginInterface
{
    public function finds($name)
    {
        $user=DB::table('user')->where('name',$name)->first();
        return $user;
    }
}