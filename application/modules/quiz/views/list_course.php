<a class="button bg-color-green fg-color-white" id="quiz-back-btn" data-id="" ><i class="icon-arrow-left-2" ></i>Kelola Kuis</a>




<div class="span8">
<h4>Topik Materi</h4>
<form id="insert-to-course">
    <div class="input-control select span6">
        <select name="course" id="course">
            <?php foreach ($list_course as $course): ?>
                <option value="<?php echo $course->id_course; ?>"><?php echo $course->course; ?></option>
            <?php endforeach; ?>
        </select>
    </div>&nbsp;
    <input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quiz_id; ?>"/>
    <input type="submit" value="Tambahkan"/>
</form>


<?php if ($list_avail_quiz_course > 0) {?>

<table>
    <tbody>
        <?php foreach ($list_course_chosen as $course_chosen): ?>
            <tr>

                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a style="color: #095b97;font-size: 18px;"><?php echo $course_chosen->course ?></a><br/>
                </td>

                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="Hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $course_chosen->id_quiz_course; ?>"><i class="icon-remove fg-color-red"></i></a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php } else { ?>
    <tr>
        <td><h2>Tidak ada  course yang memakai kuis ini....</h2></td>
    </tr>
<?php }?>
</div>

<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>

<script type="text/javascript">
    $('a#quiz-back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });


    $('form#insert-to-course').submit(function(){
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/add_course'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{
                    $('#content-right').load("<?php echo site_url('quiz/list_course' . '/' . $quiz_id) ?>");
                    $('#loading-template').fadeOut("slow");
                    $('#content-right').fadeIn("fast");
                }
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
                $('#content-right').fadeIn("fast");
            }
        });
        return false;
    });

    $('#accept-confirm-message').click(function(){
            $('#message').html('Sedang Menghapus .... ');
            $('#confirm-template').fadeOut("medium");
            $('#loading-template').fadeIn("slow");
            var id_quiz = $(this).attr('data-id');
            $.ajax({
                type:'POST',
                url:"<?php echo site_url('quiz/delete_course') ?>/"+id_quiz,
                data:id_quiz,
                success:function (data) {
                    $('#content-right').load("<?php echo site_url('quiz/list_course') ?>/"+<?php echo $quiz_id?>,function(){
                        $('#loading-template').fadeOut("slow");
                    });
                },
                error:function (data){
                    $('#loading-template').fadeOut("slow");
                    alert('gagal');
                }
            });
            return false;
    });

    $('#cancel-confirm-message').click(function(){
            $('#confirm-template').fadeOut("medium");
    });
    
    $('a#btn-delete').click(function(){
        $('#message-confirm').html('Apakah Anda akan mencabut kuis dari kuliah ini ? ');
        $('#accept-confirm-message').attr('data-id', $(this).attr('data-id'));
        $('#confirm-template').fadeIn("medium");
    });
    
</script>