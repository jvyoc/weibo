<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Auth;
use Response;

class UsersController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth', [            
            'except' => ['show', 'create', 'store']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    
    //
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        $tickets = $user->tickets()
        		->orderBy('created_at', 'desc')
        		->paginate(10);
        
       return view('users.show', compact('user', 'tickets'));
     
    }
    public function getJson()
    {
           $tickets = DB::select('select content, prio, status, user_id from tickets');
          
        return Response::json( ['data' => $tickets]);


    }

    public function getUserTickets(User $user)
    {
        $tickets = $user->tickets()
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);                    
        echo json_encode($tickets);

    }

    public function store(Request $request)
	{
    	$this->validate($request, [
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|confirmed|min:6'
    	]);
    
    	$user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

    	Auth::login($user);
       session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
       return redirect()->route('users.show', [$user]);
	}

	public function edit(User $user)
	{
		$this->authorize('update', $user);
		return view('users.edit', compact('user'));
	}

	public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);


        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user->id);
    }

	
}
