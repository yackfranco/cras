/**
 * middleware el cual comprueba si hay una session con el rol de celador en linea
 * 
 */
function middlewareComprobarPermisoDeCelador($this, $localStorage, $sessionStorage, rolCelador) {
  if ($sessionStorage.usuario.rol_id == rolCelador) {
    $this.next();
  } else {
    $this.redirectTo('/logout');
  }
}