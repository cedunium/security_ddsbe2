<?php

namespace App\Http\Controllers;

//use App\User;
use App\Models\User;    //the model
use App\Models\UserJob; 
use Illuminate\Http\Response;
use App\Traits\ApiResponser;    //standardized our code for api response
use Illuminate\Http\Request;    //handling http request in lumen
use DB;     //not using lumen eloquent you can use DB component in lumen


Class UserController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getUsers(){
        // eloquent style
        // $users = User::all();
        // return response() -> json($user,200);
        // //return $this->response($user,200);

        $users = DB::connection('mysql')
        ->select("Select * from tbluser");
        return $this->successResponse($users);
    }
    //Return the list of users
    public function index(){
        $users = User::all();
        return $this->successResponse($users);
    }

    public function showlogin(){
        return view('login');
    }

    public function result(){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $login = app('db')->select("select * from tbluser where username='$username' and password ='$password'");
        //API responser            
        if(empty($login)){
            return $this->errorResponse('User Does not Exists',Response::HTTP_NOT_FOUND);
        }
        else
        {
            echo '<script>alert("YOU HAVE SUCCESSFULLY LOGGED IN")</script>';
            return view('login');
        }

    }
    
    public function addUser(Request $request ){
        $rules = [
            'username' => 'required|max:20',
            'password' => 'required|max:20',
            'jobid' => 'required|numeric|min:1|not_in:0',
        ];

        $this->validate($request,$rules);
        $userjob = UserJob::findOrFail($request->jobid); // validate if Jobid is found in the table tbluserjob
        $user = User::create($request->all()); //the data that will fill in the users fillable
        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    //Obtains and show one author
    public function show($id)
    {
        //eloquent style
        // $user = User::findOrFail($id);
        // return $this->successResponse($user);
        
        $user = User::where('id', $id)->first();
        if($user){
            return $this->successResponse($user);
        }
        else
        {
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }
    }

    //Update an existing author
    public function update(Request $request,$id)
    {
        $rules = [
        'username' => 'max:20',
        'password' => 'max:20',
        'jobid' => 'required|numeric|min:1|not_in:0',
        ];

        $this->validate($request, $rules);

        // eloquent style
        // $user = User::findOrFail($id);
        $userjob =UserJob::findOrFail($request->jobid); // validate if Jobid is found in the table tbluserjob
        $user = User::where('id',$id)->first();
        if($user){
            $user->fill($request->all());

            // no changes happen
            if ($user->isClean()) {
                return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $user->save();
            return $this->successResponse($user);
         }
        {
            return $this->errorResponse('User Does not Exists',Response::HTTP_NOT_FOUND);
        }     
    }
    public function delete($id){ //Remove an existing user
        // $user = User::findOrFail($id);
        $user = User::where('id',$id)->first();
        if($user){
            $user->delete();
            return $this->successResponse($user);
        }
        else
        {
            return $this->errorResponse('User Does not Exists',Response::HTTP_NOT_FOUND);
        }
    }
}