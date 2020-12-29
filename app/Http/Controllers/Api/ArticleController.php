<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vacancies;
use \GuzzleHttp\Client;
class ArticleController extends Controller
{
    public function api(){
        try {
            $i=1/0;
            $vacancies = Vacancies::where('id', 1)->get();
            return response()->json($vacancies, 400);

         
            //echo $response->getStatusCode();

    }

    //catch exception
    catch(\Exception $e) {
        return response()->json(['message'=>$e->getMessage()], 404);
    }
}
public function fetchapi(){
    try {

        
        $client = new Client();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts');
        $responses = $response->getBody();
        $array = json_decode($responses, true);

        $array1 = array(array('userid'=>555555,'title'=>'test','body'=>'test body'));
        $new_array = array_merge($array,$array1);
        $final_respose = json_encode($new_array);
        return json_decode($final_respose, 200);
    } catch (\Exception $e) {
        return response()->json(['message'=>$e->getMessage()], 404);
    }
}
public function create(){
    try {

        
        $client = new Client();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts');
        $responses = $response->getBody();
        $array = json_decode($responses, true);

        $array1 = array(array('userid'=>555555,'title'=>'test','body'=>'test body'));
        $new_array = array_merge($array,$array1);
        $final_respose = json_encode($new_array);
        return json_decode($final_respose, 200);
    } catch (\Exception $e) {
        return response()->json(['message'=>$e->getMessage()], 404);
    }
}
public function delete(){
    try {

        
        $client = new Client();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts');
        $responses = $response->getBody();
        $array = json_decode($responses, true);

        $array1 = array(array('userid'=>555555,'title'=>'test','body'=>'test body'));
        $new_array = array_merge($array,$array1);
        $final_respose = json_encode($new_array);
        return json_decode($final_respose, 200);
    } catch (\Exception $e) {
        return response()->json(['message'=>$e->getMessage()], 404);
    }
}
}




