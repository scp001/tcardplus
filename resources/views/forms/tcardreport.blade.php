@extends("layouts.main")
@section("content")
    <?php use App\Http\Controllers\Helper;?>
    <br><br>

    <div class="well" style="overflow: auto">
        <a  id="exportcsv" href="{{URL::to('/').'/exportcsvrange/'.date('Y-m-d',strtotime('today - 29 days')).' '.date('Y-m-d')}}" class="btn btn-primary">Export as Excel</a>
        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
            <span></span> <b class="caret"></b>
        </div>
    </div>

    <br>
    <br>

    <div id="tabless">

    <table class="table table-striped table-bordered table-hover tablesorter" width="744" id="tcard_report" spellcheck="false">
        <thead>
        <tr>
            <th>Order#</th>
            <th>First</th>
            <th>Last</th>
            <th>Utorid</th>
            <th>Barcode#</th>
            {{--<th>Type of Payment</th>--}}
            <th>Eamil</th>
            <th>Residence</th>
            <th>GreenPath/Other</th>
            <th>International</th>
            <th>Item Name</th>
            <th>Item Detail</th>
            <th>Meal Plan Total</th>
            <th>Additional TBucks</th>
            <th>Total</th>
            <th>Time / Date</th>
            <th>Type of Payment</th>
            <th>Comment</th>
            <th>Details</th>
            <th style="display: none">order_id</th>

        </tr>
        </thead>
        <tbody>

        <?php $count=1?>
        @foreach ($orders as $order)
            <tr>
            <td>
                <div class="editable_textarea" id="div_1">{{$order["order_num"]}}</div>
            </td>
            <td>{{$order["first"]}}</td>
            <td>{{$order["last"]}}</td>
            <td>{{$order["utorid"]}}</td>
            <td>{{$order["tnumber"]}}</td>
            <td>{{$order["email"]}}</td>
                <?php
                if ($order["residence"] == 1){
                    echo '<td>YES</td>';
                }
                else{
                    echo '<td>NO</td>';
                }
                ?>
                <?php
                if ($order["greenpath_other"] == 1){
                    echo '<td>YES</td>';
                }
                else{
                    echo '<td>NO</td>';
                }
                ?>
                <?php
                if ($order["international"] == 1){
                    echo '<td>YES</td>';
                }
                else{
                    echo '<td>NO</td>';
                }
                ?>
                <?php if ($order["meal_id"] == 1){
                echo '<td>Meal Plan Value</td>';
                }
                    else if ($order["meal_id"] == 2){
                        echo '<td>Meal Plan Semester</td>';
                    }
                    else if ($order["meal_id"] == 3){
                        echo '<td>Meal Plan Lite</td>';
                    }
                    else if ($order["meal_id"] == 4){
                        echo '<td>Meal Plan Regular</td>';
                    }
                    else{
                        echo '<td>Other</td>';
                    }
                ?>

                <?php if ($order["meal_detail_id"] == 1){
                    echo '<td>January</td>';
                }
                else if ($order["meal_detail_id"] == 2){
                    echo '<td>February</td>';
                }
                else if ($order["meal_detail_id"] == 3){
                    echo '<td>March</td>';
                }
                else if ($order["meal_detail_id"] == 4){
                    echo '<td>April</td>';
                }
                else if ($order["meal_detail_id"] == 5){
                    echo '<td>May</td>';
                }
                else if ($order["meal_detail_id"] == 6){
                    echo '<td>June</td>';
                }
                else if ($order["meal_detail_id"] == 7){
                    echo '<td>July</td>';
                }
                else if ($order["meal_detail_id"] == 8){
                    echo '<td>August</td>';
                }
                else if ($order["meal_detail_id"] == 9){
                    echo '<td>September</td>';
                }
                else if ($order["meal_detail_id"] == 10){
                    echo '<td>October</td>';
                }
                else if ($order["meal_detail_id"] == 11){
                    echo '<td>November</td>';
                }
                else if ($order["meal_detail_id"] == 12){
                    echo '<td>December</td>';
                }
                else if ($order["meal_detail_id"] == 13){
                    echo '<td>Summer</td>';
                }
                else if ($order["meal_detail_id"] == 14){
                    echo '<td>Fall</td>';
                }
                else if ($order["meal_detail_id"] == 15){
                    echo '<td>Winter</td>';
                }
                else if ($order["meal_detail_id"] == 16){
                    echo '<td>Fall and Winter</td>';
                }
                else{
                    echo '<td> '.$order["other_meal"].'</td>';
                }
                ?>

                <?php
                echo '<td>$ '. number_format($order["meal_plan_amount"],2).'</td>';
                ?>

                <?php
                echo '<td>$'. number_format($order["additional_tbuck"],2).'</td>';
                ?>

                <?php
                $total =$order["meal_plan_amount"] + $order["additional_tbuck"];
                    echo '<td>'.'$'.number_format($total, 2).'</td>';

                ?>


            <td>{{$order["created_date"]}}</td>

                    <?php
                    $way = "";
                    foreach ($pays as $pay){
                    if ($pay["trasaction_id"] == $order["id"]){
                        if ($pay["visa"]){
                        $way = $way."Visa, ";
                        }
                        if ($pay["master"]){
                            $way = $way."Master, ";
                        }
                        if ($pay["debit"]){
                            $way = $way."Debit, ";
                        }
                        if ($pay["express"]){
                            $way = $way."American Express, ";
                        }
                        if ($pay["cash"]){
                            $way = $way."Cash, ";
                        }
                        if ($pay["other"]){
                            $way = $way."Other, ";
                        }
                    }
                    }
                    $way = substr($way, 0, -2);
                        echo '<td>'.$way.'</td>';
                    ?>

                <?php
                if ($order["comment"]){
                    echo  '<td class="editable_textarea" id="div_2">'.$order["comment"]."</td>";
                }
                else{
                    echo  '<td class="editable_textarea" id="div_2">N / A</td>';
                }
                ?>
                {{--<td>{{$order["comment"]}}</td>--}}
                <td><a href="{{URL::to('/') . '/detail/'.$order["id"]}}">Details</a></td>
                <td class="id_need" style="display: none">{{$order["id"]}}</td>
            </tr>
            <?php $count++?>
        @endforeach

        </tbody>
    </table>
        </div>
    <br>
    <br>
    @include("forms.warningModal")
@stop
@section('javascript')
    <script src="{{ Helper::asset('js/report.js') }}"></script>
    <script src="{{ Helper::asset('js/moment.js') }}"></script>
    <script src="{{ Helper::asset('js/daterangepicker.js') }}"></script>
    <script src="{{ Helper::asset('js/tablesorter.js') }}"></script>
    {{--<script src="{{ Helper::asset('js/bootstrap-editable.js') }}"></script>--}}
    {{--<script src="{{ Helper::asset('js/jquery.jeditable.js') }}"></script>--}}



@stop


