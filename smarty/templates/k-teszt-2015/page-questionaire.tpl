<div class="item">
  <div class="container">
    <div class="carousel-caption center-block">
      <div class="o-question">
        <div class="i-question">
            {$text['dg_top']}
        </div>
      </div>
      
      <div class="o-question">
        <div class="text-left form-inline">
          <label>{$text['dg_gender']}:</label>
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-info" id="label-demographics-gender-female">
              <input type="radio" name="demographics-gender" id="demographics-gender-female" value="female" />{$text['dg_gender_female']}</input>
            </label>
            <label class="btn btn-info" id="label-demographics-gender-male" value="male">
              <input type="radio" name="demographics-gender" id="demographics-gender-male" value="male"   />{$text['dg_gender_male']}</input>
            </label>
          </div>
        </div> <!-- /form-inline -->
        
        <div class="text-left form-inline">
          <label>{$text['dg_age']}:</label>
          <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-info" id="label-demographics-age-x-18">
                <input type="radio" name="demographics-age" id="demographics-age-x-18" value="x-18"   />{$text['dg_age_18']}
              </label>
              <label class="btn btn-info" id="label-demographics-age-18-24">
                <input type="radio" name="demographics-age" id="demographics-age-18-24" value="18-24"   />{$text['dg_age_18-24']}
              </label>
              <label class="btn btn-info" id="label-demographics-age-25-29">
                <input type="radio" name="demographics-age" id="demographics-age-25-29" value="25-29"   />{$text['dg_age_25-29']}
              </label>
              <label class="btn btn-info" id="label-demographics-age-30-39">
                <input type="radio" name="demographics-age" id="demographics-age-30-39" value="30-39"   />{$text['dg_age_30-39']}
              </label>
              <label class="btn btn-info" id="label-demographics-age-40-49">
                <input type="radio" name="demographics-age" id="demographics-age-40-49" value="40-49"   />{$text['dg_age_40-49']}
              </label>
              <label class="btn btn-info" id="label-demographics-age-50-59">
                <input type="radio" name="demographics-age" id="demographics-age-50-59" value="50-59"   />{$text['dg_age_50-59']}
              </label>
              <label class="btn btn-info" id="label-demographics-age-60-69">
                <input type="radio" name="demographics-age" id="demographics-age-60-69" value="60-69"   />{$text['dg_age_60-69']}
              </label>
              <label class="btn btn-info" id="label-demographics-age-69-x">
                <input type="radio" name="demographics-age" id="demographics-age-69-x" value="69-x"   />{$text['dg_age_69']}
              </label>
          </div>
        </div><!-- /form-inline -->
        
        <div class="text-left form-inline">
          <label>{$text['dg_edu']}:</label>
          <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-info" id="label-demographics-education-ed1">
                <input type="radio" name="demographics-education" id="demographics-education-ed1" value="ed1" />{$text['dg_edu_1']}
              </label>
              <label class="btn btn-info" id="label-demographics-education-ed2">
                <input type="radio" name="demographics-education" id="demographics-education-ed2" value="ed2" />{$text['dg_edu_2']}
              </label>
              <label class="btn btn-info" id="label-demographics-education-ed3">
                <input type="radio" name="demographics-education" id="demographics-education-ed3" value="ed3" />{$text['dg_edu_3']}
              </label>
              <label class="btn btn-info" id="label-demographics-education-ed4">
                <input type="radio" name="demographics-education" id="demographics-education-ed4" value="ed4" />{$text['dg_edu_4']}
              </label>
              <label class="btn btn-info" id="label-demographics-education-ed5">
                <input type="radio" name="demographics-education" id="demographics-education-ed5" value="ed5" />{$text['dg_edu_5']}
              </label>
              <label class="btn btn-info" id="label-demographics-education-ed6">
                <input type="radio" name="demographics-education" id="demographics-education-ed6" value="ed6" />{$text['dg_edu_6']}
              </label>
              <label class="btn btn-info" id="label-demographics-education-ed7">
                <input type="radio" name="demographics-education" id="demographics-education-ed7" value="ed7" />{$text['dg_edu_7']}
              </label>
          </div>
        </div><!-- /form-inline -->  
        
        <div class="input-group">
            <label id="label-municipality">{$text['dg_municipality']}: 
                <div id="scrollable-dropdown-menu" style="display:inline-block;  margin-top: 10px;">
                    <input type="text" placeholder="..." class="form-control input non-opaque typeahead" id="search-input" name="demographics-municipality">
                </div>
            </label>
        </div>
        
      </div> <!-- /o-question -->

      <button type="submit" class="btn btn-lg btn-success">{$text['page_results']} ></button>

    </div> <!-- /carousel-caption -->
  </div> <!-- /container -->
</div> <!-- /item -->
