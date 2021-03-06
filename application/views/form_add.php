<?php $this->load->view('partial/header.php');  ?>
    <header class="masthead" style="background-image: url('<?php echo base_url();?>assets/img/about-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
                <h1>Tambah Artikel</h1>
            </div>
            </div>
        </div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Tambah Artikel</h1>
                <div class="alert alert-warning">
                    <?php echo validation_errors();  ?>
                </div>
                <?php echo form_open_multipart();?>
                <!-- <form method="POST"> -->
                    <div class="form-group">
                        <label>Judul</label>
                        <?php echo form_input('title', set_value('title'), 'class="form-control"');?>
                        <!-- <input type="text" class="form-control" name="title"> -->
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <?php echo form_input('url', set_value('url'), 'class="form-control"');?>
                        <!-- <input type="text" class="form-control" name="url"> -->
                    </div>
                    <div class="form-group">
                        <label>Konten</label>
                        <?php echo form_textarea('content', set_value('content'), 'class="form-control" id="" cols="30" rows="10"');?>
                        <!-- <textarea name="content" id="" class="form-control" cols="30" rows="10"></textarea> -->
                    </div>
                    <div class="form-group">
                        <label>Cover</label>
                        <?php echo form_upload('cover', set_value('cover'), 'class="form-control"'); ?>
                    </div>
                    <br>
                    <button type="submit" class='btn btn-primary'>Simpan Artikel</button>
                <!-- </form> -->
            </div>
        </div>
    </div>
<?php $this->load->view('partial/footer.php');  ?>
