<?php
namespace TYPO3\CMS\Beuser\Tests\Unit\Service;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Beuser\Service\ModuleDataStorageService;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class ModuleDataStorageServiceTest extends UnitTestCase
{
    /**
     * @test
     */
    public function loadModuleDataReturnsModuleDataObjectForEmptyModuleData()
    {
        // Simulate empty module data
        $GLOBALS['BE_USER'] = $this->createMock(\TYPO3\CMS\Core\Authentication\BackendUserAuthentication::class);
        $GLOBALS['BE_USER']->uc = [];
        $GLOBALS['BE_USER']->uc['moduleData'] = [];

        $subject = new ModuleDataStorageService();
        $objectManagerMock = $this->createMock(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $moduleDataMock = $this->createMock(\TYPO3\CMS\Beuser\Domain\Model\ModuleData::class);
        $objectManagerMock
            ->expects(self::once())
            ->method('get')
            ->with(\TYPO3\CMS\Beuser\Domain\Model\ModuleData::class)
            ->willReturn($moduleDataMock);
        $subject->injectObjectManager($objectManagerMock);

        self::assertSame($moduleDataMock, $subject->loadModuleData());
    }
}
