<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Doctor;
use App\Models\patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\transactionns;
use App\Models\GetintouchModel;
use App\Models\Pharmacy_medicine;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Callbackformsgmedicine;
use Psy\Command\ListCommand\FunctionEnumerator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function add_appoitment(Request $request)
    {
        $data = new UserRegister();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->doctor_name_and_specialist =
            $request->doctor_name_and_specialist;
        $data->phone_number = $request->phone_number;
        $data->message = $request->message;
        $data->status = 'In progress';
        $data->user_id = Auth::user()->id;

        $data->save();

        return redirect()
            ->back()
            ->with(
                'message',
                'Appointment register successfully. We will contact with you shortley'
            );
    }

    public function view_my_appointment()
    {
        $user_id = Auth::user()->id;
        $appointment = Appointment::where('user_id', $user_id)->get();
        // dd($appointment);
        return view('user.view_my_appointment', compact('appointment'));
    }

    public function delete_my_appointment($id)
    {
        $data = Appointment::find($id);
        $data->delete();

        return redirect()
            ->back()
            ->with('message', 'Appoitment delete successfully');
    }

    public function index()
    {
        if (Auth::id()) {
            $doctor = Doctor::all()->sortByDesc('id');

            if (Auth::user()->user_type == '0') {

                return view('user.home', compact('doctor'));
            } elseif (Auth::user()->user_type == '1') {
                return view('admin.home');
            } elseif (Auth::user()->user_type == '5') {
                return view('admin.home');
            } elseif (Auth::user()->user_type == '3') {
                return view('admin.patient.home');
            } else {
                return view('user.home', compact('doctor'));
            }
        } else {
            return redirect()->back;
        }
    }

    public function userdisplaypage()
    {



        if (Auth::id()) {
            return redirect('home');
        } else {
            $doctor = Doctor::all()->sortByDesc('id');

            return view('user.home', compact('doctor'));
        }
    }

    public function our_doctor()
    {
        $doctor = Doctor::all()->sortByDesc('id');
        return view('user.our_doctors', compact('doctor'));
    }

    public function contact()
    {
        return view('user.contact');
    }
    public function about()
    {
        $doctor = Doctor::all()->sortByDesc('id');
        return view('user.about', compact('doctor'));
    }
    public function get_in_touch_msg(Request $resquest)
    {
        // dd($resquest->email);

        $data = new GetintouchModel();

        $data->name = $resquest->name;
        $data->email = $resquest->email;
        $data->message = $resquest->message;
        $data->subject = $resquest->subject;
        $data->response_for_message = 'unsend';

        if ($data->save()) {
            return redirect()
                ->back()
                ->with(
                    'message',
                    'Response submit successfully ! We will contact with you shortly'
                );
        }
    }

    // For pharmacy Store both for auth and no auth

    public function pharmacy_store_home()
    {
        $data = Pharmacy_medicine::all()->sortByDesc('id');
        return view('pharmacy_store.pharmacy_store_home', compact('data'));
    }
    public function medicine_detail($id)
    {
        $medicine = Pharmacy_medicine::find($id);

        return view('pharmacy_store.medicine_detail', compact('medicine'));
    }


    static function my_cart()
    {
        if (Auth::id()) {
            $user_id = Auth()->user()->id;
            return Cart::where('user_id', $user_id)->count();
        } else {
            return 0;
        }
    }
    static function my_orders()
    {
        if (Auth::id()) {
            $user_id = Auth()->user()->id;
            return Order::where('user_id', $user_id)->count();
        } else {
            return 0;
        }
    }

    public function buy_product()
    {
        if (Auth::id()) {
            $user_id = Auth()->user()->id;
            $product = DB::table('carts')
                ->join(
                    'pharmacy_medicines',
                    'carts.product_id',
                    '=',
                    'pharmacy_medicines.id'
                )
                ->where('carts.user_id', $user_id)
                ->sum('pharmacy_medicines.price');

            // dd($product);
            return view('pharmacy_store.order_page', compact('product'));
        } else {
            return ('login');
        }
    }

    public function view_my_cart($id)
    {
        if (Auth::id()) {
            $user_id = $id;
            $product = DB::table('carts')
                ->join(
                    'pharmacy_medicines',
                    'carts.product_id',
                    '=',
                    'pharmacy_medicines.id'
                )
                ->where('carts.user_id', $user_id)
                ->select(
                    'pharmacy_medicines.name',
                    'pharmacy_medicines.category',
                    'pharmacy_medicines.image',
                    'pharmacy_medicines.price',
                    'carts.id as cart_id'
                )
                ->get();
            // dd($product);
            return view('pharmacy_store.view_my_cart', compact('product'));
        } else {
            return redirect('login');
        }
    }

    public function buy_medicine($id)
    {
        if (Auth::id()) {
            $medicine = Pharmacy_medicine::find($id);

            return view('pharmacy_store.buy_medicine', compact('medicine'));
        } else {
            return redirect('login');
        }
    }
    public function add_to_cart(Request $request)
    {
        // dd($request->product_id);
        if (Auth::id()) {
            $data = new Cart();
            $data->product_id = $request->product_id;
            $data->user_id = Auth::user()->id;
            if ($data->save()) {
                return redirect()
                    ->back()
                    ->with('message', 'Item Add To Cart Successfull');
            } else {
                return redirect()
                    ->back()
                    ->with('message', 'Item save UnSuccessfull');
            }
        } else {
            return redirect('login');
        }
    }
    public function add_to_cart_url($id)
    {
        // dd($request->product_id);
        if (Auth::id()) {
            $data = new Cart();
            $data->product_id = $id;
            $data->user_id = Auth::user()->id;
            if ($data->save()) {
                return redirect()
                    ->back()
                    ->with('message', 'Item Add To Cart Successfull');
            } else {
                return redirect()
                    ->back()
                    ->with('message', 'Item save UnSuccessfull');
            }
        } else {
            return redirect('login');
        }
    }
    public function add_to_cart_and_order_page(Request $request)
    {
        // dd($request->product_id);
        if (Auth::id()) {
            $data = new Cart();
            $data->product_id = $request->product_id;
            $data->user_id = Auth::user()->id;
            if ($data->save()) {
                return redirect('buy_product');
            } else {
                return redirect()
                    ->back()
                    ->with('message', 'Item save UnSuccessfull');
            }
        } else {
            return redirect('login');
        }
    }



    public function delete_cart_item($id)
    {
        if (Auth::id()) {
            $data = Cart::find($id);
            if ($data->delete()) {
                return redirect()
                    ->back()
                    ->with('message', 'Item delete successfully');
            } else {
                return redirect()
                    ->back()
                    ->with('message', 'Failed to delete item');
            }
        } else {
            return redirect('login');
        }
    }

    public function save_order(Request $request)
    {
        // dd($request->payment_method)
        if (Auth::id()) {
            $user_id = Auth::user()->id;
            $all_cart = Cart::where('user_id', $user_id)->get();
            if ($request->payment_method == 'PayOnline') {
                return redirect('/stripe');
            } else {
                foreach ($all_cart as $cart) {
                    $order = new Order();
                    $order->product_id = $cart->product_id;
                    $order->user_id = $cart->user_id;
                    $order->status = 'pending';
                    $order->payment_method = $request->payment_method;
                    $order->payment_status = 'pending';
                    $order->address = $request->address;
                    if ($order->save()) {
                        Cart::where('user_id', $user_id)->delete();
                        return redirect('my_order')->with('message', 'Success ! Your Order Has been Placed');
                    }
                }
            }
            // dd($all_cart);
        } else {
            return redirect('login');
        }
    }

    public function my_order()
    {
        if (Auth::id()) {

            $user_id = Auth::user()->id;
            $orders = DB::table('orders')
                ->join('pharmacy_medicines', 'orders.product_id', '=', 'pharmacy_medicines.id')
                ->where('orders.user_id', $user_id)
                ->select(
                    'orders.id as or_id',
                    'pharmacy_medicines.name',
                    'pharmacy_medicines.category',
                    'pharmacy_medicines.image',
                    'pharmacy_medicines.price',
                    'orders.status',
                    'orders.address',
                    'orders.payment_method',
                    'orders.payment_status',
                )
                ->get()
                ->sortByDesc('or_id');

            // dd($orders);
            return view('pharmacy_store.my_order', compact('orders'));
        } else {
            return redirect('login');
        }
    }

    public function order_recived_by_user($id)
    {
        if (auth::id()) {
            $user_id = Auth()->user()->id;
            $current_order = Order::where([
                ['user_id', '=', $user_id]
            ])->find($id);
            $current_order->status = 'deliverd';

            if ($current_order->update()) {
                return redirect()->back()->with('message', 'Success ! Order Recived');
            }
        } else {
            return redirect('login');
        }
    }


    public function request_a_call_back_for_medicine(Request $request)
    {
        if (Auth::id()) {
            $user_id = Auth()->user()->id;
            $data = new Callbackformsgmedicine();
            $data->user_id = $user_id;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->medicine_name = $request->medicine;
            $data->phone_number = $request->phone_number;
            $data->msg = $request->message;
            if ($data->save()) {
                return redirect()->back()->with('message', 'Success ! Response Submitted We will contact with you soon..');
            }
        } else {
            return redirect('login');
        }
        // dd($request->name);
    }

    // show all medicine
    public function show_all_medicine()
    {
        if (Auth::id()) {
            $all_medicine_record = Pharmacy_medicine::all();
            return view('pharmacy_store.show_all_medicine', compact('all_medicine_record'));
        } else {
            return redirect('login');
        }
    }


    // stripe payment process
    public function stripe()
    {
        if (auth::id()) {
            $user_id = Auth::user()->id;
            $all_cart = Cart::where('user_id', $user_id)->get();

            $product_total = DB::table('carts')
                ->join(
                    'pharmacy_medicines',
                    'carts.product_id',
                    '=',
                    'pharmacy_medicines.id'
                )
                ->where('carts.user_id', $user_id)

                ->sum('pharmacy_medicines.price');



            $get_product_name = DB::table('carts')
                ->leftJoin(
                    'pharmacy_medicines',
                    'carts.product_id',
                    '=',
                    'pharmacy_medicines.id'
                )
                ->where('carts.user_id', $user_id)
                ->select(
                    'pharmacy_medicines.name',
                    'pharmacy_medicines.id',
                    'pharmacy_medicines.category',
                    'pharmacy_medicines.image',
                    'pharmacy_medicines.price',
                    'carts.id as cart_id'
                )
                ->get();

            // get prevoius infromation from table
            $transaction_details_from_table = transactionns::where('user_id', '=', $user_id)->first();


            return view('pharmacy_store.online_payment', compact('get_product_name', 'product_total', 'transaction_details_from_table'));
        }
    }
    public function stripePost(Request $request)
    {
        $user_id = Auth::user()->id;
        $all_cart = Cart::where('user_id', $user_id)->get();


        $payment_message = '';
        if (!empty($_POST['stripeToken'])) {
            // get token and user details
            $stripeToken = $_POST['stripeToken'];
            $customerName = $_POST['customerName'];
            $customerEmail = $_POST['emailAddress'];

            $customerAddress = $_POST['customerAddress'];
            $customerCity = $_POST['customerCity'];
            $customerZipcode = $_POST['customerZipcode'];
            $customerState = $_POST['customerState'];
            $customerCountry = $_POST['customerCountry'];

            $cardNumber = $_POST['cardNumber'];
            $cardCVC = $_POST['cardCVC'];
            $cardExpMonth = $_POST['cardExpMonth'];
            $cardExpYear = $_POST['cardExpYear'];

            //  inclide stripe php library



            // set secret and public key
            $stripe = array(
                "secret_key" => "sk_test_51LIV9wJ4YJVkDTEY5Vqaq95Z16XxFiMcHQUDK3NxjETCqT8NCIq7slcHC7IdZo0voM5AJTbUssGp5DJ4qzZZOv5q00BVScLQMe",
                "publishable_key" => "pk_test_51LIV9wJ4YJVkDTEY4KQfDJS6tmL08YNTzpDOjSUtwYNWg7dPem8AonTGBf0QkGAoRnWwCWllJsUry25YzawU3NSn00fhtYe2wq"

            );

            \Stripe\Stripe::setApiKey($stripe['secret_key']);

            // add customer to stripe
            $customer = \Stripe\Customer::create(array(
                'name' => $customerName,
                'description' => 'test description',
                'email' => $customerEmail,
                'source' => $stripeToken,
                "address" =>
                [
                    "city" => $customerCity,
                    "country" => $customerCountry,
                    "line1" => $customerAddress,
                    "line2" => "",
                    "postal_code" => $customerZipcode,
                    "state" => $customerState
                ]

            ));

            // item details for which payment made
            $itemName = $_POST['item_details'];
            $itemNumber = $_POST['item_number'];
            $itemPrice = $_POST['price'];
            $totalAmount = $_POST['total_amount'];
            $currency = $_POST['currency_code'];
            // $orderNumber = $_POST['order_number'];



            // detail for which payment perform
            $payDetails = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount'   => $totalAmount * 100,
                'currency'   => $currency,
                'description' => $itemName

            ));

            // get payment detail
            $paymenyResponse = $payDetails->jsonSerialize();

            // transaction details

            // if ($paymentResponse['amount_refunded'] == 0 && empty($paymentResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1) {
            if ($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1) {

                // transaction details
                $amountPaid = $paymenyResponse['amount'];
                $balanceTransaction = $paymenyResponse['balance_transaction'];
                $paidCurrency = $paymenyResponse['currency'];
                $paymentStatus = $paymenyResponse['status'];
                $paymentDate = date("Y-m-d H:i:s");

                // include database

                if ($paymentStatus = 'succeeded') {
                    // $paymentMessage = "The payment was successful. Order ID: {$orderNumber}";
                    $paymentMessage = "The paymebt was successful.";
                    foreach ($all_cart as $cart) {
                        $order = new Order();
                        $order->product_id = $cart->product_id;
                        $order->user_id = $cart->user_id;
                        $order->status = 'pending';
                        $order->payment_method = 'PayOnline';
                        $order->payment_status = 'payed';
                        $order->address = $request->customerAddress;
                        if ($order->save()); {
                            $transaction_details = new transactionns();
                            $transaction_details->cust_name = $customerName;
                            $transaction_details->user_id = Auth::user()->id;
                            $transaction_details->cust_email = $customerEmail;
                            $transaction_details->card_number = $cardNumber;
                            $transaction_details->card_cvc = $cardCVC;
                            $transaction_details->card_exp_month = $cardExpMonth;
                            $transaction_details->card_exp_year = $cardExpYear;
                            $transaction_details->item_name = $itemName;
                            $transaction_details->item_number = $itemNumber;
                            $transaction_details->item_price = $itemPrice;
                            $transaction_details->item_price_currency = $paidCurrency;
                            $transaction_details->paid_amount = $amountPaid;
                            $transaction_details->paid_amount_currency = $paidCurrency;
                            $transaction_details->txn_id = $balanceTransaction;
                            $transaction_details->payment_status = $paymentStatus;
                            if ($transaction_details->save()) {
                                Cart::where('user_id', $user_id)->delete();
                            }
                        }
                    }
                } else {
                    $paymentMessage = "inner database Failed";
                }
            } else {
                $paymentMessage = "paymentResponse Failed";
            }
        } else {
            $paymentMessage = "stripe Failed";
        }


        return redirect('view_my_cart/' . $user_id)->with('message', $paymentMessage);
    }


    // patient view records
    // public function patient_data_view_record()
    // {
    //     return view('admin.patient.home');
    // }
    public function search(Request $request)
    {


        $output = '';
        $count = 1;

        $patient = patient::where('email', 'LIKE', '%' . $request->search . '%')
            ->orWhere('phone_number', 'LIKE', '%' . $request->search . '%')
            ->get();
        foreach ($patient as $patients) {
            // find doctor name from doctor id
            $p_id = $patients->doctor;
            $pt = Doctor::find($p_id);
            // end
            $output .=
                '<tr>
            <td>' . $count++ . '</td>
            <td>' . $patients->name . '</td>
            <td>' . $patients->gender . '</td>
            <td>' . $patients->age . '</td>
            <td>' . $patients->email . '</td>
            <td>' . $patients->phone_number . '</td>
            <td>' . $patients->address . '</td>
            <td>' . $patients->disease . '</td>
            <td>' . $pt->name . '</td>
            </tr>';
        }

        return response($output);
    }
}
