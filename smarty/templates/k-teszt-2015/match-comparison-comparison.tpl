{$letters = ['q','r','s']}
{foreach $o2id as $o=>$id}
  <div class="panel panel-info">
    <div class="panel-heading">
      {$questions[$id-1]['situation']}
    </div>
    <div class="panel-body">
      {$i = 1}
      {foreach $letters as $letter}
        {$g = "`$letter`-`$id`"}
        {$questions[$id-1]["question_`$i`"]}<br>
        {$text['your_value']}: {if (isset($user[$g]))}{$user[$g]}{else}-{/if}, 
        {$text['average']}: {$averages[$g]|string_format:"%.1f"}<br>
        {$i = $i + 1}
      {/foreach}
    </div>
  </div>
{/foreach}
