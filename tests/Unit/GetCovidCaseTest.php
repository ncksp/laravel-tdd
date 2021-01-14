<?php

namespace Tests\Unit;

use App\Http\Controllers\CovidController;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

/**
 * Class GetCovidCaseTest
 * @package Tests\Unit
 */
class GetCovidCaseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function getCovidCases()
    {
        $covidController = new CovidController();

        $data = $covidController->getCovidFirstData();

        $this->assertIsArray($data);
    }

    /**
     * @test
     */
    public function uploadFileCovid(){
        $res = $this->post('covid/upload', [
            'image' => UploadedFile::fake()->image('image.jpg')
        ]);

        $res->assertOk();
        $this->assertFileExists('storage/images/image.jpg');
    }
}
