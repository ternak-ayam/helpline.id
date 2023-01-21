<div class="form-group row mt-4">
    <div class="col-sm-4">Issues experienced by the patient (Counsellor)</div>
    <div class="col-sm-8">

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[adjustment_issues]"
                   id="adjustment_issues" @if(old('adjustment_issues', $issues['adjustment_issues'])) checked @endif>
            <label class="custom-control-label"
                   for="adjustment_issues">Adjustment issues</label>
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
            <input type="checkbox" class="custom-control-input" name="issues[depression_counsellor]"
                   id="depression_counsellor" @if(old('depression_counsellor', $issues['depression_counsellor'])) checked @endif>
            <label class="custom-control-label" for="depression_counsellor">Depression</label>
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
            <input type="checkbox" class="custom-control-input" name="issues[emotional_abuse]" id="emotional_abuse"
                   @if(old('emotional_abuse', $issues['emotional_abuse'])) checked @endif>
            <label class="custom-control-label" for="emotional_abuse">Emotional Abuse</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[emotional_overwhelm]" id="emotional_overwhelm"
                   @if(old('emotional_overwhelm', $issues['emotional_overwhelm'])) checked @endif>
            <label class="custom-control-label" for="emotional_overwhelm">Emotional Overwhelm</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[family_problems]" id="family_problems"
                   @if(old('family_problems', $issues['family_problems'])) checked @endif>
            <label class="custom-control-label" for="family_problems">Family Problems</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[fear]" id="fear"
                   @if(old('fear', $issues['fear'])) checked @endif>
            <label class="custom-control-label" for="fear">Fear</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[grief_loss]" id="grief_loss"
                   @if(old('grief_loss', $issues['grief_loss'])) checked @endif>
            <label class="custom-control-label" for="grief_loss">Grief, Loss, and Bereavement </label>
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
            <input type="checkbox" class="custom-control-input" name="issues[men_issues]" id="men_issues"
                   @if(old('men_issues', $issues['men_issues'])) checked @endif>
            <label class="custom-control-label" for="men_issues">Men’s Issues and Problems</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[money_issues]" id="money_issues"
                   @if(old('money_issues', $issues['money_issues'])) checked @endif>
            <label class="custom-control-label" for="money_issues">Money and Financial Issues</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[mood_swings]" id="mood_swings"
                   @if(old('mood_swings', $issues['mood_swings'])) checked @endif>
            <label class="custom-control-label" for="mood_swings">Mood Swings</label>
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
            <input type="checkbox" class="custom-control-input" name="issues[physical_abuse]" id="physical_abuse"
                   @if(old('physical_abuse', $issues['physical_abuse'])) checked @endif>
            <label class="custom-control-label" for="physical_abuse">Physical Abuse</label>
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
            <input type="checkbox" class="custom-control-input" name="issues[relationships]" id="relationships"
                   @if(old('relationships', $issues['relationships'])) checked @endif>
            <label class="custom-control-label" for="relationships">Relationships </label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[religious]" id="religious"
                   @if(old('religious', $issues['religious'])) checked @endif>
            <label class="custom-control-label" for="religious">Religious Issues</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[self_actualization]" id="self_actualization"
                   @if(old('self_actualization', $issues['self_actualization'])) checked @endif>
            <label class="custom-control-label" for="self_actualization">Self-Actualization</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[sexual_identity]" id="sexual_identity"
                   @if(old('sexual_identity', $issues['sexual_identity'])) checked @endif>
            <label class="custom-control-label" for="sexual_identity">Sexual identity concern</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[sexual_abuse]" id="sexual_abuse"
                   @if(old('sexual_abuse', $issues['sexual_abuse'])) checked @endif>
            <label class="custom-control-label" for="sexual_abuse">Sexual abuse</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[sexual_harassment]" id="sexual_harassment"
                   @if(old('sexual_harassment', $issues['sexual_harassment'])) checked @endif>
            <label class="custom-control-label" for="sexual_harassment">Sexual harassment</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[physical_harassment]" id="physical_harassment"
                   @if(old('physical_harassment', $issues['physical_harassment'])) checked @endif>
            <label class="custom-control-label" for="physical_harassment">Physical harassment</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[online_harassment]" id="online_harassment"
                   @if(old('online_harassment', $issues['online_harassment'])) checked @endif>
            <label class="custom-control-label" for="online_harassment">Online harassment</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[sleep_problem]" id="sleep_problem"
                   @if(old('sleep_problem', $issues['sleep_problem'])) checked @endif>
            <label class="custom-control-label" for="sleep_problem">Sleep Problem</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[social_anxiety]" id="social_anxiety"
                   @if(old('social_anxiety', $issues['social_anxiety'])) checked @endif>
            <label class="custom-control-label" for="social_anxiety">Social Anxiety / Phobia</label>
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
            <input type="checkbox" class="custom-control-input" name="issues[self_harm_counsellor]" id="self_harm_counsellor"
                   @if(old('self_harm_counsellor', $issues['self_harm_counsellor'])) checked @endif>
            <label class="custom-control-label" for="self_harm_counsellor">Self-harm</label>
        </div>
         <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="issues[suicide_counsellor]" id="suicide_counsellor"
                   @if(old('suicide_counsellor', $issues['suicide_counsellor'])) checked @endif>
            <label class="custom-control-label" for="suicide_counsellor">Suicide</label>
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
            <input type="checkbox" class="custom-control-input" name="issues[womens_issues]" id="womens_issues"
                   @if(old('womens_issues', $issues['womens_issues'])) checked @endif>
            <label class="custom-control-label" for="womens_issues">Women’s Issues</label>
        </div>
        <div class="form-group">
            <label for="others">Others</label>
            <input type="text" class="form-control" name="issues[others]" id="others" value="{{ old('others', $issues['others']) }}">
        </div>
    </div>
</div>
