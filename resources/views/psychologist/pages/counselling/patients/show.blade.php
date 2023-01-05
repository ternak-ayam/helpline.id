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
                                <p>Based on Record Keeping Guidelines (APA, 2007) and Kode Etik Psikologi Indonesia
                                    (Himpsi, 2010).</p>
                                <div class="mt-2">
                                    <h4>EMOTIONAL SUPPORT CLIENT REPORT
                                        CHAT WITH EXPERTS
                                    </h4>
                                </div>
                                <p>Silahkan mengisi beberapa pertanyaan berikut sesuai dengan informasi yang diperoleh
                                    saat konseling ya! Jika ada pertanyaan yang tidak bisa terjawab, silahkan dilewati.
                                    Mohon mengingat bahwa data klien bersifat rahasia. Terima kasih.</p>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-sm-4">Isu yang dialami oleh Client</div>
                                <div class="col-sm-8">

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="discrimination">
                                        <label class="custom-control-label"
                                               for="discrimination">Discrimination/Racism</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="relationship">
                                        <label class="custom-control-label" for="relationship">Relationship
                                            Issues</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]" id="family">
                                        <label class="custom-control-label" for="family">Family Issues</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="anxiety">
                                        <label class="custom-control-label" for="anxiety">Anxiety Disorders</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="bipolar">
                                        <label class="custom-control-label" for="bipolar">Bipolar Disorders</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="depression">
                                        <label class="custom-control-label" for="depression">Depression</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="dissociative">
                                        <label class="custom-control-label" for="dissociative">Dissociative
                                            Disorders</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]" id="eating">
                                        <label class="custom-control-label" for="eating">Eating Disorders</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]" id="grief">
                                        <label class="custom-control-label" for="grief">Grief and Bereavement</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="obsessive">
                                        <label class="custom-control-label" for="obsessive">Obsessive-Compulsive
                                            Disorders</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="psychosis">
                                        <label class="custom-control-label" for="psychosis">Psychosis</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="schizoaffective">
                                        <label class="custom-control-label" for="schizoaffective">Schizoaffective
                                            Disorder</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="schizophrenia">
                                        <label class="custom-control-label" for="schizophrenia">Schizophrenia</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]" id="self">
                                        <label class="custom-control-label" for="self">Self Harm/Suicidal
                                            Attempt</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="suicidal">
                                        <label class="custom-control-label" for="suicidal">Suicidal Ideation</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="domestic">
                                        <label class="custom-control-label" for="domestic">Domestic Violence</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]"
                                               id="physical">
                                        <label class="custom-control-label" for="physical">Physical Harassment</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]" id="verbal">
                                        <label class="custom-control-label" for="verbal">Verbal Harassment</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]" id="online">
                                        <label class="custom-control-label" for="online">Online Harassment</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="issues[]" id="sexual">
                                        <label class="custom-control-label" for="sexual">Sexual Harassment</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="counsellor_name" class="col-sm-4 col-form-label">Nama
                                    Konselor/Psikolog</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="counsellor_name" id="counsellor_name"
                                           value="{{ old('counsellor_name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="client_name" class="col-sm-4 col-form-label">Nama Klien</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="client_name" id="client_name"
                                           value="{{ old('client_name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="counselling_date" class="col-sm-4 col-form-label">Tanggal & Waktu
                                    Konseling</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="counselling_date"
                                           id="counselling_date" value="{{ old('counselling_date') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="session" class="col-sm-4 col-form-label">Sesi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="session" id="session"
                                           value="{{ old('session') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="consultation_package" class="col-sm-4 col-form-label">Paket
                                    Konsultasi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="consultation_package"
                                           id="consultation_package" value="{{ old('consultation_package') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="client_birthdate" class="col-sm-4 col-form-label">Tanggal Lahir Klien
                                    (yyyy-mm-dd)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="client_birthdate"
                                           id="client_birthdate" value="{{ old('client_birthdate') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="client_address" class="col-sm-4 col-form-label">Domisili Klien (Kabupaten/
                                    Kota, Provinsi, jika ada)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="client_address" id="client_address"
                                           value="{{ old('client_address') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="informed_consent" class="col-sm-4 col-form-label">Informed Consent</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="informed_consent"
                                           id="informed_consent" value="{{ old('informed_consent') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="is_sex_harassment" class="col-sm-4 col-form-label">
                                    Apakah ini merupakan kasus kekerasan seksual, pelecehan, atau perundungan, atau
                                    kasus lain yang memiliki kepentingan hukum?
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="is_sex_harassment"
                                            id="is_sex_harassment">
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="is_client_agree" class="col-sm-4 col-form-label">
                                    Apakah klien setuju jika informasinya digunakan untuk kepentingan hukum? *INGAT:
                                    Bahkan dalam kepentingan hukum, setiap foto atau informasi pribadi hanya dapat
                                    dibagikan dengan persetujuan tertulis dari klien
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="is_client_agree"
                                            id="is_client_agree">
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="referred_to" class="col-sm-4 col-form-label">Dirujuk oleh (jika klien
                                    dirujuk oleh Expert Bullyid lain)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="referred_to" id="referred_to">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="referred_reason" class="col-sm-4 col-form-label">Alasan dirujuk/referral
                                    (jika ada)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="referred_reason" id="referred_reason">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="complaint" class="col-sm-4 col-form-label">Keluhan/ Alasan Mencari
                                    Bantuan</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="complaint" id="complaint"
                                              maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="assessment_method" class="col-sm-4 col-form-label">Metode Asesmen yang
                                    Dilakukan (jika ada)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="counsellor_name"
                                              id="assessment_method" maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="assessment_result" class="col-sm-4 col-form-label">Hasil Asesmen (jika
                                    ada)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="assessment_result"
                                              id="assessment_result" maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="section-title">Riwayat Hidup Klien</div>
                            <div class="form-group row">
                                <label for="client_data" class="col-sm-4 col-form-label">Data Diri Klien (usia, status
                                    pernikahan, jumlah anak, pekerjaan, pendidikan, dll)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="client_data" id="client_data"
                                              maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="psychologist_history" class="col-sm-4 col-form-label">Riwayat Psikologi
                                    (diagnosa/ treatment sebelumnya)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="psychologist_history"
                                              id="psychologist_history" maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="medical_history" class="col-sm-4 col-form-label">Riwayat Medis (kondisi
                                    kesehatan, riwayat penyakit, konsumsi obat, dll)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="medical_history"
                                              id="medical_history" maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="client_history" class="col-sm-4 col-form-label">Anamnesa/ Sejarah Klien
                                    (keluarga, perkembangan masa kecil, dll)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="client_history" id="client_history"
                                              maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="law_history" class="col-sm-4 col-form-label">Riwayat Hukum (Pernah atau
                                    tidak klien menjadi korban/pelaku dari tindak pidana)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="law_history" id="law_history"
                                              maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="traumatic_history" class="col-sm-4 col-form-label">Riwayat Pengalaman
                                    Traumatis (jika ada)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="traumatic_history"
                                              id="traumatic_history" maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="observation_result" class="col-sm-4 col-form-label">Hasil Observasi
                                    (perilaku & status mental)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="observation_result"
                                              id="observation_result" maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="psychological_symptoms" class="col-sm-4 col-form-label">Gejala Psikologis
                                    (jika ada)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="psychological_symptoms"
                                              id="psychological_symptoms" maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="symptoms_management" class="col-sm-4 col-form-label">Pengelolaan gejala saat
                                    ini (misal strategi coping)</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="symptoms_management"
                                              id="symptoms_management" maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="section-title">Asesmen Risiko</div>
                            <div class="form-group row">
                                <label for="assessment_risk" class="col-sm-4 col-form-label">
                                    Perilaku Melukai Diri (Self-Harm)
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="assessment_risk"
                                            id="assessment_risk">
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="suicide_thinking" class="col-sm-4 col-form-label">
                                    Pikiran Bunuh Diri
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="suicide_thinking"
                                            id="suicide_thinking">
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="suicide_attempt" class="col-sm-4 col-form-label">
                                    Perilaku/ Percobaan Bunuh Diri
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="suicide_attempt"
                                            id="suicide_attempt">
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="another_risk" class="col-sm-4 col-form-label">
                                    Risiko lain (jika ada)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="another_risk" id="another_risk"
                                              maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="need_referred" class="col-sm-4 col-form-label">
                                    Perlu dirujuk ke layanan setempat (offline psychological services)
                                </label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" name="need_referred" id="need_referred">
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="conclusion" class="col-sm-4 col-form-label">
                                    Kesimpulan, Diagnosis, dan Prognosis (jika ada)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="conclusion" id="conclusion"
                                              maxlength="500"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="treatment_recommend" class="col-sm-4 col-form-label">
                                    Rekomendasi Treatment (jika ada)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="treatment_recommend"
                                              id="treatment_recommend" maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="session_obstacle" class="col-sm-4 col-form-label">
                                    Hambatan selama Sesi (jika ada)
                                </label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" name="session_obstacle"
                                              id="session_obstacle" maxlength="250"></textarea>
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
