<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>لیست ماموریت های خودرو</title>
<!--    JQwdgets Incldes Start-->
    <link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="jqwidgets/styles/jqx.bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="jqwidgets/styles/jqx.bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="js/style/jquery-ui-1.8.14.css" type="text/css" />
    <script type="text/javascript" src="scripts/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
<!--    <script type="text/javascript" src="js/jquery.ui.datepicker-cc.all.min.js"></script>-->
<!--    <script type="text/javascript" src="js/jquery.ui.datepicker-cc.all.min.js"></script>-->
<!--    <script type="text/javascript" src="scripts/jquery.ui.core.js"></script>-->
<!---->
<!--    <script type="text/javascript" src="scripts/jquery.ui.datepicker-cc.js"></script>-->
<!--    <script type="text/javascript" src="scripts/calendar.js"></script>-->
<!--    <script type="text/javascript" src="scripts/jquery.ui.datepicker-cc-fa.js"></script>-->
    <script type="text/javascript" src="jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdatatable.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdata.export.js"></script>

    <script type="text/javascript" src="https://rawgithub.com/RobinHerbots/jquery.inputmask/2.x/dist/jquery.inputmask.bundle.js"></script>

<!--    Jqwidgets Include END-->
<!--    APP-->
    <script type="text/javascript" src="js/missionlistvehicle.js"></script>
<!--    APP END-->
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css"/>
    <link rel="stylesheet" href="css/style.css"/>



</head>
<body >
<div class="container">

    <div class="row">
        <div class=" span12 main_container">
            <div style="margin-top: 20px" class="row">

                <div style="text-align: right" class="offset1 span4">

                    <label>خودرو</label>
                    <div style="float: right" id="driverSelect">

                    </div>
                </div>
                <div style="text-align: right" class="span4">
                    <label>انتخاب بازه زمانی</label>
                    <div class="controls controls-row">
                        <input  type="text" id="fromDate" name="fromDate" class="span2 ltr center date " placeholder="" value="">
                        <div class="span  rtl">از تاریخ :</div>


                    </div>
                    <div class="controls controls-row">
                        <div class="indicator"></div>
                        <input type="text" id="toDate" name="toDate" class="span2 ltr center date " placeholder="" value="" >
                        <div class="span  rtl">تا تاریخ :</div>

                        <span class="help-inline">تاریخ باید به صورت :1392/04/09 وارد شود</span>
                    </div>
                    <div class="controls controls-row">
                        <button id="subimtdate" style="margin-left: 0px" class="span2" value="اعمال">اعمال</button>
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px" class="row">
                <div style="display: inline-block" id="dataTable">
                </div>
                <div style='float: left;'>
                    <input type="button" value="Export to Excel" id='excelExport' />

                    <input type="button" value="Export to XML" id='xmlExport' />
                </div>
            </div>

        </div>

    </div>
</div>

</body>
</html>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shadel
 * Date: 1/15/14
 * Time: 5:28 AM
 * To change this template use File | Settings | File Templates.
 */
?>