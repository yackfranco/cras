function middlewareComprobarPermisoDeAdmnistracion($this, $localStorage, $sessionStorage, rolAdmin) {
  if ($sessionStorage.usuario.rol_id == rolAdmin) {
    $this.next();
  } else {
    $this.redirectTo('/logout');
  }
}