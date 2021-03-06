<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Kuliah</h3>
<form id="do-edit-course" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h4 style="margin-top: 0px; padding-top: 0px;">Kuliah</h4>
    <div class="input-control textarea span6">
        <textarea name="kuliah" id="kuliah" placeholder="kuliah" style="resize: vertical;" ><?php echo $course->course;?></textarea>
    </div>
    <div class="clearfix"></div>
    <h4 style="margin-top: 0px; padding-top: 0px;">Deskripsi</h4>
    <div class="input-control textarea span6">
        <textarea name="deskripsi" id="deskripsi" placeholder="deskripsi" style="resize: vertical;"><?php echo $course->description;?></textarea>
    </div>
    <div class="clearfix"></div>
    <h4 style="margin-top: 0px; padding-top: 0px;">Intisari Kuliah</h4>
    <div class="input-control textarea span6">
        <textarea name="intkuliah" id="intkuliah" placeholder="Intisari Kuliah" style="resize: vertical;" ><?php echo $course->intkuliah;?></textarea>
    </div>
    <div class="clearfix"></div>
    <h4 style="margin-top: 0px; padding-top: 0px;">Pemahaman Dasar</h4>
    <div class="input-control textarea span6">
        <textarea name="pemdasar" id="pemdasar" placeholder="Pemahaman Dasar" style="resize: vertical;"><?php echo $course->pemdasar;?></textarea>
    </div>
    <div class="clearfix"></div>
    <h4 style="margin-top: 0px; padding-top: 0px;">Akan Dipelajari</h4>
    <div class="input-control textarea span6">
        <textarea name="dipelajari" id="dipelajari" placeholder="Akan Dipelajari" style="resize: vertical;"><?php echo $course->dipelajari;?></textarea>
    </div>
    <div class="clearfix"></div>
    <input type="submit" value="Submit"/>
</form>
<script type="text/javascript">
    var id=<?php echo $course->id_course ;?>;
    $('#do-edit-course').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/kuliah_update');?>/"+id,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/my_course') ?>");
                $('#loading-template').fadeOut("slow");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
</script>