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
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <p>Based on Record Keeping Guidelines (APA, 2007) and Kode Etik Psikologi Indonesia (Himpsi, 2010).</p>
                            <div class="mt-2">
                                <h4>EMOTIONAL SUPPORT CLIENT REPORT
                                    CHAT WITH EXPERTS
                                </h4>
                            </div>
                            <p>Silahkan mengisi beberapa pertanyaan berikut sesuai dengan informasi yang diperoleh saat konseling ya! Jika ada pertanyaan yang tidak bisa terjawab, silahkan dilewati. Mohon mengingat bahwa data klien bersifat rahasia. Terima kasih.</p>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-sm-4">Isu yang dialami oleh Client</div>
                            <div class="col-sm-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                    <label class="form-check-label" for="gridCheck1">
                                        Example checkbox
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="counsellor_name" class="col-sm-4 col-form-label">Nama Konselor/Psikolog</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="counsellor_name" id="counsellor_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="counsellor_name" class="col-sm-4 col-form-label">Nama Klien</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="counsellor_name" id="counsellor_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="counsellor_name" class="col-sm-4 col-form-label">Tanggal & Waktu Konseling</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="counsellor_name" id="counsellor_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="counsellor_name" class="col-sm-4 col-form-label">Sesi</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="counsellor_name" id="counsellor_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="counsellor_name" class="col-sm-4 col-form-label">Paket Konsultasi</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="counsellor_name" id="counsellor_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="counsellor_name" class="col-sm-4 col-form-label">Tanggal Lahir Klien (yyyy-mm-dd)</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="counsellor_name" id="counsellor_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="counsellor_name" class="col-sm-4 col-form-label">Domisili Klien (Kabupaten/ Kota, Provinsi, jika ada)</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="counsellor_name" id="counsellor_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="counsellor_name" class="col-sm-4 col-form-label">Informed Consent</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="counsellor_name" id="counsellor_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="counsellor_name" class="col-sm-4 col-form-label">Mandated Disclosure
                                Apakah ini merupakan kasus kekerasan seksual, pelecehan, atau perundungan, atau kasus lain yang memiliki kepentingan hukum?
                            </label>
                            <div class="col-sm-8">
                                <select type="email" class="form-control" name="counsellor_name" id="counsellor_name">
                                    <option value="tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="counsellor_name" class="col-sm-4 col-form-label">
                                Apakah klien setuju jika informasinya digunakan untuk kepentingan hukum? *INGAT: Bahkan dalam kepentingan hukum, setiap foto atau informasi pribadi hanya dapat dibagikan dengan persetujuan tertulis dari klien
                            </label>
                            <div class="col-sm-8">
                                <select type="email" class="form-control" name="counsellor_name" id="counsellor_name">
                                    <option value="tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="counsellor_name" class="col-sm-4 col-form-label">Dirujuk oleh (jika klien dirujuk oleh Expert Bullyid lain)</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="counsellor_name" id="counsellor_name">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit Records</button>
                    </div>
                </div>
            </div>
        </div>
    </x-content>

@endsection
