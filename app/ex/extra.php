<script type="text/javascript">
var currentSessionValue = 1;
// pseudo code
setTimeout(checkSession, 5000);
function checkSession() {
     $.ajax({
        url: "<?php echo BASE_URL; ?>/Login/logoutSetTime", //Change this URL as per your settings
        success: function(newVal) {
            if (newVal != currentSessionValue);
                currentSessionValue = newVal;
                alert('Session expired.');
                window.location = 'Your redirect login URL goes here.';
            }
     });
}	
</script>