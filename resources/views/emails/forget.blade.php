<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body style="background: #F4F4F4;">
   
   <!--module-->
   <table style="width:100%;max-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
      <tbody>
         <tr>
            <td bgcolor="#F4F4F4" align="center">
               <!--container-->
               <table class="row" style="width:600px;max-width:600px;" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
                  <tbody>
                     <tr>
                        <td bgcolor="#ffffff" align="center">
                           <!--wrapper-->
                           <table class="row" style="width:540px;max-width:540px;" width="540" cellspacing="0" cellpadding="0" border="0" align="center">
                              <tbody>
                                 <tr>
                                    <td class="container-padding" align="center">
                                       <!-- content container -->
                                       <table class="row" style="width:540px;max-width:540px;" width="540" cellspacing="0" cellpadding="0" border="0" align="center">
                                          <tbody>
                                             <tr>
                                                <td align="center">
                                                   <!-- content -->    
                                                   <table style="width:100%; max-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                      <tbody>
                                                         <tr>
                                                            <td height="40">&nbsp;</td>
                                                         </tr>
                                                      
                                                         <tr>
                                                            <td  align="center"><img style="display:block;width:100%;max-width:70px;" alt="img" src="{{ asset('/assets/images/icon.png') }}" width="70"></td>
                                                         </tr>
                                                         <tr>
                                                            <td height="20">&nbsp;</td>
                                                         </tr>
                                                         <tr>
                                                            <td style="font-family:'Josefin Sans', Arial, Helvetica, sans-serif;font-size: 30px;color: #282828;" align="center">Forgot Your Password ?</td>
                                                         </tr>
                                                         <tr>
                                                            <td height="18">&nbsp;</td>
                                                         </tr>
                                                         <tr>
                                                            <td style="font-family:'Open Sans', Arial, Helvetica, sans-serif;font-size: 14px;color: #282828;line-height: 22px;">
                                                               Follow this link to reset your customer account password at Qastarat & Dawali Clinics. If you didn't request a new password. 
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td height="20">&nbsp;</td>
                                                         </tr>
                                                         <tr>
                                                            <td style="font-family:'Open Sans', Arial, Helvetica, sans-serif;font-size: 14px;color: #09113d;;">
                                                                @isset($user->user_type)
                                                                @component('mail::button',['url'=>route('doctor.forget.password.reset',['token'=>$user->remember_token])])
                                                                Reset Your Password
                                                             @endcomponent
                                                             @else
                                                             @component('mail::button',['url'=>route('patient.forget.password.reset',['token'=>$user->remember_token])])
                                                             Reset Your Password
                                                          @endcomponent
                                                            @endisset
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td height="20">&nbsp;</td>
                                                         </tr>
                                                        
                                                         <tr>
                                                            <td height="18">&nbsp;</td>
                                                         </tr>
                                                         <tr>
                                                            <td style="font-family:'Open Sans', Arial, Helvetica, sans-serif;font-size: 14px;color: #282828;">If you have any question regarding this email. Please feel free to contact us. </td>
                                                         </tr>
                                                         <tr>
                                                            <td height="40">&nbsp;</td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>

</body>


 
</html>