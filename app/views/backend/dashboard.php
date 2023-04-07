<?php
if (!$this->session->userdata('id')) {
  redirect(base_url() . 'admin');
}
?>
<section class="content-header">
  <h1>Dashboard</h1>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="box info-box">
                    <h1 style="text-align: center"><a href="<?php echo base_url('backend/todo')?>">TODOs</a></h1>
            </div>
        </div>
    </div>

    <div class="row">

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total News Categories</span>
          <span class="info-box-number"><?php echo $total_category; ?></span>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-hand-o-right"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total News</span>
          <span class="info-box-number"><?php echo $total_news; ?></span>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-orange"><i class="fa fa-hand-o-right"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Events</span>
          <span class="info-box-number"><?php echo $total_event; ?></span>
        </div>
      </div>
    </div>


    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-hand-o-right"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Team Members</span>
          <span class="info-box-number"><?php echo $total_team_member; ?></span>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-teal"><i class="fa fa-hand-o-right"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Clients</span>
          <span class="info-box-number"><?php echo $total_client; ?></span>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-maroon"><i class="fa fa-hand-o-right"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Services</span>
          <span class="info-box-number"><?php echo $total_service; ?></span>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-olive"><i class="fa fa-hand-o-right"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Testimonials</span>
          <span class="info-box-number"><?php echo $total_testimonial; ?></span>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-hand-o-right"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Photos (Gallery)</span>
          <span class="info-box-number"><?php echo $total_photo; ?></span>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-navy"><i class="fa fa-hand-o-right"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Pricing Tables</span>
          <span class="info-box-number"><?php echo $total_pricing_table; ?></span>
        </div>
      </div>
    </div>

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="box info-box">
                    <h1 style="text-align: center"><a href="<?php echo base_url(BACKEND.'backup')?>" target="_blank">Backup / Only Database</a></h1>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="box info-box">
                    <h1 style="text-align: center"><a href="<?php echo base_url(BACKEND.'setting/cache')?>">Clear Cache</a></h1>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="box info-box">
                    <h1 style="text-align: center"><a href="<?php echo base_url(BACKEND.'setting/log')?>">Clear Log</a></h1>
                </div>
            </div>
        </div>
  </div>
</section>