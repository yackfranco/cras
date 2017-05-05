<?php
/**
 * Manager Class de la tabla rol
 */
class rol {
/**
 *Llave Principal y campo autoincrementable de la tabla rol
 * @var integer 
 */
    private $id;
/**
*Nombre del rol
* @var string 
*/
    private $nombre;
/**
* Obtiene el ID del registro
* @return integer
*/
    public function getId() {
        return $this->id;
    }
/**
 * Obtiene el nombre del registro
 * @return string
 */
    public function getNombre() {
        return $this->nombre;
    }
/**
 * Setea el ID del registro
 * @param type integer
 */
    public function setId($id) {
        $this->id = $id;
    }
/**
 * Setea el nombre del registro
 * @param string
 */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
