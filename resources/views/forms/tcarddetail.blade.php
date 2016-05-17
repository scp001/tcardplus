@extends("layouts.main")
@section("content")
    <?php use App\Http\Controllers\Helper;?>
    <br><br>

    <form class="submission-form">
        <h1 class="title text-center">TCard<sup>+</sup> Detail Report</h1>
        <br>
        <hr>
        <div class="row"><div class="col-md-12 col-sm-12 col-xs-12">


                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Created Date:</div>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-left">{{$order["created_date"]}}</div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <a href="{{URL::previous()}}" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-chevron-left"></span>Go Back</a>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Barcode:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4 text-left">
                        <span>&nbsp;</span>{{ $order["tnumber"]}}
                    </div>
                </div>
                    <div class='row'>
                        <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                    </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">UTORid</div>
                    <div class="col-md-4 col-sm-4 col-xs-4 text-left">
                        <span>&nbsp;</span>{{$order["utorid"]}}
                    </div>

                </div>
                    <div class='row'>
                        <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                    </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Student First Name:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <span>&nbsp;</span>{{$order["first"]}}
                    </div>

                </div>

                    <div class='row'>
                        <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                    </div>

                    <div class='row'>
                        <div class="col-md-3 col-sm-3 col-xs-3 text-right">Student Last Name:</div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span>&nbsp;</span>{{$order["last"]}}
                        </div>

                    </div>

                    <div class='row'>
                        <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                    </div>

                    <div class='row'>
                        <div class="col-md-3 col-sm-3 col-xs-3 text-right">Email:</div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span>&nbsp;</span>{{$order["email"]}}
                        </div>

                    </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2 "><span>&nbsp;</span></div>
                </div>

                    <div class='row'>
                        <div class="col-md-3 col-sm-3 col-xs-3 text-right">Residence:</div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span>&nbsp;</span>
                            <?php
                            if ($order["residence"] == 1){
                                echo 'YES';
                            }
                                else{
                                    echo 'NO';
                                }
                                ?>
                        </div>

                    </div>
                    <div class='row'>
                        <div class="col-md-2 col-sm-2 col-xs-2 "><span>&nbsp;</span></div>
                    </div>

                    <div class='row'>
                        <div class="col-md-3 col-sm-3 col-xs-3 text-right">Green Path / Other:</div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span>&nbsp;</span>
                            <?php
                            if ($order["greenpath_other"] == 1){
                                echo 'YES';
                            }
                            else{
                                echo 'NO';
                            }
                            ?>
                        </div>

                    </div>

                    <div class='row'>
                        <div class="col-md-2 col-sm-2 col-xs-2 "><span>&nbsp;</span></div>
                    </div>

                    <div class='row'>
                        <div class="col-md-3 col-sm-3 col-xs-3 text-right">International Student:</div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span>&nbsp;</span>
                            <?php
                            if ($order["international"] == 1){
                                echo 'YES';
                            }
                            else{
                                echo 'NO';
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Meal Plan Purchased:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <span>&nbsp;</span><?php if ($order["meal_id"] == 1){
                            echo 'Meal Plan Value';
                        }
                        else if ($order["meal_id"] == 2){
                            echo 'Meal Plan Semester';
                        }
                        else if ($order["meal_id"] == 3){
                            echo 'Meal Plan Lite';
                        }
                        else if ($order["meal_id"] == 4){
                            echo 'Meal Plan Regular';
                        }
                        else{
                            echo 'Other';
                        }
                        ?>
                    </div>

                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Meal Plan Detail:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <span>&nbsp;</span><?php if ($order["meal_detail_id"] == 1){
                            echo 'January';
                        }
                        else if ($order["meal_detail_id"] == 2){
                            echo 'February';
                        }
                        else if ($order["meal_detail_id"] == 3){
                            echo 'March';
                        }
                        else if ($order["meal_detail_id"] == 4){
                            echo 'April';
                        }
                        else if ($order["meal_detail_id"] == 5){
                            echo 'May';
                        }
                        else if ($order["meal_detail_id"] == 6){
                            echo 'June';
                        }
                        else if ($order["meal_detail_id"] == 7){
                            echo 'July';
                        }
                        else if ($order["meal_detail_id"] == 8){
                            echo 'August';
                        }
                        else if ($order["meal_detail_id"] == 9){
                            echo 'September';
                        }
                        else if ($order["meal_detail_id"] == 10){
                            echo 'October';
                        }
                        else if ($order["meal_detail_id"] == 11){
                            echo 'November';
                        }
                        else if ($order["meal_detail_id"] == 12){
                            echo 'December';
                        }
                        else if ($order["meal_detail_id"] == 13){
                            echo 'Summer';
                        }
                        else if ($order["meal_detail_id"] == 14){
                            echo 'Fall';
                        }
                        else if ($order["meal_detail_id"] == 15){
                            echo 'Winter';
                        }
                        else if ($order["meal_detail_id"] == 16){
                            echo 'Fall and Winter';
                        }
                        else{
                            echo $order["other_meal"];
                        }
                        ?>
                    </div>

                </div>



                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Meal Plan Price:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <span>&nbsp;</span><?php echo '$'.number_format($order["meal_plan_amount"], 2)?>
                    </div>

                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Additional TBucks:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <span>&nbsp;</span><?php echo '$'.number_format($order["additional_tbuck"], 2)?>
                    </div>

                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Total:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <span>&nbsp;</span><?php echo '$'.number_format($order["meal_plan_amount"], 2)?>
                         + <?php echo '$'.number_format($order["additional_tbuck"], 2)?> =  <?php
                        $total =number_format($order["meal_plan_amount"] + $order["additional_tbuck"], 2);
                        echo '$'.$total;

                        ?>
                    </div>

                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Type of Payment:</div>
                    <div class="col-md-7 col-sm-7 col-xs-7">
                        <span>&nbsp;</span><?php
                        $way = "";
                        if
                        ($pay["visa"]){
                            $way = $way."Visa ( $".number_format($pay["visa"],2)." ), ";
                        }
                        if ($pay["master"]){
                            $way = $way."Master ( $".number_format($pay["master"],2)." ), ";
                        }
                        if ($pay["debit"]){
                            $way = $way."Debit ( $".number_format($pay["debit"],2)." ), ";
                        }
                        if ($pay["express"]){
                            $way = $way."American Express ( $".number_format($pay["express"],2)." ), ";
                        }
                        if ($pay["cash"]){
                            $way = $way."Cash ( $".number_format($pay["cash"],2)." ), ";
                        }
                        if ($pay["other"]){
                            $way = $way."Other ( $".number_format($pay["other"],2).";  comment : ".$order["other_pay"]." ), ";
                        }
                        $way = substr($way, 0, -2);
                        echo $way;
                        ?>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Comment:</div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>&nbsp;</span>
                        <?php
                        if ($order["comment"]){
                            echo $order["comment"];
                        }
                        else{
                            echo 'N / A';
                        }
                        ?>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-2 col-sm-2 col-xs-2"><span>&nbsp;</span></div>
                </div>

                <div class='row'>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">Order#:</div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <span>&nbsp;</span>
                        <?php
                        if ($order["order_num"]){
                            echo $order["order_num"];
                        }
                        else{
                            echo 'N / A';
                        }
                        ?>
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

    </form>
    <br>
    <br>
    @include("forms.warningModal")
@stop
@section('javascript')
    <script src="{{ Helper::asset('js/report.js') }}"></script>
    <script src="{{ Helper::asset('js/moment.js') }}"></script>
    <script src="{{ Helper::asset('js/daterangepicker.js') }}"></script>
    <script src="{{ Helper::asset('js/tablesorter.js') }}"></script>

@stop
