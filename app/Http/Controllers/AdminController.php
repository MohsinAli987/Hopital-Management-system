<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Doctor;
use App\Models\Pharmacy_medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
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

    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function add_doctor(Request $request)

    {
        if (Auth::id()) {
            if (Auth()->user()->user_type == '1') {

                $doctor = new Doctor;

                $image = $request->doctor_image;
                $image_name = time() . '.' . $image->getClientoriginalExtension();
                // dd($image_name);
                $request->doctor_image->move('doctorimage', $image_name);
                $doctor->image = $image_name;
                $doctor->name = $request->doctor_name;
                $doctor->room_no = $request->doctor_room_no;
                $doctor->email  = $request->doctor_email;
                $doctor->phone_number = $request->doctor_phone_number;
                $doctor->specialist = $request->doctor_specialist;

                $doctor->save();
                return redirect('show_all_doctor')->with('message', 'New Doctor Added Successfully');
            }
        } else {
            return redirect('login');
        }
    }

    public function show_all_doctor_data()
    {

        $doctor_data = Doctor::all()->sortByDesc("id");

        return view('admin.show_all_doctors', compact('doctor_data'));
    }

    public function edit_doctor($id)
    {
        $doctor_data = Doctor::find($id);

        return view('admin.edit_doctor_page', compact('doctor_data'));
    }
    public function update_doctor_data(Request $request, $id)
    {
        $doctor_data = Doctor::find($id);

        $image = $request->doctor_image;
        if ($image) {
            $image_name = time() . '.' . $image->getClientoriginalExtension();

            $request->doctor_image->move('doctorimage', $image_name);
            $doctor_data->image = $image_name;
        }
        $doctor_data->name = $request->doctor_name;
        $doctor_data->room_no = $request->doctor_room_no;
        $doctor_data->email  = $request->doctor_email;
        $doctor_data->phone_number = $request->doctor_phone_number;
        $doctor_data->specialist = $request->doctor_specialist;

        $doctor_data->update();
        return redirect('show_all_doctor')->with('message', 'Doctor Updated Successfully');
    }


    public function delete_doctor_data($id)
    {
        $docto_data = Doctor::find($id);

        $docto_data->delete();

        return redirect()->back()->with('message', 'Doctor data delete successfully');
    }



}
