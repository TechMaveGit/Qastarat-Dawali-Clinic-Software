<?php

namespace App\Http\Controllers\SuperAdmin\website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class WebsiteController extends Controller
{

    public function index(Request $request)
    {
        if(request()->isMethod("post"))
        {
           
            $rules = [
                'title' => 'required|string',
                'subTitle' => 'required|string',
                'reasonalClinics' => 'required',
                'gccCountries' => 'required',
                'satellietesCenters' => 'required',
                'populationServed' => 'required',
                'yearsExperience' => 'required',
            ];

           
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            
            if ($request->isMethod("post")) {
                DB::table('homes')->update([
                    'title' => $request->input('title'),
                    'subTitle' => $request->input('subTitle'),
                    'reasonalClinics' => (int) $request->input('reasonalClinics'),
                    'gccCountries' => (int) $request->input('gccCountries'),
                    'satellietesCenters' => (int) $request->input('satellietesCenters'),
                    'populationServed' => (int) $request->input('populationServed'),
                    'yearsExperience' => (int) $request->input('yearsExperience'),
                ]);

               
                return back()->with('status', 'Data updated successfully');
            }

        }
         $home=  DB::table('homes')->first();
         return view('superAdmin.website.home',compact('home'));
    }


    
    public function addFaq(Request $request)
    {
        $data=$request->all();
        $temp_data['list1'] = $data['faqTitle'];
        $temp_data['list1subtitle'] = $data['faqDescription'];
        DB::table('faq')->insert($temp_data);
        return back()->with('status', 'Faq Added successfully');     
    }


    public function aboutUs(Request $request)
    {
        $aboutUs=  DB::table('aboutUs')->first();
        if(request()->isMethod("post"))
        {
           
            $rules = [
                'title' => 'required|string',
                'subTitle' => 'required|string',
                // 'videoFile' => 'required',
                // 'imageUpload' => 'required',
             
            ];

           
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
          $data=$request->all();
           $temp_data=[];
            if(isset($data['imageUpload'])){
           
                if(isset($aboutUs->imageUpload)){
                    unlink('public/assets/video'.'/'.$aboutUs->imageUpload);
                }
                $image = $data['imageUpload'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['imageUpload'] = $new_name;
    
           
               }
               if(isset($data['videoFile'])){
           
                if(isset($aboutUs->videoFile)){
                    unlink('public/assets/video'.'/'.$aboutUs->videoFile);
                }
                $image = $data['videoFile'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['videoFile'] = $new_name;
    
           
               }
               $temp_data['title'] = $data['title'];
               $temp_data['subTitle'] = $data['subTitle'];
               $temp_data['video_url'] = $data['video_url'];

            if ($request->isMethod("post")) {
                DB::table('aboutUs')->where('id',$aboutUs->id)->update($temp_data);

                return back()->with('status', 'Data updated successfully');
            }

        }
         
         return view('superAdmin.website.aboutUs',compact('aboutUs'));
       
    }
    public function ourTreatment(Request $request)
    {
        $treatment=  DB::table('treatments')->first();
        if(request()->isMethod("post"))
        {
           
            $rules = [
                'title' => 'required|string',
                'subTitle' => 'required|string',
                'Womenhealbetter' => 'required',
                'Menhealbetter' => 'required',
                'Menwomenhealbetter' => 'required',
                'regenerativetherapies' => 'required',
                
            ];

           
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
          $data=$request->all();
           $temp_data=[];
            if(isset($data['imageUpload'])){
           
                if(isset($treatment->imageUpload)){
                    unlink('public/assets/video'.'/'.$treatment->imageUpload);
                }
                $image = $data['imageUpload'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['imageUpload'] = $new_name;
    
           
               }
               if(isset($data['videoFile'])){
           
                if(isset($treatment->videoFile)){
                    unlink('public/assets/video'.'/'.$treatment->videoFile);
                }
                $image = $data['videoFile'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['videoFile'] = $new_name;
               }
            //    $temp_data['video_url'] = $data['video_url'];
               $temp_data['title'] = $data['title'];
               $temp_data['subTitle'] = $data['subTitle'];
               $temp_data['Womenhealbetter'] = $data['Womenhealbetter'];
               $temp_data['Womenhealbettercontent1'] = $data['Womenhealbettercontent1'];
               $temp_data['Womenhealbettercontent2'] = $data['Womenhealbettercontent2'];
               $temp_data['Womenhealbettercontent3'] = $data['Womenhealbettercontent3'];
               $temp_data['Womenhealbettercontent4'] = $data['Womenhealbettercontent4'];
               $temp_data['Womenhealbettercontent5'] = $data['Womenhealbettercontent5'];
               $temp_data['Womenhealbettercontent6'] = $data['Womenhealbettercontent1'];
               $temp_data['Menhealbetter'] = $data['Menhealbetter'];
               $temp_data['Menhealbettercontent1'] = $data['Menhealbettercontent1'];
               $temp_data['Menhealbettercontent2'] = $data['Menhealbettercontent2'];
               $temp_data['Menhealbettercontent3'] = $data['Menhealbettercontent3'];
               $temp_data['Menhealbettercontent4'] = $data['Menhealbettercontent4'];
               $temp_data['Menhealbettercontent5'] = $data['Menhealbettercontent5'];
               $temp_data['Menhealbettercontent6'] = $data['Menhealbettercontent6'];
               $temp_data['Menwomenhealbetter'] = $data['Menwomenhealbetter'];
               $temp_data['Menwomenhealbettercontent1'] = $data['Menwomenhealbettercontent1'];
               $temp_data['Menwomenhealbettercontent2'] = $data['Menwomenhealbettercontent2'];
               $temp_data['Menwomenhealbettercontent3'] = $data['Menwomenhealbettercontent3'];
               $temp_data['Menwomenhealbettercontent4'] = $data['Menwomenhealbettercontent4'];
               $temp_data['Menwomenhealbettercontent5'] = $data['Menwomenhealbettercontent5'];
               $temp_data['Menwomenhealbettercontent6'] = $data['Menwomenhealbettercontent6'];
               $temp_data['regenerativetherapies'] = $data['regenerativetherapies'];
               $temp_data['regenerativetherapiescontent1'] = $data['regenerativetherapiescontent1'];
               $temp_data['regenerativetherapiescontent2'] = $data['regenerativetherapiescontent2'];
               $temp_data['regenerativetherapiescontent3'] = $data['regenerativetherapiescontent3'];
               $temp_data['regenerativetherapiescontent4'] = $data['regenerativetherapiescontent4'];
               $temp_data['regenerativetherapiescontent5'] = $data['regenerativetherapiescontent5'];
               $temp_data['regenerativetherapiescontent6'] = $data['regenerativetherapiescontent6'];
           
            if ($request->isMethod("post")) {
                DB::table('treatments')->where('id',$treatment->id)->update($temp_data);

                return back()->with('status', 'Data updated successfully');
            }

        }
         
         return view('superAdmin.website.treatment',compact('treatment'));
       
    }
    public function ourService(Request $request)
    {
        $service=  DB::table('services')->first();
        if(request()->isMethod("post"))
        {
           
            $rules = [
               
            ];

           
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
          $data=$request->all();
           $temp_data=[];



            if(isset($data['image1'])){
           
                if(isset($service->image1)){
                    unlink('public/assets/video'.'/'.$service->image1);
                }
                $image = $data['image1'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['image1'] = $new_name;
    
           
               }
               $temp_data['image1title'] = $data['image1title'];
               $temp_data['image1subtitle'] = $data['image1subtitle'];

               if(isset($data['image2'])){
           
                if(isset($service->image2)){
                    unlink('public/assets/video'.'/'.$service->image2);
                }
                $image = $data['image2'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['image2'] = $new_name;
    
           
               }
               $temp_data['image2title'] = $data['image2title'];
               $temp_data['image2subtitle'] = $data['image2subtitle'];

               if(isset($data['image3'])){
           
                if(isset($service->image3)){
                    unlink('public/assets/video'.'/'.$service->image3);
                }
                $image = $data['image3'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['image3'] = $new_name;
    
           
               }
               $temp_data['image3title'] = $data['image3title'];
               $temp_data['image3subtitle'] = $data['image3subtitle'];

               $temp_data['title'] = $data['title'];
               $temp_data['subTitle'] = $data['subTitle'];
             
              
           
            if ($request->isMethod("post")) {
                DB::table('services')->where('id',$service->id)->update($temp_data);

                return back()->with('status', 'Data updated successfully');
            }

        }
         return view('superAdmin.website.service',compact('service'));
       
    }
    public function ourUniqueSoftware( Request $request)
    {
        $software=  DB::table('softwares')->first();
        if(request()->isMethod("post"))
        {
           
            $rules = [
                'title' => 'required|string',
                'subTitle' => 'required|string',
                // 'videoFile' => 'required',
                // 'imageUpload' => 'required',
             
            ];

           
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
          $data=$request->all();
           $temp_data=[];
            if(isset($data['imageUpload'])){
           
                if(isset($software->imageUpload)){
                    unlink('public/assets/video'.'/'.$software->imageUpload);
                }
                $image = $data['imageUpload'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['imageUpload'] = $new_name;
    
           
               }
               
               $temp_data['title'] = $data['title'];
               $temp_data['subTitle'] = $data['subTitle'];
               $temp_data['list1'] = $data['list1'];
               $temp_data['list2'] = $data['list2'];
               $temp_data['list3'] = $data['list3'];
               $temp_data['list4'] = $data['list4'];
               $temp_data['list5'] = $data['list5'];
               $temp_data['list6'] = $data['list6'];
               $temp_data['list7'] = $data['list7'];
               $temp_data['list8'] = $data['list8'];
               $temp_data['list9'] = $data['list9'];

           
            if ($request->isMethod("post")) {
                DB::table('softwares')->where('id',$software->id)->update($temp_data);

                return back()->with('status', 'Data updated successfully');
            }

        }
         
         return view('superAdmin.website.software',compact('software'));
       
    }
    public function ourBranch( Request $request)
    {
        $branch=  DB::table('branches')->first();
        if(request()->isMethod("post"))
        {
           
            $rules = [
                'title' => 'required|string',
                'subTitle' => 'required|string',
                // 'videoFile' => 'required',
                // 'imageUpload' => 'required',
             
            ];

           
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
          $data=$request->all();
           $temp_data=[];
            if(isset($data['imageUpload'])){
           
                if(isset($branch->imageUpload)){
                    unlink('public/assets/video'.'/'.$branch->imageUpload);
                }
                $image = $data['imageUpload'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['imageUpload'] = $new_name;
    
           
               }
               $temp_data['title'] = $data['title'];
               $temp_data['subTitle'] = $data['subTitle'];
               $temp_data['title1'] = $data['title1'];
               $temp_data['title1phonenumber'] = $data['title1phonenumber'];
               $temp_data['title1tollfreenumber'] = $data['title1tollfreenumber'];
               $temp_data['title2'] = $data['title2'];
               $temp_data['title3'] = $data['title3'];
               $temp_data['title4'] = $data['title4'];
               $temp_data['title2phonenumber'] = $data['title2phonenumber'];
               $temp_data['title3email'] = $data['title3email'];
               $temp_data['title4email'] = $data['title4email'];
              

           
            if ($request->isMethod("post")) {
                DB::table('branches')->where('id',$branch->id)->update($temp_data);

                return back()->with('status', 'Data updated successfully');
            }

        }
         
         return view('superAdmin.website.branch',compact('branch'));
       
    }
    public function ourTeam(Request $request)
    {
        
        if (request()->isMethod("post")) {
            $memberNames = $request->input('member_name');
            $memberTitles = $request->input('member_title');
            $memberSocialFb = $request->input('member_social_fb');
            $memberSocialTwitter = $request->input('member_social_twitter');
            $memberSocialInstagram = $request->input('member_social_instagram');
            $memberSocialLinkedin = $request->input('member_social_linkedin');
            $currentImages = $request->input('current_image');
        
            // Check if image is uploaded
            if ($request->hasFile('member_image')) {
                $image = $request->file('member_image');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
            } elseif (isset($currentImages)) {
                $new_name = $currentImages;
            }
        
            // Build form data
            $form_data = [
                'name' => $memberNames,
                'title' => $memberTitles,
                'image_url' => isset($new_name) ? $new_name : null,
                'social_fb' => $memberSocialFb,
                'social_twitter' => $memberSocialTwitter,
                'social_instagram' => $memberSocialInstagram,
                'social_linkedin' => $memberSocialLinkedin,
            ];
        
            // Update the database
            DB::table('TeamMembers')->where('id', $request->input('teamId'))->update($form_data);
        
            return back()->with('status', 'Data updated successfully');
        }
        
         $TeamMembers=   DB::table('TeamMembers')->get();
         return view('superAdmin.website.team',compact('TeamMembers'));  
    }

    public function addTeam(Request $request)
    {
        
        if (request()->isMethod("post")) {

            $memberNames = $request->input('member_name');
            $memberTitles = $request->input('member_title');
            $memberSocialFb = $request->input('member_social_fb');
            $memberSocialTwitter = $request->input('member_social_twitter');
            $memberSocialInstagram = $request->input('member_social_instagram');
            $memberSocialLinkedin = $request->input('member_social_linkedin');
            $currentImages = $request->input('current_image');
        
            // Check if image is uploaded
            if ($request->hasFile('member_image')) {
                $image = $request->file('member_image');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
            } elseif (isset($currentImages)) {
                $new_name = $currentImages;
            }
        
            // Build form data
            $form_data = [
                'name' => $memberNames,
                'title' => $memberTitles,
                'image_url' => isset($new_name) ? $new_name : null,
                'social_fb' => $memberSocialFb,
                'social_twitter' => $memberSocialTwitter,
                'social_instagram' => $memberSocialInstagram,
                'social_linkedin' => $memberSocialLinkedin,
            ];
        
            // Update the database
            DB::table('TeamMembers')->insert($form_data);
        
            return back()->with('teamAdd', 'Team added successfully');
        }   
    }

    public function deleteTeam(Request $request)
        {
           $teamMembers= DB::table('TeamMembers')->where('id',$request->input('memberId'))->delete();
           if($teamMembers)
           {
            return response()->json(['success' => true, 'message' => 'Team member deleted successfully']);
           }
        }

    public function contactUs(Request $request)
    {
        $contactUs=  DB::table('contactUs')->first();
        if(request()->isMethod("post"))
        {
           
            $rules = [
                'title' => 'required|string',
                'subTitle' => 'required|string',
                // 'videoFile' => 'required',
                // 'imageUpload' => 'required',
             
            ];

           
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
          $data=$request->all();
           $temp_data=[];
            if(isset($data['imageUpload'])){
           
                if(isset($contactUs->imageUpload)){
                    unlink('public/assets/video'.'/'.$contactUs->imageUpload);
                }
                $image = $data['imageUpload'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['imageUpload'] = $new_name;
    
           
               }
               if(isset($data['videoFile'])){
           
                if(isset($contactUs->videoFile)){
                    unlink('public/assets/video'.'/'.$contactUs->videoFile);
                }
                $image = $data['videoFile'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['videoFile'] = $new_name;
    
           
               }
               $temp_data['title'] = $data['title'];
               $temp_data['subTitle'] = $data['subTitle'];
               $temp_data['content1'] = $data['content1'];
               $temp_data['content2'] = $data['content2'];
               $temp_data['content3'] = $data['content3'];

           
            if ($request->isMethod("post")) {
                DB::table('contactUs')->where('id',$contactUs->id)->update($temp_data);

                return back()->with('status', 'Data updated successfully');
            }

        }
         
         return view('superAdmin.website.contactUs',compact('contactUs'));
       
    }
    public function faq(Request $request)
    {
        $faq=  DB::table('faq_images')->first();
        $faqs=  DB::table('faq')->get();

        if(request()->isMethod("post"))
        {
         
           $data=$request->all();
           $temp_data=[];

           $faqValue=$request->input('faqValue');
           if($faqValue=='faqValue')
           { 
                DB::table('faq')->delete();
                foreach ($request->title as $key => $title) 
                {
                    DB::table('faq')->insert([
                                                'list1' => $title,
                                                'list1subtitle' => $request->subTitle[$key],
                                            ]);
                }

                return back()->with('status', 'Data updated successfully');
            }




            if(isset($data['imageUpload']))
               {
                    if(isset($faq->imageUpload)){
                        unlink('public/assets/video'.'/'.$faq->imageUpload);
                    }
                    $image = $data['imageUpload'];
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('assets/video'), $new_name);
                    $temp_data['imageUpload'] = $new_name;
               }
               $temp_data['title'] = $request->title;
               $temp_data['subTitle'] = $request->subTitle;

    
                 DB::table('faq_images')->where('id','1')->update($temp_data);

              
          
                                        


                return back()->with('status', 'Data updated successfully');
    
        }
         
         return view('superAdmin.website.faq',compact('faq','faqs'));
       
    }
    public function footer(Request $request)
    {
        
        $footer=  DB::table('footers')->first();
        if(request()->isMethod("post"))
        {
           
            // $rules = [
            //     'websitelogo' => 'required',
            // ];

           
            // $validator = Validator::make($request->all(), $rules);

            // if ($validator->fails()) {
            //     return back()->withErrors($validator)->withInput();
            // }
          $data=$request->all();
           $temp_data=[];
            if(isset($data['websitelogo'])){
           
                if(isset($footer->websitelogo)){
                    unlink('public/assets/video'.'/'.$footer->websitelogo);
                }
                $image = $data['websitelogo'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['websitelogo'] = $new_name;
    
           
               }
               if(isset($data['logo1'])){
           
                if(isset($footer->logo1)){
                    unlink('public/assets/video'.'/'.$footer->logo1);
                }
                $image = $data['logo1'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['logo1'] = $new_name;
    
           
               }
               
               $temp_data['logo1whatsapp'] = $data['logo1whatsapp'];
               $temp_data['logo1phone'] = $data['logo1phone'];
               if(isset($data['logo2'])){
           
                if(isset($footer->logo2)){
                    unlink('public/assets/video'.'/'.$footer->logo2);
                }
                $image = $data['logo2'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['logo2'] = $new_name;
    
           
               }
               $temp_data['logo2whatsapp'] = $data['logo2whatsapp'];
               $temp_data['logo2phone'] = $data['logo2phone'];

               if(isset($data['logo3'])){
           
                if(isset($footer->logo3)){
                    unlink('public/assets/video'.'/'.$footer->logo3);
                }
                $image = $data['logo3'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['logo3'] = $new_name;
    
           
               }
               $temp_data['logo3whatsapp'] = $data['logo3whatsapp'];
               $temp_data['logo3phone'] = $data['logo3phone'];

               if(isset($data['logo4'])){
           
                if(isset($footer->logo4)){
                    unlink('public/assets/video'.'/'.$footer->logo4);
                }
                $image = $data['logo4'];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/video'), $new_name);
                $temp_data['logo4'] = $new_name;
    
           
               }
               $temp_data['logo4whatsapp'] = $data['logo4whatsapp'];
               $temp_data['logo4phone'] = $data['logo4phone'];

               $temp_data['HeadquarterLocation'] = $data['HeadquarterLocation'];
               $temp_data['Mailingaddress'] = $data['Mailingaddress'];
               $temp_data['CallCenter'] = $data['CallCenter'];
               $temp_data['text1'] = $data['text1'];
              
           
            if ($request->isMethod("post")) {
                DB::table('footers')->where('id',$footer->id)->update($temp_data);

                return back()->with('status', 'Data updated successfully');
            }

        }
         return view('superAdmin.website.footer',compact('footer'));
       
    }

}
