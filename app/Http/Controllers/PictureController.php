<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Storage;

class PictureController extends Controller
{
    public function uploadPicture(Request $request) {

        $name = $request->input('name');
        $description = $request->input('description');
        $image = $request->file('image');
        $imageExtension = $request->file('image')->getClientOriginalName();

        $pictureId = DB::table('pictures')->insertGetId(
            ['name' => $name, 'fileName' => $imageExtension, 'description' => $description, 'fileLocation' => '/public/images', 'user_id' => 1]
        );

        //filename is {userID}{pictureID}{pictureName}
        $fileName = "1-".$pictureId."-".$imageExtension;
        
        if ($request->file('image')->isValid()) {

            $imageTempName = $request->file('image')->getPathname();
            //$imageName = $request->file('image')->getClientOriginalName();
            $path = base_path() . '/public/images';
            $request->file('image')->move($path , $fileName);

            return redirect()->route('userHome', ['id' => 1]);
        } else {
            
            return redirect('error');
        }

    }

    public function pictureDelete($pictureId){
        //get picture data to grab id/name etc so i can delete the file
        $getPicture = DB::table('pictures')->select('id', 'user_id', 'fileName', 'fileExt')->where('id', '=', $pictureId)->get();
        unlink(base_path() . '/public/images/'.$getPicture[0]->user_id."-".$getPicture[0]->id."-".$getPicture[0]->fileName);

        //.$picture->user_id."-".$picture->id."-".$picture->fileName

        $delete = DB::table('pictures')->where('id', '=', $pictureId)->delete();

        return redirect()->route('userHome', ['id' => 1]);
    }
}






