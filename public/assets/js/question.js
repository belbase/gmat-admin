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
function setSMCQT(){
  hideall();
  $("#options").css('display','block');
  $("#difficulty-level").css('display','block');
  $("#content-type").css('display','block');
  $("#statement").css('display','block');

}
function setSTIGT(){
    hideall();
}
function setPRGOT(){
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
  }
  $("#cata").on('change',function(){
    var val = $("#cata option:selected").val();
        eval("set" + val + "()");
  });
}
function insertSTIGT(){
  return {
    // statement : $("#statement").val(),
    // option :{},
    //
    other: false
    };
}
function insertBMCQC(){
  return {
    // statement : $("#statement").val(),
    // option :{},
    //
    other: false
    };
}
function insertBMCQR(){
  return {
    // statement : $("#statement").val(),
    // option :{},
    //
    other: false
  };
}
function insertSMCQT(){
  var options = [];
    $('.option-input').each(function () {
      var option = new Object();
      option.oid = $(this).attr('name');
      option.id = $(this).attr('id');
      option.content = $(this).val();
      if(typeof option.oid == 'undefined') option.is_correct= $("#is_correct-"+option.id).is(":checked");
      else option.is_correct= $("#is_correct-"+option.oid).is(":checked");
      options.push({
          option});
          console.log("#is_correct-"+option.id);
  });
  return {
    _token:$("input[name=_token]").val(),
    title:$("input[name=title]").val(),
    statement:$("input[name=statement]").val(),
    question:$("#editor").children().html(),
    type:$("select[name=type] option:selected").val(),
    cata:$("select[name=cata] option:selected").val(),
    table:$("input[name=db]").val(),
    id:$("input[name=id]").val(),
    dif:$("select[name=dif] option:selected").val(),
    option:options,
   };
  }

function insertPRGOT(){
    return { _token:$("input[name=_token]").val(),
       title:$("input[name=title]").val(),
      question:$("#editor").children().html(),
      cata:$("select[name=cata] option:selected").val(),
      table:$("input[name=db]").val(),
      id:$("input[name=id]").val(),
     };
}
function getTypeOption(){
    var val = $("#cata option:selected").val();
        return eval("insert" + val + "();");
}
function btalert(alertType,message){
  var indicator = [];
  indicator["success"] = "Okay!";
  indicator["danger"] = "No!";
  indicator["warning"] = "Attention!";
  $("#page-top").prepend('<div class="col-md-10 offset-md-1 alert alert-'+alertType+' alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+indicator[alertType]+'</strong>! '+message+'</div>');
}
