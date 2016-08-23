document.getElementById('submitform').onclick =masukbr;
function masukbr()
   {
      var base_url = '<?php echo base_url();?>';
      var form=$("#form");
      var identity = $("#emailn").val();
      var pass = $("#passn").val();
      var capt = $("#captn").val();
      $.ajax({
            type:"POST",
            url:form.attr("action"),
            data:{'identity' : identity,'password' : pass,'captcha' : capt},
            dataType: "json",
            beforeSend: function() 
            { $("#load_ajax").show(); },
            complete: function() 
            { $("#load_ajax").hide(); },
            error: function (jqXHR, textStatus, errorThrown)
            { 
              $("#load_ajax").hide();
              alert("Error");
            },
            success: function(data){
              $("#load_ajax").hide();
              if(data.status)
              {
                window.location = data.redirect;
                popup(data.msg);
              }else{
                popup(data.msg);
              }
            }
        
        });
   }

function popup(ms = null) {
    if(ms == null)
    {
      $().toasty({
          message: "Berhasil",
          autoHide: 3000
      }); 
    }else{
      $().toasty({
          message: ms,
          autoHide: 3000
      }); 
    }  
  }