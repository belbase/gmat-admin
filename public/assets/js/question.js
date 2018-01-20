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

function sendAJAXRequest(question,url,redirect) {
  $("#save").on('click',function(){
    var data = getTypeOption(question);
    $.ajax({
      url: url,
      type: 'POST',
      dataType: 'html',
      data: data,
      beforeSend: function() {
            $(".loader-icon").show();
        },
      error: function(data){
          console.log(data.statusText);
          btalert('danger',"we can't save the post right now");
            $(".loader-icon").fadeOut('slow')
      },
      success: function(data)
      {
        // var obj = $.parseJSON(data);
        console.log(data);
        // if(obj.sent == true){

        window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = redirect;
        }, 1000);


          btalert('success',data);
          $(".loader-icon").fadeOut('slow');
          console.log(data);

      },
      timeout:3000,
    });
  });
}
function getTypeOption(question){
    var val = $("#cata option:selected").val();
        return eval("insert" + val + "(`"+question+"`);");
}
//edit Options

function btalert(alertType,message){
var indicator = [];
indicator["success"] = "Well done!";
indicator["danger"] = "Oh snap!";
indicator["warning"] = "Attention!";
$(".content").prepend('<div class="noti alert alert-'+alertType+' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+indicator[alertType]+'</strong> '+message+'</div>');
$(".noti").fadeTo(2000, 500).slideUp(500, function(){
  $(".noti").remove();
});
}

// for verbal editor.getData()
function insertRCM(question){
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
    question:question,
    type:'passage',
    cata:$("select[name=cata] option:selected").val(),
    table:$("input[name=db]").val(),
    id:$("input[name=id]").val(),
    dif:$("select[name=dif] option:selected").val(),
    option:options,
   };
  }
  function insertCRE(question){
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
      question:question,
      type:'simple',
      cata:$("select[name=cata] option:selected").val(),
      table:$("input[name=db]").val(),
      id:$("input[name=id]").val(),
      dif:$("select[name=dif] option:selected").val(),
      option:options,
     };
    }
    function insertSCN(question){
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
        question:question,
        type:'simple',
        cata:$("select[name=cata] option:selected").val(),
        table:$("input[name=db]").val(),
        id:$("input[name=id]").val(),
        dif:$("select[name=dif] option:selected").val(),
        option:options,
       };
      }
// for AW
function insertAOA(question){
    return { _token:$("input[name=_token]").val(),
      question:question,
      cata:$("select[name=cata] option:selected").val(),
      table:$("input[name=db]").val(),
      id:$("input[name=id]").val(),
      dif:'h',
     };
}
