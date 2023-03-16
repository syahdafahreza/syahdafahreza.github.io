$(document).ready(function(e) {
    var pathname 	= 	window.location.pathname; // Returns path only
	var url      	= 	window.location.href;     // Returns full URL
	var homeurl		=	"/music/";
	loginFormValidation();
	$("#login-form").on("submit",function(){
		if($("#login-email").val()==""){
			$("#login-email-msg").html('<i class="fa fa-fw fa-exclamation-triangle"></i> Enter your Email ID');
			$("#login-email-msg").parent('div').addClass('has-error');
		}else if($("#login-password").val()==""){
			$("#login-password-msg").html('<i class="fa fa-fw fa-exclamation-triangle"></i> Enter your password');
			$("#login-password-msg").parent('div').addClass('has-error');
		}else{
			$("#login-msg").html('<div class="text-center"><i class="fa fa-fw fa-spin fa-spinner"></i> Please wait...!</div>');
			$.ajax({
				url:url+'ajax/login.ajax.php',
				type:'POST',
				data:$("#login-form").serialize(),
				success: function(data){
					a	=	data.split('|^*^|');
					if(a[1]=1){
						$("#login-msg").html(a[0]);
						setTimeout(function(){window.location.href=url+'home'},1000);
					}else if(a[1]=0){
						$("#login-msg").html(a[0]);
						return false;
					}
				}
			});
		}
	});
	
	$("#changePassword").on("submit",function(){
		if($("#current_pass").val()==""){
			$(".msg").html('<div class="text-danger text-center"><i class="fa fa-exclamation-circle"></i> Please enter current password first.</div>');
		}else if($("#pass").val()==""){
			$(".msg").html('<div class="text-danger text-center"><i class="fa fa-exclamation-circle"></i> Please enter password first.</div>');
		}else if($("#con_pass").val()==""){
			$(".msg").html('<div class="text-danger text-center"><i class="fa fa-exclamation-circle"></i> Please enter Confirm password first.</div>');
		}else if($("#pass").val()!=$("#con_pass").val()){
			$(".msg").html('<div class="text-danger text-center"><i class="fa fa-exclamation-circle"></i> Password must be equal to Current password.</div>');
		}else{
			$.ajax({
				type:'POST',
				url:homeurl+'ajax/change.password.php',
				data:$("#changePassword").serialize(),
				success: function(data){
					a	=	data.split('|^***^|');
					if(a[1]==1){
						$(".msg").html(a[0]);
						setTimeout(function(){$(".close").click();},1500);
					}else{
						$(".msg").html(a[0]);
					}
				}
			});
		}
	});
	
	// input mask
	jQuery(function($){
		$("#phone").mask("999-999-9999");
		$("#zipcode").mask("99999");
	});
	
	//datepicker
	$('.datepicker').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true,
		toggleActive: true,
		todayHighlight: true,
	});
	
	//colorbox
	$(".ajax").colorbox({width:'100%', maxWidth:'100%', height:'80%'});
	
	//Model bootstrap
	//$('#changePass').modal();
	
});

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test($email);
}
function loginFormValidation(){
	$("#login-email").on("keyup",function() {
        if(!validateEmail($("#login-email").val())) {
			$("#login-email-msg").parent('div').removeClass('has-error');
			$("#login-email-msg").html('');
		}
    });
	$("#login-password").on("keyup",function() {
        if($("#login-password").val()) {
			$("#login-password-msg").parent('div').removeClass('has-error');
			$("#login-password-msg").html('');
		}
    });
}
/*$(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
});
$(document).on('change', '.file', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});*/
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

/*//select all checkboxes
$("#select_all").change(function(){  //"select all" change
    var status = this.checked; // "select all" checked status
    $('.checkbox').each(function(){ //iterate all listed checkbox items
        this.checked = status; //change ".checkbox" checked status
    });
});

//uncheck "select all", if one of the listed checkbox item is unchecked
$('.checkbox').change(function(){ //".checkbox" change
    if(this.checked == false){ //if this item is unchecked
        $("#select_all")[0].checked = false; //change "select all" checked status to false
    }
});
*/

// Create a WaveSurfer instance START
var wavesurfer = Object.create(WaveSurfer);

// Init on DOM ready
document.addEventListener('DOMContentLoaded', function () {
    wavesurfer.init({
        container: '#waveform',
        waveColor: '#428bca',
        progressColor: '#dddddd',
		cursorColor:'#dddddd',
        height: 120,
        barWidth: 3,
		minPxPerSec: 0.5,
		scrollParent: true,
    });
});

// Bind controls
document.addEventListener('DOMContentLoaded', function () {
    var playPause = document.querySelector('.playPause');
    playPause.addEventListener('click', function () {
        wavesurfer.playPause();
    });
	
    // Toggle play/pause text
    wavesurfer.on('play', function () {
        document.querySelector('#play').style.display = 'none';
        document.querySelector('#pause').style.display = '';
    });
    wavesurfer.on('pause', function () {
        document.querySelector('#play').style.display = '';
        document.querySelector('#pause').style.display = 'none';
    });
	
	$("#mute").on('click', function () {
         wavesurfer.toggleMute();
		 $(this).find('i').toggleClass('fa-volume-up fa-volume-off')
    });
		
	// The playlist links
    var links = document.querySelectorAll('.playlist a');
    var currentTrack = 0;

    // Load a track by index and highlight the corresponding link
    var setCurrentSong = function (index) {
        links[currentTrack].classList.remove('active');
        currentTrack = index;
        links[currentTrack].classList.add('active');
        wavesurfer.load(links[currentTrack].href);
    };

    // Load the track on click
    Array.prototype.forEach.call(links, function (link, index) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            setCurrentSong(index);
        });
    });

    // Play on audio load
	wavesurfer.on('ready', function () {
		//wavesurfer.play();
        // Init Timeline plugin
        var timeline = Object.create(WaveSurfer.Timeline);

        timeline.init({
            wavesurfer: wavesurfer,
            container: '#wave-timeline',
			//timeInterval:60,
        });

    });

    // Go to the next track on finish
    wavesurfer.on('finish', function () {
        setCurrentSong((currentTrack) % links.length); // on finish stay on a same track
		//setCurrentSong((currentTrack + 1) % links.length); //on finish move to another track
    });
	
    // Load the first track page load
    setCurrentSong(currentTrack);
});

