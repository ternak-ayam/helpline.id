<div class="form-group row mt-4">
    <div class="col-sm-4">Issues experienced by the patient (Counsellor)</div>
    <div class="col-sm-8">

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[adjustment]"
                   id="adjustment" @if(old('adjustment', $issues['adjustment'])) checked @endif>
            <label class="custom-control-label"
                   for="adjustment">Adjustment issues</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[aggression]"
                   id="aggression" @if(old('aggression', $issues['aggression'])) checked @endif>
            <label class="custom-control-label" for="aggression">Aggression and Violence</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[agoraphobia]" id="agoraphobia"
                   @if(old('agoraphobia', $issues['agoraphobia'])) checked @endif>
            <label class="custom-control-label" for="agoraphobia">Agoraphobia</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[alcohol]"
                   id="alcohol" @if(old('alcohol', $issues['alcohol'])) checked @endif>
            <label class="custom-control-label" for="alcohol">Alcohol and substance abuse </label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[anger]"
                   id="anger" @if(old('anger', $issues['anger'])) checked @endif>
            <label class="custom-control-label" for="anger">Anger</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[anxiety]"
                   id="anxiety" @if(old('anxiety', $issues['anxiety'])) checked @endif>
            <label class="custom-control-label" for="anxiety">Anxiety</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[borderline]"
                   id="borderline" @if(old('borderline', $issues['borderline'])) checked @endif>
            <label class="custom-control-label" for="borderline">Borderline Personality</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[bullying]" id="bullying"
                   @if(old('bullying', $issues['bullying'])) checked @endif>
            <label class="custom-control-label" for="bullying">Bullying</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[caregiver]" id="caregiver"
                   @if(old('caregiver', $issues['caregiver'])) checked @endif>
            <label class="custom-control-label" for="caregiver">Caregiver Stress</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[children]"
                   id="children" @if(old('children', $issues['children'])) checked @endif>
            <label class="custom-control-label" for="children">Children Issues</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[chronic]"
                   id="chronic" @if(old('chronic', $issues['chronic'])) checked @endif>
            <label class="custom-control-label" for="chronic">Chronic Illness / Disability</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[communication]"
                   id="communication" @if(old('communication', $issues['communication'])) checked @endif>
            <label class="custom-control-label" for="communication">Communication Problems</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[depression]"
                   id="depression" @if(old('depression', $issues['depression'])) checked @endif>
            <label class="custom-control-label" for="depression">Depression</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[dissociation]" id="dissociation"
                   @if(old('dissociation', $issues['dissociation'])) checked @endif>
            <label class="custom-control-label" for="dissociation">Dissociation</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[divorce]"
                   id="divorce" @if(old('divorce', $issues['divorce'])) checked @endif>
            <label class="custom-control-label" for="divorce">Divorce / Divorce Adjustment</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[domestic]"
                   id="domestic" @if(old('domestic', $issues['domestic'])) checked @endif>
            <label class="custom-control-label" for="domestic">Domestic Violence</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[eating]"
                   id="eating" @if(old('eating', $issues['eating'])) checked @endif>
            <label class="custom-control-label" for="eating">Eating concern</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[emotional]" id="emotional"
                   @if(old('emotional', $issues['emotional'])) checked @endif>
            <label class="custom-control-label" for="emotional">Emotional Abuse</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[emotional]" id="emotional"
                   @if(old('emotional', $issues['emotional'])) checked @endif>
            <label class="custom-control-label" for="emotional">Emotional Overwhelm</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[family]" id="family"
                   @if(old('family', $issues['family'])) checked @endif>
            <label class="custom-control-label" for="family">Family Problems</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[fear]" id="fear"
                   @if(old('fear', $issues['fear'])) checked @endif>
            <label class="custom-control-label" for="fear">Fear</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[grief]" id="grief"
                   @if(old('grief', $issues['grief'])) checked @endif>
            <label class="custom-control-label" for="grief">Grief, Loss, and Bereavement </label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[gender]" id="gender"
                   @if(old('gender', $issues['gender'])) checked @endif>
            <label class="custom-control-label" for="gender">Gender identity</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[health]" id="health"
                   @if(old('health', $issues['health'])) checked @endif>
            <label class="custom-control-label" for="health">Health / Illness / Medical Issues</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[helplessness]" id="helplessness"
                   @if(old('helplessness', $issues['helplessness'])) checked @endif>
            <label class="custom-control-label" for="helplessness">Helplessness / Victimhood</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[isolation]" id="isolation"
                   @if(old('isolation', $issues['isolation'])) checked @endif>
            <label class="custom-control-label" for="isolation">Isolation</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[marriage]" id="marriage"
                   @if(old('marriage', $issues['marriage'])) checked @endif>
            <label class="custom-control-label" for="marriage">Marriage relation issue</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[mens]" id="mens"
                   @if(old('mens', $issues['mens'])) checked @endif>
            <label class="custom-control-label" for="mens">Men’s Issues and Problems</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[money]" id="money"
                   @if(old('money', $issues['money'])) checked @endif>
            <label class="custom-control-label" for="money">Money and Financial Issues</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[mood]" id="mood"
                   @if(old('mood', $issues['mood'])) checked @endif>
            <label class="custom-control-label" for="mood">Mood Swings</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[minority]" id="minority"
                   @if(old('minority', $issues['minority'])) checked @endif>
            <label class="custom-control-label" for="minority">Minority Concerns</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[ocd]" id="ocd"
                   @if(old('ocd', $issues['ocd'])) checked @endif>
            <label class="custom-control-label" for="ocd">OCD / Obsessions and Compulsions</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[panic]" id="panic"
                   @if(old('panic', $issues['panic'])) checked @endif>
            <label class="custom-control-label" for="panic">Panic and Panic Attacks</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[paranoia]" id="paranoia"
                   @if(old('paranoia', $issues['paranoia'])) checked @endif>
            <label class="custom-control-label" for="paranoia">Paranoia</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[parenting]" id="parenting"
                   @if(old('parenting', $issues['parenting'])) checked @endif>
            <label class="custom-control-label" for="parenting">Parenting</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[phobias]" id="phobias"
                   @if(old('phobias', $issues['phobias'])) checked @endif>
            <label class="custom-control-label" for="phobias">Phobias</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[physical]" id="physical"
                   @if(old('physical', $issues['physical'])) checked @endif>
            <label class="custom-control-label" for="physical">Physical Abuse</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[postpartum]" id="postpartum"
                   @if(old('postpartum', $issues['postpartum'])) checked @endif>
            <label class="custom-control-label" for="postpartum">Postpartum Depression</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[pregnancy]" id="pregnancy"
                   @if(old('pregnancy', $issues['pregnancy'])) checked @endif>
            <label class="custom-control-label" for="pregnancy">Pregnancy and Birthing</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[prejudice]" id="prejudice"
                   @if(old('prejudice', $issues['prejudice'])) checked @endif>
            <label class="custom-control-label" for="prejudice">Prejudice / Discrimination</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[rejection]" id="rejection"
                   @if(old('rejection', $issues['rejection'])) checked @endif>
            <label class="custom-control-label" for="rejection">Rejection</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[relationships ]" id="relationships "
                   @if(old('relationships ', $issues['relationships '])) checked @endif>
            <label class="custom-control-label" for="relationships ">Relationships </label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[religious]" id="religious"
                   @if(old('religious', $issues['religious'])) checked @endif>
            <label class="custom-control-label" for="religious">Religious Issues</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[self]" id="self"
                   @if(old('self', $issues['self'])) checked @endif>
            <label class="custom-control-label" for="self">Self-Actualization</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[sexual]" id="sexual"
                   @if(old('sexual', $issues['sexual'])) checked @endif>
            <label class="custom-control-label" for="sexual">Sexual identity concern</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[sexual]" id="sexual"
                   @if(old('sexual', $issues['sexual'])) checked @endif>
            <label class="custom-control-label" for="sexual">Sexual abuse</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[sexual]" id="sexual"
                   @if(old('sexual', $issues['sexual'])) checked @endif>
            <label class="custom-control-label" for="sexual">Sexual harassment</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[physical]" id="physical"
                   @if(old('physical', $issues['physical'])) checked @endif>
            <label class="custom-control-label" for="physical">Physical harassment</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[online]" id="online"
                   @if(old('online', $issues['online'])) checked @endif>
            <label class="custom-control-label" for="online">Online harassment</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[sleep]" id="sleep"
                   @if(old('sleep', $issues['sleep'])) checked @endif>
            <label class="custom-control-label" for="sleep">Sleep Problem</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[social]" id="social"
                   @if(old('social', $issues['social'])) checked @endif>
            <label class="custom-control-label" for="social">Social Anxiety / Phobia</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[spirituality]" id="spirituality"
                   @if(old('spirituality', $issues['spirituality'])) checked @endif>
            <label class="custom-control-label" for="spirituality">Spirituality</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[stress]" id="stress"
                   @if(old('stress', $issues['stress'])) checked @endif>
            <label class="custom-control-label" for="stress">Stress</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[self-harm]" id="self-harm"
                   @if(old('self-harm', $issues['self-harm'])) checked @endif>
            <label class="custom-control-label" for="self-harm">Self-harm</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[suicide]" id="suicide"
                   @if(old('suicide', $issues['suicide'])) checked @endif>
            <label class="custom-control-label" for="suicide">Suicide</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[teenage]" id="teenage"
                   @if(old('teenage', $issues['teenage'])) checked @endif>
            <label class="custom-control-label" for="teenage">Teenage Issues</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[trust]" id="trust"
                   @if(old('trust', $issues['trust'])) checked @endif>
            <label class="custom-control-label" for="trust">Trust Issues</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[womens]" id="womens"
                   @if(old('womens', $issues['womens'])) checked @endif>
            <label class="custom-control-label" for="womens">Women’s Issues</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[others]" id="others"
                   @if(old('others', $issues['others'])) checked @endif>
            <label class="custom-control-label" for="others:">Others:</label>
        </div>
    </div>
</div>
