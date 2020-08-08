<?php



function categoriesActive(){
    return \App\Models\Admin\Category::active()->selection()->get();
}



function languageLocal(){
    return \Config::get('app.locale');
}


function imageUpload($photo,$folder_save){

    $image = $photo->store("/",$folder_save);

    $path = "/images/" .$folder_save . "/" . $image;

    return $path;
}



function deleteFile($photo_to_delet){
    if (\Illuminate\Support\Facades\File::exists(public_path($photo_to_delet))) {

        \Illuminate\Support\Facades\File::delete(public_path($photo_to_delet));
    }
}


function admin(){
    return auth("admin")->user();
}




