<?php
require_once '../Models/conexion.php';
require_once '../Models/employees.php';

$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'login':
        //session iniciada
        session_start();
        $employees = new Employees();
        $employees->setEm_correo($_REQUEST['correo']);
        $employees->setEm_password($_REQUEST['password']);
        $res = $employees->login();

        header('Content-Type:apllication/json');
        if (!empty($res)) {
            //compara la contraseña encriptada de la bd con la ingresada en el login
            if (password_verify($employees->getEm_password(), $res['em_password'])) {
                //array para convertir a JSON
                $datos = array(
                    'estado' => 'ok'
                );
                //variable global session
                $_SESSION['user'] = array(
                    'auth' => true,
                    'id' => $res['em_id'],
                    'correo' => $res['em_correo'],
                    'nombre' => $res['em_nombre'],
                    'rol'=>$res['roles_ro_id'],
                );
            } else {
                $datos = array(
                    'estado' => 'password incorrecta'
                );
            }
        } else {
            $datos = array(
                'estado' => 'datos invalidos'
            );
        }
        echo json_encode($datos, JSON_FORCE_OBJECT);
        break;
    case 'agregar':

        //encripta la contraseña ingresada
        $password_hash = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);

        $employees = new Employees();
        $employees->setEm_id(0);
        $employees->setEm_nombre($_REQUEST['nombre']);
        $employees->setEm_apellido($_REQUEST['apellidos']);
        $employees->setEm_correo($_REQUEST['correo']);
        $employees->setEm_password($password_hash);
        $employees->setEm_telefono($_REQUEST['telefono']);
        $employees->setRoles($_REQUEST["rol"]);
        $employees->setEstados($_REQUEST['estado']);
        $employees->setEm_sexo($_REQUEST['sexo']);
        $employees->setUpdate_time(date("Y-m-d H:i:s"));
        $employees->setCreate_time(date("Y-m-d H:i:s"));

        $res = $employees->agregar();


        header('Content-Type:apllication/json');
        if ($res == 1) {
            //array para convertir a JSON
            $datos = array(
                'estado' => 'agregado'
            );
        } else {
            $datos = array(
                'estado' => 'error'
            );
        }
        //enviar JSON al servidor para recibirlo en ajax
        echo json_encode($datos, JSON_FORCE_OBJECT);
        break;
    case 'eliminar':

        $employees = new Employees();
        $employees->setEm_id($_REQUEST['id']);

        $res = $employees->eliminar();
        header('Content-Type:apllication/json');
        if ($res == 1) {
            $datos = array(
                'estado' => 'eliminado'
            );
        } else {
            $datos = array(
                'estado' => 'error'
            );
        }
        echo json_encode($datos, JSON_FORCE_OBJECT);
        break;
    case 'verificar':
        $employees = new Employees();
        $employees->setEm_correo($_REQUEST['correo']);
        $res = $employees->verificar_correo();
        header('Content-Type:apllication/json');
        if ($res == true) {
            $datos = array(
                'datos' => 'existe'
            );
        } else {
            $datos = array(
                'datos' => 'no existe'
            );
        }
        echo json_encode($datos, JSON_FORCE_OBJECT);

        break;

        case 'verificar_modificar':
            $employees = new Employees();
            $employees->setEm_correo($_REQUEST['correo']);
            $res = $employees->verificar_correo();
            header('Content-Type:apllication/json');
            if ($res == true) {
                $datos = array(
                    'datos' => 'existe'
                );
            } else {
                $datos = array(
                    'datos' => 'no existe'
                );
            }
            echo json_encode($datos, JSON_FORCE_OBJECT);
    
            break;
    


    case 'buscar':

        $employees = new Employees();
        $id = $_REQUEST['id'];
        $res = $employees->buscar($id);


        header('Content-Type:apllication/json');

        /* print_r( $res); */

        $funcionario = array(
            'id' => $res['em_id'],
            'nombre' => $res['em_nombre'],
            'apellidos' => $res['em_apellido'],
            'correo' => $res['em_correo'],
            'telefono' => $res['em_telefono'],
            'sexo' => $res['em_sexo'],
            'rol' => $res['roles_ro_id'],
            'estado' => $res['estado_employees_esm_id'],
        );

        echo json_encode($funcionario, JSON_FORCE_OBJECT);


        break;

    case 'modificar':
        $employees = new Employees();
        
        
        $employees->setEm_id($_REQUEST['id']);
        $employees->setEm_nombre($_REQUEST['nombre']);
        $employees->setEm_apellido($_REQUEST['apellidos']);
        $employees->setEm_correo($_REQUEST['correo']);
        $employees->setEm_telefono($_REQUEST['telefono']);
        $employees->setRoles($_REQUEST['rol']);
        $employees->setEstados($_REQUEST['estado']);
        $employees->setEm_sexo($_REQUEST['sexo']);
        $employees->setUpdate_time(date("Y-m-d H:i:s"));


        $res = $employees->modificar();
       
        echo $res;
        header('Content-Type:apllication/json'); 
        if ($res == true) {
            $datos = array(
                'info' => 'ok'
            );
        } else {
            $datos = array(
                'info' => $res
            );
        }
        echo json_encode($datos, JSON_FORCE_OBJECT); 
        break;
}
