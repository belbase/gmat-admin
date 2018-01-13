// @file question.js
// @package EduShastra Online Mock Test Project
// @author Deepak Belbase

function hideall(){
  $("#options").css('display','none');
  $("#difficulty-level").css('display','none');
  $("#content-type").css('display','none');
  $("#statement").css('display','none');

}
function setBMCQR(){
  hideall();
}
function setBMCQC(){
  hideall();
}
function setRCM(){
  hideall();
  $("#options").css('display','block');
  $("#difficulty-level").css('display','block');
  // $("#content-type").css('display','block');
  $("#statement").css('display','block');

}
function setCRE(){
  hideall();
  $("#options").css('display','block');
  $("#difficulty-level").css('display','block');
  // $("#content-type").css('display','block');
  $("#statement").css('display','block');

}
function setSCN(){
  hideall();
  $("#options").css('display','block');
  $("#difficulty-level").css('display','block');
  // $("#content-type").css('display','block');
  $("#statement").css('display','block');

}
function setSTIGT(){
    hideall();
}
function setAOA(){
    hideall();
}
function addOptions(){
  $("#add-option").on("click", function(){
    var val = $(".option-input").last().get(0).name;
    var newval = Number(val)+1;
    var othval = $(".option-input").last().get(0).id;
    var id = Number(othval)+1;
      $(".option-group").append('<div class="input-group mb-2 mr-sm-2 mb-sm-0"><input type="text" class="form-control option-input" name="'+newval+'" id="'+id+'" placeholder="Option '+id+'"><div class="input-group-addon"><input type="checkbox" class="form-checkbox" name="is_correct" id="is_correct-'+newval+'" value="1"></div></div><br>');
  });
}
function selectTypeOption(){
  if($("#cata").find("option:first-child").val()){
    eval("set" + $("#cata").find("option:first-child").val() + "()");
    console.log("Qusetion.js is properly working");
  }
  $("#cata").on('change',function(){
    var val = $("#cata option:selected").val();
        eval("set" + val + "()");
  });
}
