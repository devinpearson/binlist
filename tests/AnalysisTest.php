<?php

namespace DevinPearson\Tests\BinList;

use GrahamCampbell\Analyzer\AnalysisTrait;
use PHPUnit\Framework\TestCase;

/**
 * This is the analysis test class.
 */
class AnalysisTest extends TestCase
{
    use AnalysisTrait;

    /**
     * Get the code paths to analyze.
     *
     * @return string[]
     */
    protected static function getPaths(): array
    {
        return [
            realpath(__DIR__.'/../src'),
            realpath(__DIR__),
        ];
    }

    /**
     * Get the classes to ignore not existing.
     *
     * @return string[]
     */
    protected static function getIgnored(): array
    {
        return [Application::class];
    }
}
