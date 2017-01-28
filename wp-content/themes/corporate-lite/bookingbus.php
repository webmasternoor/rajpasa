<?php /* Template Name: bookingbus */ get_header(); ?>
        <div class="content-area">
            <div class="middle-align content_sidebar">
                <div class="site-main" id="sitemain">
                    <!-- Bus booking content here -->
                    <div class="col-md-12">
                        <div class="top-info-bar" style="padding:10px;margin-top:10px;border:1px solid #97BE1A;margin-bottom: 20px;/*#ffffcc*/">Download our Android App &amp; get <b style="color:chocolate;">discount upto Tk.300</b> on first order · <b style="color:chocolate;">Upto Tk.150</b> there after with <b style="color:chocolate;">No Rajpasa Fee </b> for next 3 orders
    <div class="clearfix"></div>
</div>
                    </div>
                    <div class="col-md-12">
                        <section id="content" class="container">
                            <div id="search_sec" style="padding:0;">    
                                <!-- <div class="clearfix"></div> -->
                                <div class="srch_container" style="padding:10px 0;">
                                    <div class="block col-md-5">
                                        <div id="dialog_container_block" title="Message Dialog"></div>
                                        <form name="bussearch" id="bussearch">
                                            <ul class="list-inline">
                                                <div class="form-group hide" style="font-size:21px;color:#000;">
                                                    Lowest prices guaranteed on Bus Tickets 
                                                </div>  
                                                <div class="form-group">
                                                    <label for="dest_from">From</label>
                                                    <div>                                                    
                                                    <select name="" id="" class="form-control">
                                                        <?php                                                        
                                                            $mydb = new wpdb('root','','rajpasasoft','localhost');
                                                            $rows = $mydb->get_results("select * from districts");
                                                            foreach ($rows as $obj) :
                                                        ?>
                                                        <option value="<?php echo $obj->id?>"><?php echo $obj->name;?></option>
                                                        <?php
                                                            endforeach;
                                                        ?>                                                      
                                                    </select>                                                    
                                                    </div>                                                    
                                                </div> 
                                                <div class="form-group">
                                                    <label for="dest_from">To</label>
                                                    <div>                                                    
                                                    <select name="" id="" class="form-control">
                                                        <?php                                                        
                                                            $mydb = new wpdb('root','','rajpasasoft','localhost');
                                                            $rows = $mydb->get_results("select * from districts");
                                                            foreach ($rows as $obj) :
                                                        ?>
                                                        <option value="<?php echo $obj->id?>"><?php echo $obj->name;?></option>
                                                        <?php
                                                            endforeach;
                                                        ?>                                                      
                                                    </select>                                                    
                                                    </div>                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">                             
                                                        <div class="form-group">
                                                            <label for="doj">Date of Journey</label>
                                                            <input type="date" class="datepicker form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="doj">Date of Return<span> (Optional)</span></label>
                                                            <input type="date" class="datepicker form-control">
                                                        </div>
                                                    </div>                        
                                                </div>
                                                <div class="row" style="margin-top:50px;">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-default btn-block"><span class="glyphicon glyphicon-search"></span> Search Buses </button>
                                                    </div>                            
                                                </div>
                                        </div>
                                        <div class="block col-md-7">
                                            <img src="<?php echo get_template_directory_uri()?>/images/ad.png" alt="">
                                        </div>
                                        <div class="clear"></div>
                                    </div>                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <?php get_sidebar();?>
                <div class="clear"></div>
            </div>
        </div>

        <?php get_footer(); ?>        
    </body>
</html>