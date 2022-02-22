
<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>app">Home</a></li>
                <li class="breadcrumb-item "><a href="<?php echo base_url("app/" . $this->uri->segment(2)) ?>"><?php echo ucfirst($this->uri->segment(2)) ?></a></li>
                <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(3)) ?></li>
            </ol>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-12"><?php echo ucfirst($this->uri->segment(2) . ' ' . $this->uri->segment(3)) ?></div>
                    </div>
                </div>
                <div class="card-body">
        <table class="table">
	    <tr><td>Post</td><td><?php echo $post; ?></td></tr>
	    <tr><td>Comment</td><td><?php echo $comment; ?></td></tr>
	    <tr><td>Authorname</td><td><?php echo $authorname; ?></td></tr>
	    <tr><td>Authoremail</td><td><?php echo $authoremail; ?></td></tr>
	    <tr><td>Authorip</td><td><?php echo $authorip; ?></td></tr>
	    <tr><td>Approved</td><td><?php echo $approved; ?></td></tr>
	    <tr><td>Createdat</td><td><?php echo $createdat; ?></td></tr>
	    <tr><td>Createdby</td><td><?php echo $createdby; ?></td></tr>
	    <tr><td>Updatedat</td><td><?php echo $updatedat; ?></td></tr>
	    <tr><td>Updatedby</td><td><?php echo $updatedby; ?></td></tr>
	</table>
        </div>
                <div class="card-footer">
                    <a href="<?php echo site_url('app/comments/'.$id."/1")?>" class="btn btn-success">Approved</a>
                    <a href="<?php echo site_url('app/comments') ?>" class="btn btn-warning">Cancel</a>
                </div>
            </form>
        </div>
    </div> <!-- end col -->
</div>