<!-- app/views/layout/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YUPPIECHEF</title>

    {!! HTML::script(URL::to('/').'/js/custom.js') !!}

    {!! HTML::script(URL::to('/').'/jquery/jquery-1.12.4.js') !!}
    {!! HTML::script(URL::to('/').'/jquery/jquery-ui-1.12.1/jquery-ui.min.js') !!}
    {!! HTML::style(URL::to('/').'/jquery/jquery-ui-1.12.1/jquery-ui.min.css') !!}
    {!! HTML::script(URL::to('/').'/jquery/timepicker/js/jquery.timepicker.min.js') !!}
    {!! HTML::style(URL::to('/').'/jquery/timepicker/css/jquery.timepicker.min.css') !!}

    {!! HTML::script(URL::to('/').'/bootstrap/js/bootstrap.js') !!}
    {!! HTML::style(URL::to('/').'/bootstrap/css/bootstrap.min.css') !!}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>

    {!! HTML::script(URL::to('/').'/DataTables/media/js/jquery.dataTables.js') !!}
    {!! HTML::style(URL::to('/').'/DataTables/media/css/jquery.dataTables.min.css') !!}

    {!! HTML::script(URL::to('/').'/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
    {!! HTML::script(URL::to('/').'/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
    {!! HTML::style(URL::to('/').'/DataTables/extensions/Buttons/css/buttons.dataTables.min.css') !!}
    {!! HTML::script(URL::to('/').'/DataTables/extensions/Buttons/js/buttons.html5.js') !!}
    {!! HTML::script(URL::to('/').'/DataTables/extensions/Buttons/js/buttons.flash.js') !!}

    {!! HTML::script(URL::to('/').'/fullcalendar/js/moment.js') !!}
    {!! HTML::script(URL::to('/').'/fullcalendar/js/fullcalendar.min.js') !!}
    {!! HTML::style(URL::to('/').'/fullcalendar/css/fullcalendar.min.css') !!}

    {!! HTML::script(URL::to('/').'/ckeditor/ckeditor.js') !!}

    {!! HTML::script(URL::to('/').'/owl-carousel/owl.carousel.js') !!}
    {!! HTML::style(URL::to('/').'/owl-carousel/owl.carousel.css') !!}
    {!! HTML::style(URL::to('/').'/owl-carousel/owl.theme.css') !!}

    {!! HTML::style(URL::to('/').'/bootstrap-select/css/bootstrap-select.css') !!}
    {!! HTML::script(URL::to('/').'/bootstrap-select/js/bootstrap-select.js') !!}

    {!! HTML::style(URL::to('/').'/month-picker/src/MonthPicker.css') !!}
    {!! HTML::script(URL::to('/').'/month-picker/src/MonthPicker.js') !!}

    {!! HTML::style(URL::to('/').'/select2/css/select2.min.css') !!}
    {!! HTML::script(URL::to('/').'/select2/js/select2.full.min.js') !!}


    <style>
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            bottom: 0;
            background-color: #fffff;
            overflow-x: hidden;
            transition: 0.2s;
            padding-top: 40px;
        }
        .sidenav a {
            padding: 5px 5px 5px 20px;
            text-decoration: none;
            font-size: 12px;
            color: #818181;
            display: inline;
            transition: 0.3s;
        }
        .sidenav a:hover {
            color: #f1f1f1;
        }
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        #main {
            transition: margin-left .5s;
            padding: 16px;
        }
        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>

</head>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>
<body>
<div class="container-fluid">
    @if(!Auth::guest())
        <div class="row">
            <div class="col-md-12">
                <div style = "position: absolute;top: 0;left: 0;z-index: 1000;">
                    <!-- sidebar content -->
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        @include('layout.sidebar')
                    </div>
                    <div id="main">

                        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
                    </div>
                </div>

                <div class="header navbar">
                    @include('layout.header')
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            @if ( session()->has('success') )
                <div class="alert alert-success alert-dismissable" role="alert">{{ session()->get('success') }} <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button></div>
            @elseif ( session()->has('warning') )
                <div class="alert alert-warning alert-dismissable">{{ session()->get('warning') }}</div>
            @elseif ( session()->has('info') )
                <div class="alert alert-info alert-dismissable">{{ session()->get('info') }}</div>
            @elseif ( session()->has('danger') )
                <div class="alert alert-danger alert-dismissable">{{ session()->get('danger') }}</div>
            @endif
            @yield('content')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="footer">
                @include('layout.footer')
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    jQuery(document).ready(function() {
        jQuery('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'excelHtml5', footer: true}
            ],
            "aaSorting": [],
            'iDisplayLength': 100
        });
        jQuery('#reportDataTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'excelHtml5', footer: true}
            ],
            'iDisplayLength': 100
        });
        $("#eventCarousel").owlCarousel({
            jsonPath : '{!! URL::to('/') !!}/get-carousel-details',
            jsonSuccess : customDataSuccess,
            items : 3, //10 items above 1000px browser width
            navigation : true,
            navigationText: [
                "<i class='icon-chevron-left icon-white'><</i>",
                "<i class='icon-chevron-right icon-white'>></i>"
            ]
        });
        $("#event_id:not(:hidden)").select2();
        $("#client_id:not(:hidden)").select2();
        populateVenues();
    });
    function customDataSuccess(data){
        var content = "";
        for(var i in data){
            var courseName = data[i].title;
            content += generateCarouselCell(data[i]);
        }
        $("#eventCarousel").html(content);
    }
    //for editing venues on a selected city
    $("#city_id").on("change", function(e) { populateVenues(); })
    function populateVenues()
    {
        var val = $('#venue_id').val();
        $('#venue_id').find('option').remove().end();
        var city_id = $('#city_id option:selected').attr('value');
        var info = $.get("{{url('ajax-city-venue')}}"+"/"+city_id);
        info.done(function(data) {
            $('#venue_id').append('<option value="">None</option>');
            $('#venue_id').append('<option value="1">CP</option>');
            $.each(data,function(index,venueObj){
                $('#venue_id').append('<option value="'+venueObj.id+'">'+venueObj.name+'</option>');
            });
            $('#venue_id').val(val);
        });
        info.fail(function(){
        });
    }
    //for editing carousel
    function generateCarouselCell(data)
    {
        var strOutput = "";
        strOutput =  "<div class='owl-item' >" +
                "<div class='item col-md-offset-1' data-toggle='tooltip' title='"+data.notes+" '  >" +
                "<table class='table table-striped table-responsive table-bordered'>" +
                "<thead>" +
                "<tr bgcolor='" + data.backgroundColor +"'>" +
                "<th>" +
                "<font color='"+data.textColor+"'>" + data.title + "</font>";
        if (data.buttonVisible == true) {
            strOutput +=  "<button onclick = carouselEventClick('" + escape(data.eventId) + "','" + escape(data.notes) + "') class='pull-right glyphicon glyphicon-tag' style='background-color: Transparent;border: none; ' data-toggle='modal' data-target='#notesModal'></button> ";
        }
        strOutput +=   "</th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>" +
                "<tr>" +
                "<td>" +
                data.eventTime + " - " + data.eventEndTime +
                "<br>Venue Capacity : " + data.venueCapacity +
                "<br>Course Capacity : " + data.courseCapacity +
                "</td>" +
                "</tr>" +
                "<tr>" +
                "<td>" +
                "Booked : " + data.noBooked + "<br>"+
                "Available : " + data.availableSeats +
                "</td>" +
                "</tr>" +
                "</tbody>" +
                "</table>" +
                "</div>" +
                "</div>";
        return strOutput;
    }
    // for event notes click
    function carouselEventClick(eventId,notes)
    {
        jQuery("#modalEvent_id").val(unescape(eventId));
        jQuery("#modalNotes").val(unescape(notes));
    }
    //for datepicker
    $(function () {
        $('.datepicker').datepicker({dateFormat: 'dd/mm/yy'}) ;
    });
    //for timepicker
    $(function () {
        $('.timepicker').timepicker({timeFormat: 'HH:mm'});
    });
    //for booking events
    $('#course_id').on('change',function(e) {
        clearEventBookingInfo();
        getCourseEvents();
    });
    function getCourseEvents()
    {
        if($('#course_id.allEventOption').length)
        {
            //if allevent options control found, do not also populate
            return;
        }
        $('#event_id').find('option').remove().end();
        var course_id = $('#course_id option:selected').attr('value');
        var info = $.get("{{url('ajax-course-event')}}"+"/"+course_id);
        info.done(function(data) {
            $.each(data,function(index,eventObj){
                $('#event_id').append('<option value="'+eventObj.id+'">'+eventObj.description+'</option>');
            });
            getEventBookingInfo();
        });
        info.fail(function(){
            //alert('ok');
        });
    }
    $('#course_id.allEventOption').on('change',function(e) {
        $('#event_id').find('option').remove().end();
        var course_id = $('#course_id option:selected').attr('value');
        var info = $.get("{{url('ajax-course-event')}}"+"/"+course_id);
        info.done(function(data) {
            $('#event_id').append('<option value="0">All</option>');
            $.each(data,function(index,eventObj){
                $('#event_id').append('<option value="'+eventObj.id+'">'+eventObj.description+'</option>');
            });
        });
        info.fail(function(){
            //alert('ok');
        });
    });
    //for editing events details
    $("#event_id").on("change", function(e) { getEventBookingInfo(); })
    function getEventBookingInfo()
    {
        var event_id = $('#event_id option:selected').attr('value');
        var info = $.get("{{url('ajax-event-details')}}"+"/"+event_id);
        info.done(function(data) {
            data = JSON.parse(data);
            $('#city_id').val(data.cityName);
            $('#venue_id').val(data.venueName);
            $('#capacity').val(data.venueCapacity);
            $('#course_capacity').val(data.courseCapacity);
            $('#instructor_id').val(data.userInstructor);
            $('#available_openings').val(data.capacity);
        });
        info.fail(function(){
            //alert('ok');
        });
    }
    function clearEventBookingInfo()
    {
        $('#city_id').val("");
        $('#venue_id').val("");
        $('#capacity').val("");
        $('#course_capacity').val("");
        $('#instructor_id').val("");
        $('#available_openings').val("");
    }

    $( function() {
        $( "#clientAuto" ).autocomplete({
            minLength: 3,
            dataType: 'text',
            source: function (request, response) {
                $.ajax({
                    url: "{{URL('getClientData')}}",
                    data: {
                        clientAuto: jQuery("#clientAuto").val(),
                    },
                    error: function (data) { console.log('Error!'); },
                    success: function (data) {
                        response(JSON.parse(data));
                    }
                });
            },
            focus: function( event, ui ) {
                $( "#clientAuto" ).val( ui.item.label );
                return false;
            },
            select: function( event, ui ) {
                $( "#client_id" ).val( ui.item.id );
                $( "#clientAuto" ).val( ui.item.label );
                return false;
            }
        })
                .autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                    .append( "<div>" + item.label + " (t/a) " + item.name + "</div>" )
                    .appendTo( ul );
        };
    });
</script>
</body>
</html>