<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;
use DB;
use View;
use Session;
use Auth;
use File;
//use App\Models\tblProgram;

class PaymentController extends Controller
{
    public function userpay($regtime)
    {

        $data['data'] = DB::table('tbl_programs')->where(['regtime' => $regtime])->orderBy('id', 'desc')->get();

        if(count($data) > 0)
        {
            return view('site.userpay', $data);
        }
        else
        {
            return view('site.userpay');
        }
    }
    public function payment(Request $req)
    {
        $purpose = $req->purpose;
        $orderid = $req->orderid;
        $userid = $req->userid;
        $amount = $req->amount;
        $pgmid = $req->pgmid;
        $pgmregtime = $req->pgmregtime;
        $buyer_name = $req->user_name;
        $buyer_mobile = $req->user_mobile;
        $buyer_email = $req->user_email;
        $created = date('Y-m-d');
        $year = date('Y');

        $login = DB::table('tbl_payments')->insert(['userid' => $userid, 'orderid' => $orderid, 'purpose' => $purpose, 'amount' => $amount, 'pgmid' => $pgmid, 'pgmregtime' => $pgmregtime, 'buyer_name' => $buyer_name, 'buyer_mobile' => $buyer_mobile, 'buyer_email' => $buyer_email, 'created' => $created, 'year' => $year]);
                    

        /*$ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:61341d4fa68b740922e96c731bf3ca9e",
                          "X-Auth-Token:7145c6674d66c233848a44f487eeb19e"));
        $payload = Array(
            'purpose' => $purpose,
            'amount' => $amount,
            'phone' => $buyer_mobile,
            'buyer_name' => $buyer_name,
            'redirect_url' => 'http://e-taxindia.com/lms/redirect/'.$orderid,
            'send_email' => false,
            'webhook' => '',
            'send_sms' => false,
            'buyer_email' => $req->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); */

        //echo $response;
        $data =json_decode($response, true);
        return redirect($data['payment_request']['longurl']);
    }

    public function redirect(Request $request, $id)
    {
        
        $payment_id = $request['payment_id'];
        $payment_status = $request['payment_status'];
        $payment_request_id = $request['payment_request_id'];
        $date = date('d/m/Y');
        $to = 'support@extrememedia.in, vipin@extrememedia.in';
        $buyer_email = "";
        $amount = '';
        $buyer_name = "";
        $pgmregtime= "";
        $amount = "";
        $pgmid = "";
        $instid = '';
        $duraion = '';
        $durtype = '';
        $userid = '';
        $created = date('Y-m-d');
        $year = date('Y');

        if($payment_id != ''){
            DB::table('tbl_payments')->where('orderid', $id)->update(['payment_id' => $payment_id, 'payment_status' => $payment_status, 'payment_request_id' => $payment_request_id, 'paidon' => $created, 'payment_type' => '1']);
            
            $data = DB::table('tbl_payments')->where(['orderid' => $id])->get();

            foreach($data as $object){
                $buyer_email = $object->buyer_email;
                $amount = $object->amount;
                $buyer_name = $object->buyer_name;
                $pgmregtime = $object->pgmregtime;
                $amount = $object->amount;
                $pgmid = $object->pgmid;
                $userid = $object->userid;
            }

            
            $ord = DB::table('tbl_programs')->where(['regtime' => $pgmregtime])->get();

            foreach($ord as $obj){
                $instid = $obj->instid;
                $duraion = $obj->duraion;
                $durtype = $obj->durtype;
            }

           
            $pack_ends_on = date('Y-m-d', strtotime("+".$duraion." ".$durtype, time())); 

            DB::table('tbl_user_program_payments')->insert(['userid' => $userid, 'prgrmid' => $pgmid, 'payment_type' => '1', 'created' => $created, 'year' => $year]);
            
            DB::table('tbl_user_packages')->insert(['studentid' => $userid, 'pgmid' => $pgmid, 'purchased_on' => $created, 'pack_ends_on' => $pack_ends_on, 'instid' => $instid, 'created' => $created, 'year' => $year]);
                  

            $subject = "Illumin New Payment Received";

            $message = "
            <html>
            <head>
            <title>Illumin New Payment Received</title>
            </head>
            <body>
            <p>Dear Admin,</p>
            <table>
            
            <tr>
                <td>Learn Ex New Payment of ₹".$amount." Received. The Action was done on ".$date."</td>
                <td></td>
                <td></td>
            </tr>
            </table>
            </body>
            </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .='X-Mailer: PHP/' . phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

            // More headers
            $headers .= 'From: <info@illumin.in>' . "\r\n";

            mail($to,$subject,$message,$headers);

            // User mail Contents

            $subject = "Illumin Payment";

            $message = "
            <html>
            <head>
            <title>Illumin Payment</title>
            </head>
            <body>
            <p>Dear ".$buyer_name.",</p>
            <table>
            
            <tr>
                <td>Thank you for choosing our course. PDGST is ideal for the GST beginners and the candidates who would like to choose their profession as accountants or tax practitioners. Please listen to the recorded GST video sessions and carefully go through the PDF notes of each session. Do not hesitate to contact us if you have any questions.</td>
                <td></td>
                <td></td>
            </tr>
            </table>
            </body>
            </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .='X-Mailer: PHP/' . phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

            // More headers
            $headers .= 'From: <info@illumin.in>' . "\r\n";

            mail($buyer_email,$subject,$message,$headers);

            return redirect('course-enroll/'.$pgmregtime );
        }


        //return $request->all();
    }
}
