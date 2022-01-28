<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;

class AuthController extends BaseController
{


    /**
     * @OA\Get(
     * path="/api/login",
     * summary="User login.",
     * description="User login",
     * operationId="signin",
     * tags={"auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Insert login fields",
     *    @OA\JsonContent(
     *       required={"email", "password"},
     *
     *       @OA\Property(property="email", type="string",  example="duarte@mail.pt"),
     *       @OA\Property(property="password", type="int", example="12345"),
     *    ),
     * ),
     * @OA\Response(
     *     response=200,
     *     description="OK",
     *    @OA\JsonContent(
     *       @OA\Property(property="part", type="Object", example={
     *                         "success": true,
     *                         "data": {
     *                         "token": "3|AGq3cwMXiBoHt84yGuWytjLptSDZ5AU0ZVKIH58d",
     *                         "name": "Duarte"
     *                         },
     *                         "message": "User signed in."
     *
     *                     })
     *        )
     *     )
     * )
     *
     *
     */
    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;

            return $this->sendResponse($success, 'User signed in');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    /**
     * @OA\Post(
     * path="/api/register",
     * summary="Register user.",
     * description="register user",
     * operationId="signup",
     * tags={"auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Insert register fields",
     *    @OA\JsonContent(
     *       required={"name","email", "password", "confirm_password"},
     *       @OA\Property(property="name", type="string", example="Duarte"),
     *       @OA\Property(property="email", type="string",  example="duarte@mail.pt"),
     *       @OA\Property(property="passord", type="int", example="12345"),
     *       @OA\Property(property="confirm_password", type="int", example="12345"),
     *    ),
     * ),
     * @OA\Response(
     *     response=201,
     *     description="Created",
     *    @OA\JsonContent(
     *       @OA\Property(property="part", type="Object", example={
     *                         "success": true,
     *                         "data": {
     *                         "token": "3|AGq3cwMXiBoHt84yGuWytjLptSDZ5AU0ZVKIH58d",
     *                         "name": "Duarte"
     *                         },
     *                         "message": "User created successfully."
     *
     *                     })
     *        )
     *     )
     * )
     *
     *
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User created successfully.');
    }

}
