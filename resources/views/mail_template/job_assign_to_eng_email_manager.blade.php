<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#e8ebef">

    <tr>
        <td align="center" valign="top" class="container" style="padding:50px 10px;">
            <!-- Container -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
                        <table width="650" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
                            <tr>
                                <td class="td" bgcolor="#ffffff" style="width:650px; min-width:650px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                    <!-- Header -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                        <tr>
                                            <td class="p30-15-0" style="padding: 40px 30px 0px 30px;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <!-- <th class="column"  width="0" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td class="img m-center" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="" width="191" height="24" border="0" alt="" /></td>
                                                                </tr>
                                                            </table>
                                                        </th> -->
                                                        <th class="column" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td class="text-header left" style="color:#000000; font-size:18px;font-family:'Fira Mono', Arial,sans-serif; font-size:12px; line-height:16px; text-align: center;"><a href="{{ env('APP_URL') }}" target="_blank" class="link" style="color:#000001; text-decoration:none;"><span class="link" style="color:#000001; text-decoration:none;font-size:21px;font-weight:700">{{ env('APP_NAME') }}</span></a></td>
                                                                </tr>
                                                            </table>
                                                        </th>
                                                        <th class="column-empty" width="1" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;"></th>
                                                    </tr>
                                                </table>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="separator" style="padding-top: 40px; border-bottom:4px solid #000000; font-size:0pt; line-height:0pt;">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- END Header -->

                                    <!-- Intro -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                        <tr>
                                            <td class="p30-15" style="padding: 70px 30px 70px 30px;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="h2 center pb10" style="color:green; font-family:'Ubuntu', Arial,sans-serif; font-weight:700;font-size:30px; line-height:30px; text-align:center; padding-bottom:10px;">Order Placed Successfully!</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="h5 blue pb30" style="font-family:'Ubuntu', Arial,sans-serif; font-size:17px; line-height:15px; color:#000; padding-bottom:30px;">

															<p>Congratulation!!! </p>
															<p>New task has been assigned to you. Kindly confirm your schedule.</p>
															 
															<p><b>Organisation Name.:</b> {{ $customer->company_name }}</p>
															<p><b>Requested Schedule.:</b> {{ $customer_details->app_date.' '.$customer_details->app_time }}</p>
															<p><b>Address:</b> {{ $customer_details->location }},  {{ $customer_details->landmark }}, {{ $customer_details->city }}, {{ $customer_details->state }}-{{ $customer_details->pincode }}</p>
															<p>For any Support call us at 9870407840 or mail at support@engineersmine.com</p>
															<p><strong>&nbsp;</strong></p>
															<p style="color:blue;font-weight:bold;"><strong>Warm Regards</strong></p>
															<p  style="color:blue;font-weight:bold;"><strong>Team EngineersMine</strong></p>

                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- END Intro -->
                                </td>
                            </tr>
                            <tr>
                                <td class="text-footer" style="padding-top: 30px; color:#1f2125; font-family:'Fira Mono', Arial,sans-serif; font-size:12px; line-height:22px; text-align:center;">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- END Container -->
        </td>
    </tr>
</table>
