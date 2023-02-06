<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Validator;
use DB;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $request['password'] = bcrypt($request['password']);
        
        $user = User::create($request->all());

        $token = $user->createToken('Token')->accessToken;

        return response()->json(['token' => $token, 'userData' => $user], 200);
    }

    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(auth()->attempt($data)) {
            
            $token = auth()->user()->createToken('Token')->accessToken;
            return response()->json(['token' => $token], 200);

        } else {

            return response()->json(['error' => 'Unauthenticated'], 401);

        }
    }

    public function products(Request $request)
    {
        $user = auth()->user();
        $user_id = $user->id;

        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->where('products.user_id', $user_id)
        ->orderBy('products.id', 'DESC')
        ->get();

        return response()->json(['products' => $products], 200);
    }

    public function userInfo(Request $request)
    {
        $user = auth()->user();
        return response()->json(['user' => $user], 200);
    }

    public function eloquentRelation(Request $request)
    {
        // $category = Category::find(2);
        // $products = $category->product()->get();

        $category = Product::find(2);
        $products = $category->category()->get();

        return response()->json(['products' => $products], 200);
    }

}
