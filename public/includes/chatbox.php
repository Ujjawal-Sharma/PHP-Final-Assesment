<div id="chatbox" style="display:none;">

<?php
include_once '../classes/chatTable.class.php';

$obj = new Chat();
//$row = $obj->fetchMessages($_SESSION['id']);
?>

<script type="text/javascript">



$(document).ready(function() {
  $.ajax({    //create an ajax request to display.php
    type: "GET",
    url: "../backend/getUsersList.php",                        
    success: function(response){                    
       $("#responsecontainer").html(response); 
        //alert(response);
    }
});
});


$(document).ready(function() {
    $('#btn-chat').click(function() {
  $.ajax({    //create an ajax request to display.php
    type: "POST",
    url: "../backend/sendMessage.php",  
    data: {
        message: $('#btn-input').val()
    },                      
    success: function(response){        
        $('#btn-input').val('');
        $( '#display_info' ).html(response);
    $('#display_info').scrollTop($('#display_info')[0].scrollHeight);
    }
});
});
});

function loadchat(id = 0) {
    if(id === 0)
    var eid = this.event.target.id;
    else
    console.log(this.event.target.id);
    $.get("../backend/getchat.php",
  {
    id: eid
  },
  function(data){
    $( '#display_info' ).html(data);
    $('#display_info').scrollTop($('#display_info')[0].scrollHeight);
    //alert("Data: " + data);
  });
}


function autoRefresh_div() {
    $("#display_info").load("../front/index.php", function() {
        setTimeout(autoRefresh_div, 1000);
    });
}

//autoRefresh_div();
</script>
<div class="container d-flex justify-content-center">
    <div class="col-lg-10 d-flex justify-content-center">
  
            
            <div class="row chat-window col-xs-5 col-md-4 mt-2 mb-2 float-left">
                <div class="col-xs-12 col-md-12 cont-bg">
                    <div class="panel panel-default p-2">
                    <!-- Users box-->
                        <div class="users-list-bg">

                            <div class="users-list-heading">
                            <p class="h-6 text-center p-1">All Conversations</p>
                            </div>
                                <div class="list-group rounded" id="responsecontainer">
                                    
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row chat-window col-xs-5 col-md-6 mt-2 mb-2" id="chat_window_1">
                            <div class="panel panel-default p-2 border-l col-md-12">
                                <div class="panel-heading">
                                    <p class="h-6 text-center p-1">Messages</p>
                                </div>
                                <div class="panel-body msg_container_base p-4" id="display_info">
                                   
                                </div>
                                <div class="panel-footer p-4 ">
                                    <div class="input-group">
                                        <input id="btn-input" type="text" class="form-control input-sm chat_input" 
                                        placeholder="Write your message here..." name="message"/>
                                        <span class="input-group-append">
                                        <button class="btn text-white btn-md" type="submit" id="btn-chat"><i 
                                        class="fas fa-paper-plane" name="send"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                
         
        </div>
    </div>
</div>

</div>