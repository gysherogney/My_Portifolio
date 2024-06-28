<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\firstProject;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use App\Models\myPhoto;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class myProjectController extends Controller
{
    public function index(){
        $photo  =  myPhoto::all();
        return view('frontend.Master',compact('photo'));
        // return view('frontend.Master');
    }
    public function uploadData(Request $req){
        
        $post=new firstProject;
        $post->fname = $req->fname;
        $post->lname = $req->lname;
        $post->email = $req->email;
        $post->subject = $req->subject;
        $post->message = $req->message;
        $post->save();
        $fname = $req->fname;
        $lname = $req->lname;
        $subject = $req->subject;
        $email = $req->email;
        $message = $req->message;
        $message = "{$subject} Name: {$fname} {$lname} Email:{$email} Message: {$message}";
        $this->sendSms($message);
        return redirect()->back();
    } 

   public function sendSms($message)
   {
          $params = [
            'sender_id' => env('ZEPSON_SID'),
            'recipient' =>  "255719932771",
            'type' => 'plain',
            'message' => $message,
          ];
          try{
          $response = Http::withToken(env('ZEPSON_TOKEN'))->post('https://portal.zepsonsms.co.tz/api/v3/sms/send',$params);
        } catch(Exception $e){
              
        }
        Log::info($response->body());
          return ;

  }
   




//     public function Email_send(Request $request)
//     {

//        $fname=$request->fname;
//        $lname=$request->lname;
//        $email=$request->email;
//        $subject=$request->subject;
//        $message=$request->message;

// //Load Composer's autoloader
// require 'vendor/autoload.php';

// //Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = env('MAIL_HOST');                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = env('MAIL_USERNAME');                     //SMTP username
//     $mail->Password   = env('MAIL_PASSWORD');                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
//     //Recipients
//     $mail->setFrom($fname, $lname,$email);
//     $mail->addAddress('neyfredykam@gmail.com');     //Add a recipient 
//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = $subject;
//     $mail->Body    = $message;
//     $dt=$mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
// }

}