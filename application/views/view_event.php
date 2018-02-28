<div class="container-fluid page-bg">
<div class="">
<div class="row header-title leaderboard-bg">
  <div class="col-md-12">
  <div class="container">
      <p class="leader-title">Bootstrap example of Fixed Background Image using HTML, Javascript, jQuery, and CSS. Snippet by iammahesh.</p>
    </div>
  </div>
</div>

<section class="container">
  <div class="leaderboard-menu-tab">
        <div class="row row-offcanvas row-offcanvas-right">
          <div class="col-12 col-md-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
              <a href="<?php echo base_url(); ?>leaderboard" class="list-group-item "><span class="menu-icons"><i class="fas fa-trophy"></i></span>Dashboard</a>
              <a href="<?php echo base_url(); ?>profile" class="list-group-item"><span class="menu-icons"><i class="fas fa-user"></i></span>Profile</a>
                <a href="<?php echo base_url(); ?>profile_picture" class="list-group-item "><span class="menu-icons"><i class="fas fa-user"></i></span>Display Picture</a>
                <?php $user_id=$this->session->userdata('id');
                if($user_id=='2'){ ?>
                    <a href="<?php echo base_url(); ?>createevent" class="list-group-item"><span class="menu-icons"><i class="far fa-plus-square"></i></span>Create event </a>
                      <a href="<?php echo base_url(); ?>viewevents" class="list-group-item  active"><span class="menu-icons"><i class="fas fa-table"></i></span>View events </a>
                        <a href="<?php echo base_url(); ?>bookedevents" class="list-group-item"><span class="menu-icons"><i class="far fa-list-alt"></i></i></span>Booked Events</a>
              <?php   }else{

                } ?>
              <a href="<?php echo base_url(); ?>booking_history" class="list-group-item"><span class="menu-icons"><i class="fas fa-book"></i></span>Booking </a>
              <a href="<?php echo base_url(); ?>wishlist" class="list-group-item"><span class="menu-icons"><i class="fas fa-heart"></i></span>Whishlist</a>
              <!--a href="<?php echo base_url(); ?>organizerbooking/messageboard/" class="list-group-item">Messages</a-->
              <a href="#" class="list-group-item"><span class="menu-icons"><i class="fab fa-wpforms"></i></span>Reviews</a>
              <a href="<?php echo base_url(); ?>logout" class="list-group-item"><span class="menu-icons"><i class="fas fa-sign-out-alt"></i></span>Sign Out</a>
            </div>
          </div><!--/span-->

          <div class="col-12 col-md-9">
       
              <div class="card-header">
				<h3 class="mb-0">View  Event</h3>
			</div>
                         
                <!-- form user info -->
                  <div class="card card-outline-secondary" style="padding:5px;">
                  <table  class="table table-striped table-bordered display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Event Category</th>
                            <th>Event City</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($result as $rows){
							 $status=$rows->event_status;
							 ?>
                        <tr>
                            <td><?php echo $rows->event_name ; ?></td>
                            <td><?php echo $rows->category_name ; ?></td>
                            <td><?php echo $rows->city_name ; ?></td>
                            <td><?php if($status=='Y'){ echo'<button type="button" class="btn btn-secondary btn-success btn-sm"> Active </button>'; }else{ echo'<button type="button" class="btn btn-secondary btn-primary btn-sm"> Deactive </button>'; }?></td>
                            <td><a href="<?php echo base_url();?>home/updateevents/<?php echo base64_encode($rows->id);?>"><i class="fa fa-pencil-square-o"></a></td>
                        </tr>
                       <?php  } ?>
                        </tbody>
                    </table>
					</div>
            </div>
          </div><!--/span-->
        </div><!--/row-->

</section>
</div>
</div>

<script>
$(document).ready(function() {
  $('table.display').DataTable();
} );
</script>