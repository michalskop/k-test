<script>
  //highlight more table
  $('document').ready(function() {
    $('.list-group-item').hover(function(){
      $(this).toggleClass('active');
    });
  });
</script>


<!-- clicked -->
<script>
/*var session = '{$session_id}';
$("a, button").click(function() {
  save_action($(this).attr('id'));
});
function save_action(action) {
  $.ajax({
    url: "click.php",
    data: { 'action':action }
  });
}*/
</script>
<!-- /clicked -->
<!-- onload, offload -->
<script>
/*$('document').ready(function() {
  save_action('load');
});
jQuery(window).bind('beforeunload', function(){
    save_action('unload');
});*/
</script>
<!-- /onload, offload -->

<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.5/d3.js"></script> -->
