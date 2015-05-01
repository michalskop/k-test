{extends file='main.tpl'}
    {block name=additionalHead}
      <link href="../css/k-test-2015.css" rel="stylesheet">
      <style>
        .header {
          background-image: none;
        }
      </style>
    {/block}
    
    {block name=lastHead}
      <title>{$text['info']}</title>
    {/block}

    {block name=body}
      <!-- header -->
      {include "page-header.tpl"}
      <!-- /header -->
      <div class="container">
      <h1>{$text['info']}</h1>
      {$text['info_text']}
      </div>
   {/block}
   
   
   {block name=footer}
     <!-- Footer -->
     {include "page-footer.tpl"}
     <!-- /Footer -->
   {/block}
   
   {block name=js}
     <!-- <script src="../js/page-ab.js"></script>-->
     <!-- js -->
     {include "page-js.tpl"}
     <!-- /js -->
   {/block}
