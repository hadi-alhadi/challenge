<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;

class DiscountsControllerTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_a_list_of_discounts()
    {
        // Arrange
        Storage::fake('local');

        $dummyContent = json_encode([
            ['id' => 1, 'name' => 'Test Discount', 'image' => 'image/url', 'discount_percentage' => 10],
        ]);
        Storage::disk('local')->put('discounts.json', $dummyContent);

        // Act
        $response = $this->get('/api/discounts');

        // Assert
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'name', 'image', 'discount_percentage'],
        ]);
    }

    /**
     * @test
     */
    public function it_returns_a_filtered_list_of_discounts_by_name()
    {
        // Arrange
        Storage::fake('local');

        $dummyContent = json_encode([
            ['id' => 1, 'name' => 'Test Discount', 'image' => 'image/url', 'discount_percentage' => 10],
            ['id' => 2, 'name' => 'Another Discount', 'image' => 'image/url', 'discount_percentage' => 20],
        ]);
        Storage::disk('local')->put('discounts.json', $dummyContent);

        // Act
        $response = $this->get('/api/discounts?name=Another');

        // Assert
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment(['id' => 2]);
    }

    /**
     * @test
     */
    public function it_returns_a_filtered_list_of_discounts_by_discount_percentage() {
        // Arrange
        Storage::fake('local');

        $dummyContent = json_encode([
            ['id' => 1, 'name' => 'Test Discount', 'image' => 'image/url', 'discount_percentage' => 10],
            ['id' => 2, 'name' => 'Another Discount', 'image' => 'image/url', 'discount_percentage' => 20],
        ]);
        Storage::disk('local')->put('discounts.json', $dummyContent);

        // Act
        $response = $this->get('/api/discounts?discount_percentage=20');

        // Assert
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment(['id' => 2]);
    }

    /**
     * @test
     */
    public function it_returns_a_filtered_list_of_discounts_by_name_and_discount_percentage() {
        // Arrange
        Storage::fake('local');

        $dummyContent = json_encode([
            ['id' => 1, 'name' => 'Test Discount', 'image' => 'image/url', 'discount_percentage' => 10],
            ['id' => 2, 'name' => 'Another Discount', 'image' => 'image/url', 'discount_percentage' => 20],
            ['id' => 3, 'name' => 'Another Discount', 'image' => 'image/url', 'discount_percentage' => 30],
        ]);
        Storage::disk('local')->put('discounts.json', $dummyContent);

        // Act
        $response = $this->get('/api/discounts?name=Another&discount_percentage=20');

        // Assert
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment(['id' => 2]);
    }

    /**
     * @test
     */
    public function it_returns_a_404_error_when_the_file_does_not_exist(){
        // Arrange
        Storage::fake('local');

        // Act
        $response = $this->get('/api/discounts');

        // Assert
        $response->assertStatus(404);
        $response->assertJson(['error' => 'File not found']);
    }
}
