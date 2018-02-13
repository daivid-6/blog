<?php

namespace App\Http\Controllers\Home;
use App\inter\loginInterface;
use Illuminate\Http\Request;
use App\Model\Test;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $user;
    public function __construct(loginInterface $user)
    {
        $this->user=$user;
    }
    public function index()
    {

        return view('home/login/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required'
        ]);
        $input=$request->all();

        $user=$this->user->finds($input['name']);
        if($user && ($user->password) == md5($input['password'])){
            echo "登陆成功,欢迎<h5>".$user->name."</h5>";
        }else{
            echo '用户名或密码错误';
        }

    }

    //返回ajax请求json数据
    public function sendJson()
    {
        $arr = array('data'=>['name'=>'小明1','class'=>'1'],
                     'message'=>'正确',
                     'code'=>'10001'
                   );
        $json=json_encode($arr);
        return $json;
    }

  public function addUser()
  {
      $user=new Test();
      echo $user->inserts(12);

  }

  public function doSomething()
  {

  }
  //队列消息
  public function sendReminderEmail(Request $request,$id)
  {
    $user = User::findOrFail($id);
    $job = (new sendReminderEmail($user))->delay(60);
    $this->dispath($job);
  }

}
