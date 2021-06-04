<?php

namespace App\Security\Voter;

use LogicException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class GlobalVoter extends Voter
{
    const canAccess = 'canAccess';

    public function __construct(
    ) {
    }

    protected function supports(string $attribute, $subject)
    {
        $supportedAttributes = [
            self::canAccess,
        ];

        if (!in_array($attribute, $supportedAttributes)) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token)
    {
        switch ($attribute) {
            case self::canAccess:
                return true;
        }

        throw new LogicException('This code should not be reached!');
    }
}
