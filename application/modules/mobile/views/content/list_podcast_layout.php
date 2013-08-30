<?php foreach ($podcast as $rowpodcast): ?>
    <li data-cards-type='text'>
        <?php if ($rowpodcast->type == 0) { ?><!--Video-->
            <h2><i class="icon-film"></i> Video Content</h2>
            <a id="viewer-activator<?php echo $rowpodcast->id_content ?>" data-id="<?php echo $rowpodcast->id_content ?>">
                <img id="cover_<?php echo $rowpodcast->id_content ?>" src="<?php echo base_url() . 'resource' . '/' . $rowpodcast->cover . '.jpg' ?>" style="width: 100%;">
            </a>
        <?php } elseif ($rowpodcast->type == 2) { ?><!--Youtube-->
            <h2><i class="icon-youtube-play"></i> Youtube Content</h2>
            <?php
            $media = analyze_media($rowpodcast->file);
            //ekstrak the youtube id
            $extract_id = explode('^^^', $media);
            ?>
            <a id="viewer-activator<?php echo $rowpodcast->id_content ?>" data-id="<?php echo $rowpodcast->id_content ?>">
                <img id="cover_<?php echo $rowpodcast->id_content ?>" src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="width: 100%;">
            </a>
            <script type="text/javascript">
                $('a#viewer-activator<?php echo $rowpodcast->id_content ?>').tap(function() {
                    $('a#viewer-activator<?php echo $rowpodcast->id_content ?>').hide();
                    $('a#viewer-activator<?php echo $rowpodcast->id_content ?>').load("<?php echo site_url('mobile/plain_viewer_youtube' . '/' . $rowpodcast->id_content) ?>");
                    $('a#viewer-activator<?php echo $rowpodcast->id_content ?>').show();
                    return false;
                });
            </script>
        <?php } elseif ($rowpodcast->type == 3) { ?><!--Vimeo-->
            <h2><i class="icon-vimeo"></i> Vimeo Content</h2>
        <?php } elseif ($rowpodcast->type == 6) { ?><!--SoundCloud-->
            <h2><i class="icon-volume-up"></i> Soundcloud Content</h2>
            <div id="putTheWidgetHere-<?php echo $rowpodcast->file ?>" style="height: 168px;"></div>
            <script type="text/JavaScript">
                SC.oEmbed("<?php echo $rowpodcast->file ?>", {color: "ff0066"},  document.getElementById("putTheWidgetHere-<?php echo $rowpodcast->file ?>"));
            </script>
        <?php } ?>
        <p><?php echo $rowpodcast->title ?></p>
    </li>
<?php endforeach; ?>