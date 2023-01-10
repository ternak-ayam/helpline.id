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
                            <div class="form-group row mt-4">
                                <div class="col-sm-4">Issues experienced by the patient:</div>
                                <div class="col-sm-8">

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[discrimination]"
                                               id="discrimination" @if(old('discrimination', $issues['discrimination'] ?? "")) checked @endif>
                                        <label class="custom-control-label"
                                               for="discrimination">Discrimination/Racism</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[relationship]"
                                               id="relationship" @if(old('relationship', $issues['relationship'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="relationship">Relationship
                                            Issues</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[family]" id="family"
                                               @if(old('family', $issues['family'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="family">Family Issues</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[anxiety]"
                                               id="anxiety" @if(old('anxiety', $issues['anxiety'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="anxiety">Anxiety Disorders</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[bipolar]"
                                               id="bipolar" @if(old('bipolar', $issues['bipolar'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="bipolar">Bipolar Disorders</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[depression]"
                                               id="depression" @if(old('depression', $issues['depression'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="depression">Depression</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[dissociative]"
                                               id="dissociative" @if(old('dissociative', $issues['dissociative'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="dissociative">Dissociative
                                            Disorders</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[eating]" id="eating"
                                               @if(old('eating', $issues['eating'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="eating">Eating Disorders</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[grief]" id="grief"
                                               @if(old('grief', $issues['grief'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="grief">Grief and Bereavement</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[obsessive]"
                                               id="obsessive" @if(old('obsessive', $issues['obsessive'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="obsessive">Obsessive-Compulsive
                                            Disorders</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[psychosis]"
                                               id="psychosis" @if(old('psychosis', $issues['psychosis'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="psychosis">Psychosis</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[schizoaffective]"
                                               id="schizoaffective" @if(old('schizoaffective', $issues['schizoaffective'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="schizoaffective">Schizoaffective
                                            Disorder</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[schizophrenia]"
                                               id="schizophrenia" @if(old('schizophrenia', $issues['schizophrenia'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="schizophrenia">Schizophrenia</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[self_harm]" id="self_harm"
                                               @if(old('self_harm', $issues['self_harm'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="self_harm">Self Harm/Suicidal
                                            Attempt</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[suicidal]"
                                               id="suicidal" @if(old('suicidal', $issues['suicidal'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="suicidal">Suicidal Ideation</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[domestic]"
                                               id="domestic" @if(old('domestic', $issues['domestic'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="domestic">Domestic Violence</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[physical]"
                                               id="physical" @if(old('physical', $issues['physical'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="physical">Physical Harassment</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[verbal]" id="verbal"
                                               @if(old('verbal', $issues['verbal'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="verbal">Verbal Harassment</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[online]" id="online"
                                               @if(old('online', $issues['online'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="online">Online Harassment</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[sexual]" id="sexual"
                                               @if(old('sexual', $issues['sexual'] ?? "")) checked @endif>
                                        <label class="custom-control-label" for="sexual">Sexual Harassment</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="counsellor_name" class="col-sm-4 col-form-label">Counsellor/Psychologist</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[counsellor_name]" id="counsellor_name"
                                           value="{{ $counselling->counsellor['name'] }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="patient_name" class="col-sm-4 col-form-label">Patient Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[patient_name]" id="patient_name"
                                           value="{{ old('patient_name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="counselling_date" class="col-sm-4 col-form-label">Counselling Date and Time</label>
                                <div class="col-sm-8">
                                    <input type="datetime-local" class="form-control" name="issues[counselling_date]"
                                           id="counselling_date" value="{{ $counselling->due->timezone($counselling->counsellor['timezone'])->format('Y-m-d H:i') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="session" class="col-sm-4 col-form-label">Session</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[session]" id="session"
                                           value="Ke-{{ $counselling->getSessionQuantity() }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="consultation_package" class="col-sm-4 col-form-label">Counselling Method</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="consultation_package"
                                           id="consultation_package" value="{{ Str::replace('-', ' ', $counselling->counselling_method) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="patient_birthdate" class="col-sm-4 col-form-label">Patient Birthdate (yyyy-mm-dd)</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="issues[patient_birthdate]"
                                           id="patient_birthdate" value="{{ $counselling->user['birthdate']->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="patient_address" class="col-sm-4 col-form-label">Client's Domicile (Regency/ City, Province, if any)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[patient_address]" id="patient_address"
                                           value="{{ old('patient_address') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="informed_consent" class="col-sm-4 col-form-label">Informed Consent</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[informed_consent]"
                                           id="informed_consent" value="{{ $counselling->user->isAgreeToTerm() }}">
                                </div>
                            </div>
                            <div class="section-title">Mandated Disclosure </div>
                            <div class="form-group row">
                                <label for="is_sex_harassment" class="col-sm-4 col-form-label">
                                    Is this a case of sexual violence, harassment, or bullying, or is it another case of legal interest?
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="issues[is_sex_harassment]"
                                            id="is_sex_harassment">
                                        <option value="YES" @if(1 == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if(1 == \App\Models\PatientRecord::NO) selected @endif>No</option>
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
                                        <option value="YES" @if(1 == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if(1 == \App\Models\PatientRecord::NO) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="referenced_by" class="col-sm-4 col-form-label">Referenced by</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[referenced_by]" id="referenced_by" value="{{ old('referenced_by') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reason_for_referral" class="col-sm-4 col-form-label">Reason for referral (if any)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="issues[reason_for_referral]" id="reason_for_referral" value="{{ old('reason_for_referral') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reason_for_seeking_help" class="col-sm-4 col-form-label">Reasons for seeking help</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[reason_for_seeking_help]" id="reason_for_seeking_help"
                                              maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="assessment_method" class="col-sm-4 col-form-label">Method of the assessment conducted (if any)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="assessment_method"
                                              id="assessment_method" maxlength="250">{{ old('assessment_method') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="assessment_result" class="col-sm-4 col-form-label">Assessment results (if any)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="assessment_result"
                                              id="assessment_result" maxlength="250">{{ old('assessment_result') }}</textarea>
                                </div>
                            </div>
                            <div class="section-title">Patient History</div>
                            <div class="form-group row">
                                <label for="patient_background_history" class="col-sm-4 col-form-label">Patient background history</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[patient_background_history]" id="patient_background_history"
                                              maxlength="250">{{ old('patient_background_history') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="patient_personal_data" class="col-sm-4 col-form-label">Patient's Personal Data (age, marital status, number of children, occupation, education, etc.)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="patient_personal_data" id="patient_personal_data"
                                              maxlength="250">{{ old('patient_personal_data') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="psychological_history" class="col-sm-4 col-form-label">Psychological history (diagnosis/previous treatment)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[psychological_history]"
                                              id="psychological_history" maxlength="250">{{ old('psychological_history') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="medical_history" class="col-sm-4 col-form-label">Medical history (health conditions, medical history, drug consumption, etc.)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[medical_history]"
                                              id="medical_history" maxlength="250">{{ old('medical_history') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="patient_history" class="col-sm-4 col-form-label">Anamnesis/history of the client (family, childhood development, etc.)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[patient_history]" id="patient_history"
                                              maxlength="250">{{ old('patient_history') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="legal_history" class="col-sm-4 col-form-label">Legal History (Ever or not the client became a victim/perpetrator of a crime)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[legal_history]" id="legal_history"
                                              maxlength="250">{{ old('legal_history') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="traumatic_experience" class="col-sm-4 col-form-label">Traumatic Experience History (if any)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[traumatic_experience]"
                                              id="traumatic_experience" maxlength="250">{{ old('traumatic_experience') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="observation_result" class="col-sm-4 col-form-label">Observation Results (behaviour & mental status)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[observation_result]"
                                              id="observation_result" maxlength="250">{{ old('observation_result') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="psychological_symptoms" class="col-sm-4 col-form-label">Psychological Symptoms (if any)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[psychological_symptoms]"
                                              id="psychological_symptoms" maxlength="250">{{ old('psychological_symptoms') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="symptoms_management" class="col-sm-4 col-form-label">"Management of current symptoms (e.g. coping strategies)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[symptoms_management]"
                                              id="symptoms_management" maxlength="250">{{ old('symptoms_management') }}</textarea>
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
                                        <option value="YES" @if(1 == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if(1 == \App\Models\PatientRecord::NO) selected @endif>No</option>
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
                                        <option value="YES" @if(1 == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if(1 == \App\Models\PatientRecord::NO) selected @endif>No</option>
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
                                        <option value="YES" @if(1 == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if(1 == \App\Models\PatientRecord::NO) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="other_risks" class="col-sm-4 col-form-label">
                                    Other risks (if any)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[other_risks]" id="other_risks"
                                              maxlength="250">{{ old('other_risks') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="need_referred" class="col-sm-4 col-form-label">
                                    Need to be referred to local services (offline psychological services)
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="issues[need_referred]" id="need_referred">
                                        <option value="YES" @if(1 == \App\Models\PatientRecord::YES) selected @endif>Yes</option>
                                        <option value="NO" @if(1 == \App\Models\PatientRecord::NO) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="session_obstacle" class="col-sm-4 col-form-label">
                                    Barriers during Session (if any)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[session_obstacle]"
                                              id="session_obstacle" maxlength="250">{{ old('session_obstacle') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="conclusion" class="col-sm-4 col-form-label">
                                    Conclusion, Diagnosis and Prognosis (if any)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[conclusion]" id="conclusion"
                                              maxlength="500">{{ old('conclusion') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="treatment_recommendation" class="col-sm-4 col-form-label">
                                    Treatment recommendation (if any)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="issues[treatment_recommendation]"
                                              id="treatment_recommendation" maxlength="250">{{ old('treatment_recommendation') }}</textarea>
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
