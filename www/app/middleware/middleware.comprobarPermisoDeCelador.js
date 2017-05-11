function middlewareComprobarPermisoDeCelador($this, $localStorage, $sessionStorage, rolCelador) {
  if ($sessionStorage.usuario.rol_id == rolCelador) {
    $this.next();
  } else {
    $this.redirectTo('/logout');
  }
}