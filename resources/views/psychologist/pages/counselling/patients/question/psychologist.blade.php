<div class="form-group row mt-4">
    <div class="col-sm-4">Issues experienced by the patient (Psychologist)</div>
    <div class="col-sm-8">

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[acute]"
                   id="acute" @if(old('acute', $issues['acute'])) checked @endif>
            <label class="custom-control-label"
                   for="acute">Acute stress reaction</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[anxiety_disorder]"
                   id="anxiety_disorder" @if(old('anxiety_disorder', $issues['anxiety_disorder'])) checked @endif>
            <label class="custom-control-label" for="anxiety_disorder">Anxiety disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[adjustment_disorder]" id="adjustment_disorder"
                   @if(old('adjustment_disorder', $issues['adjustment_disorder'])) checked @endif>
            <label class="custom-control-label" for="adjustment_disorder">Adjustment disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[bipolar_disorder]"
                   id="bipolar_disorder" @if(old('bipolar_disorder', $issues['bipolar_disorder'])) checked @endif>
            <label class="custom-control-label" for="bipolar_disorder">Bipolar Disorders</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[brief_psychotic]"
                   id="brief_psychotic" @if(old('brief_psychotic', $issues['brief_psychotic'])) checked @endif>
            <label class="custom-control-label" for="brief_psychotic">Brief Psychotic disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[delusional]"
                   id="delusional" @if(old('delusional', $issues['delusional'])) checked @endif>
            <label class="custom-control-label" for="delusional">Delusional disorders</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[depression_episode]" id="depression_episode"
                   @if(old('depression_episode', $issues['depression_episode'])) checked @endif>
            <label class="custom-control-label" for="depression_episode">Depression episode</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[dissociative_conversion]" id="dissociative_conversion"
                   @if(old('dissociative_conversion', $issues['dissociative_conversion'])) checked @endif>
            <label class="custom-control-label" for="dissociative_conversion">Dissociative and conversion disorder, unspecified</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[eating_disorder]"
                   id="eating_disorder" @if(old('eating_disorder', $issues['eating_disorder'])) checked @endif>
            <label class="custom-control-label" for="eating_disorder">Eating Disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[generalized]"
                   id="generalized" @if(old('generalized', $issues['generalized'])) checked @endif>
            <label class="custom-control-label" for="generalized">Generalized anxiety_disorder disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[intentional_self_harm]"
                   id="intentional_self_harm" @if(old('intentional_self_harm', $issues['intentional_self_harm'])) checked @endif>
            <label class="custom-control-label" for="intentional_self_harm">Intentional self-harm</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[impulse_disorders]" id="impulse_disorders"
                   @if(old('impulse_disorders', $issues['impulse_disorders'])) checked @endif>
            <label class="custom-control-label" for="impulse_disorders">Impulse disorders</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[impulse_unspecified]"
                   id="impulse_unspecified" @if(old('impulse_unspecified', $issues['impulse_unspecified'])) checked @endif>
            <label class="custom-control-label" for="impulse_unspecified">Impulse disorder, unspecified</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[major]"
                   id="major" @if(old('major', $issues['major'])) checked @endif>
            <label class="custom-control-label" for="major">Major depressive disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[manic]"
                   id="manic" @if(old('manic', $issues['manic'])) checked @endif>
            <label class="custom-control-label" for="manic">Manic episode</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[mixed_anxiety]"
                   id="mixed_anxiety" @if(old('mixed_anxiety', $issues['mixed_anxiety'])) checked @endif>
            <label class="custom-control-label" for="mixed_anxiety">Mixed anxiety_disorder and depressive disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[mood_disorder]" id="mood_disorder"
                   @if(old('mood_disorder', $issues['mood_disorder'])) checked @endif>
            <label class="custom-control-label" for="mood_disorder">Mood disorder due to known physiological condition, unspecified</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[other_mental]" id="other_mental"
                   @if(old('other_mental', $issues['other_mental'])) checked @endif>
            <label class="custom-control-label" for="other_mental">Other mental disorder due to known physiological condition</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[obsessive_compulsive]" id="obsessive_compulsive"
                   @if(old('obsessive_compulsive', $issues['obsessive_compulsive'])) checked @endif>
            <label class="custom-control-label" for="obsessive_compulsive">Obsessive-compulsive disorder, unspecified</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[post_traumatic]" id="post_traumatic"
                   @if(old('post_traumatic', $issues['post_traumatic'])) checked @endif>
            <label class="custom-control-label" for="post_traumatic">Post-traumatic stress disorder (PTSD)</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[panic_disorder]" id="panic_disorder"
                   @if(old('panic_disorder', $issues['panic_disorder'])) checked @endif>
            <label class="custom-control-label" for="panic_disorder">Panic Disorder</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[personality]" id="personality"
                   @if(old('personality', $issues['personality'])) checked @endif>
            <label class="custom-control-label" for="personality">Personality disorder, unspecified
</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[psychosis_psychologist]" id="psychosis_psychologist"
                   @if(old('psychosis_psychologist', $issues['psychosis_psychologist'])) checked @endif>
            <label class="custom-control-label" for="psychosis_psychologist">Psychosis</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[sleep_disorder]" id="sleep_disorder"
                   @if(old('sleep_disorder', $issues['sleep_disorder'])) checked @endif>
            <label class="custom-control-label" for="sleep_disorder">Sleep disorder</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[somatoform]" id="somatoform"
                   @if(old('somatoform', $issues['somatoform'])) checked @endif>
            <label class="custom-control-label" for="somatoform">Somatoform disorder</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[schizoaffective_disorder]" id="schizoaffective_disorder"
                   @if(old('schizoaffective_disorder', $issues['schizoaffective_disorder'])) checked @endif>
            <label class="custom-control-label" for="schizoaffective_disorder">Schizoaffective disorders</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[schizophrenia_psychologist]" id="schizophrenia_psychologist"
                   @if(old('schizophrenia_psychologist', $issues['schizophrenia_psychologist'])) checked @endif>
            <label class="custom-control-label" for="schizophrenia_psychologist">Schizophrenia</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[suicide_attempt_psychologist]" id="suicide_attempt_psychologist"
                   @if(old('suicide_attempt_psychologist', $issues['suicide_attempt_psychologist'])) checked @endif>
            <label class="custom-control-label" for="suicide_attempt_psychologist">Suicide attempt</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[suicidal_ideations]" id="suicidal_ideations"
                   @if(old('suicidal_ideations', $issues['suicidal_ideations'])) checked @endif>
            <label class="custom-control-label" for="suicidal_ideations">Suicidal ideations</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[violent]" id="violent"
                   @if(old('violent', $issues['violent'])) checked @endif>
            <label class="custom-control-label" for="violent">Violent behaviour</label>
        </div>
        @if($textView ?? false)
            Others: {{ $issues['others_psychologist'] }}
        @else
         <div class="form-group">
            <label for="others_psychologist">Others</label>
            <input type="text" class="form-control" name="issues[others_psychologist]" id="others_psychologist" value="{{ old('others_psychologist', $issues['others_psychologist']) }}">
        </div>
        @endif
    </div>
</div>
