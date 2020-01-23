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
        		->paginate(5);
        return "ok";

       //  return view('users.show', compact('user', 'tickets'));

    }
    public function getJson()
    {
        $tickets = DB::select('select content, prio, status, user from tickets');

        return Response::json( ['data' => $tickets]);


    }
    public function queryAllTickets()
    {

        $tickets_user = DB::select('SELECT t.user_id, u.name, count(*) as amount from tickets t,users u WHERE t.user_id = u.id group by user_id');
        $tickets_prio = DB::select('select prio, count(*) as amount from tickets group by prio');
        $tickets_status = DB::select('select status, count(*) as amount from tickets group by status');

       return Response::json( ['dataTicketEmployee' => $tickets_user,
                                'dataTicketPrio' => $tickets_prio,
                               'dataTicketStatus' => $tickets_status
                            ]);
    }
    //original backup
    /*public function queryAllTickets()
    {
        // $tickets_user = DB::select('select user_id, count(*) as amount from tickets group by user_id');
        $tickets_user = DB::select('SELECT t.user_id, u.name, count(*) as amount from tickets t,users u WHERE t.user_id = u.id group by user_id');
        $tickets_prio = DB::select('select prio, count(*) as amount from tickets group by prio');
        $tickets_status = DB::select('select status, count(*) as amount from tickets group by status');

       return Response::json( ['dataTicketEmployee' => $tickets_user,
                                'dataTicketPrio' => $tickets_prio,
                               'dataTicketStatus' => $tickets_status
                            ]);
    }*/

    public function queryUserTickets(User $user)
    {
       $thisID = $user->id;

       $tickets_prio = DB::select("select prio, count(*) as amount from tickets where user_id = '$thisID' group by prio");
       $tickets_status = DB::select("select status, count(*) as amount from tickets where  user_id = '$thisID' group by status");

        echo json_encode(['dataTicketPrio' => $tickets_prio,
                          'dataTicketStatus' => $tickets_status
    ]);

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

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }


}
