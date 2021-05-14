<?php

use Orchestra\Testbench\TestCase;

class WidgetTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Laracasts\Widget\WidgetServiceProvider::class
        ];
    }

    /**
     * @test
     */
    public function it_compiles_the_widget_blade_directive()
    {
        $string = "@widget('Laracasts\Widget\Tests\TestWidget')";
        $expected = "<?= resolve('Laracasts\Widget\Tests\TestWidget')->loadView(); ?>";

        $compiled = resolve('blade.compiler')->compileString($string);

        $this->assertEquals($expected, $compiled);
    }
}
