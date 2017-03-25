
<!-- Footer Portion -->
<!-- End Footer Portion -->

	<!-- begin right sidebar -->
	<div class="right-sidebar col-sm-2">
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Latest</h3>
			</div>
			<div class="panel-body holder">
				<marquee behavior="scroll" direction="up" scrollamount="2" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 2, 0);">

					<p align="left">
						<img src="<?=base_url('resources/img/new.png')?>">  <a href="ndl/NDL.pdf" target="_blank" style="text-decoration:none"><font size="2" color="#000000" face="arial">Notification: National Digital Library</font></a>
					</p>
						   
					<p align="left">
						<a href="http://gyan.iitg.ernet.in/" target="_blank" style="text-decoration:none"><font size="2" color="#000000" face="arial"><strong>♦ Gyan-</strong> Institutional Repository</font></a>
					</p>

					<p align="left">
						<a href="http://172.16.2.5/bis/home.aspx" target="_blank" style="text-decoration:none"><font size="2" color="#000000" face="arial">♦ Indian Standards Online(support Chrome/IE)</font></a>
					</p>

					<p align="left">
						    <a href="http://Community.WorldLibrary.In/?AffiliateKey=NDL-QV1215" target="_blank" style="text-decoration:none"><font size="2" color="#000000" face="arial"> ♦ World eBook Library</font></a>
					</p>
							
					<p align="left">
						     <a href="http://www.southasiaarchive.com/" target="_blank" style="text-decoration:none"><font size="2" color="#000000" face="arial">♦ South Asia Archive</font></a>
					</p>
							
					<p align="left">
						    <a href="prowessIQ.pdf" target="_blank" style="text-decoration:none"><font size="2" color="#000000" face="arial">♦ Prowess For Interactive Querying (ProwessIQ) Databse</font></a>
					</p>

					<p align="left">
						 <a href="" target="_blank" style="text-decoration:none">
						 	<font size="2" color="#000000" face="arial">New Library Opening Time:<br>
								From 08:00 AM till 02:00 AM, <br>
								24 hrs during mid/end semester exams 
							</font>
						</a>
					</p>
				</marquee>
			</div>
		</div>
	</div>

</div> <!-- end row -->
</div> <!-- end container -->

<script type="text/javascript" src="<?=base_url('resources/js/jquery-3.1.1.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('resources/js/bootstrap/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('resources/js/jquery-ui/jquery-ui.min.js');?>"></script>

<script>
	$(document).ready(function(){
	    // Smart Tab
	        $('#tabs').smartTab({autoProgress: false,stopOnFocus:true,transitionEffect:'vSlide'});
	    });

	function limittoBooksandebooks(myForm) {
	 myForm.bquery.value += ' AND (PT Book OR PT ebook)';
	}
</script>

</body>
</html>