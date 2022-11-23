<?php
namespace Barcha17\Module\ModuleTest;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style\Font;
use Barcha17\Module\ModuleTest\DocumentRepository;

class DocumentFormatter
{
   private $repo;   public function __construct(DocumentRepository $repo)
   {
       $this->repo = $repo;
   }   public function format(int $id, string $path): void 
   {
       $text = $this->repo->getDocument($id)->getText();       
       $fontStyle = new Font();
       $fontStyle->setBold(true);
       $fontStyle->setName('Tahoma');
       $fontStyle->setSize(13);       $phpWord = new PhpWord();
       $section = $phpWord->addSection();
       $el = $section->addText($text);
       $el->setFontStyle($fontStyle);       
       $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
       $objWriter->save($path);
   }
}