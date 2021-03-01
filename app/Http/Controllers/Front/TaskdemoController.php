<?php

namespace App\Http\Controllers\Front;

use App\Models\Taskdemo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskdemoRequest;

class TaskdemoController extends Controller
{

    /*
      タスクの一覧表示  

      ① タスクを最新順に表示
      ② 1ページに10個ずつタスクを表示
    */

    public function list()
    {          
        $taskdemos = Taskdemo::where('complete',0)->latest('id')->paginate(10);  // タスクを最新順に表示（latest） 1ページに10個ずつタスクを表示（paginate）
        return view('front.taskdemos.list',compact('taskdemos'));
    }

    /*
      完了タスクの一覧表示  

      ① タスクを最新順に表示
      ② 1ページに10個ずつタスクを表示
    */

    public function complete()
    {
        $taskdemos = Taskdemo::where('complete',1)->latest('id')->paginate(10); // タスクを最新順に表示（latest） 1ページに10個ずつタスクを表示（paginate）
        return view('front.taskdemos.complete',compact('taskdemos'));
    }

    /* タスクの作成機能 */

    public function create()
    {
        return view('front.taskdemos.create');
    }

    /*
      タスクの保存機能

      ①タスク作成 → 入力成功の場合はタスク一覧画面へ遷移，未入力の場合は画面遷移をしない
    */
    public function store(TaskdemoRequest $request)
    {
        $taskdemo = Taskdemo::create($request->all());
 
        if ($taskdemo) {
            return redirect()
                ->route('front.home', $taskdemo); // タスクを入力した場合 → タスク一覧画面へ
        } else {
            return redirect()
                ->route('front.taskdemos.create'); // タスク未入力の場合 → タスク作成画面から遷移をしない
        }
    }

    /* タスクの編集機能 */

    public function edit(Taskdemo $taskdemo)
    {
        return view('front.taskdemos.edit', compact('taskdemo'));
    }

    /* 編集時の入力情報表示機能 */ 
      
    public function update(TaskdemoRequest $request, Taskdemo $taskdemo)
    { 
        $taskdemo->update($request->all());
       
        return redirect()
            ->route('front.taskdemos.edit', $taskdemo);
    }

    /* タスクの削除機能 */

    public function destroy(Taskdemo $taskdemo)
    {
        $taskdemo->delete();

        return redirect()
            ->route('front.home');
    }
}
