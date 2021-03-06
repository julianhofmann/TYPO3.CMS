<?php
declare(strict_types = 1);

namespace TYPO3\CMS\Core\Resource\Event;

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

use TYPO3\CMS\Core\Resource\FileInterface;
use TYPO3\CMS\Core\Resource\Folder;

/**
 * This event is fired before a file is about to be moved within a Resource Storage / Driver.
 * The folder represents the "target folder".
 */
final class BeforeFileMovedEvent
{
    /**
     * @var FileInterface
     */
    private $file;

    /**
     * @var Folder
     */
    private $folder;

    /**
     * @var string
     */
    private $targetFileName;

    public function __construct(FileInterface $file, Folder $folder, string $targetFileName)
    {
        $this->file = $file;
        $this->folder = $folder;
        $this->targetFileName = $targetFileName;
    }

    public function getFile(): FileInterface
    {
        return $this->file;
    }

    public function getFolder(): Folder
    {
        return $this->folder;
    }

    public function getTargetFileName(): string
    {
        return $this->targetFileName;
    }
}
