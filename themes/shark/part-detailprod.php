<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
        <div class="panel-heading">
            <h4 class="panel-title">
                Fitur
            </h4>
        </div>
        </a>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <?php echo $prod_fiture; ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Spesifikasi
                </h4>
            </div>
        </a>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <?php echo $prod_spec; ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
        <div class="panel-heading">
            <h4 class="panel-title">
               Video Aplikasi
            </h4>
        </div>
        </a>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <iframe width="100%" height="350" src="https://www.youtube.com/embed/<?php echo $prod_video; ?>?modestbranding=1&rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
        <div class="panel-heading">
            <h4 class="panel-title">
               Spareparts
            </h4>
        </div>
        </a>
        <div id="collapseFour" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table-responsive">
                    <thead>
                        <td class="heading">Parts</td>
                        <td class="heading second-column">Part Code</td>
                    </thead>
                    <tbody>
                        <?php foreach ($parts as $part) : ?>
                            <tr>
                                <td class="text-center first-column">
                                    <img src="<?php echo base_url('uploads/sparepart/'.$part['part_img']); ?>" /><br/>
                                    <strong><?php echo $part['part_name']; ?></strong>
                                </td>
                                <td class="text-center second-column"><?php echo $part['part_code']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
