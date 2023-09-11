<style>
    .alert{
        width: 30vw;
        padding: 4vh;
        position: fixed;
        left: 50%;
        bottom: 20px;
        transform: translate(-50%, -50%);
        margin: 0 auto;
        background-color: darkgray;
        color: lightgray;
        border-radius: 10px;
    }
    .error{
        color: lightcoral;
        background-color: darkred;
    }
    .success{
        color: lightgreen;
        background-color: darkgreen;
    }
    .closebtn{
        float: right;
        top:1%;
        right: 1%;
        position: fixed;
        background-color: transparent;
        border-style: none;
        font-size: larger;
        transition: all 0.2s;
    }
    .closebtn:hover{
        cursor: pointer;
        transform: scale(1.5);
        top: 1.25%;
        right: 1.25%;
    }
</style>
<?php 

show_alerts();
set_cookie("alert", "none", -1);
function show_alerts() {
    if(isset($_COOKIE['alert'])) {
        $alerts = json_decode($_COOKIE['alert']);
        foreach($alerts as $alert){
            echo "<center>
                    <div class='alert $alert[0]'>
                        $alert[1]
                        <button onclick='deleteParentDiv(this)' class='closebtn $alert[0]' style='float:right;'>
                            x
                        </button>
                    </div>
                </center>";
        }   
    }
}
?>
<script>
  function deleteParentDiv(button) {
    const parentDiv = button.parentNode;
    parentDiv.remove();
  }
</script>