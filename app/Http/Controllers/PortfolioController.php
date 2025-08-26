<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $directory = public_path('images/portfolio');
        $items = [];
        if (File::exists($directory)) {
            $files = collect(File::files($directory))
                ->filter(function ($file) {
                    return in_array(strtolower($file->getExtension()), ['jpg','jpeg','png','webp']);
                })
                ->sortBy(function ($file) { return $file->getFilename(); });

            foreach ($files as $file) {
                $filename = $file->getFilename();
                $nameNoExt = pathinfo($filename, PATHINFO_FILENAME);
                $title = Str::of($nameNoExt)
                    ->replace(['_', '-'], ' ')
                    ->title();
                $items[] = [
                    'filename' => $filename,
                    'title' => $title,
                    'url' => asset('images/portfolio/' . $filename),
                    'alt' => $title . ' - Agolo Steelworks',
                    'category' => $this->inferCategory($nameNoExt),
                ];
            }
        }

        return view('portfolio', [
            'portfolioItems' => $items,
        ]);
    }

    protected function inferCategory(string $basename): string
    {
        $b = strtolower($basename);
        return match (true) {
            str_contains($b, 'gate') => 'Gates',
            str_contains($b, 'weld') => 'Welding',
            str_contains($b, 'steel') => 'Steelwork',
            str_contains($b, 'fabrication') => 'Fabrication',
            default => 'Project',
        };
    }
}
