<? $this->load->view('admin/partials/header') ?>
<div class="row">
  <div class="col-lg-12">
    <div class='text-center'>
      <form class="form-inline" action='<?=av(site_url('reports/summary/csv'))?>'>
        
        <div class="form-group">
          <label class="sr-only" for="from">From Date</label>
          <input type='text' name='filters[from]' id='from' class="form-control date-input input-sm" placeholder="From Date" value='' />
        </div>
        <div class="form-group">
          - to -
        </div>
        <div class="form-group">
          <label class="sr-only" for="to">To Date</label>
          <input type='text' name='filters[to]' id='to' class="form-control date-input input-sm" placeholder='To date'
          value='' />
        </div>
        
        
        <button type="submit" class="btn btn-success">Download Report</button>
      </form>
    </div>
    <hr />
  </div>
</div>
<? $this->load->view('admin/partials/footer') ?>



