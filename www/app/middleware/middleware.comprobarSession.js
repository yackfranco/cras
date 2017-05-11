function middlewareComprobarSession($this, $localStorage, $sessionStorage) {
  if (typeof $sessionStorage.usuario == undefined) {
    $this.redirectTo('/');
  } else {
    $this.next();
  }
}