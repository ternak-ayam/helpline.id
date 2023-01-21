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
            <input type="checkbox" class="custom-control-input" name="issues[anxiety]"
                   id="anxiety" @if(old('anxiety', $issues['anxiety'])) checked @endif>
            <label class="custom-control-label" for="anxiety">Anxiety disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[adjustment]" id="adjustment"
                   @if(old('adjustment', $issues['adjustment'])) checked @endif>
            <label class="custom-control-label" for="adjustment">Adjustment disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[anxiety]"
                   id="anxiety" @if(old('anxiety', $issues['anxiety'])) checked @endif>
            <label class="custom-control-label" for="anxiety">Anxiety Disorders</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[bipolar]"
                   id="bipolar" @if(old('bipolar', $issues['bipolar'])) checked @endif>
            <label class="custom-control-label" for="bipolar">Bipolar disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[brief]"
                   id="brief" @if(old('brief', $issues['brief'])) checked @endif>
            <label class="custom-control-label" for="brief">Brief Psychotic disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[delusional]"
                   id="delusional" @if(old('delusional', $issues['delusional'])) checked @endif>
            <label class="custom-control-label" for="delusional">Delusional disorders</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[depression]" id="depression"
                   @if(old('depression', $issues['depression'])) checked @endif>
            <label class="custom-control-label" for="depression">Depression episode</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[dissociative]" id="dissociative"
                   @if(old('dissociative', $issues['dissociative'])) checked @endif>
            <label class="custom-control-label" for="dissociative">Dissociative and conversion disorder, unspecified</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[eating]"
                   id="eating" @if(old('eating', $issues['eating'])) checked @endif>
            <label class="custom-control-label" for="eating">Eating Disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[generalized]"
                   id="generalized" @if(old('generalized', $issues['generalized'])) checked @endif>
            <label class="custom-control-label" for="generalized">Generalized anxiety disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[intentional]"
                   id="intentional" @if(old('intentional', $issues['intentional'])) checked @endif>
            <label class="custom-control-label" for="intentional">Intentional self-harm</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[impulse]"
                   id="impulse" @if(old('impulse', $issues['impulse'])) checked @endif>
            <label class="custom-control-label" for="impulse">Impulse disorder, unspecified</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[impulse]" id="impulse"
                   @if(old('impulse', $issues['impulse'])) checked @endif>
            <label class="custom-control-label" for="impulse">Impulse disorders</label>
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
            <input type="checkbox" class="custom-control-input" name="issues[mixed]"
                   id="mixed" @if(old('mixed', $issues['mixed'])) checked @endif>
            <label class="custom-control-label" for="mixed">Mixed anxiety and depressive disorder</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[mood]" id="mood"
                   @if(old('mood', $issues['mood'])) checked @endif>
            <label class="custom-control-label" for="mood">Mood disorder due to known physiological condition, unspecified</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[other]" id="other"
                   @if(old('other', $issues['other'])) checked @endif>
            <label class="custom-control-label" for="other">Other mental disorder due to known physiological condition</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[obsessive-compulsive]" id="obsessive-compulsive"
                   @if(old('obsessive-compulsive', $issues['obsessive-compulsive'])) checked @endif>
            <label class="custom-control-label" for="obsessive-compulsive">Obsessive-compulsive disorder, unspecified</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[post-traumatic]" id="post-traumatic"
                   @if(old('post-traumatic', $issues['post-traumatic'])) checked @endif>
            <label class="custom-control-label" for="post-traumatic">Post-traumatic stress disorder (PTSD)</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[panic]" id="panic"
                   @if(old('panic', $issues['panic'])) checked @endif>
            <label class="custom-control-label" for="panic">Panic Disorder</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[personality]" id="personality"
                   @if(old('personality', $issues['personality'])) checked @endif>
            <label class="custom-control-label" for="personality">Personality disorder, unspecified
</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[psychosis]" id="psychosis"
                   @if(old('psychosis', $issues['psychosis'])) checked @endif>
            <label class="custom-control-label" for="psychosis">Psychosis</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[sleep]" id="sleep"
                   @if(old('sleep', $issues['sleep'])) checked @endif>
            <label class="custom-control-label" for="sleep">Sleep disorder</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[somatoform]" id="somatoform"
                   @if(old('somatoform', $issues['somatoform'])) checked @endif>
            <label class="custom-control-label" for="somatoform">Somatoform disorder</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[schizoaffective]" id="schizoaffective"
                   @if(old('schizoaffective', $issues['schizoaffective'])) checked @endif>
            <label class="custom-control-label" for="schizoaffective">Schizoaffective disorders</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[schizophrenia]" id="schizophrenia"
                   @if(old('schizophrenia', $issues['schizophrenia'])) checked @endif>
            <label class="custom-control-label" for="schizophrenia">Schizophrenia</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[suicide]" id="suicide"
                   @if(old('suicide', $issues['suicide'])) checked @endif>
            <label class="custom-control-label" for="suicide">Suicide attempt</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[suicidal]" id="suicidal"
                   @if(old('suicidal', $issues['suicidal'])) checked @endif>
            <label class="custom-control-label" for="suicidal">Suicidal ideations</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[violent]" id="violent"
                   @if(old('violent', $issues['violent'])) checked @endif>
            <label class="custom-control-label" for="violent">Violent behaviour</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[others]" id="others"
                   @if(old('others', $issues['others'])) checked @endif>
            <label class="custom-control-label" for="others">Others</label>
        </div>

    </div>
</div>
