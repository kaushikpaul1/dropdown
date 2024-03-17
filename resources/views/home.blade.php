<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <title>caste</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- <script src="../public/app.js"></script> --}}
    <script src="{{ asset('app.js') }}"></script>
    <style>
        /* Add this CSS code to your stylesheet or in a <style> tag in your HTML file */

        .card {
            transition: box-shadow 0.3s ease-in-out;
            /* Add a smooth transition effect */
        }

        .card:hover,
        .card.clicked {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            /* Add your desired shadow effect */
        }

        */
    </style>


</head>


<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 mt-2  ">

                <div id="stepper1" class="bs-stepper ">
                    <div class="bs-stepper-header d-flex justify-content-between ">
                        <div class="container-fluid">
                            <div class="row ">
                                <div class="col-md-4 col-sm-12 ">
                                    <div class="step" data-target="#test-l-1">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Personal information</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 ">
                                    <!-- <div class="line d-md-none"></div> -->
                                    <div class="step" data-target="#test-l-2">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">&nbsp;&nbsp;Address &nbsp;&nbsp;</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 ">
                                    <!-- <div class="line d-md-none"></div> -->
                                    <div class="step" data-target="#test-l-3">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Upload Documents</span>
                                        </button>
                                    </div>
                                </div>
                                {{-- <div class="col-md-3 col-sm-12 ">

                                    <!-- <div class="line"></div> -->
                                    <div class="step" data-target="#test-l-4">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">4</span>
                                            <span class="bs-stepper-label">Referee Details</span>
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('form.submit') }}" id="form" method="post">
                        @csrf
                        <div class="bs-stepper-content mt-0 ">
                            <div id="test-l-1" class="content">
                                <div class="card  bg-light"onclick="highlightDiv(this)">
                                    <div class="row  mb-1 p-3">
                                        <div class="col-lg-2 col-md-12 mb-0 mt-4" style="width: 180px">
                                            <strong>1. Application to:</strong>
                                            <!-- <input type="hidden" name="ipval" id="ipval" value="" /> -->
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-0">
                                            <label> <strong>State :</strong><span class="text-danger"> *</span></label>
                                            <!-- <div id="statename"><span>WEST BENGAL</span></div> -->
                                            <select name="state" id="state" class="form-control  select2"
                                                tabindex="-1" aria-hidden="true">
                                                <option value=""> - SELECT STATE - </option>
                                                @if (!empty($state))
                                                    @foreach ($state as $state)
                                                        <option value="{{ $state->sid }}">{{ $state->sname }}</option>
                                                    @endforeach

                                                @endif

                                            </select>
                                            <!-- <input name="state" id="state" type="hidden" value="WB"> -->
                                        </div>

                                        <div class="col-lg-2 col-md-12 mb-0 form-group">
                                            <label> <strong>District</strong><span class="text-danger"> *</span></label>
                                            <select name="distt" id="dist" class="form-control  select2"
                                                tabindex="-1" aria-hidden="true" disabled>
                                                <option value=""> - SELECT FROM THE LIST - </option>

                                            </select>
                                            <span class="text-danger"></span>
                                        </div>

                                        <div class="col-lg-2 col-md-12 mb-0">
                                            <label><strong>Sub-Division</strong> <span class="text-danger">
                                                    *</span></label>
                                            <select name="subdiv" id="subdiv"
                                                class="form-control select2"onchange=" enableRadio();"
                                                tabindex="-1"disabled>
                                                <option value="">- SELECT FROM THE LIST -</option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>


                                        <div class="col-lg-2 col-md-12 mb-0 form-group clearfix">
                                            <div class="icheck-primary d-inline mr-2">
                                                <input class="form-check-input" type="radio" name="bm"
                                                    id="municipality" value="M" onclick="handleRadio(this);"
                                                    disabled checked>
                                                <label class="bmmmargin"
                                                    for="municipality"><strong>Municipality</strong></label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input class="form-check-input" type="radio" name="bm"
                                                    id="block" value="B" onclick="handleRadio(this);"
                                                    disabled>
                                                <label class="bmmmargin" for="block">
                                                    <strong>Block</strong></label>
                                            </div>

                                            <select name="bmcode" id="bmcode"
                                                class="form-control select2 col-md-8" tabindex="-1"
                                                disabled="disabled" style="width: 220px">
                                                <option value="">- SELECT FROM THE LIST -</option>
                                            </select>


                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-0 ">

                                            <label> <strong>GP/ward</strong><span class="text-danger">
                                                    *</span></label>

                                            <select name="gpward" id="gpward" class="form-control select2"
                                                tabindex="-1">
                                                <option value="">- SELECT FROM THE LIST -</option>
                                            </select>

                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                </div>


                                <!-- Application For-->
                                <div class="card bg-light mt-2" onclick="highlightDiv(this)">
                                    <div class="row  mb-1 p-3 align-items-center">
                                        <div class="col-lg-2 col-md-12 ">
                                            <label> <strong>2. Application For:</strong></label>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-0 ">
                                            <div class="icheck-primary d-inline mr-1">
                                                <input class="form-check-input" type="radio" name="caste"
                                                    id="castesc" value="SC" checked>
                                                <label class="form-check-label" for="castesc">SC</label>
                                            </div>
                                            <div class="icheck-primary d-inline mr-1">
                                                <input class="form-check-input" type="radio" name="caste"
                                                    id="castest" value="ST">
                                                <label class="form-check-label" for="castest">ST</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input class="form-check-input" type="radio" name="caste"
                                                    id="casteobc" value="OBC">
                                                <label class="form-check-label" for="casteobc">OBC</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 ">
                                            <div class="subcastedropdown" style="display:none;">
                                                <select name="obcType" id="obcType" class="form-control select2">
                                                    <option value=""> -- SELECT FROM THE LIST -- </option>
                                                    <option value="OBC">OBC</option>
                                                    <option value="OBC-A">OBC-A</option>
                                                    <option value="OBC-B">OBC-B</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 ">
                                            <strong>Caste/Tribe/Community:<span class="text-danger"> *</span></strong>
                                        </div>
                                        <div class="col-lg-2 col-md-12 ">
                                            <select name="subcaste" id="subcaste" class="form-control select2"
                                                tabindex="-1" aria-hidden="true">
                                                <option value="">-- Select Caste --</option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--Personal Details-->
                                <div class="card bg-light mt-2" onclick="highlightDiv(this)">
                                    <div class="row  mb-1 p-3">
                                        <div class="col-lg-2 col-md-12 ">
                                            <label> <strong>3. Name:</strong> <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" class="form-control txtuppercase " name="applname"
                                                id="applname" maxlength="35" placeholder="Enter name">
                                            <span class="text-danger"></span>
                                        </div>

                                        <div class="col-lg-2 col-md-12">
                                            <label> <strong>4. Father's Name:</strong> <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" class="form-control txtuppercase" name="fathername"
                                                id="fathername" placeholder="Enter father's name"
                                                pattern="[a-zA-Z ]*$" maxlength="35">
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <label> <strong>5. Mother's Name:</strong> <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" class="form-control txtuppercase" name="mothername"
                                                id="mothername" placeholder="Enter mother's name"
                                                pattern="[a-zA-Z ]*$" maxlength="35">
                                            <span class="text-danger"></span>
                                        </div>

                                        <div class="col-lg-2 col-md-12">
                                            <label> <strong>6. Mobile:</strong></label>
                                            <input type="text" class="form-control" name="phno" id="phno"
                                                placeholder="Enter Mobile Number" pattern="[0-9]+" minlength="9"
                                                maxlength="10">

                                        </div>

                                        <div class="col-lg-2 col-md-12">
                                            <label> <strong>7. Email</strong>: </label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="Enter Valid Email " maxlength="45">
                                        </div>

                                    </div>
                                </div>
                                {{-- <!--Documents Required-->
                                <div class="card bg-light mt-2" onclick="highlightDiv(this)">
                                    <div class="row  mb-1 p-3 align-items-center">
                                        <div class="col-md-12 mb-2">
                                            <label> <strong>7. Documents Required(Atleast One)</strong> <span
                                                    class="text-danger">
                                                    *</span></label>
                                        </div>

                                        <div class="col-lg-3 col-md-12">
                                            <label> <strong>A. Epic No.:</strong></label>
                                            <input type="text" class="form-control document-required txtuppercase"
                                                name="epic" id="epic" maxlength="16"
                                                title="Epic number should as per Voter Id Card">
                                            <span class="text-danger"></span>
                                        </div>

                                        <div class="col-lg-3 col-md-12">
                                            <label> <strong>B. Aadhaar No.:</strong></label>
                                            <input type="text" class="form-control document-required txtuppercase"
                                                name="adhar" id="adhar" maxlength="12"
                                                title="Adher number should be 12 digit number only">

                                            <input type="hidden" id="udin_verify" name="udin_verify"
                                                class="form-control">

                                            <span class="text-danger"></span>
                                        </div>

                                        <div class="col-lg-3 col-md-12">
                                            <label> <strong>C.(I) Select Category:</strong> </label>
                                            <select name="kscategory" id="kscategory"
                                                class="form-control txtuppercase select2">
                                                <option value="">Select Category</option>
                                                <option value="AAY">AAY</option>
                                                <option value="PHH">PHH</option>
                                                <option value="SPHH">SPHH</option>
                                                <option value="RKSY-I">RKSY-I</option>
                                                <option value="RKSY-II">RKSY-II</option>
                                                <option value="GEN">GEN</option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>

                                        <div class="col-lg-3 col-md-12">
                                            <label><strong>C.(II) Khadyasathi No.:</strong> </label>
                                            <input type="text" class="form-control document-required txtuppercase"
                                                name="ks" id="ks" maxlength="17">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- Date Of Birth Details -->
                                {{-- <div class="card bg-light mt-2" onclick="highlightDiv(this)">
                                    <div class="row mb-1 p-3">
                                        <div class="col-lg-2 col-md-12">
                                            <label> <strong>8.(A) Date of Birth</strong><span class="text-danger">
                                                    *</span></label>
                                            <input type="text" class="form-control" id="dob" name="dob"
                                                readonly="readonly" placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <label><strong>(B) Place of Birth</strong> <span class="text-danger">
                                                    *</span></label>
                                            <select name="stateB" id="stateB" class="form-control select2"
                                                tabindex="-1" aria-hidden="true">
                                                <option value="">-- SELECT STATE FROM THE LIST--</option>

                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <label><strong>District</strong> <span class="text-danger">
                                                    *</span></label>
                                            <div class="otherstate">
                                                <select name="distB" id="distB" class="form-control select2"
                                                    tabindex="-1" aria-hidden="true">
                                                    <option value="">- SELECT DISTRICT FROM THE LIST-</option>

                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                            <input type="text" class="form-control" name="distBText"
                                                id="distBText" style="text-transform:uppercase; display:none"
                                                value="-:District:-">
                                        </div>
                                        <div class="col-lg-2 col-md-12">

                                            <label><strong>Police Station</strong> <span class="text-danger">
                                                    *</span></label>
                                            <div class="otherstate">
                                                <select name="psB" id="psB" class="form-control select2"
                                                    tabindex="-1" aria-hidden="true">
                                                    <option value="">- SELECT POLICE STATION FROM THE LIST-
                                                    </option>
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>

                                            <input type="text" class="form-control" name="psBText" id="psBText"
                                                style="text-transform:uppercase; display:none"
                                                value="-:Police Station:-">

                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <label><strong>Village/Town</strong> <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" class="form-control txtuppercase" name="villB"
                                                maxlength="49" id="villB" placeholder="Enter Vill/Town Name *">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div> --}}





                                {{-- <button class="btn btn-primary " onclick="stepper1.next()">Next</button> --}}
                                <button class="btn btn-primary float-end mt-3" onclick="validateAndNext()"
                                    type="button">Next<svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-arrow-right"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                    </svg></button></button>

                            </div>
                            <div id="test-l-2" class="content ">
                                {{-- <p class="text-center">test 2</p> --}}
                                <!-- Address -->

                                <div class="row bg-light mb-1 p-3 rounded ">
                                    <div class="col-12 container-fluid">
                                        <label> <strong>8. Address:</strong></label>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 mb-md-3 mb-2 custom-no-border">
                                        <div class="card bg-light" onclick="highlightDiv(this)">
                                            <div class="p-3">
                                                <div class="row mb-2">
                                                    <div class="col-md-12">
                                                        <label> <strong>a) Present Address for Last 6
                                                                Months:</strong></label>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 col-md-12 ">
                                                        C/O (Name):
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control" name="coP"
                                                            id="coP" style="text-transform:uppercase"
                                                            placeholder="Enter C/O Name" pattern="[a-zA-Z ]*$"
                                                            maxlength="35">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 col-md-12">
                                                        State: <span class="text-danger"> *
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control txtuppercase"
                                                            name="statenameP" id="statenameP" value="WEST BENGAL"
                                                            readonly=""disabled>
                                                        <input name="stateP" id="stateP" type="hidden"
                                                            value="WB">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>


                                                <div class="row mb-2">
                                                    <div class="col-lg-5 col-md-12">
                                                        District: <span class="text-danger"> *
                                                        </span>
                                                    </div>
                                                    <div class="col-md-12 col-xs-8 col-lg-7 ">

                                                        <input type="text" id="distP" class="form-control"
                                                            placeholder=" - SELECT FROM THE LIST -" disabled>


                                                        <span class="text-danger"></span>
                                                    </div>

                                                </div>


                                                <div class="row mb-2">
                                                    <div class="col-md-12 col-xs-12 col-lg-5">
                                                        Police Station: <span class="text-danger"> *
                                                        </span>
                                                    </div>
                                                    <div class="col-md-12 col-xs-12 col-lg-7 ">
                                                        <select name="psP" id="psP"
                                                            class="form-control select2">
                                                            <option value="">- SELECT FROM THE LIST-</option>
                                                        </select>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 col-md-12">
                                                        Ward/GP: <span class="text-danger"> *
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control txtuppercase"
                                                            name="gpP" id="gpP"
                                                            placeholder="Enter Ward/GP Name" maxlength="35">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 col-md-12">
                                                        Vill/Para/House No./Road: <span class="text-danger"> *
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control txtuppercase"
                                                            id="paraP" name="paraP"
                                                            placeholder="Enter Vill/Para/House No./Road Name"
                                                            maxlength="35">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 col-md-12">
                                                        Post Office: <span class="text-danger"> *</span>
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control txtuppercase"
                                                            id="poP" name="poP"
                                                            placeholder="Enter Post Office Name" maxlength="35">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 col-md-12">
                                                        Pin Code:
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control" id="pinP"
                                                            name="pinP" placeholder="Enter Pin Code"
                                                            maxlength="6" pattern="[0-9]+">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 permanent_address">
                                        <div class="card bg-light" onclick="highlightDiv(this)">
                                            <div class="p-3">
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 col-md-12">
                                                        <label> <strong>b) Permanent Address:</strong></label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <i>Same as Present?</i>
                                                    </div>
                                                    <div class="col-lg-3 col-md-12">
                                                        <div class="icheck-primary d-inline mr-2">
                                                            <input class="" type="radio" name="prs_prm"
                                                                id="sameyes" value="Y">
                                                            <label class="" for="sameyes">Yes</label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input class="" type="radio" name="prs_prm"
                                                                id="sameno" value="N" checked="">
                                                            <label class="" for="sameno">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2 per_add">
                                                    <div class="col-lg-5 col-md-12">
                                                        C/O (Name):
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control txtuppercase"
                                                            id="coO" name="coO"
                                                            placeholder="Enter C/O Name" pattern="[a-zA-Z ]*$"
                                                            maxlength="35">
                                                    </div>
                                                </div>
                                                <div class="row mb-2 per_add">
                                                    <div class="col-lg-5 col-md-12">
                                                        State: <span class="text-danger"> *
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control txtuppercase"
                                                            name="statenameO" id="statenameO" value="West Bengal"
                                                            readonly="">
                                                        <input name="stateO" id="stateO" type="hidden"
                                                            value="WB">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2 per_add">
                                                    <div class="col-lg-5 col-md-12">
                                                        District: <span class="text-danger"> *
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <select name="distO" id="distO"
                                                            class="form-control select2" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="">- SELECT FROM THE LIST -</option>
                                                            <option value="20"> Alipurduar </option>
                                                            <option value="13"> Bankura </option>
                                                            <option value="08"> Birbhum </option>
                                                            <option value="03"> Cooch Behar </option>
                                                            <option value="05"> Dakshin Dinajpur </option>
                                                            <option value="01"> Darjeeling </option>
                                                            <option value="12"> Hooghly </option>
                                                            <option value="16"> Howrah </option>
                                                            <option value="02"> Jalpaiguri </option>
                                                            <option value="24"> Jhargram </option>
                                                            <option value="21"> Kalimpong </option>
                                                            <option value="17"> Kolkata </option>
                                                            <option value="06"> Maldah </option>
                                                            <option value="07"> Murshidabad </option>
                                                            <option value="10"> Nadia </option>
                                                            <option value="11"> North 24 Parganas </option>
                                                            <option value="22"> Paschim Bardhaman </option>
                                                            <option value="15"> Paschim Medinipur </option>
                                                            <option value="23"> Purba Bardhaman </option>
                                                            <option value="19"> Purba Medinipur </option>
                                                            <option value="14"> Purulia </option>
                                                            <option value="18"> South 24 Parganas </option>
                                                            <option value="04"> Uttar Dinajpur </option>
                                                        </select>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2 per_add">
                                                    <div class="col-lg-5 col-md-12">
                                                        Police Station: <span class="text-danger"> *
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <select name="psO" id="psO"
                                                            class="form-control select2" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="">- SELECT FROM THE LIST -</option>
                                                        </select>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2 per_add">
                                                    <div class="col-lg-5 col-md-12">
                                                        Ward/GP: <span class="text-danger"> *
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control txtuppercase"
                                                            id="gpO" name="gpO" maxlength="35"
                                                            placeholder="Enter Ward/GP Name">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2 per_add">
                                                    <div class="col-lg-5 col-md-12">
                                                        Vill/Para/House No./Road: <span class="text-danger"> *
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control txtuppercase"
                                                            id="paraO" name="paraO" maxlength="35"
                                                            placeholder="Enter Vill/Para/House No./Road Name">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2 per_add">
                                                    <div class="col-lg-5 col-md-12">
                                                        Post Office:
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control txtuppercase"
                                                            id="poO" name="poO" maxlength="35"
                                                            placeholder="Enter Post Office Name">
                                                    </div>
                                                </div>
                                                <div class="row mb-2 per_add">
                                                    <div class="col-lg-5 col-md-12">
                                                        Pin Code:
                                                    </div>
                                                    <div class="col-lg-7 col-md-12">
                                                        <input type="text" class="form-control" id="pinO"
                                                            name="pinO" maxlength="6"
                                                            placeholder="Enter Pin Code" pattern="[0-9]+">
                                                    </div>
                                                </div>
                                                {{-- <div class="row mb-2">
                                                    <div class="col-lg-5 col-md-12">

                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <i>Any more?</i>
                                                    </div>
                                                    <div class="col-lg-3 col-md-12">
                                                        <div class="icheck-primary d-inline mr-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="moreA" id="moreAyes" value="Y">
                                                            <label class="" for="moreAyes">Yes</label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="moreA" id="moreAno" value="N"
                                                                checked="">
                                                            <label class="" for="moreAno">No</label>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row bg-light mb-2 " id="OthAdd" style="display:none">
                                        <div class="col-lg-3 col-md-12 mb-2">
                                            <label>C/O (Name):<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control txtuppercase" name="coA"
                                                id="coA" maxlength="35" placeholder="Enter C/O Name *"
                                                disabled>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-3 col-md-12 mb-2">
                                            <label>Para/House/Village.:<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control txtuppercase" name="paraA"
                                                id="paraA" maxlength="35" placeholder="Enter Vill/Para *"
                                                disabled>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-3 col-md-12 mb-2">
                                            <label>Ward No./G.P.:<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control txtuppercase" name="gpA"
                                                id="gpA" maxlength="35" placeholder="Enter Ward/GP *" disabled>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-3 col-md-12 mb-2">
                                            <label>Post Office:<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control txtuppercase" name="poA"
                                                id="poA" maxlength="35" placeholder="Enter Post Office *"
                                                disabled>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-3 col-md-12 mb-2">
                                            <label>Police Station:<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control txtuppercase" name="psA"
                                                id="psA" maxlength="35" placeholder="Enter PS *" disabled>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-3 col-md-12 mb-2">
                                            <label>District:<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control txtuppercase" name="distA"
                                                id="distA" maxlength="35" placeholder="Enter District *"
                                                disabled>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-3 col-md-12 mb-2">
                                            <label>State:<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control txtuppercase" name="stateA"
                                                id="stateA" maxlength="35" placeholder="Enter State *" disabled>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-3 col-md-12 mb-2">
                                            <label>Pin:<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="pinA" id="pinA"
                                                placeholder="Enter Pin *" pattern="[0-9]+" disabled>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div> --}}
                                </div>
                                <!--Nationality-->
                                {{-- <div class="row bg-light mb-1 p-3 align-items-center">
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        <label>10. Nationality :<span class="text-danger"> *</span></label>
                                        <span>INDIAN</span>
                                        <input name="nation" id="nation" type="hidden" readonly=""
                                            value="INDIAN">
                                    </div>
                                    <div class="col-lg-1 col-md-12 pr-0">
                                        <label>11. Religion:<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
                                        <select name="relg" id="relg" class="form-control select2"
                                            tabindex="-1" aria-hidden="true">
                                            <option value="">- SELECT FROM THE LIST -</option>
                                            <option value="R01"> Hinduism </option>
                                            <option value="R02"> Jainism </option>
                                            <option value="R03"> Christianity </option>
                                            <option value="R04"> Jew </option>
                                            <option value="R05"> Islam </option>
                                            <option value="R06"> Buddism </option>
                                            <option value="R07"> Meiteism </option>
                                            <option value="R08"> Parsi </option>
                                            <option value="R09"> Sikhism </option>
                                            <option value="R10"> Zoroastrian </option>
                                            <option value="R11"> No religion </option>
                                            <option value="R12"> --Other religion-- </option>
                                        </select>
                                        <span class="text-danger"></span>

                                        <input name="relgName" class="form-control txtuppercase" type="text"
                                            id="relgName" style="display:none" maxlength="35"
                                            placeholder="Enter Religion">
                                    </div>

                                    <div class="col-lg-1 col-md-12 pr-0">
                                        <label>12. Gender:<span class="text-danger"> *</span></label>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
                                        <select name="sex" id="sex" class="form-control select2"
                                            tabindex="-1" aria-hidden="true">
                                            <option value="X">- SELECT FROM THE LIST -</option>
                                            <option value="M">MALE</option>
                                            <option value="F">FEMALE</option>
                                            <option value="T">TRANSGENDER</option>
                                            <option value="O">OTHERS</option>
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div> --}}












                                <button class="btn btn-primary" onclick="stepper1.previous()" type="button"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                                    </svg>Previous
                                </button>
                                {{-- <button class="btn btn-primary float-end mt-2" onclick="stepper1.next()">Next</button> --}}

                                <button class="btn btn-primary float-end mt-2" onclick="stepper1.next()"
                                    type="button">Next<svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-arrow-right"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                    </svg></button></button>

                            </div>
                        </div>
                        <div id="test-l-3" class="content">
                            {{-- <p class="text-center">test 3</p> --}}


                            <!--Documents Required-->
                            <div class="container-fluid mb-1 p-3">
                                <div class="card bg-light container-fluid " onclick="highlightDiv(this)">
                                    <div class="row   p-3 align-items-center">

                                        <div class="col-md-12 mb-2">
                                            <label> <strong>5. Documents Required(Atleast One)</strong> <span
                                                    class="text-danger">
                                                    *</span></label>
                                        </div>


                                        <div class="row mt-2" style="margin-left: 20px">
                                            <div class="col-lg-2 col-md-12 mb-0 mt-1 " style="width: 180px">
                                                <strong>A. Epic No.:</strong>

                                            </div>
                                            <div class="col-lg-3 col-md-12 ">
                                                <input type="text"
                                                    class="form-control document-required txtuppercase" name="epic"
                                                    id="epic" maxlength="16"
                                                    title="Epic number should as per Voter Id Card">
                                                <span class="text-danger"></span>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <input type="file"
                                                    class="form-control document-required txtuppercase"
                                                    name="epicfile" id="epicfile">

                                            </div>
                                        </div>
                                        <div class="row mt-4"style="margin-left: 20px">
                                            <div class="col-lg-2 col-md-12 mb-0  mt-1" style="width: 180px">
                                                <strong>B. Aadhar No.:</strong>

                                            </div>
                                            <div class="col-lg-3 col-md-12">
                                                <input type="integer"
                                                    class="form-control document-required txtuppercase" name="aadhar"
                                                    id="aadhar" maxlength="12"
                                                    title="Epic number should as per Voter Id Card">
                                                <span class="text-danger"></span>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <input type="file"
                                                    class="form-control document-required txtuppercase"
                                                    name="aadharfile" id="aadharfile">

                                            </div>
                                        </div>


                                        {{-- <div class="col-lg-3 col-md-12">
                                        <label> <strong>B. Aadhaar No.:</strong></label>
                                        <input type="text" class="form-control document-required txtuppercase"
                                            name="adhar" id="adhar" maxlength="12"
                                            title="Adher number should be 12 digit number only">

                                        <input type="hidden" id="udin_verify" name="udin_verify"
                                            class="form-control">

                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="col-lg-3 col-md-12">
                                        <label> <strong>C.(I) Select Category:</strong> </label>
                                        <select name="kscategory" id="kscategory"
                                            class="form-control txtuppercase select2">
                                            <option value="">Select Category</option>
                                            <option value="AAY">AAY</option>
                                            <option value="PHH">PHH</option>
                                            <option value="SPHH">SPHH</option>
                                            <option value="RKSY-I">RKSY-I</option>
                                            <option value="RKSY-II">RKSY-II</option>
                                            <option value="GEN">GEN</option>
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="col-lg-3 col-md-12">
                                        <label><strong>C.(II) Khadyasathi No.:</strong> </label>
                                        <input type="text" class="form-control document-required txtuppercase"
                                            name="ks" id="ks" maxlength="17">
                                        <span class="text-danger"></span>
                                    </div> --}}
                                    </div>
                                </div>


                                {{-- !--Relation and Reference-->
                            <div class="row bg-light mb-1 p-3 blood_ref">
                                <div class="col-lg-6 col-md-12 border brelationsec p-3">
                                    <div class="row mb-2">
                                        <div class="col-lg-5 col-md-12">
                                            <label>13. Blood relation details:</label>
                                        </div>
                                        <div class="col-lg-3 col-md-12">
                                            <div class="icheck-primary d-inline mr-2">
                                                <input class="" type="radio" name="brdetails" id="bryes"
                                                    value="Y" checked="">
                                                <label class="" for="bryes">Yes</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input class="" type="radio" name="brdetails" id="brno"
                                                    value="N">
                                                <label class="" for="brno">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 bol_ref_detail">
                                        <div class="col-lg-5 col-md-12">
                                            a) Certificate holder's name: <span class="text-danger"> *
                                            </span>
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <input type="text" class="form-control txtuppercase" id="brcName"
                                                name="brcName" placeholder="Enter C/O Name" pattern="[a-zA-Z ]*$"
                                                maxlength="45">
                                        </div>
                                    </div>
                                    <div class="row mb-2 bol_ref_detail">
                                        <div class="col-lg-5 col-md-12">
                                            b) Certificate No: <span class="text-danger"> *
                                            </span>
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <input type="text" class="form-control txtuppercase" id="brcNo"
                                                name="brcNo" placeholder="Enter Certificate Number" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="row mb-2 bol_ref_detail">
                                        <div class="col-lg-5 col-md-12">
                                            c) Date of issue: <span class="text-danger"> *
                                            </span>
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <input type="text" class="form-control hasDatepicker" id="dateofissue"
                                                name="dateofissue" readonly="readonly" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                    <div class="row mb-2 bol_ref_detail">
                                        <div class="col-lg-5 col-md-12">
                                            d) Relation with applicant: <span class="text-danger"> *
                                            </span>
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <select id="brcRel" name="brcRel" class="form-control select2"
                                                tabindex="-1" aria-hidden="true">
                                                <option value="">- SELECT FROM THE LIST -</option>
                                                <option value="REL001"> FATHER </option>
                                                <option value="REL005"> NEPHEW </option>
                                                <option value="REL006"> NIECE </option>
                                                <option value="REL004"> PATERNAL UNCLE </option>
                                                <option value="REL002"> REAL BROTHER </option>
                                                <option value="REL003"> REAL SISTER </option>
                                                <option value="XXXXXX">Others(--Please Specify--)</option>
                                            </select>

                                        </div>
                                        <div class="col-lg-5 col-md-12">
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <input type="text" class="form-control txtuppercase" id="brcRelName"
                                                name="brcRelName" style="display:none;" maxlength="35">
                                        </div>
                                    </div>
                                    <div class="row mb-2 bol_ref_detail">
                                        <div class="col-lg-5 col-md-12">
                                            e) Issuing authority: <span class="text-danger"> *
                                            </span>
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <select name="brcAuth" id="brcAuth" class="form-control select2"
                                                tabindex="-1" aria-hidden="true">
                                                <option value="">- SELECT FROM THE LIST -</option>
                                                <option value="WB1701"> ADM, SOUTH 24 PARGANAS </option>
                                                <option value="WB2001"> Alipurduar </option>
                                                <option value="WB1201"> Arambag </option>
                                                <option value="WB0901"> Asansol </option>
                                                <option value="WB2201"> Asansol Sadar </option>
                                                <option value="WB0501"> Balurghat(Sadar) </option>
                                                <option value="WB1301"> Bankura </option>
                                                <option value="WB1101"> Barasat </option>
                                                <option value="WB2303"> Bardhaman Sadar North </option>
                                                <option value="WB0905"> Bardhaman Sadar(North) </option>
                                                <option value="WB2304"> Bardhaman Sadar South </option>
                                                <option value="WB0906"> Bardhaman Sadar(South) </option>
                                                <option value="WB1102"> Barrackpur </option>
                                                <option value="WB1801"> Baruipur </option>
                                                <option value="WB1103"> Basirhat </option>
                                                <option value="WB1105"> Bidhannagar </option>
                                                <option value="WB0803"> Birbhum(Sadar) </option>
                                                <option value="WB1302"> Bishnupur </option>
                                                <option value="WB0801"> Bolpur </option>
                                                <option value="WB1104"> Bongaon </option>
                                                <option value="WB1802"> Canning </option>
                                                <option value="WB0601"> Chanchal </option>
                                                <option value="WB1202"> Chandannagar </option>
                                                <option value="WB1901"> Contai </option>
                                                <option value="WB0301"> Coochbihar(Sadar) </option>
                                                <option value="WB0101"> Darjeeling(Sadar) </option>
                                                <option value="WB1803"> Diamond Harbour </option>
                                                <option value="WB0302"> Dinhata </option>
                                                <option value="WB0701"> Domkal </option>
                                                <option value="WB2202"> Durgapur </option>
                                                <option value="WB0902"> Durgapur </option>
                                                <option value="WB1902"> Egra </option>
                                                <option value="WB0502"> Gangarampur </option>
                                                <option value="WB1504"> Ghatal </option>
                                                <option value="WB1903"> Haldia </option>
                                                <option value="WB1203"> Hooghly(Sadar) </option>
                                                <option value="WB1601"> Howrah(Sadar) </option>
                                                <option value="WB0401"> Islampur </option>
                                                <option value="WB0202"> Jalpaiguri(Sadar) </option>
                                                <option value="WB0702"> Jangipur </option>
                                                <option value="WB1406"> Jhalda </option>
                                                <option value="WB1502"> Jhargram </option>
                                                <option value="WB2401"> Jhargram Sadar </option>
                                                <option value="WB1804"> Kakdwip </option>
                                                <option value="WB0102"> Kalimpong </option>
                                                <option value="WB2101"> Kalimpong </option>
                                                <option value="WB0903"> Kalna </option>
                                                <option value="WB2301"> Kalna </option>
                                                <option value="WB1001"> Kalyani </option>
                                                <option value="WB0703"> Kandi </option>
                                                <option value="WB0904"> Katwa </option>
                                                <option value="WB2302"> Katwa </option>
                                                <option value="WB1503"> Kharagpur </option>
                                                <option value="WB1303"> Khatra </option>
                                                <option value="WB0103"> Kurseong </option>
                                                <option value="WB0704"> Lalbagh </option>
                                                <option value="WB0203"> Mal </option>
                                                <option value="WB0602"> Maldah(Sadar) </option>
                                                <option value="WB1405"> Manbazar </option>
                                                <option value="WB0303"> Mathabhanga </option>
                                                <option value="WB1501"> Medinipur Sadar </option>
                                                <option value="WB0304"> Mekliganj </option>
                                                <option value="WB0105"> Mirik </option>
                                                <option value="WB0705"> Murshidabad(Sadar) </option>
                                                <option value="WB1004"> Nadia(Sadar) </option>
                                                <option value="WB1404"> Purulia Sadar </option>
                                                <option value="WB1402"> Purulia Sadar(East) </option>
                                                <option value="WB1403"> Purulia Sadar(West) </option>
                                                <option value="WB1401"> Raghunathpur </option>
                                                <option value="WB0402"> Raiganj </option>
                                                <option value="WB0802"> Rampurhat </option>
                                                <option value="WB1002"> Ranaghat </option>
                                                <option value="WB1204"> Serampore </option>
                                                <option value="WB0104"> Siliguri </option>
                                                <option value="WB1805"> South 24 Parganas(Sadar) </option>
                                                <option value="WB1904"> Tamluk </option>
                                                <option value="WB1003"> Tehatta </option>
                                                <option value="WB0305"> Tufanganj </option>
                                                <option value="WB1602"> Uluberia </option>
                                                <option value="XXXXXX">Others(--Please Specify--)</option>
                                            </select>

                                        </div>
                                        <div class="col-lg-5 col-md-12">
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <input name="brcAuthName" type="text"
                                                class="form-control txtuppercase" id="brcAuthName"
                                                style="display:none" maxlength="35">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 border p-3 custom-no-border">
                                    <div class="row mb-2 bol_ref_detail">
                                        <div class="col-lg-5 col-md-12">
                                            <label>14. Details of two(2) local referees:</label>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 col-md-12">
                                            a) Name of Referee-I: <span class="text-danger"> *
                                            </span>
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <input type="text" class="form-control txtuppercase" id="rf1Name"
                                                name="rf1Name" first="" referee="" name=""
                                                pattern="[a-zA-Z ]*$" maxlength="45">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 col-md-12">
                                            b) Address of Referee-I: <span class="text-danger"> *
                                            </span>
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <input type="text" class="form-control txtuppercase" id="rf1Add"
                                                name="rf1Add" first="" referee="" address=""
                                                maxlength="150">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 col-md-12">
                                            c) Name of Referee-II: <span class="text-danger"> *
                                            </span>
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <input type="text" class="form-control txtuppercase" id="rf2Name"
                                                name="rf2Name" second="" referee="" address=""
                                                pattern="[a-zA-Z ]*$" maxlength="45">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 col-md-12">
                                            d) Address of Referee-II: <span class="text-danger"> *
                                            </span>
                                        </div>
                                        <div class="col-lg-7 col-md-12">
                                            <input type="text" class="form-control txtuppercase" id="rf2Add"
                                                name="rf2Add" enter="" second="" referee=""
                                                address="" maxlength="150">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                                <!--Migration Details-->
                                {{-- <div class="row bg-light mb-1 p-3 ">
                                <div class="col-lg-5 col-md-12">
                                    <label>15. Whether the applicant or his family migrated from other
                                        State/Country?</label>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="icheck-primary d-inline mr-2">
                                        <input class="" type="radio" name="mig" id="migyes"
                                            value="Y">
                                        <label class="" for="migyes">Yes</label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input class="" type="radio" name="mig" id="migno"
                                            value="N" checked="">
                                        <label class="" for="migno">No</label>
                                    </div>
                                </div>
                                <div class="row bg-light mb-2 p-3 migsection ">
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        <label>Migration Certificate No:</label>
                                        <input type="text" class="form-control" id="certM" name="certM"
                                            maxlength="18" value="- NA -" disabled="">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        <label>Date of Issue</label>
                                        <input type="text" class="form-control hasDatepicker" name="dtM"
                                            id="dtM" placeholder="dd/mm/yyyy" readonly="" value="- NA -"
                                            disabled="">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        <label>Country:</label>
                                        <input type="text" class="form-control txtuppercase" id="countryM"
                                            name="countryM" maxlength="25" value="- NA -" disabled="">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        <label>State:</label>
                                        <input type="text" class="form-control txtuppercase" id="stateM"
                                            name="stateM" maxlength="50" value="- NA -" disabled="">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        <label>District:</label>
                                        <input type="text" class="form-control txtuppercase" id="distM"
                                            name="distM" maxlength="50" value="- NA -" disabled="">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        <label>Police Station:</label>
                                        <input type="text" class="form-control txtuppercase" id="psM"
                                            name="psM" maxlength="50" value="- NA -" disabled="">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        <label>Village/Ward:</label>
                                        <input type="text" class="form-control txtuppercase" id="villM"
                                            name="villM" maxlength="50" value="- NA -" disabled="">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        <label>Year of migration:</label>
                                        <input type="text" class="form-control" id="yrM" name="yrM"
                                            maxlength="4" value="- NA -" disabled="">
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <!-- <input type="hidden" name="btnOption" value="Save And Continue"> -->
                                    <!-- <input name="btnPreview" type="button" value="Preview" class="btn btn-primary btn-style mr-3" > -->
                                    <input name="btnOption" id="btnOption" type="submit" value="Save And Continue"
                                        class="btn btn-success btn-style mr-3">
                                    <input name="btnOption" type="reset" value="Reset Form"
                                        class="btn btn-style btn-danger ">
                                </div>
                            </div> --}}




                                {{-- <button class="btn btn-primary" onclick="stepper1.next()">Next</button> --}}
                                <div class="d-flex justify-content-center mt-2">

                                    {{-- <button class="btn btn-danger m-2" onclick="resetForm()">Reset</button> --}}
                                    <button class="btn btn-primary m-2 " onclick="stepper1.previous()"
                                        type="button">Previous</button>
                                    <button class="btn btn-success m-2" onclick="" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                        {{-- <div id="test-l-4" class="content">
                            <p class="text-center">test 4</p>
                            <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>
                            <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                        </div> --}}
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script>
        var stepper1Node = document.querySelector('#stepper1')
        var stepper1 = new Stepper(document.querySelector('#stepper1'))

        stepper1Node.addEventListener('show.bs-stepper', function(event) {
            console.warn('show.bs-stepper', event)
        })
        stepper1Node.addEventListener('shown.bs-stepper', function(event) {
            console.warn('shown.bs-stepper', event)
        })

        // var stepper2 = new Stepper(document.querySelector('#stepper2'), {
        //     linear: false,
        //     animation: true
        // })
        // var stepper3 = new Stepper(document.querySelector('#stepper3'), {
        //     animation: true
        // })
        // var stepper4 = new Stepper(document.querySelector('#stepper4'), {
        //     animation: true
        // })
    </script>
    <script>
        function validateAndNext() {
            const form = document.getElementById('form');

            if (form.checkValidity()) {
                // If the form is valid, move to the next step
                stepper1.next();
            } else {
                // If the form is not valid, show validation errors
                form.classList.add('was-validated');
            }
        }
    </script>
    <script>
        function highlightDiv(clickedDiv) {
            // Remove 'clicked' class from all divs
            var allDivs = document.querySelectorAll('.card');
            allDivs.forEach(function(div) {
                div.classList.remove('clicked');
            });

            // Add 'clicked' class to the clicked div
            clickedDiv.classList.add('clicked');

            // Stop event propagation to prevent the body click event from triggering immediately
            event.stopPropagation();
        }
        // Add event listener to body to remove click effect when clicked outside the div
        document.body.addEventListener('click', function() {
            var allDivs = document.querySelectorAll('.card');
            allDivs.forEach(function(div) {
                div.classList.remove('clicked');
            });
        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $(document).ready(function() {

            // for district 
            $("#state").change(function() {
                var sid = $(this).val();
                // console.log(sid);
                if (sid == "") {
                    var sid = 0;
                    $('#distP').val(""); // Clear the distP field when state changes
                    return;
                }
                $.ajax({
                    url: '{{ url('/fetch-dist/') }}/' + sid,
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        $('#dist').find('option:not(:first)').remove();
                        if (response['dist'].length > 0) {
                            $.each(response['dist'], function(key, value) {
                                // $("#dist").append("<option id='" + value['did'] + "'>" +value['dname'] + "</option")
                                $("#dist").append("<option value='" + value['did'] +
                                    "'>" + value['dname'] + "</option")

                            });
                            // Automatically set the distP field to the selected district name
                            var selectedDistrict = $('#dist option:selected').text();
                            $('#distP').val(selectedDistrict);
                        }
                    }
                });
                // Update distP when district selection changes
                $('#dist').change(function() {
                    var selectedDistrict = $('#dist option:selected').text();
                    $('#distP').val(selectedDistrict);
                });
            });

            // for subdistrict
            $("#dist").change(function() {
                var did = $(this).val();
                // console.log(did);
                if (did == "") {
                    var did = 0;
                }
                $.ajax({
                    url: '{{ url('/fetch-subdiv/') }}/' + did,
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        $('#subdiv').find('option:not(:first)').remove();
                        if (response['subdiv'].length > 0) {
                            $.each(response['subdiv'], function(key, value) {
                                $("#subdiv").append("<option value='" + value['subid'] +
                                    "'>" + value['subname'] + "</option>")

                            });
                        }
                    }
                });
            });
            // $("#subdiv").change(function() {
            //     var subid = $(this).val();
            //     // console.log(did);
            //     if (subid == "") {
            //         var subid = 0;
            //     }
            //     // for muncipality

            //     $.ajax({
            //         url: '{{ url('/fetch-munci/') }}/' + subid,
            //         type: 'post',
            //         dataType: 'json',
            //         success: function(response) {
            //             console.log(response);
            //             $('#bmcode').find('option:not(:first)').remove();
            //             if (response['munci'] && response['munci'].length > 0) {
            //                 $.each(response['munci'], function(key, value) {
            //                     $("#bmcode").append("<option value='" + value[
            //                             'munid'] +
            //                         "'>" + value['mname'] + "</option>")

            //                 });
            //             }
            //         }
            //     });

            //     // for Block

            //     $.ajax({
            //         url: '{{ url('/fetch-block/') }}/' + subid,
            //         type: 'post',
            //         dataType: 'json',
            //         success: function(response) {
            //             console.log(response);
            //             $('#bmcode').find('option:not(:first)').remove();
            //             if (response['block'] && response['block'].length > 0) {
            //                 $.each(response['block'], function(key, value) {
            //                     $("#bmcode").append("<option value='" + value[
            //                             'bid'] +
            //                         "'>" + value['bname'] + "</option>")

            //                 });
            //             }
            //         }
            //     });
            // });
            // Function to handle radio button change

            //need to check 
            // function handleRadio(radio) {

            //     var subid = $("#subdiv").val(); // Get the value from #subdiv

            //     if (subid === "") {
            //         subid = 0;
            //     }

            //     var radioValue = $(radio).val();

            //     // Determine the URL based on the selected radio button
            //     var url = radioValue === 'M' ? '{{ url('/fetch-munci/') }}/' : '{{ url('/fetch-block/') }}/';

            //     // Perform AJAX call
            //     $.ajax({
            //         url: url + subid,
            //         type: 'post',
            //         dataType: 'json',

            //         success: function(response) {
            //             console.log(response);
            //             $('#bmcode').find('option:not(:first)').remove();

            //             if (radioValue === 'M' && response['munci'] && response['munci'].length > 0) {
            //                 $.each(response['munci'], function(key, value) {
            //                     $("#bmcode").append("<option value='" + value['munid'] + "'>" +
            //                         value['mname'] + "</option>");
            //                 });
            //             } else if (radioValue === 'B' && response['block'] && response['block'].length >
            //                 0) {
            //                 $.each(response['block'], function(key, value) {
            //                     $("#bmcode").append("<option value='" + value['bid'] + "'>" +
            //                         value['bname'] + "</option>");
            //                 });
            //             }
            //         }

            //     });
            // }

            // // Attach change event to radio buttons
            // $("#municipality, #block,#subdiv").change(function() {
            //     handleRadio(this);
            // });

            //for Muncipality and block
            function handleRadio(subid, radioValue) {
                if (subid === "") {
                    subid = 0;
                }

                // Determine the URL based on the selected radio button
                var url = radioValue === 'M' ? '{{ url('/fetch-munci/') }}/' : '{{ url('/fetch-block/') }}/';

                // Perform AJAX call
                $.ajax({
                    url: url + subid,
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        $('#bmcode').find('option:not(:first)').remove();

                        if (radioValue === 'M' && response['munci'] && response['munci'].length > 0) {
                            $.each(response['munci'], function(key, value) {
                                $("#bmcode").append("<option value='" + value['munid'] + "'>" +
                                    value['mname'] + "</option>");
                            });
                        } else if (radioValue === 'B' && response['block'] && response['block'].length >
                            0) {
                            $.each(response['block'], function(key, value) {
                                $("#bmcode").append("<option value='" + value['bid'] + "'>" +
                                    value['bname'] + "</option>");
                            });
                        }
                    }
                });
            }

            // Attach change event to radio buttons
            $("#municipality, #block").change(function() {
                var subid = $("#subdiv").val();
                var radioValue = $("input[name='bm']:checked").val();
                handleRadio(subid, radioValue);
            });

            // Use input event for #subdiv
            $("#subdiv").on('input', function() {
                var subid = $(this).val();
                var radioValue = $("input[name='bm']:checked").val();
                handleRadio(subid, radioValue);
            });


            // For Gp and ward
            $("#bmcode").change(function() {
                var bid = $(this).val(); // Update variable name to 'bid'
                var radioValue = $("input[name='bm']:checked").val();
                var url = radioValue === 'M' ? '{{ url('/fetch-ward/') }}/' : '{{ url('/fetch-gp/') }}/';
                console.log(bid);
                if (bid == "") {
                    bid = 0;
                }
                $.ajax({
                    url: url + bid,
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        $('#gpward').find('option:not(:first)').remove();

                        if (radioValue === 'M') {
                            if (response['ward'].length > 0) {
                                $.each(response['ward'], function(key, value) {
                                    $("#gpward").append("<option value='" + value[
                                            'wid'] +
                                        "'>" + value['wname'] + "</option>")
                                });
                            }
                        } else {
                            if (response['gp'].length > 0) {
                                $.each(response['gp'], function(key, value) {
                                    $("#gpward").append("<option value='" + value[
                                            'gpid'] +
                                        "'>" + value['gpname'] + "</option>")
                                });
                            }
                        }
                    }
                });
            });



            // for sc, st and obc


            $("#castesc,#castest,#casteobc").change(function() {
                var scid = $(this).val(); // Update variable name to 'bid'
                var radioValue = $("input[name='caste']:checked").val();
                // var url = radioValue === 'M' ? '{{ url('/fetch-ward/') }}/' : '{{ url('/fetch-gp/') }}/';
                var url;

                if (radioValue === 'SC') {
                    url = '{{ url('/fetch-sc/') }}/';
                    $('.subcastedropdown').hide();

                } else if (radioValue === 'ST') {
                    url = '{{ url('/fetch-st/') }}/';
                    $('.subcastedropdown').hide();

                } else if (radioValue === 'OBC') {
                    url = '{{ url('/fetch-obc/') }}/';
                    $('.subcastedropdown').show();
                    $('#subcaste').empty().append(
                        '<option value="">-- Select Caste --</option>'
                    ); // Clear the options and add the default option
                    // Clear the subcastedropdown
                    $('#obcType').val('').trigger('change');


                }

                console.log(scid);
                if (scid == "") {
                    scid = 0;
                }
                $.ajax({
                    url: url + scid,
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);

                        $('#subcaste').find('option:not(:first)').remove();

                        if (radioValue === 'SC') {
                            if (response['sc'].length > 0) {
                                $.each(response['sc'], function(key, value) {
                                    $("#subcaste").append("<option value='" + value[
                                            'scid'] +
                                        "'>" + value['scname'] + "</option>")
                                });
                            }
                        } else if (radioValue === 'ST') {
                            if (response['st'].length > 0) {
                                $.each(response['st'], function(key, value) {
                                    $("#subcaste").append("<option value='" + value[
                                            'stid'] +
                                        "'>" + value['stname'] + "</option>")
                                });
                            }


                        }
                    }

                });




            });
            // For change caste
            $("#obcType").change(function() {
                var casteid = $(this).val();
                if (casteid == "") {
                    var casteid = 0;
                }
                $.ajax({
                    url: '{{ url('/fetch-caste/') }}/' + casteid,
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        $('#subcaste').find('option:not(:first)').remove();
                        if (response['caste'].length > 0) {
                            $.each(response['caste'], function(key, value) {
                                $("#subcaste").append("<option value='" + value[
                                        'casteid'] + "'>" + value['castename'] +
                                    "</option>"
                                );
                            });
                        }
                    }
                });
            });


        });
    </script>


</body>

</html>
