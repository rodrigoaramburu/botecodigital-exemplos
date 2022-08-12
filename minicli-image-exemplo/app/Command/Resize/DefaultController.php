<?php

declare(strict_types=1);

namespace App\Command\Resize;

use App\Trails\NewFileName;
use Intervention\Image\ImageManagerStatic;
use Minicli\Command\CommandController;

class DefaultController extends CommandController
{
    use NewFileName;

    public function handle(): void
    {
        if (! $this->hasParam('in')) {
            $this->getPrinter()->error('Arquivo de entrada deve ser fornecido', true);

            return;
        }

        if (! file_exists($this->getParam('in'))) {
            $this->getPrinter()->error("O arquivo '{$this->getParam('in')}' não existe", true);

            return;
        }

        $suffix = $this->getParam('suffix') ?? 'resize';

        if (is_file($this->getParam('in'))) {
            $this->resizeFile(
                origin: $this->getParam('in'),
                dest: $this->hasParam('out')
                                ? $this->getParam('out')
                                : $this->newFileName($this->getParam('in'), $suffix ),
                width: $this->hasParam('width') ? (int) $this->getParam('width') : null,
                height: $this->hasParam('height') ? (int) $this->getParam('height') : null,
                fit: $this->input->hasFlag('--fit'),
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

                $this->resizeFile(
                    origin: $inFile,
                    dest: $outFile,
                    width: $this->hasParam('width') ? (int) $this->getParam('width') : null,
                    height: $this->hasParam('height') ? (int) $this->getParam('height') : null,
                    fit: $this->input->hasFlag('--fit'),
                );
            }
        }
    }

    

    private function resizeFile(string $origin, ?string $dest, ?int $width, ?int $height, bool $fit): void
    {
        $image = ImageManagerStatic::make($origin);

        if ($fit) {
            $image = $image->fit(
                $width,
                $height,
            );
        } else {
            $image = $image->resize(
                $width,
                $height,
                function ($constraints) {
                    $constraints->aspectRatio();
                }
            );
        }

        if (! file_exists(dirname($dest))) {
            mkdir(dirname($dest), 0777, true);
        }

        $image->save($dest);
        $this->getPrinter()->info("A imagem foi salva em '{$dest}'");
    }
}
