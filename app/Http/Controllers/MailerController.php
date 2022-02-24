<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerController extends Controller
{
    public function notify()
    {
        return view("notify");
    }
    protected function sendNotify(Request $request)
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'rmscccam@gmail.com';   //  sender username
            $mail->Password = 'rmsccc123';       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465

            $mail->setFrom('rmscccam@gmail.com', 'RMSCCC Staff');
            $mail->addAddress($request->input('recipient'));
            $mail->addCC('rmscccam@gmail.com');
            $mail->addBCC('rmscccam@gmail.com');

            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = $request->input('subject');
            $mail->Body    = $request->input('body');

            // $mail->AltBody = plain text version of email body;

            if (!$mail->send()) {
                return back()->with("fail", "Email not sent.")->withErrors($mail->ErrorInfo);
            } else {
                return back()->with("success", "Email has been sent.");
            }
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent.')->withErrors($e->getMessage());
        }
    }
}
