<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Sylius Sp. z o.o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\TaxonomyBundle\Validator;

use Sylius\Bundle\TaxonomyBundle\Validator\Constraints\TaxonParent;
use Sylius\Component\Taxonomy\Model\TaxonInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Webmozart\Assert\Assert;

final class TaxonParentValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        /** @var TaxonParent $constraint */
        Assert::isInstanceOf($constraint, TaxonParent::class);

        if (!$value instanceof TaxonInterface) {
            return;
        }

        $taxon = $value;
        $parent = $taxon->getParent();
        if (null === $parent) {
            return;
        }

        if ($parent === $taxon) {
            $this->context
                ->buildViolation($constraint->message)
                ->atPath('parent')
                ->addViolation();

            return;
        }

        if (null !== $taxon->getId() && null !== $parent->getId() && $taxon->getId() === $parent->getId()) {
            $this->context
                ->buildViolation($constraint->message)
                ->atPath('parent')
                ->addViolation();

            return;
        }
    }
}
