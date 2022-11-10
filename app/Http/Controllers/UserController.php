<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJob;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function index()
    {
        return view('controller_view');
    }

    public function nestingView()
    {
        return view('user.nesting_view');
    }

    public function viewExistence()
    {
        if(View::exists('user.view_existence')) {
            return view('user.view_existence');
        } else {
            return 'View is unavailable.';
        }
    }

    public function nameArray()
    {
        if(View::exists('passing_data.name_array_method')) {
            return view('passing_data.name_array_method', ['brand_1' => ['Octavia', 'Superb', 'Fabia'], 'brand_2' => 'Audi', 'brand_3' => 'BMW']);
        } else {
            return 'View is unavailable.';
        }
    }

    public function withFunction($id)
    {
        if(View::exists('passing_data.with_method')) {
            return view('passing_data.with_method')->with('id', $id);
        } else {
            return 'View is unavailable.';
        }
    }

    public function compactFunction()
    {
        $favCars = [
            'Octavia',
            'Superb',
            'A7',
            'XC 90',
            'S 90'
        ];
        $name = 'Sandeep Patel';
        if(View::exists('passing_data.compact_method')) {
            return view('passing_data.compact_method', compact('favCars', 'name'));
        } else {
            return 'View is unavailable.';
        }
    }


    public function testFunction()
    {
        return 'This is a Test method of User Controller.';
    }

    public function alertComponent()
    {
        return view('test');
    }

    public function arrayHelpers()
    {
        $arr =[
            'Core PHP',
            'Advance PHP',
            'React JS',
            'Laravel',
            'Wordpress',
            'Angular JS'
        ];
        $second_arr =[
            'S90',
            '5 Series',
            'Octavia',
            'Superb',
            'V90'
        ];
        $str = 'Welcome to India';
        $obj = new \stdClass();
        $collection = new Collection();
        $accessible = Arr::accessible($collection);
        $arr_add = Arr::add($arr,'fav','Codeignter');
        $arr_collapse = Arr::collapse([$arr,$second_arr]);
        $arr_cross_join = Arr::crossJoin($arr,$second_arr);
        $array = ['products' => ['desk' => ['price' => 100]]];
        $flattened = Arr::dot($array);
        echo "<pre>";
        // var_dump($arr_add);
        print_r($flattened);
        exit;
    }

    public function pathHelpers()
    {
        $app = app_path('Http/Controllers/');
        $base = base_path('app/Http/Controllers/');
        echo "<pre>";
        print_r($base);
        exit;
    }

    public function stringHelpers()
    {
        $classStr = class_basename('App\Http\Controllers');

        $string = 'The event will take place between :start and :end and :total';

        $replaced = preg_replace_array('/:[a-z_]+/', ['8:30', '9:00','12:00'], $string);
        echo "<pre>";
        print_r($replaced);
        exit;
    }

    public function fluentHelpers()
    {
        $str = "welcOme to new Delhi";
        $str = Str::lower($str);
        echo $str.'<hr>';
    }

    public function urlHelpers()
    {
        $action = action([UserController::class,'urlHelpers'],['language'=> 'Hindi','course'=>'Laravel'], false);
        $asset = asset('image.png');
        $route = route('fluent.string');
        $secure_asset = secure_asset('image.png');
        $url = url('url-helpers');
        echo $asset.'<hr>';
        echo '<pre>';
        print_r($url);
        exit;
    }

    public function miscHelpers()
    {
        $action = action([UserController::class, 'miscHelpers'], ['language' => 'hindi', 'course' => 'laravel'], false);
        $flag = false;
        $env = env('APP_NAME');
        $filled = 0;
        $filled_null = null;
        $filled_str = '    ';
        $info = info('Welcome to LearnVern!');
        $logger = logger('Debug message');
        $filled_str_name = 'LearnVern';
        $now = now();
        $bcrypt = bcrypt('my strong password');
        $config = config('app.timezone');
        $cookie = cookie('helper_cookie', 'LearnVern', 10);

        //dump(filled($filled_str_name));
        //dd($filled);
        echo "<pre>";
        print_r($cookie);
        exit;
    }

    public function customHelpers()
    {
        $date = "2022-09-12 11:15:60";
        $format = 'd-m-Y';
        $data = formatDate($date,$format);

        $filename = 'attachment.pdf';
        $url = getFileUrl($filename, 'attachment');

        $startDate = '2020-01-01';
        $endDate = '2020-01-16';
        $dateArr = getDatesBetweenGivenDate($startDate, $endDate);
        echo '<pre>';
        print_r($dateArr);
        exit;
    }

    public function httpClientCurl()
    {
        $curl = curl_init();
        curl_setopt_array($curl,[
            CURLOPT_URL => "https://reqres.in/api/users",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 1000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER =>['Content-Type: application/json'],
        ]);

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if($err){
            return ["error"=>true, "msg"=>$err];
        }

        $response = json_decode($response,true);

        return $response;
    }

    public function httpClient(Request $request)
    {
        $response = Http::get('https://reqres.in/api/users');
        return $response;
    }

    public function httpMethods(Request $request)
    {
        $response = Http::post('https://reqres.in/api/register',['email'=>$request->email,'password'=>$request->password]);
        $response = $response->body();
        return $response;
    }

    public function sessionMethods(Request $request)
    {
        // Store Data in Session
        // Request Instance
        $request->session()->put('Course','Laravel');
        // Global Helpers
        session(['Course_using_global_helper' =>'Advance PHP']);
        // Retrieve session Data
        // Retrieve data with specific key using request
        $data = $request->session()->get('Course_data','No Data Found');
         // Retrieve data with specific key using global Helper
        $data = session('Course_using_global_helper','No Data Found');
        // Retrieve all data
        $allData = $request->session()->all();
        // Determing if an item exists in the session
        if($request->session()->has('Course')){
            echo "Sandeep key exists and checked by has Methods.<br>";
        }else{
            echo "No data found using has Methods.<br>";
        }
        if($request->session()->exists('Course')){
            echo "Sandeep key exists and checked by exists Methods.<br>";
        }else{
            echo "No data found using has Methods.<br>";
        }
        if($request->session()->missing('Coursess')){
            echo "Sandeep key not exists and checked by missing Methods.<br>";
        }else{
            echo "No data found using has Methods.<br>";
        }
        // Push to array session values
        $request->session()->push('Course.version','8.0');
        $allData = $request->session()->all();

        // Delete Session Data
        $request->session()->forget('Course');
        $allData = $request->session()->all();

        // Retrieve and remove
        $request->session()->pull('Course_using_global_helper1','Course Default Data');
        $allData = $request->session()->all();

        // Remove multiple data from session
        $request->session()->forget(['Course_using_global_helper','Course']);
        $allData = $request->session()->all();

        // Increment session values
        $request->session()->put('userCount',0);
        $request->session()->increment('userCount',$incrementBy = 5);
        $allData = $request->session()->all();

        // Decrement session values
        $request->session()->decrement('userCount');
        $request->session()->decrement('userCount',$decrementBy = 3);
        $allData = $request->session()->all();

        // Delete all session data
        // $request->session()->flush();
        // $allData = $request->session()->all();

        // Regenerating session ID
        $request->session()->regenerate();

        // Invalidate session
        $request->session()->invalidate();
        $allData = $request->session()->all();
        echo "<pre>";
        print_r($allData);
        exit;
    }

    public function flashMethods(Request $request)
    {
        // push to array session values
        $request->session()->push('version','8.0');

        // Flash Method
        session()->flash('warning', 'Message from warning method!');
        session()->flash('danger', 'Message from danger method!');
        session()->flash('success', 'Message from success method!');
        $allData = $request->session()->all();
        return redirect('flash-data');
    }

    public function flashData(Request $request)
    {
        //session()->reflash();
        session()->keep(['success', 'warning']);
        return view('flash_session');
    }

    public function flashAnotherData(Request $request)
    {
        session()->now('now', 'Message from now method!');
        return view('flash_session_another');
    }

    public function accessor(Request $request)
    {
        $users = User::get();
        return view('accessor',compact('users'));
    }

    public function mutator(Request $request)
    {
        $user = User::find(1);
        $user->email = "SamWasas@mail.com";
        $user->save();
        return redirect()->route('accessor');
    }

    public function getUser(Request $request, User $user)
    {
        echo '<pre>';
        print_r($user);
        echo exit;
    }

    public function localization(Request $request)
    {
        $locale = \App::currentLocale();
        echo '<hr>';
        echo '<h1>'.$locale.'</h1>';
        echo '<hr>';
    }

    public function sendMail(Request $request)
    {
        $emailData = [
            'subject' => 'Welcome to Sandip assasa',
            'body' => 'Welcome to Sandeep. This is the classic example of sending email using Laravel.',
            'tagline' => 'LEARN ANY COURSE FOR FREE IN YOUR OWN LANGUAGE UPDATED.'
        ];
        Mail::to('sandippatel3101@gmail.com')->send(new WelcomeEmail($emailData));
    }

    public function queue(Request $request)
    {
        $requestData = $request->only('emails');
        $emails = explode(',', $requestData['emails']);
        foreach ($emails as $email) {
            dispatch(new EmailJob($email));
        }
        return redirect()->to('queue')->with('success', 'Email processing started.');
    }
}
