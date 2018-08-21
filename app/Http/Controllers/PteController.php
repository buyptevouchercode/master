<?php

namespace App\Http\Controllers;

use App\Mail\SuccessMail;
use App\Models\Agent;
use App\Models\Enquiry;
use App\Models\PendingVoucher;
use App\Models\Prize;
use App\Models\Promo;
use App\Models\SaleData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pte;
use Validator;
use DB;
use Mail;


class PteController extends Controller
{

    protected $pte;
    protected $promo;
    protected $prize;
    protected $enquiry;
    protected $saleData;
    protected $pendingVoucher;
    protected $agent;


    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Pte $pte, Promo $promo, Prize $prize, Enquiry $enquiry,
                                PendingVoucher $pendingVoucher,SaleData $saleData,Agent $agent)
    {
        // $this->middleware(['auth', 'checkRole']);
        $this->pte = $pte;
        $this->promo = $promo;
        $this->prize = $prize;
        $this->enquiry = $enquiry;
        $this->saleData = $saleData;
        $this->pendingVoucher = $pendingVoucher;
        $this->agent = $agent;

    }

    /**
     * Validation of add and edit action customeValidate
     *
     * @param array $data
     * @param string $mode
     * @return mixed
     */
    public function customeValidate($data)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:10',
            'number_of_voucher' => 'required',
            'state' => 'required'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $errorRedirectUrl = "/";
            return redirect($errorRedirectUrl)->withInput()->withErrors($validator);
        }
        return false;
    }


    /**
     * Create payment request and redirect to payment gateway.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createPaymentRequest(Request $request)
    {
        $request_data = $request->all();
        $validations = $this->customeValidate($request->all());
        if ($validations) {
            return $validations;
        }

        //Get the current rate of voucher

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:36703c0ed20e303cc560d62233408859",
                "X-Auth-Token:a736dc788e3bc6b8d5bd885bc45acacc"));
        $payload = Array(
            'purpose' => 'PTE Promo Payment',
            'amount' => $request_data['amount'],
            'phone' => $request_data['mobile'],
            'buyer_name' => $request_data['name'],
            'redirect_url' => 'http://buyptevoucher.in/pte/redirect',
            'send_email' => false,
            'webhook' => 'http://buyptevoucher.in/pte/webhook',
            'send_sms' => false,
            'email' => $request_data['email'],
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        if(isset($result["payment_request"]["id"])) {
            $request_data['payment_request_id'] = $result["payment_request"]["id"];
        }else {
            $request->session()->flash('alert-danger', 'Opps Something went wrong !!');
            return redirect('/')->withInput(); 
        }


        //Insert into enquiry

        $enquiry_data = $this->enquiry->addEnquiry($request_data);
        return redirect($result["payment_request"]["longurl"].'?embed=form');

    }

    /**
     * Create payment request and redirect to payment gateway.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function checkPaymentStatus(Request $request)
    {
        $request_data = $request->all();
        if (isset($request_data['payment_id']) && isset($request_data['payment_request_id'])) {
            $PaymentRequestId = $request_data["payment_request_id"];
            $PaymentId = $request_data["payment_id"];
            if (!empty($PaymentRequestId) && !empty($PaymentId)) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://www.instamojo.com/api/1.1/payments/$PaymentId");
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:36703c0ed20e303cc560d62233408859",
                        "X-Auth-Token:a736dc788e3bc6b8d5bd885bc45acacc"));

                $response = curl_exec($ch);
                curl_close($ch);

                $result = json_decode($response, true);

                $success = $result["success"];
                $payment_request_status = $result['payment']['status'];
                $amount_paid = $result['payment']['amount'];
                $instamojo_fee = $result['payment']['fees'];
                $payment_id = $result['payment']['payment_id'];


                //After payment get credited and successful
                if (intval($success) == 1) {
                    if ($payment_request_status == "Credit") {
                        $user_detail = $this->enquiry->getEnquiryByField($PaymentRequestId, 'payment_request_id');
                        if (count($user_detail) > 0) {

                            $number_of_voucher = $user_detail->number_of_voucher;
                            $email = $user_detail->email;
                            $name = $user_detail->name;
                            $mobile = $user_detail->mobile;
                            $rate = $user_detail->rate;
                            $actual_amount = intval($number_of_voucher) * intval($rate);
                            if ($amount_paid != $actual_amount) {
                                $request->session()->flash('alert-danger', 'Payment amount is not same');
                                return redirect('/')->withInput();
                            }

                            $admin_email_data = [];
                            $admin_email_data['email'] = $email;
                            $admin_email_data['name'] = $name;
                            $admin_email_data['mobile'] = $mobile;
                            $admin_email_data['payment_id'] = $payment_id;
                            $admin_email_data['amount_paid'] = $amount_paid;
                            $admin_email_data['number_of_voucher'] = $number_of_voucher;
                            $admin_email_data['instamojo_fee'] = $instamojo_fee;
                            $admin_email_data['date'] = date('d-m-Y');
                            $admin_email_data['type'] = 'admin';
                            Mail::send(new SuccessMail($admin_email_data));
                            $request->session()->flash('alert-success', 'Thankyou! Voucher will be send to your email');
                            return redirect('/');
                        }


                    }
                    /*if ($payment_request_status == "Credit") {
                        //Fetch the user detail and voucher detail
                        $user_detail = $this->enquiry->getEnquiryByField($PaymentRequestId, 'payment_request_id');
                        if (count($user_detail) > 0) {
                            $enquiry_id = $user_detail->id;
                            $number_of_voucher = $user_detail->number_of_voucher;
                            $email = $user_detail->email;
                            $name = $user_detail->name;
                            $mobile = $user_detail->mobile;
                            $rate = $user_detail->rate;
                            $actual_amount = intval($number_of_voucher) * intval($rate);
                            if ($amount_paid != $actual_amount) {
                                $request->session()->flash('alert-danger', 'Payment amount is not matching the voucher total amount');
                                return redirect('/')->withInput();
                            }
                            $pending_voucher_detail = $this->pendingVoucher->getPendingVoucherByField($enquiry_id, 'enquiry_id');
                            if (count($pending_voucher_detail) > 0) {

                                //Voucher to send in the mail
                                $voucher_to_send = [];
                                $raw_voucher_id = $pending_voucher_detail->voucher_id;
                                $voucher_id = explode(",", $pending_voucher_detail->voucher_id);
                                foreach ($voucher_id as $voucher) {
                                    $update_voucher_data = [];
                                    $update_voucher_data['status'] = 1;
                                    $update_voucher_data['id'] = $voucher;
                                    $voucher_data = $this->promo->getPromoByField($voucher,'id');
                                    if(!empty($voucher_data)) {
                                        $voucher_to_send[] = $voucher_data->voucher_code;
                                    }
                                    $this->promo->updateStatus($update_voucher_data);
                                }

                                // For deleteing the entries from the pending_voucher table
                                $this->pendingVoucher->deletePendingVoucher($enquiry_id,'enquiry_id');

                                $final_voucher_sms = implode(",", $voucher_to_send);

                                // For sending the SMS to customer
                                //$this->sendSms($final_voucher_sms,$mobile);
                                $sale_data_entry = [];
                                $sale_data_entry['voucher_id'] = $raw_voucher_id;
                                $sale_data_entry['voucher_code'] = implode(",", $voucher_to_send);
                                $sale_data_entry['instamojo_fee'] = $instamojo_fee;
                                $sale_data_entry['enquiry_id'] = $enquiry_id;
                                $sale_data_entry['payment_code'] = $payment_id;
                                $sale_data_entry['rate'] = $rate;
                                $sale_data_entry['amount_paid'] = $amount_paid;
                                $sale_data_entry['number_of_voucher'] = $number_of_voucher;
                                $sale_data = $this->saleData->addSaleData($sale_data_entry);

                                //Prepare data for email sending to Customer

                                $customer_email_data = [];
                                $customer_email_data['email'] = $email;
                                $customer_email_data['name'] = $name;
                                $customer_email_data['mobile'] = $mobile;
                                $customer_email_data['amount_paid'] = $amount_paid;
                                $customer_email_data['payment_id'] = $payment_id;
                                $customer_email_data['voucher_to_send'] = implode(",", $voucher_to_send);
                                $customer_email_data['date'] = date('d-m-Y');
                                $customer_email_data['type'] = 'customer';
                                Mail ::send(new SuccessMail($customer_email_data));
                                //Prepare data for admin
                                sleep(5);
                                $admin_email_data = [];
                                $admin_email_data['email'] = $email;
                                $admin_email_data['name'] = $name;
                                $admin_email_data['mobile'] = $mobile;
                                $admin_email_data['payment_id'] = $payment_id;
                                $admin_email_data['amount_paid'] = $amount_paid;
                                $admin_email_data['number_of_voucher'] = $number_of_voucher;
                                $admin_email_data['instamojo_fee'] = $instamojo_fee;
                                $admin_email_data['date'] = date('d-m-Y');
                                $admin_email_data['type'] = 'admin';
                                $admin_email_data['voucher_to_send'] = implode(",", $voucher_to_send);
                                Mail::send(new SuccessMail($admin_email_data));

                                sleep(3);
                                $mock_test_mail = [];
                                $mock_test_mail['type'] = 'mock_test';
                                $mock_test_mail['email'] = $email;
                                Mail::send(new SuccessMail($mock_test_mail));


                                if($sale_data) {

                                    return redirect('/thankyou');
                                }
                            }
                        } else {
                            $request->session()->flash('alert-danger', 'Payment request id not available please contact admin');
                            return redirect('/')->withInput();
                        }
                    }*/
                }
            }
        }

        $request->session()->flash('alert-danger', 'Something went wrong please contact admin');
        return redirect('/')->withInput();


    }


    /**
     * Create payment request and redirect to payment gateway.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /*public function sendSms($voucher_code,$mobile)
    {
        $sms = "Your PTE Exam Promo Code :$voucher_code\nPlease share ptepromocode.com to your friends & help them to save money on PTE Exam Booking.";
        //Your authentication key
        $authKey = "134556AZbJqzDsxSk585abcb1";

        //Multiple mobiles numbers separated by comma
        $mobileNumber = $mobile;

        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "PTEPRC";

        //Your message to send, Add URL encoding here.
        $message = urlencode($sms);

        //Define route
        $route = "4";
        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );

        //API URL
        $url="http://api.msg91.com/api/sendhttp.php";

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));
        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //get response
        curl_exec($ch);

        //Print error if any
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);
    }*/

}
