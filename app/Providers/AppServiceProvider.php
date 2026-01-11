<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\TahunAjaran;
use App\Models\Semester;
use App\Models\Mapel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Model::preventLazyLoading();

        //menggunakan bootstrap 5
        //Paginator::useBootstrap();
        // Menggunakan View Composer untuk membagikan data ke semua view (*)

        // ----- Menampilakn Tahun Ajaran dan Semester ------

        static $infoAkademik = null;

        View::composer('*', function ($view) use (&$infoAkademik) {

            if ($infoAkademik === null) {
                $tahun = TahunAjaran::where('aktif', 1)->first();
                $semester = Semester::where('aktif', 1)->first();

                $infoAkademik = sprintf(
                    '%s/%s Semester %s',
                    $tahun->tahun_mulai ?? '-',
                    $tahun->tahun_selesai ?? '-',
                    $semester->nama_semester ?? '-'
                );
            }

            $view->with('tahun_ajaran_global', $infoAkademik);
        });

        // ----- Menampilkan daftar Mata Pelajaran ----
        View::composer('components.sidebar', function($view) {
            $mapel = Mapel::where('aktif', '1')->get();

            $view->with('sidebar_mapel', $mapel);
        });

    }
}
