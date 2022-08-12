<?php declare(strict_types=1);

namespace App\Command\Watermark;

use App\Trails\NewFileName;
use Minicli\Command\CommandController;
use Intervention\Image\ImageManagerStatic;

class DefaultController extends CommandController
{

    use NewFileName;

    public function handle(): void{
        
        if( !$this->checkParams()){
            return;
        }

        $suffix = $this->getParam('suffix') ?? 'markwater';

        if (is_file($this->getParam('in'))) {
            $this->watermark(
                origin: $this->getParam('in'),
                watermark: $this->getParam('watermark'),
                size: (int) ($this->getParam('size') ?? 18),
                dest: $this->hasParam('out')
                                ? $this->getParam('out')
                                : $this->newFileName($this->getParam('in'), $suffix ),
            );
        }

        if (is_dir($this->getParam('in'))) {
            $files = scandir($this->input->getParam('in'));
            foreach ($files as $file) {
                if ($file == '.' || $file == '..') {
                    continue;
                }
                $inFile = $this->getParam('in').'/'.$file;
                $outFile = $this->hasParam('out')
                                ? $this->getParam('out').'/'.$file
                                : $this->newFileName($this->getParam('in').'/'.$file, $suffix );

                $this->watermark(
                    origin: $inFile,
                    watermark: $this->getParam('watermark'),
                    size: (int) ($this->getParam('size') ?? 18),
                    dest: $outFile
                );
            }
        }
    }



    private function watermark(string $origin, string $watermark, int $size, ?string $dest): void
    {
        $image = ImageManagerStatic::make($origin);

        $center = $image->width() /2;
        $bottom = $image->height() - 20;

        $image->text($watermark, $center, $bottom, function($font) use($size) {
            $font->file(__DIR__ . '/../../../fonts/Roboto-Regular.ttf');
            $font->size($size);
            $font->color([255,255,255,0.5]);
            $font->align('center');
            $font->valign('bottom');
        });

        if (! file_exists(dirname($dest))) {
            mkdir(dirname($dest), 0777, true);
        }

        $image->save($dest);
        $this->getPrinter()->info("A imagem foi salva em '{$dest}'");
    }


    private function checkParams(): bool
    {
        if (! $this->hasParam('in')) {
            $this->getPrinter()->error('Arquivo de entrada deve ser fornecido', true);

            return false;
        }

        if (! file_exists($this->getParam('in'))) {
            $this->getPrinter()->error("O arquivo '{$this->getParams['in']}' não existe", true);

            return false;
        }
        
        if (! $this->hasParam('watermark')) {
            $this->getPrinter()->error('O texto de marca d\'agua deve ser fornecido', true);

            return false;
        }

        return true;
    }

}