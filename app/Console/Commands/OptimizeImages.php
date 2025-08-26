<?php

namespace App\Console\Commands;

use App\Helpers\ImageOptimizer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class OptimizeImages extends Command
{
    protected $signature = 'images:optimize {--path=public/images}';
    protected $description = 'Optimize and resize images for web';

    protected $sizes = [
        'xl' => ['width' => 1920, 'height' => null],
        'lg' => ['width' => 1280, 'height' => null],
        'md' => ['width' => 960, 'height' => null],
        'sm' => ['width' => 640, 'height' => null],
        'xs' => ['width' => 480, 'height' => null]
    ];

    public function handle()
    {
        $path = $this->option('path');
        if (!File::isDirectory($path)) {
            $this->error("Directory {$path} does not exist!");
            return 1;
        }

        $files = File::glob($path . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        
        $this->info('Starting image optimization...');
        $bar = $this->output->createProgressBar(count($files) * count($this->sizes));

        foreach ($files as $file) {
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            
            foreach ($this->sizes as $size => $dimensions) {
                $destPath = "{$path}/{$filename}-{$size}.{$extension}";
                
                ImageOptimizer::optimize(
                    $file,
                    $destPath,
                    $dimensions['width'],
                    $dimensions['height'],
                    80
                );
                
                $bar->advance();
            }
        }

        $bar->finish();
        $this->info("\nImage optimization completed!");
    }
}
