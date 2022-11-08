<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function checkDbConnection()
    {
        try {
            DB::connection()->getPDO();
            echo "Database Name ".DB::connection()->getDatabaseName();
        } catch (\Exception $ex) {
            echo "Database connection failed ".$ex->getMessage();
        }
    }

    public function sqlQueries(Request $request)
    {
        try {
            // session()->now('now','Users data retrieved successfully!');
            // Insert Method
            // $inserUser = DB::insert('INSERT INTO customers (name,email) values(?,?)',['Vicky','vicky@mail.com']);
            // session()->flash('success','User Data insert sucessfully!');
            // Update Method
            // $updateUser = DB::update('UPDATE customers set email = "vicky_email@mail.com" WHERE id = ?',[7]);
            // session()->flash('warning','User data updated sucessfully!');
            // Delete Method
               $deleteUser = DB::delete('DELETE FROM customers where id = ?',[5]);
               session()->flash('danger','User data deleted sucessfully!');
            // Statement Method
            //    $statement = DB::statement('ALTER TABLE customers ADD designation varchar(40) NOT NULL');
            // Unprepared Method
                $unprepstatement = DB::unprepared('INSERT INTO customers (name,email,designation) values("Komal","komal@gmail.com","Laravel Developer")');
                session()->flash('success','User Data insert sucessfully!');
            // Select Method
            $users = DB::select('select * from customers');
            return view('sql_data',compact('users'));
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
