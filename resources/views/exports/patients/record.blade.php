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

        .text-small {
            font-size: 12px;
        }

        .text-left {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="text-center mb-4">
    <div class="mt-2">
        <h4>EMOTIONAL SUPPORT PATIENT REPORT
        </h4>
    </div>
    <p class="text-small text-left">Please fill in the following questions according to the information obtained during
        the counselling! If a question cannot be answered, please skip it. Please remember that patient data is
        confidential.</p>
</div>
<div>
    <p class="text-small text-left">Issues experienced by the patient:</p>
    <div class="mt-2">
        <div class="col-sm-8">

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[discrimination]"
                       id="discrimination" @if(old('discrimination', $issues['discrimination'])) checked @endif>
                <label class="custom-control-label"
                       for="discrimination">Discrimination/Racism</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[relationship]"
                       id="relationship" @if(old('relationship', $issues['relationship'])) checked @endif>
                <label class="custom-control-label" for="relationship">Relationship
                    Issues</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[family]" id="family"
                       @if(old('family', $issues['family'])) checked @endif>
                <label class="custom-control-label" for="family">Family Issues</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[anxiety]"
                       id="anxiety" @if(old('anxiety', $issues['anxiety'])) checked @endif>
                <label class="custom-control-label" for="anxiety">Anxiety Disorders</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[bipolar]"
                       id="bipolar" @if(old('bipolar', $issues['bipolar'])) checked @endif>
                <label class="custom-control-label" for="bipolar">Bipolar Disorders</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[depression]"
                       id="depression" @if(old('depression', $issues['depression'])) checked @endif>
                <label class="custom-control-label" for="depression">Depression</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[dissociative]"
                       id="dissociative" @if(old('dissociative', $issues['dissociative'])) checked @endif>
                <label class="custom-control-label" for="dissociative">Dissociative
                    Disorders</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[eating]" id="eating"
                       @if(old('eating', $issues['eating'])) checked @endif>
                <label class="custom-control-label" for="eating">Eating Disorders</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[grief]" id="grief"
                       @if(old('grief', $issues['grief'])) checked @endif>
                <label class="custom-control-label" for="grief">Grief and Bereavement</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[obsessive]"
                       id="obsessive" @if(old('obsessive', $issues['obsessive'])) checked @endif>
                <label class="custom-control-label" for="obsessive">Obsessive-Compulsive
                    Disorders</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[psychosis]"
                       id="psychosis" @if(old('psychosis', $issues['psychosis'])) checked @endif>
                <label class="custom-control-label" for="psychosis">Psychosis</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[schizoaffective]"
                       id="schizoaffective" @if(old('schizoaffective', $issues['schizoaffective'])) checked @endif>
                <label class="custom-control-label" for="schizoaffective">Schizoaffective
                    Disorder</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[schizophrenia]"
                       id="schizophrenia" @if(old('schizophrenia', $issues['schizophrenia'])) checked @endif>
                <label class="custom-control-label" for="schizophrenia">Schizophrenia</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[self_harm]" id="self_harm"
                       @if(old('self_harm', $issues['self_harm'])) checked @endif>
                <label class="custom-control-label" for="self_harm">Self Harm/Suicidal
                    Attempt</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[suicidal]"
                       id="suicidal" @if(old('suicidal', $issues['suicidal'])) checked @endif>
                <label class="custom-control-label" for="suicidal">Suicidal Ideation</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[domestic]"
                       id="domestic" @if(old('domestic', $issues['domestic'])) checked @endif>
                <label class="custom-control-label" for="domestic">Domestic Violence</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[physical]"
                       id="physical" @if(old('physical', $issues['physical'])) checked @endif>
                <label class="custom-control-label" for="physical">Physical Harassment</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[verbal]" id="verbal"
                       @if(old('verbal', $issues['verbal'])) checked @endif>
                <label class="custom-control-label" for="verbal">Verbal Harassment</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[online]" id="online"
                       @if(old('online', $issues['online'])) checked @endif>
                <label class="custom-control-label" for="online">Online Harassment</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="issues[sexual]" id="sexual"
                       @if(old('sexual', $issues['sexual'])) checked @endif>
                <label class="custom-control-label" for="sexual">Sexual Harassment</label>
            </div>
        </div>
    </div>
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
        <tr>
            @if($question->no == 9)
                <td rowspan="2">{{ $question->no }}</td>
            @elseif(blank($question->no))
            @else
                <td>{{ $question->no }}</td>
            @endif
            <td>{{ $question->question }}</td>
            @if($question->key == "counselling_date")
                <td>{{ Str::replace('T', ' ', $issues[$question->key]) }}</td>
            @else
                <td>{{ $issues[$question->key] }}</td>
            @endif
        </tr>
    @endforeach

    </tbody>
</table>
</body>
</html>
