@extends('layouts.app')

@section('content')
<style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    input,
    label {
        display: block;
    }

    .divider {
        border-top: 2px solid #bbb;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <?php
                $userId = auth()->user()->id;
                ?>
                <h2>Edit Form Apply On{{ $Info->created_at }}</h2>
                <div class="card-body">
                    <div class="container">
                        <form method="post" action="{{route('updateForm')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="semester">Semester</label>
                                    <!-- <input id="semester" type="text" value="{{ $Info->semester }}" class="form-control" name="semester" siabl> -->
                                    <select name="semester" class="form-control">
                                        <option value="{{ $Info->semester }}" selected >{{ $Info->semester }} (Current Semester Selected)</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="session">Session</label>
                                    <input id="session" type="text" value="{{ $Info->session }}" class="form-control" name="session">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="photo">Photo</label>
                                    <input id="photo" type="file" value="" class="form-control-file" name="photo">
                                    <img src="{{ url('/images') }}/{{ $Info->photo }}" width="200px" width="200px" />
                                </div>

                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-6">
                                    <span style="font-size:18px;font-weight: 800;">
                                        Section A
                                    </span>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <br />
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" value="{{ $Info->name }}" class="form-control" name="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="staff_matric_number">Staff / Matric Number</label>
                                    <input id="staff_matric_number" type="text" value="{{ $Info->staff_matric_number }}" class="form-control" name="staff_matric_number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="m_p">MyKad / Passport</label>
                                    <input id="m_p" type="text" value="{{ $Info->m_p }}" class="form-control" name="m_p">
                                </div>
                                <div class="col-md-6">
                                    <label for="p_address">Postal Address</label>
                                    <input id="p_address" type="text" value="{{ $Info->p_address }}" class="form-control" name="p_address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fax">Fax</label>
                                    <input id="fax" type="text" value="{{ $Info->fax }}" class="form-control" name="fax">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" value="{{ $Info->email }}" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="m_status">Marital Status (please circle)</label>
                                    <input id="m_status" type="text" value="{{ $Info->m_status }}" class="form-control" name="m_status">
                                </div>
                                <div class="col-md-6">
                                    <label for="dob">Date Of Birth</label>
                                    <input id="dob" type="date" value="{{ $Info->dob }}" class="form-control" name="dob">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="tp_home">Telephone (Home)</label>
                                    <input id="tp_home" type="text" value="{{ $Info->tp_home }}" class="form-control" name="tp_home">
                                </div>
                                <div class="col-md-4">
                                    <label for="tp_office">Telephone (Office)</label>
                                    <input id="tp_office" type="text" value="{{ $Info->tp_office }}" class="form-control" name="tp_office">
                                </div>
                                <div class="col-md-4">
                                    <label for="tp_hp">Telephone (H/P)</label>
                                    <input id="tp_hp" type="text" value="{{ $Info->tp_hp }}" class="form-control" name="tp_hp">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="eg_p">English Proficiency</label>
                                    <select id="eg_p" class="form-control" name="eg_p">
                                        <option value="{{ $Info->eg_p }}" Selected>{{ $Info->eg_p }}</option>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Poor">Poor</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="gender">Gender</label>
                                    <select id="gender" class="form-control" name="gender">
                                        <option value="{{ $Info->gender }}">{{ $Info->gender }}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="kdc">Kulliyyah/Division/Centre</label>
                                    <input id="kdc" type="text" value="{{ $Info->kdc }}" class="form-control" name="kdc">
                                </div>
                                <div class="col-md-6">
                                    <label for="nationality">Nationality</label>
                                    <input id="nationality" type="text" value="{{ $Info->nationality }}" class="form-control" name="nationality">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="pp">Present Position (in IIUM or Outside. You may add attachment if necessary)</label>
                                    <input id="pp" type="text" value="{{ $Info->pp }}" class="form-control" name="pp">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="apply">I am applying for</label>
                                    <select id="apply" value="" class="form-control" name="apply">
                                        <option value="{{ $Info->apply }}" selected>{{ $Info->apply }}</option>
                                        <option disabled style="font-style:italic">Usrah Budi Packages</option>
                                        <option disabled style="font-style:italic">------------------------------</option>
                                        <option value="Usrah Facilitator">Facilitator</option>
                                        <option disabled style="font-style:italic">------------------------------</option>
                                        <option disabled style="font-style:italic">Skills Packages</option>
                                        <option disabled style="font-style:italic">------------------------------</option>
                                        <option value="Skill Trainer">Trainer</option>
                                        <option value="Skill Assitant Trainer">Assistant Trainer</option>
                                        <option disabled style="font-style:italic">------------------------------</option>
                                        <option disabled style="font-style:italic">Debate Packages</option>
                                        <option disabled style="font-style:italic">------------------------------</option>
                                        <option value="English Debate Trainer">English Debate Trainer</option>
                                        <option value="Arabic Debate Trainer">Arabic Debate Trainer</option>
                                        <option value="Presentation Skill Trainer">Presentation Skills Trainer</option>
                                        <option value="Public Speaking Trainer">Public Speaking Trainer</option>
                                        <option disabled style="font-style:italic">------------------------------</option>
                                        <option disabled style="font-style:italic">Others</option>
                                        <option disabled style="font-style:italic">------------------------------</option>
                                        <option value="Taḥfīẓ Instructor">Taḥfīẓ Instructor</option>
                                        <option value="Leadership Trainer">Leadership Trainer</option>
                                        <option value="Parenting Trainer">Parenting Trainer</option>
                                        <option value="Admin. Asst. Graduate Trainer">Admin. Asst. / Graduate Trainer</option>
                                    </select>
                                </div>
                            </div>
                            <br /> <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Educational History</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="s_i_u_a_1">School/Institution/University Attended 1</label>
                                    <input id="s_i_u_a_1" type="text" value="{{ $Info->s_i_u_a_1 }}" class="form-control" name="s_i_u_a_1">
                                </div>
                                <div class="col-md-2">
                                    <label for="y_from_1">Year From</label>
                                    <input id="y_from_1" type="text" value="{{ $Info->y_from_1 }}" class="form-control" name="y_from_1">
                                </div>
                                <div class="col-md-2">
                                    <label for="y_until_1">Year Until</label>
                                    <input id="y_until_1" type="text" value="{{ $Info->y_until_1 }}" class="form-control" name="y_until_1">
                                </div>
                                <div class="col-md-4">
                                    <label for="a_qualification_1">Academic Qualification 1</label>
                                    <input id="a_qualification_1" type="text" value="{{ $Info->a_qualification_1 }}" class="form-control" name="a_qualification_1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="s_i_u_a_2">School/Institution/University Attended 2</label>
                                    <input id="s_i_u_a_2" type="text" value="{{ $Info->s_i_u_a_2 }}" class="form-control" name="s_i_u_a_2">
                                </div>
                                <div class="col-md-2">
                                    <label for="y_from_2">Year From</label>
                                    <input id="y_from_2" type="text" value="{{ $Info->y_from_2 }}" class="form-control" name="y_from_2">
                                </div>
                                <div class="col-md-2">
                                    <label for="y_until_2">Year Until</label>
                                    <input id="y_until_2" type="text" value="{{ $Info->y_until_2 }}" class="form-control" name="y_until_2">
                                </div>
                                <div class="col-md-4">
                                    <label for="a_qualification_1">Academic Qualification 2</label>
                                    <input id="a_qualification_1" type="text" value="{{ $Info->a_qualification_1 }}" class="form-control" name="a_qualification_1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="s_i_u_a_3">School/Institution/University Attended 3</label>
                                    <input id="s_i_u_a_3" type="text" value="{{ $Info->s_i_u_a_3 }}" class="form-control" name="s_i_u_a_3">
                                </div>
                                <div class="col-md-2">
                                    <label for="y_from_3">Year From</label>
                                    <input id="y_from_3" type="text" value="{{ $Info->y_from_3 }}" class="form-control" name="y_from_3">
                                </div>
                                <div class="col-md-2">
                                    <label for="y_until_3">Year Until</label>
                                    <input id="y_until_3" type="text" value="{{ $Info->y_until_3 }}" class="form-control" name="y_until_3">
                                </div>
                                <div class="col-md-4">
                                    <label for="a_qualification_3">Academic Qualification 3</label>
                                    <input id="a_qualification_3" type="text" value="{{ $Info->a_qualification_3 }}" class="form-control" name="a_qualification_3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="s_i_u_a_4">School/Institution/University Attended 4</label>
                                    <input id="s_i_u_a_4" type="text" value="{{ $Info->s_i_u_a_4 }}" class="form-control" name="s_i_u_a_4">
                                </div>
                                <div class="col-md-2">
                                    <label for="y_from_4">Year From</label>
                                    <input id="y_from_4" type="text" value="{{ $Info->y_from_4 }}" class="form-control" name="y_from_4">
                                </div>
                                <div class="col-md-2">
                                    <label for="y_until_4">Year Until</label>
                                    <input id="y_until_4" type="text" value="{{ $Info->y_until_4 }}" class="form-control" name="y_until_4">
                                </div>
                                <div class="col-md-4">
                                    <label for="a_qualification_4">Academic Qualification 4</label>
                                    <input id="a_qualification_4" type="text" value="{{ $Info->a_qualification_4 }}" class="form-control" name="a_qualification_4">
                                </div>
                            </div>
                            <br /> <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Working Experience</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="organisation_1">Organisation 1</label>
                                    <input id="organisation_1" type="text" value="{{ $Info->organisation_1 }}" class="form-control" name="organisation_1">
                                </div>
                                <div class="col-md-4">
                                    <label for="position_1">Position</label>
                                    <input id="position_1" type="text" value="{{ $Info->position_1 }}" class="form-control" name="position_1">
                                </div>
                                <div class="col-md-4">
                                    <label for="duration_1">Duration</label>
                                    <input id="duration_1" type="text" value="{{ $Info->duration_1 }}" class="form-control" name="duration_1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="organisation_2">Organisation 2</label>
                                    <input id="organisation_2" type="text" value="{{ $Info->organisation_2 }}" class="form-control" name="organisation_2">
                                </div>
                                <div class="col-md-4">
                                    <label for="position_2">Position</label>
                                    <input id="position_2" type="text" value="{{ $Info->position_2 }}" class="form-control" name="position_2">
                                </div>
                                <div class="col-md-4">
                                    <label for="duration_2">Duration</label>
                                    <input id="duration_2" type="text" value="{{ $Info->duration_2 }}" class="form-control" name="duration_2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="organisation_3">Organisation 3</label>
                                    <input id="organisation_3" type="text" value="{{ $Info->organisation_3 }}" class="form-control" name="organisation_3">
                                </div>
                                <div class="col-md-4">
                                    <label for="position_3">Position</label>
                                    <input id="position_3" type="text" value="{{ $Info->position_3 }}" class="form-control" name="position_3">
                                </div>
                                <div class="col-md-4">
                                    <label for="duration_3">Duration</label>
                                    <input id="duration_3" type="text" value="{{ $Info->duration_3 }}" class="form-control" name="duration_3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="organisation_4">Organisation 4</label>
                                    <input id="organisation_4" type="text" value="{{ $Info->organisation_4 }}" class="form-control" name="organisation_4">
                                </div>
                                <div class="col-md-4">
                                    <label for="position_4">Position</label>
                                    <input id="position_4" type="text" value="{{ $Info->position_4 }}" class="form-control" name="position_4">
                                </div>
                                <div class="col-md-4">
                                    <label for="duration_4">Duration</label>
                                    <input id="duration_4" type="text" value="{{ $Info->duration_4 }}" class="form-control" name="duration_4">
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="rew"> Any award / outstanding achievement / projects / activities that are related to the area of your intended work?</label>
                                    <input id="rew" type="text" value="{{ $Info->rew }}" class="form-control" name="rew">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="wpp"> Please explain in few sentences, why you would like to be appointed in the work that you have applied for? </label>
                                    <input id="wpp" type="text" value="{{ $Info->wpp }}" class="form-control" name="wpp">
                                </div>
                            </div>
                            <br />
                            <div class="divider"></div>
                            <br />
                            <div align="center">
                                <input type="hidden" name="user_id" value="{{ $userId }}" />
                                <input type="hidden" name="application_id" value="{{ $Info->application_id }}" />
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a class="btn btn-primary" href="{{ route('home') }}" type="submit">back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection