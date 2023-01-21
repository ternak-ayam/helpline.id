@extends('layouts.admin')

@section('title', 'Patient Records')

@section('css')

@endsection

@section('js')

@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Patient Records</h1>
        </x-slot>
        <div class="card">
            <div class="card-header">
                <h4>Update Patient Records</h4>
            </div>
            <form action="" method="post" class="needs-validation">
                @csrf
                @method('PUT')
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <div class="mt-2">
                                    <h4>EMOTIONAL SUPPORT PATIENT REPORT
                                    </h4>
                                </div>
                                <p>Please fill in the following questions according to the information obtained during the counselling! If a question cannot be answered, please skip it. Please remember that patient data is confidential.</p>
                            </div>

                            @include('psychologist.pages.counselling.patients.question.patient')
                            @include('psychologist.pages.counselling.patients.question.counsellor')
                            @include('psychologist.pages.counselling.patients.question.psychologist')

                            <div class="form-group row">
                                <label for="counsellor_name" class="col-sm-4 col-form-label">Counsellor/Psychologist</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[counsellor_name]" id="counsellor_name" readonly
                                           value="{{ $counselling->counsellor['name'] }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="patient_name" class="col-sm-4 col-form-label">Patient Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[patient_name]" id="patient_name" readonly
                                           value="{{ old('patient_name', $counselling->user['name']) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="counselling_date" class="col-sm-4 col-form-label">Counselling Date and Time</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[counselling_date]"
                                           id="counselling_date" readonly value="{{ $counselling->due->timezone('Asia/Jakarta')->format('Y-m-d H:i') }} WIB">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="session" class="col-sm-4 col-form-label">Session</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[session]" id="session" readonly
                                           value="Session {{ $counselling->getSessionQuantity() }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="counselling_method" class="col-sm-4 col-form-label">Counselling Method</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[counselling_method]" readonly
                                           id="counselling_method" value="{{ $counselling->getCounsellingMethod() }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="patient_birthdate" class="col-sm-4 col-form-label">Patient Birthdate (yyyy-mm-dd)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[patient_birthdate]" readonly
                                           id="patient_birthdate" value="{{ $counselling->user['birthdate']->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="patient_address" class="col-sm-4 col-form-label">Client's Domicile (Regency/ City, Province, if any)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[patient_address]" id="patient_address"
                                           value="{{ old('patient_address', $issues['patient_address']) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="informed_consent" class="col-sm-4 col-form-label">Informed Consent</label>
                                <div class="col-sm-8">
                                    <input type="checkbox" class="d-none" name="issues[informed_consent]" id="informed_consent" checked>
                                    @if($counselling->user->isAgreeToTerm())
                                        <i class="fas fa-check text-success" style="font-size: 24px"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="section-title">Mandated Disclosure</div>
                            <div class="form-group row">
                                <label for="is_sex_harassment" class="col-sm-4 col-form-label">
                                    Is this a case of sexual violence, harassment, or bullying, or is it another case of legal interest?
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="issues[is_sex_harassment]"
                                            id="is_sex_harassment">
                                        <option value="YES" @if($issues['is_sex_harassment'] == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if($issues['is_sex_harassment'] == \App\Models\PatientRecord::NO) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="is_patient_agree" class="col-sm-4 col-form-label">
                                    Does the patient agree if his/her information is used for legal purposes? *REMEMBER: Even in the interests of law, any photos or personal information can only be shared with written consent from the patient
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="issues[is_patient_agree]"
                                            id="is_patient_agree">
                                        <option value="YES" @if($issues['is_patient_agree'] == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if($issues['is_patient_agree'] == \App\Models\PatientRecord::NO) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="referenced_by" class="col-sm-4 col-form-label">Referenced by</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[referenced_by]" id="referenced_by" value="{{ old('referenced_by', $issues['referenced_by']) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reason_for_referral" class="col-sm-4 col-form-label">Reason for referral (if any)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[reason_for_referral]" id="reason_for_referral" value="{{ old('reason_for_referral', $issues['reason_for_referral']) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reason_for_seeking_help" class="col-sm-4 col-form-label">Reasons for seeking help</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[reason_for_seeking_help]" id="reason_for_seeking_help"
                                              maxlength="500">{{ old('reason_for_seeking_help', $issues['reason_for_seeking_help']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="assessment_method" class="col-sm-4 col-form-label">Method of the assessment conducted (if any)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[method_of_assessment]"
                                              id="assessment_method" maxlength="500">{{ old('method_of_assessment', $issues['method_of_assessment']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="assessment_result" class="col-sm-4 col-form-label">Assessment results (if any)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[assessment_result]"
                                              id="assessment_result" maxlength="500">{{ old('assessment_result', $issues['assessment_result']) }}</textarea>
                                </div>
                            </div>
                            <div class="section-title">Patient History</div>
                            <div class="form-group row">
                                <label for="patient_background_history" class="col-sm-4 col-form-label">Patient background history</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[patient_background_history]" id="patient_background_history"
                                              maxlength="500">{{ old('patient_background_history', $issues['patient_background_history']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="patient_personal_data" class="col-sm-4 col-form-label">Patient's Personal Data (age, marital status, number of children, occupation, education, etc.)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[patient_personal_data]" id="patient_personal_data"
                                              maxlength="500">{{ old('patient_personal_data', $issues['patient_personal_data']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="psychological_history" class="col-sm-4 col-form-label">Psychological history (diagnosis/previous treatment)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[psychological_history]"
                                              id="psychological_history" maxlength="500">{{ old('psychological_history', $issues['psychological_history']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="medical_history" class="col-sm-4 col-form-label">Medical history (health conditions, medical history, drug consumption, etc.)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[medical_history]"
                                              id="medical_history" maxlength="500">{{ old('medical_history', $issues['medical_history']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="patient_history" class="col-sm-4 col-form-label">Anamnesis/history of the client (family, childhood development, etc.)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[patient_history]" id="patient_history"
                                              maxlength="500">{{ old('patient_history', $issues['patient_history']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="legal_history" class="col-sm-4 col-form-label">Legal History (Ever or not the client became a victim/perpetrator of a crime)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[legal_history]" id="legal_history"
                                              maxlength="500">{{ old('legal_history', $issues['legal_history']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="traumatic_experience" class="col-sm-4 col-form-label">Traumatic Experience History (if any)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[traumatic_experience]"
                                              id="traumatic_experience" maxlength="500">{{ old('traumatic_experience', $issues['traumatic_experience']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="observation_result" class="col-sm-4 col-form-label">Observation Results (behaviour & mental status)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[observation_result]"
                                              id="observation_result" maxlength="500">{{ old('observation_result', $issues['observation_result']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="psychological_symptoms" class="col-sm-4 col-form-label">Psychological Symptoms (if any)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[psychological_symptoms]"
                                              id="psychological_symptoms" maxlength="500">{{ old('psychological_symptoms', $issues['psychological_symptoms']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="symptoms_management" class="col-sm-4 col-form-label">"Management of current symptoms (e.g. coping strategies)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[symptoms_management]"
                                              id="symptoms_management" maxlength="500">{{ old('symptoms_management', $issues['symptoms_management']) }}</textarea>
                                </div>
                            </div>
                            <div class="section-title">Risk Assessment</div>
                            <div class="form-group row">
                                <label for="self_harm" class="col-sm-4 col-form-label">
                                    Self-Harm Behavior
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="issues[self_harm]"
                                            id="self_harm">
                                        <option value="YES" @if($issues['self_harm'] == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if($issues['self_harm'] == \App\Models\PatientRecord::NO) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="suicidal_thoughts" class="col-sm-4 col-form-label">
                                    Suicidal Thoughts
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="issues[suicidal_thoughts]"
                                            id="suicidal_thoughts">
                                        <option value="YES" @if($issues['suicidal_thoughts'] == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if($issues['suicidal_thoughts'] == \App\Models\PatientRecord::NO) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="suicidal_behavior" class="col-sm-4 col-form-label">
                                    Suicidal Behavior/Attempt
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="issues[suicidal_behavior]"
                                            id="suicidal_behavior">
                                        <option value="YES" @if($issues['suicidal_behavior'] == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if($issues['suicidal_behavior'] == \App\Models\PatientRecord::NO) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="other_risks" class="col-sm-4 col-form-label">
                                    Other risks (if any)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[other_risks]" id="other_risks"
                                              maxlength="500">{{ old('other_risks', $issues['other_risks']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="need_referred" class="col-sm-4 col-form-label">
                                    Need to be referred to local services (offline psychological services)
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="issues[need_referred]" id="need_referred">
                                        <option value="YES" @if($issues['need_referred'] == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if($issues['need_referred'] == \App\Models\PatientRecord::NO) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="session_obstacle" class="col-sm-4 col-form-label">
                                    Barriers during Session (if any)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[session_obstacle]"
                                              id="session_obstacle" maxlength="500">{{ old('session_obstacle', $issues['session_obstacle']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="conclusion" class="col-sm-4 col-form-label">
                                    Conclusion, Diagnosis and Prognosis (if any)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[conclusion]" id="conclusion"
                                              maxlength="500">{{ old('conclusion', $issues['conclusion']) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="treatment_recommendation" class="col-sm-4 col-form-label">
                                    Treatment recommendation (if any)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[treatment_recommendation]"
                                              id="treatment_recommendation" maxlength="500">{{ old('treatment_recommendation', $issues['treatment_recommendation']) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit Records</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-content>

@endsection
