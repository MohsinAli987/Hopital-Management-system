<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Pharmacy_medicine;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\GetintouchModel;
use App\Models\patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class FunctionsController extends Controller
{

    public function __construct()
    {

        return $this->middleware('adminauth');
    }

    public function add_appoitment(Request $request)
    {


        $data = new Appointment;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->doctor_name_and_specialist = $request->doctor_name_and_specialist;
        $data->phone_number = $request->phone_number;
        $data->message = $request->message;
        $data->status = 'In progress';
        $data->user_id = Auth::user()->id;


        $data->save();

        return redirect()->back()->with('message', 'Appointment register successfully. We will contact with you shortley');
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

        return redirect()->back()->with('message', 'Appoitment delete successfully');
    }

    public function check_user_appoitment()
    {

        $data = Appointment::all()->sortByDesc("id");
        return view('admin.check_appoitment', compact('data'));
    }

    public function approve_user_appointment($id)
    {

        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->update();

        return redirect()->back()->with('message', 'Appointment Approved successfully');
    }
    public function cancel_user_appointment($id)
    {

        $data = Appointment::find($id);
        $data->status = 'Cancel';
        $data->update();

        return redirect()->back()->with('message', 'Appointment Cancel successfully');
    }

    public function view_send_email($id)
    {
        $data = Appointment::find($id);
        return view('admin.view_user_send_email', compact('data'));
    }
    public function view_user_get_in_touch_msg_email($id)
    {
        $data = GetintouchModel::find($id);
        return view('admin.send_email_to_user_get_in_touch', compact('data'));
    }
    public function send_email_to_user(Request $request, $id)
    {
        $data = Appointment::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_part' => $request->end_part
        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Email Send Successfully');
    }
    public function send_mail_to_all_in_touch_msg(Request $request, $id)
    {
        $data = GetintouchModel::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_part' => $request->end_part
        ];

        Notification::send($data, new SendEmailNotification($details));
        $data->response_for_message = 'send';
        if ($data->update())
            return redirect()->back()->with('message', 'Email Send Successfully');
    }

    public function view_user_data()
    {
        $data = User::all();
        return view('admin.view_user_data', compact('data'));
    }
    public function edit_user_data($id)
    {
        $data = User::find($id);

        return view('admin.edit_user_data', compact('data'));
    }
    public function update_user_data(Request $request, $id)
    {
        $data = User::find($id);

        $data->name = $request->user_name;
        $data->email = $request->user_email;
        $data->phone = $request->user_phone_number;
        $data->user_type = $request->user_type;
        $data->address = $request->user_address;
        $data->update();

        return redirect('view_user_data')->with('message', 'User Updated Successfully');
    }
    public function delete_user_data($id)
    {
        $data = User::find($id);
        if ($data != null) {
            $data->delete();
            return redirect()->back()->with('message', 'User delete Successfully');
        } else {
            return redirect()->back()->with('message', 'Delete UnSuccessfully ! No user found ');
        }
    }
    public function delete_in_touch($id)
    {
        $data = GetintouchModel::find($id);
        if ($data != null) {
            if ($data->delete())
                return redirect()->back()->with('message', 'Msg delete Successfully');
        } else {
            return redirect()->back()->with('message', 'Delete UnSuccessfully ! No Messsage found ');
        }
    }

    public function view_all_in_touch_msg()
    {
        $data = GetintouchModel::where('response_for_message', 'unsend')->get()->sortByDesc("id");
        return view('admin.view_all_in_touch_msg', compact('data'));
    }
    public function change_user_password($id)
    {
        $data = User::find($id);

        return view('admin.change_user_password', compact('data'));
    }
    public function update_user_password(Request $request, $id)
    {
        // dd(Hash::make($request['user_password']));
        $data = User::find($id);
        $data->password =  Hash::make($request['user_password']);
        if ($data->password != null) {
            if ($data->update()) {
                return redirect()->back()->with('message', 'Password Updated Successfully');
            }
        } else {
            return redirect()->back()->with('message', 'No user found');
        }
        // return view('admin.change_user_password',compact('data'));
    }

    public function view_medicine_to_add()
    {
        return view('admin_pharmacy_view.add_medicine');
    }
    public function add_medicine(Request $request)
    {
        if ($request->id == null) {
            $data = new Pharmacy_medicine();
            $data->name = $request->name;
            $data->manufacturer = $request->manufacturer;
            $data->category = $request->category;
            // for image
            $image = $request->image;
            $image_name = time() . '.' . $image->getClientoriginalExtension();

            $request->image->move('pharmacy_medicine', $image_name);
            $data->image = $image_name;
            // end for image
            $data->price = $request->price;
            if ($data->save()) {
                return redirect('view_all_medicine')->with('message', 'Medicine Save Successfully');
            }
        } else {
            $data =  Pharmacy_medicine::find($request->id);
            $data->name = $request->name;
            $data->manufacturer = $request->manufacturer;
            $data->category = $request->category;
            // for image
            $image = $request->image;
            if ($image != null) {
                $image_name = time() . '.' . $image->getClientoriginalExtension();

                $request->image->move('pharmacy_medicine', $image_name);
                $data->image = $image_name;
            }
            // end for image

            $data->price = $request->price;
            if ($data->update()) {
                return redirect('view_all_medicine')->with('message', 'Medicine updated Successfully');
            }
        }
    }

    public function view_all_medicine()
    {

        $data = Pharmacy_medicine::all()->sortByDesc("id");
        return view('admin_pharmacy_view.view_all_medicines', compact('data'));
    }
    public function edit_medicine_data($id)
    {
        $data = Pharmacy_medicine::find($id);
        return view('admin_pharmacy_view.edit_medicine_data', compact('data'));
    }
    public function delete_medicine_data($id)
    {
        $data = Pharmacy_medicine::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Medicine Deleted Successfully');
    }

    static function count_msg()
    {
        $data = [];
        $data['all_msg'] = GetintouchModel::where('response_for_message','unsend')->paginate(4)->sortByDesc("id");
        $data['total'] =  GetintouchModel::where('response_for_message','unsend')->count();

        return compact('data');
    }


    // patient Crud
    Public function add_patient_route()
    {
        $doctor = Doctor::all()->sortBy('name');
        return view('admin.patient.add_patient',compact('doctor'));
    }
    public function add_patient(Request $request)
    {
        $patient = new patient;
        $patient->name = $request->patient_name;
        $patient->gender = $request->patient_gender;
        $patient->age = $request->patient_age;
        $patient->email = $request->patient_email;
        $patient->phone_number = $request->patient_phone_number;
        $patient->address = $request->patient_address;
        $patient->disease = $request->patient_disease;
        $patient->doctor = $request->doctor_selected;
        if($patient->save())
        {
        return redirect('/all_patient_data')->with('message', 'Patient Added Successfully');

        }

    }
    public function all_patient_data()
    {
        $patient = patient::all()->sortByDesc("id");

        return view('admin.patient.all_patient_data',compact('patient'));

    }

    public function edit_patient($id)
    {
        $patient = patient::find($id);
        $doctor = Doctor::all()->sortBy('name');


        return view('admin.patient.edit_patient',compact('patient','doctor'));
    }

    public function update_patient_data($id,Request $request)

    {
        $patient = patient::find($id);
        $patient->name = $request->patient_name;
        $patient->gender = $request->patient_gender;
        $patient->age = $request->patient_age;
        $patient->email = $request->patient_email;
        $patient->phone_number = $request->patient_phone_number;
        $patient->address = $request->patient_address;
        $patient->disease = $request->patient_disease;
        $patient->doctor = $request->doctor_selected;
        if($patient->update())
        {
            return redirect('/all_patient_data')->with('message','Patient Updated Successfully');
        }
    }

    public function delete_patient($id)
    {
        $patient = patient::find($id);
        if($patient->delete())
        {
            return redirect('/all_patient_data')->with('message','Patient Deleted Successfully');

        }

    }
}
