<?php

namespace App\Http\Controllers\Admin;

use App\Inter\userInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;

class UserController extends Controller
{
    protected $user;
    public function __construct(userInterface $user) {
        $this->user = $user;

    }

    /**
     * 查询构建器
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $re=$this->user->selects(1);
        dump($re);
    }

    /**
     * Show the form for creating a new resource.
     *
     * orm取数据 实例化user表，查询对应文章
     */
    public function huoqu()
    {
        $user=new User();
        $re=$user->find(3)->user()->get();
        foreach($re as $value){
            echo "id=".$value->id."用户id=".$value->user_id."文章：".$value->article_name."<br />";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
