<nav id="navbar" class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/" id="header-home"><i class="fa fa-home"></i><span class="hidden-xs"> {$text['test']}</span></a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="navbar-text"><a href="#" data-toggle="modal" data-target="#modal-save-results" id="header-save"><i class="fa fa-download"></i> {$text['match_save']}</a>
      </div>
      <a href="{$text['1perc_link']}" class="btn btn-success navbar-btn" type="button" id="header-1perc"><i class="fa fa-hand-o-right"></i> {$text['1perc']}</a> 
      
      <p class="navbar-text navbar-right"><a href="../info.php?lang={$text['lang']}" id="header-info"><i class="fa fa-info-circle"></i> {$text['info']} </a> 
    </div>
  </div>
</nav>
