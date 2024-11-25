<?php

namespace App\Containers\AppSection\Authentication\Tests\Unit\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Tests\UnitTestCase;
use App\Containers\AppSection\Authentication\UI\WEB\Controllers\VerifyEmailController;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\VerifyEmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;

#[Group('authentication')]
#[CoversClass(VerifyEmailController::class)]
final class VerifyEmailControllerTest extends UnitTestCase
{
    public function testControllerReturnsCorrectViewWithValidData(): void
    {
        // Mock the request
        $mockRequest = $this->createMock(VerifyEmailRequest::class);
        $mockRequest->expects($this->once())
            ->method('sanitizeInput')
            ->with(['url', 'signature'])
            ->willReturn([
                'url' => 'http://example.com/verify',
                'signature' => 'abc123',
            ]);

        // Instantiate the controller
        $controller = new VerifyEmailController();

        // Simulate the controller action
        $view = $controller->show($mockRequest);

        // Assert the correct view name
        $this->assertSame('appSection@authentication::verify-email', $view->name());

        // Assert the correct data is passed to the view
        $expectedData = [
            'url' => 'http://example.com/verify&signature=abc123',
        ];
        $this->assertEquals($expectedData, $view->getData());
    }

    public function testControllerReturnsViewWithNullUrlWhenDataIsMissing(): void
    {
        // Mock the request
        $mockRequest = $this->createMock(VerifyEmailRequest::class);
        $mockRequest->expects($this->once())
            ->method('sanitizeInput')
            ->with(['url', 'signature'])
            ->willReturn([
                'url' => null,
                'signature' => null,
            ]);

        // Instantiate the controller
        $controller = new VerifyEmailController();

        // Simulate the controller action
        $view = $controller->show($mockRequest);

        // Assert the correct view name
        $this->assertSame('appSection@authentication::verify-email', $view->name());

        // Assert the data passed to the view
        $expectedData = [
            'url' => null,
        ];
        $this->assertEquals($expectedData, $view->getData());
    }
}
