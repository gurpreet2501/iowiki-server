<?php $this->load->view('partials/header');?>

<div class='row'>

   <div class="col-md-6 col-md-offset-3">

       <h3>Contact Form</h3>

       <div class="title-separator"></div>

       <form method="post" action="<?=site_url('/contact/email')?>">

          <div class="form-group">

            <label for="exampleInputEmail1">Name</label>

            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name" required>

          </div>

          <div class="form-group">

            <label for="exampleInputPassword1">Email</label>

            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" name="email" required>

          </div>

          <div class="form-group">

            <label for="exampleInputPassword1">Message</label>

            <textarea placeholder="Enter your query here..." class="form-control" name="message" rows="6" required></textarea>

          </div>
           <?php  echo recaptcha_get_html('6LeloRcTAAAAAOUhxpnJv28ztPv2om2P3HO-PnBd'); ?>
           <hr/>
          <button type="submit" class="btn btn-default">Submit Query</button>

        </form>

   </div> 

</div>

<div class="sp-40"></div>

<?php $this->load->view('partials/footer');?>

