<!DOCTYPE html>
<html>
 <script src="<?php echo base_url()?>Assets/dist/js/jquery-2.1.4.min.js"></script> 
<head>
  <title>asd</title>
</head>
<body>
<script type="text/javascript">
  function encg()
    {
      var txt = $("#enc").val();
     $.ajax({
          type:"POST",
          url: "<?php echo base_url('enc/encrypt2')?>/",
          data:{"teks":txt},
          dataType:"JSON",
          success: function(json){
            $("#dec").val(json)

          }
      });
    }
    function decs()
    {
      var as = $("#dec").val();
     $.ajax({
          type:"POST",
          url: "<?php echo base_url('enc/decrypt2')?>",
          data:{"teks":as},
          dataType:"JSON",
          success: function(s){
            $("#hsl").val(s)
          }
      });
    }
</script>
<input type="text" name="encrypt" id="enc" ><button onclick="encg()">ENCRYPT</button>

<input type="text" name="dec" id="dec">
<button onclick="decs()">dec</button>

<input type="text" name="hsl" id="hsl">
</body>
</html>