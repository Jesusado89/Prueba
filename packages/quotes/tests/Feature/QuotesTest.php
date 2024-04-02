namespace Quotes\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuotesTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/quotes');

        $response->assertStatus(200);
    }

    // Here you can add more feature tests for your API routes.
}
