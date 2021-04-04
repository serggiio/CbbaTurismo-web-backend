<?php

namespace App\Http\Controllers;

use App\UserTable as UserTableObj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Hash;

use Illuminate\Support\Facades\Mail;
use App\Mail\welcome;



use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

//use App\Http\commonService\MailUtil as mailObj;


class UserTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserTableObj::all();
        return ['Data' => $users];
    }

    /**
     * Show the form for creating a new resource.
     *not created for API
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @author Sergio fernandez
     */
    public function store(Request $request)
    {
        $userData = $request->all();
        try {
            /*UserTableObj::create([
                'statusId' => 3,
                'typeId' => 3,
                'name' => 'Jorge',
                'lastName' => 'hardcore',
                'phoneNumber' => '7222402',
                'email' => 'josuelo@gmail.com',
                'password' => bcrypt('cdngmwuk')
            ]);    */

            $userData['save']['password'] = bcrypt($userData['save']['password']);

            $queryData = UserTableObj::where("email", "=", $userData['save']['email'])->get()->first();

            if($queryData){
                $result = "badEmail";
                $mailStatus = 'notSent';
            }else{

                $userData['save']['verificationCode'] = $this->generateCode(6);
                
                $newUser = new UserTableObj($userData['save']);
                $result = $newUser;
            
                try{
                    Mail::to($userData['save']['email'])->send(new welcome($userData['save']['verificationCode']));
                    $mailStatus = 'sent';
                }catch(Trowable $th){
                    $mailStatus = 'notSent';
                }
                $newUser->save();
                //mailObj = new mailObj();
            }

            return [
                'code' => 'OK',
                'stored' => true,
                'data' => $result,
                'mail' => $mailStatus

            ];
        } catch (Throwable $th) {
            return [
                'code' => 'Error',
                'stored' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se pudo guardar',
                    'en' => 'Can not save'
                ]
            ];
        }
        
        
    }


    public function verificateCode(Request $request)
    {
        $userData = $request->all();
        try {

            $queryData = UserTableObj::where([
                ["email", "=", $userData['email']],
                ["verificationCode", "=", $userData['verificationCode']]
            ])->get()->first();

            if(!$queryData){
                $result['data'] = "badData";
                $result['status'] = "Error";
            }else{
                //case ok verification code null
                $result['data'] = $queryData;
                $result['status'] = "OK";

                $queryData['verificationCode'] = null;
                $queryData['statusId'] = 2;
                $queryData->save();
                //$result = $queryData;
                
            }

            return [
                'code' => $result['status'],
                'data' => $result['data'],

            ];
        } catch (Throwable $th) {
            return [
                'code' => 'Error',
                'data' => $th,
                'message' => [
                    'es' => 'No se pudo verificat',
                    'en' => 'Can not verified'
                ]
            ];
        }
        
        
    }


    public function generateCode($l) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $l;$i++) $key .= $pattern[mt_rand(0,$max)];
        return $key;
    }

    /**
     * Display the specified resource.
     *
     * @param  {
     *      "userId": 1
     * }
     * @return \Illuminate\Http\Response
     */
    public function getUserById(Request $request)
    {
        $user = $request->all();
        try {
            
            $userData = UserTableObj::find($user['get']['userId']);
            $userData['status'] = UserTableObj::find($user['get']['userId'])->status;

            //$userData1 = DB::table('usertable')->join('status', 'usertable.statusId', '=', 'status.statusId')->get();

            return [
                'code' => 'Ok',
                'get' => true,
                'data' => $userData
            ];    
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro al usuario',
                    'en' => 'User not found'
                ]
            ];
        }
        
    }

        /**
     * Display the specified resource.
     *
     * @param  {
     *      "userId": 1
     * }
     * @return \Illuminate\Http\Response
     */
    public function authentication(Request $request)
    {
        $user = $request->all();
        try {
            
            $userData = UserTableObj::where([
                ['email', '=', $user['email']]
                //['', '=', 'sergiocep2010@gmail.com']
            ])
            ->get()->first();
            //dd($userData);
            
            //null object
            if ($userData == null) {
                $response['code'] = 'ERROR';
                $response['message'] = 'noData';
                $response['data'] = null;
                return $response;
            }

            //user in verification status
            if($userData['statusId'] == 5){
                $response['code'] = 'ERROR';
                $response['message'] = 'verification';
                $response['data'] = null;
                return $response;
            }

            //status no active
            if($userData['statusId'] != 2){
                $response['code'] = 'ERROR';
                $response['message'] = 'Inactive';
                $response['data'] = null;
                return $response;
            }

            //password doesnt match
            if (!Hash::check($user['password'], $userData['password'])) {
                $response['code'] = 'ERROR';
                $response['message'] = 'noData';
                $response['data'] = null;
                return $response;
            }
            return [
                'code' => 'OK',
                'authenticate' => true,
                'data' => $userData
            ];    
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro al usuario',
                    'en' => 'User not found'
                ]
            ];
        }
        
    }

    public function update(Request $request)
    {
        $user = $request->all();
        try {
            

            $userData = UserTableObj::find($user['id']); 
            $userData->fill($user['data']);
            $userData->save();
            return [
                'code' => 'OK',
                'update' => true,
                'data' => $userData
            ];    
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se actualizo la informacion',
                    'en' => 'Data not updated'
                ]
            ];
        }
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\UserTable  $userTable
     * @return \Illuminate\Http\Response
     */
    public function show(UserTable $userTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *not created for API
     * @param  \App\UserTable  $userTable
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTable $userTable)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserTable  $userTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTable $userTable)
    {
        //
    }
}
