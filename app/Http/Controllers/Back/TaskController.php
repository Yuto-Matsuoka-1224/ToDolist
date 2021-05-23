<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Request;
use App\Models\Task;
use App\Models\User;
use Auth;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Input;


class TaskController extends Controller
{

    /* タスクの一覧画面表示（個人ユーザー用） */

    public function __invoke()
    {
        $user_id = Auth::id();
        $taskall = Task::query();
        $taskall->where('user_id',$user_id);
        $taskall->where('button',1);
        $taskall->where('complete',0);
        $taskall->latest('id')->paginate(10);
        $tasks = $taskall->get();

        $user = User::find($user_id);

        return view('back.tasks.dashboard',compact('tasks','user'));
    }

    /*
      完了タスクの一覧表示（個人ユーザー用） 

      ① タスクを最新順に表示
      ② 1ページに10個ずつタスクを表示
    */

    public function complete()
    {
        $user_id = Auth::id();
        $taskall = Task::query();
        $taskall->where('user_id',$user_id);
        $taskall->where('button',1);
        $taskall->where('complete',1);
        $taskall->latest('id')->paginate(10);
        $tasks = $taskall->get();

        $user = User::find($user_id);

        return view('back.tasks.complete',compact('tasks','user'));
    }

    /*
      RATE機能説明
    */

    public function RATE()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);

        return view('back.tasks.RATE',compact('user'));
    }

    /*
    　タスクの一覧画面表示（管理者用） 

      ① タスクを最新順に表示
      ② 1ページに10個ずつタスクを表示
    */

    public function index()
    {
        $tasks = Task::with('user')->latest('id')->paginate(10); // 1ページに10個のタスク

        $user_id = Auth::id();
        $user = User::find($user_id);

        return view('back.tasks.admin', compact('tasks','user'));
    }

    /* タスクの作成機能 */

    public function create()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);

        return view('back.tasks.create', compact('user'));
    }

    /*
      タスクの保存機能

      ①タスク作成 → 入力成功の場合はタスク一覧画面へ遷移，未入力の場合は画面遷移をしない
    */

    public function store(TaskRequest $taskrequest)
    {
        $task = Task::create($taskrequest->all());

        if (Request::get('predict')) {
            $user_id = Auth::id();
            $user = User::find($user_id);
            return view('back.tasks.predict', compact('task','user'));
        } else {
            if ($task) {
                $task->button = '1';
                $task->save();
                return redirect()
                    ->route('back.dashboard', $task);
            } else {
                return redirect()
                    ->route('back.tasks.create');
            }
        }
    }

    public function estiminate(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        
        if ($task) {

            /*要変更：update時に1にできていない

            $task->update(['ボタン' => '1']);
            
            */
            
            return redirect()
                ->route('back.dashboard', $task);
        } else {
            $user_id = Auth::id();
            $user = User::find($user_id);
            return redirect()
                ->route('back.tasks.predict', compact('task','user'));
        }
    }

    /* タスクの編集機能 */

    public function edit(Task $task)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);

        return view('back.tasks.edit', compact('task','user'));
    }

    /* 編集時の入力情報表示機能 */ 

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        
        return redirect()
            ->route('back.tasks.edit', $task);
    }

    /* タスクの削除機能 */

    public function destroy(Task $task)
    {
        $task->delete();
     
        return redirect()
            ->route('back.dashboard');
    }
}
