<?php $this->load->view('partial/header'); ?>
    <header class="masthead" style="background-image: url('<?php echo base_url();?>assets/img/about-bg.jpg')">  
        <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
                <h1>Edit Artikel</h1>
            </div>
            </div>
        </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Edit Artikel</h1>
                <div class="alert alert-warning">
                    <?php echo validation_errors();  ?>
                </div>
                <?php echo form_open_multipart();?>
                <!-- <form method="POST"> -->
                    <div class='form-group'>
                        <label>Judul</label>
                        <?php echo form_input('title', $blog['title'], 'class="form-control"'); ?>
                        <!-- <input type="text" name="title" class="form-control" value="<?php echo $blog['title'];?>"> -->
                    </div>
                    <div class='form-group'>
                        <label>Url</label>
                        <?php echo form_input('url', $blog['url'], 'class="form-control"'); ?>
                        <!-- <input type="text" name="url" class="form-control" value="<?php echo $blog['url'];?>"> -->
                    </div>
                    <div class='form-group'>
                        <label>Konten</label>
                        <?php echo form_textarea('content', $blog['content'], ' cols="30" rows="10" class="form-control"'); ?>
                        <!-- <textarea name="content" id="" class="form-control" cols="30" rows="10">
                            <?php echo $blog['content'];?>
                        </textarea> -->
                    </div>
                    <div class="form-group">
                        <label>Cover</label>
                        <?php echo form_upload('cover', $blog['cover'], 'class="form-control"'); ?>
                    </div>
                    <button type="submit" class='btn btn-primary'>Edit Artikel</button>
                <!-- </form> -->
            </div>
        </div>
    </div>
<?php $this->load->view('partial/footer'); ?>