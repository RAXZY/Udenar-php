<?php
header('Content-Type: application/json; charset=utf-8');
require_once '../conexion.php'; 

$metodo = $_SERVER['REQUEST_METHOD'];

try {
    switch ($metodo) {
        // =================leer===============================================
        case 'GET':
            // Ahora seleccionamos todo (*) para llenar la tabla
            $stmt = $pdo->prepare("SELECT * FROM degree_program ORDER BY degree_name ASC");
            $stmt->execute();
            $carreras = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($carreras);
            break;
            
        // =================CREAR===============================================
        case 'POST':
            $input = json_decode(file_get_contents('php://input'), true);
            
            $sql = "INSERT INTO degree_program (degree_id, degree_name, faculty) 
                    VALUES (:degree_id, :degree_name, :faculty)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':degree_id'   => $input['degree_id'],
                ':degree_name' => $input['degree_name'],
                ':faculty'     => $input['faculty']
            ]);
            echo json_encode(['status' => 'success', 'mensaje' => 'Carrera creada exitosamente']);
            break;

        // =================ACTUALIZAR============================================
        case 'PUT':
            $input = json_decode(file_get_contents('php://input'), true);
            
            $sql = "UPDATE degree_program 
                    SET degree_name = :degree_name, faculty = :faculty 
                    WHERE degree_id = :degree_id";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':degree_id'   => $input['degree_id'],
                ':degree_name' => $input['degree_name'],
                ':faculty'     => $input['faculty']
            ]);
            
            echo json_encode(['status' => 'success', 'mensaje' => 'Carrera actualizada exitosamente']);
            break;
        
        // =================ELIMINAR===============================================
        case 'DELETE':
            $input = json_decode(file_get_contents('php://input'), true);
            
            $sql = "DELETE FROM degree_program WHERE degree_id = :degree_id";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':degree_id' => $input['degree_id']
            ]);
            
            echo json_encode(['status' => 'success', 'mensaje' => 'Carrera eliminada del sistema']);
            break;
    }

} catch (\PDOException $e) {
    // Si la carrera tiene estudiantes se lanzará este error
    echo json_encode(['status' => 'error', 'mensaje' => $e->getMessage()]);
}
?>