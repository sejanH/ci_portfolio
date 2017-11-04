<style type="text/css">
    .main-footer{
        mix-blend-mode: difference;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1><hr/>
    </section>
    
    <section class="content">
    <div class="col-sm-3">
        <label>Choose Dashboard Theme</label>
        <?

        $currentTheme = $this->db->select("theme")
                                    ->from("admin")
                                    ->get()
                                    ->result();
        echo "<br/><small>current(".$currentTheme[0]->theme.")</small>";
        $skins = array('red','red-light','blue','blue-light','green','green-light','black','black-light','yellow','yellow-light','purple','purple-light');

        echo "<select class='form-control' id='theme' name='theme'>";
        echo "<option selected hidden>Select a theme</option>";
        foreach ($skins as $s) {
            echo "<option>".$s."</option>";
        }
        echo "</select>";
        ?>
    </div>
    <div class="col-sm-3">
    <label>Set Section Order:</label>
    
    </div>
    </section>
</div>

<script type="text/javascript">
            $(function(){
                $("#theme").on('change',function(){
                    $.ajax({
                        type: 'post',
                        url: 'changeTheme',
                        data: "theme="+this.value,
                        success: function(data){
                            if(data==1){
                                window.location.reload();
                            }else{
                                alert("Theme not changed");
                            }
                        },
                        error: function(){
                            alert("Failed to change the theme please try again");
                        }
                    });
                });
            });
        </script>