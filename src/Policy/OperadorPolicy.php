<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Operador;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;
use Authorization\Policy\BeforePolicyInterface;
use Authorization\Policy\ResultInterface;

class OperadorPolicy implements BeforePolicyInterface
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
    if ($this->sameUser($userSession, $operadorData)) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: operador add policy not authorized');
    }
  }
  
  public function canView(IdentityInterface $userSession, Operador $operadorData)
  {
    if ($this->sameUser($userSession, $operadorData)) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: operador view policy not authorized');
    }
  }
  
  public function canEdit(IdentityInterface $userSession, Operador $operadorData)
  {
    if ($this->sameUser($userSession, $operadorData)) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: operador edit policy not authorized');
    }
  }
  
  public function canDelete(IdentityInterface $userSession, Operador $operadorData)
  {
    return new Result(false, 'Erro: operador delete policy not allowed');
  }

  
  protected function sameUser(IdentityInterface $userSession, Operador $operadorData)
  {
    return ($userSession->id == $operadorData->user_id);
  }
  
}