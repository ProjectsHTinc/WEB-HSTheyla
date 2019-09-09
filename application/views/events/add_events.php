<?php
  	$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	$current_time = $dateTime->format("h:i A");
?>
<script src="<?php echo base_url(); ?>assets/js/timepicki.js"></script>
<link href="<?php echo base_url(); ?>assets/css/timepicki.css" rel="stylesheet" type="text/css">

   <div class="page-content-wrapper ">
     <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-block">
                 <h4 class="mt-0 header-title"> Create Event </h4>
                  <?php if($this->session->flashdata('msg')): ?>
                    <div class="alert <?php $msg=$this->session->flashdata('msg');
                    if($msg=='Added Successfully' || $msg=='Update Successfully'){ echo "alert-success"; }else{ echo "alert-danger"; } ?>">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                       ×</button> <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                  <?php endif; ?>

                <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>events/add_events" name="eventform" id="eventform" onSubmit='return check();'>
                    <div class="form-group row">
                       <label for="country" class="col-sm-2 col-form-label">Select Country</label>
                       <div class="col-sm-4">
                         <select class="form-control" name="country" onchange="getcityname(this.value)">
                           <option value="">Select country</option>
                                <?php foreach($country_list as $cntry){ ?>
                                   <option value="<?php echo $cntry->id; ?>"><?php echo $cntry->country_name; ?></option>
                                <?php } ?>
                           </select>
                       </div>
                       <label for="city" class="col-sm-2 col-form-label">Select City/Area</label>
                       <div class="col-sm-4">
                          <select class="form-control" name="city" id="ctname">
                                     <option value="">Select city/area</option>
                           </select>
                           <div id="cmsg"></div>
                       </div>
                   </div>
                        <div class="form-group row">
                            <label for="Category" class="col-sm-2 col-form-label">Event Category</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="category">
                                  <option value="">Select category</option>
                                     <?php foreach($category_list as $res){ ?>
                                        <option value="<?php echo $res->id; ?>"><?php echo $res->category_name; ?></option>
                                     <?php } ?>
                                </select>
                            </div>

                            <label for="Name" class="col-sm-2 col-form-label">Event Name</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text"  name="event_name">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Venue" class="col-sm-2 col-form-label">Venue</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text"  name="venue"  >
                            </div>
                             <label for="Address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-4">
                               <textarea id="textarea" name="address"  class="form-control" maxlength="240" rows="5" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                           <label for="latitude" class="col-sm-12 col-form-label">Choose the latitude and longitude by clicking on the map</label>
                          <div id="dvMap" style="width:100%; height:300px"> </div>

                        </div>
                      <div class="form-group row">
                          <label for="latitude" class="col-sm-2 col-form-label">Event Latitude</label>
                          <div class="col-sm-4">
                              <input class="form-control" type="text" name="txtLatitude"  id="latu" >
                              <div id="ermsg"></div> <div id="ermsg2"></div>
                          </div>
                            <label for="longitude" class="col-sm-2 col-form-label">Event Longitude</label>
                          <div class="col-sm-4">
                              <input class="form-control" type="text" name="txtLongitude" id="lon">
                               <div id="ermsg1"></div> <div id="ermsg3"></div>
                          </div>
                      </div>



					                 <div id = "date_time">
                       <div class="form-group row">
                            <label for="sdate" class="col-sm-2 col-form-label">Start Date</label>
                            <div class="col-sm-4">
                              <div class="input-group">
                                <input type="text" class="form-control datepicker"  name="start_date" id="datepicker-autoclose" value="<?php echo date("d-m-Y"); ?>">

                            </div>
                            </div>

                             <label for="edate" class="col-sm-2 col-form-label">End Date</label>
                            <div class="col-sm-4">
                               <div class="input-group">
                                <input type="text" class="form-control datepicker" name="end_date" id="datepicker" value="<?php echo date("d-m-Y"); ?>">


                            </div>
                            </div>
                        </div>
					</div>
                        <div class="form-group row">
                            <label for="stime" class="col-sm-2 col-form-label">Start Time</label>
                            <div class="col-sm-4">
                               <input  type="text" class="form-control" id="stime" name="start_time" value="<?php echo $current_time; ?>">

                            </div>
                             <label for="etime" class="col-sm-2 col-form-label">End Time</label>
                            <div class="col-sm-4">
                              <input  type="text" class="form-control" id="etime" name="end_time" value="<?php echo $current_time; ?>">

                            </div>
                        </div>
                        <div class="form-group row">
                           <label for="Status" class="col-sm-2 col-form-label">Event Advertisement </label>
                           <div class="col-sm-4">
                              <select class="form-control" name="eadv_status">
                                   <option value="">Select</option>
                                   <option value="Y">Enable</option>
                                   <option value="N">Disable</option>
                               </select>
                           </div>

                            <label for="Status" class="col-sm-2 col-form-label">Is this place a hotspot? </label>
                           <div class="col-sm-4">
                              <select class="form-control" name="hotspot_sts" id="hotspot_sts">
                                   <option value="">Select</option>
                                   <option value="Y">Yes</option>
                                   <option value="N">No</option>
                               </select>
                           </div>
                      </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea type="text" id="description"  name="description" class="form-control" maxlength="30000" rows="15" placeholder=""></textarea>
                            </div>



                        </div>


                        <div class="form-group row">
                            <label for="primarycell" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text"  name="pcontact_cell"  value="">
                            </div>
                            <label for="seccell" class="col-sm-2 col-form-label">Alternate Phone Number</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="scontact_cell" value="" >
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="Person" class="col-sm-2 col-form-label">Contact Person</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text"  name="contact_person" value="">
                            </div>
                            <label for="Email" class="col-sm-2 col-form-label">Email ID</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text"  name="email" value="" >
                            </div>
                        </div>



                        <div class="form-group row">

                            <label for="Colour" class="col-sm-2 col-form-label">Alternate Contact Person</label>
                            <div class="col-sm-4">
                              <input class="form-control" type="text"  name="sec_contact_person" value="" id="sec_contact_person">
                            </div>

                            <label class="col-sm-2 col-form-label">Event Banner
                              <span style="color:#F00;">(985*550px)</span></label>
                              <div class="col-sm-4">
                                 <input type="file" name="eventbanner" id="file_upload" class="form-control" accept="image/*" >
                                  <div id="preview" style="color: red;"></div>
                              </div>
							                 <!-- <label class="col-sm-2 col-form-label">Featured Event</label>
                              <div class="col-sm-4">
                                 <input type="radio" name="featured_sts" value="Y"> Yes
                                  <input type="radio" name="featured_sts" value="N" checked> No
                              </div> -->

                        </div>

                        <div class="form-group row">
                          <label for="ecost" class="col-sm-2 col-form-label">Event Type</label>
                         <div class="col-sm-4">
                              <select class="form-control"  name="eventcost">
                                 <option value="Free">Free</option>
                                 <option value="Paid">Paid</option>
                                 <!-- <option value="Invite">Invite</option> -->
                             </select>
                           </div>
                            <label for="Status" class="col-sm-2 col-form-label">Event Status</label>
                            <div class="col-sm-4">
                               <select class="form-control"  name="event_status">
                                    <option value="">Select status</option>
                                    <option value="Y">Active</option>
                                    <option value="N">Inactive</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-2">
                              <button type="submit" class="btn btn-success waves-effect waves-light">
                              Create </button></div>
                              <div class="col-sm-2">
                              <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                              Clear
                              </button></div>
                        </div>

                     </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

                        </div><!-- container -->
   </div>
   <!-- Page content Wrapper -->
</div>
<!-- content -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByz7sU142AeFwpK3KiFilK0IOoa2GU9tw"></script>

<script type="text/javascript">

	$('#stime').timepicki();
	$('#etime').timepicki();

	 window.onload = function () {
		var mapOptions = {
					center: new google.maps.LatLng(20.5937, 78.9629),
					zoom:4,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var infoWindow = new google.maps.InfoWindow();
				var latlngbounds = new google.maps.LatLngBounds();
				var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
				google.maps.event.addListener(map, 'click', function (e)
				{
				 var la=e.latLng.lat();
				 var lo=e.latLng.lng();
				 document.getElementById("latu").value=la;
				 document.getElementById("lon").value=lo;
				});
	 }


  $(document).ready(function () {

	$( ".datepicker" ).datepicker({
		format: 'dd-mm-yyyy'
	});

	$('#hotspot_sts').on('change', function() {
	var strdisplay = $(this).val();
    var e = document.getElementById("date_time");
    if(strdisplay == "Y") {
        e.style.display = "none";
    } else {
        e.style.display = "block";
    }
  });

  $('#file_upload').on('change', function() {
	  var f=this.files[0]
	  var actual=f.size||f.fileSize;
	  var orgi=actual/1024;
		if(orgi<1024){
		  $("#preview").html('');
		  //$("#preview").html('<img src="<?php echo base_url(); ?>assets/loader.gif" alt="Uploading...."/>');
		  $("#eventform").ajaxForm({
			  target: '#preview'
		  }).submit();
		}else{
		  //$("#preview").html('File Size Must be  Lesser than 1 MB');
		  //alert("File Size Must be  Lesser than 1 MB");
		  return false;
		}
	});
  $.validator.addMethod('filesize', function (value, element, param) {
      return this.optional(element) || (element.files[0].size <= param)
  }, 'File size must be less than 1 MB');
    $('#eventform').validate({ // initialize the plugin
       rules: {
         category:{required:true },
         event_name:{required:true },
         country:{required:true },
         city:{required:true },
         venue:{required:true },
         address:{required:true },
         description:{required:true },
         eventcost:{required:true },
         start_date:{required:true },
         end_date:{ required:true },
         start_time:{required:true },
         end_time:{required:true },
         eadv_status:{required:true},
         hotspot_sts:{required:true},
         pcontact_cell:{required:true,digits:true,maxlength:12,minlength:8 },
         scontact_cell:{required:false,digits:true,maxlength:12,minlength:8},
         contact_person:{required:true},
         email:{required:true },
         event_status:{required:true },
         txtLatitude:{required:true },
         txtLongitude:{required:true },
		     eventbanner:{required:true,accept: "jpg,jpeg,png", filesize: 1048576  }
        },

        messages: {
        category:"Select category",
        event_name:"This field cannot be empty!",
        country:"Select country",
        city:"Select city/area",
        venue:"This field cannot be empty!",
        address:"This field cannot be empty!",
        description:"This field cannot be empty!",
        eventcost:"Select event type",
        start_date:"Select start date",
        end_date:"Select end date",
        start_time:"Select start time",
        end_time:"Select end time",
        eadv_status:"Selection required!",
        hotspot_sts:"Selection required!",
        pcontact_cell:{
          required:"This field cannot be empty!",
          digits:"Only numbers",
        },
        scontact_cell:{
          required:"This field cannot be empty!",
          digits:"Only numbers",
        },
        contact_person:{
          required:"This field cannot be empty!",

        },

        email:"This field cannot be empty!",
        event_status:"Select status",
        txtLatitude:"This field cannot be empty!",
        txtLongitude:"This field cannot be empty!",
    		eventbanner:{
          required:"Select banner",
          accept:"Please upload .jpg or .png .",
          fileSize:"File must be JPG or PNG, less than 1MB"
        }
       },
         });
   });

	function getcityname(cid) {
			$.ajax({
			type: 'post',
			url: '<?php echo base_url(); ?>events/get_city_name',
			data: { country_id:cid },
			dataType: "JSON",
			cache: false,
			success:function(cty)
            {
				// alert(cty);
				var len = cty.length;
				//alert(len);
				var cityname='';
				var ctitle='<option value="">Select City</option>';
				if(cty!='')
				{    //alert(len);
					for(var i=0; i<len; i++)
					{
					 var cityid = cty[i].id;
					 var city_name = cty[i].city_name;
					 //alert(city_name);
					 cityname +='<option value=' + cityid + '> ' + city_name + ' </option>';
					}
				$("#ctname").html(ctitle+cityname).show();
				$("#cmsg").hide();
				}else{
				$("#ctname").html(ctitle+cityname).show();


				}
            }
          });
       }

function check()
{
      var fdate = document.getElementById("datepicker-autoclose").value;
      var tdate = document.getElementById("datepicker").value;

      var chunks = fdate.split('-');
      var formattedDate = chunks[1]+'/'+chunks[0]+'/'+chunks[2];

      var chunks1 = tdate.split('-');
      var formattedDate1 = chunks1[1]+'/'+chunks1[0]+'/'+chunks1[2];

      if(Date.parse(formattedDate) > Date.parse(formattedDate1) )
      {
		alert("Startdate should be less than Enddate");
		return false;
      }

      if(Date.parse(formattedDate)==Date.parse(formattedDate1) )
      {
        var strStartTime = document.getElementById("stime").value;
        var strEndTime = document.getElementById("etime").value;

        var startTime = new Date().setHours(GetHours(strStartTime), GetMinutes(strStartTime), 0);
        var endTime = new Date(startTime)
        endTime = endTime.setHours(GetHours(strEndTime), GetMinutes(strEndTime), 0);

         temp =strStartTime.split(":");
         var a = temp[0];
         var b = temp[1];
         temp1 =b.split(" ");
         var c = temp1[1]

        if(a==12 && c=='AM'){

        }else if (startTime > endTime){
          alert("Start Time is greater than end time");
          return false;
        }
    }else{
        var date1 = new Date(formattedDate);
        var date2 = new Date(formattedDate1);

         var y1=chunks[2];
         var y2=chunks1[2];
        if(y1<y2){
            //alert(chunks[2]);alert(chunks1[2]);
        }else{
          var strStartTime = document.getElementById("stime").value;
          var strEndTime = document.getElementById("etime").value;
          var startTime = date1.setHours(GetHours(strStartTime), GetMinutes(strStartTime), 0);
          var endTime = new Date(startTime);
          endTime = endTime.setHours(GetHours(strEndTime), GetMinutes(strEndTime), 0);
          var a=formattedDate + '' +startTime;
          var b=formattedDate1 + ''+endTime;
          //alert(startTime);alert(endTime); alert(a);alert(b);
          if (a == b || a > b) {
          alert("Start Date & Time is greater than end Date & Time");
          return false;
          }
        }
    }
    function GetHours(d)
    {
        var h = parseInt(d.split(':')[0]);
        if (d.split(':')[1].split(' ')[1] == "PM") {
        h = h + 12;
		}
      return h;
    }

	function GetMinutes(d)
    {
		return parseInt(d.split(':')[1].split(' ')[0]);
    }

}
</script>
