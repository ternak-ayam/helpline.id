@extends('layouts.admin')

@section('title', 'Counselling Detail')

@section('css')

@endsection

@section('js')

@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Counselling Detail</h1>
        </x-slot>
        <form method="post" action="#">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6 px-0 my-auto">
                                <h4>{{ $schedule->counselling['counselling_id'] }}</h4>
                            </div>
                            <div class="col-6 px-0 text-right">
                                <div class="badge badge-success text-capitalize">
                                    {{ Str::lower($schedule->counselling['status']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <span class="text-title">Counsellor Information</span>
                            </div>
                            <div>
                                <span>{{ $schedule->counsellor['name'] }}</span>
                            </div>
                            <div>
                                <span>{{ $schedule->counsellor['email'] }}</span>
                            </div>
                            <div>
                                <span>{{ $schedule->counsellor['bio'] }}</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div>
                                <span class="text-title">Client Information</span>
                            </div>
                            <div>
                                <span>{{ $schedule->counselling['user']['email'] }}</span>
                            </div>
                            <div>
                                <span>{{ $schedule->counselling['user']['country'] }}</span>
                            </div>
                            <div>
                                <span>{{ Str::ucfirst($schedule->counselling['user']['sex']) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div>
                                <div>
                                    <span class="text-title">Counsellor Education</span>
                                </div>
                                @foreach($schedule->counsellor['educations'] as $education)
                                    <div>
                                        <span>{{ $education->major . ' - ' . $education->institution }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-2">
                                <div>
                                    <span class="text-title">Counsellor Language</span>
                                </div>
                                @foreach($schedule->counsellor['languages'] as $language)
                                    <div>
                                        <span>{{ $language->language }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div>
                                <span class="text-title">Counselling Detail</span>
                            </div>
                            <div>
                                <span>{{ $schedule->counselling->getCounsellingMethod() }}</span>
                            </div>
                            <div>
                                <span>{{ $schedule->counselling['due']->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</span>
                            </div>
                            @if($schedule->counselling['is_need_translator'])
                                <div class="mt-2">
                                    <span class="text-title">Translator</span>
                                </div>
                                <div>
                                    <span>{{ $schedule->counselling['translator']['name'] }}</span>
                                </div>
                                <div>
                                    <span>{{ $schedule->counselling['translator']['language'] }}</span>
                                </div>
                            @endif
                            <div class="mt-2">
                                <span class="text-title">Booked At</span>
                            </div>
                            <div>
                                <span>{{ $schedule->counselling['created_at']->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <div class="mx-1">
                            <a href="{{ route('admin.counselling.schedule.index') }}" class="btn border bg-white"
                               type="button">Back</a>
                        </div>
                        <div class="mx-1">
                            <a href="#" class="btn btn-primary"
                               type="button">Download Patient Records</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-content>
@endsection
