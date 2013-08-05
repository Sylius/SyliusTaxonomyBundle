<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\TaxonomiesBundle\Document;

/**
 * Default taxon document.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 * @author Ivannis Suárez Jérez <ivannis.suarez@gmail.com>
 */
class DefaultTaxon extends Taxon
{
    /**
     * Required by DoctrineExtensions.
     *
     * @var string
     */
    protected $path;

    /**
     * Required by DoctrineExtensions.
     *
     * @var mixed
     */
    private $lockTime;

    /**
     * Get taxon path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set taxon path.
     *
     * @param string $path
     *
     * @return Taxon
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get taxon lockTime.
     *
     * @return mixed
     */
    public function getLockTime()
    {
        return $this->lockTime;
    }
}
