<?php

use App\Events\AnkletEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

function formatAnkletData(array $ankletData): array
{
    return collect($ankletData)->map(function ($anklet) {
        $name = explode('-', $anklet['no']);

        return [
            'id' => $anklet['id']?? '',
            'fullName' => $anklet['no']?? '',
            'name' => trim($name[0])?? '',
            'identify' => trim($name[1])?? '',
            'gps' => [
                'latitude' => $anklet['po']['latitude']?? '',
                'longitude' => $anklet['po']['longitude']?? '',
                'velocity' => $anklet['po']['velocidade']?? '',
            ],
            'image' => $anklet['img'] ?? '',
            'date' => $anklet['po']['data']?? '',
        ];
    })->toArray();
}

Route::get('teste', function () {
    $response = Http::withHeaders([
        'Cookie' => 'sacGeoCenter=SÃ£o Paulo, SÃ£o Paulo, Brasil|-23.5557714|-46.6395571; sacHost=75b80889e340c0decc7c2ad4861648ba; sacSession=bc1qf92drq0wwm8w7rnw9d8p4wjvaut2csdd5sg2cx',
    ])->get('https://sp.sac24.com.br/phpProxy/sac_ajax.xhtml?s=get_status_online&localidade=120&perfil=0&exibir=A&busca=&lbs=0&_=1706490431966');

    if ($response->successful()) return formatAnkletData($response->json()['monitorados']);
})->name('anklet');


