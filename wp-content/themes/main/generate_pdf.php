<?php
/**
 * PDF生成スクリプト
 * このファイルをブラウザで開くとPDFが生成されます
 * 
 * 使用方法：
 * 1. dompdfライブラリをインストール（composer require dompdf/dompdf）
 * 2. ブラウザでこのファイルにアクセス
 */

// dompdfを使用する場合（composerでインストールが必要）
// require_once __DIR__ . '/vendor/autoload.php';

// または、HTMLファイルを直接ブラウザで開いて「印刷」→「PDFとして保存」してください
header('Location: 見積もり.html');
exit;

// dompdfを使用する場合のコード例（ライブラリがインストールされている場合）
/*
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);

$html = file_get_contents(__DIR__ . '/見積もり.html');
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('見積もり.pdf', ['Attachment' => 0]);
*/
?>



