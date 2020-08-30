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

function student(){
    return auth("web")->user();
}


function permissionsEmployees(){
    return[
        //------------------categories-----------------
        "create_categories",
        "read_categories",
        "edit_categories",
        "delete_categories",
        //-------------------books --------------------
        "create_books",
        "read_books",
        "edit_books",
        "delete_books",
        //--------------students--------------------------
        "create_students",
        "read_students",
        "edit_students",
        "delete_students",
        //--------------reservations--------------------------
        "read_reservations",
        "edit_reservations",
        "delete_reservations",

    ];
}

