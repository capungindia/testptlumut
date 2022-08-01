<?php

namespace App\Http\Controllers;

use App\Models\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index(){
    	if (auth()->user()->role == 'author') return "You are not allowed <br> <a href='" . route('home') . "'>Back to Home</a>";

    	$accounts = Account::all();

    	return view('account.index')
    		->with('accounts', $accounts);
    }

    public function data(){
    	if (auth()->user()->role == 'author') return "You are not allowed <br> <a href='" . route('home') . "'>Back to Home</a>";

    	$accounts = Account::all();

    	return json_encode([
    			'response'	=> 'success',
    			'data'		=> $accounts,
    		]);
    }

    public function create(){
    	if (auth()->user()->role == 'author') return "You are not allowed <br> <a href='" . route('home') . "'>Back to Home</a>";

    	return view('account.create');
    }

    public function save(Request $req){
    	if (auth()->user()->role == 'author') return "You are not allowed <br> <a href='" . route('home') . "'>Back to Home</a>";

    	$feedback = [
            'status'    => 'success',
        ];

        $validated = $req->validate([
	        'username' 	=> 'bail|required|unique:account',
	        'password' 	=> 'bail|required',
	        'name' 		=> 'bail|required',
	        'role' 		=> 'bail|required',
	    ]);

    	$account = new account();
        $account->username 			= $req->username;
        $account->password 			= bcrypt($req->password);
        $account->name 				= $req->name;
        $account->role 				= $req->role;

        $account->save();

        $feedback['accountid'] = $account->username;

        Session::flash('feedback', $feedback);
            
        return redirect()
        	->route('account.index');
    }

    public function change(Request $req){
    	if (auth()->user()->role == 'author') return "You are not allowed <br> <a href='" . route('home') . "'>Back to Home</a>";

    	$account = account::find($req->username);

    	return view('account.update')
    		->with('account', $account);
    }

    public function update(Request $req){
    	if (auth()->user()->role == 'author') return "You are not allowed <br> <a href='" . route('home') . "'>Back to Home</a>";

    	$feedback = [
            'status'    => 'success',
        ];

        $account = account::find($req->username);

        $account->username 			= $req->usernameupd;
        $account->password 			= bcrypt($req->password);
        $account->name 				= $req->name;
        $account->role 				= $req->role;

        $account->save();

        $feedback['accountid'] = $account->idaccount;

        Session::flash('feedback', $feedback);
            
        return redirect()
        	->route('account.index');
    }

    public function delete(Request $req){
    	if (auth()->user()->role == 'author') return "You are not allowed <br> <a href='" . route('home') . "'>Back to Home</a>";

    	$feedback = [
            'status'    => 'success',
        ];

        if ($req->username == auth()->user()->username){
        	return "You cannot delete this account because you logged in by using this account! <br> <a href='" . route('account.index') . "'>Back to Account Management</a>";
        	
        }

    	$account = account::find($req->username);
        $account->delete();

        Session::flash('feedback', $feedback);
            
        return redirect()
        	->route('account.index');
    }
}
