      <div class="sidebar-background hidden-xs">
                    <div class="title text-center">
                       Tech Events
                    </div>
                    <div class="row">
                        <div class="col-xs-3 heading "><strong>Event</strong></div>
                        <div class="col-xs-3 heading  "><strong>Date</strong></div>
                        <div class="col-xs-3 heading  "><strong>Location</strong></div>
                        <div class="col-xs-3 heading"></div>
                    </div>
                     <?php foreach (tech_events() as $key => $value): ?>
                     <div class="row <?=$value['registration_url'] ? 'success' :''?>">
                        <div class="col-xs-3">
                            <a href="<?=trim($value['site_url'])?>"><?=$value['event_name']?></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="<?=trim($value['site_url'])?>">
                                <?=date("M d,Y", strtotime($value['start_date']))?> 
                                - 
                                <?=date("M d,Y", strtotime($value['end_date']))?>
                            </a>
                        </div>
                        <div class="col-xs-3">
                           <a href="<?=trim($value['site_url'])?>"><?=$value['location']?></a>
                        </div>
                        <?php if(!empty($value['registration_url'])):?>
                            <div class="col-xs-3">
                                <a target="_BLANK" href="<?=trim($value['registration_url'])?>">
                                    <button type="button" class="btn btn-warning">Register</button>
                                </a>    
                            </div>
                        <?php endif; ?>    
                     </div>  
                     <div class='widget-rule'></div> 
                    <?php endforeach;?> 
        </div> 