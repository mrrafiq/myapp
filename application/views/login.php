<?php $this->load->view('partial/header.php');  ?>
    <header class="masthead" style="background-image: url('<?php echo base_url();?>assets/img/about-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
                <h1>Login Page</h1>
            </div>
            </div>
        </div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Login</h1>
                <?php echo $this->session->flashdata('message');?>
                <?php echo form_open();?>
                <!-- <form method="POST"> -->
                    <div class="form-group">
                        <label>Username</label>
                        <?php echo form_input('username', set_value('username'), 'class="form-control"');?>
                        <!-- <input type="text" class="form-control" name="title"> -->
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <?php echo form_input('password', set_value('password'), 'class="form-control"');?>
                        <!-- <input type="text" class="form-control" name="url"> -->
                    </div>
                    <br>
                    <button type="submit" class='btn btn-primary'>Login</button>
                <!-- </form> -->
            </div>
        </div>
    </div>
<?php $this->load->view('partial/footer.php');  ?>
