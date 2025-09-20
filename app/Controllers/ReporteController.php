<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

class ReporteController extends BaseController
{
  protected $db;

  public function __construct(){
    $this->db = \Config\Database::connect();
  }

  public function getReport1(){
    $html = view('reportes/reporte1');
    $html2PDF = new Html2Pdf();
    $html2PDF->writeHTML($html);
    $this->response->setHeader('Content-Type','application/pdf');
    $html2PDF->output();
  }

  public function getReport2(){
    $data = [
      "area" => "Sistemas",
      "autor" => "Apolaya Schrader Mariana",
      "productos" => [
        ["id" => 1, "descripcion" => "Monitor", "precio" => 750],
        ["id" => 2, "descripcion" => "Impresora", "precio" => 500],
        ["id" => 3, "descripcion" => "WebCam", "precio" => 220],
      ],
      "estilos" => view('reportes/estilos')
    ];

    $html = view('reportes/reporte2', $data);

    try {
      $html2PDF = new Html2Pdf('P','A4','es',true,'UTF-8',[10,10,10,10]);
      $html2PDF->writeHTML($html);
      $this->response->setHeader('Content-Type','application/pdf');
      $html2PDF->output('Reporte-Finanzas.pdf');
      exit();
    } catch (Html2PdfException $e) {
      $html2PDF->clean();
      $formatter = new ExceptionFormatter($e);
      echo $formatter->getMessage();
    }
  }

  public function getReport3(){
    $query = "
      SELECT
        SH.id,
        SH.superhero_name,
        SH.full_name,
        PB.publisher_name,
        AL.alignment
      FROM superhero SH
      LEFT JOIN publisher PB ON SH.publisher_id = PB.id
      LEFT JOIN alignment AL ON SH.alignment_id = AL.id
      ORDER BY PB.publisher_name
      LIMIT 150;
    ";

    $rows = $this->db->query($query)->getResultArray();

    $data = [
      "rows" => $rows,
      "estilos" => view('reportes/estilos')
    ];

    $html = view('reportes/reporte3', $data);

    try {
      $html2PDF = new Html2Pdf('L','A4','es',true,'UTF-8',[10,10,10,10]);
      $html2PDF->writeHTML($html);
      $this->response->setHeader('Content-Type','application/pdf');
      $html2PDF->output('Reporte-superhero.pdf');
      exit();
    } catch (Html2PdfException $e) {
      $html2PDF->clean();
      $formatter = new ExceptionFormatter($e);
      echo $formatter->getMessage();
    }
  }

  public function getFiltro(){
    $publishers = $this->db->query("SELECT id, publisher_name FROM publisher ORDER BY publisher_name")->getResultArray();
    return view('reportes/filtro', ['publishers' => $publishers]);
  }

  public function postFiltro(){
    $publisherId = $this->request->getPost('publisher_id');

    $query = "
      SELECT
        SH.id,
        SH.superhero_name,
        SH.full_name,
        SH.publisher_id,
        PB.publisher_name,
        AL.alignment
      FROM superhero SH
      LEFT JOIN publisher PB ON SH.publisher_id = PB.id
      LEFT JOIN alignment AL ON SH.alignment_id = AL.id
      WHERE PB.id = ?
      ORDER BY SH.superhero_name
    ";

    $heroes = $this->db->query($query, [$publisherId])->getResultArray();

    return view('reportes/filtro_resultado', ['heroes' => $heroes]);
  }

  public function postFiltroPDF(){
    $publisherId = $this->request->getPost('publisher_id');

    $query = "
      SELECT
        SH.id,
        SH.superhero_name,
        SH.full_name,
        PB.publisher_name,
        AL.alignment
      FROM superhero SH
      LEFT JOIN publisher PB ON SH.publisher_id = PB.id
      LEFT JOIN alignment AL ON SH.alignment_id = AL.id
      WHERE PB.id = ?
      ORDER BY SH.superhero_name
    ";

    $heroes = $this->db->query($query, [$publisherId])->getResultArray();

    $html = view('reportes/reporte4', [
      'rows' => $heroes,
      'estilos' => view('reportes/estilos')
    ]);

    try {
      $html2PDF = new Html2Pdf('L','A4','es',true,'UTF-8',[10,10,10,10]);
      $html2PDF->writeHTML($html);
      $html2PDF->output('reporte-filtrado.pdf');
      exit();
    } catch (Html2PdfException $e) {
      $html2PDF->clean();
      $formatter = new ExceptionFormatter($e);
      echo $formatter->getMessage();
    }
  }

public function getReport5()
{
    // Muestra el buscador y un contenedor vacío para los resultados
    return view('reportes/reporte5');
}

public function ajaxReport5()
{
    $nombre = $this->request->getGet('nombre');

    $query = "
        SELECT id, superhero_name, full_name
        FROM superhero
        WHERE superhero_name LIKE ? OR full_name LIKE ?
        ORDER BY superhero_name
        LIMIT 20
    ";

    $heroes = $this->db->query($query, ["%$nombre%", "%$nombre%"])->getResultArray();

    return $this->response->setJSON($heroes);
}

public function postReport5PDF()
{
    $heroId = $this->request->getPost('hero_id');

    // Obtener datos del héroe
    $hero = $this->db->query("SELECT superhero_name, full_name FROM superhero WHERE id = ?", [$heroId])->getRowArray();

    // Obtener superpoderes
    $powers = $this->db->query("
        SELECT SP.power_name
        FROM hero_power HP
        JOIN superpower SP ON HP.power_id = SP.id
        WHERE HP.hero_id = ?
    ", [$heroId])->getResultArray();

    $html = view('reportes/reporte5_pdf', [
        'hero' => $hero,
        'powers' => $powers,
        'estilos' => view('reportes/estilos')
    ]);

    try {
        $html2PDF = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'es', true, 'UTF-8', [10, 10, 10, 10]);
        $html2PDF->writeHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $html2PDF->output('reporte-superpoderes.pdf');
        exit();
    } catch (\Spipu\Html2Pdf\Exception\Html2PdfException $e) {
        $html2PDF->clean();
        $formatter = new \Spipu\Html2Pdf\Exception\ExceptionFormatter($e);
        echo $formatter->getMessage();
    }
}


}
