<html lang="en">
<head>
    <title>Patient Record Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .text-center {
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 2rem;
        }

        .mt-4 {
            margin-top: 2rem;
        }

        .mt-2 {
            margin-top: 1rem;
        }

        .ml-2 {
            margin-left: 1rem;
        }

        .flex {
            display: flex;
        }

        .my-2 {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .p-4 {
            padding: 1rem;
        }

        .bg-green {
            background-color: #3bb557;
        }

        .bg-red {
            background-color: #b02a37;
        }

        .text-small {
            font-size: 12px;
        }

        .text-left {
            text-align: left;
        }
        .label {
            color: white;
            padding: 8px;
        }

        .success {background-color: #04AA6D;} /* Green */
        .info {background-color: #2196F3;} /* Blue */
        .warning {background-color: #ff9800;} /* Orange */
        .danger {background-color: #f44336;} /* Red */
        .other {background-color: #e7e7e7; color: black;} /* Gray */
    </style>
</head>

<body>
<div class="text-right">
    <img style="width: 240px" src="{{ base_path('public/assets/logo_helpline.png') }}" alt="Logo Helpline">
</div>
<div class="text-center mb-4">
    <div class="mt-2">
        <h4>EMOTIONAL SUPPORT PATIENT REPORT
        </h4>
    </div>
    <p class="text-small text-left">Please fill in the following questions according to the information obtained during
        the counselling! If a question cannot be answered, please skip it. Please remember that patient data is
        confidential.</p>
</div>
<div class="my-2">
    <p>Does the patient require emergency support?</p>
    <div>
        @if($issues['emergency_support'] === "YES")
            <span class="label success">YES</span>
        @else
            <span class="label danger">NO</span>
        @endif
    </div>
</div>
@if($issues['emergency_support'] === "YES")
<div>
    <div class="mt-4" id="emergency_support_choice">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input"
                   name="issues[patient_indicated_ideation_self]"
                   id="patient_indicated_ideation_self"
                   @if(old('patient_indicated_ideation_self', $issues['patient_indicated_ideation_self'])) checked @endif>
            <label class="custom-control-label"
                   for="patient_indicated_ideation_self">Patient initiated
                self-harm/requires immediate help (Hospital/Police)</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input"
                   name="issues[patient_indicated_ideation]"
                   id="patient_indicated_ideation"
                   @if(old('patient_indicated_ideation', $issues['patient_indicated_ideation'])) checked @endif>
            <label class="custom-control-label"
                   for="patient_indicated_ideation">Patient indicated suicidal
                ideation/requires a follow-up with a Psychologist</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input"
                   name="issues[patient_indicated_attempt]"
                   id="patient_indicated_attempt"
                   @if(old('patient_indicated_attempt', $issues['patient_indicated_attempt'])) checked @endif>
            <label class="custom-control-label"
                   for="patient_indicated_attempt">Patient indicated a suicidal
                attempt/requires a follow-up with a Psychiatrist
            </label>
        </div>
    </div>
</div>
@endif
<div>
    @include('psychologist.pages.counselling.patients.question.counsellor', ['textView' => true])
    @include('psychologist.pages.counselling.patients.question.psychologist', ['textView' => true])
</div>
<table class="table table-striped mt-4">
    <thead>
    <tr>
        <th>No</th>
        <th>Question</th>
        <th>Answer</th>
    </tr>
    </thead>
    <tbody>

    @foreach($questions as $question)
        @if($question->key != "emergency_support")
        <tr>
            @if($question->no == 12)
                <td rowspan="2">{{ $question->no }}</td>
            @elseif(blank($question->no))
            @else
                <td>{{ $question->no }}</td>
            @endif
            <td>{{ $question->question }}</td>
            @if($question->key == "counselling_date")
                <td>{{ Str::replace('T', ' ', $issues[$question->key]) }}</td>
            @elseif($question->key == "informed_consent")
                <td><input type="checkbox" checked></td>
            @else
                <td>{{ $issues[$question->key] }}</td>
            @endif
        </tr>
        @endif
    @endforeach

    </tbody>
</table>
</body>
</html>
