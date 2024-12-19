//----------- production -----------------
//var base_url = "https://littlebirdschooldarwha.in/";

//----------- development ----------------
var base_url = 'http://localhost/saraswati/';

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function get_exams_by_class() {
    var class_id = $("#class_p").val();
    var session_id = $("#session_id").val();
    //var data = "class_id=" + class_id + "&session_id=" + $("#session_id").val();
    //alert(class_id);
    $('#examID').empty();
    //$(section_class).empty();

    // Construct request data as an object
    var data = {
        class_id: class_id,
        session_id: session_id
    };

    $.ajax({
        url: base_url + 'Exam_acadamicExams/get_exams_by_class_session',
        type: 'GET',
        dataType: "json",
        data: data,
        success: function (response) {
           // var obj = JSON.parse(data);
            console.log(response);
            $('#examID').append($("<option></option>").attr('value', '').text("Select Exam"));
            jQuery.each(response, function (index, item) {
                $('#examID').append($("<option></option>")
                        .attr("value", item.examID)
                        .text(item.examName));
            });
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error: ", status, error);
            alert("unable To Fetch Exam Please Check");
        }
    });
}
/*function get_exams_by_class() {
    var class_id = $("#class_p").val();
    
    var data = "class_id=" + class_id + "&session_id=" + $("#session_id").val();
    //alert(class_id);
    $('#examID').empty();
    //$(section_class).empty();
    $.ajax({
        url: base_url + 'Exam_acadamicExams/get_exams_by_class_session',
        type: 'GET',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            console.log(obj);
            $('#examID').append($("<option></option>").attr('value', '').text("Select Exam"));
            jQuery.each(obj, function (index, item) {
                $('#examID').append($("<option></option>")
                        .attr("value", item.examID)
                        .text(item.examName));
            });
        },
        error: function (data) {
            alert("unable To Fetch Exam Please Check");
        }
    });
}*/


$("#dob").on("change", function () {
    var mdate = $(this).val().toString();
    var yearThen = parseInt(mdate.substring(0, 4), 10);
    var monthThen = parseInt(mdate.substring(6, 7), 10);
    var dayThen = parseInt(mdate.substring(9, 10), 10);
    var today = new Date();
    var birthday = new Date(yearThen, monthThen - 1, dayThen);
    // console.log(mdate);
    // console.log(yearThen);
    // console.log(monthThen);
    // console.log(dayThen);
    // console.log(today);
    // console.log(birthday);

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

$('#check_all_field').change(function () {
    if ($(this).is(":checked")) {
        var allcheck = $(".form-group").find(".field");
        jQuery.each(allcheck, function (index, item) {
            $(item).attr('checked', 'checked');
        });

    } else {
        var allcheck = $(".form-group").find(".field");
        jQuery.each(allcheck, function (index, item) {
            $(item).removeAttr('checked');
        });
    }
});

$("#class").on('change', function () {
    var class_val = $(this).val();
    var data = "class_id=" + class_val;
    var section_select = $("#section");
    var option = parseInt($(this).find(":selected").text());
    if (option >= 1 && option <= 8) {
        $("#rte_applicable").prop('disabled', false);
    } else {
        $("#rte_applicable").prop('disabled', true);
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

function studentSelect(param) {
    switch (param) {
        case 1:
            var x = document.getElementById("student").value ? document.getElementById("student").value : null;
            var route = base_url + 'payment/add?student_id=value';
            if(x){
                route = route.replace('value', x);
                window.location = route;
            }

            break;
        case 2:
            var x = document.getElementById("student").value ? document.getElementById("student").value : null;
            var route = base_url + 'payment/heads?student_id=value';
            if(x){
                route = route.replace('value', x);
                window.location = route;
            }

        break;

        case 3:
            var x = document.getElementById("student").value ? document.getElementById("student").value : null;
            var route = base_url + 'bonafide/add?student_id=value';
            if(x){
                route = route.replace('value', x);
                window.location = route;
            }

        break;

        case 4:
            var x = document.getElementById("exHeadID").value ? document.getElementById("exHeadID").value : null;
            var y = document.getElementById("class_p").value ? document.getElementById("class_p").value : null;
            var z = document.getElementById("session_id").value ? document.getElementById("session_id").value : null;
            var route = base_url + 'Exam_studentPapers/add?exHeadID=value&class_id=value2&session_id=value3';
            if(x){
                route = route.replace('value', x);
                route = route.replace('value2', y);
                route = route.replace('value3', z);
                window.location = route;
            }

        break;
       case 5:
            var x = document.getElementById("session_id").value ? document.getElementById("session_id").value : null;
            var y = document.getElementById("class_id").value ? document.getElementById("class_id").value : null;
            var z = document.getElementById("student_id").value ? document.getElementById("student_id").value : null;
            
            var route = base_url + 'Payment_concession/add?session_id=value&class_id=value2&student_id=value3';
            if(x && y && z){
                route = route.replace('value', x);
                route = route.replace('value2', y);
                route = route.replace('value3', z);
                window.location = route;
            }
            break;
        case 6:
            var x = document.getElementById("session_id").value ? document.getElementById("session_id").value : null;
            var route = base_url + 'Payment_concession/index?session_id=value';
            if(x){
                route = route.replace('value', x);
                window.location = route;
            }
            break;
        case 7:
            var x = document.getElementById("template_id").value ? document.getElementById("template_id").value : null;
            var redirectTo = document.getElementById("redirectTo").value ? document.getElementById("redirectTo").value : null;
            var route = base_url + 'sms/'+redirectTo+'?template_id=value';
            if(x){
                route = route.replace('value', x);
                window.location = route;
            }
        break;
    
    
        default:
            break;
    }
    
}

function getExamClass() {
    var exam_val = $("#examID").val();
    var data = "examID=" + exam_val + "&session_id=" + $("#session_id").val();
    var section_class = $("#class_p");
    $(section_class).empty();
    $.ajax({
        url: base_url + 'Exam_studentPapers/getClassByExamHead',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            console.log(obj);
            $(section_class).append($("<option></option>").attr('value', '').text("Select Class"));
            jQuery.each(obj, function (index, item) {
                $(section_class).append($("<option></option>")
                        .attr("value", item.class_id)
                        .text(item.numeric_name));
            });
        },
        error: function (data) {
            alert("unable To Fetch Class Please Check");
        }
    });
}

// $("#student").on('change', function () {
//     var student_id = $(this).val();
//     var data = "student_id=" + student_id;
//     var total_amount = $("#total_amount");
//     var remaining_amount = $("#paid_amount");
//     var btn = $(".box-footer");
//     $(btn).empty();
//     var str = '<a type="submit" href="' + base_url + 'payment/make_payment/' + student_id + '" class="btn btn-success btn-raised" style="color:#FFF;"><i class="fa fa-check"></i>Proceed To Pay</a>';
//     $.ajax({
//         url: base_url + 'payment/getPaymentByStudent',
//         type: 'POST',
//         dataType: "html",
//         data: data,
//         success: function (data) {
//             var obj = JSON.parse(data);
//             var old_fees = parseInt(obj.old_fees || 0);
//             var paid_fees = parseInt(obj.paid_fees || 0);

//             console.log(obj);
//             $(total_amount).val(parseInt(obj.total) + parseInt(old_fees) - parseInt(paid_fees));

//             $(remaining_amount).val(parseInt(obj.total) + parseInt(old_fees) - parseInt(paid_fees) - obj.paid);
//             var remaining = parseInt(obj.total) + parseInt(old_fees) - parseInt(paid_fees);
//             console.log(remaining > 0);
//             if (parseInt(remaining) > 0) {
//                 $(btn).append(str);
//             } else {
//                 alert("No Fees Remaining");
//             }
//         },
//         error: function (data) {
//             alert("unable To Fetch Data");
//         }
//     });
// });

//Payment
$("#student").on('change', function () {
    var student_id = $(this).val();
    var data = { student_id: student_id }; // Using an object for better readability
    var total_amount = $("#total_amount");
    var remaining_amount = $("#paid_amount");
    var btnContainer = $(".box-footer");

    // Clear previous button
    btnContainer.empty();

    // "Proceed To Pay" button template
    var proceedButton = `
        <a href="${base_url}payment/make_payment/${student_id}" 
           class="btn btn-success btn-raised" style="color:#FFF;">
           <i class="fa fa-check"></i> Proceed To Pay
        </a>`;

    // AJAX Request
    $.ajax({
        url: base_url + 'payment/getPaymentByStudent',
        type: 'POST',
        dataType: "json", // Expect JSON response
        data: data,
        success: function (response) {
            // Safely parse the response
            var old_fees = parseInt(response.old_fees || 0);
            var paid_fees = parseInt(response.paid_fees || 0);
            var total = parseInt(response.total || 0);
            var paid = parseInt(response.paid || 0);

            // Calculate remaining and total amount
            var totalFees = total + old_fees - paid_fees;
            var remainingFees = totalFees - paid;

            // Update input fields
            total_amount.val(totalFees);
            remaining_amount.val(remainingFees);

            // Append "Proceed To Pay" button if fees remain
            if (remainingFees > 0) {
                btnContainer.append(proceedButton);
            } else {
                alert("No Fees Remaining for this student.");
            }
        },
        error: function (xhr, status, error) {
            console.error("Error Fetching Data:", status, error);
            alert("Unable to fetch data. Please try again later.");
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

function input_validation(student_id){
    if(parseInt($('#obtainedMarks'+student_id).val())< 0 || parseInt($('#obtainedMarks'+student_id).val()) > parseInt($('#totalMarks').val())){
        //alert(typeof(parseInt($('#obtainedMarks'+student_id).val())));
        $('.span'+student_id).empty();
        $('.span'+student_id).html("<lable class='error' >Please Enter Valid Marks</lable>");
    }else{
        $('.span'+student_id).empty();
    }
}

function selectAccessSubmodule(moduleID) {
if ($('.module'+moduleID).is(":checked")) {
    var allcheck = $("body").find('.submodule'+moduleID);
    jQuery.each(allcheck, function (index, item) {
        $(item).removeAttr('disabled');
    });
} else {
    var allcheck = $("body").find('.submodule'+moduleID);
    jQuery.each(allcheck, function (index, item) {
        $(item).attr('disabled', 'disabled');
    });
}
};

$("#class_p").on('change', function () {
    var class_val = $(this).val();
    var data = "class_id=" + class_val;
    var section_select = $("#section_o");
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

$("#section_o").on('change', function () {
    var section = $(this).val();
    var data = "section_id=" + section + "&class_id=" + $("#class_p").val()+'&session_id='+$('#academic_session').val();
    var student_select = $("#table-student tbody");
    $(student_select).empty();
    $.ajax({
        url: base_url + 'student/getStudentBySessionClassAndSection',
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
                        .attr("value", item.student_id)
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
    $("tbody").empty();
    $.ajax({
        url: base_url + 'student/getStudentByClass',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            jQuery.each(obj, function (index, item) {
                str += "<tr><td><input type='checkbox' class='send_sms' name='studentIDs[]' value='" + item.student_id + "' /></td><td>" + item.fullname + "</td><td>" + item.mobile_no + "</td></tr>";
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
                    title: "SARASWATI PUBLIC ENGLISH MEDIUM SCHOOL BABHULGAON"
                }, {
                    extend: "csvHtml5",
                    title: "SARASWATI PUBLIC ENGLISH MEDIUM SCHOOL BABHULGAON"
                }, {
                    extend: "print",
                    title: "SARASWATI PUBLIC ENGLISH MEDIUM SCHOOL BABHULGAON"
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
    //e.preventDefault();
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

$('#setCommonValues').change(function () {
    //alert("hi");
    //e.preventDefault();
    if ($(this).is(":checked")) {
        var first_val = $('.total_days_first').val() ? $('.total_days_first').val():0;
        //alert(first_val);
        var allcheck = $("tbody").find(".total_days");
        jQuery.each(allcheck, function (index, item) {
            $(item).val(first_val);
        });

    } else {
        var allcheck = $("tbody").find(".total_days");
        jQuery.each(allcheck, function (index, item) {
            $(item).val(0);
            $('.total_days_first').val(0);
            ;
        });
    }
});

function studentSubjectForPaper(subjectID) {

    if ($('.subject'+subjectID).is(":checked")) {
        $('.evaluation'+subjectID).removeAttr('disabled');
        $('.total_mark'+subjectID).removeAttr('disabled');
        $('.passing_mark'+subjectID).removeAttr('disabled');
        $('.date'+subjectID).removeAttr('disabled');
    } else {
        $('.evaluation'+subjectID).attr('disabled', 'disabled');
        $('.total_mark'+subjectID).attr('disabled', 'disabled');
        $('.passing_mark'+subjectID).attr('disabled', 'disabled');
        $('.date'+subjectID).attr('disabled', 'disabled');
    }
};

function studentSelectForWeight(student_id) {

    if ($('.student'+student_id).is(":checked")) {
        //$('.totalDays'+student_id).removeAttr('disabled');
        $('.attenDays'+student_id).removeAttr('disabled');
        $('.weights'+student_id).removeAttr('disabled');
        $('.heights'+student_id).removeAttr('disabled');
    } else {
        //$('.totalDays'+student_id).attr('disabled', 'disabled');
        $('.attenDays'+student_id).attr('disabled', 'disabled');
        $('.weights'+student_id).attr('disabled', 'disabled');
        $('.heights'+student_id).attr('disabled', 'disabled');
    }
};

function studentSelectForEvaluation(student_id) {

    if ($('.student'+student_id).is(":checked")) {
        $('.obtainedMarks'+student_id).removeAttr('disabled');
    } else {
        $('.obtainedMarks'+student_id).attr('disabled', 'disabled');
    }
};

$('#check_all_student_weight').change(function () {
    //e.preventDefault();
    if ($(this).is(":checked")) {
        // var allcheck = $("tbody").find(".student");
        // jQuery.each(allcheck, function (index, item) {
        //     $(item).attr('checked', 'checked');
        // });

        var allcheck = $("tbody").find(".student");
        jQuery.each(allcheck, function (index, item) {
            var student_id = $(item).val();
            $('.student'+student_id).attr('checked', 'checked');
            $('.totalDays'+student_id).removeAttr('disabled');
            $('.attenDays'+student_id).removeAttr('disabled');
            $('.weights'+student_id).removeAttr('disabled');
            $('.heights'+student_id).removeAttr('disabled');
        });


    } else {
        var allcheck = $("tbody").find(".student");
        jQuery.each(allcheck, function (index, item) {
            $(item).removeAttr('checked');
            var student_id = $(item).val();
            $('.totalDays'+student_id).attr('disabled', 'disabled');
            $('.attenDays'+student_id).attr('disabled', 'disabled');
            $('.weights'+student_id).attr('disabled', 'disabled');
            $('.heights'+student_id).attr('disabled', 'disabled');
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


function increamentSmsCounter(count) {
    
    $.ajax({
        url: base_url + 'sms/increamentCounter',
        type: 'POST',
        dataType: "html",
        data: 'sms=' + count,
        success: function (data) {
            var obj = JSON.parse(data);

        },
        error: function (data) {
            alert("unable To Fetch Data");
        }
    });
}
function check() {}

// function check() {
//     var page_name = $("#page_name").val();
//     if (page_name = "view_and_sms") {

//         var mobile = $("#mobile").val();
//         var msg = $("#msg").val();
        
//         $.ajax({
//             url: 'http://49.50.67.32/smsapi/httpapi.jsp?username=oxfesmtr&password=Abc@123&from=OXFESM&to=' + mobile + '&text=' + msg + '&pe_id=1201160284540914045&template_id=1207162244555441013&coding=0',
//             type: 'GET',
//             dataType: "jsonp",
//             crossDomain: true,
//             success: function (data) {
//             console.log(data);
//             }
//         });
//     }
//     increamentSmsCounter(1);
// }

// $("#send_sms").on('click', function (e) {
//     e.preventDefault();
//     var msg = $("#sms-text").val();
//     var student_s = $("#student_s").val();
//     var templete_id = $("#template_id").val();
//     console.log(msg + ' ' + student_s+' '+templete_id);
//     if (msg != '' && student_s != '' && templete_id != '') {
//         $.ajax({
//             url: 'http://49.50.67.32/smsapi/httpapi.jsp?username=oxfesmtr&password=Abc@123&from=OXFESM&to=' + student_s + '&text=' + msg + '&pe_id=1201160284540914045&template_id=' + templete_id + '&coding=0',
//             type: 'GET',
//             dataType: "jsonp",
//             crossDomain: true,
//             success: function () {

//             }
//         });
//         alert("Message Sent Successfully.");
//         $("form").trigger("reset");
//     } else {
//         alert("Please Enter Message and Select Student");
//     }
//     increamentSmsCounter(1);
// });

$(document).ready(function(){
$('#template_id').change(function(e){

e.preventDefault();                     
var template_id = $('#template_id').val();  

if(template_id !=''){
       if(template_id =='1207162244592146254'){
        // alert("hallo");
         $("#sms-text").val("Dear Parents, As per government rules and regulations all the classes are taken by online manner from date  XX-XX-XXXX. Please take a note. From : Oxford English School, Mouda");
       }
     
      if(template_id =='1207162244584844133'){
         $("#sms-text").val("Dear Parents, Please paid remaining old fees and regular fees as early as possible. Ignore if paid. From : Oxford English School, Mouda");
        }
    
      if(template_id =='1207162244579223311'){
         $("#sms-text").val("Dear Parents, We are kindly inform you that, there will be P.T.A. meeting held on XX-XX-XXXX at XX:XX From : Oxford English School, Mouda");
        }
      if(template_id =='1207162244565442941'){
         $("#sms-text").val("Dear Parents, As there is a public holiday on date XX-XX-XXXX school will remain close and all the services will reopen on the next day.  Please take a note. From : Oxford English School, Mouda");
        }

}

});
});
        
// $("#send_sms_all").on('click', function (e) {
//     e.preventDefault();

//     var count = 0;
//     var msg = $("#sms-text").val();
//     var template_id = $('#template_id').val(); 
//     if (msg != '' && templete_id != '') {

//         $.ajax({
//             url: base_url + 'student/getActiveStudent',
//             type: 'POST',
//             dataType: "html",
//             success: function (data) {
//                 var obj = JSON.parse(data);
//                 $.each(obj, function (index, item) {
//                     var text = $("#sms-text").val();
//                     $.ajax({
//                         url: 'http://49.50.67.32/smsapi/httpapi.jsp?username=oxfesmtr&password=Abc@123&from=OXFESM&to=' + item.mobile_no + '&text=' + text + '&pe_id=1201160284540914045&template_id=' + templete_id + '&coding=0',
//                         type: 'GET',
//                         dataType: "jsonp",
//                         crossDomain: true,
//                         success: function () {

//                         }
//                     });
//                     count++;
//                 });
//                 if (count > 0) {

//                 }
//             },
//             error: function (data) {
//                 alert("unable To Fetch Data");
//             }
//         });



//     } else {
//         alert("Please Enter Message and Select Class and Template");
//     }
//     if (count > 0) {
//         increamentSmsCounter(count);
//         alert(count + " SMS Send");
//         window.location = base_url + 'sms/sendBulk';
//     }

// });
// $("#send_sms_bulk").on('click', function (e) {
//     e.preventDefault();
//     var msg = $("#sms-text").val();
//     var class_id = $("#bulk_class").val();
//     var templete_id = $("#template_id").val();
//     if (msg != '' && class_id != '' && templete_id != '' ) {

//         var allcheck = $("tbody").find(".send_sms");
//         var count = 0;
//         jQuery.each(allcheck, function (index, item) {
//             if ($(item).is(":checked")) {
//                 var mobile_no = $(item).data('mobile');
//                 $.ajax({
//                     url: 'http://49.50.67.32/smsapi/httpapi.jsp?username=oxfesmtr&password=Abc@123&from=OXFESM&to=' + mobile_no + '&text=' + msg + '&pe_id=1201160284540914045&template_id=' + templete_id + '&coding=0',
//                     type: 'GET',
//                     dataType: "jsonp",
//                     crossDomain: true,
//                     success: function (data) {

//                     },
//                     error: function (response) {
//                         count++;
//                     },
//                 });
//                 count++;
//             }

//         });
//     } else {
//         alert("Please Enter Message and Select Class and Template ID");
//     }
//     if (count > 0) {
//         increamentSmsCounter(count);
//         alert(count + " SMS Send");
//     }

// });

$("#showonhome").on('change', function () {
    var flag = $(this).val();
    if (flag == 0) {
        $("#image").attr("multiple", 'true');
    } else {
        $("#image").removeAttr('multiple', 'false');
    }
});

$("#class_new").on('change', function () {
    var class_no = $(this).find(":selected").text();
    if (class_no == 1) {
        $("thead").find('th').eq(3).after('<td>RTE Applicable</td>');
        var stud = $(".student");
        var stud_id = [];
        $.each(stud,function(i,v){
            stud_id.push($(v).val());
            console.log($(v).val());
        })
       console.log(stud_id);
        if (stud.length > 0) {
            var count =0;
            $('#table-student tbody').find('tr').each(function () {
                $(this).find('td').eq(3).after('<td><input type="checkbox" name="rte_applicable[]" value="'+stud_id[count]+'"/></td>');
                count++;
            });
        } else {
            alert("Please Select Old Class and Section");
        }
    }
});

//Add Attendance

$("#class_a").on('change', function () {
    var class_val = $(this).val();
    var data = "class_id=" + class_val;
    var section_select = $("#section_a");
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


function check_attendance(session_id, class_id, section_id, date){
    var data = "session_id" + session_id + "class_id" + class_id + "section_id" + section_id + "date=" + date;
    var student_select = $("#table-student tbody");
    $(student_select).empty();
    $.ajax({
        url: base_url + 'attendance_student/add',
        type: 'POST',
        dataType: "html",
        data: data,
        success: function (data) {
            var obj = JSON.parse(data);
            console.log(obj);
            console.log(obj);
            var count = 1;
            jQuery.each(obj, function (index, item) {
                $(student_select).append("<tr><td>" + count + "</td><td>" + item.fullname + "</td><td><input type='checkbox' class='check_attendance' name='stud[]' value='" + item.student_id + "'></td></tr>");
                count++;
            });
        },
        error: function (data) {
            alert("unable To Fetch Student Please Check Section And  Class");
        }
    });
}

//Attendance report

function select_attendance_report_type(){
    if(this.document.getElementById('daily').checked){
        $('#show_date').show();
        $('#show_month').hide();
        this.document.getElementById('select_month').selectedIndex = 0;
    }else if(this.document.getElementById('monthly').checked){
        $('#show_month').show();
        $('#show_date').hide();
        this.document.getElementById('date_a').value = '';
    }else if(this.document.getElementById('yearly').checked){
        $('#show_month').hide();
        $('#show_date').hide();
        this.document.getElementById('date_a').value = '';
        this.document.getElementById('select_month').value = '';
    }                                                            
}

$("#select_month").on('change', function () {
    var month = $(this).val();
    var data = "section_id=" + $("#section_a").val() + "&class_id=" + $("#class_a").val()+'&session_id='+$('#acadamic_session').val()+'&month='+month;
    var student_select = $("#table-student tbody");
    $(student_select).empty();
    $.ajax({
        url: base_url + 'Report/students_attendance_report',
    //url: base_url + 'Report/students_attendance_report_by_month',
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

$("#date_a").on('change', function () {
    var date = $(this).val();
    var data = "date=" + date + "&class_id=" + $("#class_a").val() + "&section_id=" + $("#section_a").val() +'&session_id='+$('#acadamic_session').val();
    var student_select = $("#table-student tbody");
    $(student_select).empty();
    $.ajax({
        url: base_url + 'Report/students_attendance_report_by_date',
        //Controler URL
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


