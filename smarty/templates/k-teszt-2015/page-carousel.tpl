      <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
        <!-- note: data-interval="false" disables the automatic transition -->
        <!-- note: data-wrap="false" disables the rotation -->
        <form action="./match/" method="get" id="calc">
          <div class="carousel-inner">   
          {$key=1} 
          {foreach $questions as $question}
            <!-- {$key}th page -->
            {include "page-page.tpl"}
            <!-- /{$key}th page -->
            {$key=$key+1}
          {/foreach}

            <!-- last item -->
          {include "page-questionaire.tpl"}
            <!-- /last item -->
            <script src="../js/page.js"></script>
            
          
          </div> <!-- /.carousel-inner -->
          <input type="hidden" name="order" value="{$order}" />
          <input type="hidden" name="lang" value="{$lang}" />
        </form>
        {include "page-indicators.tpl"}
        {include "page-arrows.tpl"}
      </div> <!-- /#carousel -->  
