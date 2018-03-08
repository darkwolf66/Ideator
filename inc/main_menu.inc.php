<?php 
	$main_menu = "
      <div class=\"header clearfix\">
        <nav>
          <ul class=\"nav nav-pills pull-right\">
            <li id=\"menu-home\" role=\"presentation\"><a href=\"index.php\">".$content['main_menu']['home']."</a></li>
            <li id=\"menu-explore\" role=\"presentation\"><a href=\"explore.php\">".$content['main_menu']['explore']."</a></li>
            <li id=\"menu-randidea\" role=\"presentation\"><a href=\"idea.php?id=".rand(1, 4)."\">".$content['main_menu']['randidea']."</a></li>
            <li id=\"menu-publish\" role=\"presentation\"><a href=\"publish.php\">".$content['main_menu']['publish']."</a></li>
            <li id=\"menu-contact\" role=\"presentation\"><a href=\"contact.php\">".$content['main_menu']['contact']."</a></li>
          </ul>
        </nav>
        <h3 class=\"text-muted\">Ideator</h3>
      </div>";
?>