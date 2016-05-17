$(document).ready(function() {

    $(".editable_textarea").editable('', {
        type   : 'textarea',
        submitdata: { _method: "put" },
        select : true,
        submit : 'save',
        cssclass : "editable"
    });

    $("#tcard_report").tablesorter();

    $('tr').click(function(){
        var $curRow = $(this).closest('tr');
        $curRow.after('<tr>...</tr>');
    });

    function addType(id) {
        var part = "";

        $.ajax({
            type: "GET",
            async: false,
            url: BASE_URL + "pay/" + id,
            dataType:'json',
            success: function (pay) {
                if (pay.pays) {

                    for (var pay_i in pay.pays){
                        //console.log(pay.pays[pay_i].visa);

                        if (pay.pays[pay_i].visa){
                            part = part +  "Visa, ";
                        }
                        if (pay.pays[pay_i].master){
                            part = part +  "Master, ";
                        }
                        if (pay.pays[pay_i].debit){
                            part = part +  "Debit, ";
                        }
                        if (pay.pays[pay_i].express){
                            part = part +  "American Express, ";
                        }
                        if (pay.pays[pay_i].cash){
                            part = part +  "Cash, ";
                        }
                        if (pay.pays[pay_i].other){
                            part = part +  "Other, ";
                        }

                    }

                }

            }

        });

        return part;
    }

    var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    };
    var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: { days: 60 },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-sm btn-primary',
        cancelClass: 'btn-sm',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
        }
    };
    var optionSet2 = {
        startDate: moment().subtract(7, 'days'),
        endDate: moment(),
        opens: 'left',
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    };
    $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
    $('#reportrange').daterangepicker(optionSet1, cb);
    $('#reportrange').on('show.daterangepicker', function() { console.log("show event fired"); });
    $('#reportrange').on('hide.daterangepicker', function() { console.log("hide event fired"); });
    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are "
            + picker.startDate.format('MM-DD-YYYY')
            + " to "
            + picker.endDate.format('MM-DD-YYYY')
        );
        $.ajax({
            type: "GET",
            url: BASE_URL + "report/" + (picker.startDate.format('YYYY-MM-DD') + " " + picker.endDate.format('YYYY-MM-DD')),
            dataType: 'json',
            success: function (data) {
                if (data.orders) {
                    //$('#tcard_report tbody').empty();
                    $('#tabless').empty();
                    var tablehead = '';
                    tablehead += '<table class="table table-striped table-bordered table-hover tablesorter" width="744" id="tcard_report" spellcheck="false">';
                    tablehead += '<thead><tr> <th>Order#</th> <th>First</th> <th>Last</th> <th>Utorid</th> <th>Barcode#</th> <th>Eamil</th> <th>Residence</th> <th>GreenPath/Other</th> <th>International</th> <th>Item Name</th> <th>Item Detail</th>  <th>Meal Plan Total</th> <th>Additional TBucks</th> <th>Total</th> <th>Time / Date</th>';
                    tablehead += '<th>Type of Payment</th> <th>Comment</th> <th>Details</th> <th style="display: none">order_id</th> </tr></thead><tbody>';
                    //$('#tabless').append()
                    //$('#tabless').append(tablehead);
                    var trHTML ='';
                  for (var order in  data.orders){
                        trHTML += '<tr><td><div class="editable_textarea" id="div_1">' +  data.orders[order].order_num +
                        '</div></td><td>' + data.orders[order].first +
                        '</td><td>' + data.orders[order].last +
                        '</td><td>' + data.orders[order].utorid+
                        '</td><td>' + data.orders[order].tnumber +

                        '</td><td>' + data.orders[order].email;
                      if (data.orders[order].residence == 1){
                          trHTML +='</td><td>' + 'YES' ;

                      }
                      else if (data.orders[order].residence == 0){
                          trHTML +='</td><td>' + 'NO' ;
                      }

                      if (data.orders[order].greenpath_other == 1){
                          trHTML +='</td><td>' + 'YES' ;

                      }
                      else if (data.orders[order].greenpath_other == 0){
                          trHTML +='</td><td>' + 'NO' ;
                      }


                      if (data.orders[order].international == 1){
                          trHTML +='</td><td>' + 'YES' ;

                      }
                      else if (data.orders[order].international == 0){
                          trHTML +='</td><td>' + 'NO' ;
                      }


                      if (data.orders[order].meal_id == 1){
                          trHTML +='</td><td>' + 'Meal Plan Value' ;

                      }
                      else if (data.orders[order].meal_id == 2){
                          trHTML +='</td><td>' + 'Meal Plan Semester' ;
                      }
                      else if (data.orders[order].meal_id == 3){
                          trHTML +='</td><td>' + 'Meal Plan Lite' ;
                      }
                      else if (data.orders[order].meal_id == 4){
                          trHTML +='</td><td>' + 'Meal Plan Regular' ;
                      }
                      else if (data.orders[order].meal_id == 5){
                          trHTML +='</td><td>' + 'Other' ;
                      }

                    if (data.orders[order].meal_detail_id == 1){
                        trHTML +='</td><td>'+ 'January';
                      }
                    else if (data.orders[order].meal_detail_id == 2){
                        trHTML +='</td><td>'+ 'February';
                    }
                    else if (data.orders[order].meal_detail_id == 3){
                        trHTML +='</td><td>'+ 'March';
                    }
                    else if (data.orders[order].meal_detail_id == 4){
                        trHTML +='</td><td>'+ 'April';
                    }
                    else if (data.orders[order].meal_detail_id == 5){
                        trHTML +='</td><td>'+ 'May';
                    }
                    else if (data.orders[order].meal_detail_id == 6){
                        trHTML +='</td><td>'+ 'June';
                    }
                    else if (data.orders[order].meal_detail_id == 7){
                        trHTML +='</td><td>'+ 'July';
                    }
                    else if (data.orders[order].meal_detail_id == 8){
                        trHTML +='</td><td>'+ 'August';
                    }
                    else if (data.orders[order].meal_detail_id == 9){
                        trHTML +='</td><td>'+ 'September';
                    }
                    else if (data.orders[order].meal_detail_id == 10){
                        trHTML +='</td><td>'+ 'October';
                    }
                    else if (data.orders[order].meal_detail_id == 11){
                        trHTML +='</td><td>'+ 'November';
                    }
                    else if (data.orders[order].meal_detail_id == 12){
                        trHTML +='</td><td>'+ 'December';
                    }
                    else if (data.orders[order].meal_detail_id == 13){
                        trHTML +='</td><td>'+ 'Summer';
                    }
                    else if (data.orders[order].meal_detail_id == 14){
                        trHTML +='</td><td>'+ 'Fall';
                    }
                    else if (data.orders[order].meal_detail_id == 15){
                        trHTML +='</td><td>'+ 'Winter';
                    }
                    else if (data.orders[order].meal_detail_id == 16){
                        trHTML +='</td><td>'+ 'Fall and Winter';
                    }
                    else{
                        trHTML +='</td><td>'+data.orders[order].other_meal;
                    }
                      trHTML += '</td><td>' +'$'+ addCommas(parseFloat(data.orders[order].meal_plan_amount).toFixed(2)).toString();
                      trHTML += '</td><td>' +'$'+ addCommas(parseFloat(data.orders[order].additional_tbuck).toFixed(2)).toString();
                      trHTML += '</td><td>' +'$'+ addCommas((parseFloat(data.orders[order].meal_plan_amount) + parseFloat(data.orders[order].additional_tbuck)).toFixed(2)).toString();
                      trHTML += '</td><td>' + data.orders[order].created_date;
                      trHTML += '</td><td>';
                      trHTML += addType(data.orders[order].id);
                      trHTML = trHTML.substring(0,trHTML.length - 2);
                      //console.log(trHTML);
                      if (data.orders[order].comment){
                          trHTML +='</td><td class="editable_textarea" id="div_2">' + data.orders[order].comment + '</td>';}
                      else{
                          trHTML +='</td><td> N / A</td>';
                      }
                      var url = BASE_URL + "detail/" + (data.orders[order].id);
                      trHTML +='</td><td><a href="' + url + '"' + '>Details';
                      trHTML +='</a></td><td class="id_need" style="display: none">'+ data.orders[order].id+'</td></tr>';
                    }
                    tablehead += trHTML;
                    var tabletail = '';
                    tabletail += '</tbody></table>';
                    tablehead += tabletail;

                    $('#tabless').append(tablehead);

                    $("#exportcsv").attr("href", BASE_URL + 'exportcsvrange/'+(picker.startDate.format('YYYY-MM-DD') + " " + picker.endDate.format('YYYY-MM-DD')));


                    //$('#tabless').append(tabletail);

                    $("#tcard_report").tablesorter();
                    $(".editable_textarea").editable('', {
                        type   : 'textarea',
                        submitdata: { _method: "put" },
                        select : true,
                        submit : 'save',
                        cssclass : "editable"
                    });
                }
                else{
                    alert("Please select a valid time range !");
                }
            },
            error:function(x, t){
                if(x.status==401)
                    alert("Your session has expired please refresh or login again!");
            }
        });

    });
    $('#reportrange').on('cancel.daterangepicker', function(ev, picker) { console.log("cancel event fired"); });

    $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);

//                });
});

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}


/*
 +-----------------------------------------------------------------------+
 | Copyright (c) 2006-2007 Mika Tuupola, Dylan Verheul                   |
 | All rights reserved.                                                  |
 |                                                                       |
 | Redistribution and use in source and binary forms, with or without    |
 | modification, are permitted provided that the following conditions    |
 | are met:                                                              |
 |                                                                       |
 | o Redistributions of source code must retain the above copyright      |
 |   notice, this list of conditions and the following disclaimer.       |
 | o Redistributions in binary form must reproduce the above copyright   |
 |   notice, this list of conditions and the following disclaimer in the |
 |   documentation and/or other materials provided with the distribution.|
 |                                                                       |
 | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS   |
 | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT     |
 | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR |
 | A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT  |
 | OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, |
 | SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT      |
 | LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, |
 | DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY |
 | THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT   |
 | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE |
 | OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.  |
 |                                                                       |
 +-----------------------------------------------------------------------+
 */

/* $Id: jquery.jeditable.js 235 2007-09-25 08:34:09Z tuupola $ */

/**
 * jQuery inplace editor plugin (version 1.4.2)
 *
 * Based on editable by Dylan Verheul <dylan@dyve.net>
 * http://www.dyve.net/jquery/?editable
 *
 * @name  jEditable
 * @type  jQuery
 * @param String  target             POST URL or function name to send edited content
 * @param Hash    options            additional options
 * @param String  options[name]      POST parameter name of edited content
 * @param String  options[id]        POST parameter name of edited div id
 * @param Hash    options[submitdata] Extra parameters to send when submitting edited content.
 * @param String  options[type]      text, textarea or select
 * @param Integer options[rows]      number of rows if using textarea
 * @param Integer options[cols]      number of columns if using textarea
 * @param Mixed   options[height]    'auto', 'none' or height in pixels
 * @param Mixed   options[width]     'auto', 'none' or width in pixels
 * @param String  options[loadurl]   URL to fetch external content before editing
 * @param String  options[loadtype]  Request type for load url. Should be GET or POST.
 * @param String  options[loadtext]  Text to display while loading external content.
 * @param Hash    options[loaddata]  Extra parameters to pass when fetching content before editing.
 * @param String  options[data]      Or content given as paramameter.
 * @param String  options[indicator] indicator html to show when saving
 * @param String  options[tooltip]   optional tooltip text via title attribute
 * @param String  options[event]     jQuery event such as 'click' of 'dblclick'
 * @param String  options[onblur]    'cancel', 'submit' or 'ignore'
 * @param String  options[submit]    submit button value, empty means no button
 * @param String  options[cancel]    cancel button value, empty means no button
 * @param String  options[cssclass]  CSS class to apply to input form. 'inherit' to copy from parent.
 * @param String  options[style]     Style to apply to input form 'inherit' to copy from parent.
 * @param String  options[select]    true or false, when true text is highlighted
 *
 */

(function($) {

    $.fn.editable = function(target, options) {

        if ('disable' == target) {
            $(this).data('disabled.editable', true);
            return;
        }
        if ('enable' == target) {
            $(this).data('disabled.editable', false);
            return;
        }
        if ('destroy' == target) {
            $(this)
                .unbind($(this).data('event.editable'))
                .removeData('disabled.editable')
                .removeData('event.editable');
            return;
        }

        var settings = $.extend({}, $.fn.editable.defaults, {target:target}, options);

        /* setup some functions */
        var plugin   = $.editable.types[settings.type].plugin || function() { };
        var submit   = $.editable.types[settings.type].submit || function() { };
        var buttons  = $.editable.types[settings.type].buttons
            || $.editable.types['defaults'].buttons;
        var content  = $.editable.types[settings.type].content
            || $.editable.types['defaults'].content;
        var element  = $.editable.types[settings.type].element
            || $.editable.types['defaults'].element;
        var reset    = $.editable.types[settings.type].reset
            || $.editable.types['defaults'].reset;
        var callback = settings.callback || function() { };
        var onedit   = settings.onedit   || function() { };
        var onsubmit = settings.onsubmit || function() { };
        var onreset  = settings.onreset  || function() { };
        var onerror  = settings.onerror  || reset;

        /* Show tooltip. */
        if (settings.tooltip) {
            $(this).attr('title', settings.tooltip);
        }

        settings.autowidth  = 'auto' == settings.width;
        settings.autoheight = 'auto' == settings.height;

        return this.each(function() {

            /* Save this to self because this changes when scope changes. */
            var self = this;

            /* Inlined block elements lose their width and height after first edit. */
            /* Save them for later use as workaround. */
            var savedwidth  = $(self).width();
            var savedheight = $(self).height();

            /* Save so it can be later used by $.editable('destroy') */
            $(this).data('event.editable', settings.event);

            /* If element is empty add something clickable (if requested) */
            if (!$.trim($(this).html())) {
                $(this).html(settings.placeholder);
            }

            $(this).bind(settings.event, function(e) {

                /* Abort if element is disabled. */
                if (true === $(this).data('disabled.editable')) {
                    return;
                }

                /* Prevent throwing an exeption if edit field is clicked again. */
                if (self.editing) {
                    return;
                }

                /* Abort if onedit hook returns false. */
                if (false === onedit.apply(this, [settings, self])) {
                    return;
                }

                /* Prevent default action and bubbling. */
                e.preventDefault();
                e.stopPropagation();

                /* Remove tooltip. */
                if (settings.tooltip) {
                    $(self).removeAttr('title');
                }

                /* Figure out how wide and tall we are, saved width and height. */
                /* Workaround for http://dev.jquery.com/ticket/2190 */
                if (0 == $(self).width()) {
                    settings.width  = savedwidth;
                    settings.height = savedheight;
                } else {
                    if (settings.width != 'none') {
                        settings.width =
                            settings.autowidth ? $(self).width()  : settings.width;
                    }
                    if (settings.height != 'none') {
                        settings.height =
                            settings.autoheight ? $(self).height() : settings.height;
                    }
                }

                /* Remove placeholder text, replace is here because of IE. */
                if ($(this).html().toLowerCase().replace(/(;|"|\/)/g, '') ==
                    settings.placeholder.toLowerCase().replace(/(;|"|\/)/g, '')) {
                    $(this).html('');
                }

                self.editing    = true;
                self.revert     = $(self).html();
                $(self).html('');

                /* Create the form object. */
                var form = $('<form />');

                /* Apply css or style or both. */
                if (settings.cssclass) {
                    if ('inherit' == settings.cssclass) {
                        form.attr('class', $(self).attr('class'));
                    } else {
                        form.attr('class', settings.cssclass);
                    }
                }

                if (settings.style) {
                    if ('inherit' == settings.style) {
                        form.attr('style', $(self).attr('style'));
                        /* IE needs the second line or display wont be inherited. */
                        form.css('display', $(self).css('display'));
                    } else {
                        form.attr('style', settings.style);
                    }
                }

                /* Add main input element to form and store it in input. */
                var input = element.apply(form, [settings, self]);

                /* Set input content via POST, GET, given data or existing value. */
                var input_content;

                if (settings.loadurl) {
                    var t = setTimeout(function() {
                        input.disabled = true;
                        content.apply(form, [settings.loadtext, settings, self]);
                    }, 100);

                    var loaddata = {};
                    loaddata[settings.id] = self.id;
                    if ($.isFunction(settings.loaddata)) {
                        $.extend(loaddata, settings.loaddata.apply(self, [self.revert, settings]));
                    } else {
                        $.extend(loaddata, settings.loaddata);
                    }
                    $.ajax({
                        type : settings.loadtype,
                        url  : settings.loadurl,
                        data : loaddata,
                        async : false,
                        success: function(result) {
                            window.clearTimeout(t);
                            input_content = result;
                            input.disabled = false;
                        }
                    });
                } else if (settings.data) {
                    input_content = settings.data;
                    if ($.isFunction(settings.data)) {
                        input_content = settings.data.apply(self, [self.revert, settings]);
                    }
                } else {
                    input_content = self.revert;
                }
                content.apply(form, [input_content, settings, self]);

                input.attr('name', settings.name);

                /* Add buttons to the form. */
                buttons.apply(form, [settings, self]);

                /* Add created form to self. */
                $(self).append(form);

                /* Attach 3rd party plugin if requested. */
                plugin.apply(form, [settings, self]);

                /* Focus to first visible form element. */
                $(':input:visible:enabled:first', form).focus();

                /* Highlight input contents when requested. */
                if (settings.select) {
                    input.select();
                }

                /* discard changes if pressing esc */
                input.keydown(function(e) {
                    if (e.keyCode == 27) {
                        e.preventDefault();
                        reset.apply(form, [settings, self]);
                    }
                });

                /* Discard, submit or nothing with changes when clicking outside. */
                /* Do nothing is usable when navigating with tab. */
                var t;
                if ('cancel' == settings.onblur) {
                    input.blur(function(e) {
                        /* Prevent canceling if submit was clicked. */
                        t = setTimeout(function() {
                            reset.apply(form, [settings, self]);
                        }, 500);
                    });
                } else if ('submit' == settings.onblur) {
                    input.blur(function(e) {
                        /* Prevent double submit if submit was clicked. */
                        t = setTimeout(function() {
                            form.submit();
                        }, 200);
                    });
                } else if ($.isFunction(settings.onblur)) {
                    input.blur(function(e) {
                        settings.onblur.apply(self, [input.val(), settings]);
                    });
                } else {
                    input.blur(function(e) {
                        /* TODO: maybe something here */
                    });
                }

                form.submit(function(e) {

                    if (t) {
                        clearTimeout(t);
                    }

                    /* Do no submit. */
                    e.preventDefault();

                    /* Call before submit hook. */
                    /* If it returns false abort submitting. */
                    //if (false !== onsubmit.apply(form, [settings, self])) {
                        /* Custom inputs call before submit hook. */
                        /* If it returns false abort submitting. */
                        //if (false !== submit.apply(form, [settings, self])) {

                            /* Check if given target is function */
                            //if ($.isFunction(settings.target)) {
                            //    var str = settings.target.apply(self, [input.val(), settings]);
                            //    $(self).html(str);
                            //    self.editing = false;
                            //    callback.apply(self, [self.innerHTML, settings]);
                            //    if (!$.trim($(self).html())) {
                            //        $(self).html(settings.placeholder);
                            //    }
                            //} else {
                                if ($(self).attr('id') == 'div_1' ) {
                                    //var regex = new RegExp("^[a-zA-Z0-9]+$");
                                    //if (regex.test(input.val())) {
                                        $.ajax({
                                            type: "GET",
                                            url: BASE_URL + "update/" + ($(this).closest('tr').children('td.id_need').text()),
                                            data:{'order_num': input.val()},
                                            //data:{variable:'value'},
                                            //dataType: 'json',
                                            success: function (response) {
                                                //alert($(this).toSource());
                                                alert("order number has beed updated successfully ");
                                                //$(this).closest('tr').children('td.div_1').html(input.val());
                                                window.location.reload();
                                            },
                                            error: function (x, t) {
                                                if (x.status == 401)
                                                    alert("Your session has expired please refresh or login again!");
                                            }
                                        });
                                    }
                                    //
                                    //}
                                //}

                                else{
                                    //var regex = new RegExp("^[a-zA-Z0-9]+$");
                                    //if (regex.test(input.val())) {
                                        $.ajax({
                                            type: "GET",
                                            url: BASE_URL + "updatecomment/" + ($(this).closest('tr').children('td.id_need').text()),
                                            data:{'comment': input.val()},
                                            //data:{variable:'value'},
                                            //dataType: 'json',
                                            success: function (response) {
                                                //alert($(this).toSource());
                                                alert("comment has been updated successfully ");
                                                //$(this).closest('tr').children('td.div_1').html(input.val());
                                                window.location.reload();
                                            },
                                            error: function (x, t) {
                                                if (x.status == 401)
                                                    alert("Your session has expired please refresh or login again!");
                                            }
                                        });
                                    //}
                                    //else {
                                    //
                                    //    e.preventDefault();
                                    //    alert("Only Alphanumeric values are allowed for order number");
                                    //    return false;
                                    //}

                                }


                        //}
                    //}

                    /* Show tooltip again. */
                    $(self).attr('title', settings.tooltip);

                    return false;
                });
            });

            /* Privileged methods */
            this.reset = function(form) {
                /* Prevent calling reset twice when blurring. */
                if (this.editing) {
                    /* Before reset hook, if it returns false abort reseting. */
                    if (false !== onreset.apply(form, [settings, self])) {
                        $(self).html(self.revert);
                        self.editing   = false;
                        if (!$.trim($(self).html())) {
                            $(self).html(settings.placeholder);
                        }
                        /* Show tooltip again. */
                        if (settings.tooltip) {
                            $(self).attr('title', settings.tooltip);
                        }
                    }
                }
            };
        });

    };


    $.editable = {
        types: {
            defaults: {
                element : function(settings, original) {
                    var input = $('<input type="hidden"></input>');
                    $(this).append(input);
                    return(input);
                },
                content : function(string, settings, original) {
                    $(':input:first', this).val(string);
                },
                reset : function(settings, original) {
                    original.reset(this);
                },
                buttons : function(settings, original) {
                    var form = this;
                    if (settings.submit) {
                        /* If given html string use that. */
                        if (settings.submit.match(/>$/)) {
                            var submit = $(settings.submit).click(function() {
                                if (submit.attr("type") != "submit") {
                                    form.submit();
                                }
                            });
                            /* Otherwise use button with given string as text. */
                        } else {
                            var submit = $('<button type="submit" />');
                            submit.html(settings.submit);
                        }
                        $(this).append(submit);
                    }
                    if (settings.cancel) {
                        /* If given html string use that. */
                        if (settings.cancel.match(/>$/)) {
                            var cancel = $(settings.cancel);
                            /* otherwise use button with given string as text */
                        } else {
                            var cancel = $('<button type="cancel" />');
                            cancel.html(settings.cancel);
                        }
                        $(this).append(cancel);

                        $(cancel).click(function(event) {
                            if ($.isFunction($.editable.types[settings.type].reset)) {
                                var reset = $.editable.types[settings.type].reset;
                            } else {
                                var reset = $.editable.types['defaults'].reset;
                            }
                            reset.apply(form, [settings, original]);
                            return false;
                        });
                    }
                }
            },
            text: {
                element : function(settings, original) {
                    var input = $('<input />');
                    if (settings.width  != 'none') { input.attr('width', settings.width);  }
                    if (settings.height != 'none') { input.attr('height', settings.height); }
                    /* https://bugzilla.mozilla.org/show_bug.cgi?id=236791 */
                    //input[0].setAttribute('autocomplete','off');
                    input.attr('autocomplete','off');
                    $(this).append(input);
                    return(input);
                }
            },
            textarea: {
                element : function(settings, original) {
                    var textarea = $('<textarea />');
                    if (settings.rows) {
                        textarea.attr('rows', settings.rows);
                    } else if (settings.height != "none") {
                        textarea.height(settings.height);
                    }
                    if (settings.cols) {
                        textarea.attr('cols', settings.cols);
                    } else if (settings.width != "none") {
                        textarea.width(settings.width);
                    }
                    textarea.width(55);
                    $(this).append(textarea);
                    return(textarea);
                }
            },
            select: {
                element : function(settings, original) {
                    var select = $('<select />');
                    $(this).append(select);
                    return(select);
                },
                content : function(data, settings, original) {
                    /* If it is string assume it is json. */
                    if (String == data.constructor) {
                        eval ('var json = ' + data);
                    } else {
                        /* Otherwise assume it is a hash already. */
                        var json = data;
                    }
                    for (var key in json) {
                        if (!json.hasOwnProperty(key)) {
                            continue;
                        }
                        if ('selected' == key) {
                            continue;
                        }
                        var option = $('<option />').val(key).append(json[key]);
                        $('select', this).append(option);
                    }
                    /* Loop option again to set selected. IE needed this... */
                    $('select', this).children().each(function() {
                        if ($(this).val() == json['selected'] ||
                            $(this).text() == $.trim(original.revert)) {
                            $(this).attr('selected', 'selected');
                        }
                    });
                    /* Submit on change if no submit button defined. */
                    if (!settings.submit) {
                        var form = this;
                        $('select', this).change(function() {
                            form.submit();
                        });
                    }
                }
            }
        },

        /* Add new input type */
        addInputType: function(name, input) {
            $.editable.types[name] = input;
        }
    };

    /* Publicly accessible defaults. */
    $.fn.editable.defaults = {
        name       : 'value',
        id         : 'id',
        type       : 'text',
        width      : 'auto',
        height     : 'auto',
        event      : 'click.editable',
        onblur     : 'cancel',
        loadtype   : 'GET',
        loadtext   : 'Loading...',
        placeholder: 'N / A',
        loaddata   : {},
        submitdata : {},
        ajaxoptions: {}
    };

})(jQuery);


