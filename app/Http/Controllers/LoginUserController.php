<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Pharmacy_medicine;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Callbackformsgmedicine;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class LoginUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // static function my_cart()
    // {
    //     if (Auth::id()) {
    //         $user_id = Auth()->user()->id;
    //         return Cart::where('user_id', $user_id)->count();
    //     } else {
    //         return 0;
    //     }
    // }

    public function view_all_order()
    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {
                // $user_id = Auth()->user()->id;
                $orders = DB::table('orders')
                    ->join(
                        'pharmacy_medicines',
                        'orders.product_id',
                        '=',
                        'pharmacy_medicines.id'
                    )
                    // ->where('payment_status', '=', 'payed')
                    ->where('payment_method', '=', 'PayOnline')
                    ->where('status', '=', 'pending')
                    ->select(
                        'orders.id as or_id',
                        'pharmacy_medicines.name',
                        'pharmacy_medicines.category',
                        'pharmacy_medicines.image',
                        'pharmacy_medicines.price',
                        'orders.status',
                        'orders.address',
                        'orders.payment_method',
                        'orders.payment_status'
                    )
                    ->get();



                return view('order.view_all_orders', compact('orders'));
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');;
        }
    }

    public function payment_online_done($id)
    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {
                $data = Order::find($id);
                if ($data != null) {
                    $data->payment_status = 'payed';
                }
                if ($data->update()) {
                    return redirect()
                        ->back()
                        ->with('message', 'Success ! Payment payed');
                }
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');;
        }
    }


    public function ship_order()
    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {
                // $user_id = Auth()->user()->id;
                $orders = DB::table('orders')
                    ->join(
                        'pharmacy_medicines',
                        'orders.product_id',
                        '=',
                        'pharmacy_medicines.id'
                    )
                    ->where('status', '=', 'pending')
                    ->where('payment_method', '=', 'COD')
                    ->select(
                        'orders.id as or_id',
                        'pharmacy_medicines.name',
                        'pharmacy_medicines.category',
                        'pharmacy_medicines.image',
                        'pharmacy_medicines.price',
                        'orders.status',
                        'orders.address',
                        'orders.payment_method',
                        'orders.payment_status'
                    )
                    ->orderBy('payment_method', 'desc')
                    ->get();


                return view('order.ship_order', compact('orders'));
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');;
        }
    }

    public function shipped_order($id)
    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {
                $data = Order::find($id);
                if ($data != null) {
                    $data->status = 'shipped';
                }
                if ($data->update()) {
                    return redirect()
                        ->back()
                        ->with('message', 'Success ! Order has been Shipped ');
                }
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');;
        }
    }
    public function canacel_order($id)
    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {


                $data = Order::find($id);
                if ($data != null) {
                    $data->status = 'notavailable';
                }
                if ($data->update()) {
                    return redirect()
                        ->back()
                        ->with('message', 'Success ! Status Updated');
                }
            } else {
                return redirect()->back()->with('message', 'You are not allowed to delete this action');
            }
        } else {
            return redirect('login');
        }
    }

    public function view_shipped_order()
    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {
                // $user_id = Auth()->user()->id;
                $orders = DB::table('orders')
                    ->join(
                        'pharmacy_medicines',
                        'orders.product_id',
                        '=',
                        'pharmacy_medicines.id'
                    )
                    ->where('status', '=', 'shipped')
                    // ->where('payment_method', '=', 'PayOnline')
                    ->select(
                        'orders.id as or_id',
                        'pharmacy_medicines.name',
                        'pharmacy_medicines.category',
                        'pharmacy_medicines.image',
                        'pharmacy_medicines.price',
                        'orders.status',
                        'orders.address',
                        'orders.payment_method',
                        'orders.payment_status'
                    )
                    ->get();


                return view('order.view_shipped_order', compact('orders'));
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');
        }
    }
    public function cancel_order()
    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {
                // $user_id = Auth()->user()->id;
                $orders = DB::table('orders')
                    ->join(
                        'pharmacy_medicines',
                        'orders.product_id',
                        '=',
                        'pharmacy_medicines.id'
                    )
                    ->where('status', '=', 'notavailable')
                    // ->where('payment_method', '=', 'PayOnline')
                    ->select(
                        'orders.id as or_id',
                        'pharmacy_medicines.name',
                        'pharmacy_medicines.category',
                        'pharmacy_medicines.image',
                        'pharmacy_medicines.price',
                        'orders.status',
                        'orders.address',
                        'orders.payment_method',
                        'orders.payment_status'
                    )
                    ->get();


                return view('order.view_shipped_order', compact('orders'));
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');
        }
    }

    public  function delete_order($id)
    {
        if (Auth::id()) {

            if (Auth()->user()->user_type == '5') {
                $data = Order::find($id);
                if ($data->delete()) {
                    return redirect()->back()->with('message', 'Success ! Order Deleted ');
                }
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');
        }
    }
    public  function view_all_msg_about_medicine()
    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {

                $data = Callbackformsgmedicine::where('respone', 'unsend')->get();

                return view('order.view_all_msg_about_medicine', compact('data'));
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');
        }
    }

    public function view_user_call_back_msg_email($id)
    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {
                $data = Callbackformsgmedicine::find($id);
                return view('order.send_email_to_user_get_in_touch', compact('data'));
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');
        }
    }

    public function send_mail_to_request_call_back_msg(Request $request, $id)
    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {
                $data = Callbackformsgmedicine::find($id);

                $details = [
                    'greeting' => $request->greeting,
                    'body' => $request->body,
                    'action_text' => $request->action_text,
                    'action_url' => $request->action_url,
                    'end_part' => $request->end_part
                ];
                $data->respone = 'send';
                if ($data->update()) {

                    Notification::send($data, new SendEmailNotification($details));

                    return redirect()->back()->with('message', 'Email Send Successfully');
                }
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');
        }
    }

    public function delete_call_back_msg_data($id)
    {

        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {
                $data = Callbackformsgmedicine::find($id);
                if ($data->delete()) {
                    return redirect()->back()->with('message', 'Success ! Message Delete Successfully');
                }
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');
        }
    }


    public function delivered_order()
    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '5') {
                // $user_id = Auth()->user()->id;
                $orders = DB::table('orders')
                    ->join(
                        'pharmacy_medicines',
                        'orders.product_id',
                        '=',
                        'pharmacy_medicines.id'
                    )
                    ->where('status', '=', 'deliverd')
                    // ->where('payment_method', '=', 'PayOnline')
                    ->select(
                        'orders.id as or_id',
                        'pharmacy_medicines.name',
                        'pharmacy_medicines.category',
                        'pharmacy_medicines.image',
                        'pharmacy_medicines.price',
                        'orders.status',
                        'orders.address',
                        'orders.payment_method',
                        'orders.payment_status'
                    )
                    ->get();


                return view('order.delivered_order', compact('orders'));
            } else {
                return redirect()->back()->with('message', 'You are not allowed to perform this action');
            }
        } else {
            return redirect('login');
        }
    }
}
