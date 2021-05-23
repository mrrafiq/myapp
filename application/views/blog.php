<?php $this->load->view('partial/header')?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('./assets/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Welcome To Our Web !</h1>
            <span class="subheading">Check this out</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php echo $this->session->flashdata('message'); ?>
      <form method='get'>
        <input type="text" name="find" placeholder="pencarian...">
        <button type="submit">Cari</button>
      </form>
      <?php foreach ($blogs as $key => $blog):?>
        <div class="post-preview">
            <h2 cl  ass="post-title">
              <a href="<?php echo site_url('blog/detail/'.$blog['url']);?>">
                <?php echo $blog['title'];?>
              </a>              
            </h2>
            <p class="post-meta">Posted on <?php echo $blog['date'];?>
              <?php if(isset($_SESSION['username']))
              {
              ?>
                  <a href="<?php echo site_url('blog/edit/'.$blog['id']);?>"> Edit</a>
                  <a href="<?php echo site_url('blog/delete/'.$blog['id']);?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')"> Delete</a>
                  <?php
                  }
                  ?>              
            </p>    
          <?php echo $blog['content'];?>
        </div>
        <hr>
      <?php endforeach;?> 
      <?php echo $this->pagination->create_links(); ?> 
        
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>
  <?php $this->load->view('partial/footer')?>

 