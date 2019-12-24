<?php
//declare(strict_types=1);

namespace Wissend\Bundle\CustomBundle\Connector\Processor\MassEdit\Product;

use Akeneo\Tool\Component\StorageUtils\Saver\SaverInterface;
use Akeneo\Pim\Enrichment\Component\Comment\Builder\CommentBuilder;
use Akeneo\Pim\Enrichment\Component\Comment\Model\CommentInterface;
use Akeneo\Pim\Enrichment\Component\Product\Connector\Processor\MassEdit\AbstractProcessor;
//use Akeneo\UserManagement\Bundle\Repository\UserRepositoryInterface;
use Akeneo\UserManagement\Bundle\Doctrine\ORM\Repository\UserRepository;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AddCommentProcessor extends AbstractProcessor
{
    protected $commentBuilder;
    protected $commentSaver;
    protected $userRepository;

    public function __construct(
        CommentBuilder $commentBuilder,
        SaverInterface $commentSaver,
        UserRepository $userRepository
    ) {
        $this->commentBuilder = $commentBuilder;
        $this->commentSaver = $commentSaver;
        $this->userRepository = $userRepository;
    }

    public function process($product)
    {
        $actions = $this->getConfiguredActions();

        $comment = $this->commentBuilder->buildComment(
            $product,
            $this->userRepository->findOneByIdentifier($actions[0]['username'])
        )->setBody($actions[0]['value']);
        $this->commentSaver->save($comment);

        return $product;
    }
}