<?php
date_default_timezone_set("America/Mexico_City");
require("fpdf/fpdf.php");
require("conexion.php");
$sql = "SELECT * FROM clientes";
$query = mysqli_query($con, $sql);
$fila = mysqli_fetch_assoc($query);

class PDF extends FPDF{
    function Header(){
        $x = $this -> GetPageWith()/2-10
        $this->Image("imagenes/proyecto.png", $x,0,20);
        $this-> SetFont('Arial','B',15);
        $this-> Cell(0, 10, 'Reporte general de clientes', 1, 0, 'C');
        $this-> Ln(20);
    }

    function Footer(){
        $this-> SetY(-15);
        $this-> SetFont('Arial','I',8);
        $this-> Cell(0, 10, utf8_decode('Página') . $this->PageNo() , 0, 0, 'C');
    }
}

$pdf = new PDF('L', 'mm', 'letter');
$pdf-> SetMargins(20, 20, 20);
$pdf-> AddPage('L','letter');
$pdf-> SetFont('Arial','B', 12);
$pdf-> Cell(20, 10, 'Fecha: ' . date('d/m/Y') , 0, 0, 'C');
$pdf-> Ln(10);

$pdf-> Cell(20, 10, utf8_decode('id_cliente.'), 0, 0, 'C');
$pdf-> Cell(40, 10, utf8_decode('nombre'), 0, 0, 'C');
$pdf-> Cell(50, 10, utf8_decode('email'), 0, 0, 'C');
$pdf-> Cell(35, 10, utf8_decode('mensaje'), 0, 0, 'C');
$pdf-> Cell(70, 10, utf8_decode('telefono'), 0, 0, 'C');
$pdf-> Ln();

$pdf-> SetLineWidth(1);
$pdf-> SetDrawColor(200,100,40);
$pdf-> Line(20,61,245,61);

$pdf-> SetFillColor(240,240,240);
$pdf-> SetTextColor(40,40,40);
$pdf-> SetDrawColor(255,255,255);

do{
    
    $pdf-> Cell(20, 10, utf8_decode($fila['id_cliente']), 1, 0, 'C', 1);
    $pdf-> Cell(40, 10, utf8_decode($fila['nombre']), 1, 0, 'C', 1);
    $pdf-> Cell(50, 10, utf8_decode($fila['email']), 1, 0, 'C', 1);
    $pdf-> Cell(35, 10, utf8_decode($fila['mensaje']), 1, 0, 'C');
    $pdf-> Cell(70, 10, utf8_decode($fila['telefono']), 1, 0, 'C', 1);
    $pdf-> Ln();
     
}while($fila = mysqli_fetch_assoc($query));

$pdf-> Output();

?>

