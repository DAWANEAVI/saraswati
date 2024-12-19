
var base_url = "http://oesmouda.com/";

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                    .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$("#dob").on("change", function () {
    var mdate = $(this).val().toString();
    var yearThen = parseInt(mdate.substring(6, 10), 10);
    var monthThen = parseInt(mdate.substring(3, 5), 10);
    var dayThen = parseInt(mdate.substring(0, 2), 10);
    var today = new Date();
    var birthday = new Date(yearThen, monthThen - 1, dayThen);

    var differenceInMilisecond = today.valueOf() - birthday.valueOf();

    var year_age = Math.floor(differenceInMilisecond / 31536000000);
    var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);



    var month_age = Math.floor(day_age / 30);

    day_age = day_age % 30;

    if (isNaN(year_age) || isNaN(month_age) || isNaN(day_age)) {
        $("#exact_age").text("Invalid birthday - Please try again!");
    } else {
        $("#age").val(year_age + " years " + month_age + " months ");
    }
});

$("#onservice").on("click", function () {
    if (!$(this).is(':checked')) {
        $("#office_address_phone_no").prop('disabled', true);
    } else {
        $("#office_address_phone_no").prop('disabled', false);
    }
});

$("#class").on('change', function () {
    var class_val = $(this).val();
    var data = "class_id=" + class_val;
    var section_select = $("#section");
    var option = parseInt($(this).find(":selected").text());
    if(option>=1 && option<=8){
        $("#rte_applicable").prop('disabled',false);
    }else{
        $("#rte_applicable").prop('disabled',true);
    }
    $(section_select).empty();
    $.ajax({
        url: base_url + 'section/getSectionByClass',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            console.log(obj);
            $(section_select).append($("<option></option>").attr('value', '').text("Select Section"));
            jQuery.each(obj, function (index, item) {
                $(section_select).append($("<option></option>")
                        .attr("value", item.section_id)
                        .text(item.section_name));
            });
        },
        error: function (data) {
            console.log(data);
            alert("unable To Fetch Section Please Check Section In Class");
        }
    });
});
$("#section").on('change', function () {
    var section = $(this).val();
    var data = "section_id=" + section + "&class_id=" + $("#class").val();
    var student_select = $("#student");
    $(student_select).empty();
    $.ajax({
        url: base_url + 'student/getStudentByClassAndSection',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            $(student_select).append($("<option></option>").attr('value', '').text("Select Student"));
            jQuery.each(obj, function (index, item) {
                $(student_select).append($("<option></option>")
                        .attr("value", item.student_id)
                        .text(item.fullname));
            });
        },
        error: function (data) {
            alert("unable To Fetch Student Please Check Section And  Class");
        }
    });
});

$("#student").on('change', function () {
    var student_id = $(this).val();
    var data = "student_id=" + student_id;
    var total_amount = $("#total_amount");
    var remaining_amount = $("#paid_amount");
    var btn = $(".box-footer");
    $(btn).empty();
    var str = '<a type="submit" href="' + base_url + 'payment/make_payment/' + student_id + '" class="btn btn-success btn-raised" style="color:#FFF;"><i class="fa fa-check"></i>Proceed To Pay</a>';
    $.ajax({
        url: base_url + 'payment/getPaymentByStudent',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            var old_fees = parseInt(obj.old_fees || 0);
            var paid_fees = parseInt(obj.paid_fees || 0);
            
            console.log(obj);
            $(total_amount).val(parseInt(obj.total) + parseInt(old_fees)-parseInt(paid_fees));

            $(remaining_amount).val(parseInt(obj.total) + parseInt(old_fees)-parseInt(paid_fees) - obj.paid);
            var remaining = parseInt(obj.total) + parseInt(old_fees)-parseInt(paid_fees);
            console.log(remaining > 0);
            if (parseInt(remaining) > 0) {
                $(btn).append(str);
            } else {
                alert("No Fees Remaining");
            }
        },
        error: function (data) {
            alert("unable To Fetch Data");
        }
    });
});

$(".amount").on('change', function () {
    var element = $(".amount");
    var total = 0
    $.each(element, function (index, item) {
        total = total + parseInt($(item).val() || 0);
    });
    $("#total").val(total)
});


$("#class_p").on('change', function () {
    var class_val = $(this).val();
    var data = "class_id=" + class_val;
    var section_select = $("#section_p");
    $(section_select).empty();
    $.ajax({
        url: base_url + 'section/getSectionByClass',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            $(section_select).append($("<option></option>").attr('value', '').text("Select Section"));
            jQuery.each(obj, function (index, item) {
                $(section_select).append($("<option></option>")
                        .attr("value", item.section_id)
                        .text(item.section_name));
            });
        },
        error: function (data) {
            alert("unable To Fetch Section Please Check Section In Class");
        }
    });
});
$("#section_p").on('change', function () {
    var section = $(this).val();
    var data = "section_id=" + section + "&class_id=" + $("#class_p").val();
    var student_select = $("#table-student tbody");
    $(student_select).empty();
    $.ajax({
        url: base_url + 'student/getStudentByClassAndSection',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            console.log(obj);
            console.log(obj);
            var count = 1;
            jQuery.each(obj, function (index, item) {
                $(student_select).append("<tr><td>" + count + "</td><td>" + item.fullname + "</td><td>" + item.mobile_no + "</td><td><input type='checkbox' class='student' name='stud[]' value='" + item.student_id + "'></td></tr>");
                count++;
            });
        },
        error: function (data) {
            alert("unable To Fetch Student Please Check Section And  Class");
        }
    });

});



$("#class_new").on('change', function () {
    var class_val = $(this).val();
    var data = "class_id=" + class_val;
    var section_select = $("#section_new");
    $(section_select).empty();
    $.ajax({
        url: base_url + 'section/getSectionByClass',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            $(section_select).append($("<option></option>").attr('value', '').text("Select Section"));
            jQuery.each(obj, function (index, item) {
                $(section_select).append($("<option></option>")
                        .attr("value", item.section_id)
                        .text(item.section_name));
            });
        },
        error: function (data) {
            alert("unable To Fetch Section Please Check Section In Class");
        }
    });
});


$("#class_s").on('change', function () {
    var class_val = $(this).val();
    var data = "class_id=" + class_val;
    var section_select = $("#section_s");
    $(section_select).empty();
    $.ajax({
        url: base_url + 'section/getSectionByClass',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            $(section_select).append($("<option></option>").attr('value', '').text("Select Section"));
            jQuery.each(obj, function (index, item) {
                $(section_select).append($("<option></option>")
                        .attr("value", item.section_id)
                        .text(item.section_name));
            });
        },
        error: function (data) {
            alert("unable To Fetch Section Please Check Section In Class");
        }
    });
});
$("#section_s").on('change', function () {
    var section = $(this).val();
    var data = "section_id=" + section + "&class_id=" + $("#class_s").val();
    var student_select = $("#student_s");
    $(student_select).empty();
    $.ajax({
        url: base_url + 'student/getStudentByClassAndSection',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            $(student_select).append($("<option></option>").attr('value', '').text("Select Student"));
            jQuery.each(obj, function (index, item) {
                $(student_select).append($("<option></option>")
                        .attr("value", item.mobile_no)
                        .text(item.fullname));
            });
        },
        error: function (data) {
            alert("unable To Fetch Student Please Check Section And  Class");
        }
    });

});



$("#bulk_class").on('change', function () {
    var class_val = $(this).val();
    var data = 'class_id=' + class_val;
    var str = '';
    $.ajax({
        url: base_url + 'student/getStudentByClass',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            jQuery.each(obj, function (index, item) {
                str += "<tr><td><input type='checkbox' class='send_sms' data-mobile='" + item.mobile_no + "' /></td><td>" + item.fullname + "</td></tr>";
            });
            $("tbody").append(str);
        },
        error: function (data) {
            alert("unable To Fetch Student Please Check Section And  Class");
        }
    });

});





$("#class_leave").on('change', function () {
    var class_val = $(this).val();
    var data = "class_id=" + class_val;
    var section_select = $("#section_leave");
    $(section_select).empty();
    $.ajax({
        url: base_url + 'section/getSectionByClass',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            $(section_select).append($("<option></option>").attr('value', '').text("Select Section"));
            jQuery.each(obj, function (index, item) {
                $(section_select).append($("<option></option>")
                        .attr("value", item.section_id)
                        .text(item.section_name));
            });
        },
        error: function (data) {
            alert("unable To Fetch Section Please Check Section In Class");
        }
    });
});
$("#section_leave").on('change', function () {
    var section = $(this).val();
    var data = "section_id=" + section + "&class_id=" + $("#class_leave").val();
    var student_select = $("#student_leave");
    $(student_select).empty();
    $.ajax({
        url: base_url + 'student/getStudentByClassAndSection',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            console.log(obj);
            $(student_select).append($("<option></option>").attr('value', '').text("Select Student"));
            jQuery.each(obj, function (index, item) {
                $(student_select).append($("<option></option>")
                        .attr("value", item.student_id)
                        .text(item.fullname));
            });
        },
        error: function (data) {
            alert("unable To Fetch Student Please Check Section And  Class");
        }
    });

});

$("#student_leave").on('change', function () {
    var student_id = $(this).val();
    var data = "student_id=" + student_id;
    $.ajax({
        url: base_url + 'student/getStudentById',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            console.log(obj);
            var res = obj.fullname.split(" ");
            $("#fullname_stud").val(obj.fullname);
            $("#father").val(obj.father_name);
            $("#mother_name").val(obj.mother_full_name);
            $("#place_of_birth").val(obj.place_of_birth);
            $("#saral_id").val(obj.saral_id);
            $("#academic_year").val(obj.academic_year);
            $("#surname").val(res[2]);
        },
        error: function (data) {
            alert("unable To Fetch Data");
        }
    });
});

$("#stud-report").on('click', function () {
    var class_id = $("#class").val();
    var section_id = $("#section").val();
    var data = "class_id=" + class_id + "&section_id=" + section_id;

    $.ajax({
        url: base_url + 'report/getStudent',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            $.each(obj, function (index, item) {
                console.log(obj);
                dtable.row.add(obj);
            });

        },
        error: function (data) {
            alert("unable To Fetch Data");
        }
    });

    if ($("#data-table-all")[0]) {
        $("#data-table-all").DataTable({
            autoWidth: !1,
            responsive: !0,
            lengthMenu: [
                [-1],
                ["Everything"]
            ],
            language: {
                searchPlaceholder: "Search for records..."
            },
            sDom: '<"dataTables__top"lfB>rt<"dataTables__bottom"ip><"clear">',
            buttons: [{
                    extend: "excelHtml5",
                    title: "OXFORD ENGLISH SCHOOL"
                }, {
                    extend: "csvHtml5",
                    title: "OXFORD ENGLISH SCHOOL"
                }, {
                    extend: "print",
                    title: "OXFORD ENGLISH SCHOOL"
                }],
            initComplete: function (a, b) {
                $(this).closest(".dataTables_wrapper").find(".dataTables__top").prepend('<div class="dataTables_buttons hidden-sm-down actions"><span class="actions__item zmdi zmdi-print" data-table-action="print" /><span class="actions__item zmdi zmdi-fullscreen" data-table-action="fullscreen" /><div class="dropdown actions__item"><i data-toggle="dropdown" class="zmdi zmdi-download" /><ul class="dropdown-menu dropdown-menu-right"><a href="" class="dropdown-item" data-table-action="excel">Excel (.xlsx)</a><a href="" class="dropdown-item" data-table-action="csv">CSV (.csv)</a></ul></div></div>')
            }
        }),
                $(".dataTables_filter input[type=search]").focus(function () {
            $(this).closest(".dataTables_filter").addClass("dataTables_filter--toggled")
        }), $(".dataTables_filter input[type=search]").blur(function () {
            $(this).closest(".dataTables_filter").removeClass("dataTables_filter--toggled")
        }), $("body").on("click", "[data-table-action]", function (a) {
            a.preventDefault();
            var b = $(this).data("table-action");
            if ("excel" === b && $(this).closest(".dataTables_wrapper").find(".buttons-excel").trigger("click"), "csv" === b && $(this).closest(".dataTables_wrapper").find(".buttons-csv").trigger("click"), "print" === b && $(this).closest(".dataTables_wrapper").find(".buttons-print").trigger("click"), "fullscreen" === b) {
                var c = $(this).closest(".card");
                c.hasClass("card--fullscreen") ? (c.removeClass("card--fullscreen"), $("body").removeClass("data-table-toggled")) : (c.addClass("card--fullscreen"), $("body").addClass("data-table-toggled"))
            }
        })
    }

});



$('#check_all').change(function () {
    if ($(this).is(":checked")) {
        var allcheck = $("tbody").find(".send_sms");
        jQuery.each(allcheck, function (index, item) {
            $(item).attr('checked', 'checked');
        });

    } else {
        var allcheck = $("tbody").find(".send_sms");
        jQuery.each(allcheck, function (index, item) {
            $(item).removeAttr('checked');
            ;
        });
    }
});
$('#check_all_student').change(function () {
    if ($(this).is(":checked")) {
        var allcheck = $("tbody").find(".student");
        jQuery.each(allcheck, function (index, item) {
            $(item).attr('checked', 'checked');
        });

    } else {
        var allcheck = $("tbody").find(".student");
        jQuery.each(allcheck, function (index, item) {
            $(item).removeAttr('checked');
            ;
        });
    }
});

$("#check-all").on('click', function (e) {
    e.preventDefault();
    var allcheck = $("tbody").find(".student");
    jQuery.each(allcheck, function (index, item) {
        $(item).attr('checked', 'checked');
        ;
    });
});


function increamentSmsCounter(count){
     $.ajax({
            url: base_url + 'sms/increamentCounter',
            type: 'POST',
            dataType: "html",
            data:'sms='+count,
            success: function (data) {
                var obj = JSON.parse(data);
                
            },
            error: function (data) {
                alert("unable To Fetch Data");
            }
        });
}

function check() {
    var page_name = $("#page_name").val();
    if (page_name = "view_and_sms") {
        var mobile = $("#mobile").val();
        var msg = $("#msg").val();
        $.ajax({
            url: 'http://49.50.67.32/smsapi/httpapi.jsp?username=oxfesmtr&password=oxfesmtr&from=OXFESM&to=' + mobile + '&text=' + msg + '&coding=0',
            type: 'GET',
            dataType: "jsonp",
            crossDomain: true,
            success: function () {

            }
        });
    }
   increamentSmsCounter(1); 
}

$("#send_sms").on('click', function (e) {
    e.preventDefault();
    var msg = $("#sms-text").val();
    var student_s = $("#student_s").val();
    console.log(msg+' '+student_s);
    if (msg != '' && student_s != '') {
        $.ajax({
            url: 'http://49.50.67.32/smsapi/httpapi.jsp?username=oxfesmtr&password=oxfesmtr&from=OXFESM&to=' + student_s + '&text=' + msg + '&coding=0',
            type: 'GET',
            dataType: "jsonp",
            crossDomain: true,
            success: function () {

            }
        });
        alert("Message Sent Successfully.");
        $("form").trigger("reset");
    } else {
        alert("Please Enter Message and Select Student");
    }
increamentSmsCounter(1); 
});
$("#send_sms_all").on('click', function (e) {
    e.preventDefault();
   
    var count = 0;
    var msg = $("#sms-text").val();
    if (msg != '') {

        $.ajax({
            url: base_url + 'student/getActiveStudent',
            type: 'POST',
            dataType: "html",
            success: function (data) {
                var obj = JSON.parse(data);
                $.each(obj, function (index, item) {
                     var text = $("#sms-text").val();
                    $.ajax({
                        url: 'http://49.50.67.32/smsapi/httpapi.jsp?username=oxfesmtr&password=oxfesmtr&from=OXFESM&to=' + item.mobile_no + '&text=' + text + '&coding=0',
                        type: 'GET',
                        dataType: "jsonp",
                        crossDomain: true,
                        success: function () {

                        }
                    });
                    count++;
                });
                if(count>0){
                    
                }
            },
            error: function (data) {
                alert("unable To Fetch Data");
            }
        });



    } else {
        alert("Please Enter Message and Select Class");
    }
    if (count > 0) {
        increamentSmsCounter(count); 
        alert(count + " SMS Send");
        window.location = base_url + 'sms/sendBulk';
    }

});
$("#send_sms_bulk").on('click', function (e) {
    e.preventDefault();
    var msg = $("#sms-text").val();
    var class_id = $("#bulk_class").val();
    if (msg != '' && class_id != '') {

        var allcheck = $("tbody").find(".send_sms");
        var count = 0;
        jQuery.each(allcheck, function (index, item) {
            if ($(item).is(":checked")) {
                var mobile_no = $(item).data('mobile');
                $.ajax({
                    url: 'http://49.50.67.32/smsapi/httpapi.jsp?username=oxfesmtr&password=oxfesmtr&from=OXFESM&to=' + mobile_no + '&text=' + msg + '&coding=0',
                    type: 'GET',
                    dataType: "jsonp",
                    crossDomain: true,
                    success: function (data) {

                    },
                    error: function (response) {
                        count++;
                    },
                });
                count++;
            }

        });
    } else {
        alert("Please Enter Message and Select Class");
    }
    if (count > 0) {
        increamentSmsCounter(count);
        alert(count + " SMS Send");
    }

});

$("#showonhome").on('change',function(){
    var flag = $(this).val();
   if(flag==0){
       $("#image").attr("multiple",'true');
   }else{
       $("#image").removeAttr('multiple','false');
   }
})