<div class="left_mm">
    <div class="view_record_icon">

        @if (!empty(@$id) && null != @$id)
            @php
                $patient_ids = decrypt($id);
                $patient = App\Models\User::where('id', $patient_ids)->first('id');

                $Thyroid_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
                    ->where(['patient_id' => $patient->id, 'form_type' => 'thyroid_form'])
                    ->first();

                if ($Thyroid_Eligibility_Forms !== null) {
                    $Thyroid_Eligibility_Forms = $Thyroid_Eligibility_Forms->toArray();
                } else {
                    $Thyroid_Eligibility_Forms = [];
                } // echo "pre"."</br>";
                // echo gettype($Eligibility_Forms_exist);
                // echo "<br>";

                // if(!in_array($id,$Eligibility_Forms_exist)){
                //     echo "NOT data exist";
                // }elseif(in_array($id,$Eligibility_Forms_exist)){
                //     echo " data exist ";
                // }
            @endphp
            <div class="customdotdropdown fill_forms_icon" data-bs-toggle="modal" data-bs-target="#consent_form">
                <div class="buttondrop_dot action_btn_tooltip form5_bg">
                    <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
                    <span class="toolTip">Eligibility Forms</span>
                </div>

            </div>

            <div class="customdotdropdown fill_forms_icon">
          <div class="buttondrop_dot action_btn_tooltip genral_form_bg">
            <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
            <span class="toolTip">General Form</span>
          </div>
          <div class="dropdown-content">
            <a href="{{ route('user.patient_medical_detail', ['id' => @$id]) }}" class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
            </a>
          </div>
        </div>

            @if (in_array($patient_ids, $Thyroid_Eligibility_Forms))
                <div class="customdotdropdown fill_forms_icon">
                    <div class="buttondrop_dot action_btn_tooltip form1_bg">
                        <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
                        <span class="toolTip">Thyroid Ablation</span>
                    </div>
                    <div class="dropdown-content">
                        <a href="{{ route('user.ViewThyroidAblationForm', ['id' => @$id]) }}"
                            class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
                        </a>
                        <a target="_blank"
                            href="{{ route('user.editThyroidEligibilityForms', ['patient_id' => @$id]) }}"
                            class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
                        </a>

                    </div>
                </div>
            @endif
            @php

                $prostate_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
                    ->where(['patient_id' => $patient->id, 'form_type' => 'prostate_form'])
                    ->first();

                if ($prostate_Eligibility_Forms !== null) {
                    $prostate_Eligibility_Forms = $prostate_Eligibility_Forms->toArray();
                } else {
                    $prostate_Eligibility_Forms = [];
                }
            @endphp
            @if (in_array($patient_ids, $prostate_Eligibility_Forms))
                <div class="customdotdropdown fill_forms_icon">
                    <div class="buttondrop_dot action_btn_tooltip form2_bg">
                        <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
                        <span class="toolTip">Prostate Embo</span>
                    </div>
                    <div class="dropdown-content">
                        <a href="{{ route('user.ViewProstateEligibilityForms', ['id' => @$id]) }}"
                            class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
                        </a>
                        <a target="_blank"
                            href="{{ route('user.EditProstateEligibilityForms', ['patient_id' => @$id]) }}"
                            class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
                        </a>

                    </div>
                </div>
            @endif

            @php

                $uterine_embo_form_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
                    ->where(['patient_id' => $patient->id, 'form_type' => 'uterine_embo'])
                    ->first();

                if ($uterine_embo_form_Eligibility_Forms !== null) {
                    $uterine_embo_form_Eligibility_Forms = $uterine_embo_form_Eligibility_Forms->toArray();
                } else {
                    $uterine_embo_form_Eligibility_Forms = [];
                }
            @endphp


            @if (in_array($patient_ids, $uterine_embo_form_Eligibility_Forms))
                <div class="customdotdropdown fill_forms_icon">
                    <div class="buttondrop_dot action_btn_tooltip form3_bg">
                        <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
                        <span class="toolTip">Uterine Embo</span>
                    </div>
                    <div class="dropdown-content">
                        <a href="{{ route('user.viewUterineEmboEligibilityForms', ['id' => @$id]) }}"
                            class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
                        </a>
                        <a target="_blank"
                            href="{{ route('user.editUterineEmboEligibilityForms', ['patient_id' => @$id]) }}"
                            class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
                        </a>

                    </div>
                </div>
            @endif

            @php

            $VaricoseAblation_form_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
                ->where(['patient_id' => $patient->id, 'form_type' => 'VaricoseAblation'])
                ->first();

            if ($VaricoseAblation_form_Eligibility_Forms !== null) {
                $VaricoseAblation_form_Eligibility_Forms = $VaricoseAblation_form_Eligibility_Forms->toArray();
            } else {
                $VaricoseAblation_form_Eligibility_Forms = [];
            }
        @endphp


        @if (in_array($patient_ids, $VaricoseAblation_form_Eligibility_Forms))

            <div class="customdotdropdown fill_forms_icon">
          <div class="buttondrop_dot action_btn_tooltip form4_bg">
            <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
            <span class="toolTip">Varicose Ablation (VA)</span>
          </div>
          <div class="dropdown-content">
            <a href="{{ route('user.viewVaricoseAblationEligibilityForms', ['id' => @$id]) }}" class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
            </a>
            <a target="_blank"
            href="{{ route('user.editVaricoseAblationEligibilityForms', ['patient_id' => @$id]) }}" class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
              </a>
            
          </div>
        </div>
        @endif

        @php

        $PelvicCongEmbo_form_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
            ->where(['patient_id' => $patient->id, 'form_type' => 'PelvicCongEmbo'])
            ->first();

        if ($PelvicCongEmbo_form_Eligibility_Forms !== null) {
            $PelvicCongEmbo_form_Eligibility_Forms = $PelvicCongEmbo_form_Eligibility_Forms->toArray();
        } else {
            $PelvicCongEmbo_form_Eligibility_Forms = [];
        }
    @endphp
        @if (in_array($patient_ids, $PelvicCongEmbo_form_Eligibility_Forms))
            <div class="customdotdropdown fill_forms_icon">
          <div class="buttondrop_dot action_btn_tooltip form5_bg">
            <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
            <span class="toolTip">Pelvic Cong Embo (PCE)</span>
          </div>
          <div class="dropdown-content">
            <a href="{{ route('user.viewPelvicCongEmboEligibilityForms', ['id' => @$id]) }}"
                class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
            </a>
            <a target="_blank"
                href="{{ route('user.editPelvicCongEmboEligibilityForms', ['patient_id' => @$id]) }}"
                class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
            </a>
            
          </div>
        </div>
        @endif


        @php

        $HaemorrhoidsEmbo_form_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
            ->where(['patient_id' => $patient->id, 'form_type' => 'HaemorrhoidsEmbo'])
            ->first();

        if ($HaemorrhoidsEmbo_form_Eligibility_Forms !== null) {
            $HaemorrhoidsEmbo_form_Eligibility_Forms = $HaemorrhoidsEmbo_form_Eligibility_Forms->toArray();
        } else {
            $HaemorrhoidsEmbo_form_Eligibility_Forms = [];
        }
    @endphp
        @if (in_array($patient_ids, $HaemorrhoidsEmbo_form_Eligibility_Forms))
            <div class="customdotdropdown fill_forms_icon">
          <div class="buttondrop_dot action_btn_tooltip form7_bg">
            <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
            <span class="toolTip">Haemorrhoids Embo (HE)</span>
          </div>
          <div class="dropdown-content">
            <a href="{{ route('user.viewHaemorrhoidsEmboEligibilityForms', ['id' => @$id]) }}"
                class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
            </a>
            <a target="_blank"
                href="{{ route('user.editHaemorrhoidsEmboEligibilityForms', ['patient_id' => @$id]) }}"
                class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
            </a>
            
          </div>
        </div>
        @endif

        @php

        $KneePain_form_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
            ->where(['patient_id' => $patient->id, 'form_type' => 'KneePain'])
            ->first();

        if ($KneePain_form_Eligibility_Forms !== null) {
            $KneePain_form_Eligibility_Forms = $KneePain_form_Eligibility_Forms->toArray();
        } else {
            $KneePain_form_Eligibility_Forms = [];
        }
    @endphp
        @if (in_array($patient_ids, $KneePain_form_Eligibility_Forms))
            <div class="customdotdropdown fill_forms_icon">
          <div class="buttondrop_dot action_btn_tooltip form8a_bg">
            <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
            <span class="toolTip">Knee Pain</span>
          </div>
          <div class="dropdown-content">
            <a href="{{ route('user.viewKneePainEligibilityForms', ['id' => @$id]) }}"
                class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
            </a>
            <a target="_blank"
                href="{{ route('user.editKneePainEligibilityForms', ['patient_id' => @$id]) }}"
                class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
            </a>
            
          </div>
        </div>
        @endif

        @php

        $SpinePain_form_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
            ->where(['patient_id' => $patient->id, 'form_type' => 'SpinePain'])
            ->first();

        if ($SpinePain_form_Eligibility_Forms !== null) {
            $SpinePain_form_Eligibility_Forms = $SpinePain_form_Eligibility_Forms->toArray();
        } else {
            $SpinePain_form_Eligibility_Forms = [];
        }
    @endphp
        @if (in_array($patient_ids, $SpinePain_form_Eligibility_Forms))
            <div class="customdotdropdown fill_forms_icon">
          <div class="buttondrop_dot action_btn_tooltip form8b_bg">
            <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
            <span class="toolTip">Spine Pain</span>
          </div>
          <div class="dropdown-content">
            <a href="{{ route('user.viewSpinePainEligibilityForms', ['id' => @$id]) }}"
                class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
            </a>
            <a target="_blank"
                href="{{ route('user.editSpinePainEligibilityForms', ['patient_id' => @$id]) }}"
                class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
            </a>
            
          </div>
        </div>
        @endif
        @php

        $MSKPain_form_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
            ->where(['patient_id' => $patient->id, 'form_type' => 'MSKPain'])
            ->first();

        if ($MSKPain_form_Eligibility_Forms !== null) {
            $MSKPain_form_Eligibility_Forms = $MSKPain_form_Eligibility_Forms->toArray();
        } else {
            $MSKPain_form_Eligibility_Forms = [];
        }
    @endphp
        @if (in_array($patient_ids, $MSKPain_form_Eligibility_Forms))
        <div class="customdotdropdown fill_forms_icon">
      <div class="buttondrop_dot action_btn_tooltip form8c_bg">
        <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
        <span class="toolTip">MSK Pain</span>
      </div>
      <div class="dropdown-content">
        <a href="{{ route('user.viewMSKPainEligibilityForms', ['id' => @$id]) }}"
            class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
        </a>
        <a target="_blank"
            href="{{ route('user.editMSKPainEligibilityForms', ['patient_id' => @$id]) }}"
            class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
        </a>
        
      </div>
    </div>
    @endif


    @php

    $ShoulderPain_form_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
        ->where(['patient_id' => $patient->id, 'form_type' => 'ShoulderPain'])
        ->first();

    if ($ShoulderPain_form_Eligibility_Forms !== null) {
        $ShoulderPain_form_Eligibility_Forms = $ShoulderPain_form_Eligibility_Forms->toArray();
    } else {
        $ShoulderPain_form_Eligibility_Forms = [];
    }
@endphp
    @if (in_array($patient_ids, $ShoulderPain_form_Eligibility_Forms))
    <div class="customdotdropdown fill_forms_icon">
  <div class="buttondrop_dot action_btn_tooltip form8d_bg">
    <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
    <span class="toolTip">Shoulder Pain</span>
  </div>
  <div class="dropdown-content">
    <a href="{{ route('user.viewShoulderPainEligibilityForms', ['id' => @$id]) }}"
        class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
    </a>
    <a target="_blank"
        href="{{ route('user.editShoulderPainEligibilityForms', ['patient_id' => @$id]) }}"
        class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
    </a>
    
  </div>
</div>
@endif



@php

    $VaricoceleEmboForm_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
        ->where(['patient_id' => $patient->id, 'form_type' => 'VaricoceleEmboForm'])
        ->first();

    if ($VaricoceleEmboForm_Eligibility_Forms !== null) {
        $VaricoceleEmboForm_Eligibility_Forms = $VaricoceleEmboForm_Eligibility_Forms->toArray();
    } else {
        $VaricoceleEmboForm_Eligibility_Forms = [];
    }
@endphp
    @if (in_array($patient_ids, $VaricoceleEmboForm_Eligibility_Forms))
    <div class="customdotdropdown fill_forms_icon">
  <div class="buttondrop_dot action_btn_tooltip form4_bg">
    <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
    <span class="toolTip">Varicocele Embo (VE)</span>
  </div>
  <div class="dropdown-content">
    <a href="{{ route('user.viewVaricoceleEmboEligibilityForms', ['id' => @$id]) }}"
        class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
    </a>
    <a target="_blank"
        href="{{ route('user.editVaricoceleEmboEligibilityForms', ['patient_id' => @$id]) }}"
        class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
    </a>
    
  </div>
</div>
@endif

@php

    $HeadachePain_form_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select('patient_id')
        ->where(['patient_id' => $patient->id, 'form_type' => 'HeadachePain'])
        ->first();

    if ($HeadachePain_form_Eligibility_Forms !== null) {
        $HeadachePain_form_Eligibility_Forms = $HeadachePain_form_Eligibility_Forms->toArray();
    } else {
        $HeadachePain_form_Eligibility_Forms = [];
    }
@endphp
    @if (in_array($patient_ids, $HeadachePain_form_Eligibility_Forms))
    <div class="customdotdropdown fill_forms_icon">
  <div class="buttondrop_dot action_btn_tooltip form8e_bg">
    <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>
    <span class="toolTip">Headache Pain</span>
  </div>
  <div class="dropdown-content">
    <a href="{{ route('user.viewHeadachePainEligibilityForms', ['id' => @$id]) }}"
        class="bottom_btn copy_btn"><i class="fa-regular fa-eye"></i> View
    </a>
    <a target="_blank"
        href="{{ route('user.editHeadachePainEligibilityForms', ['patient_id' => @$id]) }}"
        class="bottom_btn extract_btn"><i class="fa-regular fa-pen-to-square"></i> Edit
    </a>
    
  </div>
</div>
@endif

        {{-- endif --}}
        @endif
    </div>


</div>
