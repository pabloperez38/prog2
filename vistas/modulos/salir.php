<?php
session_destroy();
 echo '<script>
window.location = "'.Plantilla::url().'";
</script>';