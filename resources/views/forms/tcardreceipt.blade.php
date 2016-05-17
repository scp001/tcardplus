@extends("layouts.main")
@section("content")
    <?php use App\Http\Controllers\Helper;?>
    <form class="submission-form">
        <h1 class="title text-center">TCard<sup>+</sup> Order Form</h1><hr>
        <div class="row"><div class="col-md-12 col-sm-12 col-xs-12">
                <div class='row'>
                    <div class='title text-center'>
                        <h5>Please complete the form in full</h5>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Date:</div>
                    <div class="col-md-2 col-sm-2 col-xs-2"><?php
                        date_default_timezone_set('America/Toronto');
                        echo date('Y-m-d');
                        ?></div>
                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>
                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Barcode:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <input type="text" id="tcard" value="{{isset($tcard)? $tcard:''}}" autofocus class="form-control">
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        <span class="danger text-left">*</span>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">UTORid</div>
                    <div class="col-md-4 col-sm-4 col-xs-4 text-right">
                        <input type="text" class="form-control" id="utorid" data-validation="required" value="{{isset($utorid)? $utorid:''}}"  maxlength="50">

                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        <span class="danger text-left">*</span>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <button type="button" class="btn btn-success" id="retrieve">Retrieve</button>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Student First Name:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <input type="text" class="form-control" id="first" data-validation="required" value="{{isset($first)? $first:''}}" maxlength="50">
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        <span class="danger text-left">*</span>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Student Last Name:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <input type="text" id="last" class="form-control" value="{{isset($last)? $last:''}}" maxlength="50">
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        <span class="danger text-left">*</span>
                    </div>
                </div>



                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Email:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <input type="text" id="email" class="form-control" value="{{isset($email)? $email:''}}" maxlength="30">
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        <span class="danger text-left">*</span>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2 "><span>&nbsp;</span></div>
                </div>
                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
                    <div class="col-md-3 col-sm-3 col-xs-3">Designation</div>
                </div>
                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2 "><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>

                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <input type="checkbox" value="option10" id="residence">&nbsp;Residence
                    </div>


                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <input type="checkbox" value="option11" id="green">&nbsp;Green Path/Other
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <input type="checkbox" value="option12" id="inter">&nbsp;International Student
                    </div>


                </div>
                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>
                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                {{--<div class='row'>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3 text-right">Item Name<span class="danger">*</span>:</div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
                        {{--<input type="checkbox" value="1" id="value_plan" name="value_plan" onchange="Disable('#value_plan','plan','#selection1','295.00')"> Meal Plan Value--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
                        {{--<input type="checkbox" value="2" id="seme_plan" name="seme_plan" onchange="Disable('#seme_plan','plan','#selection2','1333.00')"> Meal Plan Semester--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
                        {{--<input type="checkbox" value="3" id="lite_plan" name="lite_plan" onchange="Disable('#lite_plan','plan', null,'2413.00')"> Meal Plan Lite--}}
                    {{--</div>--}}
                {{--</div>--}}


                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Select Meal Plan:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <select name="meal_plan" id="meal_plan" onchange="AddOption()">
                            <option value="1" id="value_plan" name="value_plan">Meal Plan Value - $ 295.00</option>
                            <option value="2" id="seme_plan" name="value_plan">Meal Plan Semester - $1333.00</option>
                            <option value="3" id="lite_plan" name="lite_plan">Meal plan Lite - $2413.00</option>
                            <option value="4" id="reg_plan" name="reg_plan">Meal Plan Regular - $3284.00</option>
                            <option value="5" id="other" name="other">Other</option>
                        </select>
                    </div>

                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <span class="danger text-right">*</span>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                {{--<div class='row'>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
                        {{--&nbsp;&nbsp;&nbsp;&nbsp;($ 295.00)--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
                        {{--&nbsp;&nbsp;&nbsp;&nbsp;($ 1333.00)--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
                        {{--&nbsp;&nbsp;&nbsp;&nbsp;($ 2413.00)--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class='row' id="selection1_row ">
                    <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
                    <div class="col-md-3 col-sm-3 col-xs-3" id="dynamic_selection">
                        <select id="selection1" name="selection1" style=" width: 150px">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>

                    {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
                        {{--<select id="selection2" name="selection2" style="display:none; width: 150px">--}}
                            {{--<option value="13">Summer</option>--}}
                            {{--<option value="14">Fall</option>--}}
                            {{--<option value="15">Winter</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}

                </div>
                {{--<div class='row'>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
                        {{--<span>&nbsp;</span>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
                        {{--<input type="checkbox" value="4" id="reg_plan" name="reg_plan" onchange="Disable('#reg_plan','plan',null,'3284.00')"> Meal Plan Regular--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
                        {{--<input type="checkbox" value="5" id="other" name="other" onchange="Disable('#other','plan','#other_fd',null)"> Other--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class='row'>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
                        {{--&nbsp;&nbsp;&nbsp;&nbsp;($ 3284.00)--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class='row'>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>--}}
                    {{--<div id="other_fd" class="col-md-3 col-sm-3 col-xs-3" style="display:none">--}}
                        {{--<input id="other_f" name="other_f" type="text" />--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>
                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
                    <div class="col-md-5 col-sm-5 col-xs-5" style="color:red;font-size:12px"><em>(Maximum total amount: 9,999,999.99 CAD) </em></div>
                </div>
                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>

                    <div class="col-md-2 col-sm-2 col-xs-2">
                        Meal Plan Total: <input type="text" id="amount"  maxlength="10" value="295.00" disabled class="two-digits form-control" >
                    </div>
                    {{--<div class="col-md-3 col-sm-3 col-xs-3">Meal Plan Price: $</div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-3"></div>--}}
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; +
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-3">
                        Additional TBucks: <input type="text" id="amount_tb"  maxlength="10" value="0" class="two-digits form-control" >
                    </div>
                    {{--<div class="col-md-1 col-sm-1 col-xs-1">Total: $</div>--}}
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; =
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <div  style="font-weight: bold;color: red">Order Total: </div>
                        <input type="text" id="total"  value="295.00" maxlength="10" disabled class="form-control">
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>
                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Type of Payment<span class="danger">*</span>:</div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <input type="checkbox" value="1" id="visa" class="two-digits"> Visa
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <input type="checkbox" value="2" id="master" class="two-digits"> MasterCard
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <input type="checkbox" value="3" id="debit" class="two-digits"> Debit
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <input type="checkbox" value="4" id="express" class="two-digits"> American Express
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <span>&nbsp;</span>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <input type="checkbox" value="5" id="cash" class="two-digits"> Cash
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <input type="checkbox" value="6" id="other_p" class="two-digits"> Other
                    </div>
                    <div id="other_pfd" class="col-md-4 col-sm-4 col-xs-4" style="display:none">
                        <input id="other_pf" name="other_pf" maxlength="45" type="text" />
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>
                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div id="dynamic">

                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right" style="font-weight: bold;color:red">Order Total:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <input type="text" id="total_pay"  maxlength="30" value="0.00" disabled class="form-control">
                    </div>
                </div>


                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Comment:</div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <textarea  id="comment"  maxlength="200" style="width: 400px"></textarea>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>
                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Order#:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <input type="text" id="order"  maxlength="30">
                    </div>
                </div>


                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>
            </div></div>

        <div class="buttons">
            <button type="button" class="btn btn-danger" id="cancel">Cancel</button>
            <button type="button" class="btn btn-success" id="submit">Submit</button>
        </div>
        {!! Form::hidden('form_id', isset($form_id)? $form_id:0, array("id" => "form_id")) !!}
        {!! Form::hidden('submitted_id', isset($submitted_id)? $submitted_id:0, array("id" => "submitted_id")) !!}
        {!! Form::hidden('keys', isset($keys)? $keys:"", array("id" => "keys")) !!}
        {!! Form::hidden('departments', isset($department)? count($department):0, array("id" => "departments")) !!}
    </form>

    @include("forms.warningModal")
@stop
@section('javascript')
    <script src="{{ Helper::asset('js/tspc.js') }}"></script>
@stop
