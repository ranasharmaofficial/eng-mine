<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mark Sheet</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&subset=devanagari" rel="stylesheet">
	 
    <?php $font_family = "'Roboto','sans-serif'"; ?>
    <!-- Bootstrap Css -->


    <style type="text/css">
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            font-size: 0.875rem;
            font-weight: normal;

        }

        @font-face {
            font-family: 'Noto Sans', sans-serif;
            font-style: normal;
            font-weight: 400;
        }

        .companyLogo div img {
            align-items: center;
            justify-content: center;
            width: 30%;

        }

        .companyLogo div img {
            width: 90%;
        }

        .signature {
            margin-top: 10px;
        }

        .signature div {
            width: 33.33%;
        }

        .studentImg {
            width: 20%;
            position: absolute;
            right: -10px;
            top: 250px
        }

        .studentImg img {
            width: 50%;
        }

        .studentMarksheet tr td {
            border: 1px solid rgb(141, 141, 141);
            text-align: center;
            width: 33.33%;
        }
        .studentMarksheet,.studentMarksheet tr td{
            border-collapse: collapse;
        }
        .studentMarksheet {
            width: 100%;
        }
        .studentMarksheet tr{
            height: 30px !important;
        }
        .widthSize{
            width: 10% !important;
        }
        .widthSize1{
            width: 20% !important;
        }
        .aboutUs-content p {
            padding: 0px;
            margin: 0px;
            /* font-weight: 800; */
        }

        .aboutUs-content .iso_cer {
            font-weight: 800;
            font-size: 20px;
        }
        .place p {
            margin: 0;
        }

        .m-course p {
            font-size: 17px;
        }

        .m-course p span {
            font-weight: bold;
            font-size: 20px;
            color: #000;
        }
/*
		 .row{
			 margin-right:-15px;
			 margin-left:-15px;
			 }
			
			.col-sm-3 {
				width: 33.33%;
			}
			.d-flex{
				display:flex;
			}
			.t_center{
				text-align:center;
			}
			*/
			
			.row {
				 margin-right:-15px;
			 margin-left:-15px;
  white-space: nowrap;
  > .col-sm-3 {
    display: inline-block;
    white-space: normal;
  }
}

			 
    </style>
</head>

<body style="font-family:'Roboto','sans-serif'">
    <div style="100%; margin:auto; border:2px solid #3e3d42; color:#3e3e3e;">
        <div class="col-sm-12 m-2" style="border:1px solid black; padding:10px">
            <div class="marksheet-logo">
                <img width="100%" src="https://gabvs.com/assets_admin/images/headerCer.jpeg" alt="">
            </div>
            <h3 class="text-center text-danger" style="text-align: center;color:#960c16;margin-bottom:2px">MARK SHEET</h3>
            <table class="table table-borderless table-sm" style="width: 80%;margin:30px;">
                <tr style="margin-top:10px;">
                    <td style="font-weight: 700;margin-top:20px;">Student Name :</td>
                    <td> {{$student_details->student_name}} </td>
                    <td style="font-weight: 700;margin-top:20px;">Serial No :</td>
                    <td>{{$student_details->serialno}} </td>
                </tr>
                <tr style="margin-top:10px;">
                    <td style="font-weight: 700;margin-top:20px;">Father's Name:</td>
                    <td>{{$student_details->father_name}}</td>
                    <td style="font-weight: 700;margin-top:20px;">Registration No :</td>
                    <td>{{$student_details->registration_no}}</td>
                </tr>
                 <tr style="margin-top:10px;">
                    <td style="font-weight: 700;margin-top:20px;">Mother's Name :</td>
                    <td> {{$student_details->mother_name}}</td>
                    <td style="font-weight: 700;margin-top:20px;">Session :</td>
                    <td>{{ $session->academicYear}}</td>
                </tr>
				 <tr>
                    <td style="font-weight: 700">Date of Birth :</td>
                    <td>{{ date('d-m-Y',strtotime($student_details->dob)); }}</td>

                </tr>
            </table>

            <div class="aboutSubject d-flex justify-content-center align-items-center">
                                            <div class="m-course">
												<center>
                                                <span style="font-size:22px;color:#000;" >has Successfully Completed The Course</br> <span style="font-size:24px;font-weight:900;">{{$course->courseName}}</span> <br>
                                                    Duration of course is <span>01 Years</span> Grade is <span style="font-size:24px;font-weight:900;">{{ $student_details->comments }}</span> <br>
                                                    Certificate issue Date is <span style="font-size:24px;font-weight:900;">{{ date('d-m-Y',strtotime($student_details->issue_date)) }}</span></span>
													</center>
                                            </div>

                                        </div>
			
			<table style="width:100%;margin-top:22px;">
			<tr style="width:100%">
				<td style="width:33.33%;"> <img style="height:80px;width:auto;margin-left:140px;" src="{{ asset('assets_admin/images/niti.jpg') }}" alt="logo"></td>
				<td style="width:33.33%;"> <img style="height:80px;margin-left:20px;" src="data:image/png;base64, {!! base64_encode(QrCode::size(150)->generate(url('results?reg_no='.$student_details->registration_no))) !!} "></td>
				<td style="width:33.33%;"> <img style="height:80px;width:auto;margin-left:-100px;" src="{{ asset('assets_admin/images/msme.jpg') }}" alt="logo"></td>
			</tr>
			</table>
			
			<table style="width:100%;margin-top:72px;">
			<tr style="width:100%">
				<td style="width:33.33%;"> 
					<div style="color:black;font-weight:bold;margin-left:80px;"  class="centerDirector  ">
						Center Director
					</div>
				</td>
				
				<td style="width:33.33%;"> 
					<div class="place">
						<p style="color:black;font-weight:bold;">Place : Bhargama, Araria</p>
						<p style="color:black;font-weight:bold;">Issue Date : {{ date('d-m-Y',strtotime($student_details->issue_date)) }}</p>
						<p style="color:black;font-weight:bold;">Visit Our Website : <a href="http://gabvs.com/">www.gabvs.com</a></p>
					</div>
				</td>
				<td style="width:33.33%;"> 
					<div style="color:black;font-weight:bold;margin-left:60px;" class="secretary ">
                                                Secretary </div>
				</td>
			</tr>
			</table>
			
			
										
										

		 
    </div>
</body>

</html>
