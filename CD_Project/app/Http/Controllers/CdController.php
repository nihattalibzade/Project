<?php
/**
 * Created by PhpStorm.
 * User: nihadtalibzada
 * Date: 2019-01-17
 * Time: 22:58
 */

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;

use Response;
use App\Cd;

class CdController extends Controller {
    public function __construct(){

    }

    private function responseMessage($message, $data){
        return json_encode(array(
            'status' => 'success',
            'status_code' => 200,
            'message' => $message,
            'data' => $data
        ));
    }

    public function getCdList (){
        $data = Cd::get();
        $list = array();
        foreach ($data as $d){
            array_push($list, $d);
        }
        return $this->responseMessage("List has been fetched successfully", $list);
    }

    //That was the function for filtering at backend
    public function getCdName (Request $request){
        $name = $request['name'];
        $data = Cd::where('name', $name)->get();
        return $data;
    }

    public function addCd (Request $request){

        Cd::create([
            'name' => $request['name'],
            'artist' => $request['artist'],
            'genre' => $request['genre'],
            'price' => $request['price'],
            'release' => $request['release']
        ]);

        return $this->responseMessage("CD has been added successfully", null);
    }

    public function updateCd (Request $request){
        $id = $request['id'];
        $data = Cd::where('id', $id)->first();
        $data->name = $request['name'];
        $data->artist = $request['artist'];
        $data->genre = $request['genre'];
        $data->price = $request['price'];
        $data->release = $request['release'];
        $data->save();

        return $this->responseMessage("CD has been updated successfully", $data);
    }

    public function deleteCd (Request $request){
        $id = $request['id'];
        $data = Cd::where('id', $id)->delete();

        return $this->responseMessage("CD has been deleted successfully", null);

    }

}
