$(document).ready(function() {

    $('.two-digits').change(function () {

        $(this).val(parseFloat($(this).val()).toFixed(2));

    });
    $(".two-digits").number(true, 2);

    $('#amount_tb').change(function () {
        $("#total").val(((parseFloat($('#amount').val()) + parseFloat($(this).val())).toFixed(2)).toString());
    });

    $("#other_p").change(function (){
        if ($("#other_p").is(":checked")){
        $("#other_pfd").show();
            $("#dynamic").append(
                "<div class='row' id='add6'>"+
                "<div class='col-md-3 col-sm-3 col-xs-3 text-right'>" +
                "Other:" +
                "</div>"+
                "<div class='col-md-4 col-sm-4 col-xs-4' id='other_app'>" +
                "<input type='text' id='other_add'  maxlength='10'  class='two-digits2 form-control' value='0'>" +
                "</div>" +
                "</div>");
            $(".two-digits2").number(true, 2);
            $('#other_add').change(function(){
                var master_add1 = 0.00;
                var debit_add1 = 0.00;
                var express_add1 = 0.00;
                var cash_add1 = 0.00;
                var visa_add1 = 0.00;
                $("#total_pay").val('0.00')

                if ($('#master_add').val()){
                    master_add1 = $('#master_add').val();
                }
                if ($('#debit_add').val()){
                    debit_add1 = $('#debit_add').val();
                }

                if ($('#express_add').val()){
                    express_add1 = $('#express_add').val();
                }

                if ($('#cash_add').val()){
                    cash_add1 = $('#cash_add').val();
                }

                if ($('#visa_add').val()){
                    visa_add1 = $('#visa_add').val();
                }

                $("#total_pay").val((( parseFloat(visa_add1) + parseFloat(cash_add1) + parseFloat(express_add1) + parseFloat(master_add1) + parseFloat(debit_add1) + parseFloat($(this).val())).toFixed(2)).toString());
            });
        }

        else{
            $("#add6").replaceWith("");

            $("#other_pfd").hide();

            var visa_add1 = 0.00;
            var debit_add1 = 0.00;
            var express_add1 = 0.00;
            var cash_add1 = 0.00;
            var master_add1 = 0.00;
            if ($('#visa_add').val()){
                visa_add1 = $('#visa_add').val();
            }

            if ($('#debit_add').val()){
                debit_add1 = $('#debit_add').val();
            }

            if ($('#express_add').val()){
                express_add1 = $('#express_add').val();
            }

            if ($('#cash_add').val()){
                cash_add1 = $('#cash_add').val();
            }

            if ($('#master_add').val()){
                master_add1 = $('#master_add').val();
            }

            $("#total_pay").val((( parseFloat(master_add1) + parseFloat(cash_add1) + parseFloat(express_add1) + parseFloat(debit_add1) + parseFloat(visa_add1)).toFixed(2)).toString());
        }
    });

    $('#visa').change(function(){
        if ($("#visa").is(":checked")){
            $("#dynamic").append(
                "<div class='row' id='add1'>"+
                "<div class='col-md-3 col-sm-3 col-xs-3 text-right'>" +
                "Visa:" +
                "</div>"+
                "<div class='col-md-4 col-sm-4 col-xs-4' id='visa_app'>" +
                "<input type='text' id='visa_add'  maxlength='10'  class='two-digits2 form-control' value='0'>" +
                "</div>" +
                "</div>");
            $(".two-digits2").number(true, 2);

            $('#visa_add').change(function(){
                var master_add1 = 0.00;
                var debit_add1 = 0.00;
                var express_add1 = 0.00;
                var cash_add1 = 0.00;
                var other_add1 = 0.00;
                $("#total_pay").val('0.00')
                if ($('#master_add').val()){
                    master_add1 = $('#master_add').val();
                }

                if ($('#debit_add').val()){
                    debit_add1 = $('#debit_add').val();
                }

                if ($('#express_add').val()){
                    express_add1 = $('#express_add').val();
                }

                if ($('#cash_add').val()){
                    cash_add1 = $('#cash_add').val();
                }

                if ($('#other_add').val()){
                    other_add1 = $('#other_add').val();
                }

                $("#total_pay").val((( parseFloat(other_add1) + parseFloat(cash_add1) + parseFloat(express_add1) + parseFloat(master_add1) + parseFloat(debit_add1) + parseFloat($(this).val())).toFixed(2)).toString());
            });

        }
        else{
            $("#add1").replaceWith("");
            var master_add1 = 0.00;
            var debit_add1 = 0.00;
            var express_add1 = 0.00;
            var cash_add1 = 0.00;
            var other_add1 = 0.00;
            if ($('#master_add').val()){
                master_add1 = $('#master_add').val();
            }

            if ($('#debit_add').val()){
                debit_add1 = $('#debit_add').val();
            }

            if ($('#express_add').val()){
                express_add1 = $('#express_add').val();
            }

            if ($('#cash_add').val()){
                cash_add1 = $('#cash_add').val();
            }

            if ($('#other_add').val()){
                other_add1 = $('#other_add').val();
            }

            $("#total_pay").val((( parseFloat(other_add1) + parseFloat(cash_add1) + parseFloat(express_add1) + parseFloat(debit_add1) + parseFloat(master_add1)).toFixed(2)).toString());

        }
    });

    $('#master').change(function(){
        if ($("#master").is(":checked")){
            $("#dynamic").append(
                "<div class='row' id='add2'>"+
                "<div class='col-md-3 col-sm-3 col-xs-3 text-right'>" +
                "Master Card:" +
                "</div>"+
                "<div class='col-md-4 col-sm-4 col-xs-4' id='master_app'>" +
                "<input type='text' id='master_add'  maxlength='10'  class='two-digits2 form-control' value='0'>" +
                "</div>" +
                "</div>");
            $(".two-digits2").number(true, 2);

            $('#master_add').change(function(){
                var express_add1 = 0.00;
                var debit_add1 = 0.00;
                var visa_add1 = 0.00;
                var cash_add1 = 0.00;
                var other_add1 = 0.00;
                $("#total_pay").val('0.00')
                if ($('#visa_add').val()){
                    visa_add1 = $('#visa_add').val();
                }

                if ($('#debit_add').val()){
                    debit_add1 = $('#debit_add').val();
                }

                if ($('#express_add').val()){
                    express_add1 = $('#express_add').val();
                }

                if ($('#cash_add').val()){
                    cash_add1 = $('#cash_add').val();
                }

                if ($('#other_add').val()){
                    other_add1 = $('#other_add').val();
                }

                $("#total_pay").val(((parseFloat(other_add1) + parseFloat(cash_add1) + parseFloat(express_add1) + parseFloat(visa_add1) + parseFloat(debit_add1) + parseFloat($(this).val())).toFixed(2)).toString());
            });

        }
        else{
            $("#add2").replaceWith("");
            var visa_add1 = 0.00;
            var debit_add1 = 0.00;
            var express_add1 = 0.00;
            var cash_add1 = 0.00;
            var other_add1 = 0.00;
            if ($('#visa_add').val()){
                visa_add1 = $('#visa_add').val();
            }

            if ($('#debit_add').val()){
                debit_add1 = $('#debit_add').val();
            }

            if ($('#express_add').val()){
                express_add1 = $('#express_add').val();
            }

            if ($('#cash_add').val()){
                cash_add1 = $('#cash_add').val();
            }

            if ($('#other_add').val()){
                other_add1 = $('#other_add').val();
            }

            $("#total_pay").val((( parseFloat(other_add1) + parseFloat(cash_add1) + parseFloat(express_add1) + parseFloat(debit_add1) + parseFloat(visa_add1)).toFixed(2)).toString());

        }
    });

    $('#debit').change(function(){
        if ($("#debit").is(":checked")){
            $("#dynamic").append(
                "<div class='row' id='add3'>"+
                "<div class='col-md-3 col-sm-3 col-xs-3 text-right'>" +
                "Debit:" +
                "</div>"+
                "<div class='col-md-4 col-sm-4 col-xs-4' id='debit_app'>" +
                "<input type='text' id='debit_add'  maxlength='10'  class='two-digits2 form-control' value='0'>" +
                "</div>" +
                "</div>");
            $(".two-digits2").number(true, 2);
            $('#debit_add').change(function(){
                var express_add1 = 0.00;
                var master_add1 = 0.00;
                var visa_add1 = 0.00;
                var cash_add1 = 0.00;
                var other_add1 = 0.00;
                $("#total_pay").val('0.00')
                if ($('#visa_add').val()){
                    visa_add1 = $('#visa_add').val();
                }

                if ($('#master_add').val()){
                    master_add1 = $('#master_add').val();
                }

                if ($('#express_add').val()){
                    express_add1 = $('#express_add').val();
                }

                if ($('#cash_add').val()){
                    cash_add1 = $('#cash_add').val();
                }

                if ($('#other_add').val()){
                    other_add1 = $('#other_add').val();
                }

                $("#total_pay").val(((parseFloat(other_add1) + parseFloat(cash_add1) + parseFloat(express_add1) + parseFloat(visa_add1) + parseFloat(master_add1) + parseFloat($(this).val())).toFixed(2)).toString());
            });
        }
        else{
            $("#add3").replaceWith("");
            var express_add1 = 0.00;
            var visa_add1 = 0.00;
            var master_add1 = 0.00;
            var cash_add1 = 0.00;
            var other_add1 = 0.00;
            if ($('#visa_add').val()){
                visa_add1 = $('#visa_add').val();
            }

            if ($('#master_add').val()){
                master_add1 = $('#master_add').val();
            }

            if ($('#express_add').val()){
                express_add1 = $('#express_add').val();
            }

            if ($('#cash_add').val()){
                cash_add1 = $('#cash_add').val();
            }

            if ($('#other_add').val()){
                other_add1 = $('#other_add').val();
            }

            $("#total_pay").val((( parseFloat(other_add1) + parseFloat(cash_add1) + parseFloat(express_add1) + parseFloat(master_add1) + parseFloat(visa_add1)).toFixed(2)).toString());
        }
    });

    $('#express').change(function(){
        if ($("#express").is(":checked")){
            $("#dynamic").append(
                "<div class='row' id='add4'>"+
                "<div class='col-md-3 col-sm-3 col-xs-3 text-right'>" +
                "American Express:" +
                "</div>"+
                "<div class='col-md-4 col-sm-4 col-xs-4' id='express_app'>" +
                "<input type='text' id='express_add'  maxlength='10'  class='two-digits2 form-control' value='0'>" +
                "</div>" +
                "</div>");
            $(".two-digits2").number(true, 2);
            $('#express_add').change(function(){
                var debit_add1 = 0.00;
                var master_add1 = 0.00;
                var visa_add1 = 0.00;
                var cash_add1 = 0.00;
                var other_add1 = 0.00;
                $("#total_pay").val('0.00')
                if ($('#visa_add').val()){
                    visa_add1 = $('#visa_add').val();
                }

                if ($('#master_add').val()){
                    master_add1 = $('#master_add').val();
                }

                if ($('#debit_add').val()){
                    debit_add1 = $('#debit_add').val();
                }

                if ($('#cash_add').val()){
                    cash_add1 = $('#cash_add').val();
                }

                if ($('#other_add').val()){
                    other_add1 = $('#other_add').val();
                }

                $("#total_pay").val(((parseFloat(other_add1) + parseFloat(cash_add1) + parseFloat(debit_add1) + parseFloat(visa_add1) + parseFloat(master_add1) + parseFloat($(this).val())).toFixed(2)).toString());
            });
        }
        else{
            $("#add4").replaceWith("");
            var visa_add1 = 0.00;
            var debit_add1 = 0.00;
            var master_add1 = 0.00;
            var cash_add1 = 0.00;
            var other_add1 = 0.00;
            if ($('#visa_add').val()){
                visa_add1 = $('#visa_add').val();
            }

            if ($('#debit_add').val()){
                debit_add1 = $('#debit_add').val();
            }

            if ($('#master_add').val()){
                master_add1 = $('#master_add').val();
            }

            if ($('#cash_add').val()){
                cash_add1 = $('#cash_add').val();
            }

            if ($('#other_add').val()){
                other_add1 = $('#other_add').val();
            }

            $("#total_pay").val((( parseFloat(other_add1) + parseFloat(cash_add1) + parseFloat(master_add1) + parseFloat(debit_add1) + parseFloat(visa_add1)).toFixed(2)).toString());
        }
    });

    $('#cash').change(function(){
        if ($("#cash").is(":checked")){
            $("#dynamic").append(
                "<div class='row' id='add5'>"+
                "<div class='col-md-3 col-sm-3 col-xs-3 text-right'>" +
                "Cash:" +
                "</div>"+
                "<div class='col-md-4 col-sm-4 col-xs-4' id='cash_app'>" +
                "<input type='text' id='cash_add'  maxlength='10'  class='two-digits2 form-control' value='0'>" +
                "</div>" +
                "</div>");
            $(".two-digits2").number(true, 2);
            $('#cash_add').change(function(){
                var debit_add1 = 0.00;
                var master_add1 = 0.00;
                var visa_add1 = 0.00;
                var express_add1 = 0.00;
                var other_add1 = 0.00;
                $("#total_pay").val('0.00')
                if ($('#visa_add').val()){
                    visa_add1 = $('#visa_add').val();
                }

                if ($('#master_add').val()){
                    master_add1 = $('#master_add').val();
                }

                if ($('#debit_add').val()){
                    debit_add1 = $('#debit_add').val();
                }

                if ($('#express_add').val()){
                    express_add1 = $('#express_add').val();
                }

                if ($('#other_add').val()){
                    other_add1 = $('#other_add').val();
                }

                $("#total_pay").val(((parseFloat(other_add1) + parseFloat(express_add1) + parseFloat(debit_add1) + parseFloat(visa_add1) + parseFloat(master_add1) + parseFloat($(this).val())).toFixed(2)).toString());
            });
        }
        else{
            $("#add5").replaceWith("");
            var visa_add1 = 0.00;
            var debit_add1 = 0.00;
            var master_add1 = 0.00;
            var express_add1 = 0.00;
            var other_add1 = 0.00;
            if ($('#visa_add').val()){
                visa_add1 = $('#visa_add').val();
            }

            if ($('#debit_add').val()){
                debit_add1 = $('#debit_add').val();
            }

            if ($('#master_add').val()){
                master_add1 = $('#master_add').val();
            }

            if ($('#express_add').val()){
                express_add1 = $('#express_add').val();
            }

            if ($('#other_add').val()){
                other_add1 = $('#other_add').val();
            }

            $("#total_pay").val((( parseFloat(other_add1) + parseFloat(express_add1) + parseFloat(master_add1) + parseFloat(debit_add1) + parseFloat(visa_add1)).toFixed(2)).toString());
        }
    });



    $('#amount').change(function () {
        $("#total").val(((parseFloat($('#amount_tb').val()) + parseFloat($(this).val())).toFixed(2)).toString());
    });

    $("#submit").click({route: "submit"}, SubmitDocument);
    $("#cancel").click(function () {
        $('#tip-modal').modal({show: true});
    });

    $('#tcard').keyup(function(){
        if ($('#tcard').val().trim().length == 16){
            $.ajax({
                type: "GET",
                url: BASE_URL + "student/" + ($('#tcard').val().trim()),
                //data: $post,
                data:{variable:'value'},
                dataType: 'json',
                success: function (data) {
                    if (data.student) {
                        //alert(data['student'].toSource());

                        $("#utorid").val(data.student.utorid);
                        $("#utorid").prop("disabled", true);
                        $("#tcard").prop("disabled", true);
                        $("#inter").prop("checked", false);
                        $("#residence").prop("checked", false);
                        $("#first").val(data.student.givennames);
                        $("#last").val(data.student.familyname);
                        $("#email").val(data.student.email);
                        $("#email").prop("disabled", true);
                        var s = data.student.roleID;
                        if (s.indexOf('3414') >= 0 || s.indexOf('3349') >= 0 || s.indexOf('3416') >= 0 ||  s.indexOf('3417') >= 0){
                            $("#inter").prop("checked", true);
                        }
                        if (s.indexOf('2270') >= 0){
                            $("#residence").prop("checked", true);
                        }
                    }
                    else{
                        alert("Please make sure the bar code you inputted is correct !");
                    }
                },
                error:function(x, t){
                    if(x.status==401)
                        alert("Your session has expired please refresh or login again!");
                }
            });
        }
        }
    );

    $("#retrieve").click(function () {

        //var $post = {};
        //$post.utorid = $('#utorid').val();

        if (!$('#utorid').val() && !$('#tcard').val()){
            alert("Please fill in the correct utorid or barcode to retrieve the student information!");
        }
        //console.log($('#tcard').val().trim());
        if ($('#tcard').val()){
            $.ajax({
                type: "GET",
                url: BASE_URL + "student/" + ($('#tcard').val().trim()),
                //data: $post,
                data:{variable:'value'},
                dataType: 'json',
                success: function (data) {
                    if (data.student) {
                        //alert(data['student'].toSource());

                        $("#utorid").val(data.student.utorid);
                        $("#utorid").prop("disabled", true);
                        $("#tcard").prop("disabled", true);
                        $("#inter").prop("checked", false);
                        $("#residence").prop("checked", false);
                        $("#first").val(data.student.givennames);
                        $("#last").val(data.student.familyname);
                        $("#email").val(data.student.email);
                        $("#email").prop("disabled", true);
                        var s = data.student.roleID;
                        if (s.indexOf('3414') >= 0 || s.indexOf('3349') >= 0 || s.indexOf('3416') >= 0 ||  s.indexOf('3417') >= 0){
                            $("#inter").prop("checked", true);
                        }
                        if (s.indexOf('2270') >= 0){
                            $("#residence").prop("checked", true);
                        }
                    }
                    else{
                        alert("Please make sure the bar code you inputted is correct !");
                    }
                },
                error:function(x, t){
                    if(x.status==401)
                        alert("Your session has expired please refresh or login again!");
                }
            });
        }
        else {

            $.ajax({
                type: "GET",
                url: BASE_URL + "student/" + ($('#utorid').val()),
                //data: $post,
                data: {variable: 'value'},
                dataType: 'json',
                success: function (data) {
                    if (data.student) {
                        //alert(data['student'].toSource());
                        if (data.student.barcode){
                            $("#tcard").val(data.student.barcode);
                            $("#tcard").prop("disabled", true);
                        }
                        $("#utorid").prop("disabled", true);

                        $("#inter").prop("checked", false);
                        $("#residence").prop("checked", false);
                        $("#first").val(data.student.givennames);
                        $("#last").val(data.student.familyname);
                        $("#email").val(data.student.email);
                        $("#email").prop("disabled", true);
                        var s = data.student.roleID;
                        if (s.indexOf('3414') >= 0 || s.indexOf('3349') >= 0 || s.indexOf('3416') >= 0 || s.indexOf('3417') >= 0) {
                            $("#inter").prop("checked", true);
                        }
                        if (s.indexOf('2270') >= 0) {
                            $("#residence").prop("checked", true);
                        }
                    }
                    else {
                        alert("Please make sure the utorid or bar code you inputted is correct !");
                    }
                },
                error: function (x, t) {
                    if (x.status == 401)
                        alert("Your session has expired please refresh or login again!");
                }
            });
        }
    })
});

function AddOption(){

    if($("#value_plan").is(":selected")){
        $("#amount").prop("disabled", true);
        $("#dynamic_selection").empty();
        $("#dynamic_selection").append(
            "<select id='selection1' name='selection1' style='width: 150px'>" +
            "<option value='1'>January</option>" +
            "<option value='2'>February</option>" +
            "<option value='3'>March</option>" +
            "<option value='4'>April</option>" +
            "<option value='5'>May</option>" +
            "<option value='6'>June</option>" +
            "<option value='7'>July</option>" +
            "<option value='8'>August</option>" +
            "<option value='9'>September</option>" +
            "<option value='10'>October</option>" +
            "<option value='11'>November</option>" +
            "<option value='12'>December</option>" +
            "</select>"
        );
        $("#amount").val("295.00");
        $("#total").val( (295 + parseFloat($('#amount_tb').val())).toFixed(2).toString());
    }
    else if ($("#seme_plan").is(":selected")){
        $("#amount").prop("disabled", true);
        $("#dynamic_selection").empty();
        $("#dynamic_selection").append(
            "<select id='selection2' name='selection2' style='width: 150px'>" +
            "<option value='13'>Summer</option>" +
            "<option value='14'>Fall</option>" +
            "<option value='15'>Winter</option>" +
            "</select>"
        );
        $("#amount").val("1333.00");
        $("#total").val( (1333 + parseFloat($('#amount_tb').val())).toFixed(2).toString());
    }
    else if ($("#lite_plan").is(":selected") || $("#reg_plan").is(":selected")){
        $("#amount").prop("disabled", true);
        $("#dynamic_selection").empty();
        if ($("#lite_plan").is(":selected")){
            $("#amount").val("2413.00");
            $("#total").val( (2413 + parseFloat($('#amount_tb').val())).toFixed(2).toString());
        }
        else{
            $("#amount").val("3284.00");
            $("#total").val( (3284 + parseFloat($('#amount_tb').val())).toFixed(2).toString());
        }
    }
    else{
        $("#amount").prop("disabled", false);
        $("#dynamic_selection").empty();
        $("#dynamic_selection").append(
            "<input id='other_f' name='other_f' type='text' />"
        );
        $("#amount").val("0");
        $("#total").val( (0 + parseFloat($('#amount_tb').val())).toFixed(2).toString());
    }
}





function is_Email(field) {
    var retval = false;
    var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    retval = filter.test(field);
    if(!retval)
        return false;
    return true;
}

function EmailValidation(email) {
    if (!is_Email(email)) {
        return false;
    }
    return true;
}

/**
 * This function is used when both saving and submitting.
 * When saving in collects all the data on the form and sends to the APIController
 * When submitting it does the same thing but it also does error handling on the form 
 * @param event used to figure out if the user selected save or submit using the data.route property
 * @returns false if any info is on the form is empty and the user selected submit
 */


function SubmitDocument(event){
	if (event.data.route == "submit" && ($('#utorid').val().trim() == "" || $('#first').val().trim() == "") || $('#email').val().trim() == "" || $('#last').val().trim() == ""
        || $('#tcard').val().trim() == "") {
		utils.showMessage("danger", "please fill in all the required fields");
		
		window.scrollTo(0, 0);
		return false;
	}

    if ((! $('#value_plan').is(":checked")) && (! $('#seme_plan').is(":checked")) && (! $('#lite_plan').is(":checked")) && 
        (! $('#reg_plan').is(":checked")) && (! $('#other').is(":checked")) ) {
        utils.showMessage("danger", "please select at least one item");
        
        window.scrollTo(0, 0);
        return false;
    }

    if ((! $('#visa').is(":checked")) && (! $('#master').is(":checked")) && (! $('#debit').is(":checked")) && 
        (! $('#express').is(":checked")) && (! $('#cash').is(":checked")) && (! $('#other_p').is(":checked"))) {
        utils.showMessage("danger", "please select at least one type of payment");
        
        window.scrollTo(0, 0);
        return false;
    }

    if (( $('#other').is(":checked")) && ($('#other_f').val() == "")){
         utils.showMessage("danger", "You selected other item, please write some comment about this other item");
        
        window.scrollTo(0, 0);
        return false;

    }

    if (( $('#other_p').is(":checked")) && ($('#other_pf').val() == "")) {
        utils.showMessage("danger", "You selected other type of payment, please write some comment about this other type of payment");

        window.scrollTo(0, 0);
        return false;

    }
    if ( ! EmailValidation($('#email').val().trim())){
        utils.showMessage("danger", "The email you entered invalid");

        window.scrollTo(0, 0);
        return false;
    }

    if ($("#total").val().trim() != $("#total_pay").val().trim() ){
        utils.showMessage("danger", "Please fill in correct amount for each payment method");

        window.scrollTo(0, 0);
        return false;
    }

	var $form = $("<form action='" + BASE_URL + "api/" + event.data.route +"' method='POST'>");
	var $utorid = $("<input type='hidden' name='utorid'>").attr("value", $('#utorid').val());
	var $first = $("<input type='hidden' name='first'>").attr("value", $('#first').val());
	var $last = $("<input type='hidden' name='last'>").attr("value", $('#last').val());
	var $tcard = $("<input type='hidden' name='tcard'>").attr("value", $('#tcard').val());
	var $email = $("<input type='hidden' name='email'>").attr("value", $('#email').val());
    if($('#residence').is(":checked")){
        var $residence = $("<input type='hidden' name='residence'>").attr("value", 1);
    }
    else{
        var $residence = $("<input type='hidden' name='residence'>").attr("value", 0);
    }
    if($('#green').is(":checked")){
        var $green = $("<input type='hidden' name='green'>").attr("value", 1);
    }
    else{
        var $green = $("<input type='hidden' name='green'>").attr("value", 0);
    }
    if($('#inter').is(":checked")){
        var $inter = $("<input type='hidden' name='inter'>").attr("value", 1);
    }
    else{
        var $inter = $("<input type='hidden' name='inter'>").attr("value", 0);
    }
    if($('#value_plan').is(":checked")){
        var $meal_id = $("<input type='hidden' name='meal_id'>").attr("value", $('#value_plan').val());
        var $meal_detail = $("<input type='hidden' name='meal_detail'>").attr("value", $('#selection1').val());
    }
    if($('#seme_plan').is(":checked")){
        var $meal_id = $("<input type='hidden' name='meal_id'>").attr("value", $('#seme_plan').val());
        var $meal_detail = $("<input type='hidden' name='meal_detail'>").attr("value", $('#selection2').val());
    }
    if($('#lite_plan').is(":checked")){
        var $meal_id = $("<input type='hidden' name='meal_id'>").attr("value", $('#lite_plan').val());
        var $meal_detail = $("<input type='hidden' name='meal_detail'>").attr("value", '16');
    }
    if($('#reg_plan').is(":checked")){
        var $meal_id = $("<input type='hidden' name='meal_id'>").attr("value", $('#reg_plan').val());
        var $meal_detail = $("<input type='hidden' name='meal_detail'>").attr("value", '16');
    }
    if($('#other').is(":checked")){
        var $meal_id = $("<input type='hidden' name='meal_id'>").attr("value", $('#other').val());
        var $other_meal = $("<input type='hidden' name='other_meal'>").attr("value", $('#other_f').val());
    }

    if($('#other_p').is(":checked")){
        var $other_pay = $("<input type='hidden' name='other_pay'>").attr("value", $('#other_pf').val());
    }
    var $plan_amount = $("<input type='hidden' name='plan_amount'>").attr("value", $('#amount').val());
    var $additional_buck = $("<input type='hidden' name='additional_buck'>").attr("value", $('#amount_tb').val());
    var $comment = $("<input type='hidden' name='comment'>").attr("value", $('#comment').val());
    var $order = $("<input type='hidden' name='order'>").attr("value", $('#order').val());

    if ($('#visa_add').val()){
        var $visa_amount = $("<input type='hidden' name='visa_amount'>").attr("value", $('#visa_add').val());
    }

    if ($('#master_add').val()){
        var $master_amount = $("<input type='hidden' name='master_amount'>").attr("value", $('#master_add').val());
    }

    if ($('#debit_add').val()){
        var $debit_amount = $("<input type='hidden' name='debit_amount'>").attr("value", $('#debit_add').val());
    }

    if ($('#express_add').val()){
        var $express_amount = $("<input type='hidden' name='express_amount'>").attr("value", $('#express_add').val());
    }

    if ($('#cash_add').val()){
        var $cash_amount = $("<input type='hidden' name='cash_amount'>").attr("value", $('#cash_add').val());
    }

    if ($('#other_add').val()){
        var $other_amount = $("<input type='hidden' name='other_amount'>").attr("value", $('#other_add').val());
    }

	//console.log($('#submitted_id').val());
	$form.append($utorid);
	$form.append($first);
	$form.append($last);
	$form.append($tcard);
	$form.append($email);
	$form.append($meal_id);
	$form.append($meal_detail);
    $form.append($residence);
    $form.append($green);
    $form.append($inter);
    //$form.append($pay_id);
    $form.append($other_meal);
    $form.append($other_pay);
    $form.append($plan_amount);
    $form.append($additional_buck);
    $form.append($comment);
    $form.append($order);

    $form.append($visa_amount);
    $form.append($master_amount);
    $form.append($debit_amount);
    $form.append($express_amount);
    $form.append($cash_amount);
    $form.append($other_amount);

	var $token = $("<input type='hidden' name='_token'>").attr("value", TOKEN);
	$form.append($token);

	$('body').append($form);
	$form.submit();
}
