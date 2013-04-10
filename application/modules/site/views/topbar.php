<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/dropdown.js"></script>
<div class="nav-bar">
    <div class="nav-bar-inner padding10" style="background: <?php echo '#' . $topbar->bgheader; ?>">
        <span class="pull-menu"></span>

        <a href="<?php echo site_url() ?>" id="btn-home">
            <span class="element brand">
                <img class="place-left" src="<?php echo base_url(); ?>asset/metro/images/logo32.png" style="height: 20px"/>
                <?php echo $topbar->header; ?> <small><?php echo $topbar->caption; ?></small>
            </span>
        </a>

        <div class="divider"></div>

        <ul class="menu">
            <li data-role="dropdown">
                <a href="javascript:void(0)"><?php echo $topbar->menu1; ?></a>
                <ul class="dropdown-menu" id="menu_kuliah">
                    <?php echo modules::run('course/menu_topic') ?>
                </ul>
            </li>                    
            <li data-role="dropdown">
                <a href="javascript:void(0)"><?php echo $topbar->menu2; ?></a>
                <ul class="dropdown-menu" id="menu_fakultas">
                    <?php echo modules::run('course/menu_faculty') ?>
                </ul>
            </li>
            <li><a href="javascript:void(0)" id="btn-new-vid"><?php echo $topbar->menu2; ?></a></li>                
        </ul>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        
        //Load faculty list
        //$('#menu_fakultas').load("<?php echo site_url('course/menu_faculty') ?>");
        
        //Load course category
        //$('#menu_kuliah').load("<?php echo site_url('course/menu_topic') ?>");
        
        //home
        $('#btn-home').click(function(){       
            $('#row-main-other').show();
            $('#row-button-other').show();
            $('#message').html("Loading Data");
            $('#loading-template').show();
            $('#row-main-content').load("<?php echo site_url('home/welcome') ?>",function(){
                $('#loading-template').fadeOut('slow'); 
            });        
        });
    
        //new video
        $('#btn-new-vid').click(function(){       
            $('#row-main-other').hide();
            $('#row-button-other').hide();
            $('#message').html("Loading Data");
            $('#loading-template').show();
            $('#row-main-content').load("<?php echo site_url('content/video_list') ?>",function(){
                $('#loading-template').fadeOut('slow'); 
            });        
        });
    });
</script>