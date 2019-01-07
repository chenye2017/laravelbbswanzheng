<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class StaticPagesController extends Controller
{
    //
    public function test($name, Request $request, User $user)
    {
        $user = User::find(11);
        $view = 'ce.ll';
        $data = compact($user);
        $from = '1967196626@qq.com';
        $name = 'cy';
        $to = $user->email;
        $subject = '测试';
        Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
exit;

        $this->authorize('destory', $user);
        $user->delete();
        exit;

        $user->password = bcrypt('123456');
        $user->save();

        exit;

        $res = User::paginate(10);
        dd($res, $name, $user->id);

        $user = User::all()->makeVisible('password')->toArray();
        dd($user);

        $user = User::find(1);
        $user->password = bcrypt('12345');
        $user->save();
        exit;
        //dd($_POST);
        //dd($request->password);
        $validat = $this->validate($request, [
            'email'=>'max:8'
        ]);

        dd($validat);



        dd(csrf_field()->toHtml());
        dd(route('test', [2,4]));

        //dd($p, $p1);
        $user = new User();
        $user->name='cyc';
        $user->email = '199@qq.com';
        $user->notification_count = 0;
        $user->password = bcrypt('12345');
        $user->save();exit;

        $user = User::find(10);
        $user->name='cy';
        $user->save();
        dd($user);
        return view('ce/ll');
        return 'ceshi';
    }

}
