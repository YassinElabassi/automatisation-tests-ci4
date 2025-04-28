<?php 
namespace App\Tests\Models;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
class PanierModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    protected $namespace = 'App';
    protected $refresh = true;

    protected function setUp(): void
    {
        if (!function_exists('helper')) {
            require_once ROOTPATH . 'vendor/codeigniter4/framework/system/Helpers/helper.php';
        }  
        parent::setUp();
    }
    public function testInsertPanier()
    {
        $model = new \App\Models\PanierModel();
        $data = [
            'date_commande' => date('Y-m-d H:i:s'),
            'client' => 'Client Test'
        ];
        $id = $model->insert($data);
        $this->assertIsInt($id);
        $this->assertGreaterThan(0, $id);
    }
}