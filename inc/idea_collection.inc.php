<?php
  require 'config.php';
  $featured_ideas = "
      <div class=\"row marketing\">
      <h3>".$content['idea_colletion']['featured_ideas']."</h4>
        <div class=\"col-lg-12\">
          <div class=\"col-lg-12\">
            <h4>Maquina voadora</h4>
            <p>Uma maquina voadora na qual as pessoas sobem e voam fazendo trajetos longos em pouco tempo</p>
            <div class=\"col-lg-7\">
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['view_idea_button']."</a>
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['post_reply_button']."</a>
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['engage_idea_button']."</a>
              <a class=\"btn btn-xs btn-success\" href=\"#\" role=\"button\"><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"></i> 200</a>
              <a class=\"btn btn-xs btn-danger\" href=\"#\" role=\"button\"><i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"></i> 250</a>
            </div>
          </div>
          <div class=\"col-lg-12\">
            <h4>Maquina voadora</h4>
            <p>Uma maquina voadora na qual as pessoas sobem e voam fazendo trajetos longos em pouco tempo</p>
            <div class=\"col-lg-7\">
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['view_idea_button']."</a>
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['post_reply_button']."</a>
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['engage_idea_button']."</a>
              <a class=\"btn btn-xs btn-success\" href=\"#\" role=\"button\"><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"></i> 200</a>
              <a class=\"btn btn-xs btn-danger\" href=\"#\" role=\"button\"><i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"></i> 250</a>
            </div>
          </div>
          <div class=\"col-lg-12\">
            <h4>Maquina voadora</h4>
            <p>Uma maquina voadora na qual as pessoas sobem e voam fazendo trajetos longos em pouco tempo</p>
            <div class=\"col-lg-7\">
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['view_idea_button']."</a>
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['post_reply_button']."</a>
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['engage_idea_button']."</a>
              <a class=\"btn btn-xs btn-success\" href=\"#\" role=\"button\"><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"></i> 200</a>
              <a class=\"btn btn-xs btn-danger\" href=\"#\" role=\"button\"><i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"></i> 250</a>
            </div>
          </div>
        </div>
      </div>
  ";
  function returnPDFIfExists($pdf){
    if(!empty($pdf)){
      return "<a class=\"btn btn-xs btn-primary\" href=\"".$pdf."\" role=\"button\"><i class=\"fa fa-download\" aria-hidden=\"true\"></i> PDF</a>";
    }else{
      return "<a class=\"btn btn-xs btn-primary disabled\" role=\"button\"><i class=\"fa fa-download\" aria-hidden=\"true\"></i> PDF</a>";
    }
  }
  $last_ideas_json = file_get_contents($main_link."/api/?action=get_last_ideas");
  $last_ideas_json = json_decode($last_ideas_json);
  $last_ideas = "
      <div class=\"row marketing\">
        <h3>".$content['idea_colletion']['last_ideas'] ."</h4>
        <div class=\"col-lg-12\">
        ";
        foreach ($last_ideas_json as $idea) {
          $last_ideas = $last_ideas."<div class=\"col-lg-12\">
            <div class=\"\">
            <h4>".$idea->title." <small>".$content['idea_colletion']['by'].": ".$idea->owner." ".$content['idea_colletion']['on'].": ".$idea->category."</small></h4>
            </div>
            <p>".substr($idea->content,0,120)."...</p>
            <div class=\"col-lg-7\">
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['view_idea_button']."</a>
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['post_reply_button']."</a>
              <a class=\"btn btn-xs btn-default\" href=\"#\" role=\"button\">".$content['idea_colletion']['engage_idea_button']."</a>
              <a class=\"btn btn-xs btn-success\" href=\"#\" role=\"button\"><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"></i> ".$idea->likes."</a>
              <a class=\"btn btn-xs btn-danger\" href=\"#\" role=\"button\"><i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"></i> ".$idea->unlikes."</a>
              ".returnPDFIfExists($idea->pdf)."
            </div>
          </div>";
        }

        $last_ideas = $last_ideas."
        </div>
      </div>
  ";

?>