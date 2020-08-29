<?php

namespace App\Observers;

use App\Models\Admin\Category;


class CategoryObserver
{




    public function deleted(Category $category)
    {
        if($category->books()->count() > 0){
            $category->books()->update(['category_id' => null]);
        }
    }



}
