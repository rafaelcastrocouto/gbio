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


  public function canIndex(IdentityInterface $user_data, Operador $operadorData)
  {
    if ($user_data['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: operador index policy not authorized');
    }
  }
  
  public function canAdd(IdentityInterface $user_data, Operador $operadorData)
  {
    return new Result(true);
  }
  
  public function canView(IdentityInterface $user_data, Operador $operadorData)
  {
    if ($this->sameUser($user_data, $operadorData) || $user_data['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: operador view policy not authorized');
    }
  }
  
  public function canEdit(IdentityInterface $user_data, Operador $operadorData)
  {
    if ($this->sameUser($user_data, $operadorData) || $user_data['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: operador edit policy not authorized');
    }
  }
  
  public function canDelete()
  {
    return new Result(false, 'Erro: operador delete policy not allowed');
  }

  
  protected function sameUser(IdentityInterface $user_data, Operador $operadorData)
  {
    return ($user_data->id == $operadorData->user_id);
  }
  
}