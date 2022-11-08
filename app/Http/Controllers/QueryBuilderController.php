<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    public function retrieveMethod(Request $request)
    {
        // get Method
        // $users = DB::table('customers')->get();
        // first Method
        $users = DB::table('customers')->select('email')->where('id', '>', 4)->first();
        session()->now('now', 'Users data retrieved successfully!');
        // return view('sql_data',compact('users'));
        // value Method
        $users = DB::table('customers')
            ->where('id', '>', 4)
            ->value('email');
        // find Method
        $users = DB::table('customers')->find(6);

        // Pluck Method
        $users = DB::table('customers')
            ->where('id', '>', 4)
            ->pluck('email', 'name');
        echo "<pre>";
        print_r($users);
        echo exit;
    }

    public function aggregateMethod(Request $request)
    {
        // Count Method
        $users = DB::table('customers')->where('designation', 'Laravel developer')->count();
        echo "COUNT METHOD <br> Total numbers of users: $users <hr>";
        // Min Method
        $max = DB::table('products')->max('quantity');
        echo "MAX METHOD <br> Max quantity is: $max <hr>";
        // Min Method
        $min = DB::table('products')->min('quantity');
        echo "MIN METHOD <br> Min quantity is: $min <hr>";
        // Sum Method
        $sum = DB::table('orders')->sum('amount');
        echo "SUM METHOD <br> Sum of amount: $sum <hr>";
        // AVG Method
        $avg = DB::table('orders')->avg('amount');
        echo "AVG METHOD <br> AVG of amount: $sum <hr>";
        // EXISTS Method
        $exists = DB::table('orders')->where('amount', '>', 5000)->exists();
        if ($exists) {
            echo "Condition stisfied. <br><hr>";
        } else {
            echo "Condition not stisfied.<br><hr>";
        }

        //Not EXISTS Method
        $doesExist = DB::table('orders')->where('amount', '>', 5000)->doesntExist();
        if ($doesExist) {
            echo "Condition stisfied. <br> <hr>";
        } else {
            echo "Condition not stisfied. <br><hr>";
        }
        // echo "EXISTS METHOD <br> Is exists: $exists <hr>";
    }

    public function selectStatement(Request $request)
    {
        // Select Method
        // $users = DB::table('customers')->select('name','email')->get();
        // session()->now('now','Users data retrieved successfully!');
        // return view('select_statement',compact('users'));

        // Add Select Method
        // $users = DB::table('customers')->select('name','email');
        // $users = $users->where('id','>',4);
        // $users = $users->addSelect('designation')->get();
        // session()->now('now','Users data retrieved successfully!');
        // return view('select_statement',compact('users'));

        // Distinct Method
        $designations = DB::table('customers')->distinct()->get('designation');
        session()->now('now', 'Designation retrieved successfully!');
        return view('distinct_method', compact('designations'));
    }

    public function joinStatement(Request $request)
    {
        // Join Method
        $data = DB::table('products')->select('prod_code', 'name as Product Name');
        $data = $data->join('orders', 'orders.prod_id', '=', 'products.prod_id');
        $data = $data->addSelect('orders.amount', 'orders.order_date');
        $data = $data->get();

        // Left Join Method
        $data = DB::table('products')->select('prod_code', 'name as Product Name');
        $data = $data->leftJoin('orders', 'orders.prod_id', '=', 'products.prod_id');
        $data = $data->addSelect('orders.amount', 'orders.order_date');
        $data = $data->get();

        // Right Join Method
        $data = DB::table('products')->select('prod_code', 'name as Product Name');
        $data = $data->rightJoin('orders', 'orders.prod_id', '=', 'products.prod_id');
        $data = $data->addSelect('orders.amount', 'orders.order_date');
        $data = $data->get();

        // Cross Join
        $data = DB::table('customers');
        $data = $data->crossJoin('orders');
        $data = $data->get();

        // Mutiple Join
        $data = DB::table('customers');
        $data = $data->leftJoin('orders', 'orders.cust_id', '=', 'customers.id');
        $data = $data->rightJoin('products', 'orders.prod_id', '=', 'products.prod_id');
        $data = $data->get();

        // Union Method
        $products = DB::table('products');
        $orders = DB::table('orders')->union($products)->get();
        echo '<pre>';
        print_r($orders);
        echo exit;
    }

    public function whereMethod(Request $request)
    {
        // where Method
        $users = DB::table('customers')->where('id', 4)->get();
        $users = DB::table('customers')->where('id', '>', 4)->get();
        $users = DB::table('customers')->where('id', '<', 4)->get();
        $users = DB::table('customers')->where('id', '<>', 4)->get();
        $users = DB::table('customers')->where('designation', 'like', '%Laravel%')->get();

        // Or Condition
        $users = DB::table('customers')
            ->where('id', '<', 4)
            ->orWhere('name', 'like', 'Komal%')
            ->get();

        // where Between Condition
        $users = DB::table('customers')
            ->whereBetween('created_at', ['2020-12-01 00:00:00', '2020-12-01 00:00:00'])
            ->get();

        // or where between condition
        $users = DB::table('customers')
            ->where('id', '>', 4)
            ->orwhereBetween('created_at', ['2020-12-01 00:00:00', '2020-12-01 00:00:00'])
            ->get();
        // where not between condition
        $users = DB::table('customers')
            ->where('id', '>', 4)
            ->whereNotBetween('created_at', ['2021-12-01 00:00:00', '2021-12-01 00:00:00'])
            ->get();

        // or where not between condition
        $users = DB::table('customers')
            ->where('id', '>', 4)
            ->orWhereNotBetween('created_at', ['2021-12-01 00:00:00', '2021-12-01 00:00:00'])
            ->get();

        // where In Condition
        $users = DB::table('customers')
            ->whereIn('id', [1, 2, 3])
            ->get();
        // or where In Condition
        $users = DB::table('customers')
            ->where('id', '>', 4)
            ->orwhereIn('id', [1, 4, 6])
            ->get();
        // where not In Condition
        $users = DB::table('customers')
            ->where('id', '>', 4)
            ->whereNotIn('id', [1, 4, 6])
            ->get();
        // or where not In Condition
        $users = DB::table('customers')
            ->where('id', '>', 4)
            ->orwhereNotIn('id', [1, 4, 6])
            ->get();
        // whereNull Condition
        $users = DB::table('customers')
            ->whereIn('id', [1, 2, 3])
            ->get();
        // whereNotNull Condition
        $users = DB::table('customers')
            ->where('id', '>', 4)
            ->orwhereIn('id', [1, 4, 6])
            ->get();
        // or whereNull Condition
        $users = DB::table('customers')
            ->where('id', '>', 4)
            ->whereNotIn('id', [1, 4, 6])
            ->get();
        // or whereNotNull In Condition
        $users = DB::table('customers')
            ->where('id', '>', 4)
            ->orwhereNotIn('id', [1, 4, 6])
            ->get();
        // Date Function
        $users = DB::table('customers')
            ->whereDate('created_at', '2022-09-15')->get();
        // Day Function
        $users = DB::table('customers')
            ->whereDay('created_at', '1')->get();
        // Month Function
        $users = DB::table('customers')
            ->whereMonth('created_at', '9')->get();
        // Year Function
        $users = DB::table('customers')
            ->whereYear('created_at', '2020')->get();
        // Time Function
        $users = DB::table('customers')
            ->whereTime('created_at', '<', '07:17:38')->get();

        // Where Column
        session()->now('now', 'Users data retrieved successfully!');
        return view('select_statement', compact('users'));
    }

    public function ordering()
    {
        // Order By Method
        $users = DB::table('customers')
            ->orderBy('name', 'asc')
            ->get();
        // Latest Method
        $users = DB::table('customers')
            ->latest('created_at')
            ->get();
        // Oldest Method
        $users = DB::table('customers')
            ->oldest('created_at')
            ->get();
        // In random order method
        $users = DB::table('customers')
            ->inRandomOrder('email')
            ->get();
        // Re Order Method
        $users = DB::table('customers')
            ->orderBy('id','desc')
            ->reorder('name','desc')
            ->get();
        session()->now('now', 'Users data retrieved successfully!');
        return view('select_statement', compact('users'));
    }

    public function grouping()
    {
        // Group By
        $orders = DB::table('orders')
                ->groupBy('prod_id')
                ->get();
        // Having By
        $orders = DB::table('orders')
                ->groupBy('prod_id')
                ->having('cust_id',4)
                ->get();
        // Having Between
        $orders = DB::table('orders')
                ->groupBy('prod_id')
                ->havingBetween('cust_id',[1,4])
                ->get();
        echo "<pre>";
        print_r($orders);
        exit;
    }

    public function limitAndoffset()
    {
        $users = DB::table('customers')->offset(5)->limit(5)->get();
        session()->now('now', 'Users data retrieved successfully!');
        return view('select_statement', compact('users'));
    }

    public function operation()
    {
        // Insert Data
        // $insUser = DB::table('customers')->insert([
        //     'name'=> 'sam',
        //     'email'=> 'sam@gmail.com',
        //     'designation'=>'Software Engineer',
        //     'phonenumber' => '12548585585',
        //     'created_at' => '2022-10-20 14:25:25'
        // ]);

        // insertOrIgnore force fully insert
        // $insUser = DB::table('customers')->insertOrIgnore([
        //     'name'=> 'sam',
        //     'email'=> 'sam@gmail.com',
        //     'designation'=>'Software Engineer',
        //     'phonenumber' => '12548585585',
        //     'created_at' => '2022-10-20 14:25:25'
        // ]);

        // InsertGetId
        // $insUser = DB::table('customers')->insertGetId([
        //     'name'=> 'sam',
        //     'email'=> 'sam@gmail.com',
        //     'designation'=>'Software Engineer',
        //     'phonenumber' => '12548585585',
        //     'created_at' => '2022-10-20 14:25:25'
        // ]);

        // Update
        // $update = DB::table('customers')->where('id',17)->update([
        //     'name'=> 'sam Patel',
        //     'email'=> 'sampatel@gmail.com',
        //     'designation'=>'Software Engineer',
        //     'phonenumber' => '12548585585',
        //     'created_at' => '2022-10-20 14:25:25'
        // ]);

        // updateOrInsert
        // $update = DB::table('customers')->updateOrInsert(['email'=> 'sampatel@gmail.com'],[
        //     'name'=> 'sam ssasa Patel',
        //     'email'=> 'sampatelasasa@gmail.com',
        //     'designation'=>'Software Engineer',
        //     'phonenumber' => '12548585585',
        //     'created_at' => '2022-10-20 14:25:25'
        // ]);

        // Delete Method
        $delete = DB::table('customers')->where('id',17)->delete();
        // echo "<pre>";
        // print_r($insUser);
        // exit;

        $users = DB::table('customers')->latest()->take(1)->get();
        session()->now('now', 'Users data retrieved successfully!');
        return view('select_statement', compact('users'));
    }
}
