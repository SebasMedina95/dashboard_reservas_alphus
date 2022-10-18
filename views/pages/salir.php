<?php 

/**Destruimos todas las sesiones */
session_destroy(); 
/** Tomamos $rutaBackend de la plantilla que la tenemos definida*/
echo '<script>

window.location = "'.$rutaBackend.'";

</script>';

?>