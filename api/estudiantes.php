<?php
header('Content-Type: application/json; charset=utf-8');

require_once '../conexion.php'; 

$metodo = $_SERVER['REQUEST_METHOD'];

try {
    switch ($metodo) {

        case 'GET':
            //El LEFT JOIN
            $sql = "SELECT student.*, degree_program.degree_name 
                    FROM student 
                    LEFT JOIN degree_program ON student.degree_id = degree_program.degree_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $students_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($students_list);
            break;
        
        // ====================================================================================
        case 'POST':
            $input = json_decode(file_get_contents('php://input'), true);
            
            // Si el usuario no selecciona carrera, mandamos NULL a la BD
            $degree_id = !empty($input['degree_id']) ? $input['degree_id'] : null;

            //insertar variables
            $sql = "INSERT INTO student (code, first_name, last_name, email, degree_id) 
                    VALUES (:code, :first_name, :last_name, :email, :degree_id)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':code'       => $input['code'],
                ':first_name' => $input['firstname'],
                ':last_name'  => $input['lastname'],
                ':email'      => $input['email'],
                ':degree_id'  => $degree_id
            ]);
            echo json_encode(['status' => 'success', 'mensaje' => 'Estudiante creado exitosamente']);
            break;

        // ====================================================================================
        case 'PUT':
            $input = json_decode(file_get_contents('php://input'), true);
            
            $degree_id = !empty($input['degree_id']) ? $input['degree_id'] : null;

            // actualizar
            $sql = "UPDATE student 
                    SET first_name = :first_name, last_name = :last_name, email = :email, degree_id = :degree_id 
                    WHERE code = :code";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':code'       => $input['code'],
                ':first_name' => $input['firstname'], 
                ':last_name'  => $input['lastname'],
                ':email'      => $input['email'],
                ':degree_id'  => $degree_id
            ]);
            
            echo json_encode(['status' => 'success', 'mensaje' => 'Estudiante actualizado exitosamente']);
            break;
        
        // ====================================================================================
        case 'DELETE':
            $input = json_decode(file_get_contents('php://input'), true);
            
            $sql = "DELETE FROM student WHERE code = :code";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':code' => $input['code']
            ]);
            
            echo json_encode(['status' => 'success', 'mensaje' => 'Estudiante eliminado para siempre']);
            break;
    }

} catch (\PDOException $e) {
    echo json_encode(['status' => 'error', 'mensaje' => $e->getMessage()]);
}
?>