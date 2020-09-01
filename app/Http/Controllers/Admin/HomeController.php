<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Book;
use App\Models\Admin\Category;
use App\Models\Admin\Student;
use App\Models\Contact;
use App\Models\Reservation;

class HomeController extends Controller
{

    public function index(){

        $admins = Admin::role('admin')->count();
        $employees = Admin::role('employees')->count();
        $students = Student::count();
        $categories =  Category::count();
        $books = Book::count();
        $reservations = Reservation::count();
        $contacts = Contact::count();

        $modules = [
            "admins",
            "employees",
            "students",
            "categories",
            "books",
            "reservations",
            "contacts"
        ];

       return view("admin.home",compact($modules));


    }
}
