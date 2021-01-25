<?php if (!empty($sentLetters)):?>
<div class="tab-pane" id="inboxLetters" role="tabpanel" aria-labelledby="inbox"><b>Sent Letters</b>
    <div class="row">
        <div class="col-3">
            <div class="list-group">
                <?php for ($i = 0, $iMax = count($sentLetters); $i < $iMax; $i++):?>

                    <a href="#<?php echo $i?>" class="list-group-item list-group-item-action flex-column align-items-start" id="inbox" data-toggle="list" role="tab" aria-controls="inbox">
                        <div class="d-flex w-100 justify-content-between">
                            <p class="flex-center clip"><?php echo $sentThemes[$i]['theme']?></p>
                            <!--                                    <small>3 days ago</small>-->
                        </div>
                        <p class="mb-2 clip"><?php echo $sentLetters[$i]['message']?></p>
                        <small>To: <?php echo $recipients[$i]['email']?></small>
                    </a>
                <?php endfor;?>
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent1">
                <?php for ($i = 0, $iMax = count($sentLetters); $i < $iMax; $i++):?>
                    <div class="tab-pane fade " id="<?php echo $i?>" role="tabpanel" aria-labelledby="inbox">
                        <b>To: </b> <?php echo $recipients[$i]['email']?>
                        <br> <b>Theme:</b> <?php echo $sentThemes[$i]['theme']?>
                        <br> <b>Message:</b> <?php echo $sentLetters[$i]['message']?>
                    </div>
                <?php endfor;?>
            </div>
        </div>
    </div>
</div>
<?php else:?>
<div class="tab-pane" id="inboxLetters" role="tabpanel" aria-labelledby="inbox"><b>You have no sent letters</b>
<?php endif;?>




