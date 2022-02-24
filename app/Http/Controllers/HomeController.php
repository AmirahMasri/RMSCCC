<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['faq', 'guestPackage','guestQualification']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function staffHome()
    {
        $total_application = DB::table('application_form')->count();
        $total_approve = DB::table('application_form')->where('status', 'Approve')->count();
        return view('staffHome')->with(['total' => $total_application, 'total_approve' => $total_approve]);
    }
    public function applicationList()
    {
        $data = array(
            'list' => DB::table('application_form')->get()
        );
        return view('applicationList', $data);
    }
    public function qualification()
    {
        return view('qualification');
    }
    public function staffWelcome()
    {
        return view('staffWelcome');
    }
    public function userWelcome()
    {
        return view('userWelcome');
    }
    public function guestPackage()
    {
        return view('guestPackage');
    }
    public function usrahBudi()
    {
        return view('usrahBudi');
    }
    public function package()
    {
        return view('package');
    }
    public function faq()
    {
        return view('faq');
    }

    public function handleAdmin()
    {
        return view('handleAdmin');
    }
    public function adminWelcome()
    {
        return view('adminWelcome');
    }
    public function manageStaff()
    {
        return view('manage_staff');
    }
    public function manageApplicant()
    {
        return view('manage_applicant');
    }
    public function aForm()
    {
        $data = array(
            'list' => DB::table('application_form')->get()
        );
        return view('aForm', $data);
    }
    public function applicationForm()
    {
        return view('applicationForm');
    }
    public function FormData(Request $request)
    {
        $request->validate([
            'photo' => 'required',
        ]);

        $query = DB::table('application_form')->insert([
            'user_id' => $request->input('user_id'),
        ]);
        if ($query) {
            $last_id = DB::select('SELECT application_id FROM application_form ORDER BY application_id DESC LIMIT 1');
            $ids = json_decode(json_encode($last_id), true);
            $id = $ids[0]['application_id'];
            $fileName = time() . '.' . $request->file('photo')->extension();
            $res = $request->file('photo')->move(public_path('images'), $fileName);
            if ($res) {
                $photo = $fileName;
            }
            $query2 = DB::table('application_form_detail')->insert([
                'application_id' => $id,
                'semester' => $request->input('semester'),
                'session' => $request->input('session'),
                'name' => $request->input('name'),
                'staff_matric_number' => $request->input('staff_matric_number'),
                'm_p' => $request->input('m_p'),
                'p_address' => $request->input('p_address'),
                'fax' => $request->input('fax'),
                'email' => $request->input('email'),
                'm_status' => $request->input('m_status'),
                'dob' => $request->input('dob'),
                'tp_home' => $request->input('tp_home'),
                'tp_office' => $request->input('tp_office'),
                'tp_hp' => $request->input('tp_hp'),
                'eg_p' => $request->input('eg_p'),
                'gender' => $request->input('gender'),
                'kdc' => $request->input('kdc'),
                'pp' => $request->input('pp'),
                'nationality' => $request->input('nationality'),
                'apply' => $request->input('apply'),
                's_i_u_a_1' => $request->input('s_i_u_a_1'),
                'y_from_1' => $request->input('y_from_1'),
                'y_until_1' => $request->input('y_until_1'),
                'a_qualification_1' => $request->input('a_qualification_1'),
                's_i_u_a_2' => $request->input('s_i_u_a_2'),
                'y_from_2' => $request->input('y_from_2'),
                'y_until_2' => $request->input('y_until_2'),
                's_i_u_a_3' => $request->input('s_i_u_a_3'),
                'y_from_3' => $request->input('y_from_3'),
                'y_until_3' => $request->input('y_until_3'),
                'a_qualification_3' => $request->input('a_qualification_3'),
                's_i_u_a_4' => $request->input('s_i_u_a_4'),
                'y_from_4' => $request->input('y_from_4'),
                'y_until_4' => $request->input('y_until_4'),
                'a_qualification_4' => $request->input('a_qualification_4'),
                'organisation_1' => $request->input('organisation_1'),
                'position_1' => $request->input('position_1'),
                'duration_1' => $request->input('duration_1'),
                'organisation_2' => $request->input('organisation_2'),
                'position_2' => $request->input('position_2'),
                'duration_2' => $request->input('duration_2'),
                'organisation_3' => $request->input('organisation_3'),
                'position_3' => $request->input('position_3'),
                'duration_3' => $request->input('duration_3'),
                'organisation_4' => $request->input('organisation_4'),
                'position_4' => $request->input('position_4'),
                'duration_4' => $request->input('duration_4'),
                'rew' => $request->input('rew'),
                'wpp' => $request->input('wpp'),
                'user_id' => $request->input('user_id'),
                'photo' => $photo,
                'a_qualification_2' => $request->input('a_qualification_2'),

            ]);
            if ($query2) {
                return redirect('home')->with('success', 'Data Have Been Successfully Save');
            }
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }
    public function approveApplication($id)
    {
        $update = DB::table('application_form')
            ->where('application_id', $id)
            ->update(['status' => 'Approve']);
        return redirect('applicationList')->with('success', 'Data Have Been Successfully Updated');
    }

    public function edit($id)
    {
        $row = DB::table('application_form_detail')
            ->where('application_id', $id)
            ->first();

        $data = [
            'Info' => $row,
            'Title' => 'Edit'
        ];
        return view('editForm', $data);
    }

    public function updateForm(Request $request)
    {
        $mytime = Carbon::now();

        $query = DB::table('application_form')->where('application_id', $request->input('application_id'))->update([
            'updated_at' => $mytime->toDateTimeString(),
        ]);
        if ($query) {
            if ($request->file('photo') != "") {
                $fileName = time() . '.' . $request->file('photo')->extension();
                $res = $request->file('photo')->move(public_path('images'), $fileName);
                if ($res) {
                    $photo = $fileName;
                }
            } else {
                $ph = DB::select('SELECT photo FROM application_form_detail where application_id = ' . $request->input('application_id'));
                $ph2 = json_decode(json_encode($ph), true);
                $photo = $ph2[0]['photo'];
            }
            $query2 = DB::table('application_form_detail')->where('application_id', $request->input('application_id'))->update([
                'semester' => $request->input('semester'),
                'session' => $request->input('session'),
                'name' => $request->input('name'),
                'staff_matric_number' => $request->input('staff_matric_number'),
                'm_p' => $request->input('m_p'),
                'p_address' => $request->input('p_address'),
                'fax' => $request->input('fax'),
                'email' => $request->input('email'),
                'm_status' => $request->input('m_status'),
                'dob' => $request->input('dob'),
                'tp_home' => $request->input('tp_home'),
                'tp_office' => $request->input('tp_office'),
                'tp_hp' => $request->input('tp_hp'),
                'eg_p' => $request->input('eg_p'),
                'gender' => $request->input('gender'),
                'kdc' => $request->input('kdc'),
                'pp' => $request->input('pp'),
                'nationality' => $request->input('nationality'),
                'apply' => $request->input('apply'),
                's_i_u_a_1' => $request->input('s_i_u_a_1'),
                'y_from_1' => $request->input('y_from_1'),
                'y_until_1' => $request->input('y_until_1'),
                'a_qualification_1' => $request->input('a_qualification_1'),
                's_i_u_a_2' => $request->input('s_i_u_a_2'),
                'y_from_2' => $request->input('y_from_2'),
                'y_until_2' => $request->input('y_until_2'),
                's_i_u_a_3' => $request->input('s_i_u_a_3'),
                'y_from_3' => $request->input('y_from_3'),
                'y_until_3' => $request->input('y_until_3'),
                'a_qualification_3' => $request->input('a_qualification_3'),
                's_i_u_a_4' => $request->input('s_i_u_a_4'),
                'y_from_4' => $request->input('y_from_4'),
                'y_until_4' => $request->input('y_until_4'),
                'a_qualification_4' => $request->input('a_qualification_4'),
                'organisation_1' => $request->input('organisation_1'),
                'position_1' => $request->input('position_1'),
                'duration_1' => $request->input('duration_1'),
                'organisation_2' => $request->input('organisation_2'),
                'position_2' => $request->input('position_2'),
                'duration_2' => $request->input('duration_2'),
                'organisation_3' => $request->input('organisation_3'),
                'position_3' => $request->input('position_3'),
                'duration_3' => $request->input('duration_3'),
                'organisation_4' => $request->input('organisation_4'),
                'position_4' => $request->input('position_4'),
                'duration_4' => $request->input('duration_4'),
                'rew' => $request->input('rew'),
                'wpp' => $request->input('wpp'),
                'user_id' => $request->input('user_id'),
                'photo' => $photo,
                'a_qualification_2' => $request->input('a_qualification_2'),

            ]);
            return redirect('home')->with('success', 'Data Have Been Successfully Save');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }
    public function delete($id)
    {
        $delete = DB::table('application_form')->where('application_id', $id)->delete();
        if ($delete) {
            $delete2 = DB::table('application_form_detail')->where('application_id', $id)->delete();
            if ($delete2) {
                return redirect('home')->with('success', 'Data Have Been Successfully Deleted');
            }
        }
    }
    public function adminDeleteUser($id)
    {
        $delete = DB::table('users')->where('id', $id)->delete();
        if ($delete) {
            $delete2 = DB::table('application_form')->where('user_id', $id)->delete();
            return redirect('admin/home')->with('success', 'Data Have Been Successfully Deleted');
        }
    }
    public function staffDeleteApplication($id)
    {
        $delete = DB::table('application_form')->where('application_id', $id)->delete();
        if ($delete) {
            DB::table('application_form_detail')->where('application_id', $id)->delete();
            return redirect('staffhome')->with('success', 'Data Have Been Successfully Deleted');
        }
    }
    public function renewal($id)
    {
        $query = DB::table('application_form')->where('application_id', $id)->update([
            'type' => '2',
            'status' => 'Pending',
        ]);
        if ($query) {
            return redirect('home')->with('success', 'Data Have Been Successfully Update');
        }
    }
    public function profile($id)
    {
        $profileData = DB::table('users')
            ->where('id', $id)
            ->first();
        $profile = [
            'data' => $profileData,
            // 'Title' => 'Profile'
        ];
        return view('profile', $profile);
    }
    public function staffdetails($id)
    {
        $row = DB::table('users')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row,
            'Title' => 'Edit'
        ];
        return view('staffdetails', $data);
    }
    public function applicantdetails($id)
    {
        $row = DB::table('users')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row,
            'Title' => 'Edit'
        ];
        return view('applicantdetails', $data);
    }
    public function addStaff()
    {

        return view('add_staff');
    }
    protected function SubmitAddStaff(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $query = DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'password' => Hash::make($request->input('password')),
            'is_admin' => '2',
        ]);
        if ($query) {
            $last_id = DB::select('SELECT id FROM users ORDER BY id DESC LIMIT 1');
            $ids = json_decode(json_encode($last_id), true);
            $id = $ids[0]['id'];
            $row = DB::table('users')
                ->where('id', $id)
                ->first();
            $data = [
                'Info' => $row,
                'Title' => 'Edit'
            ];
            return redirect('admin/manage_staff')->with('success', 'Data Have Been Successfully Save');
        }
    }
    protected function updateFormStatus(Request $request)
    {
        // echo $request->input('application_id');
        // echo $request->input('status');
        $mytime = Carbon::now();
        $query = DB::table('application_form')->where('application_id', $request->input('application_id'))->update([
            'updated_at' => $mytime->toDateTimeString(),
            'status' => $request->input('status'),
        ]);
        if ($query) {
            return redirect('staffhome')->with('success', 'Data Have Been Successfully Save');
        }
    }
    protected function updateInterviewDate(Request $request)
    {
        // echo $request->input('application_id');
        // echo $request->input('status');
        $mytime = Carbon::now();
        $query = DB::table('application_form')->where('application_id', $request->input('application_id'))->update([
            'updated_at' => $mytime->toDateTimeString(),
            'interview_date' => $request->input('interview_date'),
        ]);
        if ($query) {
            return redirect('staffhome')->with('success', 'Data Have Been Successfully Save');
        }
    }


    public function new_application()
    {
        return view('new_application');
    }
    public function renew_application()
    {
        return view('renew_contract');
    }
    public function trainer()
    {
        return view('trainer');
    }
    public function facilitator()
    {
        return view('facilitator');
    }
    public function instructor()
    {
        return view('instructor');
    }
    public function lecturer()
    {
        return view('lecturer');
    }
    public function anoucement()
    {
        return view('anoucement');
    }
    public function guestQualification(){
        return view('guestQualification');
    }
    protected function profileUpdate(Request $request)
    {
        $mytime = Carbon::now();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['min:8', 'nullable'],
        ]);
        if (empty($request->input('password'))) {
            $query = DB::table('users')->where('id', $request->input('user_id'))->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'contact' => $request->input('contact'),
                'updated_at' => $mytime->toDateTimeString(),
            ]);
        } else {

            $query = DB::table('users')->where('id', $request->input('user_id'))->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'contact' => $request->input('contact'),
                'password' => Hash::make($request->input('password')),
                'updated_at' => $mytime->toDateTimeString(),
            ]);
        }
        $id = $request->input('user_id');
        if ($query) {
            return redirect('profile/' . $id)->with('success', 'Data Have Been Successfully Save');
        } else {
            echo "error";
        }
    }
    protected function annoucementUpdate(Request $request)
    {
        $mytime = Carbon::now();
        $query = DB::table('anoucement')->where('id', '1')->update([
            'anoucement' => $request->input('anoucement'),
            'updated_at' => $mytime->toDateTimeString(),
        ]);
        if ($query) {
            return redirect('anoucement')->with('success', 'Data Have Been Successfully Save');
        }
    }

    public function viewApplication($id)
    {
        $row = DB::table('application_form_detail')
            ->where('application_id', $id)
            ->first();

        $data = [
            'Info' => $row,
            'Title' => 'Edit'
        ];
        return view('viewApplication', $data);
    }
    public function adminViewProfile($id)
    {
        $profileData = DB::table('users')
            ->where('id', $id)
            ->first();
        $profile = [
            'data' => $profileData,
            // 'Title' => 'Profile'
        ];
        return view('adminViewProfile', $profile);
    }
}
