<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Map</title>
    <link rel="stylesheet" href="css/screen.css"/>

    <link rel="stylesheet" href="../assets/jqwidgets/styles/jqx.base.css" type="text/css"/>
    <link href="//netdna.bootstrapcdn.com/bootswatch/2.3.1/cerulean/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
    <script type="text/javascript" src="js/jquery.js"></script>

    <script src="js/underscore.js"></script>
    <script src="js/backbone.js"></script>
    <script type="text/javascript" src="../assets/jqwidgets/jqxcore.js"></script>

    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>

    <script type="text/javascript" src="http://openlayers.org/api/2.12/OpenLayers.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://github.com/epeli/underscore.string/raw/master/dist/underscore.string.min.js"></script>
    <script type="text/javascript" src="js/jquery.tabSlideOut.v1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <link rel="stylesheet" href="js/jquery.mCustomScrollbar.css"/>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>


</head>
<body>
<div id="vehicle-panel" style="line-height: 1; position: absolute; height: 150px; top: 0px; right: -3px;" class="slide-out-div">
    <div style="padding: 8px"><a href="vehicle.php">مدیریت خودرو ها</a> | <a href="driver.php">مدیریت راننده ها</a></div>

    <div style="height: 150px;padding-top:10px;padding-right: 10px">

        <p> <span for="city" style="width: 50px ;float:right;padding-top: 10px">
               استان
           </span><select class="span2">

                <option>تهران</option>

            </select></p>
        <p><span for="city" style="width: 50px ;float:right;padding-top: 10px">         شهر
           </span><select class="span2">

                <option>تهران</option>

            </select></p>
        <p><span for="city" style="width: 50px ;float:right;padding-top: 10px">مرکز
           </span><select class="span2">

                <option>سازمان امداد </option>

            </select></p>
    </div>
    <div style="height: 180px" class="panel-segment">
        <div class="panel-segment-header">
            <input type="text" id="vechicle_search" placeholder="جستجو"   />
        </div>
        <div style="height: 150px" class="panel-segment-content">
            <div id="vehicle_list"  style=" overflow: hidden; height:100%">


                <div class="list-wrapper" id="list">
                    <ul class="unstyled">

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 180px" class="panel-segment">
        <div class="panel-segment-header">
            <h4> اطلاعات خودرو</h4>

        </div>
        <div style="height: 150px" class="panel-segment-content">
            <div id="info_box"  style="overflow: hidden;height: 100%">
                <div class="content">

                </div>
            </div>
        </div>
    </div>



</div>
<div id="incident-panel" style="line-height: 1; position: absolute; height: 226px; top: 0px; left: -3px;" class="slide-out-div2">

    <div class="panel-segment">
        <div class="panel-segment-header">
<!--            <input type="text" class="span2" id="incident_search" placeholder="جستجو"   />-->
            <div id="toolbar"   style=" display: block;float: right ;margin-left: 10px">
                <ul class="unstyled">
                    <button type="button" id="insert_incident" class="btn btn-primary" data-toggle="button"><i class="icon-plus-sign icon-white"></i>سانحه </button>


                </ul>
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="panel-segment-content">
            <div id="incident_list" style="height: 100%;overflow: hidden">


                <!--    TODO : implement with accardions -->

                <div class="table-wrapper"  >
                    <table class="table table-condensed table-hover table-striped">
                        <thead>
                        <tr>
                            <th>شماره</th>
                            <th>نوع سانحه</th>
                            <th>تاریخ ثبت</th>

                        </tr>
                        </thead>
                        <tbody class="list_wrapper ">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <div class="panel-segment">
        <div class="panel-segment-header">
            <h4 style="padding: 0">اطلاعات سانحه</h4>
        </div>
        <div class="panel-segment-content">
            <div style="position: relative;height: 100%">
                <div class="info-content" style="top:-40px;left:0;right: 0;bottom: 0;position: absolute;">
                    <div id="incident_info_box" style="position: relative;height: 100%">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#info">جزییات</a></li>
                            <li style="display:none"><a href="#response" >پاسخ دهی</a></li>
                        </ul>
                        <div class="tab-content" style="top:40px;left:0;right: 0;bottom: 0;position: absolute;">

                            <div class="tab-pane active" id="info" style="height: 100%;overflow: hidden"></div>
                            <div class="tab-pane" id="response" style="display:none;height: 100%;overflow: hidden;position: relative">
                            <div class="clear-fix list-filter" >

                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="0">آزاد
                                </label>
                                <label class="checkbox inline">
                                    <input type="checkbox" id="inlineCheckbox2" value="3"> در ماموریت
                                </label>

                            </div>
                                <div class="incident-sug-list " id="incident-sug-list" >
                                    <ul id="content" class="unstyled">


                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div></div>

    </div>
</div>
</div>

<div id="incident_form"  class="overlay_list" style=" display: block;">

</div>

<!--<div id="vehicle_list" class="overlay_list" style=" display: block;">-->
<!--    <input type="text" id="vechicle_search" placeholder="جستجو"   />-->
<!--    <div id="list">-->
<!--        <ul class="unstyled">-->
<!---->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->



<script language="JavaScript">
    $('.nav-tabs').find('a').click(function(e){
        e.preventDefault();
        $(this).tab('show');
    })
</script>
<div style="line-height: 1; position: absolute;width:900px; height: 100%; top: 0px; left: 250px;" id="map" >

</div>
<script type="text/x-underscore-template" id="incident_form_template">
    <form class="well span8">
        <a class="close" href="#">&times;</a>
        <div class="row">
            <div class="span3">
                <label>طول جغرافیایی</label>
                <input type="text" class="span3" id="lat" placeholder="" value=<%= position.lat %> >
                <label>عرض جغرافیایی</label>
                <input type="text" class="span3" id="lon" placeholder=""  value=<%= position.lon %> >

                <label>نوع سانحه</label>
                <select id="type" name="type" class="span3">
                    <!-- TODO : incident Type Should Read From Server -->

                    <option value="1">تصادف</option>


                </select>
            </div>
            <div class="span5">
                <label>توضیحات</label>
                <textarea name="descript" id="descript" class="input-xlarge span5" rows="5"></textarea>
                <label>آدرس</label>
                <textarea name="address" id="address" class="input-xlarge span5" rows="5"><%= address %></textarea>
            </div>

            <button type="submit" class="btn btn-primary pull-right">ثبت</button>
        </div>
    </form>
</script>
<script type="text/x-underscore-template" id="info_table_template">
    <div class="info_table">

        <table class="table table-condensed table-hover">

            <tbody>
            <tr>
                <td >شماره سازمانی</td>
                <td><%= OID %></td>

            </tr>
            <tr>
                <td colspan="2" style=" text-align: center !important;"><button type="button"  class="order_btn btn btn-primary"><i class="icon-plus-sign icon-white"></i>ابلاغ ماموریت </button></td>


            </tr>
            <tr>
                <td>وضعیت</td>
                <td>
                    <% if( status.status_ID==undefined){%>
                        <span class="label label-success ">آزاد</span>
                    <% }
                    else{
                        if ( status.status_ID.indexOf('2')!==-1){ %>
                            <span class="label label-success ">آزاد</span>
                        <%}else{%>
                            <span class="label label-important ">در ماموریت</span>
                        <% }
                    } %>
                </td>
                <!-- TODO : Localization -->
            </tr>
            <tr>
                <td colspan="2" class="info-category"> اطلاعات آخرین موقعیت</td>


            </tr>


            <tr>
                <td>سرعت</td>
                <td><%= LonLat.speed %></td>

            </tr>



            <tr>
                <td>تاریخ</td>
                <td><%= LonLat.recivedate%></td>
            </tr>
            <tr>
                <td colspan="2" class="info-category">اطلاعات تماس</td>


            </tr>
            <tr>
                <td>راننده</td>
                <td><%=(driver)? driver.fullname:"نامشخص"%></td>
            </tr>
            <tr>
                <td>تلفن راننده</td>
                <td><%=(driver)? driver.phonenumber:"نامشخص"%></td>
            </tr>
            <tr>
                <td>تلفن خودرو</td>
                <td><%=(vphonenumber)? vphonenumber:"نامشخص"%></td>
            </tr>
            </tbody>
        </table>


    </div>

</script>
<script type="text/x-underscore-template" id="incidnet_info_table_template">
    <div class="info_table">

        <table class="table table-condensed table-hover">

            <tbody>
            <tr>
                <td>شماره</td>
                <td><%= ID %></td>

            </tr>
            <tr>
                <td>نوع سانحه</td>
                <td><%= (type=='accident')?"تصادف" :""%></td>
                <!-- TODO : Localization -->
            </tr>
            <tr>
                <td>تاریخ ثبت</td>
                <td><%= create_date%></td>
            </tr>
            <tr>
                <td >توضیحات</td>
                <td><%= descript%> </td>

            </tr>
            <tr>
                <td>آدرس</td>
                <td><%= address %></td>

            </tr>



            <!--            TODO-1 compelete this  -->
            </tbody>
        </table>


    </div>

</script>
<script type="text/x-underscore-template" id="vehicle_item_template">
    <div class="vehicle_item ">

        <a href="#"><%= OID %></a>
        <span class="vehicle-type"><% if(type=='ambulance'){%>آمبولانس<%}%></span>
        <span class="vehicle-type"><%= distance %></span>

    </div>

</script>
<script type="text/x-underscore-template" id="suggestion_item_template">


    <div class="vehicle_item ">

        <a href="#"><%= OID %></a>
        <span class="vehicle-type"><% if(type=='ambulance'){%>آمبولانس<%}%></span>
        <span class="vehicle-type"><%= distance %></span>

    </div>




</script>
<script type="text/x-underscore-template" id="incident_item_template">

    <td><%= ID %></td>
    <td><%= (type=="accident")?"تصادف":""%></td>
    <td><%= create_date %></td>




</script>

<script src="js/app_new.js"></script>
</body>
</html>