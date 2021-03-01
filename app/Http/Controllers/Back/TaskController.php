<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Auth;
use App\Http\Requests\TaskRequest;


class TaskController extends Controller
{

    /* タスクの一覧画面表示（個人ユーザー用） */

    public function __invoke()
    {
        $user_id = Auth::id();
        $taskall = Task::query();
        $taskall->where('user_id',$user_id);
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
        $taskall->where('complete',1);
        $taskall->latest('id')->paginate(10);
        $tasks = $taskall->get();

        $user = User::find($user_id);

        return view('back.tasks.complete',compact('tasks','user'));
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

    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
 
        if ($task) {
            return redirect()
                ->route('back.dashboard', $task);
        } else {
            return redirect()
                ->route('back.tasks.create');
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
