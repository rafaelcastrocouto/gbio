<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Cliente;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;
use Authorization\Policy\BeforePolicyInterface;
use Authorization\Policy\ResultInterface;

class ClientePolicy implements BeforePolicyInterface
{
  
  public function before(?IdentityInterface $identity, mixed $resource, string $action): ResultInterface|bool|null
  {
    if ($identity) {
      $user_data = $identity->getOriginalData();
      if ($user_data and $user_data['administrador_id']) {
        return true;
      }
    }
    return null;
  }
  
  public function canAdd()
  {
    return new Result(false, 'Erro: cliente add policy not allowed');
  }
  
  public function canView()
  {
    return new Result(false, 'Erro: cliente edit policy not allowed');
  }
  
  public function canEdit()
  {
    return new Result(false, 'Erro: cliente edit policy not allowed');
  }
  
  public function canDelete()
  {
    return new Result(false, 'Erro: cliente delete policy not allowed');
  }

}