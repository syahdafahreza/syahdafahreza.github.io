<!-- Modal -->
<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="Change Password">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return false;" id="changePassword">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-lock"></i> Change Password</h4>
            </div>
            <div class="modal-body">
            	<div id="msg"></div>
            	<div class="msg"></div>
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" name="current_pass" id="current_pass" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" id="pass" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="con_pass" id="con_pass" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
            	<input type="hidden" name="uid" value="<?php echo isset($_SESSION['id'])?$_SESSION['id']:''; ?>" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="change" class="btn btn-danger">Change</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo HOME_URL; ?>custom/js/jquery.min.js"></script>
<script src="<?php echo HOME_URL; ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo HOME_URL; ?>custom/js/bootstrap-select.min.js"></script>
<script src="<?php echo HOME_URL; ?>custom/js/bootstrap-datepicker.js"></script>
<script src="<?php echo HOME_URL; ?>custom/js/app.min.js"></script>
<script src="<?php echo HOME_URL; ?>custom/js/maskedinput.min.js"></script>
<script src="<?php echo HOME_URL; ?>custom/js/wavesurfer.js"></script>
<script src="<?php echo HOME_URL; ?>custom/js/wavesurfer.timeline.min.js"></script>
<!--colorbox-->
<script src="<?php echo HOME_URL; ?>custom/js/jquery.colorbox-min.js"></script>
<script src="<?php echo HOME_URL; ?>custom/js/custom.js"></script>
</body>
</html>