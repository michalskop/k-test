            <div class="item{if ($key == 1)} active{/if}">  
              <div class="container">
                <div class="carousel-caption center-block">
                  <!-- statement -->
                  <div class="o-question question-statement">
                    <div class="i-question">
                        <h2 class="question-question">{$question['situation']}</h2>
                    </div> <!-- /.i-question -->
                  </div> <!-- /.o-question -->
                  <!-- /statement -->
                  
                  <!-- question 1 -->
                  <div class="o-question question-q">
                    <div class="btn-toolbar" role="toolbar">
                      <h4 class="text-left">{$question['question_1']}</h4>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        {$question['min_1']}
                      </div>
                      <div class="col-sm-6">
                        0
                        {for $q=0 to 10}
                          <input type="radio" name="q-{$question['id']}" id="q-{$question['id']}-{$q}" value="{$q}">&nbsp;{if $q<10}&nbsp;&nbsp;{/if}</input>
                        {/for}
                        10
                      </div>
                      <div class="col-sm-3">
                        {$question['max_1']}
                      </div>
                    </div> <!-- /row -->
                  </div> <!-- /.o-question -->
                  <!-- /question 1 -->
                  
                  <!-- question 2 -->
                  <div class="o-question question-r">
                    <div class="btn-toolbar" role="toolbar">
                      <h4 class="text-left">{$question['question_2']}</h4>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        {$question['min_2']}
                      </div>
                      <div class="col-sm-6">
                        0
                        {for $r=0 to 10}
                          <input type="radio" name="r-{$question['id']}" id="r-{$question['id']}-{$r}" value="{$r}">&nbsp;{if $r<10}&nbsp;&nbsp;{/if}</input>
                        {/for}
                        10
                      </div>
                      <div class="col-sm-3">
                        {$question['max_2']}
                      </div>
                    </div> <!-- /row -->
                  </div> <!-- /.o-question -->
                  <!-- /question 2 -->
                  
                  
                  <!-- question 3 -->
                  <div class="o-question question-s">
                    <div class="btn-toolbar" role="toolbar">
                      <h4 class="text-left">{$question['question_3']}</h4>
                    </div>
                    <div class="row">     
                      <div class="col-sm-2">
                      </div>  
                      <div class="col-sm-8">
                        <div class="btn-group" data-toggle="buttons">
                          {for $s=0 to 10}
                            <label class="btn btn-info" id="label-s-{$question['id']}-{$s}">
                              <input type="radio" name="s-{$question['id']}" id="s-{$question['id']}-{$s}" value="{$s}">{$s}
                            </label>
                          {/for}
                        </div>
                      </div>
                    </div> <!-- /row -->
                  </div> <!-- /.o-question -->
                  <!-- /question 3 -->
                  
                  <p class="vote-buttons"> 
                    <div data-toggle="buttons" data-target="#carousel" data-slide="next">
                      <label class="btn btn-lg btn-warning vote-button" id="next-{$key}-{$question['id']}">
                        <input type="radio"  id="next-{$key}-{$question['id']}" value="1">{$text['next']} ></input>
                      </label>
                    </div> <!-- /buttons -->
                  <!-- /.vote-buttons -->
                  
                </div>
              </div>
            </div>
