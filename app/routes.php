<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	// return Topic::all();
	// return Article::find(1);
	// return User::find(2);
});
 

Route::get('topics', function(){
	return View::make("topic");
});

Route::get('topics/{id}',function($id){
	$oTopic = Topic::find($id);                                                      
	return View::make("topic")->with("topic", $oTopic);
});

Route::get('articles/create',function(){
	$aTopics = Topic::lists("name","id");
	return View::make("newArticleForm")->with('topics', $aTopics);
});
Route::get('articles/{id}', function($id){
	$oArticle = Article::find($id);
	return View::make("article")->with("article", $oArticle);
});
Route::post('articles',function(){
	$aRules = array(
		'title' =>'required',
		'content'=>'required',
		'photo'=>'required'
		);

	$oValidator = Validator::make(Input::all(), $aRules);

	if($oValidator->passes()){

		//uploading photo

		$sNewName = Input::get("name").".".Input::file("photo")->getClientOriginalExtension();
		Input::file("photo")->move("articlephotos/",$sNewName);
		
		//create new product

		$aDetails = Input::all();
		$aDetails["photo"]= $sNewName;

		$oArticle = Article::create($aDetails);

		//redirect to topic list

		return Redirect::to("topics/".$oArticle->topic_id);

	}else{

		return Redirect::to("articles/create")->withErrors($oValidator)->withInput();
	}
});

Route::get('users/create', function(){
	return View::make("register");
});
Route::post('users',function(){
	//validate input

	$aRules = array(
		'email'=>'required|email|unique:users',
		'firstname' =>'required',
		'lastname' =>'required',
		'password' => 'required|confirmed'
		);

	$messages = array( //create custom error messages for certain input fields. 
		'email'=>':attibute must be a vailed format.', //:attribute is input controller's name.
		'required' =>':attribute must be filled.'
		);

	$oValidator = Validator::make(Input::all(),$aRules,$messages);

	if($oValidator->fails()){
		//output is true, which means, $oValidator fails.

		return Ridirect::to("users/create")->withErrors($oValidator)->withInput();
	}else{
		//output is false, means, $oValidator is (not failed) = passed. 
		//so, create a new user

		$aDetails = Input::all();

		$aDetails["password"] = Hash::make($aDetails["password"]);

		$user = User::create($aDetails);

		return Redirect::to("login");
	}
});

Route::get('users/{id}',function($id){
	$oUser = User::find($id);
	return View::make("userProfile")->with('user',$oUser);
});

Route::get('users/{id}/edit',function($id){
	$oUser = User::find($id);
	return View::make('editUserForm')->with('user',$oUser);
});

Route::put('users/{id}',function($id){
	//validate data
		$aRules = array(
			'firstname'=>'required',
			'lastname'=>'required',
			'email'=>'required|email|unique:users,email,'.$id, //the third parameter is for expection. which means, this email should be unique comparing to the user table exept $id user's field.
			); //table - column - filed. 

		$oValidator = Validator::make(Input::all(),$aRules);
		
		if($oValidator->passes()){
			//update user
			//long hand
			$oUser = User::find($id);
			$oUser->fill(Input::all());
			$oUser->save();

			//short hand
			//User::find($id)->fill(Input::all())->save();
			//redirect to user page

			return Redirect::to('users/'.$id);	
		}else{
			//redirect to edit user form with sticky input values and errors
			return Redirect::to('users/'.$id.'/edit')
								->withErrors($oValidator)
								->withInput();	
		}
});


Route::get('login', function(){
	return View::make("loginForm");
});

Route::post('login', function(){
	$aLoginDetails = array(
		'email' => Input::get('email'),
		'password' => Input::get('password')
		);

	if(Auth::attempt($aLoginDetails)){
		return Redirect::intended("users/".Auth::user()->id);
	}else{
		return Redirect::to("login")->with("error","Try again!");
	}
});

Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('topics/1');
});





