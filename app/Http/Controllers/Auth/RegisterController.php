<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
       
      $user=  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' =>  md5($data['password']),
                ]);

        User::where('id',$user->id)->update([

        'date_of_birth' => $data['date_of_birth'],
        'gender' => $data['gender'],
        'country_id' => $data['country_id'],
        'state_id' => $data['state_id'],
        'city_id' => $data['city_id'],
        'city_name' => $data['city_id'] ? City::find($data['city_id'])->name : $data['city_name'],

        ]);
          $name=$data['name'];
         $password=$data['password'];
         $body  ="username and password.
         <br/>  	    User Name:  $name
         <br/>         Password: $password";
       @include('vendor/autoload.php');

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'kumariee1998@gmail.com';                     //SMTP username
            $mail->Password   = 'mcilldnjvnasdmzz';                             //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('sharmasourav320@gmail.com', 'mail');
             //$mail->setFrom($data['email'], 'mail');
            $mail->addAddress('kumariee1998@gmail.com','mail');
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);  
            $mail->MsgHTML($body);                                //Set email format to HTML
            $mail->Subject = ' the registered user with their username and password.t';
            
            $mail->send();
           // dd($mail->send());
            echo 'Message has been sent';
        } catch (Exception $e) {
         //   dd($e);
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return $user;


    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $countries = Country::all();
        $states = State::all();

        return view('auth.register', compact('countries', 'states'));
    }
}
