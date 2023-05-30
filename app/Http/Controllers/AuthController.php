<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $client = new Client();
        $cResponse = $client->request('POST', "http://localhost:5000/api/admin/register", [ 'json'=> [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]]);
        $cBody = $cResponse->getBody()->getContents();
        $data = json_decode($cBody, true);
        extract($data);
        if($data['status']){
            return redirect("/login");
        }
        return view('dashboard.register', ['title' => 'Register']);
    }
}
