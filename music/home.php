<?php include_once('header.php'); ?>
<?php include_once('login-buffer.php'); ?>
<div class="wrapper">

  <?php include_once('top-bar.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('side-bar.php'); ?>
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include_once('content-header.php'); ?>
    <?php
		$getSubData	=	'SELECT * FROM '.TB_USER.' WHERE 1 ORDER BY id DESC';
		$subRecords	=	$db->getRecFrmQry($getSubData);
		
		$records_per_page = 25;
		$rowCount	=	count($subRecords);
		$pagination->records(count($subRecords));
		$pagination->records_per_page($records_per_page);
		
		$subRecData	=	$db->getRecFrmQry($getSubData.' LIMIT '.(($pagination->get_page() - 1)*$records_per_page).','. $records_per_page.'');
		
	?>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-play"></i> User Data</div>
                    <div class="panel-body">
                    	<div class="box">
                            <div class="box-header with-border">All Records</div>
                            <div class="box-body">
                            	<div class="row">
                                    <div class="col-sm-12">
                                        <div id="waveform"></div>
                                        <div id="wave-timeline"></div>
                                        <div class="control-box">
                                            <ul class="nav nav-tabs nav-justified">
                                            	<li><a class="player-active" href="javascript:void(0);" onClick="wavesurfer.setPlaybackRate(1)"><i class="fa fa-fw fa-backward"></i></a></li>
                                                <li><a href="javascript:void(0);" onclick="wavesurfer.skipBackward()"><i class="fa fa-fw fa-step-backward"></i></a></li>
                                                <li><a href="javascript:void(0);" class="playPause"><i id="play"><i class="fa fa-fw fa-play"></i></i><i id="pause" style="display: none"><i class="fa fa-fw fa-pause"></i></i></a></li>
                                                <li><a href="javascript:void(0);" onclick="wavesurfer.skipForward()"><i class="fa fa-fw fa-step-forward"></i></a></li>
                                                <li><a href="javascript:void(0);" onClick="wavesurfer.setPlaybackRate(1.5)"><i class="fa fa-fw fa-forward"></i></a></li>
                                                <li><a href="javascript:void(0);" id="mute"><i class="fa fa-fw fa-volume-up"></i></a></li>
                                            </ul>
                                        </div>
                                    </div> <!--/.col-sm-12-->
                                    <div class="clearfix"></div>
                                </div>
                                <hr>
                                <div class="table table-responsive">
                                    <table class="table table-hover table-bordered table-striped">
                                        <thead class="table-active-bg">
                                            <tr>
                                                <th width="20">Sr#</th>
                                                <th>DateTime</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Phone</th>
                                                <th>Call ID</th>
                                                <th>Campaign</th>
                                                <th>Recording File</th>
                                                <th>Play Link</th>
                                                <th>Download Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
												if($rowCount>0){
													$s	=	0;
													foreach($subRecData as $row){
														$s++;
											?>
                                            <tr>
                                                <td><?php echo $s; ?></td>
                                                <td><?php echo $row['dt']; ?></td>
                                                <td><?php echo $row['firstname']; ?></td>
                                                <td><?php echo $row['lastname']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['callid']; ?></td>
                                                <td><?php echo $row['campaign']; ?></td>
                                                <td><?php echo $row['recordingfile']; ?></td>
                                                <td class="text-center playlist"><a href="<?php echo FILE_URL.$row['recordingfile']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Load File</a></td>
                                                <td class="text-center"><a href="<?php echo HOME_URL; ?>download-files?file=<?php echo $row['recordingfile']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-download"></i></a></td>
                                            </tr>
                                            <?php
													}
												}else{
											?>
                                            <tr>
                                            	<td colspan="15" class="text-capitalize text-center"><strong>No Record(s) Found!</strong></td>
                                            </tr>
                                            <?php
												}
											?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="table-active-bg">
                                                <td class="text-left" colspan="15">
											 		Total Records <kbd><?php echo $rowCount; ?></kbd>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <!--/.table-responsive-->
                                <div class="box-footer clearfix">
                                	<div class="col-sm-12 text-right">
                                    	<?php $pagination->render(); ?>
                                    </div>
                                    <div class="clearfix"></div>                                    
                                </div>
                            </div>
                    	</div>
                    </div> <!--/.panel-body-->
                </div>
            </div> <!--/.col-sm-12-->
        </div>
    </section> <!-- /.content -->
    
</div> <!-- /.content-wrapper -->
  
    <?php include_once('copy-rights.php'); ?>
    
</div> <!-- ./wrapper -->

<?php include_once('footer.php'); ?>
